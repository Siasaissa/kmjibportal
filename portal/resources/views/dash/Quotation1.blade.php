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
                    <div class="fw-semibold fs-5">SURETECH Systems Co. Ltd</div>
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
              <div class="step active">0%</div>
              <div class="step">25%</div>
              <div class="step">50%</div>
              <div class="step">75%</div>
              <div class="step">100</div>
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
            <form id="quotationForm" method="post" action="{{ route('quotations.store') }}"
              enctype="multipart/form-data">
              <!-- Add this inside your form -->
              <input type="hidden" name="insurance_type" value="{{ $selectedInsuranceType }}">
              @csrf
              <!-- STEP 1: Customer Information -->
              <div class="step-content">
                <h5 class="step-title"><i class="bi bi-person me-2"></i>Customer Information</h5>
                <div class="row g-3">
                  <div class="col-6 form-group autocomplete-wrapper">
                    <label for="client_name" class="form-label required-field">Client Full Name</label>
                    <input type="text" class="form-control client-autocomplete" id="client_name" name="client_name"
                      placeholder="Start typing client name..." autocomplete="off">
                    <div class="autocomplete-suggestions"></div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-field">Address</label>
                    <input class="form-control" name="address" placeholder="Address" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-field">TIN Number</label>
                    <input class="form-control" name="tin" placeholder="TIN Number" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">VRN Number</label>
                    <input class="form-control" name="vrn" placeholder="VRN Number">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-field">ID Type</label>
                    <select class="form-select" name="id_type">
                      <option>Tax Identification Number</option>
                      <option>National ID</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-field">ID Number</label>
                    <input class="form-control" name="id_number" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Date of Birth</label>
                    <input class="form-control" type="date" name="dob">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Customer Type</label>
                    <select class="form-select" name="customer_type">
                      <option>Individual</option>
                      <option>Corporate</option>
                    </select>
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
                  <div class="col-md-6"><label class="form-label">Insurer</label><input class="form-control"
                      name="insurer"></div>
                  <div class="col-md-6"><label class="form-label">Period</label><select class="form-select"
                      name="period">
                      <option>1 year</option>
                      <option>6 months</option>
                    </select></div>
                  <div class="col-md-6"><label class="form-label">Start Date</label><input class="form-control"
                      name="start_date" type="date"></div>
                  <div class="col-md-6"><label class="form-label">End Date</label><input class="form-control"
                      name="end_date" type="date"></div>
                  <div class="col-md-6"><label class="form-label">Currency</label><select class="form-select"
                      name="currency">
                      <option>Tanzania Shilling</option>
                      <option>USD</option>
                    </select></div>
                  <div class="col-md-6"><label class="form-label">Business Contact Person</label><input
                      class="form-control" name="business_contact"></div>
                  <div class="col-md-6"><label class="form-label">No. of Days</label><input class="form-control"
                      name="no_days" type="number"></div>
                  <div class="col-md-6"><label class="form-label">File No.</label><input class="form-control"
                      name="file_no"></div>
                  <div class="col-md-6"><label class="form-label">Branch</label><input class="form-control"
                      name="branch"></div>
                  <div class="col-md-6"><label class="form-label">Fleet Type</label><input class="form-control"
                      name="fleet_type"></div>
                  <div class="col-md-6"><label class="form-label">Motor Type</label><select class="form-select"
                      name="motor_type">
                      <option>Registered</option>
                      <option>Unregistered</option>
                    </select></div>
                  <div class="col-md-6"><label class="form-label">Policy Type</label><select class="form-select"
                      name="policy_type">
                      <option>New Policy</option>
                      <option>Renewal</option>
                    </select></div>
                  <div class="col-md-6"><label class="form-label">Previous Quote</label><input class="form-control"
                      name="previous_quote"></div>
                  <div class="col-md-6"><label class="form-label">Loss Ratio Forecast</label><input class="form-control"
                      name="loss_ratio_forecast"></div>
                  <div class="col-md-6"><label class="form-label">Business Type</label><input class="form-control"
                      name="business_type"></div>
                  <div class="col-md-6"><label class="form-label">Business By</label><input class="form-control"
                      name="business_by"></div>
                  <div class="col-md-6"><label class="form-label">Borrower Type</label><input class="form-control"
                      name="borrower_type"></div>
                  <div class="col-md-6"><label class="form-label">First Loss Payee</label><input class="form-control"
                      name="first_loss_payee"></div>
                  <div class="col-md-6"><label class="form-label">Bind to Collateral</label><input class="form-control"
                      name="bind_collateral"></div>
                  <div class="col-md-6"><label class="form-label">Collateral Name</label><input class="form-control"
                      name="collateral_name"></div>
                  <div class="col-md-6 form-check">
                    <input type="hidden" name="fronting_business" value="0">
                    <input class="form-check-input" type="checkbox" name="fronting_business" value="1">
                    <label class="form-check-label">Fronting Business</label>
                  </div>
                  <div class="col-md-6 form-check">
                    <input type="hidden" name="non_renewable" value="0">
                    <input class="form-check-input" type="checkbox" name="non_renewable" value="1">
                    <label class="form-check-label">Non-Renewable</label>
                  </div>
                  <div class="col-md-6"><label class="form-label">Fleet ID</label><input class="form-control"
                      name="fleet_id"></div>
                  <div class="col-md-6"><label class="form-label">Fleet Sequence No</label><input class="form-control"
                      name="fleet_seq"></div>
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

              <!-- STEP 3: Risk Details -->
              <div class="step-content d-none">
                <h5 class="step-title"><i class="bi bi-shield-exclamation me-2"></i>Risk Details</h5>
                <div class="row g-3">
                  <div class="col-md-4"><label class="form-label">Registration No</label><input class="form-control"
                      name="reg_no" required></div>
                  <div class="col-md-4"><label class="form-label">Chassis Number</label><input class="form-control"
                      name="chassis"></div>
                  <div class="col-md-4"><label class="form-label">Engine Number</label><input class="form-control"
                      name="engine"></div>
                  <div class="col-md-4"><label class="form-label">Vehicle Make</label><input class="form-control"
                      name="make"></div>
                  <div class="col-md-4"><label class="form-label">Vehicle Model</label><input class="form-control"
                      name="model"></div>
                  <div class="col-md-4"><label class="form-label">Body Type</label><input class="form-control"
                      name="body_type"></div>
                  <div class="col-md-4">
                    <label class="form-label">Insurance Type</label>
                    <input class="form-control" name="insurance_type" value="{{ $selectedInsuranceType ?? 'Vehicle' }}"
                      readonly>
                  </div>
                  <div class="col-md-4"><label class="form-label">Insurance Class</label><input class="form-control"
                      name="insurance_class"></div>
                  <div class="col-md-4"><label class="form-label">Fuel Type</label><select class="form-select"
                      name="fuel_type">
                      <option>Petrol</option>
                      <option>Diesel</option>
                    </select></div>
                  <div class="col-md-4"><label class="form-label">Seat Capacity</label><input class="form-control"
                      name="seats" type="number"></div>
                  <div class="col-md-4"><label class="form-label">Color</label><input class="form-control" name="color">
                  </div>
                  <div class="col-md-4"><label class="form-label">Owner Category</label><input class="form-control"
                      name="owner_category"></div>
                  <div class="col-md-4"><label class="form-label">CC</label><input class="form-control" name="cc"></div>
                  <div class="col-md-4"><label class="form-label">Registration Year</label><input class="form-control"
                      name="registration_year" type="number"></div>
                  <div class="col-md-4"><label class="form-label">Accessories Sum Insured</label><input
                      class="form-control" name="accessories_sum" type="number"></div>
                  <div class="col-md-4"><label class="form-label">Accessories Info</label><input class="form-control"
                      name="accessories_info"></div>
                  <div class="col-md-4"><label class="form-label">Windscreen Sum Insured</label><input
                      class="form-control" name="windscreen_sum" type="number"></div>
                  <div class="col-md-4"><label class="form-label">Windscreen Premium</label><input class="form-control"
                      name="windscreen_premium" type="number"></div>
                  <div class="col-md-4"><label class="form-label">Number of Axles</label><input class="form-control"
                      name="axles" type="number"></div>
                  <div class="col-md-4"><label class="form-label">Short Period %</label><input class="form-control"
                      name="short_period" type="number"></div>
                  <div class="col-md-4"><label class="form-label">Override %</label><input class="form-control"
                      name="override" type="number"></div>
                  <div class="col-md-4"><label class="form-label">TPPD Sum Insured</label><input class="form-control"
                      name="tppd_sum" type="number"></div>
                  <div class="col-md-4"><label class="form-label">TPPD Increase Limit</label><input class="form-control"
                      name="tppd_increase" type="number"></div>
                  <div class="col-md-4 form-check">
                    <input type="hidden" name="enable" value="0">
                    <input class="form-check-input" type="checkbox" name="enable" value="1">
                    <label class="form-check-label">Enable</label>
                  </div>
                  <div class="col-md-4 form-check">
                    <input type="hidden" name="apply_depreciation" value="0">
                    <input class="form-check-input" type="checkbox" name="apply_depreciation" value="1">
                    <label class="form-check-label">Apply Depreciation</label>
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

              <!-- Step 4 -->
              <div class="step-content d-none">
                <h5 class="step-title"><i class="bi bi-calculator me-2"></i>Premium Calculation</h5>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label required-field">Sum Insured</label>
                    <input class="form-control" name="sum_insured" type="number" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label required-field">Actual Premium</label>
                    <input class="form-control" name="actual_premium" type="number" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Adjust Premium</label>
                    <input class="form-control" name="adjust_premium" type="number">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Discount (%)</label>
                    <input class="form-control" name="discount" type="number">
                  </div>
                  <div class="col-md-12">
                    <label class="form-label">Total Premium</label>
                    <input class="form-control bg-light" name="total_premium" type="number">
                  </div>
                  <div class="col-md-12">
                    <label class="form-label">Payment Method</label>
                    <select class="form-select" name="payment_method">
                      <option>Mobile Money</option>
                      <option>Bank Transfer</option>
                      <option>Credit Card</option>
                    </select>
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

              <!-- Step 5 -->
              <div class="step-content d-none">
                <h5 class="step-title"><i class="bi bi-cloud-arrow-up me-2"></i>Finalize Quotation</h5>
                <div class="row g-3">
                  <div class="col-12 mb-4">
                    <label for="fileUpload" class="form-label fw-semibold mb-2">Supporting Documents</label>
                    <div class="file-upload-card border rounded-3 p-4 position-relative" id="dropZone">
                      <input type="file" class="file-upload-input d-none" id="fileUpload" multiple
                        accept=".pdf,.jpg,.jpeg,.png">
                      <label for="fileUpload"
                        class="file-upload-label d-flex flex-column align-items-center justify-content-center text-center cursor-pointer py-4">
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





                  <script>
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
                              // Note: To actually remove from file input would require more complex handling
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
                    });
                  </script>
                  <div class="col-12">
                    <label class="form-label">Additional Notes</label>
                    <textarea class="form-control" rows="3"
                      placeholder="Any special instructions or comments..."></textarea>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input type="hidden" name="confirmCheck" value="0">
                      <input class="form-check-input" type="checkbox" name="confirmCheck" id="confirmCheck" value="1"
                        required>
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
                    <button type="button" class="btn  bg-warning me-2 text-white">
                      <i class="bi bi-eye me-2"></i>Preview
                    </button>
                    <button type="submit" class="btn btn-primary text-white" data-bs-toggle="modal"
                      data-bs-target="#captureReceipt">
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="modal fade" id="captureReceipt" tabindex="-1" aria-labelledby="addAgentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="addBranchModalLabel">Capture Receipt</h5>
            <h6 class="modal-title ms-5" id="addBranchModalLabel">ControlNb: SPXZ1864000</h6>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!--<form action="{{url('/dash/Quotation')}}">-->
          <form id="receiptForm" action="{{ route('receipts.store') }}" method="POST">
            @csrf

            <div class="modal-body row g-3 px-4">
              <div class="col-md-4">
                <label class="form-label">Quotation Number</label>
                <input type="text" class="form-control" placeholder="e.g. 12430">
              </div>

              <div class="col-md-4">
                <label class="form-label">Premium</label>
                <input type="text" class="form-control" placeholder="e.g. 1,000,000.00">
              </div>

              <div class="col-md-4">
                <label class="form-label">Premium Currency</label>
                <input type="text" class="form-control" placeholder="e.g. TZS">
              </div>

              <div class="col-md-6">
                <label class="form-label">Mode</label>
                <select class="form-select">
                  <option selected>Please Select</option>
                  <option>Mode1</option>
                  <option>Mode2</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">Reference No</label>
                <input type="text" class="form-control" placeholder="e.g. 1111111121212">
              </div>

              <div class="col-md-6">
                <label class="form-label">Issuer Bank</label>
                <select class="form-select">
                  <option selected>Please Select</option>
                  <option>Bank1</option>
                  <option>Bank2</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">Collecting Bank</label>
                <select class="form-select">
                  <option selected>Please Select</option>
                  <option>Bank1</option>
                  <option>Bank2</option>
                </select>
              </div>

              <div class="col-md-4">
                <label class="form-label">Amount</label>
                <input type="text" class="form-control" placeholder="e.g. 1,000,000.00">
              </div>

              <div class="col-md-2">
                <label class="form-label">Currency</label>
                <select class="form-select">
                  <option selected>Tzs</option>
                  <option>USD</option>
                  <option>EUR</option>
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label">Exchange Rate</label>
                <input type="text" class="form-control" placeholder="e.g. 1.00">
              </div>

              <div class="col-md-3">
                <label class="form-label">Equivalent Amount</label>
                <input type="text" class="form-control" placeholder="e.g. 1.00">
              </div>
            </div>

            <div class="modal-footer px-4">
              <button type="submit" class="btn btn-primary text-white">Capture</button>
              <a href="{{ url('/dash/Quotation') }}"><button type="button"
                  class="btn btn-primary text-white">Skip</button></a>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>

<script>
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
    if (newStep >= 0 && newStep < steps.length) {
      currentStep = newStep;
      updateUI();
      document.querySelector('.card-body').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (newStep === steps.length) {
      // When last step is reached, give choice
      const choice = confirm("Do you want to use Option 2?\nPress OK for Option 2, Cancel for Option 1.");
      if (choice) {
        // Auto-select Option 2
        document.querySelector('input[name="payment_option"][value="2"]').checked = true;
      } else {
        // Auto-select Option 1
        document.querySelector('input[name="payment_option"][value="1"]').checked = true;
      }
      document.getElementById("quotationForm").submit();
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    const grossPremiumInput = document.querySelector('input[placeholder="0.00"]');
    const taxInput = document.querySelector('input[placeholder="0"]');
    const chargesInput = document.querySelector('input[placeholder="0.00"]:not([readonly])');
    const discountInput = document.querySelectorAll('input[placeholder="0"]')[1];
    const totalPremiumInput = document.querySelector('input[name="total_premium"]'); // FIXED

    [grossPremiumInput, taxInput, chargesInput, discountInput].forEach(input => {
      input.addEventListener('input', calculateTotalPremium);
    });

    function calculateTotalPremium() {
      const grossPremium = parseFloat(grossPremiumInput.value) || 0;
      const taxPercent = parseFloat(taxInput.value) || 0;
      const charges = parseFloat(chargesInput.value) || 0;
      const discountPercent = parseFloat(discountInput.value) || 0;

      const taxAmount = grossPremium * (taxPercent / 100);
      const discountAmount = grossPremium * (discountPercent / 100);

      const total = grossPremium + taxAmount + charges - discountAmount;
      totalPremiumInput.value = total.toFixed(2);
    }
  });

  updateUI();
</script>




<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Check if jQuery is loaded
    if (typeof jQuery == 'undefined') {
      console.error('jQuery is not loaded');
      return;
    }

    console.log('Autocomplete script initialized'); // Debug log

    function initializeAutocomplete(inputElement) {
      const input = $(inputElement);
      const suggestions = input.next('.autocomplete-suggestions');

      // Position suggestions absolutely relative to parent
      suggestions.css({
        'position': 'absolute',
        'z-index': '1000',
        'width': input.outerWidth() + 'px'
      });

      input.on('keyup', function () {
        const query = input.val().trim();

        if (query.length < 2) {
          suggestions.empty().hide();
          return;
        }

        console.log('Searching for:', query); // Debug log

        // Show loading indicator
        suggestions.html('<div class="loading">Searching...</div>').show();

        $.ajax({
          url: '{{ route("clients.autocomplete") }}',
          type: 'GET',
          data: { query: query },
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (data) {
            console.log('Received data:', data); // Debug log
            suggestions.empty();
            if (data && data.length > 0) {
              $.each(data, function (index, value) {
                suggestions.append(
                  '<div class="autocomplete-item">' + value + '</div>'
                );
              });
              suggestions.show();
            } else {
              suggestions.append(
                '<div class="no-results">No matches found</div>'
              ).show();
            }
          },
          error: function (xhr) {
            console.error('Autocomplete error:', xhr.responseText);
            suggestions.empty().append(
              '<div class="error">Error loading suggestions</div>'
            ).show();
          }
        });
      });

      // Handle suggestion selection
      suggestions.on('click', '.autocomplete-item', function () {
        input.val($(this).text());
        suggestions.empty().hide();
      });
    }

    // Initialize for all autocomplete fields
    $('.client-autocomplete').each(function () {
      console.log('Initializing autocomplete for:', this); // Debug log
      initializeAutocomplete(this);
    });

    // Hide suggestions when clicking elsewhere
    $(document).on('click', function (e) {
      if (!$(e.target).closest('.client-autocomplete, .autocomplete-suggestions').length) {
        $('.autocomplete-suggestions').empty().hide();
      }
    });
  });
</script>



<script>
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
          window.currentQuotationId = data.quotation_id;
          window.currentQuotationNumber = data.quotation_number;

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
        }
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
</script>
<script>
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
          window.location.href = data.redirect_url;
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
        submitText.textContent = 'Capture Receipt';
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
      document.getElementById('receiptQuotationNumber').textContent = quotationNumber;
    }
  });

  // Auto-calculate equivalent amount
  document.querySelector('input[name="amount"], select[name="currency"], input[name="exchange_rate"]')
    .forEach(element => {
      element.addEventListener('change', function () {
        const amount = parseFloat(document.querySelector('input[name="amount"]').value) || 0;
        const exchangeRate = parseFloat(document.querySelector('input[name="exchange_rate"]').value) || 1;
        document.querySelector('input[name="equivalent_amount"]').value = (amount * exchangeRate).toFixed(2);
      });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>