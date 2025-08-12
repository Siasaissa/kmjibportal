<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaction</title>
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
                                        <i class="bi bi-briefcase fs-2 section-icon me-3"></i>
                                        Transaction
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

                                    <a href="{{url ('/dash/index')}}">
                                        <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                                            <i class="bi bi-house me-1"></i> Dashboard
                                        </button>
                                    </a>
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                        <a href="#" style="color: white;">
                                            <button class="btn btn-sm bg-danger text-white" onclick="openNewTransactionModal()">
                                                <i class="fas fa-plus text-white"></i> Add New Transaction
                                            </button>
                                        </a>
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
                        <table class="table table align-items-center border-danger" style=".border-light-danger {border-color: #f8d7da !important; } font-family: Geneva !important; " >
                            <!--begin::Table head-->
                            <thead>
                            <tr class="fs-5 fw-bold text-dark border-bottom-2 ">
                                <th class="min-w-100px text-center">S/No</th>
                                <th class="min-w-100px text-center">Client</th>
                                <th class="min-w-100px text-center">#Policy</th>
                                <th class="min-w-100px text-center">Vehicle</th>
                                <th class="min-w-100px text-center">Company</th>
                                <th class="min-w-100px text-center">Region</th>
                                <th class="min-w-100px text-center">Payment</th>
                                <th class="min-w-100px text-center">Premium</th>
                                <th class="min-w-100px text-center">Created At</th>
                                <th class="min-w-100px text-center">Status</th>
                                <th class="min-w-100px text-center">Action</th>
                            </tr>
                            </thead>

                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                            <tr class="text-gray-600 fs-6 text-center border-bottom-2">
                                <td class="text-center">01</td>
                                <td>Ahmed Siasa</td>
                                <td>POL1234</td>
                                <td>Motor - T123 ABC</td>
                                <td>Heritage Insurance</td>
                                <td>Dar es Salaam</td>
                                <td>Mobile</td>
                                <td>100,000.00</td>
                                <td>2025-07-14 10:30 AM</td>
                                <td>
                                <span class="badge border border-success text-success d-inline-block text-center" style="width: 80px;color: green !important;">
                                    Success
                                </span>

                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <a href="#" class="text-primary" title="View" data-bs-toggle="modal" data-bs-target="#more"><i class="bi bi-eye fs-4"></i></a>
                                        <a href="#" class="text-secondary" title="Print"><i class="bi bi-printer fs-4"></i></a>
                                    </div>
                                </td>

                            </tr>

                            <tr class="text-gray-600 fs-6 text-center border-bottom-2">
                                <td class="text-center">02</td>
                                <td>Husein Karim</td>
                                <td>POL5678</td>
                                <td>Motor - T456 DEF</td>
                                <td>Jubilee Insurance</td>
                                <td>Arusha</td>
                                <td>Bank</td>
                                <td>85,500.00</td>
                                <td>2025-07-10 2:45 PM</td>
                                <td>
                                <span class="badge border border-warning text-Warning d-inline-block text-center" style="width: 80px; color: orange !important;">
                                    Pending
                                </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <a href="#" class="text-primary" title="View" data-bs-toggle="modal" data-bs-target="#more"><i class="bi bi-eye fs-4" ></i></a>
                                        <a href="#" class="text-secondary" title="Print"><i class="bi bi-printer fs-4"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="text-gray-600 fs-6 text-center border-bottom-2">
                                <td class="text-center">03</td>
                                <td>Salum Kasim</td>
                                <td>POL9012</td>
                                <td>Commercial - T789 XYZ</td>
                                <td>Resolution Insurance</td>
                                <td>Mwanza</td>
                                <td>Cash</td>
                                <td>230,000.00</td>
                                <td>2025-06-30 09:15 AM</td>
                                <td>
                                <span class="badge border border-danger text-danger d-inline-block text-center" style="width: 80px; color: red !important;">
                                    Failed
                                </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <a href="#" class="text-primary" title="View" data-bs-toggle="modal" data-bs-target="#more"><i class="bi bi-eye fs-4"></i></a>
                                        <a href="#" class="text-secondary" title="Print"><i class="bi bi-printer fs-4"></i></a>
                                    </div>
                                </td>
                            </tr>

                            
                            </tbody>

                            <!--end::Table body-->
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!--modal start-->
        <div class="modal fade" id="newTransactionModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" style="color: white;">New Transaction</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addBranchForm">
                <div class="row g-3">
                    <div class="col-md-6">
                    <label class="form-label">Client Name</label>
                    <input type="text" class="form-control" placeholder="e.g. Ahmed Siasa">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Vehicle</label>
                    <input type="text" class="form-control" placeholder="e.g. Motor">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Agent</label>
                    <input type="text" class="form-control" placeholder="e.g. Sidra Agency">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Region</label>
                    <input type="text" class="form-control" placeholder="e.g. Dar es Salaam">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Payment Method</label>
                    <select class="form-select">
                        <option>Mobile</option>
                        <option>Bank</option>
                        <option>Cash</option>
                    </select>
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Premium (TZS)</label>
                    <input type="number" class="form-control" placeholder="e.g. 59000">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option>Success</option>
                        <option>Pending</option>
                        <option>Failed</option>
                    </select>
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary text-white" data-bs-dismiss="modal">Add Transaction</button>

            </div>
                </form>
            </div>
            
            </div>
        </div>
        </div>
        <div class="modal fade " id="more" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <h2><strong>Transaction Details</strong></h2>
                                </div>
                            </div>
                            <div class="card-body pt-4">
                                <div class="row g-4 align-items-center">

                                    <!-- Image and Logo Section (Left on desktop) -->
                                    <div class="col-md-4 text-center">
                                        <img src="board_files/qr.png" alt="Profile"
                                            class="img-fluid rounded shadow-sm border mb-3"
                                            style="max-height: 260px; object-fit: cover; width: 100%;">

                                    </div>

                                    <!-- Information Section (Right on desktop) -->
                                    <div class="col-md-8">
                                        <div class="bg-light p-3 rounded shadow-sm">
                                            <div class="mb-2"><strong>Name:</strong> Ahmed Siasa</div>
                                            <div class="mb-2"><strong>Phone:</strong> 0613803662</div>
                                            <div class="mb-2"><strong>Expired Date:</strong> 10 July 2025</div>
                                            <div class="mb-2"><strong>Company:</strong> Heritage Insurance</div>
                                            <div class="mb-2"><strong>Vehicle:</strong> Motor - T123 ABC	</div>
                                            <div class="mb-2"><strong>Policy No:</strong> 1213224</div>
                                            <div class="mb-2"><strong>Region:</strong> Dar es Salaam</div>
                                            <div class="mb-2"><strong>Payment:</strong> Mobile</div>
                                            <div class="mb-2"><strong>Start Date:</strong> 09 June 2025</div>
                                            <div><strong>Created At:</strong> 2021-06-08 | 13:44:39</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
    </div>


            <!--modal end-->

            <!--begin::Global Javascript Bundle(mandatory for all pages)-->
            <script src="../assets/plugins/global/plugins.bundle.js"></script>
            <script src="../assets/js/scripts.bundle.js"></script>
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
            <script src="../assets/js/scripts.bundle.js"></script>
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


            <!-- Add before closing </body> -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

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
            <script>
                $(document).ready(function () {

                    // Form submission handlers
                    $('#editForm').on('submit', function (e) {
                        e.preventDefault();
                        $('#editModal').modal('hide');
                        showNotification('Product has been updated successfully', 'success');
                    });

                    $('#confirmDelete').on('click', function () {
                        $('#deleteModal').modal('hide');
                        showNotification('Product has been deleted successfully', 'danger');
                    });

                    $('#addBranchForm').on('submit', function (e) {
                        e.preventDefault();
                        $('#addBranchModal').modal('hide');
                        showNotification('Transaction has been added successfully', 'success');
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

        </div>
</body>

</html>