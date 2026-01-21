{{-- resources/views/livewire/rejection-modal.blade.php --}}
<div>
    <div wire:ignore.self class="modal fade" id="addScreeningQuestionModal" tabindex="-1" role="dialog" aria-labelledby="addScreeningQuestionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addScreeningQuestionModalLabel">Add Screening Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal">X</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit">
                        <input type="hidden" wire:model="showId" />
                        <div class="form-group">
                            <label for="title">Question</label>
                            <input class="form-control" wire:model="title" id="title" placeholder="Enter Project Name" type="text">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="question_type">Question Type</label>
                            <select class="form-control" wire:model="question_type" id="question_type">
                                <option value="">-- Select Option --</option>
                                <option value="landlord" {{ old('question_type', @$que->question_type) == 'landlord' ? 'selected' : '' }}>Landlord Verification</option>
                                <option value="employer" {{ old('question_type', @$que->question_type) == 'employer' ? 'selected' : '' }}>Employment Verification</option>
                                <option value="other" {{ old('question_type', @$que->question_type) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('question_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="field_type">Field Type</label>
                            <select class="form-control" wire:model="field_type" id="field_type">
                                <option value="radio" {{ old('field_type', @$que->field_type) == 'radio' ? 'selected' : '' }}>Radio Button</option>
                                <option value="textbox" {{ old('field_type', @$que->field_type) == 'textbox' ? 'selected' : '' }}>Textbox</option>
                            </select>
                            @error('field_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">
                                <input wire:model="status" id="status" type="checkbox" value="1" {{ old('status', @$que->status) == 1 ? 'checked' : '' }}> Status</label>
                        </div>
                        <div style="float: right;">
                            <button type="submit" class="btn btn-success rejected">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div wire:ignore.self class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
