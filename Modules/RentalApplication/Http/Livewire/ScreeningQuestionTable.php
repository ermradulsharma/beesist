<?php

namespace Modules\RentalApplication\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Modules\RentalApplication\Entities\ScreeningQuestion;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ScreeningQuestionTable extends DataTableComponent
{
    protected $model = ScreeningQuestion::class;
    protected $listeners = ['tableRefresh' => '$tableRefresh'];
    public $showId;
    public $title;
    public $question_type;
    public $field_type;
    public $status;
    public $account_id;
    public function mount($account_id = null)
    {
        $this->account_id = $account_id;
    }

    public $confirming = null;
    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function cancelDelete()
    {
        $this->confirming = null;
    }

    public function delete($id)
    {
        ScreeningQuestion::findOrFail($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Screening Question Deleted Successfully!');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function openModal($id)
    {
        $screeningQuestion = ScreeningQuestion::findOrFail($id);
        $this->dispatch('openModal', [
            'showId' => $screeningQuestion->id,
            'title' => $screeningQuestion->title,
            'question_type' => $screeningQuestion->question_type,
            'field_type' => $screeningQuestion->field_type,
            'status' => $screeningQuestion->status,
        ]);
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Status')->options([
                '' => 'All',
                '1' => 'Active',
                '0' => 'Inactive',
                '2' => 'Rejected',
            ])->filter(function (Builder $builder, $value) {
                if ($value !== '') {
                    $builder->where('status', $value);
                }
            }),
            SelectFilter::make('Question Type')->options([
                '' => 'All',
                'employer' => 'Employer',
                'landlord' => 'Landlord',
                'other' => 'Other',
            ])->filter(function (Builder $builder, $value) {
                if ($value !== '') {
                    $builder->where('question_type', $value);
                }
            }),
            SelectFilter::make('Field Type')->options([
                '' => 'All',
                'radio  ' => 'Radio',
                'textbox' => 'Text Box',
                'other' => 'Other',
            ])->filter(function (Builder $builder, $value) {
                if ($value !== '') {
                    $builder->where('field_type', $value);
                }
            }),
        ];
    }
    
    public function columns(): array
    {
        $columns = [
            Column::make(__('#'), 'id')->sortable()->searchable(),
            Column::make(__('Title'), 'title')->searchable(),
            Column::make(__('Question Type'), 'question_type')->sortable()->searchable(),
            Column::make(__('Field Type'), 'field_type')->sortable()->searchable(),
            Column::make(__('Status'))->format(function ($value) {
                return '<i class="text-' . ($value == 0 ? 'warning' : ($value == 1 ? 'success' : 'danger')) . ' fas fa-circle" style="font-size: 10px;" data-toggle="tooltip" title="' . ($value == 0 ? 'Inactive' : ($value == 1 ? 'Active' : 'Rejected')) . '"></i>';
            })->searchable()->sortable()->html(),
            Column::make(__('Created At'), 'created_at')->format(function ($value) {
                return $value->format('M j, Y');
            })->sortable()->collapseOnTablet(),
        ];
        if (Auth::user()->canAny(['user.access.rental.screening.edit', 'user.access.rental.screening.delete'])) {
            $columns[] = Column::make(__('Actions'))->label(function ($row, Column $column) {
                $editButton = '';
                if (Auth::user()->can('user.access.rental.screening.edit')) {
                    $editButton = '<a href="javascript:void(0)" class="btn btn-info btn-sm p-1 mr-1"" data-toggle="modal" data-target="#addScreeningQuestionModal" wire:click="openModal(' . $row->id . ')" data-toggle="tooltip" title="Edit"><i class="fas fa-pen m-0" style="font-size: 11px;"></i></a>';
                }

                $deleteButton = '';
                if (Auth::user()->can('user.access.rental.screening.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove Question" wire:confirm="Are You Sure? Want to remove question" wire:click="delete(' . $row->id . ')" class="btn btn-danger btn-sm p-1 mr-1""><i class="fas fa-trash m-0" style="font-size: 11px;"></i></a>';
                }
                return '<div class="d-flex">' . $editButton . $deleteButton . '</div>';
            })->html();
        }

        return $columns;
    }

    public function refreshTable()
    {
        $this->refresh();
    }

    public function builder(): Builder
    {
        $query = ScreeningQuestion::query()->whereNull('pm_id');
        if ($this->account_id && !Auth::user()->hasAllAccess()) {
            $query->orWhere('pm_id', $this->account_id);
        }

        return $query;
    }
}
