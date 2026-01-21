{{-- <x-livewire-tables::table.cell>
    <div style="min-width:100px">
        <a href="{{ route('admin.cms.page.edit', $row->id) }}" data-toggle="tooltip" title="Edit Page" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
        <a target="_blank" href="{{ route('cms.page.single', $row->slug) }}" data-toggle="tooltip" title="View Page" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
        @if ($confirming === $row->id)
            <button type="button" data-toggle="tooltip" title="Are You Sure? Want to delete" wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm delete_item">Are You Sure?</button>
        @else
            <button type="button" data-toggle="tooltip" title="Delete PMA" wire:click="confirmDelete({{ $row->id }})" class="btn btn-danger btn-sm delete_item"><i class="fas fa-trash"></i></button>
        @endif
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>{{ $row->id }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->title }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->slug }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->page_type }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->order }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <x-badges.default>{{ $row->is_active }}</x-badges.default>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->created_at }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->updated_at }}</x-livewire-tables::table.cell>
 --}}
