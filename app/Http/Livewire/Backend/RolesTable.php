<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\Traits\Attribute\RoleAttribute;
use App\Domains\Auth\Models\Traits\Attribute\UserAttribute;
use App\Domains\Auth\Models\Traits\Relationship\PermissionRelationship;
use App\Domains\Auth\Models\Traits\Relationship\UserRelationship;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Spatie\Permission\Models\Permission;

/**
 * Class RolesTable.
 */
class RolesTable extends DataTableComponent
{
    public $model = Role::class;
    public $confirming = null;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }
    public function query(): Builder
    {
        $query = Role::with('users')->select('id', 'type', 'name');
        if ($this->getFilter('search')) {
            $searchTerm = '%' . $this->getFilter('search') . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('id', 'LIKE', $searchTerm)
                    ->orWhere('type', 'LIKE', $searchTerm)
                    ->orWhere('name', 'LIKE', $searchTerm);
            });
        }
        return $query;
    }


    public function columns(): array
    {
        return [
            Column::make(__('Id'), 'id')->sortable(),
            Column::make(__('Type'), 'type')->sortable(),
            Column::make(__('Name'))->sortable(),
            Column::make(__('Permissions'))->label(function ($row) {
                return $row->permissions_label;
                // $permissions = Permission::where('type', $row->type)->pluck('name')->toArray();
                // return implode(', ', $permissions);
            })->html(),
            Column::make(__('Number of Users'))->label(function ($row) {
                return DB::table('model_has_roles')->where('role_id', $row->getKey())->count();
            }),
            Column::make(__('Actions'))->label(
                function ($row, Column $column) {
                    return view('backend.auth.role.includes.actions', ['model' => $row]);
                }
            ),
        ];
    }

    public function rowView(): string
    {
        return 'backend.auth.role.includes.row';
    }
}
