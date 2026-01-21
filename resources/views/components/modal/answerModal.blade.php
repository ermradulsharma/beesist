<div class="modal fade" id="answerModal" tabindex="-1" role="dialog" aria-labelledby="answerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="answerModalLabel">Answer the Question</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form id="answerQuestion" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input name="question_id" id="questionId" type="hidden" value="">
                        <p><strong>Name:</strong> <span id="questionName"></span></p>
                        <p><strong>Email:</strong> <span id="questionEmail"></span></p>
                        <p><strong>Phone:</strong> <span id="questionPhone"></span></p>
                        <p><strong>Property:</strong> <span id="questionProperty"></span></p>
                        <label for="question" class="form-label"><strong>Question: </strong></label>
                        <div id="Question" class="mb-3">Question Here</div>
                    </div>
                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer</label>
                        <textarea class="form-control" id="answer" name="answer" placeholder="Your Answer" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer" id="modalFooter">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <img id="ajax_loader" src="{{ asset('images/loader.svg') }}" class="d-none">
                </div>
            </form>
        </div>
    </div>
</div>
