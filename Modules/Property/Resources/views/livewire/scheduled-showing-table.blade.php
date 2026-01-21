{{-- <x-livewire-tables::table.cell style="text-align: center;">
    <div style="min-width:50px">
        <a href="{{ route('property.single', $row->property->slug) }}" class="property-image">
            <img src="{{ $row->property->featured_image ? asset('uploads/properties/' . $row->property->id . '/property_photos/thumbs/' . $row->property->featured_image['url']) : asset('images/bolld-placeholder.png') }}" style="width:44px" class="card-img" alt="{{ $row->property->title }}">
        </a>
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->property->title }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->property->address }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->showing_date }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <a class="btn btn-{{ $row->showing_applications->count() > 0 ? 'success' : 'primary' }} btn-sm" href="{{ route('admin.showings.requests', ['showingId' => $row->id ]) }}" target="_blank">{{ $row->showing_applications->count() }}</a>
    @if($row->showing_applications->count() > 0)
        <a class="btn btn-success btn-sm" href="{{ route('admin.showings.requests', ['showingId' => $row->id ]) }}" target="_blank">
            {{ $row->showing_applications->count() }}
        </a>
    @else
        <span class="btn btn-primary btn-sm">{{ $row->showing_applications->count() }}</span>
    @endif
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->limit }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->agent?->name }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell style="text-align: center;"><span data-toggle="tooltip" title="{!! $row->comments !!}" class="btn btn-primary btn-sm" style="padding: 2px;"><i class="fas fa-comment" style="font-size: 10px;"></i></span></x-livewire-tables::table.cell>
<x-livewire-tables::table.cell style="text-align: center;"><i class="text-{{ $row->status == 0 ? 'warning' : ($row->status == 1 ? 'success' : 'danger') }} fas fa-circle" style="font-size: 10px;" data-toggle="tooltip" title="{{ $row->status == 0 ? 'Pendding' : ($row->status == 1 ? 'Approved' : 'Rejected') }}"></i></x-livewire-tables::table.cell>
<x-livewire-tables::table.cell style="text-align: center;">
    <div style="min-width:100px">
        <a href="javascript:void(0)"
        data-showing_id="{{ $row->id}}"
        data-prop_id="{{ $row->prop_id }}"
        data-title="{{ $row->property->title }}"
        data-showing_date="{{ $row->showing_date }}"
        data-agent_id="{{ $row->agent_id }}"
        data-agent_name="{{ $row->agent?->name }}"
        data-limit="{{ $row->limit }}"
        data-comments="{!! $row->comments !!}"
        data-toggle="modal" data-target="#EditShowingModal" title="Edit Showing" class="btn btn-primary btn-sm edit_showing" style="padding: 2px;" data-propid="{{ $row->id }}" data-propname="{{ $row->id }}"><i class="fas fa-pen" style="font-size: 10px;"></i></a>
        @if($confirmApproved  === $row->id)
            <button type="button" data-toggle="tooltip" title="Close" wire:click="cancelApproved" class="btn btn-danger btn-sm cancel_approved" style="padding: 2px"><i class="fa fa-times" style="font-size: 10px;"></i></button>
            <button type="button" data-toggle="tooltip" title="Are You Sure? Want to approved" wire:click="approved({{ $row->id }})" class="btn btn-success btn-sm approved_item">Are You Sure?</button>
        @else
            <button type="button" data-toggle="tooltip" title="Approve Showing" wire:click="confirmApproved({{ $row->id }})" class="btn btn-success btn-sm approved_item" style="padding: 2px"><i class="fas fa-check" style="font-size: 10px;"></i></button>
        @endif

        @if($confirmRejected  === $row->id)
            <button type="button" data-toggle="tooltip" title="Close" wire:click="cancelRejected" class="btn btn-danger btn-sm cancel_rejected" style="padding: 2px"><i class="fa fa-times" style="font-size: 10px;"></i></button>
            <button type="button" data-toggle="tooltip" title="Are You Sure? Want to rejected" wire:click="rejected({{ $row->id }})" class="btn btn-success btn-sm rejected_item">Are You Sure?</button>
        @else
            <button type="button" data-toggle="tooltip" title="Reject Showing" wire:click="confirmRejected({{ $row->id }})" class="btn btn-danger btn-sm rejected_item" style="padding: 2px"><i class="fas fa-ban" style="font-size: 10px;"></i></button>
        @endif
        @if ($confirming === $row->id)
            <button type="button" data-toggle="tooltip" title="Close" wire:click="cancelDelete" class="btn btn-danger btn-sm cancel_delete" style="padding: 2px"><i class="fa fa-times" style="font-size: 10px;"></i></button>
            <button type="button" data-toggle="tooltip" title="Are You Sure? Want to delete" wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm delete_item mt-2">Are You Sure?</button>
        @else
            <button type="button" data-toggle="tooltip" title="Remove" wire:click="confirmDelete({{ $row->id }})" class="btn btn-danger btn-sm delete_item" style="padding: 2px"><i class="fas fa-trash" style="font-size: 10px;"></i></button>
        @endif
    </div>
</x-livewire-tables::table.cell>
 --}}
