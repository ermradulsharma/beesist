<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class SubscriptionTable extends DataTableComponent
{
    protected $model = Subscription::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'DESC');
        ;
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('User Id', 'user_id')->hideIf(true)->sortable(),
            Column::make('Customer Name', 'userDetails.name')->sortable()->searchable(),
            Column::make('Plan Name', 'name')->sortable()->searchable(),
            Column::make('Stripe Id', 'stripe_id')->sortable()->searchable(),
            Column::make('Stripe Status', 'stripe_status')->sortable()->searchable(),
            // Column::make("Stripe Price", "stripe_price")->sortable(),
            // Column::make("Quantity", "quantity")->sortable(),
            // Column::make("Trial Ends at", "trial_ends_at")->sortable(),
            Column::make('Ends at', 'ends_at')->sortable(),
            DateColumn::make('Created At', 'created_at')->inputFormat('Y-m-d H:i:s')->outputFormat('M j, Y'),
            Column::make(__('Actions'))->label(function ($row) {
                $user = User::find($row->user_id);

                return view('backend.includes.partials.subscriberActions', ['user' => $user]);
            }),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Stripe Status')->options([
                '' => 'All',
                'active' => 'Active',
                'deactive' => 'In-Active',
            ])->filter(function (Builder $builder, string $value) {
                if ($value === 'active') {
                    $builder->where('stripe_status', $value);
                } elseif ($value === 'deactive') {
                    $builder->where('stripe_status', $value);
                }
            }),
            TextFilter::make('Customer Name')->config([
                'placeholder' => 'Search Name',
                'maxlength' => '25',
            ])->filter(function (Builder $builder, string $value) {
                $builder->where('userDetails.name', 'like', '%' . $value . '%');
            }),
            TextFilter::make('Plan Name')->config([
                'placeholder' => 'Search Name',
                'maxlength' => '25',
            ])->filter(function (Builder $builder, string $value) {
                $builder->where('subscriptions.name', 'like', '%' . $value . '%');
            }),
            TextFilter::make('Stripe Id')->config([
                'placeholder' => 'Search Name',
                'maxlength' => '25',
            ])->filter(function (Builder $builder, string $value) {
                $builder->where('subscriptions.stripe_id', 'like', '%' . $value . '%');
            }),
            DateRangeFilter::make('Subscribe At')->config([
                'allowInput' => true,
                'altFormat' => 'F j, Y',
                'ariaDateFormat' => 'F j, Y',
                'dateFormat' => 'Y-m-d',
                'placeholder' => 'Enter Date Range',
            ])->setFilterPillValues([0 => 'minDate', 1 => 'maxDate'])->filter(function (Builder $builder, array $dateRange) {
                $builder->whereDate('subscriptions.created_at', '>=', $dateRange['minDate'])->whereDate('subscriptions.created_at', '<=', $dateRange['maxDate']);
            }),

        ];
    }
}
