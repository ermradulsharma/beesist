<div>
    <x-backend.card>
        @php
            $accountId = request()->accountId != 'undefined' && request()->accountId != '' ? request()->accountId : null;
            $agentId = request()->agentId != 'undefined' && request()->agentId != '' ? request()->agentId : null;
            $status = request()->status != 'undefined' && request()->status != '' ? request()->status : null;
            $from = request()->from != 'undefined' && request()->from != '' ? request()->from : null;
            $to = request()->to != 'undefined' && request()->to != '' ? request()->to : null;
            $dateRange = $from ? $from . ' - ' . $to : '';
        @endphp
        <x-slot name="header">
            <div class="row align-items-center">
                <div class="col-md-2">
                    @lang('Performance Report')
                </div>
                <div class="col-md-10">
                    <div class="row">
                        @if ($logged_in_user->hasAllAccess())
                            <div class="col-md-4">
                                <select name="accountId" id="account_id" class="form-control">
                                    <option value="" selected>All Property Manager</option>
                                    @foreach ($subscribers as $subscriber)
                                        <option value="{{ $subscriber->user_id }}" {{ $subscriber->user_id == $accountId ? 'selected' : '' }}>{{ $subscriber->userDetails->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @if ($logged_in_user->hasManagerAccess())
                            <div class="col-md-4">
                                <div id="testContent"></div>
                                <select name="agentId" id="account_agent" class="form-control">
                                    <option value="" selected>All Agent</option>
                                    @foreach ($agents as $agent)
                                        <option value="{{ $agent->id }}" {{ $agent->id == $agentId ? 'selected' : '' }}>{{ $agent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="col-md-4">
                            <div id="testContent"></div>
                            <select name="status" id="propertyStatus" class="form-control">
                                <option value="" selected>All Status</option>
                                @foreach ($statuses as $status2)
                                    <option value="{{ $status2 }}" {{ $status2 == $status ? 'selected' : '' }}>{{ $status2 }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="dateRange" class="form-control" id="daterangepicker" value="{{ $dateRange }}" placeholder="Date range filter">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="body">
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <div class="card bg-success text-white">
                        <div class="d-flex align-items-center px-2">
                            <div class="card-body px-0">
                                <h4 class="card-title fs-18 text-capitalize">New Properties</h4>
                                <h3 class="card-text">{{ $data['new'] }}</h3>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-building fa-5x"></i>
                            </div>
                        </div>
                        <a href="{{ route(rolebased() . '.properties.index') }}" class="btn card-btn mt-3">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="card bg-danger text-white">
                        <div class="d-flex align-items-center px-2">
                            <div class="card-body px-0">
                                <h4 class="card-title fs-18 text-capitalize">Properties For Rent</h4>
                                <h3 class="card-text">{{ $data['forRent'] }}</h3>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-building fa-5x"></i>
                            </div>
                        </div>
                        <a href="{{ route(rolebased() . '.properties.index') }}" class="btn  card-btn mt-3">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="card bg-info text-white">
                        <div class="d-flex align-items-center px-2">
                            <div class="card-body px-0">
                                <h4 class="card-title fs-18 text-capitalize">Properties Rented</h4>
                                <h3 class="card-text">{{ $data['rented'] }}</h3>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-building fa-5x"></i>
                            </div>
                        </div>
                        <a href="{{ route(rolebased() . '.properties.index') }}" class="btn card-btn mt-3">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="card bg-success text-white">
                        <div class="d-flex align-items-center px-2">
                            <div class="card-body px-0">
                                <h4 class="card-title fs-18 text-capitalize">Total Number of Showings</h4>
                                <h3 class="card-text">{{ $data['showing'] }}</h3>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-clock fa-5x"></i>
                            </div>
                        </div>
                        <a href="{{ route(rolebased() . '.showings.index') }}" class="btn card-btn mt-3">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="card bg-danger text-white">
                        <div class="d-flex align-items-center px-2">
                            <div class="card-body px-0">
                                <h4 class="card-title fs-18 text-capitalize">Total Number of Inspections</h4>
                                <h3 class="card-text">{{ $data['inspections'] }}</h3>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-file fa-5x"></i>
                            </div>
                        </div>
                        <a href="{{ route(rolebased() . '.showings.index') }}" class="btn card-btn mt-3">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="card bg-info text-white">
                        <div class="d-flex align-items-center px-2">
                            <div class="card-body px-0">
                                <h4 class="card-title fs-18 text-capitalize">Number of Applications</h4>
                                <h3 class="card-text">{{ $data['applications'] }}</h3>
                            </div>
                            <div class="card-icon">
                                <i class="fas fa-file fa-5x"></i>
                            </div>
                        </div>
                        <a href="{{ route(rolebased() . '.showings.index') }}" class="btn card-btn mt-3">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:property::performance-table :loggedId="$logged_in_user->id" :accountId="$accountId" :agentId="$agentId" :status="$status" :dateRange="$dateRange" :key="$accountId" />
                {{-- <livewire:property::performance-table :loggedId="$logged_in_user->id" /> --}}
            </div>
        </x-slot>
    </x-backend.card>
</div>

@push('after-scripts')
    <script>
        $(function() {
            $("#account_id, #propertyStatus, #account_agent").on('change', function() {
                var accountId = $("#account_id").val();
                var status = $("#propertyStatus").val();
                var agentId = $("#account_agent").val();
                var dateRange = $('#daterangepicker').val();
                var dateArr = dateRange.split(' - ');
                var from = to = '';
                if (dateRange != '') {
                    var from = dateArr[0];
                    var to = dateArr[1];
                }
                var url = "{{ request()->url() }}?accountId=" + accountId + "&status=" + status + "&agentId=" + agentId + "&from=" + from + "&to=" + to;
                if (url) {
                    window.location = url;
                }
                return false;
            });
        });
    </script>
@endpush
