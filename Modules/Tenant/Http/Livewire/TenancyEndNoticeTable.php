<?php

namespace Modules\Tenant\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Modules\Tenant\Entities\TenancyEndNotice;

class TenancyEndNoticeTable extends DataTableComponent
{
    public $confirmDelete = null;
    public $confirmApproved = null;
    public $confirmRejected = null;
    public $declined = null;
    public $approved = null;
    protected $model = TenancyEndNotice::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'DESC');
    }

    // Delete Tenant Agreement
    public function confirmDelete($id)
    {
        $this->confirmDelete = $id;
    }

    public function delete($id)
    {
        TenancyEndNotice::findOrFail($id)->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Scheduled Property Showing Deleted Successfully!',
        ]);
    }

    public function cancelDelete()
    {
        $this->confirmDelete = null;
    }

    // Approved Tenant Agreement
    public function confirmApproved($approvedId)
    {
        $this->confirmApproved = $approvedId;
    }

    public function approved($approvedId)
    {
        try {
            $propertyShowing = TenancyEndNotice::findOrFail($approvedId);
            $propertyShowing->update(['status' => '1']);
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'Scheduled Property showing approved successfully!',
            ]);
            $this->confirmApproved = null;
            $this->emit('refreshShowingTable');
        } catch (ModelNotFoundException $e) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'message' => 'Property showing not found!',
            ]);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'message' => 'An error occurred while approving the property showing.',
            ]);
            Log::error($e->getMessage());
        }
    }

    public function cancelApproved()
    {
        $this->confirmApproved = null;
    }

    // Rejected Tenant Agreement
    public function confirmRejected($id)
    {
        $this->confirmRejected = $id;
    }

    public function rejected($id)
    {
        TenancyEndNotice::findOrFail($id)->update(['status' => '2']);
        $this->dispatchBrowserEvent('swal:modal', ['type' => 'success', 'message' => 'Scheduled Property showing rejected successfully!',]);
        $this->confirmRejected = null;
    }

    public function cancelRejected()
    {
        $this->confirmRejected = null;
    }

    public function filters(): array
    {
        return [
            'page_type' => SelectFilter::make('Page Type')->options(['' => 'Any', 'default' => 'Default', 'landing' => 'Landing',]),
        ];
    }

    public function builder(): Builder
    {
        $query = TenancyEndNotice::query();

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
            Column::make(__('Actions')),
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Name'), 'name')->sortable(),
            Column::make(__('E-mail'), 'email')->sortable(),
            Column::make(__('Phone'), 'phone'),
            Column::make(__('Address'), 'address')->sortable(),
            Column::make(__('Move Date'), 'move_date')->sortable(),
            Column::make(__('Date'), 'created_at')->sortable(),
            Column::make(__('Status'), 'status')->sortable(),
        ];
    }
}
