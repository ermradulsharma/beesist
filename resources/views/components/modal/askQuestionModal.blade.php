<!-- Modal -->
<div class="modal fade" id="AnswerModal" tabindex="-1" role="dialog" aria-labelledby="AnswerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="ansQuestion" method="POST">
                <div class="modal-header">
                    <h3 class="modal-title" id="askQuestionModalLabel">Answer the Question</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="position: absolute;top: 15px;right: 15px;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div id="askQuestionForm">
                            <div class="md-form2">
                                <p><strong>Name:</strong> <span id="q_name"></span></p>
                                <p><strong>Email:</strong> <span id="q_email"></span></p>
                                <p><strong>Phone:</strong> <span id="q_phone"></span></p>
                                <p><strong>Property:</strong> <span id="q_property"></span></p>
                                <label for="question">Question</label>
                                <div id="Question" style="margin-bottom: 10px">Question Here</div>
                            </div>
                            <div class="md-form2">
                                <label for="answer">Answer</label>
                                <textarea class="form-control" id="answer" name="answer" placeholder="Your Answer" style="width: 100%; height: 200px; padding: 5px; line-height: 20px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="text-align:left">
                    <input name="question_id" id="question_id" type="hidden" value="">
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    <img id="ajax_loader" src="images/loader.svg">
                </div>
            </form>
        </div>
    </div>
</div>

