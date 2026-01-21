<?php

namespace Modules\Tenant\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Modules\Tenant\Entities\TenantAgreement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class TenantAgreementTable extends DataTableComponent
{
    protected $model = TenantAgreement::class;
    public $account_id;
    public function mount($account_id = null)
    {
        $this->account_id = $account_id;
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'DESC')->setFiltersEnabled();
        $this->setSearchPlaceholder('Enter Search Term');
    }

    public function delete($id)
    {
        $this->model::findOrFail($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Tenancy Agreement deleted successfully!');
    }

    public function reject($id)
    {
        $this->model::findOrFail($id)->update(['status' => '2']);
        $this->dispatch('swal:modal', type: 'success', message: 'Tenancy Agreement rejected successfully!');
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Access Token'), 'access_token')->hideIf(true),
            Column::make(__('Property Id'), 'prop_id')->hideIf(true),
            Column::make(__('User Id'), 'user_id')->hideIf(true),
            Column::make(__('form Step'), 'form_step')->hideIf(true),
            Column::make('Actions')->label(function ($row, Column $column) {
                $action = $row->form_step == 4 ? 'edit' : 'view';
                $formId = Crypt::encryptString($row->id);
                $accessToken =  $row->access_token;

                $class = $row->form_step == 4 ?  'primary' : 'info';
                $title = $row->form_step == 4 ?  'Approve' : 'View';
                $icon = $row->form_step == 4 ?  'pen' : 'eye';

                $editButton = '';
                $rejectButton = '';
                $deleteButton = '';
                $agreementButton = '';
                $disclosureButton = '';

                if (Auth::user()->can('user.access.tenancy.edit')) {
                    $editUrl = route('tenant.viewTenantAgreement', ['action' => $action, 'form_id' => $formId, 'access_token' => $accessToken]);
                    $editButton = '<a href="' . $editUrl . '" class="btn btn-' . $class . ' btn-sm p-1 mr-1" data-toggle="tooltip" target="_blank" title="' . $title . ' Agreement"><i class="fas fa-' . $icon . ' m-0" style="font-size: 11px;"></i></a>';
                }

                if (Auth::user()->can('user.access.tenancy.reject')) {
                    $rejectButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Reject Request" wire:confirm="Are You Sure? Want to reject" wire:click="reject(' . $row->id . ')" class="btn btn-danger btn-sm p-1 mr-1"><i class="fas fa-ban m-0" style="font-size: 11px;"></i></a>';
                }

                if (Auth::user()->can('user.access.tenancy.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove Request" wire:confirm="Are You Sure? Want to remove" wire:click="delete(' . $row->id . ')" class="btn btn-danger btn-sm p-1 mr-1"><i class="fas fa-trash m-0" style="font-size: 11px;"></i></a>';
                }

                if (Auth::user()->can('user.access.tenancy.agreement')) {
                    $agreementDownloadUrl = route(rolebased() . '.tenant.savePdf', ['type' => 'agreement', 'id' => $formId, 'access_token' => $accessToken]);
                    $agreementButton = '<a href="' . $agreementDownloadUrl . '" target="_blank" class="btn btn-success btn-sm p-1 mr-1" data-toggle="tooltip" title="Download Tenancy Agreement"><i class="fas fa-file-pdf m-0" style="font-size: 11px;"></i></a>';
                }

                if (Auth::user()->can('user.access.tenancy.disclosure')) {
                    $disclosureDownloadUrl = route(rolebased() . '.tenant.savePdf', ['type' => 'disclosure', 'id' => $formId, 'access_token' => $accessToken]);
                    $disclosureButton = '<a href="' . $disclosureDownloadUrl . '" target="_blank" class="btn btn-success btn-sm p-1 mr-1" data-toggle="tooltip" title="Download Tenancy Disclosure"><i class="fas fa-file-pdf m-0" style="font-size: 11px;"></i></a>';
                }

                $buttons = $editButton . $rejectButton . $deleteButton;
                if ($row->form_step == 5 && $row->status == 1) {
                    $buttons .= $agreementButton . $disclosureButton;
                }
                return '<div class="d-flex align-items-center">' . $buttons . '</div>';
            })->html(),
            Auth::user()->hasRole('Property Manager') ? Column::make(__('Assign To'), 'property.agentDetail.name')->searchable() : Column::make(__('Managed By'))->label(function ($row) {
                return $row->userEntity->userDetails->name;
            }),
            Column::make(__('#Tenants'), 'number_tenants')->sortable(),
            Column::make(__('Title'), 'property.title')->searchable()->sortable(),
            Column::make(__('Tenant Name'), 'tenants_data')->format(function ($value) {
                return json_decode(unserialize($value), true)['t1_fname'] . ' ' . json_decode(unserialize($value), true)['t1_lname'];
            })->sortable(),
            Column::make(__('E-mail'), 'tenants_data')->format(function ($value) {
                return json_decode(unserialize($value), true)['t1_email'];
            })->sortable(),
            Column::make(__('Phone'), 'tenants_data')->format(function ($value) {
                return json_decode(unserialize($value), true)['t1_phone'];
            })->sortable(),
            Column::make("Status", "status")->format(function ($value) {
                return '<i class="text-' . ($value == 0 ? 'warning' : ($value == 1 ? 'success' : 'danger')) . ' fas fa-circle" style="font-size: 10px;" data-toggle="tooltip" title="' . ($value == 0 ? 'Pendding' : ($value == 1 ? 'Approved' : 'Declined')) . '"></i>';
                return "<span class='badge badge-" . ($value == 0 ? 'warning' : ($value == 1 ? 'success' : 'danger')) . "'>" . ($value == 0 ? 'Pendding' : ($value == 1 ? 'Approved' : 'Declined')) . "</span>";
            })->sortable()->collapseOnTablet()->html(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Agreement Status')->options([
                '' => 'All',
                '0' => 'Pending',
                '1' => 'Approved',
                '2' => 'Declined',
            ])->filter(function (Builder $builder, string $value) {
                if ($value === '0') {
                    $builder->where('tenant_agreements.status', $value);
                } elseif ($value === '1') {
                    $builder->where('tenant_agreements.status', $value);
                } elseif ($value === '2') {
                    $builder->where('tenant_agreements.status', $value);
                }
            }),
            DateRangeFilter::make('Tenancy Agreement')->config([
                'allowInput' => true,
                'altFormat' => 'F j, Y',
                'ariaDateFormat' => 'F j, Y',
                'dateFormat' => 'Y-m-d',
                'placeholder' => 'Enter Date Range',
            ])->filter(function (Builder $builder, array $dateRange) {
                $builder->whereDate('tenant_agreements.created_at', '>=', $dateRange['minDate'])->whereDate('tenant_agreements.created_at', '<=', $dateRange['maxDate']);
            }),
            TextFilter::make('Property')->config([
                'placeholder' => 'Search Name',
                'maxlength' => '25',
            ])->filter(function (Builder $builder, string $value) {
                $builder->whereHas('property', function ($query) use ($value) {
                    $query->where('title', 'like', '%' . $value . '%');
                });
            }),
            TextFilter::make('Manager Name')->config([
                'placeholder' => 'Search Name',
                'maxlength' => '25',
            ])->filter(function (Builder $builder, string $value) {
                $builder->whereHas('userEntity.userDetails', function ($query) use ($value) {
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
            $query = UserEntity::query()->where('entity_key', 'property');
            if ($this->account_id && $user->hasManagerAccess()) {
                $query->where('account_id', $this->account_id);
                $entityIds = $query->pluck('entity_value');
                return $this->model::whereIn('prop_id', $entityIds);
            }
            if ($user->hasRole('Property Owner')) {
                $entityIds = $query->pluck('entity_value');
                $propertyIds = Property::whereIn('id', $entityIds)->whereIn('user_id', [$user->id])->pluck('id');
                return $this->model::whereIn('prop_id', $propertyIds);
            } elseif ($user->hasRole('Agent')) {
                $entityIds = $query->pluck('entity_value');
                $propertyIds = Property::whereIn('id', $entityIds)->whereIn('prop_agents', [$user->id])->pluck('id');
                return $this->model::whereIn('prop_id', $propertyIds);
            }
        }
    }
}
