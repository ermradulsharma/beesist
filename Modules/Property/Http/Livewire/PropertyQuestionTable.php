<?php

namespace Modules\Property\Http\Livewire;

use Auth;
use Illuminate\Database\Eloquent\Builder;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\PropertyQuestion;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class PropertyQuestionTable extends DataTableComponent
{
    public $modal = PropertyQuestion::class;
    public $account_id;
    public $question;
    public $questionId;
    public $answerModal;
    protected $listeners = ['openAnsweModal' => 'openAnsweModal'];

    public function mount($account_id = null)
    {
        $this->account_id = $account_id;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function answer($id)
    {
        $this->question = PropertyQuestion::with('property', 'tenant')->find($id);
        $this->questionId = $id;
        $this->answerModal = true;
        $this->dispatch('openAnsweModal', $this->question);
    }

    public function columns(): array
    {
        return [
            Column::make(__('Id'))->sortable(),
            Column::make(__('Name'), 'tenant.name')->searchable()->sortable(),
            Column::make(__('Email'), 'tenant.email')->searchable()->sortable(),
            Column::make(__('Phone'), 'tenant.phone')->searchable()->sortable(),
            Column::make(__('Title'), 'property.title')->searchable()->sortable(),
            Column::make(__('Created At'), 'created_at')->format(function ($value) {
                return $value->format('M j, Y');
            })->sortable(),
            Column::make(__('Status'))->format(function ($value) {
                return '<i class="text-' . ($value == '0' ? 'warning' : 'success') . ' fas fa-circle" style="font-size: 10px;" data-toggle="tooltip" title="' . ($value == '0' ? 'Pending' : 'Answered') . '"></i>';
            })->html(),
            Column::make(__('Action'), 'status')->format(function ($value, $row) {
                return '<button type="button" class="btn btn-' . ($value == 0 ? 'primary' : 'success') . ' btn-sm mr-2 edit-btn" data-bs-toggle="tooltip" title="' . ($value == 0 ? 'Answer' : 'Answered') . '" wire:click="answer(' . $row->id . ')"><i class="fas fa-' . ($value == 0 ? 'question' : 'eye') . '"></i></button>';
            })->html(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Status')->options([
                '' => 'All',
                '1' => 'Active',
                '0' => 'In-active',
            ])->filter(function (Builder $builder, $value) {
                if ($value !== '') {
                    $builder->where('property_questions.status', $value);
                }
            }),
        ];
    }

    public function builder(): Builder
    {
        $user = Auth::user();
        $query = PropertyQuestion::query();
        if ($user->hasAllAccess()) {
            return $query;
        } else {
            if ($this->account_id && $user->hasManagerAccess()) {
                $entityIds = UserEntity::where(['entity_key' => 'property', 'account_id' => $this->account_id])->pluck('entity_value');

                return $query->whereIn('property_id', $entityIds);
            }
            if ($user->hasRole('Agent')) {
                return $query->whereIn('agents', [$user->id]);
            }
        }
    }

    public function getFilter($filterName)
    {
        return $this->filters[$filterName] ?? null;
    }
}
