{{-- <style>
    .tentancy a {
        padding: 0.1rem !important;
    }
</style>
<x-livewire-tables::table.cell>
    <div class="tentancy" style="width: 112px; min-width: 113px;">
        <a href="{{ route('tenant.viewTenantAgreement', ['action' => $row->form_step == 4 ?  'edit' : 'view', 'form_id' => Crypt::encryptString($row->id), 'access_token' => $row->access_token]) }}" class="btn btn-{{ $row->form_step == 4 ?  'primary' : 'info' }} btn-sm approve_item" data-toggle="tooltip" title="{{ $row->form_step == 4 ?  'Approve' : 'View Agreement' }}" target="_blank"><i class="text-white fas fa-{{ $row->form_step == 4 ?  'pen' : 'eye' }}" style="font-size: 10px"></i></a>
        @if ($confirmRejected === $row->id)
            <a href="javascript:void(0)" data-toggle="tooltip" title="Close" wire:click="cancelRejected" class="btn btn-danger btn-sm cancel_rejected" style="padding: 2px"><i class="fa fa-times" style="font-size: 10px;"></i></a>
            <a href="javascript:void(0)" data-toggle="tooltip" title="Are You Sure? Want to decline" wire:click="rejected({{ $row->id }})" class="btn btn-danger btn-sm reject_item mt-2">Are You Sure?</a>
        @else
            <a href="javascript:void(0)" data-toggle="tooltip" title="Decline" wire:click="confirmRejected({{ $row->id }})" class="btn btn-danger btn-sm reject_item" style="padding: 2px"><i class="fas fa-times" style="font-size: 10px;"></i></a>
        @endif
        @if ($confirming === $row->id)
            <a href="javascript:void(0)" data-toggle="tooltip" title="Close" wire:click="cancelDelete" class="btn btn-danger btn-sm cancel_delete" style="padding: 2px"><i class="fa fa-times" style="font-size: 10px;"></i></a>
            <a href="javascript:void(0)" data-toggle="tooltip" title="Are You Sure? Want to delete" wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm delete_item mt-2">Are You Sure?</a>
        @else
            <a href="javascript:void(0)" data-toggle="tooltip" title="Remove" wire:click="confirmDelete({{ $row->id }})" class="btn btn-danger btn-sm delete_item" style="padding: 2px"><i class="fas fa-trash" style="font-size: 10px;"></i></a>
        @endif
        @if ($row->form_step == 5 && $row->status == 1)
            <a href="{{ route('admin.tenant.savePdf', ['type' => 'agreement', 'id' => Crypt::encryptString($row->id), 'access_token' => $row->access_token ]) }}" target="_blank" class="btn btn-success btn-sm" data-toggle="tooltip" title="Download Tenancy Agreement"><i class="text-white fas fa-file-pdf" style="font-size: 10px"></i></a>
            <a href="{{ route('admin.tenant.savePdf', ['type' => 'disclosure', 'id' => Crypt::encryptString($row->id), 'access_token' => $row->access_token ]) }}" target="_blank" class="btn btn-success btn-sm" data-toggle="tooltip" title="Download Tenancy Disclosure"><i class="text-white fas fa-file-pdf" style="font-size: 10px"></i></a>
        @endif
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell style="text-align: center;">{{ $row->id }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell style="text-align: center;">{{ $row->number_tenants }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->property->title }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->tenant->name ?? '' }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->tenant->email }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->tenant->phone }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>{{ $row->created_at ?? '' }}</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell style="text-align: center;"><i class="text-{{ $row->status == 0 ? 'warning' : ($row->status == 1 ? 'success' : 'danger') }} fas fa-circle" style="font-size: 10px;" data-toggle="tooltip" title="{{ $row->status == 0 ? 'Pendding' : ($row->status == 1 ? 'Approved' : 'Declined') }}"></i></x-livewire-tables::table.cell>
 --}}
