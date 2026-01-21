<?php

namespace Modules\Property\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Modules\Property\Entities\SendPerformanceReport as EntitiesSendPerformanceReport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class SendPerformanceReport extends DataTableComponent
{
    protected $model = EntitiesSendPerformanceReport::class;
    public $pId;
    public $account_id;

    public function mount($pId = null, $account_id = null)
    {
        $this->account_id = $account_id;
        $this->pId = $pId;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id'),
            Column::make(__('Property Id'), 'property_id')->hideIf(true),
            ImageColumn::make(__('Image'))->location(function ($row) {
                return $row->properties->image;
            })->attributes(fn ($row) => ['class' => 'rounded-full', 'alt' => $row->properties->slug, 'width' => 40]),
            Column::make(__('Title'), 'properties.title'),
            Column::make(__('Slug'), 'properties.slug')->hideIf(true),
            Column::make(__('Status'), 'property_status'),
            Column::make(__('Tenancy Applications'), 'applied'),
            Column::make(__('Showing Request'), 'applications'),
            Column::make(__('Showings'), 'showings'),
            Column::make(__('Attended'), 'people_attended'),
            Column::make(__('Asked & Question'), 'asked_questions')->collapseAlways(),
            Column::make(__('Days on market'), 'days_on_market')->collapseAlways(),
            Column::make(__('Views'), 'views')->collapseAlways(),

            DateColumn::make(__('Sent on Date'), 'created_at')->inputFormat('Y-m-d H:i:s')->outputFormat('M j, Y')->collapseAlways(),
            Column::make(__('Owner Name'), 'owner_name')->collapseAlways(),
            Column::make(__('Owner Email'), 'owner_email')->collapseAlways(),
            Column::make(__('Owner 2'), 'owner2_name')->collapseAlways(),
            Column::make(__('Owner 2 Email'), 'owner2_email')->collapseAlways(),
            Column::make(__('Comparable Listings URL'), 'comparable_listings')->collapseAlways(),
            Column::make(__('Craigslist URL'), 'craigslist_url')->collapseAlways(),
            Column::make(__('Craigslist Enquiries'), 'craigslist_enquiries')->collapseAlways(),
            Column::make(__('Rent Board URL'), 'rent_board_url')->collapseAlways(),
            Column::make('Rent Board Enquiries', 'rent_board_enquiries')->collapseAlways(),
            DateColumn::make(__('From'), 'from_date')->inputFormat('m/d/Y')->outputFormat('M j, Y')->collapseAlways(),
            DateColumn::make(__('To'), 'to_date')->inputFormat('m/d/Y')->outputFormat('M j, Y')->collapseAlways(),
            Column::make(__('comment'), 'comment')->collapseAlways(),
        ];
    }

    public function builder(): Builder
    {
        if ($this->pId) {
            return $this->model::whereIn('property_id', [$this->pId]);
        }
        $user = Auth::user();
        if ($user->hasAllAccess()) {
            return $this->model::query();
        } else {
            $query = UserEntity::query()->where('entity_key', 'property');
            if ($this->account_id && $user->hasManagerAccess()) {
                $query->where('account_id', $this->account_id);
                $entityIds = $query->pluck('entity_value');

                return $this->model::whereIn('property_id', $entityIds);
            }
            if ($user->hasRole('Agent')) {
                $propertyIds = Property::where('prop_agents', $user->id)->pluck('id');

                return $this->model::whereIn('property_id', $propertyIds);
            }
        }
    }
}
