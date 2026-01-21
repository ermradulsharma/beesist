<div class="modal fade" wire:ignore.self id="rejectionModal" tabindex="-1" role="dialog" aria-labelledby="rejectionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectionModalLabel">Reason for Rejection</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit="saveAppointment">
                    <input type="hidden" id="show_id" wire:model="show_id" value="" />
                    <div class="form-group">
                        <label for="rejectionReason" style="float: inline-start;">Reason:</label>
                        <textarea id="rejectionReason" wire:model="reason" class="form-control" rows="4"></textarea>
                    </div>
                    <div style="float: right;">
                        <button type="submit" class="btn btn-success rejected">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
