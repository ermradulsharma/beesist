<?php

namespace App\Http\Livewire\Backend;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Package;
use App\Models\PackageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class PackageTable extends DataTableComponent
{
    protected $model = Package::class;

    public function delete($id)
    {
        $package = $this->model::findOrFail($id);
        if ($package->stripe_product_id) {
            try {
                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
                $stripe->products->delete($package->stripe_product_id, []);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }
        $package->delete();
        $package->packageServices()->detach();
        $this->dispatch('swal:modal', type: 'success', message: 'Package deleted successfully!');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable(),
            Column::make("Title", "title")->sortable(),
            Column::make("Total property limit", "total_property_limit")->sortable(),
            Column::make("Amount", "amount")->sortable()->format(function ($value) {
                return '$ ' . number_format($value, 2);
            }),
            Column::make("Status", "status")->format(function ($value) {
                return "<span class='badge badge-" . ($value == 1 ? 'success' : 'danger') . "'>" . ($value == 1 ? 'Enable' : 'Disable') . "</span>";
            })->sortable()->collapseOnTablet()->html(),
            DateColumn::make('Created At', 'created_at')->inputFormat('Y-m-d H:i:s')->outputFormat('M j, Y'),
            Column::make('Actions')->label(function ($row, Column $column) {
                $editUrl = route('admin.subscription.packages.edit', $row->id);
                $editButton = '<a href="' . $editUrl . '" data-toggle="tooltip" title="Edit Package" class="btn btn-info btn-sm p-1 mr-1"><i class="fas fa-pen m-0" style="font-size: 11px;"></i></a>';
                $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove Package" wire:confirm="Are You Sure? Want to delete" wire:click="delete(' . $row->id . ')" class="btn btn-danger btn-sm p-1 mr-1"><i class="fas fa-trash m-0" style="font-size: 11px;"></i></a>';
                return '<div class="d-flex align-items-center">' . $editButton . $deleteButton . '</div>';
            })->html(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Package Status')->options([
                '' => 'All',
                '1' => 'Enable',
                '0' => 'Disable',
            ])->filter(function (Builder $builder, string $value) {
                if ($value === '1') {
                    $builder->where('status', $value);
                } elseif ($value === '0') {
                    $builder->where('status', $value);
                }
            }),
            TextFilter::make('Package Name')->config([
                'placeholder' => 'Search Name',
                'maxlength' => '25',
            ])->filter(function (Builder $builder, string $value) {
                $builder->where('title', 'like', '%' . $value . '%');
            }),
        ];
    }
}
