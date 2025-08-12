<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <!-- <title>New SMS Portal</title> -->
    <title>Customer</title>
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
                                        <i class="bi bi-person fs-2 section-icon me-3"></i>
                                        Customer
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
                                        <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal"
                                            data-bs-target="#addBranchModal">
                                            <i class="fas fa-plus text-white"></i> Add New Customer
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
                            <table class="table table align-items-center border-danger justify-content-start"
                                style=".border-light-danger {border-color: #f8d7da !important; } font-family: Geneva !important; ">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2 ">
                                        <th class=" min-w-100px text-center ">S/No</th>
                                        <th class=" min-w-100px text-center ">Name</th>
                                        <th class=" min-w-100px text-center ">Phone</th>
                                        <th class=" min-w-100px text-center ">Email</th>
                                        <th class=" min-w-100px text-center ">ID Type</th>
                                        <th class=" min-w-100px text-center ">ID Number</th>
                                        <th class=" min-w-100px text-center ">Gender</th>
                                        <th class=" min-w-100px text-center ">Birth</th>
                                        <th class=" min-w-100px text-center ">Type</th>
                                        <th class=" min-w-100px text-center ">Staff</th>
                                        <th class=" min-w-100px text-center me-4">Action</th>

                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody>

                                    <tr class="  border-bottom-2 ">
                                        <td class="text-gray-600  fs-6 text-center">01</td>
                                        <td class="text-gray-600  fs-6 text-center">Ahmed</td>
                                        <td class="text-gray-600  fs-6 text-center">+255712345678</td>
                                        <td class="text-gray-600  fs-6 text-center">Ahmed@humtech.co.tz</td>
                                        <td class="text-gray-600  fs-6 text-center">NIDA</td>
                                        <td class="text-gray-600  fs-6 text-center">1234567890123456</td>
                                        <td class="text-gray-600  fs-6 text-center">Male</td>
                                        <td class="text-gray-600  fs-6 text-center">1990-06-20</td>
                                        <td class="text-gray-600  fs-6 text-center">Company</td>
                                        <td class="fs-6 text-center">
                                            <span
                                                class="badge border border-success text-success d-inline-block text-center"
                                                style="width: 80px; color: green !important;">
                                                Active
                                            </span>
                                        </td>
                                        <td class="text-center gap-3">
                                            <!-- Icon that triggers modal -->
                                            <i class="bi bi-eye fs-4 me-2 cursor-pointer text-success"
                                                data-bs-toggle="modal" data-bs-target="#more"></i>
                                            <i class="bi bi-pencil-square fs-4 me-2 cursor-pointer"
                                                style="color: orange !important;" data-bs-toggle="modal"
                                                data-bs-target="#editModal"></i>
                                            <i class="bi bi-trash fs-4 text-danger ms-2 cursor-pointer"
                                                style="color: #dc3545 !important;" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"></i>
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

            <!-- EDIT MODAL -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="editModalLabel">Edit Customer Info</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form id="editForm">
                            <div class="modal-body row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" value="Ahmed">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="+255712345678">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="Ahmed@humtech.co.tz">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ID Type</label>
                                    <input type="text" class="form-control" value="NIDA">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ID Number</label>
                                    <input type="text" class="form-control" value="1234567890123456">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" value="1990-06-20">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select">
                                        <option selected>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Category</label>
                                    <input type="text" class="form-control" value="Company">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary text-white" data-bs-dismiss="modal">Save
                                    Changes</button>
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
                            Are you sure you want to delete <strong>Ahmed</strong>'s record? This action cannot be
                            undone.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary text-white" id="confirmDelete"
                                data-bs-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade " id="more" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md-custom">
                    <!-- Optional: modal-lg for larger width -->
                    <div class="modal-content">

                        <div class="card card-flush h-md-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="w-100 text-center mb-2 text-success">
                                    <h2><strong>Customer Details</strong></h2>
                                </div>
                            </div>
                            <div class="card-body pt-4">
                                <div class="row g-4 align-items-center">

                                    <!-- Image and Logo Section (Left on desktop) -->
                                    <div class="col-md-4 text-center">
                                        <img src="board_files/3d7d8d2bceb05603450e75812059aa79.jpg" alt="Profile"
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
                                            <div class="mb-2"><strong>Vehicle:</strong> Motor - T123 ABC </div>
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
            <div class="modal fade" id="addBranchModal" tabindex="-1" aria-labelledby="addBranchModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="addBranchModalLabel">Add New Customer</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form id="addBranchForm">
                            <div class="modal-body row g-3 px-4">
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="e.g. Dar HQ">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" placeholder="e.g. 0613803662">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" placeholder="e.g. ahmed@humtech.co.tz">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">ID Type</label>
                                    <select class="form-select">
                                        <option selected>NIDA</option>
                                        <option>VOTE</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">ID Number</label>
                                    <input type="text" class="form-control" placeholder="e.g. 89789749917342">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                    <input type="text" class="form-control" placeholder="e.g. Male">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Birth</label>
                                    <input type="text" class="form-control" placeholder="e.g. 	1990-06-20">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Type</label>
                                    <select class="form-select">
                                        <option selected>Company</option>
                                        <option>Individual</option>
                                    </select>

                                </div>



                                <div class="col-md-6">
                                    <label class="form-label">Birth</label>
                                    <input type="text" class="form-control" placeholder="e.g. 	1990-06-20">
                                </div>



                                <div class="modal-footer px-4">
                                    <button type="submit" class="btn btn-primary text-white">Add Branch</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>


            <!--end of delete modal-->
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
            </script>
            <script>
                $(document).ready(function () {

                    // Form submission handlers
                    $('#editForm').on('submit', function (e) {
                        e.preventDefault();
                        $('#editModal').modal('hide');
                        showNotification('Customer has been updated successfully', 'success');
                    });

                    $('#confirmDelete').on('click', function () {
                        $('#deleteModal').modal('hide');
                        showNotification('Customer has been deleted successfully', 'danger');
                    });

                    $('#addBranchForm').on('submit', function (e) {
                        e.preventDefault();
                        $('#addBranchModal').modal('hide');
                        showNotification('Customer has been added successfully', 'success');
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