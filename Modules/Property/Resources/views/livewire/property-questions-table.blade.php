{{-- <x-livewire-tables::table.cell>
    <div style="min-width:50px">
        <a href="{{ route('property.single', $row->property->slug) }}" class="property-image" target="_balnk">
            <img src="{{ $row->property->featured_image ? asset('uploads/properties/' . $row->property->id . '/property_photos/thumbs/' . $row->property->featured_image['url']) : asset('images/bolld-placeholder.png') }}" style="width:44px" class="card-img" alt="{{ $row->property->title }}">
        </a>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div style="min-width:100px">
        <button onclick="answer({{ $row->id }})" class="btn btn-success btn-sm approve_item" data-toggle="tooltip" title="{{ $row->status == 1 ? 'Answered' : 'Answer Question' }}">
            <i class="fa fa-fw fa-{{ $row->status == 1 ? 'eye' : 'question' }}"></i>
        </button>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>{{ @$row->property->title }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ @$row->tenant->name }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ @$row->tenant->email }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ @$row->tenant->phone }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->created_at }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{!! $row->status == 0 ? '<span class="badge badge-warning">Pending</span>' : '<span class="badge badge-success">Answered</span>' !!}</x-livewire-tables::table.cell>
 --}}
