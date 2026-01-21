{{-- <x-livewire-tables::table.cell>
    <div style="min-width:100px">
        <a href="{{ route('admin.buildings.edit', $row->id) }}" data-toggle="tooltip" title="Send Aggreement" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i></a>
        <a href="{{ route('admin.buildings.edit', $row->id) }}" data-toggle="tooltip" title="Decline Aggreement" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>

        @if ($confirming === $row->id)
            <button type="button" data-toggle="tooltip" title="Confirm Deletion" wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm delete_item">Confirm Deletion</button>
        @else
            <button type="button" data-toggle="tooltip" title="Delete Item" wire:click="confirmDelete({{ $row->id }})" class="btn btn-danger btn-sm delete_item"><i class="fas fa-trash"></i></button>
        @endif
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->id }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->userDetails->name ?? '' }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->userDetails->email ?? '' }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->userDetails->phone ?? '' }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->propertyDetails->title ?? '' }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    @if($row->status == 0)
        <i class="text-warning fa fa-circle" data-toggle="tooltip" title="Pending" data-original-title="Pending"></i>
    @elseif($row->status == 1)
        <i class="text-success fa fa-circle" data-toggle="tooltip" title="Approved" data-original-title="Approved"></i>
    @elseif($row->status == 2)
        <i class="text-danger fa fa-circle" data-toggle="tooltip" title="Rejected" data-original-title="Rejected"></i>
    @endif
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->created_at }}</x-livewire-tables::table.cell>
 --}}
