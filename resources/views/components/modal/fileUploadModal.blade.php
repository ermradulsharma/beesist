@props(['user', 'routeName'])
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h4 class="modal-title">Upload Photo</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
            <x-forms.patch :action="route(rolebased().'.auth.'. $routeName .'.profileImage', $user)" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="profilImg_1">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profilImg" name="profilImg" onchange="filePreview(this)" aria-describedby="profilImg_1">
                            <label class="custom-file-label" for="profilImg">Choose file</label>
                        </div>
                    </div>
                    <div class="error-message"></div>
                    <div class="media_preview"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </x-forms.patch>
        </div>
    </div>
</div>
