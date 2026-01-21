<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Modules\Leads\Entities\UserEntity;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

/**
 * Class UsersTable.
 */
class UsersTable extends DataTableComponent
{
    public $status;
    public $model = User::class;
    public $confirming = null;
    public $account_id;
    public function mount($account_id = null, $status = 'active'): void
    {
        $this->account_id = $account_id;
        $this->status = $status;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'Asc');
    }

    public $columnSearch = [
        'name' => null,
        'email' => null,
    ];

    /**
     * @var array|string[]
     */
    public array $sortNames = [
        'email_verified_at' => 'Verified',
        'two_factor_auth_count' => '2FA',
    ];

    /**
     * @var array|string[]
     */
    public array $filterNames = [
        'type' => 'User Type',
        'verified' => 'E-mail Verified',
    ];

    /**
     * @param  string  $status
     */


    public function filters(): array
    {
        $user = Auth::user();
        $filters = [];
        if ($user->hasManagerAccess()) {
            $filters[] = SelectFilter::make('User Role')->options([
                '' => 'All',
                'Property Manager' => 'Property Manager',
                'Tenant' => 'Tenant',
                'Property Owner' => 'Property Owner',
                'Agent' => 'Agent',
            ])->filter(function (Builder $builder, string $value) {
                if (!empty($value)) {
                    $builder->role($value);
                }
            });
        }
        $filters[] = SelectFilter::make('User Status')->options([
            '' => 'All',
            '0' => 'Deactivated User',
            '1' => 'Activated User',
            '2' => 'Deleted User',
        ])->filter(function (Builder $builder, string $value) {
            if ($value === '0') {
                $builder->onlyDeactivated();
            } elseif ($value === '1') {
                $builder->onlyActive();
            } elseif ($value === '2') {
                $builder->onlyTrashed();
            }
        });

        $filters[] = SelectFilter::make('E-mail Verified', 'email_verified_at')->options([
            ''    => 'Any',
            'yes' => 'Yes',
            'no'  => 'No',
        ])->filter(function (Builder $builder, string $value) {
            if ($value === 'yes') {
                $builder->whereNotNull('email_verified_at');
            } elseif ($value === 'no') {
                $builder->whereNull('email_verified_at');
            }
        });

        $filters[] = DateRangeFilter::make('E-mail Verified')->config([
            'allowInput' => true,
            'altFormat' => 'F j, Y',
            'ariaDateFormat' => 'F j, Y',
            'dateFormat' => 'Y-m-d',
            'placeholder' => 'Enter Date Range',
        ])->setFilterPillValues([0 => 'minDate', 1 => 'maxDate'])->filter(function (Builder $builder, array $dateRange) {
            $builder->whereDate('email_verified_at', '>=', $dateRange['minDate'])->whereDate('email_verified_at', '<=', $dateRange['maxDate']);
        });
        $filters[] = TextFilter::make('Name')->config([
            'placeholder' => 'Search Name',
            'maxlength' => '25',
        ])->filter(function (Builder $builder, string $value) {
            $builder->where('name', 'like', '%' . $value . '%');
        });

        return $filters;
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Type'))->hideIf(true)->sortable(),
            Column::make(__('Verified'), 'email_verified_at')->hideIf(true)->sortable(),
            Column::make(__('Active'))->hideIf(true)->sortable(),
            Column::make(__('Type'))->label(function ($row) {
                return view('backend.auth.user.includes.type', ['user' => $row]);
            })->hideIf(true),
            Column::make(__('Total Property'))->label(function ($row) {
                return $row->property_count;
            }),
            Column::make(__('Name'))->sortable(),
            Column::make(__('E-mail'), 'email')->sortable()->format(function ($value, $column, $row) {
                return '<a href="mailto:' . $value . '">' . $value . '</a>';
            })->html(),
            Column::make(__('Verified'))->label(function ($row) {
                return view('backend.auth.user.includes.verified', ['user' => $row]);
            }),
            Column::make(__('2FA'))->label(function ($row) {
                return view('backend.auth.user.includes.2fa', ['user' => $row]);
            }),
            Column::make(__('Roles'))->label(function ($row) {
                return $row->roles_label;
            })->sortable()->html(),
            Column::make(__('Additional Permissions'))->label(function ($row) {
                return $row->permissions_label;
            })->html(),
            Column::make(__('Status'))->label(function ($row) {
                return view('backend.auth.user.includes.status', ['user' => $row]);
            }),
            Column::make(__('Actions'))->label(function ($row) {
                return view('backend.auth.user.includes.actions', ['user' => $row]);
            }),
        ];
    }

    public function builder(): Builder
    {
        $user = Auth::user();
        if ($user->hasAllAccess()) {
            return $this->model::query()->where(function ($query) use ($user) {
                $query->role('Property Manager')->orWhere('id', $user->id);
            });
        } else if ($this->account_id && $user->hasManagerAccess()) {
            $query = UserEntity::query()->whereIn('entity_key', ['tenant', 'owner', 'agent']);
            $query->where('account_id', $this->account_id);
            $entityIds = $query->pluck('entity_value')->toArray();
            $userIds = array_merge($entityIds, [$this->account_id]);
            return $this->model::whereIn('id', $userIds);
        }
    }
}
