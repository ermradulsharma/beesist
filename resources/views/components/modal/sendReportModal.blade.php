<div class="modal fade" id="sendReportModal" tabindex="-1" role="dialog" aria-labelledby="sendReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Performance Report for <span id="title"></span> between <span id="start_date"></span> to <span id="end_date"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="form_response"></div>
                <form id="send_report_form" method="POST" action="{{ route(rolebased() . '.properties.sendPerformanceReport') }}" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" id="propertyId" name="property_id">
                    <input type="hidden" id="propStatus" name="property_status">
                    <input type="hidden" id="propertyUrl" name="prop_url">
                    <input type="hidden" id="fromDate" name="from_date">
                    <input type="hidden" id="toDate" name="to_date">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="applied">Tenancy Applications</label>
                                <input type="number" class="form-control" id="applied" name="applied">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="applications">Showing Requests:</label>
                                <input type="number" class="form-control" id="applications" name="applications">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="showings">Showings:</label>
                                <input type="number" class="form-control" id="showings" name="showings">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="people_attended">People Attended:</label>
                                <input type="number" class="form-control" id="people_attended" name="people_attended">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="asked_questions">Asked a Question:</label>
                                <input type="number" class="form-control" id="asked_questions" name="asked_questions">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="days_on_market">Days on Market:</label>
                                <input type="number" class="form-control" id="days_on_market" name="days_on_market">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="views">Property Views:</label>
                                <input type="number" class="form-control" id="views" name="views">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comparable_listings">Comparable Listings:</label>
                        <input type="text" class="form-control" id="comparable_listings" name="comparable_listings" placeholder="Enter URL">
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="rent_board_url">Rent Board:</label>
                                <input type="text" class="form-control" id="rent_board_url" name="rent_board_url" placeholder="Enter URL">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rent_board_enquiries">Inquiries:</label>
                                <input type="number" class="form-control" id="rent_board_enquiries" name="rent_board_enquiries" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="craigslist_url">Vancouver Craigslist:</label>
                                <input type="text" class="form-control" id="craigslist_url" name="craigslist_url" placeholder="Enter URL">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="craigslist_enquiries">Inquiries:</label>
                                <input type="number" class="form-control" id="craigslist_enquiries" name="craigslist_enquiries" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="owner_name">Owner Name:</label>
                                <input type="text" class="form-control" id="owner_name" name="owner_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="owner_email">Email:</label>
                                <input type="email" class="form-control" id="owner_email" name="owner_email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="owner2_name">Owner 2 Name:</label>
                                <input type="text" class="form-control" id="owner2_name" name="owner2_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="owner2_email">Owner 2 Email:</label>
                                <input type="email" class="form-control" id="owner2_email" name="owner2_email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="owner_email">Comments:</label>
                        <textarea name="comment" id="comment" rows="4" placeholder="Comments" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger" style="float: right;">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
