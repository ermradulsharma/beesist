<?php

namespace Modules\RentalApplication\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Modules\RentalApplication\Entities\RentalApplication;
use Modules\Tenant\Notifications\TenantAgreementNotification;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class RentalApplicationTable extends DataTableComponent
{
    public $model = RentalApplication::class;
    public $account_id;
    protected $listeners = ['confirmSendAgreement', 'sendAgreement'];
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
            $propertyShowing = $this->model::findOrFail($approvedId);
            $propertyShowing->update(['status' => '2']);
            $this->dispatch('swal:modal', type: 'success', message: 'Rental Application approved Successfully!');
            $this->dispatch('refreshShowingTable');
        } catch (ModelNotFoundException $e) {
            $this->dispatch('swal:modal', type: 'error', message: $e->getMessage());
        } catch (\Exception $e) {
            $this->dispatch('swal:modal', type: 'error', message: $e->getMessage());
            Log::error($e->getMessage());
        }
    }

    public function sendAgreement($id)
    {
        $agreement = $this->model::find($id);
        $content = 'Please fill Tenancy Agreement: <a href="' . route('tenant.agreementForm', ['form_id' => $agreement->id]) . '">Click Here</a>';
        $subject = 'For Rent Central Tenancy Agreement';
        $first_name = $agreement->first_name;
        $notification = new TenantAgreementNotification($content, $subject, $first_name);
        $agreement->notify($notification);
        $this->dispatch('swal:modal', type: 'success', message: 'Tenancy Agreement Send Successfully!');
    }

    public function columns(): array
    {
        return [
            Column::make(__('Id'), 'id')->sortable()->searchable(),
            Column::make(__('User Id'), 'user_id')->sortable()->hideIf(true),
            Column::make(__('Property Id'), 'prop_id')->sortable()->hideIf(true),
            Column::make(__('Action'))->label(function ($row) {
                $leasingButton = '';
                if (Auth::user()->can('user.access.rental.view')) {
                    $leasingUrl = route(rolebased() . '.rental_application.leasingApplication', ['id' => encrypt($row->id)]);
                    $leasingButton = '<a href="' . $leasingUrl . '" data-toggle="tooltip" title="View Leasing" class="btn btn-success btn-sm p-1 mr-1"><i class="fas fa-info m-0" style="font-size: 11px;"></i></a>';
                }

                $viewButton = '';
                if (Auth::user()->can('user.access.rental.application.view')) {
                    $viewtUrl = route('rental_application.rentalApplicationPreviw', ['id' => encrypt($row->id)]);
                    $viewButton = '<a target="_blank" href="' . $viewtUrl . '" data-toggle="tooltip" title="View Application" class="btn btn-primary btn-sm p-1 mr-1"><i class="fas fa-eye m-0" style="font-size: 11px;"></i></a>';
                }

                $resumeButton = '';
                if (Auth::user()->can('user.access.rental.resume')) {
                    $resumeUrl = route('rental_application.resumeApply', ['applicationId' => encrypt($row->id), 'propertyId' => encrypt($row->prop_id)]);
                    $resumeButton = '<a target="_blank" href="' . $resumeUrl . '" target="_blank" data-toggle="tooltip" title="Resume Application" class="btn btn-info btn-sm p-1 mr-1"><i class="fas fa-clock m-0" style="font-size: 11px;"></i></a>';
                }

                $deleteButton = '';
                if (Auth::user()->can('user.access.rental.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Remove" wire:confirm="Are You Sure? Want to remove application" wire:click="delete(' . $row->id . ')" class="btn btn-danger btn-sm p-1 mr-1"><i class="fas fa-trash m-0" style="font-size: 11px;"></i></a>';
                }

                // ========= For Approve Button
                $total_questions = $row->applicantScreenings()->count();
                $answered_questions = $row->applicantScreenings()->where('answer', 1)->whereIn('question_type', ['employer', 'landlord'])->whereNotNull('answer_guest')->count();
                $otherQuestion = $row->applicantScreenings()->where('answer', 1)->whereIn('question_type', ['other'])->whereNull('answer_guest')->count();
                $totalAnswered = $answered_questions + $otherQuestion;
                $percent = ($total_questions > 0) ? intval((($totalAnswered * 100) / $total_questions)) : 0;

                $approveButton = '';
                if (Auth::user()->canAny(['user.access.showing.scheduled.approve', 'user.access.showing.request.approve'])) {
                    $approveButton = '<a href="javascript:void(0)" data-toggle="tooltip" title="Approve Application" wire:confirm="Are You Sure? Want to approve application" wire:click="approved(' . $row->id . ')" class="btn btn-success btn-sm p-1 mr-1"><i class="fas fa-check m-0" style="font-size: 11px;"></i></a>';
                }

                $sendTenancyAgreementButton = '';
                if (Auth::user()->can('user.access.rental.aggrement.send')) {
                    $sendAgreementUrl = route('tenant.agreementForm', ['form_id' => Crypt::encryptString($row->id)]);
                    $sendTenancyAgreementButton = '<a href="' . $sendAgreementUrl . '" data-toggle="tooltip" title="Send Tenancy Agreement" class="btn btn-success btn-sm p-1 mr-1" target="_blank"><i class="fas fa-paper-plane m-0" style="font-size: 11px;"></i></a>';
                }
                $buttons = $leasingButton . $viewButton . ($row->status == 0 ? $resumeButton : (($percent == 100 && $row->status != 2) ? $approveButton : ($row->status == 2 ? $sendTenancyAgreementButton : ''))) . $deleteButton;
                return '<div class="d-flex align-items-center">' . $buttons . '</div>';
            })->html()->collapseOnTablet(),
            Auth::user()->hasRole('Property Manager') ? Column::make(__('Assign To'), 'property.agentDetail.name')->searchable() : Column::make(__('Managed By'))->label(function ($row) {
                return $row->userEntity->userDetails->name ?? '';
            }),
            Column::make(__('Title'), 'property.title')->searchable()->sortable(),
            Column::make(__('First Name'), 'first_name')->hideIf(true)->searchable(),
            Column::make(__('Last Name'), 'last_name')->hideIf(true)->searchable(),
            Column::make(__('Name'))->label(function ($value) {
                return $value->name;
            })->sortable()->searchable(),
            Column::make(__('E-mail'), 'email')->sortable()->searchable(),
            Column::make(__('City'), 'city')->sortable()->searchable()->collapseOnTablet(),
            Column::make(__('Status'))->format(function ($value) {
                $labels = ['Draft', 'New', 'Approved', 'Rejected', 'Canceled', 'Undecided', 'Deferred', 'Added to lease'];
                return isset($labels[$value]) ? $labels[$value] : 'Unknown';
            })->searchable()->sortable(),
            Column::make(__('Progress'))->label(function ($row) {
                $total_questions = $row->applicantScreenings()->count();
                $answered_questions = $row->applicantScreenings()->where('answer', 1)->whereIn('question_type', ['employer', 'landlord'])->whereNotNull('answer_guest')->count();
                $otherQuestion = $row->applicantScreenings()->where('answer', 1)->whereIn('question_type', ['other'])->whereNull('answer_guest')->count();
                $totalAnswered = $answered_questions + $otherQuestion;
                $percent = ($total_questions > 0) ? intval((($totalAnswered * 100) / $total_questions)) : 0;
                $style = $percent == 0 ? 'color: #000000; background-color: transparent;' : 'width:' . $percent . '%';
                $style2 = $percent == 0 ? 'color: #000000; background-color: transparent;' : ($percent > 27 ? 'color: #FFFFFF;' : 'color: #000000;');

                return '<div class="progress position-relative">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="' . $percent . '" style="' . $style . '"></div>
                            <span class="progressPercent d-flex align-items-center justify-content-center position-absolute" style="' . $style2 . '">' . $percent . ' %</span>
                        </div>';
            })->html()->collapseOnTablet(),
            Column::make(__('Create Date'), 'created_at')->sortable()->hideIf(true),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Status')->options([
                '' => 'All',
                '0' => 'Draft',
                '1' => 'New',
                '2' => 'Approved',
                '3' => 'Rejected',
                '4' => 'Canceled',
                '5' => 'Undecided',
                '6' => 'Deferred',
                '7' => 'Added to lease',
            ])->filter(function (Builder $builder, $value) {
                if ($value !== '') {
                    $builder->where('rental_applications.status', $value); // Specify table name or alias
                }
            }),
            TextFilter::make('Manager Name')->config([
                'placeholder' => 'Search Name',
                'maxlength' => '25',
            ])->filter(function (Builder $builder, string $value) {
                $builder->whereHas('userEntity.userDetails', function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            }),
            DateRangeFilter::make('Rental Application')->config([
                'allowInput' => true,
                'altFormat' => 'F j, Y',
                'ariaDateFormat' => 'F j, Y',
                'dateFormat' => 'Y-m-d',
                'placeholder' => 'Enter Date Range',
            ])->filter(function (Builder $builder, array $dateRange) {
                $builder->whereDate('rental_applications.created_at', '>=', $dateRange['minDate'])->whereDate('rental_applications.created_at', '<=', $dateRange['maxDate']);
            }),
        ];
    }

    // public function query(): Builder
    // {
    //     $query = $this->model::query()->leftJoin('properties', 'rental_applications.property_id', '=', 'properties.id');

    //     if ($this->getFilter('search')) {
    //         $searchTerm = '%' . $this->getFilter('search') . '%';
    //         $query->where(function ($query) use ($searchTerm) {
    //             $query->where('rental_applications.id', 'LIKE', $searchTerm)
    //                 ->orWhere('properties.title', 'LIKE', $searchTerm)
    //                 ->orWhere('properties.city', 'LIKE', $searchTerm)
    //                 ->orWhere('rental_applications.first_name', 'LIKE', $searchTerm)
    //                 ->orWhere('rental_applications.last_name', 'LIKE', $searchTerm)
    //                 ->orWhere('rental_applications.email', 'LIKE', $searchTerm)
    //                 ->orWhere('rental_applications.phone', 'LIKE', $searchTerm)
    //                 ->orWhere('properties.city', 'LIKE', $searchTerm)
    //                 ->orWhere('rental_applications.status', 'LIKE', $searchTerm); // Specify table name or alias
    //         });
    //     }

    //     return $query;
    // }

    public function builder(): Builder
    {
        $user = Auth::user();
        if ($user->hasAllAccess()) {
            return $this->model::query();
        } else {
            $query = UserEntity::query()->where('entity_key', 'property');
            if ($this->account_id && $user->hasManagerAccess()) {
                $query->where('account_id', $this->account_id);
                $entityIds = $query->pluck('entity_value');

                return $this->model::whereIn('prop_id', $entityIds);
            }
            if ($user->hasRole('Property Owner')) {
                $entityIds = $query->pluck('entity_value');
                $propertyIds = Property::whereIn('id', $entityIds)->whereIn('user_id', [$user->id])->pluck('id');

                return $this->model::whereIn('prop_id', $propertyIds);
            } elseif ($user->hasRole('Agent')) {
                $entityIds = $query->pluck('entity_value');
                $propertyIds = Property::whereIn('id', $entityIds)->whereIn('prop_agents', [$user->id])->pluck('id');

                return $this->model::whereIn('prop_id', $propertyIds);
            }
        }
    }

    public function delete($id)
    {
        $this->model::findOrFail($id)->delete();
        $this->dispatch('swal:modal', type: 'success', message: 'Email Template Deleted Successfully!');
    }
}
