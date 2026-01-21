<?php

namespace Modules\Cms\Http\Livewire;

use Modules\Cms\Entities\EmailTemplate;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class EmailTemplateTable extends DataTableComponent
{
    protected $model = EmailTemplate::class;
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function delete($id)
    {
        $this->model::findOrFail($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'E-mail Template deleted successfully!');
    }

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')->sortable()->searchable(),
            Column::make('Actions')->label(function ($row, Column $column) {
                $editUrl = route("admin.cms.emailTemplate.edit", $row->id);
                $editButton = '<a href="' . $editUrl . '" data-toggle="tooltip" title="Edit Template" class="btn btn-info p-1 mr-1 btn-sm"><i class="fas fa-pen m-0" style="font-size: 11px;"></i></a>';
                $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove Template" wire:confirm="Are You Sure? Want to delete" wire:click="delete(' . $row->id . ')" class="btn btn-danger p-1 mr-1 btn-sm"><i class="fas fa-trash m-0" style="font-size: 11px;"></i></a>';
                return '<div class="d-flex align-items-center">' . $editButton . $deleteButton . '</div>';
            })->html(),
            Column::make(__('Title'), 'title')->sortable()->searchable(),
            Column::make(__('Subject'), 'subject')->sortable()->searchable(),
            Column::make(__('Scheduled Time'), 'scheduled_time')->sortable()->searchable(),
            Column::make(__('Schedule Desc'), 'schedule_desc')->sortable(),
            Column::make(__('Command'), 'command')->sortable()->searchable()->collapseOnTablet(),
            Column::make(__('Role'), 'role')->sortable()->searchable()->collapseOnTablet(),
            Column::make(__('Status'), 'is_active')->sortable()->collapseOnMobile(),
            Column::make(__('Create Date'), 'created_at')->sortable()->collapseOnMobile(),
        ];
    }
}
