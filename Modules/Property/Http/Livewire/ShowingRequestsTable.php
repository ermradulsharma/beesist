<?php

namespace Modules\Property\Http\Livewire;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\ShowingApplication;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ShowingRequestsTable extends DataTableComponent
{
    public $showingId;

    protected $model = ShowingApplication::class;

    public $account_id;

    public $rejectModal;

    protected $listeners = ['openRejectModal' => 'openRejectModal'];

    public function mount($account_id = null, $showingId = null)
    {
        $this->account_id = $account_id;
        $this->showingId = $showingId;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'desc');
    }

    public function delete($id)
    {
        ShowingApplication::findOrFail($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Scheduled Property Showing Deleted Successfully!');
    }

    public function approved($approvedId)
    {
        try {
            $propertyShowing = ShowingApplication::findOrFail($approvedId);
            $propertyShowing->update(['status' => '1']);
            $this->dispatch('swal:modal', type: 'success', message: 'Scheduled Property showing approved successfully!');
            $this->dispatch('refreshShowingTable');
        } catch (ModelNotFoundException $e) {
            $this->dispatch('swal:modal', type: 'error', message: 'Property showing not found!');
        } catch (\Exception $e) {
            $this->dispatch('swal:modal', type: 'error', message: 'An error occurred while approving the property showing.');
            Log::error($e->getMessage());
        }
    }

    public function rejected($id)
    {
        $this->rejectModal = true;
        $this->dispatch('openRejectModal', $id);

        // ShowingApplication::findOrFail($id)->update(['status' => '2']);
        // $this->dispatch('swal:modal', type: 'success', message: 'Scheduled Property showing rejected successfully!');
    }

    public function columns(): array
    {
        return [
            Column::make(__('Id'), 'id')->sortable()->hideIf(true),
            Column::make(__('Image'), 'property_id')->format(function ($value, $row) {
                $url = $row->property->featured_image['url'] ?? null;
                $imageSrc = $url ? asset('uploads/properties/' . $row->property->id . '/property_photos/thumbs/' . $url) : asset('images/bolld-placeholder.png');
                $propertyUrl = route('property.single', $row->property->slug);

                return '<a href="' . $propertyUrl . '" target="_blank"><img src="' . $imageSrc . '" alt="' . $row->property->name . '" class="card-img" style="width: 44px; min-width: 50px;"></a>';
            })->html(),
            Column::make(__('Title'), 'property_id')->format(function ($value, $row) {
                return $row->property->title;
            })->searchable()->sortable(),
            Column::make(__('Address'), 'property_id')->format(function ($value, $row) {
                return $row->property->address;
            })->searchable()->sortable(),
            Column::make(__('Agent'), 'agent_id')->format(function ($value, $row) {
                return $row->agent->name ?? '';
            })->searchable()->sortable(),

            Column::make(__('First Name'))->searchable()->sortable(),
            Column::make(__('Last Name'))->searchable()->sortable(),
            Column::make(__('Email'))->searchable()->sortable(),
            Column::make(__('Phone'))->searchable()->sortable(),

            Column::make(__('Created At'), 'created_at')->format(function ($value) {
                return $value->format('M j, Y');
            })->sortable(),
            Column::make(__('Showing Type'))->searchable()->sortable(),
            Column::make(__('Comments'))->sortable()->hideIf(true),
            Column::make(__('Status'))->format(function ($value) {
                return '<span class="badge badge-' . ($value == 0 ? 'warning' : ($value == 1 ? 'success' : ($value == 2 ? 'danger' : 'primary'))) . '">' . ($value == 0 ? 'Pendding' : ($value == 1 ? 'Approve' : ($value == 2 ? 'Reject' : 'Request'))) . '</span>';
            })->searchable()->sortable()->html(),

            Column::make('Actions')->label(function ($row, Column $column) {
                $commentButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="' . $row->comments . ' &#10; Schedule Different Time : ' . Carbon::parse($row->different_time)->format('F j, Y h:i A') . '" class="btn btn-primary btn-sm mr-2"><i class="fas fa-comment"></i></a>';
                $approveButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Approve Request" wire:confirm="Are You Sure? Want to approve" wire:click="approved(' . $row->id . ')" class="btn btn-success btn-sm approved_item mr-2"><i class="fas fa-check"></i></a>';
                $rejectButton = '<a href="javascript:void(0)" data-toggle="modal" data-toggle="tooltip" wire:confirm="Are You Sure? Want to reject" data-showing_id="' . $row->id . '" data-target="#rejectionModal" title="Decline Request" class="btn btn-danger btn-sm rejected_item mr-2"><i class="fas fa-ban"></i></a>';
                $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove Request" wire:confirm="Are You Sure? Want to delete" wire:click="delete(' . $row->id . ')" class="btn btn-danger btn-sm delete_item mr-2"><i class="fas fa-trash"></i></a>';

                switch ($row->status) {
                    case '1':
                        $buttons = $commentButton . $rejectButton . $deleteButton;
                        break;
                    case '2':
                        $buttons = $commentButton . $approveButton . $deleteButton;
                        break;
                    default:
                        $buttons = $commentButton . $approveButton . $rejectButton . $deleteButton;
                        break;
                }

                return '<div class="d-flex">' . $buttons . '</div>';
            })->html(),

        ];
    }

    public function filters(): array
    {
        return [
            'page_type' => SelectFilter::make('Page Type')->options([
                '' => 'Any',
                'default' => 'Default',
                'landing' => 'Landing',
            ]),
            SelectFilter::make('Status')->options([
                '' => 'All',
                '1' => 'Active',
                '0' => 'In-active',
            ])->filter(function (Builder $builder, $value) {
                if ($value !== '') {
                    $builder->where('properties.status', $value);
                }
            }),
        ];
    }

    public function builder(): Builder
    {
        // dd($this->showingId);
        if ($this->showingId) {
            return ShowingApplication::whereIn('showing_id', [$this->showingId]);
        }
        $user = Auth::user();
        if ($user->hasAllAccess()) {
            return ShowingApplication::query();
        } else {
            $query = UserEntity::query()->where('entity_key', 'property');
            if ($this->account_id && $user->hasManagerAccess()) {
                $query->where('account_id', $this->account_id);
                $entityIds = $query->pluck('entity_value');

                return ShowingApplication::whereIn('property_id', $entityIds);
            }
            if ($user->hasRole('Agent')) {
                return ShowingApplication::whereIn('agent_id', [$user->id]);
            }
        }
    }

    public function getFilter($filterName)
    {
        return $this->filters[$filterName] ?? null;
    }
}
