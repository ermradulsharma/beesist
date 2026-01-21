<?php

namespace Modules\Leads\Http\Livewire;

use Auth;
use Crypt;
use Illuminate\Database\Eloquent\Builder;
use Modules\Leads\Entities\PropertyManagementAgreementForm;
use Modules\Leads\Entities\UserEntity;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PmaFormTable extends DataTableComponent
{
    protected $model = PropertyManagementAgreementForm::class;

    public $decline = null;

    public $approved = null;

    protected $listeners = ['decline' => 'decline', 'approved' => 'approved'];

    public $account_id;

    public function mount($account_id = null)
    {
        $this->account_id = $account_id;
    }

    public function confirmDeclined($id)
    {
        $this->dispatchBrowserEvent('swal:confirmed', [
            'type' => 'warning',
            'message' => 'Are you sure ? <br> You want to decline Agreement?',
            'text' => '',
            'function' => 'decline',
            'id' => $id,
        ]);
    }

    public function decline($id)
    {
        PropertyManagementAgreementForm::findOrFail($id)->update(['status' => '2']);
        $this->dispatch('swal:modal', type: 'success', message: 'Agreement Declined Successfully!');
    }

    public function confirmApproved($id)
    {
        $status = PropertyManagementAgreementForm::findOrFail($id)->status;
        if ($status == 2) {
            $this->dispatchBrowserEvent('swal:confirmed', [
                'type' => 'warning',
                'message' => 'Are you Sure? <br> You want to approve Agreement?',
                'text' => 'Agreement Declined By Admin',
                'function' => 'approved',
                'id' => $id,
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:confirmed', [
                'type' => 'warning',
                'message' => 'Are you sure ? <br> You want to approve Agreement?',
                'text' => '',
                'function' => 'approved',
                'id' => $id,
            ]);
        }
    }

    public function approved($id)
    {
        $agreement = PropertyManagementAgreementForm::findOrFail($id);
        if ($agreement->status == '2') {
            $agreement->update(['status' => '1', 'approved_on' => now()]);
        } else {
            $agreement->update(['approved_on' => now()]);
        }
        $this->dispatch('swal:modal', type: 'success', message: 'Agreement Approved Successfully!');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'DESC');
    }

    public function columns(): array
    {
        return [
            Column::make(__('PMA PDF'), 'pma_pdf')->hideIf(true),
            Column::make(__('User Id'))->hideIf(true),
            Column::make(__('Last Name'), 'lName_2')->sortable()->hideIf(true),
            Column::make(__('Approved On'))->hideIf(true)->searchable(),
            Column::make(__('Actions'))->label(function ($row) {
                $actions = [];
                if (Auth::user()->can('user.access.pma.approve')) {
                    $actions[] = ['href' => 'javascript:void(0)', 'btn' => 'success', 'title' => 'Approve', 'icon' => 'check'];
                }
                if (Auth::user()->can('user.access.pma.agent')) {
                    $editPMA = route('pma.agentForm', ['account_id' => Auth::user()->uuid, 'formId' => Crypt::encryptString($row->id)]);
                    $actions[] = ['href' => $editPMA, 'btn' => 'primary', 'title' => 'Agent Signature', 'icon' => 'pencil-alt'];
                }
                if (Auth::user()->can('user.access.pma.form') && $row->pma_pdf == '') {
                    $viewForm = route('pma.viewForm', ['action' => 'view', 'form_id' => Crypt::encryptString($row->id)]);
                    $actions[] = ['href' => $viewForm, 'btn' => 'primary', 'title' => 'View Form', 'icon' => 'eye'];
                }
                if (Auth::user()->can('user.access.pma.pdf') && $row->pma_pdf != '') {
                    $viewPdf = route('admin.pma.pma-pdf', ['agreementId' => Crypt::encryptString($row->id)]);
                    $actions[] = ['href' => $viewPdf, 'btn' => 'success', 'title' => 'View PMA PDF', 'icon' => 'file-pdf'];
                }
                if (Auth::user()->can('user.access.pma.decline')) {
                    $actions[] = ['href' => 'javascript:void(0)', 'btn' => 'danger', 'title' => 'Decline', 'icon' => 'times'];
                }
                if (Auth::user()->can('user.access.pma.info')) {
                    $propertyInfo = route('pma.propertyInfo', ['account_id' => Auth::user()->uuid, 'user_id' => Crypt::encryptString($row->user_id), 'id' => Crypt::encryptString($row->id)]);
                    $actions[] = ['href' => $propertyInfo, 'btn' => 'info', 'title' => 'Property Info', 'icon' => 'info'];
                }

                return view('leads::backend.partial._action', ['model' => $row, 'actions' => $actions]);
            }),
            Column::make(__('id'))->sortable()->searchable()->collapseOnTablet(),
            Column::make(__('IP Address'), 'ip')->sortable()->searchable()->collapseOnTablet(),
            Column::make(__('Name'), 'fName_1')->format(fn ($value, $row, Column $column) => $value.' '.$row->lName_2),
            Column::make(__('# Owner'), 'n_own')->sortable(),
            Column::make(__('E-mail'), 'email_5')->sortable()->searchable(),
            Column::make(__('Phone'), 'phone_4')->sortable()->searchable(),
            Column::make(__('Address'), 'address_10')->sortable()->searchable(),
            Column::make(__('Date'), 'created_at')->sortable()->searchable(),
            Column::make(__('Status'))->format(function ($value, $row) {
                $title = $row->approved_on && $value == 1 ? 'Approved' : ($value == 0 && $row->approved_on == null ? 'Pending' : ($value == 2 ? 'Rejected' : ($row->approved_on && $value == 0 ? 'Approved' : '')));
                $text = $row->approved_on && $value == 1 ? 'success' : ($value == 0 && $row->approved_on == null ? 'warning' : ($value == 2 ? 'danger' : ($row->approved_on && $value == 0 ? 'success' : '')));

                return '<i class="text-'.$text.' fas fa-circle" style="font-size: 10px;" data-toggle="tooltip" title="'.$title.'"></i>';
            })->searchable()->sortable()->html(),
        ];
    }

    public function builder(): Builder
    {
        $query = UserEntity::query()->where('entity_key', 'pma');
        if ($this->account_id && ! Auth::user()->hasAllAccess()) {
            $query->where('account_id', $this->account_id);
        }
        $entityIds = $query->pluck('entity_value');
        if ($this->account_id && Auth::user()->hasRole('Property Owner')) {
            return PropertyManagementAgreementForm::where('user_id', $this->account_id);
        } else {
            return PropertyManagementAgreementForm::whereIn('id', $entityIds);
        }
    }
}
