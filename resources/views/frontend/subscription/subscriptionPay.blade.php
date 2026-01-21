@extends('frontend.layouts.app')
@section('title', __('Subscription'))
@push('after-styles')
    <style>
        .container {
            max-width: 1000px;
        }

        .container .card {
            margin: 3rem 0;
            border: 0px;
        }

        .subscription-form {
            background: var(--bs-yellow);
        }

        .fw-700 {
            font-weight: 700;
        }

        .fw-800 {
            font-weight: 800;
        }

        #card-element,
        .form-group .card-holder-name {
            background: #ffffffad;
            padding: 16px;
            border-radius: 4px;
        }

        .form-group .card-holder-name {
            padding: 11.5px !important;
        }

        .footer button:hover {
            background-color: var(--bs-white) !important;
            color: var(--black) !important;
        }
    </style>
@endpush
@section('content')
    <section class="container">
        <x-frontend.card>
            <x-slot name="body">
                <div class="row align-items-center">

                    <div class="col-md-5 text-center">
                        <span class="left-top"></span>
                        <span class="left-center"></span>
                        <span class="left-bottom"></span>
                        <span class="right-top"></span>
                        {{-- <span class="right-bottom"></span> --}}
                        <img class="img-fluid" src="{{ asset('images/get-result-img.png') }}">
                    </div>
                    <div class="col-md-7">
                        <div class="row text-center">
                            <h5 class="fw-700 mt-5 text-uppercase">{{ __('Subscription Details') }}</h5>
                        </div>
                        <form action="{{ route('frontend.price') }}" method="post" id="subscription-form" class="subscription-form p-5">
                            @csrf
                            <input type="hidden" name="packageModalId" id="packageModalId" value="{{ $packageObj->id }}">
                            <div class="form-class">
                                <div class="row text-start billingCycle">
                                    <div class="col-md-6 modal-package-title">{{ $packageObj->title }} Plan</div>
                                    <div class="col-md-6 text-end mb-2 modal-package-price">$ {{ number_format($packageObj->amount, 2) }} Monthly</div>
                                </div>
                                <div class="row text-start mt-2">
                                    <div class="col-md-6 mb-2">Total</div>
                                    <div class="col-md-6 text-end modal-package-price">$ {{ number_format($packageObj->amount, 2) }}</div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group text-start">
                                        <label for="">Card Details</label>
                                        <div class="form-group mb-3">
                                            <input type="text" name="name" id="card-holder-name" class="form-control card-holder-name" value="" placeholder="Name on the card">
                                        </div>
                                        <div id="card-element"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer mt-3 text-end">
                                <button type="submit" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase" id="cardButton" data-secret="{{ @$intent->client_secret }}">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </x-slot>
        </x-frontend.card>
    </section>
@endsection
@push('after-scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const stripe = Stripe(`{{ env('STRIPE_KEY') }}`);
            const elements = stripe.elements();
            const cardElement = elements.create('card');
            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardBtn = document.getElementById('cardButton');
            const form = document.getElementById('subscription-form');

            form.addEventListener('submit', async (e) => {
                e.preventDefault()
                cardBtn.disabled = true;
                const {
                    paymentMethod,
                    error: paymentMethodError
                } = await stripe.createPaymentMethod(
                    'card', cardElement, {
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                );
                if (paymentMethodError) {
                    console.error(paymentMethodError);
                    cardBtn.disabled = false;
                    return;
                }
                const {
                    setupIntent,
                    error: setupIntentError
                } = await stripe.confirmCardSetup(
                    cardBtn.dataset.secret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    }
                )
                if (setupIntentError) {
                    console.error(setupIntentError);
                    cardBtn.disabled = false;
                } else if (setupIntent && setupIntent.next_action && setupIntent.next_action.type === 'redirect_to_url') {
                    window.location.replace(setupIntent.next_action.redirect_to_url.url);
                } else {
                    let token = document.createElement('input');
                    token.setAttribute('type', 'hidden');
                    token.setAttribute('name', 'token');
                    token.setAttribute('value', setupIntent.payment_method);
                    form.appendChild(token);
                    form.submit();
                }
            })
        });
    </script>
@endpush
