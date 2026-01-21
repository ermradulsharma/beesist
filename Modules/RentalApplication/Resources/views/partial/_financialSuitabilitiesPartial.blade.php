<div class="repeater-item" data-repeater-item="" data-max_limit="3">
    <h5>Financial Suitability <span class="repeaterItemNumber"></span></h5>
    <p>Financial Suitability of prospects required to offer tenancy. The income of at least 2.5 times the rent for a single person and 3 times the rent for a couple</p>
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-2">
                <div class="form-group file-upload-box">
                    <p>Financial Documents (Pay stub or Job offering letter)</p>
                    <input type="file" name="financial_suitability[0][job_offer_letter]" value="{{ old('job_offer_letter', @$financialSuitability->job_offer_letter) }}" onchange="filePreview(this)" required />
                    <span class="d-block error-message" style="font-size: 12px;">Please upload a picture of ay stub or Job offering letter Documents and upload it here. (jpeg, jpg, png)</span>
                    <div class="media_preview">
                        @if (isset($financialSuitability))
                            <img src="{{ asset($financialSuitability->job_offer_letter) }}" width="150" height="150" style="object-fit:cover">
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group file-upload-box">
                    <p>Financial Document (Bank Statements - Substantial savings in Canadian Bank Account)</p>
                    <input type="file" name="financial_suitability[0][bank_statement]" value="{{ old('bank_statement', @$financialSuitability->bank_statement) }}" onchange="filePreview(this)" required />
                    <span class="d-block error-message" style="font-size: 12px;">Please upload a picture of Bank Statements and upload it here. (jpeg, jpg, png)</span>
                    <div class="media_preview">
                        @if (isset($financialSuitability))
                            <img src="{{ asset($financialSuitability->bank_statement) }}" width="150" height="150" style="object-fit:cover">
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group file-upload-box">
                    <p>Credit Score (From Equifax : https://www.consumer.equifax.ca/personal/products/credit-score-report/)</p>
                    <input type="file" name="financial_suitability[0][credit_score]" value="{{ old('credit_score', @$financialSuitability->credit_score) }}" onchange="filePreview(this)" required />
                    <span class="d-block error-message" style="font-size: 12px;">Please upload a picture of Credit Score and upload it here. (jpeg, jpg, png)</span>
                    <div class="media_preview">
                        @if (isset($financialSuitability))
                            <img src="{{ asset($financialSuitability->credit_score) }}" width="150" height="150" style="object-fit:cover">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <span data-repeater-delete="" class="btn text-danger btn-sm">
                <span class="fas fa-times"></span> Remove additional Financial Suitability
            </span>
        </div>
    </div>
</div>
