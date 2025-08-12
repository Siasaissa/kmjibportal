<!DOCTYPE html>
<html lang="en">

<head>
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
                                        <i class="bi bi-repeat fs-2 section-icon me-3"></i>
                                        Renewals
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
                                    <!-- Toast Container -->

                                    <a href="{{url ('/dash/index')}}">
                                        <button class="btn btn-sm btn-outline-light rounded-pill px-3">
                                            <i class="bi bi-house me-1"></i> Dashboard
                                        </button>
                                    </a>
                                    <div class="card-toolbar ms-4 d-flex align-items-center gap-1">
                                            <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal" data-bs-target="#addpolicyModal">
                                                <i class="fas fa-plus text-white"></i> Add New Policy
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
                        
                        <!--end::Toolbar-->
                    </div>
                    <div class="card-body pt-6">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table align-items-center border-danger"
                                style=".border-light-danger {border-color: #f8d7da !important; } font-family: Poppins !important; ">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2 ">
                                        <th class=" min-w-100px text-center ">S/No</th>
                                        <th class=" min-w-100px text-center ">Client</th>
                                        <th class=" min-w-100px text-center ">Quote</th>
                                        <th class=" min-w-100px text-center ">Type</th>
                                        <th class=" min-w-100px text-center ">Insurer</th>
                                        <th class=" min-w-100px text-center ">Expiry</th>
                                        <th class=" min-w-100px text-center ">Premium</th>
                                        <th class=" min-w-100px text-center ">Status</th>
                                        <th class=" min-w-100px text-center ">Actions</th>

                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody>

                                    <tr class=" border-bottom-2">
                                        <td class="text-gray-600 fs-6 text-center">01</td>
                                        <td class="text-gray-600 fs-6 text-center">Ahmed Siasa</td>
                                        <td class="text-gray-600 fs-6 text-center">11234</td>
                                        <td class="text-gray-600 fs-6 text-center">Motor</td>
                                        <td class="text-gray-600 fs-6 text-center">Heritage Insurance</td>
                                        <td class="text-gray-600 fs-6 text-center">2025-08-10</td>
                                        <td class="text-gray-600 fs-6 text-center">10,000.00</td>
                                        <td class="text-warning fs-6 text-center">
                                            <span
                                                class="badge border border-warning text-warning d-inline-block text-center"
                                                style="width: 80px; color: orange !important;">
                                                Due
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm text-success"
                                                onclick="showNotification('Your insurance has been renewed')">
                                                <i class="bi bi-arrow-repeat fs-4"></i>
                                            </button>
                                            <!--<button class="btn btn-sm text-primary" onclick="openViewModal('Ahmed Siasa')">
                                        <i class="bi bi-eye fs-4"></i>
                                    </button>
                                    <button class="btn btn-sm text-warning" onclick="alert('Reminder sent to Ahmed Siasa')">
                                        <i class="bi bi-bell fs-4"></i>
                                    </button>-->
                                        </td>
                                    </tr>

                                    <tr class=" border-bottom-2">
                                        <td class="text-gray-600 fs-6 text-center">02</td>
                                        <td class="text-gray-600 fs-6 text-center">Zainab Mussa</td>
                                        <td class="text-gray-600 fs-6 text-center">115678</td>
                                        <td class="text-gray-600 fs-6 text-center">Health</td>
                                        <td class="text-gray-600 fs-6 text-center">Jubilee Insurance</td>
                                        <td class="text-gray-600 fs-6 text-center">2025-07-25</td>
                                        <td class="text-gray-600 fs-6 text-center">45,000.00</td>
                                        <td class="text-warning fs-6 text-center">
                                            <span
                                                class="badge border border-danger text-danger d-inline-block text-center"
                                                style="width: 80px; color: red !important;">
                                                Over Due
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm text-success"
                                                onclick="showNotification('Your insurance has been renewed')">
                                                <i class="bi bi-arrow-repeat fs-4"></i>
                                            </button>
                                            <!--<button class="btn btn-sm text-primary" onclick="openViewModal('Zainab Mussa')">
                                        <i class="bi bi-eye fs-4"></i>
                                    </button>
                                    <button class="btn btn-sm text-warning" onclick="alert('Reminder sent to Zainab Mussa')">
                                        <i class="bi bi-bell fs-4"></i>
                                    </button>-->
                                        </td>
                                    </tr>

                                    <tr class=" border-bottom-2">
                                        <td class="text-gray-600 fs-6 text-center">03</td>
                                        <td class="text-gray-600 fs-6 text-center">Peter Mwakyusa</td>
                                        <td class="text-gray-600 fs-6 text-center">119101</td>
                                        <td class="text-gray-600 fs-6 text-center">Fire</td>
                                        <td class="text-gray-600 fs-6 text-center">Alliance Insurance</td>
                                        <td class="text-gray-600 fs-6 text-center">2025-09-01</td>
                                        <td class="text-gray-600 fs-6 text-center">120,000.00</td>
                                        <td class="text-warning fs-6 text-center">
                                            <span
                                                class="badge border border-success text-success d-inline-block text-center"
                                                style="width: 80px; color: green !important;">
                                                Active
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm text-success"
                                                onclick="showNotification('Your insurance has been renewed')">
                                                <i class="bi bi-arrow-repeat fs-4"></i>
                                            </button>
                                            <!--<button class="btn btn-sm text-primary" onclick="openViewModal('Peter Mwakyusa')">
                                        <i class="bi bi-eye fs-4"></i>
                                    </button>
                                    <button class="btn btn-sm text-warning" onclick="alert('Reminder sent to Peter Mwakyusa')">
                                        <i class="bi bi-bell fs-4"></i>
                                    </button>-->
                                        </td>
                                    </tr>

                                    <tr class="border-bottom-2">
                                        <td class="text-gray-600 fs-6 text-center">04</td>
                                        <td class="text-gray-600 fs-6 text-center">Asha Juma</td>
                                        <td class="text-gray-600 fs-6 text-center">221122</td>
                                        <td class="text-gray-600 fs-6 text-center">Travel</td>
                                        <td class="text-gray-600 fs-6 text-center">Britam Insurance</td>
                                        <td class="text-gray-600 fs-6 text-center">2025-07-19</td>
                                        <td class="text-gray-600 fs-6 text-center">20,000.00</td>
                                        <td class="text-warning fs-6 text-center">
                                            <span
                                                class="badge border border-success text-success d-inline-block text-center"
                                                style="width: 80px; color: green !important;">
                                                Active
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm text-success"
                                                onclick="showNotification('Your insurance has been renewed')">
                                                <i class="bi bi-arrow-repeat fs-4"></i>
                                            </button>
                                            <!--<button class="btn btn-sm text-primary" onclick="openViewModal('Asha Juma')">
                                        <i class="bi bi-eye fs-4"></i>
                                    </button>
                                    <button class="btn btn-sm text-warning" onclick="alert('Reminder sent to Asha Juma')">
                                        <i class="bi bi-bell fs-4"></i>
                                    </button>-->
                                        </td>
                                    </tr>


                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                </div>

            </div>

                      <div class="modal fade" id="addpolicyModal" tabindex="-1" aria-labelledby="addpolicyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="addBranchModalLabel">Add New Policy</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form id="addBranchForm">
  <div class="modal-body row g-3 px-4">
    
    <div class="col-md-6">
      <label class="form-label">Policy Number</label>
      <input type="text" class="form-control" placeholder="e.g. POL-00123">
    </div>

    <div class="col-md-6">
      <label class="form-label">Client Name</label>
      <input type="text" class="form-control" placeholder="e.g. Ahmed Siasa">
    </div>

    <div class="col-md-6">
      <label class="form-label">Policy Type</label>
      <select class="form-select">
        <option value="">Select Type</option>
        <option>Motor Insurance</option>
        <option>Health Insurance</option>
        <option>Marine Cargo</option>
        <option>Fire & Burglary</option>
      </select>
    </div>

    <div class="col-md-6">
      <label class="form-label">Sum Insured</label>
      <input type="number" class="form-control" placeholder="e.g. 10,000,000">
    </div>

    <div class="col-md-6">
      <label class="form-label">Start Date</label>
      <input type="date" class="form-control" >
    </div>

    <div class="col-md-6">
      <label class="form-label">Expiry Date</label>
      <input type="date" class="form-control">
    </div>

    <div class="col-md-6">
      <label class="form-label">Agent Code</label>
      <input type="text" class="form-control" placeholder="e.g. AGT-7890">
    </div>

    <div class="col-md-6">
      <label class="form-label">Policy Status</label>
      <select class="form-select">
        <option selected>Active</option>
        <option>Due</option>
        <option>Over Due</option>
      </select>
    </div>

  </div>

  <div class="modal-footer px-4">
    <button type="submit" class="btn btn-primary text-white" data-bs-dismiss="modal">Add Policy</button>
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
                function showNotification(message) {
                    // Create toast container if it doesn't exist
                    let toastContainer = document.getElementById('toast-container');
                    if (!toastContainer) {
                        toastContainer = document.createElement('div');
                        toastContainer.id = 'toast-container';
                        toastContainer.style.position = 'fixed';
                        toastContainer.style.top = '1rem';
                        toastContainer.style.right = '1rem';
                        toastContainer.style.zIndex = '1060';
                        document.body.prepend(toastContainer);
                    }

                    const toast = document.createElement('div');
                    toast.className = 'toast show align-items-center custom-toast bg-light border-0';
                    toast.setAttribute('role', 'alert');
                    toast.setAttribute('aria-live', 'assertive');
                    toast.setAttribute('aria-atomic', 'true');

                    toast.innerHTML = `
                    <div class="d-flex align-items-center px-3 py-2">
                        <i class="bi bi-bell-fill toast-icon"></i>
                        <div class="toast-body">${message}</div>
                        <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    `;

                    toastContainer.appendChild(toast);

                    // Initialize Bootstrap Toast
                    const bsToast = new bootstrap.Toast(toast, {
                        autohide: true,
                        delay: 1500
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
                $('#addBranchForm').on('submit', function (e) {
                        e.preventDefault();
                        $('#addBranchModal').modal('hide');
                        showNotification('Policy has been added successfully', 'success');
                        // Reset form after submission
                        this.reset();
                    });
            </script>

        </div>
</body>

</html>