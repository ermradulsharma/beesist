<?php

namespace Modules\Property\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Modules\Property\Entities\RequestBuilding;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RequestBuildingTable extends DataTableComponent
{
    public $model = RequestBuilding::class;
    public $editModal = false;
    public $viewModal = false;
    public $building;
    public $buildingId;
    public $account_id;
    public $confirmApproveRequest;

    public function mount($account_id = null)
    {
        $this->account_id = $account_id;
    }

    protected $listeners = ['openEditModal' => 'openEditModal', 'openViewModal' => 'openViewModal'];

    public function approve($id)
    {
        $this->model::findOrFail($id)->update(['status' => '1']);
        $this->dispatch('swal:modal', type: 'success', message: 'New building Request Approved successfully!');
    }

    public function decline($id)
    {
        $this->model::findOrFail($id)->update(['status' => '2']);
        $this->dispatch('swal:modal', type: 'success', message: 'New building Request Declined successfully!');
    }

    public function cancel($id)
    {
        $this->model::findOrFail($id)->update(['status' => '3']);
        $this->dispatch('swal:modal', type: 'success', message: 'New building Request Cancelled successfully!');
    }

    public function edit($id)
    {
        $this->building = $this->model::find($id);
        $this->buildingId = $id;
        $this->editModal = true;
        $this->dispatch('openEditModal', $this->building);
    }

    public function view($id)
    {
        $this->building = $this->model::find($id);
        $this->buildingId = $id;
        $this->editModal = true;
        $this->dispatch('openViewModal', $this->building);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'desc');
        $this->setComponentWrapperAttributes([
            'id' => 'buildingRequests',
        ]);
    }

    public function columns(): array
    {
        $columns = [
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Title'), 'title')->sortable()->searchable(),
            Column::make(__('Address'), 'location')->format(function ($value) {
                $locationData = json_decode($value, true);
                return $locationData['address'].', '.$locationData['city'].', '.$locationData['state'].', '.$locationData['country'].', '.$locationData['zip'];
            })->sortable()->searchable(),
            Column::make('Status', 'status')->format(function ($value) {
                $statusMap = [
                    '0' => ['class' => 'warning', 'label' => 'Pending'],
                    '1' => ['class' => 'success', 'label' => 'Approved'],
                    '2' => ['class' => 'danger', 'label' => 'Declined'],
                    '3' => ['class' => 'danger', 'label' => 'Cancelled'],
                    '4' => ['class' => 'primary', 'label' => 'Building Listed'],
                ];
                $status = $statusMap[$value] ?? null;
                if ($status) {
                    return "<span class='badge badge-{$status['class']}'>{$status['label']}</span>";
                }

                return '';
            })->sortable()->html(),
            Column::make(__('Created At'), 'created_at')->format(function ($value) {
                return $value->format('M j, Y');
            })->sortable(),
        ];

        if (Auth::user()->hasAnyRole('Administrator', 'Property Manager')) {
            $columns[] = Column::make('Action')->label(function ($row) {
                $buttons = '';

                if (Auth::user()->hasRole('Administrator')) {
                    $viewButton = '<button type="button" class="btn btn-info btn-sm mr-2 view-btn" data-toggle="tooltip" title="View Request" wire:click="view('.$row->id.')"><i class="fas fa-eye"></i></button>';
                    $approveButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Approve Request" wire:confirm="Are You Sure? Want to approve" wire:click="approve('.$row->id.')" class="btn btn-success btn-sm approve_item mr-2"><i class="fas fa-check"></i></a>';
                    $declineButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Decline Request" wire:confirm="Are You Sure? Want to decline" wire:click="decline('.$row->id.')" class="btn btn-danger btn-sm mr-2"><i class="fas fa-ban"></i></a>';
                    $buttons .= $viewButton.$approveButton.$declineButton;
                }

                if (Auth::user()->hasRole('Property Manager')) {
                    $editButton = '<button type="button" class="btn btn-primary btn-sm mr-2 edit-btn" data-toggle="tooltip" title="Edit Request" wire:click="edit('.$row->id.')"><i class="fas fa-pen"></i></button>';
                    $cancelButton = '<a href="javascript:void(0)" title="Cancel Request" data-toggle="tooltip" wire:confirm="Are You Sure? Want to cancel" wire:click="cancel('.$row->id.')" class="btn btn-danger btn-sm mt-2 mr-2"><i class="fas fa-times"></i></a>';
                    $buttons .= $editButton.$cancelButton;
                }

                return $buttons;
            })->html();
        }

        return $columns;
    }

    public function builder(): Builder
    {
        $query = $this->model::query();
        if (Auth::user()->hasAllAccess()) {
            return $query;
        } else {
            if ($this->account_id && ! Auth::user()->hasAllAccess() && Auth::user()->hasRole('Property Manager')) {
                $query->where('user_id', $this->account_id);
            }

            return $query;
        }
    }
}
