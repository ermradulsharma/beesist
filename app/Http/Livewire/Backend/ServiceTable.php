<?php

namespace App\Http\Livewire\Backend;

use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class ServiceTable extends DataTableComponent
{
    protected $model = Service::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function delete($id)
    {
        $this->model::findOrFail($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Service deleted successfully!');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Title', 'title')->sortable(),
            Column::make('Status', 'status')->format(function ($value) {
                return "<span class='badge badge-" . ($value == 1 ? 'success' : 'danger') . "'>" . ($value == 1 ? 'Active' : 'Deactive') . '</span>';
            })->sortable()->collapseOnTablet()->html(),
            DateColumn::make('Created At', 'created_at')->inputFormat('Y-m-d H:i:s')->outputFormat('M j, Y'),
            Column::make('Actions')->label(function ($row, Column $column) {
                $editUrl = route('admin.subscription.services.edit', $row->id);
                $editButton = '<a href="' . $editUrl . '" data-toggle="tooltip" title="Edit Service" class="btn btn-info btn-sm p-1 mr-1"><i class="fas fa-pen m-0" style="font-size: 11px;"></i></a>';
                $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove Service" wire:confirm="Are You Sure? Want to delete" wire:click="delete(' . $row->id . ')" class="btn btn-danger btn-sm p-1 mr-1"><i class="fas fa-trash m-0" style="font-size: 11px;"></i></a>';
                return '<div class="d-flex align-items-center">' . $editButton . $deleteButton . '</div>';
            })->html(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Service Status')->options([
                '' => 'All',
                '1' => 'Active',
                '0' => 'In-Active',
            ])->filter(function (Builder $builder, string $value) {
                if ($value === '1') {
                    $builder->where('status', $value);
                } elseif ($value === '0') {
                    $builder->where('status', $value);
                }
            }),
            TextFilter::make('Service Name')->config([
                'placeholder' => 'Search Name',
                'maxlength' => '25',
            ])->filter(function (Builder $builder, string $value) {
                $builder->where('title', 'like', '%' . $value . '%');
            }),
        ];
    }
}
