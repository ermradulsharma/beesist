<?php

namespace Modules\Property\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class PropertyTable extends DataTableComponent
{
    protected $model = Property::class;

    public $account_id;

    public function mount($account_id = null)
    {
        $this->account_id = $account_id;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'desc');
        $this->setReorderDisabled();
    }

    public function delete($id)
    {
        UserEntity::where(['entity_key' => 'property', 'entity_value' => $id])->delete();
        Property::findOrFail($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Property Deleted Successfully!');
    }

    public function columns(): array
    {
        return [
            Column::make('Actions')->label(function ($row, Column $column) {
                $editButton = '';
                if (Auth::user()->can('user.access.property.edit')) {
                    $editUrl = route(rolebased().'.properties.edit', $row->id);
                    $editButton = '<a href="'.$editUrl.'" data-toggle="tooltip" title="Edit Property" class="btn btn-info btn-sm mr-2"><i class="fas fa-pen"></i></a>';
                }

                $viewtUrl = route('property.single', ['property' => $row->slug]);
                $viewButton = '<a target="_blank" href="'.$viewtUrl.'" data-toggle="tooltip" title="View Property" class="btn btn-success btn-sm mr-2"><i class="fas fa-eye"></i></a>';

                $deleteButton = '';
                $deleteConfirmationButton = '';
                if (Auth::user()->can('user.access.property.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove Property" wire:confirm="Are You Sure? Want to delete" wire:click="delete('.$row->id.')" class="btn btn-danger btn-sm delete_item mr-2"><i class="fas fa-trash"></i></a>';
                }
                $buttons = $editButton.$viewButton.$deleteButton;

                return '<div class="d-flex">'.$buttons.'</div>';
            })->html(),

            Column::make(__('Image'))->label(function ($row, Column $column) {
                $url = $row->featured_image['url'] ?? null;
                $imageSrc = $url && file_exists(public_path('uploads/properties/'.$row->id.'/property_photos/thumbs/'.$url)) ? asset('uploads/properties/'.$row->id.'/property_photos/thumbs/'.$url) : asset('images/bolld-placeholder.png');
                $propertyUrl = route('property.single', $row->slug);

                return '<a href="'.$propertyUrl.'" target="_blank"><img src="'.$imageSrc.'" alt="'.$row->name.'" class="card-img" style="width: 44px; min-width: 50px;"></a>';
            })->html(),
            Column::make(__('ID'), 'id')->sortable()->hideIf(true),
            Auth::user()->hasRole('Property Manager') ? Column::make(__('Assign To'), 'prop_agents')->format(function ($value, $row) {
                return $row->agentDetail->name ?? '';
            })->searchable() : Column::make(__('Managed By'))->label(function ($row) {
                return $row->userEntity->userDetails->name ?? '';
            }),
            Column::make(__('Title'), 'title')->sortable()->searchable(),
            Column::make(__('Slug'), 'slug')->sortable()->searchable()->hideIf(true),
            Column::make(__('Address'), 'address')->sortable()->searchable(),
            Column::make(__('Beds'), 'beds')->sortable()->searchable(),
            Column::make(__('Baths'), 'baths')->sortable()->searchable(),
            Column::make(__('Area(sqft)'), 'area')->sortable()->searchable(),
            Column::make(__('Rent'), 'rate')->sortable()->searchable(),
            Column::make('Status', 'status')->format(function ($value) {
                return "<span class='badge badge-".($value == 1 ? 'success' : 'danger')."'>".($value == 1 ? 'Active' : 'Deactive').'</span>';
            })->sortable()->html()->collapseAlways(),
            Column::make(__('Created At'), 'created_at')->format(function ($value) {
                return $value->format('M j, Y');
            })->sortable()->collapseAlways(),
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
                '1' => 'Active',
                '0' => 'In-active',
            ])->filter(function (Builder $builder, $value) {
                if ($value !== '') {
                    $builder->where('properties.status', $value);
                }
            }),
        ];
    }

    public function builder(): Builder
    {
        $user = Auth::user();
        if ($user->hasAllAccess()) {
            return Property::query();
        } else {
            $query = UserEntity::query()->where('entity_key', 'property');
            if ($this->account_id && $user->hasManagerAccess()) {
                $query->where('account_id', $this->account_id);
                $entityIds = $query->pluck('entity_value');

                return Property::whereIn('id', $entityIds);
            }
            if ($this->account_id && $user->hasRole('Property Owner')) {
                return Property::where('user_id', $this->account_id);
            } elseif ($user->hasRole('Agent')) {
                return Property::whereIn('prop_agents', [$user->id]);
            }
        }
    }
}
