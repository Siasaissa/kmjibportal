<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <!-- <title>New SMS Portal</title> -->
    <title>Products</title>
@include('Cat_heading.heading')
</head>

<body class="body">
    <div class="app-container container-xxl mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 col-12">
                <div class="risk-header text-white p-4 mb-5">
                    <div class="position-relative z-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap">
                            <div class="mb-4 mb-md-0">
                                <div class="d-flex align-items-center mb-3">
                                    <h1 class="h2 mb-0">
                                        <i class="bi bi-download fs-2 section-icon me-3"></i>
                                        Download
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
                                            <button class="btn btn-sm bg-danger text-white" onclick="startDownload()">
                                                <i class="bi bi-download text-white"></i> Download All
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

                        <!--end::Toolbar-->
                    </div>
                    <div class="card-body pt-6">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table align-items-center border-danger"
                                style=".border-light-danger {border-color: #f8d7da !important; } font-family: Geneva !important; ">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-5 fw-bold text-dark border-bottom-2 ">
                                        <th class=" min-w-100px text-center ">S/No</th>
                                        <th class=" min-w-100px text-center ">Name</th>
                                        <th class=" min-w-100px text-center ">Insurance</th>
                                        <th class=" min-w-100px text-center ">Expiry</th>
                                        <th class=" min-w-100px text-center ">Status</th>
                                        <th class=" min-w-100px text-center ">Download</th>

                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody>
                                    <tr class="border-bottom-2">
                                        <td class="text-gray-600 fs-6 text-center">01</td>
                                        <td class="text-gray-600 fs-6 text-center">Ahmed Siasa</td>
                                        <td class="text-gray-600 fs-6 text-center">Health Insurance</td>
                                        <td class="text-gray-600 fs-6 text-center">2025-07-14</td>
                                        <td class="fs-6 text-center">
                                            <span
                                                class="badge border border-warning text-primary d-inline-block text-center"
                                                style="width: 80px; color: orange !important;">
                                                Pending
                                            </span>
                                        </td>
                                        <td class="text-center d-flex justify-content-center gap-3">
                                            <i class="bi bi-download fs-4 cursor-pointer me-4 text-warning"onclick="startDownload()"></i>
                                                    
                                        </td>
                                    </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Download Progress Modal -->
            <div class="modal fade" id="downloadProgressModal" tabindex="-1" aria-labelledby="downloadProgressLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md-custom">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="downloadProgressLabel">Downloading Files</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Please wait while we prepare your download...</p>
                            <div class="progress">
                                <div id="downloadProgressBar"
                                    class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    0%
                                </div>
                            </div>
                        </div>
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
                function startDownload() {
                    const modal = new bootstrap.Modal(document.getElementById('downloadProgressModal'));
                    modal.show();

                    const progressBar = document.getElementById('downloadProgressBar');
                    let progress = 0;
                    progressBar.style.width = '0%';
                    progressBar.setAttribute('aria-valuenow', 0);
                    progressBar.textContent = '0%';

                    // Simulate progress
                    const interval = setInterval(() => {
                        progress += 10;
                        if (progress > 100) {
                            clearInterval(interval);
                            progressBar.classList.remove('progress-bar-animated');
                            progressBar.classList.add('bg-success');
                            progressBar.textContent = 'Download Complete';
                        } else {
                            progressBar.style.width = `${progress}%`;
                            progressBar.setAttribute('aria-valuenow', progress);
                            progressBar.textContent = `${progress}%`;
                        }
                    }, 500);
                }
            </script>


        </div>
</body>

</html>