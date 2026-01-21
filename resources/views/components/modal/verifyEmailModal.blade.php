<div class="modal fade verifyEmail" id="verifyEmailModal" tabindex="-1" role="dialog" aria-labelledby="verifyEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Verify Your E-mail Address')
                    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </x-slot>

                <x-slot name="body">
                    @lang('Please check your email for a verification link.')
                    @lang('If you did not receive the email')

                    <x-forms.post :action="route('frontend.auth.verification.resend')" class="d-inline">
                        <button class="btn btn-link p-0 m-0 align-baseline" type="submit">@lang('click here to request another').</button>
                    </x-forms.post>
                </x-slot>
            </x-frontend.card>
        </div>
    </div>
</div>
