<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <!-- <title>New SMS Portal</title> -->
    <title>Cancellation Page</title>
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
                                        <i class="bi bi-x-square fs-2 section-icon me-3"></i>
                                        Cancellation
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
                            <table class="table table-bodered align-items-center border-danger justify-content-start"
                                style=".border-light-danger {border-color: #f8d7da !important; } font-family: Geneva !important; ">
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

                                    <tr class=" fs-6  text-center min-w-900px">
                                        <td>01</td>
                                        <td>Main Branch</td>
                                        <td>14-Jul-2025</td>
                                        <td>Ahmed Siasa Issa</td>
                                        <td>27-jul-2025 | 26-jul-2026</td>
                                        <td>Strategic Insurance (T) Limited</td>
                                        <td>431,585.00</td>
                                        <td>431,585.00</td>

                                        <td class="fs-6 text-center">
                                            <span
                                                class="badge border border-danger text-danger d-inline-block text-center"
                                                style="width: auto; color: red !important;">
                                                Risk Note Cancelled
                                            </span>
                                        </td>
                                        <td class="text-center gap-3 d-inline-block">
                                            <a href="textDownload.html"> <i
                                                    class="bi bi-printer fs-6 me-2 cursor-pointer text-success"></i></a>
                                        </td>
                                    </tr>
                                    <tr class=" fs-6  text-center">
                                        <td>02</td>
                                        <td>Main Branch</td>
                                        <td>14-Jul-2025</td>
                                        <td>Ahmed Siasa Issa</td>
                                        <td>27-jul-2025 | 26-jul-2026</td>
                                        <td>Strategic Insurance (T) Limited</td>
                                        <td>431,585.00</td>
                                        <td>431,585.00</td>

                                        <td class="fs-6 text-center">
                                            <span
                                                class="badge border border-danger text-danger d-inline-block text-center"
                                                style="width: auto; color: red !important;">
                                                Risk Note Cancelled
                                            </span>
                                        </td>
                                        <td class="text-center gap-3 d-inline-block">
                                            <!-- Icon that triggers modal -->
                                            <a href="textDownload.html"> <i
                                                    class="bi bi-printer fs-6 me-2 cursor-pointer text-success"></i></a>

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

            <!--begin::Global Javascript Bundle(mandatory for all pages)-->
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
                    $('.table').DataTable({
                        "pageLength": 3 // Show only 5 rows per page
                    });
                });
            </script>

        </div>
</body>

</html>