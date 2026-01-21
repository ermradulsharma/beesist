<?php

namespace Modules\Property\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Building;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class BuildingsTable extends DataTableComponent
{
    protected $model = Building::class;

    public $account_id;

    public function mount($account_id = null)
    {
        $this->account_id = $account_id;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'desc');
        $this->setSearchStatus(true);
    }

    public function delete($id)
    {
        UserEntity::where(['entity_key' => 'building', 'entity_value' => $id])->delete();
        Building::find($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Building Deleted Successfully!');
    }

    public function currentlyReorderingStatus()
    {
        return true;
    }

    public function columns(): array
    {
        return [
            Column::make('Actions')->label(function ($row, Column $column) {
                $editButton = '';
                if (Auth::user()->can('user.access.building.edit')) {
                    $editUrl = route(rolebased().'.buildings.edit', $row->id);
                    $editButton = '<a href="'.$editUrl.'" data-toggle="tooltip" title="Edit Building" class="btn btn-info btn-sm mr-2"><i class="fas fa-pen"></i></a>';
                }
                $viewtUrl = route('building.single', ['building' => $row->slug]);
                $viewButton = '<a target="_blank" href="'.$viewtUrl.'" data-toggle="tooltip" title="View Building" class="btn btn-success btn-sm mr-2"><i class="fas fa-eye"></i></a>';

                $deleteButton = '';
                $deleteConfirmationButton = '';
                if (Auth::user()->can('user.access.building.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove" wire:confirm="Are You Sure? Want to delete" wire:click="delete('.$row->id.')" class="btn btn-danger btn-sm delete_item mr-2"><i class="fas fa-trash"></i></a>';
                }

                $buttons = $editButton.$viewButton.$deleteButton;
                $confirmationButton = $deleteConfirmationButton ? '<div>'.$deleteConfirmationButton.'</div>' : '';

                return '<div class="d-flex">'.$buttons.'</div>'.$confirmationButton;
            })->html(),
            Column::make(__('Sr. No.'), 'id')->sortable()->hideIf(true),
            Column::make(__('Slug'), 'slug')->sortable()->hideIf(true),
            Column::make(__('Title'), 'title')->sortable()->searchable(),
            Column::make(__('Address'), 'location->address')->sortable()->searchable(),
            Column::make(__('City'), 'location->city')->sortable()->searchable(),
            Column::make(__('Avg ($/sqft)'), 'avg_sqft_rate')->sortable()->searchable(),
            Column::make(__('Avg Strata Fee'), 'avg_strata_fee')->sortable()->searchable(),
            Column::make(__('Level'), 'construction_info->levels')->sortable()->searchable(),
            Column::make(__('Status'))->format(function ($value) {
                return '<i class="text-'.($value == 'inactive' ? 'warning' : ($value == 'active' ? 'success' : 'danger')).' fas fa-circle" style="font-size: 10px;" data-toggle="tooltip" title="'.($value == 'inactive' ? 'Pending' : ($value == 'active' ? 'Approved' : 'Rejected')).'"></i>';
            })->searchable()->html(),
            Column::make(__('Created At'), 'created_at')->format(function ($value) {
                return $value->format('M j, Y');
            })->sortable(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Page Type')->options([
                '' => 'All',
                'default' => 'Default',
                'landing' => 'Landing',
            ]),
            SelectFilter::make('Status')->options([
                '' => 'All',
                'active' => 'Active',
                'inactive' => 'In-active',
            ])->filter(function (Builder $builder, $value) {
                if ($value !== '') {
                    $builder->where('buildings.status', $value);
                }
            }),
        ];
    }

    // public function builder(): Builder
    // {
    //     if (Auth::user()->hasAllAccess()) {
    //         return Building::query();
    //     } else {
    //         $query = UserEntity::query()->where('entity_key', 'building');
    //         if ($this->account_id && !Auth::user()->hasAllAccess()) {
    //             $query->where('account_id', $this->account_id);
    //         }
    //         $entityIds = $query->pluck('entity_value');
    //         if ($this->account_id && Auth::user()->hasRole('Property Owner')) {
    //             // return Building::where('user_id', $this->account_id);
    //         } else {
    //             return Building::whereIn('id', $entityIds);
    //         }
    //     }
    // }
}
