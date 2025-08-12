<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Branches</title>
@include('Cat_heading.heading')
</head>

<body class="body">
    <div id="toast-container"></div>
    <div class="app-container container-xxl mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 col-12">
                <!--begin header-->
                <div class="risk-header text-white p-4 mb-5">
                    <div class="position-relative z-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap">
                            <div class="mb-4 mb-md-0">
                                <div class="d-flex align-items-center mb-3">
                                    <h1 class="h2 mb-0">
                                        <i class="bi bi-fullscreen-exit fs-2 section-icon me-3"></i>
                                        Branches
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
                                            <button class="btn btn-sm bg-danger text-white"  data-bs-toggle="modal" data-bs-target="#addBranchModal">
                                                <i class="fas fa-plus text-white"></i> Add New Branch
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of header-->
                <!--begin::Table widget 14-->
                <div class="card card-flush">
                    <!--begin::Header-->
                    <div class="card-header pt-2">
                         <div id="toast-container"></div>
                    </div>

                    <div class="card-body pt-6">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table align-items-center border-danger">
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2">
                                        <th class="min-w-100px text-center">SNo</th>
                                        <th class="min-w-100px text-center">Branch</th>
                                        <th class="min-w-100px text-center">Region</th>
                                        <th class="min-w-100px text-center">Phone</th>
                                        <th class="min-w-100px text-center">Manager</th>
                                        <th class="min-w-100px text-center">Status</th>
                                        <th class="min-w-100px text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="fs-4 border-bottom-2 justify-content-center">
                                        <td class="text-gray-600 fs-6 text-center">01</td>
                                        <td class="text-gray-600 fs-6 text-center">Dar HQ</td>
                                        <td class="text-gray-600 fs-6 text-center">Dar</td>
                                        <td class="text-gray-600 fs-6 text-center">0613803662</td>
                                        <td class="text-gray-600 fs-6 text-center">Ahmed</td>
                                        <td class="fs-6 text-center">
                                            <span
                                                class="badge border border-success text-success d-inline-block text-center"
                                                style="width: 80px;">
                                                Active
                                            </span>
                                        </td>
                                        <td class="text-center gap-3">
                                            <i class="bi bi-pencil-square fs-5 me-4 cursor-pointer text-warning" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                            <i class="bi bi-trash fs-5 text-danger ms-4 cursor-pointer" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                style="color: #dc3545 !important;"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                </div>
                <!--end::Table widget 14-->
            </div>
        </div>
    </div>
    <!--modal start-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="editModalLabel">Edit User Info</h5>
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
                                <button type="submit" class="btn btn-primary text-white" >Save Changes</button>
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
                            Are you sure you want to delete <strong>DarHq</strong>'s record? This action cannot be
                            undone.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary text-white" id="confirmDelete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

    <!--modal end-->
<!--add modal-->
<!-- ADD BRANCH MODAL -->
<div class="modal fade" id="addBranchModal" tabindex="-1" aria-labelledby="addBranchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="addBranchModalLabel">Add New Branch</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form id="addBranchForm">
        <div class="modal-body row g-3 px-4">
          <div class="col-md-6">
            <label class="form-label">Branch Name</label>
            <input type="text" class="form-control" placeholder="e.g. Dar HQ">
          </div>
          
          <div class="col-md-6">
            <label class="form-label">Region</label>
            <input type="text" class="form-control" placeholder="e.g. Dar es Salaam">
          </div>
          
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" placeholder="e.g. 0613803662">
          </div>
          
          <div class="col-md-6">
            <label class="form-label">Manager</label>
            <input type="text" class="form-control" placeholder="e.g. Ahmed">
          </div>
          
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select class="form-select">
              <option selected>Active</option>
              <option>Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer px-4">
          <button type="submit" class="btn btn-primary text-white">Add Branch</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--end add modal-->
    <!-- DataTable Scripts (place before closing body tag) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.table').DataTable({
                "pageLength": 3
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            // Form submission handlers
            $('#editForm').on('submit', function(e) {
                e.preventDefault();
                $('#editModal').modal('hide');
                showNotification('Branch has been updated successfully', 'success');
            });

            $('#confirmDelete').on('click', function() {
                $('#deleteModal').modal('hide');
                showNotification('Branch has been deleted successfully', 'danger');
            });

            $('#addBranchForm').on('submit', function(e) {
                e.preventDefault();
                $('#addBranchModal').modal('hide');
                showNotification('New branch has been added successfully', 'success');
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
</body>

</html>