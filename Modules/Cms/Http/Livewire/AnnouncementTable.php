<?php

namespace Modules\Cms\Http\Livewire;

use App\Domains\Announcement\Models\Announcement;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AnnouncementTable extends DataTableComponent
{
    public $model = Announcement::class;
    public $editModal = false;
    public $announcement, $announcementId;
    protected $listeners = ['openEditModal' => 'openEditModal'];
    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'desc');
        $this->setComponentWrapperAttributes([
            'id' => 'buildingRequests',
        ]);
    }

    public function decline($id)
    {
        $this->model::findOrFail($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Announcement Deleted successfully!');
    }
    public function edit($id)
    {
        $this->announcement = $this->model::find($id);
        $this->announcementId = $id;
        $this->editModal = true;
        $this->dispatch('openEditModal', $this->announcement);
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Area'), 'area')->sortable(),
            Column::make(__('Type'), 'type')->sortable(),
            Column::make(__('Message'), 'message')->sortable(),
            Column::make(__('Status'), 'enabled')->sortable(),
            Column::make(__('Start At'), 'starts_at')->sortable(),
            Column::make(__('End At'), 'ends_at')->sortable(),
            Column::make('Action')->label(function ($row) {
                $declineButton = '<button data-toggle="tooltip" title="Delete Announcement" wire:confirm="Are You Sure? Want to decline" wire:click="decline(' . $row->id . ')" class="btn btn-danger btn-sm p-1 mr-1"><i class="fas fa-trash m-0" style="font-size: 11px;"></i></button>';
                $editButton = '<button class="btn btn-primary btn-sm p-1 mr-1" data-toggle="tooltip" title="Edit Announcement" wire:click="edit(' . $row->id . ')"><i class="fas fa-pen m-0" style="font-size: 11px;"></i></button>';
                return '<div class="d-flex">' . $editButton . $declineButton . '</div>';
            })->html()
        ];
    }
}
