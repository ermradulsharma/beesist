{{-- <x-livewire-tables::table.cell>
    <div style="min-width:50px">
        <a href="{{ route('property.single', $row->slug) }}" class="property-image">
            <img src="{{ $row->featured_image ? asset('uploads/properties/' . $row->id . '/property_photos/thumbs/' . $row->featured_image['url']) : asset('images/bolld-placeholder.png') }}" style="width:44px" class="card-img" alt="{{ $row->title }}">
        </a>
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->title }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->address }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->beds }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->baths }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->area }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->rate ? $row->rate . '/' . $row->rateper : 'N/A' }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <div class="d-flex" style="gap: 5px;">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#scheduleModal" title="Schedule Showing" class="btn btn-success btn-sm" style="padding: 2px;" data-propid="{{ $row->id }}" data-propname="{{ $row->title }}"><i class="fas fa-clock" style="font-size: 10px;"></i></a>
        <a target="_blank" href="{{ route('property.single', $row->slug) }}" data-toggle="tooltip" title="View Property" class="btn btn-info btn-sm" style="padding: 2px;"><i class="fas fa-eye" style="font-size: 10px;"></i></a>
    </div>
</x-livewire-tables::table.cell>
 --}}
