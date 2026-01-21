<?php

namespace Modules\Leads\Http\Livewire;

use App\Models\RentalEvaluation as ModelsRentalEvaluation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Leads\Entities\UserEntity;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class RentalEvaluation extends DataTableComponent
{
    protected $model = ModelsRentalEvaluation::class;
    public $confirming = null;
    public $account_id;
    public function mount($account_id = null)
    {
        $this->account_id = $account_id;
    }

    public function delete($id)
    {
        $this->model::find($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Rental Evalution Request Deleted Successfully!');
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'DESC');
    }

    public function columns(): array
    {
        return [
            Column::make('Actions')->label(function ($row, Column $column) {
                $url = route(rolebased() . '.rental_evaluation.evaluationForm', ['id' => $row->id]);
                $sendReport = '<a href="' . $url . '" data-toggle="tooltip" title="Send Report" class="btn btn-success p-1 mr-1 d-flex align-items-center" target="__blank"><i class="fas fa-paper-plane m-0" style="font-size: 11px;"></i></a>';
                $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove Request" wire:confirm="Are You Sure? Want to remove" wire:click="delete(' . $row->id . ')" class="btn btn-danger p-1 mr-1 d-flex align-items-center"><i class="fas fa-trash m-0" style="font-size: 11px;"></i></a>';
                return '<div class="d-flex align-items-center">' . $sendReport . $deleteButton . '</div>';
            })->html(),
            Column::make('ID', 'id')->collapseAlways(),
            Auth::user()->hasRole('Property Manager') ?  '' : Column::make('Manager', 'userDetails.name')->sortable()->searchable(),
            // Column::make('Manager', 'userDetails.name')->sortable()->searchable(),
            Column::make('Address', 'address')->sortable()->searchable(),
            Column::make('Unit No', 'unit_no')->sortable()->searchable(),
            Column::make('Bedrooms', 'bedrooms')->sortable()->searchable(),
            Column::make('Bathrooms', 'bathrooms')->sortable()->searchable(),
            Column::make('Square Footage', 'square_footage')->sortable()->searchable(),
            Column::make('Last Name', 'last_name')->hideIf(true),
            Column::make('Last Name', 'first_name')->hideIf(true),
            Column::make(__('Name'))->label(function ($row) {
                return $row->first_name . ' ' . $row->last_name;
            }),
            Column::make('Email', 'email')->sortable()->searchable(),
            Column::make('Phone', 'phone')->sortable()->searchable(),
            Column::make('What Are You Looking For', 'what_are_you_looking')->collapseAlways(),
            Column::make('Status', "status")->format(function ($value) {
                return "<span class='badge badge-" . ($value == 0 ? 'warning' : ($value == 1 ? 'success' : 'danger')) . "'>" . ($value == 0 ? 'Pendding' : ($value == 1 ? 'Report Sent' : 'Declined')) . "</span>";
            })->html()->collapseAlways(),
            DateColumn::make('Created At', 'created_at')->inputFormat('Y-m-d H:i:s')->outputFormat('M j, Y')->collapseAlways(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Agreement Status')->options([
                '' => 'All',
                '0' => 'Pending',
                '1' => 'Sent Report',
            ])->filter(function (Builder $builder, string $value) {
                if ($value === '0') {
                    $builder->where('rental_evaluations.status', $value);
                } elseif ($value === '1') {
                    $builder->where('rental_evaluations.status', $value);
                } elseif ($value === '2') {
                    $builder->where('rental_evaluations.status', $value);
                }
            }),
            DateRangeFilter::make('Rental Evaluation')->config([
                'allowInput' => true,
                'altFormat' => 'F j, Y',
                'ariaDateFormat' => 'F j, Y',
                'dateFormat' => 'Y-m-d',
                'placeholder' => 'Enter Date Range',
            ])->filter(function (Builder $builder, array $dateRange) {
                $builder->whereDate('rental_evaluations.created_at', '>=', $dateRange['minDate'])->whereDate('rental_evaluations.created_at', '<=', $dateRange['maxDate']);
            }),
            TextFilter::make('Manager Name')->config([
                'placeholder' => 'Search Name',
                'maxlength' => '25',
            ])->filter(function (Builder $builder, string $value) {
                $builder->whereHas('userDetails', function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            }),
        ];
    }

    public function builder(): Builder
    {
        $user = Auth::user();
        if ($user->hasAllAccess()) {
            return $this->model::query();
        } else {
            if ($this->account_id && $user->hasManagerAccess()) {
                return $this->model::where('account_id', $this->account_id);
            }
            if ($this->account_id && $user->hasAgentAccess()) {
                $accountId = UserEntity::where(['entity_key' => 'Agent', 'entity_value' => $this->account_id])->pluck('account_id');
                return $this->model::whereIn('account_id', $accountId);
            }
        }
    }
}
