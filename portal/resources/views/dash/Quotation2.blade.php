<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Customer</title>
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
    <div id="toast-container"></div>
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
                                        Add Customer
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
                                        <a href="{{url('/dash/Quotation')}}">
                                            <button class="btn btn-sm bg-danger text-white">
                                                <i class="bi bi-bag-plus text-white"></i> Quotation
                                                <!--existing customer-->
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
                            <div class="step">50%</div>
                            <div class="step">100</div>
                        </div>

                        <!-- Form -->
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form id="quotationForm" action="{{ route('customers.store') }}" method="POST">
                            @csrf
                            <!-- STEP 1: Client Details -->
                            <div class="step-content">
                                <h5 class="step-title"><i class="bi bi-person me-2"></i>Client Details</h5>
                                <div class="row g-3">
                                    <div class="col-md-6"><label class="form-label required-field">Title</label><select
                                            class="form-select" name="title" required>
                                            <option>Please Select1</option>
                                            <option>Please Select1</option>
                                            <option>Please Select1</option>
                                        </select></div>
                                    <div class="col-6 form-group autocomplete-wrapper">
                                        <label for="client_name" class="form-label required-field">Client Full
                                            Name</label>
                                        <input type="text" class="form-control client-autocomplete" id="client_name"
                                            name="client_name" placeholder="Start typing client name..."
                                            autocomplete="off">
                                        <div class="autocomplete-suggestions"></div>
                                    </div>
                                    <div class="col-md-6"><label class="form-label required-field">Client
                                            Status</label><select class="form-select" name="client_status" required>
                                            <option>Please Select1</option>
                                            <option>Please Select2</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label required-field">Client Sub
                                            Status</label><select class="form-select" name="client_sub_status">
                                            <option>Please Select1</option>
                                            <option>Please Select2</option>
                                            <option>Please Select3</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label required-field">AML Risk
                                            Category</label><select class="form-select" name="aml_risk">
                                            <option>Please Select1</option>
                                            <option>Please Select2</option>
                                            <option>Please Select3</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label required-field">ID
                                            Type</label><select class="form-select" name="id_type">
                                            <option>Please Select2</option>
                                            <option>Please Select3</option>
                                            <option>Please Select4</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label required-field">ID
                                            Number</label><input type="number" class="form-control" name="id_number"
                                            required></div>
                                    <div class="col-md-6"><label class="form-label required-field">TIN/PAN</label><input
                                            type="number" class="form-control" name="tin" required></div>
                                    <div class="col-md-6"><label class="form-label required-field">ZRB No</label><input
                                            type="number" class="form-control" name="zrb" required></div>
                                    <div class="col-md-6"><label class="form-label required-field">Appointment
                                            Date</label><input class="form-control" type="date" name="appointment_date"
                                            required></div>
                                    <div class="col-md-6"><label class="form-label required-field">Account
                                            Number</label><input type="number" class="form-control"
                                            name="account_number" required></div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <div></div>
                                    <button type="button" class="btn btn-primary text-white" onclick="changeStep(1)">
                                        Next <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- STEP 2: Individual or Corporate -->
                            <div class="step-content d-none">
                                <h5 class="step-title"><i class="bi bi-card-checklist me-2"></i>Individual / Corporate
                                    Info</h5>
                                <div class="row g-3">
                                    <!-- INDIVIDUAL -->
                                    <div class="col-12">
                                        <h6>Individual Section</h6>
                                    </div>
                                    <div class="col-md-6"><label class="form-label">Date of Birth</label><input
                                            class="form-control" type="date" name="dob"></div>
                                    <div class="col-md-6"><label class="form-label">Place of Birth</label><input
                                            class="form-control" name="place_of_birth"></div>
                                    <div class="col-md-6"><label class="form-label">Nationality</label><select
                                            class="form-select" name="nationality">
                                            <option>Please Select</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label">Gender</label><select
                                            class="form-select" name="gender">
                                            <option>Please Select</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label">Marital Status</label><select
                                            class="form-select" name="marital_status">
                                            <option>Please Select</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label">Occupation</label><input
                                            class="form-control" name="occupation"></div>
                                    <div class="col-md-6"><label class="form-label">Disability Status</label><select
                                            class="form-select" name="disability">
                                            <option>Please Select</option>
                                        </select></div>
                                    <!-- CORPORATE -->
                                    <div class="col-12">
                                        <h6 class="text-danger">Corporate Section</h6>
                                    </div>
                                    <div class="col-md-6"><label class="form-label">Business Type</label><select
                                            class="form-select" name="business_type">
                                            <option>Please Select</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label">Country Of
                                            Registration</label><select class="form-select"
                                            name="country_of_registration">
                                            <option>Please Select</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label">Registration Date</label><input
                                            class="form-control" type="date" name="registration_date"></div>
                                    <div class="col-md-6"><label class="form-label">Registration Number</label><input
                                            class="form-control" name="registration_number"></div>
                                    <div class="col-md-6"><label class="form-label">Contact Person</label><input
                                            class="form-control" name="contact_person"></div>
                                    <div class="col-md-6"><label class="form-label">VRN/GST</label><input
                                            class="form-control" name="vrn_gst"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-primary text-white" onclick="changeStep(-1)">
                                        <i class="bi bi-arrow-left me-2"></i> Back
                                    </button>
                                    <button type="button" class="btn btn-primary text-white" onclick="changeStep(1)">
                                        Next <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- STEP 3: Address & Contact Info -->
                            <div class="step-content d-none">
                                <h5 class="step-title"><i class="bi bi-geo-alt me-2"></i>Contact Information</h5>
                                <div class="row g-3">
                                    <div class="col-md-6"><label class="form-label">Region/Province</label><select
                                            class="form-select" name="region">
                                            <option>Please Select</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label">District</label><select
                                            class="form-select" name="district">
                                            <option>Please Select</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label">Village</label><input
                                            class="form-control" name="village"></div>
                                    <div class="col-md-6"><label class="form-label">Sector</label><input
                                            class="form-control" name="sector"></div>
                                    <div class="col-md-6"><label class="form-label">Cell/Street</label><input
                                            class="form-control" name="cell_street"></div>
                                    <div class="col-md-6"><label class="form-label">Mandate Expiry</label><input
                                            class="form-control" type="date" name="mandate_expiry"></div>
                                    <div class="col-md-6"><label class="form-label">Profile ID</label><input
                                            class="form-control" name="profile_id"></div>
                                    <div class="col-md-6"><label class="form-label">Profile Category</label><select
                                            class="form-select" name="profile_category">
                                            <option>Please Select</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label">Screening Group ID</label><input
                                            class="form-control" name="screening_group_id"></div>
                                    <div class="col-md-6"><label class="form-label">Address</label><textarea
                                            class="form-control" name="address"></textarea></div>
                                    <div class="col-md-6"><label class="form-label">Mobile No 1</label><input
                                            class="form-control" name="mobile1"></div>
                                    <div class="col-md-6"><label class="form-label">Mobile No 2</label><input
                                            class="form-control" name="mobile2"></div>
                                    <div class="col-md-6"><label class="form-label">Mobile No 3</label><input
                                            class="form-control" name="mobile3"></div>
                                    <div class="col-md-6"><label class="form-label">Telephone No 1</label><input
                                            class="form-control" name="telephone1"></div>
                                    <div class="col-md-6"><label class="form-label">Telephone No 2</label><input
                                            class="form-control" name="telephone2"></div>
                                    <div class="col-md-6"><label class="form-label">Telephone No 3</label><input
                                            class="form-control" name="telephone3"></div>
                                    <div class="col-md-6"><label class="form-label">Email 1</label><input
                                            class="form-control" name="email1"></div>
                                    <div class="col-md-6"><label class="form-label">Email 2</label><input
                                            class="form-control" name="email2"></div>
                                    <div class="col-md-6"><label class="form-label">Email 3</label><input
                                            class="form-control" name="email3"></div>
                                    <div class="col-md-6 form-check">
                                        <input class="form-check-input" type="checkbox" name="tax_exempted">
                                        <label class="form-check-label">Tax Exempted</label>
                                    </div>
                                    <div class="col-md-6 form-check">
                                        <input class="form-check-input" type="checkbox" name="related_party">
                                        <label class="form-check-label">Related Party</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Preferred Notification</label>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                name="notify_sms"><label class="form-check-label">SMS</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                name="notify_email"><label class="form-check-label">Email</label></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Select Language</label>
                                        <div class="form-check"><input class="form-check-input" type="radio"
                                                name="language" value="English" checked><label
                                                class="form-check-label">English</label></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">PEP Customer</label>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="pep"
                                                value="yes"><label class="form-check-label">Yes</label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" name="pep"
                                                value="no" checked><label class="form-check-label">No</label></div>
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
                                            <input class="form-check-input" type="checkbox" required id="confirmCheck">
                                            <label class="form-check-label" for="confirmCheck">
                                                I confirm that all information provided is accurate and complete.
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-primary text-white" onclick="changeStep(-1)">
                                        <i class="bi bi-arrow-left me-2"></i> Back
                                    </button>
                                    <div>

                                        <button type="submit" class="btn btn-primary text-white">
                                            <i class="bi bi-check-circle me-2 text-success"></i>Add Customer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
                // Validate current step before proceeding
                if (n > 0 && !validateCurrentStep()) {
                    return; // Don't proceed if validation fails
                }

                const newStep = currentStep + n;
                if (newStep >= 0 && newStep < steps.length) {
                    currentStep = newStep;
                    updateUI();
                    document.querySelector('.card-body').scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else if (newStep === steps.length) {
                    document.getElementById("quotationForm").submit();
                }
            }

            function validateCurrentStep() {
                const currentStepContent = stepContents[currentStep];
                const requiredInputs = currentStepContent.querySelectorAll('[required]');
                let isValid = true;

                // Reset previous error states
                currentStepContent.querySelectorAll('.is-invalid').forEach(el => {
                    el.classList.remove('is-invalid');
                });
                currentStepContent.querySelectorAll('.invalid-feedback').forEach(el => {
                    el.remove();
                });

                // Validate each required field
                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('is-invalid');

                        // Add error message
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'invalid-feedback';
                        errorDiv.textContent = 'This field is required';
                        input.parentNode.appendChild(errorDiv);

                        // Scroll to first error
                        if (isValid === false) {
                            input.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            input.focus();
                        }
                    }
                });

                if (!isValid) {
                    // Show toast notification
                    showNotification('Please fill all required fields', 'danger');
                }

                return isValid;
            }

            document.addEventListener('DOMContentLoaded', function () {
                const grossPremiumInput = document.querySelector('input[placeholder="0.00"]');
                const taxInput = document.querySelector('input[placeholder="0"]');
                const chargesInput = document.querySelector('input[placeholder="0.00"]:not([readonly])');
                const discountInput = document.querySelectorAll('input[placeholder="0"]')[1];
                const totalPremiumInput = document.querySelector('input[readonly]');

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
            $(document).ready(function () {
                $('#addBranchForm').on('submit', function (e) {
                    e.preventDefault();
                    $('#addBranchModal').modal('hide');
                    showNotification('Product has been added successfully', 'success');
                    // Reset form after submission
                    this.reset();
                });

                // Toast notification function
                function showNotification(message, type) {
                    const toastContainer = document.getElementById('toast-container');

                    const toast = document.createElement('div');
                    toast.className = `toast show align-items-center custom-toast toast-${type} bg-light border-0`;
                    toast.setAttribute('role', 'alert');
                    toast.setAttribute('aria-live', 'assertive');
                    toast.setAttribute('aria-atomic', 'true');

                    // Set icon based on type
                    let icon = 'bi-info-circle';
                    if (type === 'success') icon = 'bi-check-circle';
                    if (type === 'danger') icon = 'bi-trash';
                    if (type === 'warning') icon = 'bi-exclamation-triangle';

                    toast.innerHTML = `
                    <div class="d-flex align-items-center px-3 py-2">
                        <i class="bi ${icon} toast-icon text-${type}"></i>
                        <div class="toast-body">${message}</div>
                        <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                `;

                    toastContainer.appendChild(toast);

                    // Initialize Bootstrap Toast
                    const bsToast = new bootstrap.Toast(toast, {
                        autohide: true,
                        delay: 3000
                    });
                    bsToast.show();

                    // Remove toast after it's hidden
                    toast.addEventListener('hidden.bs.toast', () => {
                        toast.remove();
                    });

                    // Allow clicking to dismiss
                    toast.addEventListener('click', () => {
                        bsToast.hide();
                    });
                }
            });
        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <div class="modal fade" id="captureReceipt" tabindex="-1" aria-labelledby="addAgentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="addBranchModalLabel">Capture Receipt</h5>
                        <h6 class="modal-title ms-5" id="addBranchModalLabel">ControlNb: SPXZ1864000</h6>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form action="Quotation.html" id="addBranchModal">
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
                            <button type="submit" class="btn btn-primary text-white">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Client autocomplete functionality
        $(document).on('keyup', '.client-autocomplete', function () {
            var input = $(this);
            var query = input.val().trim();
            var suggestions = input.next('.autocomplete-suggestions');

            if (query.length < 2) {
                suggestions.empty().hide();
                return;
            }

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
                    suggestions.empty();
                    if (data && data.length > 0) {
                        $.each(data, function (index, value) {
                            suggestions.append(
                                '<div class="autocomplete-item" data-value="' +
                                value.replace(/"/g, '&quot;') + '">' + value + '</div>'
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
        $(document).on('click', '.autocomplete-item', function () {
            var value = $(this).data('value');
            $(this).parent().prev('.client-autocomplete').val(value);
            $(this).parent().empty().hide();
        });

        // Hide suggestions when clicking elsewhere
        $(document).on('click', function (e) {
            if (!$(e.target).closest('.client-autocomplete, .autocomplete-suggestions').length) {
                $('.autocomplete-suggestions').empty().hide();
            }
        });
    });
</script>

</html>