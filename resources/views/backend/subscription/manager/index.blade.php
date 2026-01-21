@extends('backend.layouts.app')
@section('title', __('Subscription'))
@push('after-styles')
<style>
</style>
@endpush
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('My Subscriptions')
                </x-slot>

                <x-slot name="body">
                    <div class="row mb-4 align-items-center">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">Subscription Status<strong>{{ strtoupper($subscription->status) }}</strong></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Plan Type<strong>{{ $subscription->plan->interval == 'month' ? 'Monthly' : 'Yearly' }}</strong></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Plan Validity<strong>{{ __('From') }} {{ \Carbon\Carbon::parse($subscription->current_period_start)->format('F d, Y') }} {{ __('To') }} {{ \Carbon\Carbon::parse($subscription->current_period_end)->format('F d, Y') }}</strong></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Renewl Amount<strong>$ {{ number_format($subscription->plan->amount/100, 2)}}</strong></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Payment Method
                                    @if ($paymentMethod)
                                        <strong>{{ $paymentMethod->brand }} - {{ $paymentMethod->last4 }}</strong>
                                    @else
                                        <strong>No payment method available</strong>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-block btn-lg btn-danger" type="button">Cancel Subscription</button>
                                <button class="btn btn-block btn-lg btn-primary" type="button">Update Debit/Credit Card</button>
                            </div>
                        </div>
                    </div>
                    <h4>Invoices</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Plan Type</th>
                                <th scope="col">Package Name</th>
                                <th scope="col">Subscription Id</th>
                                <th scope="col">Plan Amount</th>
                                <th scope="col">Subscribed On</th>
                                <th scope="col">Download Invoice</th>
                                <th scope="col">Cancel At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $key => $subscription)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $subscription->plan->interval == 'month' ? 'Monthly' : 'Yearly' }}</td>
                                    <td>{{ $subscription->plan->product }}</td>
                                    <td>{{ $subscription->id }}</td>
                                    <td>$ {{ number_format(($subscription->plan->amount)/100, 2) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($subscription->plan->created)->format('F d, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($subscription->current_period_start)->format('F d, Y') }} - {{ \Carbon\Carbon::parse($subscription->current_period_end)->format('F d, Y') }}</td>
                                    <td>{{ $subscription->canceled_at ? \Carbon\Carbon::parse($subscription->canceled_at)->format('F d, Y') : '' }}</td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-10-->
    </div><!--row-->
@endsection
