{{-- <style>
    .tentancy a {
        padding: 0.1rem !important;
    }
</style>
<x-livewire-tables::table.cell {{ $attributes->merge(['class' => 'your-class-name']) }}>
    <div class="d-flex" style="{{ $confirming === $row->id ? 'width: 125px' : '' }}">
        <a href="{{ route('admin.cms.emailTemplate.edit', $row->id) }}" data-toggle="tooltip" title="Edit Template" class="btn btn-info btn-sm mr-2"><i class="fas fa-pen"></i></a>
        @if ($confirming === $row->id)
            <a href="javascript:void(0)" data-toggle="tooltip" title="Close" wire:click="cancelDelete" class="btn btn-danger btn-sm cancel_delete mr-2"><i class="fa fa-times"></i></a>
        @else
            <a href="javascript:void(0)" data-toggle="tooltip" title="Remove Template" wire:click="confirmDelete({{ $row->id }})" class="btn btn-danger btn-sm delete_item mr-2"><i class="fas fa-trash"></i></a>
        @endif
    </div>
    @if ($confirming === $row->id)
        <a href="javascript:void(0)" data-toggle="tooltip" title="Are You Sure? Want to delete" wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm delete_item mt-2 mr-2">Are You Sure?</a>
    @endif
</x-livewire-tables::table.cell>


<x-livewire-tables::table.cell>{{ $row->id }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->title }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->subject }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->scheduled_time }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->schedule_desc }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->command }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->role }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell><x-badges.default>{{ $row->is_active }}</x-badges.default></x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->created_at }}</x-livewire-tables::table.cell> --}}
