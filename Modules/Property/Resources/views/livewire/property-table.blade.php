{{-- <x-livewire-tables::table.cell>
    <div style="min-width:100px">
        <a href="{{ route('admin.properties.edit', $row->id) }}" data-toggle="tooltip" title="Edit Page" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
        <a target="_blank" href="{{ route('property.single', $row->slug) }}" data-toggle="tooltip" title="View Page" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
        @if ($confirming === $row->id)
            <button type="button" data-toggle="tooltip" title="Are You Sure? Want to delete" wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm delete_item">Are You Sure?</button>
        @else
            <button type="button" data-toggle="tooltip" title="Delete PMA" wire:click="confirmDelete({{ $row->id }})" class="btn btn-danger btn-sm delete_item"><i class="fas fa-trash"></i></button>
        @endif
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell style="text-align: center;">
    <div style="min-width:50px">
        <a href="{{ route('property.single', $row->slug) }}" class="property-image">
            <img src="{{ $row->featured_image ? asset('uploads/properties/' . $row->id . '/property_photos/thumbs/' . $row->featured_image['url']) : asset('images/bolld-placeholder.png') }}" style="width:44px" class="card-img" alt="{{ $row->title }}">
        </a>
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->id }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->title }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->address }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->beds }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->baths }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->sleeps }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->area }} sqft</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->rate }}/ {{ $row->rateper}}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->created_at }}</x-livewire-tables::table.cell>
{{-- <x-livewire-tables::table.cell>{{ $row->updated_at }}</x-livewire-tables::table.cell> --}}
 --}}
