<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <!-- <title>New SMS Portal</title> -->
    <title>Products</title>
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
                                        <i class="bi bi-arrow-clockwise fs-2 section-icon me-3"></i>
                                        Claims
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
                                            <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                                <i class="fas fa-plus text-white"></i> Add New Claim
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
                        <table class="table table align-items-center border-danger" style=".border-light-danger {border-color: #f8d7da !important; } font-family: Geneva !important; ">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fs-5 fw-bold text-dark border-bottom-2 ">
                                    <th class=" min-w-100px text-center ">S/No</th>
                                    <th class=" min-w-100px text-center ">Name</th>
                                    <th class=" min-w-100px text-center ">Policy No</th>
                                    <th class=" min-w-100px text-center ">Product</th>
                                    <th class=" min-w-100px text-center ">Company</th>
                                    <th class=" min-w-100px text-center ">Amount</th>
                                    <th class=" min-w-100px text-center ">Date</th>
                                    <th class=" min-w-100px text-center ">Status</th>
                                    <th class=" min-w-100px text-center ">Action</th>

                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
 
                                 <tr class="border-bottom-2">
                                    <td class="text-gray-600 fs-6 text-center">01</td>
                                    <td class="text-gray-600 fs-6 text-center">John Mwakalinga</td>
                                    <td class="text-gray-600 fs-6 text-center">POL/HEALTH/00001234</td>
                                    <td class="text-gray-600 fs-6 text-center">Health Insurance</td>
                                    <td class="text-gray-600 fs-6 text-center">Jubilee Insurance</td>
                                    <td class="text-gray-600 fs-6 text-center">1,200,000</td>
                                    <td class="text-gray-600 fs-6 text-center">2025-07-01</td>
                                    <td class="fs-6 text-center">
                                        <span class="badge border border-warning text-warning d-inline-block text-center" style="width: 80px; color: orange !important;">
                                            Active
                                        </span>
                                    </td>
                                    <td class="text-center gap-3">
                                        <i class="bi bi-pencil-square fs-4 me-4 cursor-pointer text-warning" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                        <i class="bi bi-trash fs-4 text-danger ms-4 cursor-pointer " data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
                                    </td>
                                    </tr>

                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    </div>
                </div>

            </div>

            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="editModalLabel">Edit Claim Details</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form id="editForm">
                            <div class="modal-body row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="John Mwakalinga">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Policy NO</label>
                                    <input type="text" class="form-control" value="POL/HEALTH/00001234">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Product</label>
                                    <input type="text" class="form-control" placeholder="Health Insurance">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control" placeholder="Jubilee Insurance">
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
            <!--delete modal-->
            <!-- DELETE MODAL -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete <strong>John Mwakalinga</strong>'s claims? This action
                            cannot be
                            undone.
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary text-white" id="confirmDelete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="addBranchModalLabel" data-bs-toggle="modal" data-bs-target="">Add New Claims</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form id="addBranchForm">
                            <div class="modal-body row g-3 px-4">
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="e.g. John Mwakalinga">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Policy No</label>
                                    <input type="text" class="form-control" placeholder="e.g. POL/HEALTH/00001234">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control" placeholder="e.g. Jubilee">

                                <div class="col-md-6">
                                    <label class="form-label">Product</label>
                                    <input type="text" class="form-control" placeholder="e.g. Health Insurance">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Amount</label>
                                    <input type="number" class="form-control" placeholder="e.g. 1,200,000">
                                </div>

                            </div>

                            <div class="modal-footer px-4">
                                <button type="submit" class="btn btn-primary text-white" data-bs-dismiss="modal">Add
                                    Claims</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--modal start-->

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
            </script>
            <script>
                $(document).ready(function () {

                    // Form submission handlers
                    $('#editForm').on('submit', function (e) {
                        e.preventDefault();
                        $('#editModal').modal('hide');
                        showNotification('Claims has been updated successfully', 'success');
                    });

                    $('#confirmDelete').on('click', function () {
                        $('#deleteModal').modal('hide');
                        showNotification('Claims has been deleted successfully', 'danger');
                    });

                    $('#addBranchForm').on('submit', function (e) {
                        e.preventDefault();
                        $('#addBranchModal').modal('hide');
                        showNotification('Claims has been added successfully', 'success');
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