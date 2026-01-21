<style>
    .__FB_submitForm {
        max-width: 450px;
        margin: auto;
        padding: 30px;
        background: #fdfdfd;
        border-radius: 10px;
        border: 1px solid #FDD501;
    }

    .parsley-errors-list {
        list-style: none;
        padding: 0;
        margin-bottom: 0;
    }

    .parsley-errors-list li {
        font-size: 12px;
        color: #c10000;
    }
</style>
<form action="{{ route('formbuilder::form.submit', $form->identifier) }}" method="POST" class="__FB_submitForm" enctype="multipart/form-data">
    @csrf
    <div id="fb-render"></div>
    <div class="theme_button mt-2">
        <button type="submit" class="btn btn-dark rounded-pill w-100 d-block border-0 px-4 py-2 text-uppercase confirm-form" data-form="__FB_submitForm" data-message="Submit your entry for '{{ $form->name }}'?">
            <i class="fa fa-submit"></i> Submit Form
        </button>
    </div>
    <div class="__FB_form_response"></div>
</form>

<script type="text/javascript">
    window.FormBuilder = {
        csrfToken: '{{ csrf_token() }}',
    };
    window._form_builder_content = {!! json_encode($form->form_builder_json) !!};
    var action = "{{ route('formbuilder::form.submit', $form->identifier) }}";
    $('.confirm-form').click(function(e) {
        e.preventDefault()
        var ref = $(this)
        var data = ref.data()
        var message = data.message ? data.message : ref.attr('title')
        var form = $('.' + ref.data('form'))
        if (!form.parsley().validate()) return
        form.submit()
    })
    $(".__FB_submitForm").submit(function(e) {
        const form = $(this);
        e.preventDefault();
        $.ajax({
            url: action,
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                form.trigger("reset");
                form.find('.__FB_form_response').html('<div class="alert alert-success my-2">' + response.flash_success + '</div>');
                //Swal.fire('Successful!', response.flash_success, 'success');
            }
        });
    });
</script>
<script src="{{ asset('vendor/formbuilder/js/render-form.js') }}{{ Modules\FormBuilder\Entities\Helper::bustCache() }}" defer></script>
<script src="{{ asset('vendor/formbuilder/js/jquery-formbuilder/form-render.min.js') }}" defer></script>
<script src="{{ asset('vendor/formbuilder/js/parsleyjs/parsley.min.js') }}" defer></script>
