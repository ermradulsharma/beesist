<?php

namespace Modules\Cms\Http\Livewire;

use Modules\Cms\Entities\Page;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class PageTable extends DataTableComponent
{
    protected $model = Page::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function delete($id)
    {
        $this->model::findOrFail($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Page deleted successfully!');
    }

    public function columns(): array
    {
        return [
            Column::make('Actions')->label(function ($row, Column $column) {
                $editUrl = route("admin.cms.page.edit", $row->id);
                $viewtUrl = route('cms.page.single', $row->slug);

                $editButton = '<a href="' . $editUrl . '" data-toggle="tooltip" title="Edit Page" class="btn btn-info btn-sm p-1 mr-1"><i class="fas fa-pen m-0" style="font-size: 11px;"></i></a>';
                $viewButton = '<a target="_blank" href="' . $viewtUrl . '" data-toggle="tooltip" title="View Page" class="btn btn-success btn-sm p-1 mr-1"><i class="fas fa-eye m-0" style="font-size: 11px;"></i></a>';
                $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove Template" wire:confirm="Are You Sure? Want to delete" wire:click="delete(' . $row->id . ')" class="btn btn-danger btn-sm p-1 mr-1"><i class="fas fa-trash m-0" style="font-size: 11px;"></i></a>';

                return '<div class="d-flex align-items-center">' . $editButton . $viewButton . $deleteButton . '</div>';
            })->html(),
            Column::make(__('ID'), 'id')->sortable(),
            Column::make(__('Title'), 'title')->sortable(),
            Column::make(__('Slug'), 'slug')->sortable(),
            Column::make(__('Type'), 'page_type')->sortable(),
            Column::make(__('Order'), 'order')->sortable(),
            Column::make(__('Status'), 'is_active')->sortable(),
            Column::make(__('CREATED DATE'), 'created_at')->sortable(),
            Column::make(__('UPDATED DATE'), 'updated_at')->sortable(),
        ];
    }

    public function filters(): array
    {
        return [
            'page_type' => SelectFilter::make('Page Type')->options(['' => 'Any', 'default' => 'Default', 'landing' => 'Landing',]),
        ];
    }
}
