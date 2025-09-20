<!DOCTYPE html>
<html lang="en">

<head>
  <title>Insurance Quotation</title>
  @include('Cat_heading.heading')
  <link href="{{ asset('assets/dash/board_files/quotation_.css')}}" rel="stylesheet">
  <style>
    .autocomplete-suggestions {
      background: white;
      border: 1px solid #ccc;
      cursor: pointer;
      position: absolute !important;
      z-index: 9999 !important;
    }

    .autocomplete-item {
      padding: 8px;
    }

    .autocomplete-item:hover {
      background-color: #f0f0f0;
    }
    
    /* Additional styling for better UI */
    .step-bar {
      position: relative;
      display: flex;
      justify-content: space-between;
      margin-bottom: 2rem;
      padding: 0 2rem;
    }
    
    .fill-line {
      position: absolute;
      top: 50%;
      left: 0;
      height: 4px;
      background: #0d6efd;
      transform: translateY(-50%);
      z-index: 1;
      transition: width 0.3s ease;
    }
    
    .step {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #dee2e6;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      z-index: 2;
      font-weight: bold;
    }
    
    .step.active {
      background: #0d6efd;
      color: white;
    }
    
    .step.completed {
      background: #198754;
      color: white;
    }
    
    .step-title {
      color: #0d6efd;
      border-bottom: 2px solid #0d6efd;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    
    .required-field::after {
      content: " *";
      color: red;
    }
    
    .file-upload-card {
      transition: all 0.3s ease;
    }
    
    .file-upload-card.dragover {
      border-color: #0d6efd;
      background-color: rgba(13, 110, 253, 0.05);
    }
    
    .file-preview {
      display: flex;
      align-items: center;
      padding: 10px;
      border: 1px solid #dee2e6;
      border-radius: 5px;
      margin-bottom: 10px;
      background-color: #f8f9fa;
    }
    
    .file-remove {
      margin-left: auto;
      cursor: pointer;
      color: #dc3545;
    }
  </style>
</head>

<body>
  <div class="app-container container-xxl mt-4">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-md-10 col-12">
        <div class="risk-header text-white p-4 mb-5">
          <div class="position-relative z-1">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
              <div class="mb-4 mb-md-0">
                <div class="d-flex align-items-center mb-3">
                  <h1 class="h2 mb-0">
                    <i class="bi bi-archive fs-2 section-icon me-3"></i>
                    Quotation Page
                  </h1>
                </div>
                <div class="d-flex flex-wrap gap-4">
                  <div>
                    <small class="text-white-80 d-block">Reference</small>
                    <div class="fw-semibold fs-5">RN-2023-00428</div>
                  </div>
                  <div>
                    <small class="text-white-80 d-block">Client</small>
                    <div class="fw-semibold fs-5">SURETECH Systems Co. Ltd</div>
                  </div>
                  <div>
                    <small class="text-white-80 d-block">Policy Type</small>
                    <div class="fw-semibold fs-5">Marine Cargo</div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-column align-items-end">
                <div class="text-end mb-3">
                  <small class="text-white-80 d-block">Created</small>
                  <div class="fw-semibold">10-Nov-2023</div>
                </div>
                <div class="d-flex gap-2">
                  <a href="{{url('/dash/index')}}">
                    <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                      <i class="bi bi-house me-1"></i> Dashboard
                    </button>
                  </a>
                  <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                    <a href="{{url('/dash/Quotation2')}}" style="color: white;">
                      <button class="btn btn-sm bg-danger text-white">
                        <i class="fas fa-plus text-white"></i> Add New Customer
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-flush">
          <div class="card-body">
            <!-- Progress Bar -->
            <div class="step-bar" id="stepBar">
              <div class="fill-line" id="fillLine" style="width: 0%;"></div>
              <div class="step active">1</div>
              <div class="step">2</div>
              <div class="step">3</div>
              <div class="step">4</div>
              <div class="step">5</div>
            </div>

            @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if(session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            
            <!-- Form -->
            <form method="post" action="{{ route('quotation.store') }}" enctype="multipart/form-data"> 
              @csrf
              <!-- Hidden fields for product information -->
              <input type="hidden" name="coverage_id" value="{{ $coverageId }}">
              <input type="hidden" name="insurance_id" value="{{ $insuranceId }}">
              <input type="hidden" name="product_id" value="{{ $productId }}">
              <input type="hidden" name="risk_code" value="{{ $riskCode }}">
              <input type="hidden" name="product_code" value="{{ $productCode }}">
              <input type="hidden" name="officer_name" value="{{ auth()->user()->name ?? 'System Officer' }}">
              <input type="hidden" name="officer_title" value="Sales Officer">
             
              <!-- STEP 1: Customer Information -->
              <div class="step-content">
                <h5 class="step-title"><i class="bi bi-person me-2"></i>Customer Information</h5>
                <div class="row g-3">
                  <div class="col-md-6 form-group autocomplete-wrapper">
                      <label for="client_name" class="form-label required-field">Client Full Name</label>
                      <input type="text" class="form-control" id="client_name" placeholder="Start typing client name..." autocomplete="off">
                      <input type="hidden" id="customer_id" name="customer_id"> <!-- This will be submitted -->
                      <datalist id="clientsList"></datalist>
                  </div>


                  <div class="col-md-6">
                    <label class="form-label required-field">Region</label>
                    <input class="form-control" name="region" placeholder="Region" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-field">District</label>
                    <input class="form-control" name="district" placeholder="District" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-field">Street</label>
                    <input class="form-control" name="street" placeholder="Street" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-field">Policy Holder Name</label>
                    <input class="form-control" type="text" name="policy_holder_name" placeholder="Policy Holder Name" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Policy Birthday Date</label>
                    <input class="form-control" type="date" name="policy_holder_birth_date" placeholder="Policy Birthday Date">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-field">Policy Holder Type</label>
                    <select class="form-select" name="policy_holder_type" required>
                      <option value="">Select Type</option>
                      <option value="1">Individual</option>
                      <option value="2">Corporate</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-field">Policy Holder ID Type</label>
                    <select class="form-select" name="policy_holder_id_type" required>
                      <option value="">Select ID Type</option>
                      <option value="1">National ID</option>
                      <option value="2">Voter ID</option>
                      <option value="3">Passport</option>
                      <option value="4">Driving License</option>
                      <option value="5">Zanzibar ResidentId(ZANID)</option>
                      <option value="6">Tax Identification Number (TIN)</option>
                      <option value="7">Company Incorporation Certificate Number</option>
                      
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Policy Holder ID Number</label>
                    <input class="form-control" type="text" name="policy_holder_id_number">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Country Code</label>
                    <select class="form-select" name="country_code">
                      <option value="TZS">Tanzania</option>
                      <option value="KEN">Kenya</option>
                      <option value="UGA">Uganda</option>
                      <option value="RWA">Rwanda</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Policy Holder Phone Number</label>
                    <input class="form-control" type="text" name="policy_holder_phone_number">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Postal Address</label>
                    <input class="form-control" type="text" name="postal_address">
                  </div>
                </div>
                <div class="d-flex justify-content-between mt-4">
                  <div></div>
                  <button type="button" class="btn btn-primary text-white" onclick="changeStep(1)">
                    Next <i class="bi bi-arrow-right ms-2"></i>
                  </button>
                </div>
              </div>

              <!-- STEP 2: Product Information -->
              <div class="step-content d-none">
                <h5 class="step-title"><i class="bi bi-box-seam me-2"></i>Product Information</h5>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Cover Note Type ID</label>
                    <input type="text" class="form-control" name="cover_note_type_id">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Sale Point Code</label>
                    <input type="text" class="form-control" name="sale_point_code">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Cover Note Description</label>
                    <input type="text" class="form-control" name="cover_note_desc">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Operative Clause</label>
                    <input class="form-control" name="operative_clause">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Cover Note Start Date</label>
                    <input class="form-control" type="date" name="cover_note_start_date" id="cover_note_start_date" onchange="calculateEndDate()">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Cover Note End Date</label>
                    <input class="form-control" type="date" name="cover_note_end_date" id="cover_note_end_date" readonly>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Cover Note Duration (months)</label>
                    <input class="form-control" name="cover_note_duration" type="number" min="1" value="12" onchange="calculateEndDate()">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Payment Mode</label>
                    <select class="form-select" name="payment_mode_id">
                      <option value="">Select Payment Mode</option>
                      <option value="1">CASH</option>
                      <option value="2">CHEQUE</option>
                      <option value="3"></option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Currency Code</label>
                    <select class="form-select" name="currency_code">
                      <option value="TZS">Tanzanian Shilling (TZS)</option>
                      <option value="USD">US Dollar (USD)</option>
                      <option value="EUR">Euro (EUR)</option>
                      <option value="GBP">British Pound (GBP)</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Exchange Rate</label>
                    <input class="form-control" name="exchange_rate" type="number" step="0.01" value="1">
                  </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                  <button type="button" class="btn btn-secondary text-white" onclick="changeStep(-1)">
                    <i class="bi bi-arrow-left me-2"></i> Back
                  </button>
                  <button type="button" class="btn btn-primary text-white" onclick="changeStep(1)">
                    Next <i class="bi bi-arrow-right ms-2"></i>
                  </button>
                </div>
              </div>

              <!-- STEP 3: Premium Calculation -->
              <div class="step-content d-none">
                <h5 class="step-title"><i class="bi bi-calculator me-2"></i>Premium Calculation</h5>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Sum Insured</label>
                    <input class="form-control" name="sum_insured" type="number" step="0.01" onchange="calculatePremium()">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Premium Rate (%)</label>
                    <input class="form-control" name="premium_rate" type="number" step="0.01" value="2.5" onchange="calculatePremium()">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Premium Before Discount</label>
                    <input class="form-control" name="premium_before_discount" type="number" step="0.01" >
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Discount Amount</label>
                    <input class="form-control" name="discount_amount" type="number" step="0.01" value="0" onchange="calculatePremium()">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Premium After Discount</label>
                    <input class="form-control" name="premium_after_discount" type="number" step="0.01" >
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Tax Rate </label>
                    <input class="form-control" name="tax_rate" type="number" step="0.01" value="0.18" onchange="calculatePremium()">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Tax Amount</label>
                    <input class="form-control" name="tax_amount" type="number" step="0.01" >
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Total Premium Including Tax</label>
                    <input class="form-control" name="total_premium_including_tax" type="number" step="0.01" >
                  </div>
                   <div class="col-md-6">
                    <label class="form-label">Premium Including Tax</label>
                    <input class="form-control" name="premium_including_tax" type="number" step="0.01" value="78000">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Total Premium Excluding Tax</label>
                    <input class="form-control" name="total_premium_excluding_tax" type="number" step="0.01" >
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Commission Rate (%)</label>
                    <input class="form-control" name="commission_rate" type="number" step="0.01" value="10" onchange="calculatePremium()">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Commission Paid</label>
                    <input class="form-control" name="commission_paid" type="number" step="0.01" >
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Sum Insured Equivalent</label>
                    <input class="form-control" name="sum_insured_equivalent" type="number" step="0.01">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Premium Excluding Tax Equivalent</label>
                    <input class="form-control" name="premium_excluding_tax_equivalent" type="number" step="0.01">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Tax Code</label>
                    <input class="form-control" name="tax_code" value="VAT-MAINLAND">
                  </div>
                  <div class="col-md-6 form-check mt-4 pt-3">
                    <input type="hidden" name="is_tax_exempted" value="N">
                    <input type="checkbox" class="form-check-input" id="is_tax_exempted" name="is_tax_exempted" value="Y" onchange="toggleTaxExemption()">
                    <label class="form-check-label" for="is_tax_exempted">Is Tax Exempted</label>
                  </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                  <button type="button" class="btn btn-secondary text-white" onclick="changeStep(-1)">
                    <i class="bi bi-arrow-left me-2"></i> Back
                  </button>
                  <button type="button" class="btn btn-primary text-white" onclick="changeStep(1)">
                    Next <i class="bi bi-arrow-right ms-2"></i>
                  </button>
                </div>
              </div>

              <!-- Step 4: Risk Details -->
              <div class="step-content d-none">
                <h5 class="step-title"><i class="bi bi-shield-exclamation me-2"></i>Risk Details</h5>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Subject Matter Reference</label>
                    <input class="form-control" name="subject_matter_reference">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Subject Matter Description</label>
                    <input class="form-control" name="subject_matter_description">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Risk Code</label>
                    <input class="form-control" name="risk_code" value="{{ $riskCode }}" readonly>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Product Code</label>
                    <input class="form-control" name="product_code" value="{{ $productCode }}" readonly>
                  </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                  <button type="button" class="btn btn-secondary text-white" onclick="changeStep(-1)">
                    <i class="bi bi-arrow-left me-2"></i> Back
                  </button>
                  <button type="button" class="btn btn-primary text-white" onclick="changeStep(1)">
                    Next <i class="bi bi-arrow-right ms-2"></i>
                  </button>
                </div>
              </div>

              <!-- Step 5: Finalize Quotation -->
              <div class="step-content d-none">
                <h5 class="step-title"><i class="bi bi-cloud-arrow-up me-2"></i>Finalize Quotation</h5>
                <div class="row g-3">
                  <div class="col-12 mb-4">
                    <label for="fileUpload" class="form-label fw-semibold mb-2">Supporting Documents</label>
                    <div class="file-upload-card border rounded-3 p-4 position-relative" id="dropZone">
                      <input type="file" class="file-upload-input d-none" id="fileUpload" 
                              accept=".pdf,.jpg,.jpeg,.png" name="uploads">
                      <label for="fileUpload" class="file-upload-label d-flex flex-column align-items-center justify-content-center text-center cursor-pointer py-4">
                        <div class="file-upload-icon bg-light rounded-circle p-3 mb-3">
                          <i class="bi bi-cloud-arrow-up fs-4 text-primary" id="uploadIcon"></i>
                        </div>
                        <h6 class="mb-1" id="mainText">Drag and drop files here</h6>
                        <p class="text-muted mb-2" id="secondaryText">or click to browse</p>
                        <small class="text-muted">Supports: PDF, JPG, PNG (Max. 5MB each)</small>
                      </label>
                      <div class="file-previews mt-3" id="filePreviews"></div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label class="form-label">Additional Notes</label>
                    <textarea class="form-control"  rows="3" placeholder="Any special instructions or comments..." name="description"></textarea>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input type="hidden" name="confirmCheck" value="0">
                      <input class="form-check-input" type="checkbox" name="confirmCheck" id="confirmCheck" value="1" required>
                      <label class="form-check-label" for="confirmCheck">
                        I confirm that all information provided is accurate and complete.
                      </label>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between mt-4">
                  <button type="button" class="btn btn-secondary text-white" onclick="changeStep(-1)">
                    <i class="bi bi-arrow-left me-2"></i> Back
                  </button>
                  <div>
                    <button type="button" class="btn bg-warning me-2 text-white" onclick="previewQuotation()">
                      <i class="bi bi-eye me-2"></i>Preview
                    </button>
                    <button type="submit" class="btn btn-primary text-white">
                      <i class="bi bi-check-circle me-2"></i>Submit Quotation
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Receipt Modal -->
    <div class="modal fade" id="captureReceipt" tabindex="-1" aria-labelledby="addAgentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="addBranchModalLabel">Capture Receipt</h5>
            <h6 class="modal-title ms-5" id="addBranchModalLabel">ControlNb: SPXZ1864000</h6>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form id="receiptForm" action="{{ route('receipts.store') }}" method="POST">
            @csrf
            <input type="hidden" name="quotation_id" id="modalQuotationId">
            
            <div class="modal-body row g-3 px-4">
              <div class="col-md-4">
                <label class="form-label">Quotation Number</label>
                <input type="text" class="form-control" id="displayQuotationNumber" readonly>
              </div>

              <div class="col-md-4">
                <label class="form-label">Premium</label>
                <input type="text" class="form-control" name="premium_amount" placeholder="e.g. 1,000,000.00">
              </div>

              <div class="col-md-4">
                <label class="form-label">Premium Currency</label>
                <input type="text" class="form-control" name="premium_currency" value="TZS" readonly>
              </div>

              <div class="col-md-6">
                <label class="form-label">Mode</label>
                <select class="form-select" name="payment_mode">
                  <option value="">Please Select</option>
                  <option value="CASH">Cash</option>
                  <option value="CARD">Card</option>
                  <option value="BANK">Bank Transfer</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">Reference No</label>
                <input type="text" class="form-control" name="reference_no" placeholder="e.g. 1111111121212">
              </div>

              <div class="col-md-6">
                <label class="form-label">Issuer Bank</label>
                <select class="form-select" name="issuer_bank">
                  <option value="">Please Select</option>
                  <option value="CRDB">CRDB Bank</option>
                  <option value="NMB">NMB Bank</option>
                  <option value="EXIM">Exim Bank</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">Collecting Bank</label>
                <select class="form-select" name="collecting_bank">
                  <option value="">Please Select</option>
                  <option value="CRDB">CRDB Bank</option>
                  <option value="NMB">NMB Bank</option>
                  <option value="EXIM">Exim Bank</option>
                </select>
              </div>

              <div class="col-md-4">
                <label class="form-label">Amount</label>
                <input type="text" class="form-control" name="amount" placeholder="e.g. 1,000,000.00">
              </div>

              <div class="col-md-2">
                <label class="form-label">Currency</label>
                <select class="form-select" name="currency">
                  <option value="TZS">TZS</option>
                  <option value="USD">USD</option>
                  <option value="EUR">EUR</option>
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label">Exchange Rate</label>
                <input type="text" class="form-control" name="exchange_rate" placeholder="e.g. 1.00" value="1">
              </div>

              <div class="col-md-3">
                <label class="form-label">Equivalent Amount</label>
                <input type="text" class="form-control" name="equivalent_amount" placeholder="e.g. 1.00" readonly>
              </div>
            </div>

            <div class="modal-footer px-4">
              <button type="submit" class="btn btn-primary text-white" id="submitReceiptBtn">
                <span id="receiptSubmitText">Capture</span>
                <span class="spinner-border spinner-border-sm d-none" id="receiptSpinner"></span>
              </button>
              <a href="{{ url('/dash/Quotation') }}">
                <button type="button" class="btn btn-primary text-white">Skip</button>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script>
    // Step navigation
    let currentStep = 0;
    const steps = document.querySelectorAll(".step-bar .step");
    const stepContents = document.querySelectorAll(".step-content");
    const fillLine = document.getElementById("fillLine");

    function updateUI() {
      steps.forEach((step, index) => {
        step.classList.remove("active", "completed");
        if (index < currentStep) step.classList.add("completed");
        if (index === currentStep) step.classList.add("active");
      });

      stepContents.forEach((content, index) => {
        content.classList.toggle("d-none", index !== currentStep);
      });

      fillLine.style.width = ((currentStep) / (steps.length - 1)) * 100 + "%";
    }

    function changeStep(n) {
      const newStep = currentStep + n;
      if (newStep >= 0 && newStep < stepContents.length) {
        currentStep = newStep;
        updateUI();
        document.querySelector('.card-body').scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }

    // Calculate cover note end date based on start date and duration
    function calculateEndDate() {
      const startDate = document.querySelector('input[name="cover_note_start_date"]').value;
      const duration = document.querySelector('input[name="cover_note_duration"]').value;
      
      if (startDate && duration) {
        const start = new Date(startDate);
        const endDate = new Date(start);
        endDate.setMonth(start.getMonth() + parseInt(duration) - 1);
        
        // Format date as YYYY-MM-DD
        const formattedDate = endDate.toISOString().split('T')[0];
        document.querySelector('input[name="cover_note_end_date"]').value = formattedDate;
      }
    }

    // Premium calculation
    function calculatePremium() {
      const sumInsured = parseFloat(document.querySelector('input[name="sum_insured"]').value) || 0;
      const premiumRate = parseFloat(document.querySelector('input[name="premium_rate"]').value) || 0;
      const discountAmount = parseFloat(document.querySelector('input[name="discount_amount"]').value) || 0;
      const taxRate = parseFloat(document.querySelector('input[name="tax_rate"]').value) || 0;
      const commissionRate = parseFloat(document.querySelector('input[name="commission_rate"]').value) || 0;
      const isTaxExempted = document.getElementById('is_tax_exempted').checked;

      // Calculate premium before discount
      const premiumBeforeDiscount = sumInsured * (premiumRate / 100);
      document.querySelector('input[name="premium_before_discount"]').value = premiumBeforeDiscount.toFixed(2);

      // Calculate premium after discount
      const premiumAfterDiscount = Math.max(0, premiumBeforeDiscount - discountAmount);
      document.querySelector('input[name="premium_after_discount"]').value = premiumAfterDiscount.toFixed(2);

      // Calculate tax
      const taxAmount = isTaxExempted ? 0 : premiumAfterDiscount * (taxRate / 100);
      document.querySelector('input[name="tax_amount"]').value = taxAmount.toFixed(2);

      // Calculate totals
      const totalPremiumExcludingTax = premiumAfterDiscount;
      const totalPremiumIncludingTax = premiumAfterDiscount + taxAmount;
      
      document.querySelector('input[name="total_premium_excluding_tax"]').value = totalPremiumExcludingTax.toFixed(2);
      document.querySelector('input[name="total_premium_including_tax"]').value = totalPremiumIncludingTax.toFixed(2);

      // Calculate commission
      const commissionPaid = totalPremiumIncludingTax * (commissionRate / 100);
      document.querySelector('input[name="commission_paid"]').value = commissionPaid.toFixed(2);
    }

    // Toggle tax exemption
    function toggleTaxExemption() {
      const isTaxExempted = document.getElementById('is_tax_exempted').checked;
      document.querySelector('input[name="tax_rate"]').disabled = isTaxExempted;
      
      if (isTaxExempted) {
        document.querySelector('input[name="tax_rate"]').value = 0;
      } else {
        document.querySelector('input[name="tax_rate"]').value = 0.18;
      }
      
      calculatePremium();
    }

    // File upload handling
    document.addEventListener('DOMContentLoaded', function () {
      const dropZone = document.getElementById('dropZone');
      const fileInput = document.getElementById('fileUpload');
      const filePreviews = document.getElementById('filePreviews');
      const uploadIcon = document.getElementById('uploadIcon');
      const mainText = document.getElementById('mainText');
      const secondaryText = document.getElementById('secondaryText');

      // Handle drag and drop events
      ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
      });

      function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
      }

      ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
      });

      ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
      });

      function highlight() {
        dropZone.classList.add('dragover');
        uploadIcon.classList.replace('bi-cloud-arrow-up', 'bi-file-earmark-plus');
        mainText.textContent = 'Drop files to upload';
      }

      function unhighlight() {
        dropZone.classList.remove('dragover');
        uploadIcon.classList.replace('bi-file-earmark-plus', 'bi-cloud-arrow-up');
        mainText.textContent = 'Drag and drop files here';
      }

      // Handle dropped files
      dropZone.addEventListener('drop', handleDrop, false);

      function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
      }

      // Handle selected files
      fileInput.addEventListener('change', function () {
        handleFiles(this.files);
      });

      // Process and display files
      function handleFiles(files) {
        if (files.length > 0) {
          uploadIcon.classList.replace('bi-cloud-arrow-up', 'bi-check-circle');
          uploadIcon.classList.add('text-success');
          mainText.textContent = `${files.length} file(s) selected`;
          secondaryText.textContent = 'Click to add more files';

          filePreviews.innerHTML = '';

          [...files].forEach(file => {
            if (file.size > 5 * 1024 * 1024) {
              alert(`File ${file.name} exceeds 5MB limit`);
              return;
            }

            const preview = document.createElement('div');
            preview.className = 'file-preview';

            let iconClass = 'bi-file-earmark';
            if (file.type.includes('image/')) {
              iconClass = 'bi-file-image';
            } else if (file.type.includes('pdf')) {
              iconClass = 'bi-file-pdf';
            }

            preview.innerHTML = `
              <i class="bi ${iconClass}"></i>
              <div class="file-info">
                  <div class="file-name">${file.name}</div>
                  <div class="file-size small text-muted">${formatFileSize(file.size)}</div>
              </div>
              <i class="bi bi-x-lg file-remove" title="Remove file"></i>
            `;

            preview.querySelector('.file-remove').addEventListener('click', function () {
              preview.remove();
            });

            filePreviews.appendChild(preview);
          });
        }
      }

      function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
      }

      // Client autocomplete
      const clientInput = document.getElementById('client_name');
      const customerIdInput = document.getElementById('customer_id');
      const dataList = document.getElementById('clientsList');

      clientInput.setAttribute('list', 'clientsList');

      clientInput.addEventListener('input', async function () {
        const query = this.value.trim();
        if (query.length < 2) return;

        try {
          const res = await fetch(`/clients/autocomplete?query=${encodeURIComponent(query)}`);
          const clients = await res.json();

          // Clear previous options
          dataList.innerHTML = '';

          clients.forEach(client => {
            const option = document.createElement('option');
            option.value = client.name;
            option.dataset.id = client.id;
            dataList.appendChild(option);
          });
        } catch (err) {
          console.error('Error fetching clients:', err);
        }
      });

      // Set hidden field on selection
      clientInput.addEventListener('change', function () {
        const options = dataList.querySelectorAll('option');
        const selected = Array.from(options).find(opt => opt.value === clientInput.value);
        customerIdInput.value = selected ? selected.dataset.id : '';
      });
    });

    // Preview quotation
    function previewQuotation() {
      alert('Quotation preview would be generated here. In a real application, this would open a PDF or modal with the quotation details.');
    }

    // Form submission handling
    document.getElementById('quotationForm').addEventListener('submit', function (e) {
      e.preventDefault();

      // Show loading state
      const submitBtn = document.querySelector('button[type="submit"]');
      const originalBtnText = submitBtn.innerHTML;
      submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';
      submitBtn.disabled = true;

      // Submit form via AJAX
      const formData = new FormData(this);

      fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Store quotation details for the receipt modal
            window.currentQuotationId = data.quotation.id;
            window.currentQuotationNumber = data.quotation.cover_note_number;

            // Show success message
            const successDiv = document.createElement('div');
            successDiv.className = 'alert alert-success position-fixed top-0 start-50 translate-middle-x mt-3';
            successDiv.style.zIndex = '9999';
            successDiv.textContent = 'Quotation submitted successfully!';
            document.body.appendChild(successDiv);

            // Remove success message after 1.5 seconds
            setTimeout(() => {
              successDiv.remove();

              // Show the modal after delay
              const receiptModal = new bootstrap.Modal(document.getElementById('captureReceipt'));
              receiptModal.show();

              // Reset form and enable button
              submitBtn.innerHTML = originalBtnText;
              submitBtn.disabled = false;

            }, 1500);
          } else {
            // Handle errors
            submitBtn.innerHTML = originalBtnText;
            submitBtn.disabled = false;
            alert('Error: ' + (data.message || 'Submission failed'));
          }
        })
        .catch(error => {
          console.error('Error:', error);
          submitBtn.innerHTML = originalBtnText;
          submitBtn.disabled = false;
          alert('An error occurred during submission');
        });
    });

    // Handle receipt form submission
    document.getElementById('receiptForm').addEventListener('submit', function (e) {
      e.preventDefault();

      const submitBtn = document.getElementById('submitReceiptBtn');
      const submitText = document.getElementById('receiptSubmitText');
      const spinner = document.getElementById('receiptSpinner');

      // Show loading state
      submitText.textContent = 'Processing...';
      spinner.classList.remove('d-none');
      submitBtn.disabled = true;

      fetch("{{ route('receipts.store') }}", {
        method: 'POST',
        body: new FormData(this),
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Show success message
            alert('Receipt captured successfully!');

            // Redirect to quotation page
            window.location.href = data.redirect_url || "{{ url('/dash/Quotation') }}";
          } else {
            alert('Error: ' + (data.message || 'Failed to capture receipt'));
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('An error occurred while capturing receipt');
        })
        .finally(() => {
          // Reset button state
          submitText.textContent = 'Capture';
          spinner.classList.add('d-none');
          submitBtn.disabled = false;
        });
    });

    // Set quotation details when modal shows
    document.getElementById('captureReceipt').addEventListener('show.bs.modal', function (event) {
      // Get quotation ID from the global variable set during form submission
      const quotationId = window.currentQuotationId;
      const quotationNumber = window.currentQuotationNumber;

      if (quotationId && quotationNumber) {
        document.getElementById('modalQuotationId').value = quotationId;
        document.getElementById('displayQuotationNumber').value = quotationNumber;
      }
    });

    // Auto-calculate equivalent amount
    document.querySelectorAll('input[name="amount"], select[name="currency"], input[name="exchange_rate"]').forEach(element => {
      element.addEventListener('change', function () {
        const amount = parseFloat(document.querySelector('input[name="amount"]').value) || 0;
        const exchangeRate = parseFloat(document.querySelector('input[name="exchange_rate"]').value) || 1;
        document.querySelector('input[name="equivalent_amount"]').value = (amount * exchangeRate).toFixed(2);
      });
    });

    // Initialize date fields
    document.querySelector('input[name="cover_note_start_date"]').valueAsDate = new Date();
    calculateEndDate();
  </script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const clientInput = document.getElementById('client_name');
    const customerIdInput = document.getElementById('customer_id');
    const dataList = document.getElementById('clientsList');

    clientInput.setAttribute('list', 'clientsList');

    clientInput.addEventListener('input', async function () {
        const query = this.value.trim();
        if (query.length < 2) return; // start searching after 2 chars

        try {
            const res = await fetch(`/clients/autocomplete?query=${query}`);
            const clients = await res.json();

            // Clear previous options
            dataList.innerHTML = '';

            clients.forEach(client => {
                const option = document.createElement('option');
                option.value = client.client_name;      // display name
                option.dataset.id = client.id;          // store id
                dataList.appendChild(option);
            });
        } catch (err) {
            console.error(err);
        }
    });

    // Set hidden field on selection
    clientInput.addEventListener('change', function () {
        const options = dataList.querySelectorAll('option');
        const selected = Array.from(options).find(opt => opt.value === clientInput.value);
        customerIdInput.value = selected ? selected.dataset.id : '';
    });
});
</script>

</body>
</html>