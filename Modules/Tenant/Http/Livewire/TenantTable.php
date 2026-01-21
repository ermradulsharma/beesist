<?php

namespace Modules\Tenant\Http\Livewire;


use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Modules\Tenant\Entities\Tenant;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class TenantTable extends DataTableComponent
{
    public $confirmDelete = null;
    public $confirmApproved = null;
    public $confirmRejected = null;
    protected $model = Tenant::class;

    public $decline = null;
    public $approved = null;
    protected $listeners = ['decline' => 'decline', 'approved' => 'approved'];

    public function confirmApproved($id)
    {
        $this->dispatchBrowserEvent('swal:confirmed', [
            'type' => 'warning',
            'message' => 'Comming Soon!',
            'text' => '',
            'function' => '',
            'id' =>'',
        ]);
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
        Tenant::findOrFail($id)->update(['status' => '2']);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Agreement Declined Successfully!',
        ]);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'DESC');
    }

    // Delete Tenant Agreement
    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('swal:confirmed', [
            'type' => 'warning',
            'message' => 'Are you sure ? <br> You want to delete?',
            'text' => '',
            'function' => 'delete',
            'id' => $id,
        ]);
        $this->confirmDelete = $id;
    }

    public function delete($id)
    {
        Tenant::findOrFail($id)->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Scheduled Property Showing Deleted Successfully!',
        ]);
    }

    public function cancelDelete()
    {
        $this->confirmDelete = null;
    }

    public function filters(): array
    {
        return [
            'page_type' => SelectFilter::make('Page Type')->options(['' => 'Any', 'default' => 'Default', 'landing' => 'Landing',]),
        ];
    }

    public function builder(): Builder
    {
        $query = Tenant::query();

        if ($this->getFilter('search')) {
            $query->where(function ($query) {
                $searchTerm = '%' . $this->getFilter('search') . '%';
                $query->where('id', 'LIKE', $searchTerm)
                    ->orWhere('title', 'LIKE', $searchTerm)
                    ->orWhere('subject', 'LIKE', $searchTerm)
                    ->orWhere('command', 'LIKE', $searchTerm)
                    ->orWhere('scheduled_time', 'LIKE', $searchTerm)
                    ->orWhere('role', 'LIKE', $searchTerm);
            });
        }

        return $query;
    }

    public function getFilter($filterName)
    {
        return $this->filters[$filterName] ?? null;
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Actions'))->label(function ($row, Column $column) {
                $action = [
                    ['action' => 'confirmApproved', 'href' => 'javascript:void(0)', 'btn' => 'success', 'title' => 'Send Aggreement', 'icon' => 'paper-plane'],
                    ['action' => 'confirmDeclined', 'href' => 'javascript:void(0)', 'btn' => 'danger', 'title' => 'Decline', 'icon' => 'times'],
                    ['action' => 'confirmDelete', 'href' => 'javascript:void(0)', 'btn' => 'danger', 'title' => 'Remove Request', 'icon' => 'trash'],
                ];
                return view('tenant::partial._action', ['model' => $row, 'actions' => $action]);
            })->html(),
            Column::make(__('Name'), 'userDetails.name')->sortable(),
            Column::make(__('E-mail'), 'userDetails.email')->sortable(),
            Column::make(__('Phone'), 'userDetails.phone')->sortable(),
            Column::make(__('Property'), 'propertyDetails.title')->sortable(),
            Column::make(__('Status'), 'status')->sortable()->hideIf(true),
            Column::make(__('Status'))->label(function ($row, Column $column) {
                $status = $row->status;
                $text = $status == 0 ? 'warning' : ($status == 1 ? 'success' : 'danger');
                $title = $status == 0 ? 'Pendding' : ($status == 1 ? 'Approved' : 'Rejected');
                return '<i class="text-' . $text . ' fas fa-circle" style="font-size: 10px;" data-toggle="tooltip" title="' . $title . '"></i>';
            })->html(),
            Column::make(__('Date'), 'created_at')->sortable(),
        ];
    }
}
