<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
            'media', 'table', 'emoticons', 'template', 'help', 'visualblocks', 'autoresize'
        ],
        autoresize_bottom_margin: 100,
        autoresize_on_init: false,
        max_height: 600,
        visualblocks_default_state: true,
        promotion: false,
        branding: false,
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons | template | visualblocks | help',
        menu: {
            favs: {
                title: 'My Favorites',
                items: 'code visualaid | searchreplace | emoticons'
            }
        },
        menubar: 'favs file edit view insert format tools table help',


        content_css: [
            '{{ asset('css/frontend.css') }}',
            '{{ asset('css/tinnymce-editor.css') }}'
        ],
        templates: [{
                title: 'Section Container',
                description: 'Adds a section with title and content.',
                content: '<section class="py-5 bg-gradient-light"><div class="container"><h2 class="display-5 mb-1 mt-4 font-bold text-center">Section <span class="color-yellow">Title</span></h2><p class="fs-6 mb-1 text-black-50 text-center mb-5 w-75 m-auto">Section Content</p></div></section>&nbsp;<br>&nbsp;'
            },
            {
                title: 'Insert 2 Column',
                description: 'These values will be replaced when the template is inserted into the editor content.',
                content: '<div class="row gx-5 gy-4 mb-5"><div class="col-md-6">Column 1</div> <div class="col-md-6"> Column 2</div></div>&nbsp;<br>&nbsp;'
            },
            {
                title: 'Insert 3 Column',
                description: 'These values will be replaced when the template is inserted into the editor content.',
                content: '<div class="row gx-5 gy-4 mb-5"><div class="col-md-4">Column 1</div> <div class="col-md-4">Column 2</div> <div class="col-md-4">Column 3</div></div>&nbsp;<br>&nbsp;'
            },
            {
                title: 'Insert 4 Column',
                description: 'These values will be replaced when the template is inserted into the editor content.',
                content: '<div class="row gx-5 gy-4 mb-5"><div class="col-md-3">Column 1</div> <div class="col-md-3">Column 2</div> <div class="col-md-3">Column 3</div><div class="col-md-3">Column 4</div></div>&nbsp;<br>&nbsp;'
            },
            {
                title: 'Insert Info Box',
                description: 'Insert Info Box Markup',
                content: '<div class="card shaddow-box"><div class="card-body text-center"><h3 class="card-title mb-4 pb-3 position-relative">Title Here..</h3><p class="text-center">Content Here...</p> <a href="#" class="btn btn-primary btn-pill px-4">LEARN MORE</a></div></div>&nbsp;<br>&nbsp;'
            },
            {
                title: 'Left Content Right image Section',
                description: 'Left Content Right image Section with buttons',
                content: '<section id="about_secion_1" class="py-5"><div class="container"><div class="row align-items-center"><div class="col-lg-7"><h1 class="display-3 font-bold">About Our <br>Virtual <span class="color-yellow"> Assistants.</span></h1> <p class="text-black-80">Lorem ipsum dolor sit amet consectetur. Leo urna at eget proin lacus. Hac facilisis volutpat odio pellentesque sagittis nullam egestas. Sollicitudin turpis facilisis gravida sollicitudin purus. Fermentum fames ut consectetur sed. Dignissim consequat ut ultricies in quis faucibus tincidunt vitae vel..</p> <div class="theme_button d-lg-flex d-md-flex d-sm-block mt-5 gap-2"><a href="../../../contact" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase">Try a virtual assistant for free</a> <a href="../../../contact" class="btn outline rounded-pill px-4 py-2 text-uppercase">Book a consultation</a></div></div> <div class="col-lg-5 gx-5 text-md-center text-sm-center text-xs-center mt-lg-0 mt-md-5 mt-sm-5 mt-xs-5"><img src="../../../images/about-virtual-assistant.png" class="img-fluid"></div></div></div></section>&nbsp;<br>&nbsp;'
            },
            {
                title: 'Three Column info boxes',
                description: 'Three Column info boxes',
                content: '<section class="py-5"><div class="container"><div id="how_can_help" class="position-relative mb-5"><h3 class="display-6 mb-1 mt-4 font-bold text-center">How can we <span class="color-yellow">help?</span></h3> <p class="fs-6 mb-1 text-black-50 font-semi text-center">Working with us is like having your in-house team. The manpower you\’ve always wanted. The difference is you do not need to train or manage us. We learn how you do your business and we take care of it your way.</p></div> <div class="row how_can_help"><div class="col-lg-4"><div class="card card-border-yellow-color"><div class="card-body text-center p-4"><div class="box_icon d-flex align-items-center justify-content-center"><img src="{{ asset('images/lead-generation.png') }}" class="img-fluid"></div> <h4 class="font-bold text-black my-4">Lead Generation <br>&amp; Follow Up</h4> <p class="my-4">We help you develop your marketing strategy and execute it. From campaigns to personalized follow up.</p> <div class="theme_button"><a href="#" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase">Learn More</a></div></div></div></div> <div class="col-lg-4 mt-lg-0 mt-sm-4 mt-md-4 mt-xs-4"><div class="card card-border-yellow-color"><div class="card-body text-center p-4"><div class="box_icon d-flex align-items-center justify-content-center"><img src="{{ asset('images/work-optimization.png') }}" class="img-fluid"></div> <h4 class="font-bold text-black my-4">Workflow Optimization and Automation Custom Web Solutions</h4> <p class="my-4">We get you a website that converts. We hire and train a dedicated assistant to do business the same way you do.</p> <div class="theme_button"><a href="#" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase">Learn More</a></div></div></div></div> <div class="col-lg-4 mt-lg-0 mt-sm-4 mt-md-4 mt-xs-4"><div class="card card-border-yellow-color"><div class="card-body text-center p-4"><div class="box_icon d-flex align-items-center justify-content-center"><img src="{{ asset('images/vip-customer.png') }}" class="img-fluid"></div> <h4 class="font-bold text-black my-4">VIP Customer Experience Every time</h4> <p class="my-4">Treat every customer like VIP. Get back to your customers fast without picking up the phone yourself.</p> <div class="theme_button"><a href="#" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase">Learn More</a></div></div></div></div></div></div></section>&nbsp;<br>&nbsp;'
            }
        ],
        image_title: true,
        automatic_uploads: true,
        images_upload_url: '{{ route('admin.uploadEditorMedia') }}',
        file_picker_types: 'image',
        image_dimensions: false,
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
            };
            input.click();
        }
    });
</script>
