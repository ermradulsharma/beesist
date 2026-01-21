<?php

namespace Modules\Property\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\PropertyShowing;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ScheduledShowingTable extends DataTableComponent
{
    public $modal = PropertyShowing::class;

    public $account_id;

    public function mount($account_id = null)
    {
        $this->account_id = $account_id;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setDefaultSort('id', 'desc');
    }

    public function approved($approvedId)
    {
        try {
            $propertyShowing = PropertyShowing::findOrFail($approvedId);
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
        PropertyShowing::findOrFail($id)->update(['status' => '2']);
        $this->dispatch('swal:modal', type: 'success', message: 'Scheduled Property showing rejected successfully!');
    }

    public function delete($id)
    {
        PropertyShowing::findOrFail($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Scheduled Property Showing Deleted Successfully!');
    }

    public function columns(): array
    {
        return [
            Column::make(__('#Id'), 'id')->sortable(),
            Column::make(__('Image'), 'prop_id')->format(function ($value, $row) {
                $property = $row->property;
                $url = $property->featured_image['url'] ?? null;
                $slug = $property->slug;
                $imageSrc = $url && File::exists(public_path('uploads/properties/'.$property->id.'/property_photos/thumbs/'.$url)) ? asset('uploads/properties/'.$property->id.'/property_photos/thumbs/'.$url) : asset('images/bolld-placeholder.png');
                $propertyUrl = $slug ? route('property.single', $slug) : '#';

                return '<a href="'.$propertyUrl.'" target="_blank"><img src="'.$imageSrc.'" alt="'.($property->title ?? 'Property Title').'" class="card-img" style="width: 44px; min-width: 50px;"></a>';
            })->html(),
            Column::make(__('Title'), 'prop_id')->format(function ($value, $row) {
                return $row->property->title;
            })->searchable()->sortable(),
            Column::make(__('Address'), 'prop_id')->format(function ($value, $row) {
                return $row->property->address;
            })->searchable()->sortable(),
            Column::make(__('Agent'), 'agent_id')->format(function ($value, $row) {
                return $row->agent->name ?? '';
            })->searchable()->sortable(),
            Column::make(__('Showing Date'), 'showing_date')->searchable()->sortable(),
            Column::make(__('Attendees'))->label(function ($row, Column $column) {
                $url = route(rolebased().'.showings.requests', ['showingId' => $row->id]);
                if ($row->showing_applications->count() > 0) {
                    return '<a class="btn btn-success btn-sm" href="'.$url.'" target="_blank">'.$row->showing_applications->count().'</a>';
                } else {
                    return '<span class="btn btn-primary btn-sm">'.$row->showing_applications->count().'</span>';
                }
            })->html(),
            Column::make(__('Limit'), 'limit')->searchable()->sortable(),
            Column::make(__('Created At'), 'created_at')->format(function ($value) {
                return $value->format('M j, Y');
            })->sortable(),
            Column::make(__('Comment'), 'comments')->format(function ($value, $row) {
                $showing_date = \Carbon\Carbon::parse($row->showing_date);

                return '<a href="javascript:void(0)" data-toggle="tooltip" title="'.$value.' &#10; Schedule Time : '.$showing_date->format('F j, Y h:i A').'" class="btn btn-primary btn-sm mr-2"><i class="fas fa-comment"></i></a>';
            })->html(),
            Column::make(__('Status'))->format(function ($value) {
                return '<i class="text-'.($value == 0 ? 'warning' : ($value == 1 ? 'success' : 'danger')).' fas fa-circle" style="font-size: 10px;" data-toggle="tooltip" title="'.($value == 0 ? 'Pending' : ($value == 1 ? 'Approved' : 'Rejected')).'"></i>';
            })->searchable()->html(),
            Column::make('Actions')->label(function ($row, Column $column) {
                // Edit Button
                $dataTitle = $row->property ? $row->property->title : '';
                $editButton = '';
                if (Auth::user()->canAny(['user.access.showing.scheduled.edit', 'user.access.showing.request.edit'])) {
                    $editButton = '<a href="javascript:void(0)"
                        data-showing_id="'.$row->id.'"
                        data-prop_id="'.$row->prop_id.'"
                        data-title="'.$dataTitle.'"
                        data-showing_date="'.$row->showing_date.'"
                        data-agent_id="'.$row->agent_id.'"
                        data-agent_name="'.$row->agent->name.'"
                        data-limit="'.$row->limit.'"
                        data-comments="'.$row->comments.'"
                        data-toggle="modal" data-target="#EditShowingModal" title="Edit Showing" class="btn btn-primary btn-sm edit_showing mr-2" data-propid="'.$row->id.'" data-propname="'.$row->id.'"><i class="fas fa-pen"></i></a>';
                }

                // Approve Button
                $approveButton = '';
                if (Auth::user()->canAny(['user.access.showing.scheduled.approve', 'user.access.showing.request.approve'])) {
                    $approveButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Approve Showing" wire:confirm="Are You Sure? Want to approve" wire:click="approved('.$row->id.')" class="btn btn-success btn-sm approved_item mr-2"><i class="fas fa-check"></i></a>';
                }

                // Reject button
                $rejectButton = '';
                if (Auth::user()->canAny(['user.access.showing.scheduled.reject', 'user.access.showing.request.reject'])) {
                    $rejectButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Reject Showing" wire:confirm="Are You Sure? Want to reject" wire:click="rejected('.$row->id.')" class="btn btn-danger btn-sm reject_item mr-2"><i class="fas fa-ban"></i></a>';
                }

                // Delete Button
                $deleteButton = '';
                if (Auth::user()->canAny(['user.access.showing.scheduled.remove', 'user.access.showing.request.remove'])) {
                    $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove Showing" wire:confirm="Are You Sure? Want to delete" wire:click="delete('.$row->id.')" class="btn btn-danger btn-sm delete_item mr-2"><i class="fas fa-trash"></i></a>';
                }

                switch ($row->status) {
                    case '1':
                        $buttons = $editButton.$rejectButton.$deleteButton;

                        break;
                    case '2':
                        $buttons = $editButton.$approveButton.$deleteButton;

                        break;
                    default:
                        $buttons = $editButton.$approveButton.$rejectButton.$deleteButton;

                        break;
                }

                return '<div class="d-flex">'.$buttons.'</div>';
            })->html(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Page Type')->options([
                '' => 'All',
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
            DateFilter::make('Showing Date From')
                ->filter(function (Builder $builder, $value) {
                    if ($value !== '') {
                        $builder->whereDate('showing_date', '>=', $value);
                    }
                }),

            DateFilter::make('Showing Date To')
                ->filter(function (Builder $builder, $value) {
                    if ($value !== '') {
                        $builder->whereDate('showing_date', '<=', $value);
                    }
                }),
        ];
    }

    public function builder(): Builder
    {
        $user = Auth::user();
        if ($user->hasAllAccess()) {
            return PropertyShowing::query();
        } else {
            $query = UserEntity::query()->where('entity_key', 'propertyShowing');
            if ($this->account_id && $user->hasManagerAccess()) {
                $query->where('account_id', $this->account_id);
                $entityIds = $query->pluck('entity_value');

                return PropertyShowing::whereIn('id', $entityIds);
            }
            if ($user->hasRole('Agent')) {
                return PropertyShowing::whereIn('agent_id', [$user->id]);
            }
        }
    }

    public function getFilter($filterName)
    {
        return $this->filters[$filterName] ?? null;
    }
}
