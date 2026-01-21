<?php

namespace Modules\Property\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ScheduleShowingTable extends DataTableComponent
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
    }

    public function columns(): array
    {
        return [
            Column::make(__('Id'), 'id')->sortable(),
            Column::make(__('Property Status'), 'prop_status')->hideIf(true)->sortable(),
            Column::make(__('Image'))->label(function ($row, Column $column) {
                $url = $row->featured_image['url'] ?? null;
                $imageSrc = $url ? asset('uploads/properties/' . $row->id . '/property_photos/thumbs/' . $url) : asset('images/bolld-placeholder.png');
                $propertyUrl = route('property.single', $row->slug);

                return '<a href="' . $propertyUrl . '" target="_blank"><img src="' . $imageSrc . '" alt="' . $row->name . '" class="card-img" style="width: 44px; min-width: 50px;"></a>';
            })->html(),
            Column::make(__('Property Name'), 'title')->searchable()->sortable(),
            Column::make(__('Slug'), 'slug')->sortable()->hideIf(true),
            Column::make(__('Address'), 'address')->searchable()->sortable(),
            Column::make(__('Beds'), 'beds')->searchable()->sortable(),
            Column::make(__('Baths'), 'baths')->searchable()->sortable(),
            Column::make(__('Area'), 'area')->searchable()->sortable(),
            Column::make(__('Rate / Per'), 'rate')->searchable()->sortable(),
            Column::make(__('Created At'), 'created_at')->format(function ($value) {
                return $value->format('M j, Y');
            })->sortable(),
            Column::make('Actions')->label(function ($row, Column $column) {
                $scheduleButton = '';
                if (Auth::user()->can('user.access.showing.create')) {
                    $scheduleButton = '<a href="javascript:void(0)" data-toggle="modal" data-target="#scheduleModal" title="Schedule Showing" class="btn btn-success btn-sm mr-2" data-propid="' . $row->id . '" data-propname="' . $row->title . '"><i class="fas fa-clock"></i></a>';
                }
                $viewtUrl = route('property.single', ['property' => $row->slug]);
                $viewButton = '<a target="_blank" href="' . $viewtUrl . '" data-toggle="tooltip" title="View Property" class="btn btn-info btn-sm mr-2"><i class="fas fa-eye"></i></a>';
                $buttons = $viewButton . $scheduleButton;

                return '<div class="d-flex">' . $buttons . '</div>';
            })->html(),
        ];
    }

    public function filters(): array
    {
        return [
            'page_type' => SelectFilter::make('Page Type')->options([
                '' => 'Any',
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
            return Property::query()->whereRaw("FIND_IN_SET('For Rent', prop_status) > 0");
        } else {
            $query = UserEntity::query()->where('entity_key', 'property');
            if ($this->account_id && $user->hasManagerAccess()) {
                $query->where('account_id', $this->account_id);
                $entityIds = $query->pluck('entity_value');

                return Property::whereIn('id', $entityIds)->whereRaw("FIND_IN_SET('For Rent', prop_status) > 0");
            }

            if ($this->account_id && $user->hasRole('Property Owner')) {
                return Property::where('user_id', $this->account_id)->whereRaw("FIND_IN_SET('For Rent', prop_status) > 0");
            } elseif ($user->hasRole('Agent')) {
                return Property::whereIn('prop_agents', [$user->id])->whereRaw("FIND_IN_SET('For Rent', prop_status) > 0");
            }
        }
    }
}
