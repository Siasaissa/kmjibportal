<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Quotation Page</title>
    @include('Cat_heading.heading')

</head>

<body class="body">
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
                                        Quotation
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
                                                <!--non existing custommer-->
                                            </button>
                                        </a>
                                    </div>
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                        <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal"
                                            data-bs-target="#InsuranceType">
                                            <i class="bi bi-bag-plus text-white"></i>Create Quotation
                                            <!--existing customer-->
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Table widget 14-->
                <div class="card card-flush">
                    <!--begin::Header-->
                    <div class="card-header pt-7">


                    </div>
                    <div class="card-body pt-6">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table align-items-center border-danger"
                                style=".border-light-danger {border-color: #f8d7da !important; } font-family: Geneva !important; "
                                id="datatable1">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2  text-center">
                                        <th>S/No</th>
                                        <th>Branch</th>
                                        <th>Date</th>
                                        <th>Client Name</th>
                                        <th>Cover Period</th>
                                        <th>Insurer Name</th>
                                        <th>Payable</th>
                                        <th>Received</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody>
                                    @if($quotations && $quotations->count())
                                        @foreach($quotations as $quotation)
                                            <tr class=" fs-6  text-center min-w-900px text-wrap">
                                                <td>{{ $loop->iteration  }}</td>
                                                <td>{{ $quotation->branch }}</td>
                                                <td>{{ $quotation->start_date }}</td>
                                                <td>{{ $quotation->client_name }}</td>
                                                <td>{{ $quotation->start_date->format('Y-m-d') }} -
                                                    {{ $quotation->end_date->format('Y-m-d') }}
                                                </td>
                                                <td>{{ $quotation->insurer }}</td>
                                                <td>{{ $quotation->sum_insured }}</td>
                                                <td>{{ $quotation->actual_premium }}</td>

                                                <td class="fs-6 text-center">
                                                    @if($quotation->status == 0)

                                                        <span
                                                            class="badge border border-warning text-success d-inline-block text-center"
                                                            style="width: auto; color: orange !important;">
                                                            Awaiting receipt
                                                        </span>
                                                    @elseif($quotation->status == 1)
                                                        <span
                                                            class="badge border border-success text-success d-inline-block text-center"
                                                            style="width: auto; color: green !important;">
                                                            Risknote Issued
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-center gap-3 d-inline-block">
                                                    <!-- Icon that triggers modal -->
                                                    <i class="bi bi-eye fs-6 me-2 cursor-pointer text-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $quotation->id }}"></i>

                                                    <i class="bi bi-pencil-square fs-6 me-2 ms-2 cursor-pointer"
                                                        style="color: orange !important;" data-bs-toggle="modal"
                                                        data-bs-target="#editModal"></i>
                                                    <i class="bi bi-trash fs-6 text-danger ms-2 cursor-pointer"
                                                        style="color: #dc3545 !important;" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"></i>
                                                    @if($quotation->status == 0)
                                                        <i class="bi bi-receipt fs-6 text-success ms-2 cursor-pointer"
                                                            style="color: green !important;" data-bs-toggle="modal"
                                                            data-bs-target="#captureReceiptModal{{ $quotation->id }}"></i>

                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">No risknote found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Modal Start -->
            @if($quotations)
                @foreach($quotations as $quotation)
                    <div class="modal fade" id="viewModal{{ $quotation->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md-custom">
                            <!-- Optional: modal-lg for larger width -->
                            <div class="modal-content">
                                <div class="card card-flush">
                                    <!--begin::Header-->
                                    <div class="card-header pt-7">
                                        <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="w-100 text-center mb-2 text-success">
                                            <h2>Details</h2>
                                        </div>
                                    </div>

                                    <div class="card-body pt-6">
                                        <div class="row align-items-start ms-4">
                                            <!-- Details Column -->
                                            <div class="col-md-8 wrap">
                                                <p><strong>Name:</strong> {{ $quotation->client_name }}</p>
                                                <p><strong>Expired Date:</strong> {{ $quotation->end_date }}</p>
                                                <p><strong>Insurance Type:</strong> {{ $quotation->insurance_type }}</p>
                                                <p><strong>Quote:</strong> {{ $quotation->previous_quote }}</p>
                                                <p><strong>Address:</strong> {{ $quotation->address }}</p>
                                                <p><strong>Payment:</strong> {{ $quotation->payment_method }}</p>
                                                <p><strong>Premium:</strong> {{ $quotation->total_premium }}</p>
                                                <p><strong>Start Date:</strong> {{ $quotation->start_date->format('Y-m-d') }}
                                                </p>
                                                <p><strong>Created At:</strong> {{ $quotation->created_date }}</p>
                                            </div>

                                            <!-- QR and Button Column -->
                                            <div class="col-md-4 d-flex flex-column align-items-center"
                                                style="margin-top: -10;">
                                                <img src="{{ asset('assets/dash/board_files/qr.png') }}" alt="Profile"
                                                    class="img-fluid mb-3" style="max-width: 200px; height: auto;">

                                                <div class="d-flex gap-3">
                                                    <img src="{{ asset('assets/dash/board_files/TIRAlogo.png') }}"
                                                        alt="TIRA Logo" style="width: 40px; height: auto;">
                                                    <button class="btn btn-primary btn-sm px-2" style="color: white;"
                                                        data-bs-toggle="modal" data-bs-target="#actions1Modal">
                                                        Actions
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end modal-content -->
                        </div> <!-- end modal-dialog -->
                    </div> <!-- end modal -->
                @endforeach
            @endif

            <!-- EDIT MODAL -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="editModalLabel">Edit Quotation Details</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form id="editForm">
                            <div class="modal-body row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Branch Name</label>
                                    <input type="text" class="form-control" value="Main Branch">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control" value="Ahmed Siasa">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Cover Period</label>
                                    <input type="Date" class="form-control" value="27-jul-2025">
                                    <input type="Date" class="form-control" value="26-jul-2026">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Insurer Name</label>
                                    <input type="text" class="form-control"
                                        placeholder="Strategic Insurance (T) Limited">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary text-white ">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--end of edit modal-->
            <!--insurance modal-->
            <!-- Replace the existing modal form -->
            <div class="modal fade" id="InsuranceType" tabindex="-1" aria-labelledby="InsuranceTypeLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">SELECT INSURANCE TYPE</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('Quotation1.create') }}" method="GET">
                            <div class="modal-body row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Insurance Type:</label>
                                    <select class="form-select" name="insurance_type" required>
                                        <option value="Vehicle">Vehicle</option>
                                        <option value="Marine">Marine</option>
                                        <option value="Property">Property</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary text-white">Proceed</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
            <!--end::Global Javascript Bundle-->

            <!--begin::Vendors Javascript(used for this page only)-->
            <script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
            <script src="../assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
            <!--end::Vendors Javascript-->

            <!--begin::Custom Javascript(used for this page only)-->
            <script src="../assets/js/widgets.bundle.js"></script>
            <script src="../assets/js/custom/apps/chat/chat.js"></script>
            <script src="../assets/js/custom/utilities/modals/create-campaign.js"></script>
            <script src="../assets/js/custom/utilities/modals/users-search.js"></script>
            <!--begin::Global Javascript Bundle(mandatory for all pages)-->
            <script src="../assets/plugins/global/plugins.bundle.js"></script>
            <!--end::Global Javascript Bundle-->

            <!--begin::Vendors Javascript(used for this page only)-->
            <script src="../assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
            <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
            <!--end::Vendors Javascript-->

            <!--begin::Custom Javascript(used for this page only)-->
            <script src="../assets/js/widgets.bundle.js"></script>
            <script src="../assets/js/custom/apps/chat/chat.js"></script>
            <script src="../assets/js/custom/utilities/modals/create-campaign.js"></script>
            <script src="../assets/js/custom/utilities/modals/users-search.js"></script>


            <!-- Add before closing </body> -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


            <script>
                $(document).ready(function () {

                    // Form submission handlers
                    $('#editForm').on('submit', function (e) {
                        e.preventDefault();
                        $('#editModal').modal('hide');
                        showNotification('Quotation has been updated successfully', 'success');
                    });

                    $('#confirmDelete').on('click', function () {
                        $('#deleteModal').modal('hide');
                        showNotification('Quotation has been deleted successfully', 'danger');
                    });

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
            @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        showNotification(@json(session('success')), 'success');
                    });

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
                </script>
            @endif



        </div>

        <div class="modal fade" id="actions1Modal" tabindex="-1" aria-labelledby="actions1ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="actions1ModalLabel">Actions</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-4">

                            <div class="col-md-3">
                                <a href="#" class="text-decoration-none">
                                    <div
                                        class="card bg-danger p-3 text-center text-white cursor-pointer h-100 d-flex flex-column justify-content-center">
                                        Print Quotation
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="#" class="text-decoration-none">
                                    <div
                                        class="card bg-danger p-3 text-center text-white cursor-pointer h-100 d-flex flex-column justify-content-center">
                                        Digital Payment
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="#" class="text-decoration-none">
                                    <div
                                        class="card bg-danger p-3 text-center text-white cursor-pointer h-100 d-flex flex-column justify-content-center">
                                        Print Profoma
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="#" class="text-decoration-none">
                                    <div
                                        class="card bg-danger p-3 text-center text-white cursor-pointer h-100 d-flex flex-column justify-content-center">
                                        Attach Document
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="{{asset('assets/dash/board_files/T903DSF.pdf')}}" class="text-decoration-none">
                                    <div class="card bg-danger p-3 text-center text-white cursor-pointer h-100 d-flex flex-column justify-content-center"
                                        id="downloadBtn">
                                        Print Risknote
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="#" class="text-decoration-none">
                                    <div
                                        class="card bg-danger p-3 text-center text-white cursor-pointer h-100 d-flex flex-column justify-content-center">
                                        Print Proposal
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="#" class="text-decoration-none">
                                    <div
                                        class="card bg-danger p-3 text-center text-white cursor-pointer h-100 d-flex flex-column justify-content-center">
                                        Print Receipt
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="#" class="text-decoration-none">
                                    <div
                                        class="card bg-danger p-3 text-center text-white cursor-pointer h-100 d-flex flex-column justify-content-center">
                                        Email Quote
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>



                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <strong>Ahmed Siasa Issa</strong>'s Quotation? This action
                        cannot be
                        undone.
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary text-white" id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        @if($quotations)
            @foreach($quotations as $quotation)
                <div class="modal fade" id="captureReceiptModal{{ $quotation->id }}" tabindex="-1"
                    aria-labelledby="addAgentModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="addBranchModalLabel">Capture Receipt</h5>
                                <h6 class="modal-title ms-5" id="addBranchModalLabel">ControlNb: SPXZ1864000</h6>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="{{ route('receipts.store') }}" method="POST">
                                @csrf
                                <div class="modal-body row g-3 px-4">
                                    <div class="col-md-12">
                                        <input type="hidden" name="quotation_id" value="{{ $quotation->id }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Premium</label>
                                        <input type="number" step="0.01" name="premium_amount" class="form-control"
                                            placeholder="e.g. 1,000,000.00" value="{{ old('premium_amount') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Premium Currency</label>
                                        <input type="text" name="premium_currency" class="form-control" placeholder="e.g. TZS"
                                            value="{{ old('premium_currency') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Mode</label>
                                        <select name="payment_mode" class="form-select">
                                            <option value="" disabled selected>Please Select</option>
                                            <option value="Mode1" {{ old('payment_mode') == 'Mode1' ? 'selected' : '' }}>Mode1
                                            </option>
                                            <option value="Mode2" {{ old('payment_mode') == 'Mode2' ? 'selected' : '' }}>Mode2
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Reference No</label>
                                        <input type="text" name="reference_no" class="form-control"
                                            placeholder="e.g. 1111111121212" value="{{ old('reference_no') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Issuer Bank</label>
                                        <select name="issuer_bank" class="form-select">
                                            <option value="" disabled selected>Please Select</option>
                                            <option value="Bank1" {{ old('issuer_bank') == 'Bank1' ? 'selected' : '' }}>Bank1
                                            </option>
                                            <option value="Bank2" {{ old('issuer_bank') == 'Bank2' ? 'selected' : '' }}>Bank2
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Collecting Bank</label>
                                        <select name="collecting_bank" class="form-select">
                                            <option value="" disabled selected>Please Select</option>
                                            <option value="Bank1" {{ old('collecting_bank') == 'Bank1' ? 'selected' : '' }}>Bank1
                                            </option>
                                            <option value="Bank2" {{ old('collecting_bank') == 'Bank2' ? 'selected' : '' }}>Bank2
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Amount</label>
                                        <input type="number" step="0.01" name="amount" class="form-control"
                                            placeholder="e.g. 1,000,000.00" value="{{ old('amount') }}">
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label">Currency</label>
                                        <select name="currency" class="form-select">
                                            <option value="TZS" {{ old('currency') == 'TZS' ? 'selected' : '' }}>TZS</option>
                                            <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                                            <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Exchange Rate</label>
                                        <input type="number" step="0.0001" name="exchange_rate" class="form-control"
                                            placeholder="e.g. 1.00" value="{{ old('exchange_rate', 1) }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Equivalent Amount</label>
                                        <input type="number" step="0.01" name="equivalent_amount" class="form-control"
                                            placeholder="e.g. 1.00" value="{{ old('equivalent_amount') }}">
                                    </div>
                                </div>

                                <div class="modal-footer px-4">
                                    <button type="submit" class="btn btn-primary text-white">Capture</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            @endforeach
        @endif
</body>
<script>
    document.getElementById('downloadBtn').addEventListener('click', function () {
        // Store the download flag
        sessionStorage.setItem('downloadCoverNote', 'true');
        // Redirect to the page that will generate the PDF
        window.location.href = 'textDownload.html';
    });
</script>
<script>
    $(document).ready(function () {
        $('.table').DataTable({
            "pageLength": 3 // Show only 5 rows per page
        });
    });

    function openNewTransactionModal() {
        const modal = new bootstrap.Modal(document.getElementById('newTransactionModal'));
        modal.show();
    }


</script>


</html>