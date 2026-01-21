{{-- <x-livewire-tables::table.cell>
    <i data-toggle="tooltip" title="Showing Type: {{ $row->showing_type }} <br> Date: {{ $row->created_at }}  {{ $row->comments != '' ? '<br> Comments: ' . $row->comments : '' }}  {{ ($row->status == 2 && $row->reason_of_rejection != '') ? '<br> Reason: ' . $row->reason_of_rejection : '' }}" data-html="true" class="fas fa-comment-dots" style="padding: 2px; color : green;"></i>
</x-livewire-tables::table.cell>


<x-livewire-tables::table.cell>
    <div style="min-width:50px">
        <a href="{{ route('property.single', $row->property->slug) }}" class="property-image">
            <img src="{{ $row->property->featured_image ? asset('uploads/properties/' . $row->property->id . '/property_photos/thumbs/' . $row->property->featured_image['url']) : asset('images/bolld-placeholder.png') }}" style="width:44px" class="card-img" alt="{{ $row->property->title }}">
        </a>
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->property->title }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->property->address }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->first_name }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->last_name }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->email }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->phone }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->agent->name ?? '' }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell style="text-align: center;"><i class="text-{{ $row->status == 0 ? 'warning' : ($row->status == 1 ? 'success' : 'danger') }} fas fa-circle" style="font-size: 10px;" data-toggle="tooltip" title="{{ $row->status == 0 ? 'Pendding' : ($row->status == 1 ? 'Approved' : 'Rejected') }}"></i></x-livewire-tables::table.cell>
<x-livewire-tables::table.cell style="text-align: center;">
    <div style="width:85px">
        <button type="button" data-toggle="tooltip" title="Approve" onclick="approve({{ $row->id }})" class="btn btn-success btn-sm approved_item" style="padding: 2px"><i class="fas fa-check" style="font-size: 10px;"></i></button>
        <button type="button" data-showing_id="{{ $row->id}}" title="Reject" data-toggle="modal" data-toggle="tooltip" data-target="#rejectionModal" class="btn btn-danger btn-sm rejected_item" style="padding: 2px"><i class="fas fa-ban" style="font-size: 10px;"></i></button>
        @if ($confirming === $row->id)
            <button type="button" data-toggle="tooltip" title="Close" wire:click="cancelDelete" class="btn btn-danger btn-sm cancel_delete" style="padding: 2px"><i class="fa fa-times" style="font-size: 10px;"></i></button>
            <button type="button" data-toggle="tooltip" title="Are You Sure? Want to delete" wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm delete_item mt-2">Are You Sure?</button>
        @else
            <button type="button" data-toggle="tooltip" title="Remove" wire:click="confirmDelete({{ $row->id }})" class="btn btn-danger btn-sm delete_item" style="padding: 2px"><i class="fas fa-trash" style="font-size: 10px;"></i></button>
        @endif
    </div>
</x-livewire-tables::table.cell>


 --}}
