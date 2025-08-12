<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Settings Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #f0f2f5, #e4e9f0);
            font-family: 'Segoe UI', sans-serif;
        }

        .main-settings-card {
            background-color: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            margin-top: 40px;
        }

        .section-card {
            background-color: white;
            border-left: 4px solid red;
            border-radius: 12px;
            padding: 25px 30px;
            margin-bottom: 35px;
            transition: all 0.3s;
        }

        .section-card:hover {
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.05);
        }

        .section-header {
            display: flex;
            align-items: center;
            font-size: 1.2rem;
            font-weight: 600;
            color: red;
            margin-bottom: 20px;
        }

        .section-header i {
            font-size: 1.4rem;
            margin-right: 12px;
        }

        label {
            font-weight: 500;
            color: #333;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.95rem;
        }

        .btn {
            border-radius: 10px;
            padding: 8px 20px;
        }

        .btn-save {
            background-color: red;
            color: white;
            font-weight: 500;
        }

        .form-check-label {
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .section-card {
                padding: 20px;
            }
        }
    </style>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <!-- <title>New SMS Portal</title> -->
    <title>Quotation Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Bootstrap Market trusted by over 4,000 beginners and professionals. Multi-demo, Dark Mode, RTL support. Grab your copy now and get life-time updates for free.">
    <meta name="keywords"
        content="keen, bootstrap, bootstrap 5, bootstrap 4, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Keen - Multi-demo Bootstrap 5 HTML Admin Dashboard Template by KeenThemes">
    <meta property="og:url" content="https://keenthemes.com/keen">
    <meta property="og:site_name" content="Keen by Keenthemes">
    <link rel="canonical" href="https:/.SURETECH Systems.co.tz/online-courses.html">
    <link rel="shortcut icon" href="board_files/favicon-01.svg">
    <link rel="canonical" href="https:/.SURETECH Systems.co.tz/list.html">
    <link rel="shortcut icon" href="board_files/favicon--02-01.svg">
    <link href="/board_files/datatables.bundle.css" rel="stylesheet" type="text/css">
    <script src="/board_files/global/plugins.bundle.js"></script>
    <link href="/board_files/plugins.bundle.css" rel="stylesheet" />
    <link href="/board_files/style.bundle.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="/board_files/css7b91.css"> <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="/board_files/datatables.bundle.css" rel="stylesheet" type="text/css">
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->

    <link href="/board_files/style.bundle.css" rel="stylesheet" type="text/css">
    <!--end::Global Stylesheets Bundle-->
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="/board_files/css7b91.css"> <!--end::Fonts-->

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="/board_files/datatables.bundle.css" rel="stylesheet" type="text/css">
    <link href="/board_files/vis-timeline.bundle.css" rel="stylesheet" type="text/css">
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="/board_files/plugins.bundle.css" rel="stylesheet" type="text/css">
    <link href="/board_files/style.bundle.css" rel="stylesheet" type="text/css">
    <!--end::Global Stylesheets Bundle-->
    <link rel="stylesheet" href="./board_files/css7b91.css"> <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="/board_files/datatables.bundle.css" rel="stylesheet" type="text/css">
    <!--end::Vendor Stylesheets-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="./board_files/datatables.bundle.css" rel="stylesheet" type="text/css">
    <!--end::Vendor Stylesheets-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="./board_files/plugins.bundle.css" rel="stylesheet" type="text/css">
    <link href="./board_files/style.bundle.css" rel="stylesheet" type="text/css">
    <!--end::Global Stylesheets Bundle-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="./board_files/plugins.bundle.css" rel="stylesheet" type="text/css">
    <link href="./board_files/style.bundle.css" rel="stylesheet" type="text/css">
    <link href="./board_files/datatables.bundle.css" rel="stylesheet" type="text/css">
    <link href="./board_files/style.css" rel="stylesheet" type="text/css">
    <link href="board_files/product.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="board_files/product.css" rel="stylesheet" type="text/css">
    <link href="board_files/risknote.css" rel="stylesheet">
    <style>
        @media (min-width: 576px) {
            .modal-md-custom {
                max-width: 600px;
            }
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
                                        <i class="bi bi-gear fs-2 section-icon me-3"></i>
                                        System Settings
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

                <!-- COMPANY -->
                <div class="section-card">
                    <div class="section-header"><i class="bi bi-building text-danger bg-light rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px;"></i> Company Management</div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Company Name</label>
                            <input type="text" class="form-control" value="KMJ Insurance Brokers Ltd">
                        </div>
                        <div class="col-md-6">
                            <label>Registration Number</label>
                            <input type="text" class="form-control" value="REG-987654321">
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" value="info@kmjinsurance.co.tz">
                        </div>
                        <div class="col-md-6">
                            <label>Phone</label>
                            <input type="text" class="form-control" value="+255 712 345 678">
                        </div>
                        <div class="col-12">
                            <label>Address</label>
                            <input type="text" class="form-control" value="4th Floor, ABC Towers, Dar es Salaam">
                        </div>
                    </div>
                    <button class="btn btn-primary text-white mt-3">Save Company Info</button>
                </div>

                <!-- CURRENCY -->
                <div class="section-card">
                    <div class="section-header"><i class="bi bi-currency-exchange text-danger bg-light rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px;"></i> Currency Management</div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Default Currency</label>
                            <select class="form-select">
                                <option selected>TZS - Tanzanian Shilling</option>
                                <option>USD - US Dollar</option>
                                <option>EUR - Euro</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Exchange Rate (USD to TZS)</label>
                            <input type="number" class="form-control" value="2550">
                        </div>
                    </div>
                    <button class="btn btn-primary text-white mt-3">Update Currency</button>
                </div>

                <!-- PASSWORD -->
                <div class="section-card">
                    <div class="section-header"><i class="bi bi-shield-lock text-danger bg-light rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px;"></i> Change Password</div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label>Current Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>New Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary text-white mt-3">Change Password</button>
                </div>

                <!-- COMMISSION -->
                <div class="section-card">
                    <div class="section-header"><i class="bi bi-percent text-danger bg-light rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px;"></i> Commission Management</div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Default Commission (%)</label>
                            <input type="number" class="form-control" value="10">
                        </div>
                        <div class="col-md-6">
                            <label>Commission Type</label>
                            <select class="form-select">
                                <option selected>Flat Rate</option>
                                <option>Tiered</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary text-white mt-3">Save Commission Settings</button>
                </div>

                <!-- POLICY WORDING -->
                <div class="section-card">
                    <div class="section-header"><i class="bi bi-file-text text-danger bg-light rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px;"></i> Policy Wording Setup</div>
                    <label>Default Wording</label>
                    <textarea class="form-control"
                        rows="4">This policy covers the insured against all specified risks...</textarea>
                    <button class="btn btn-primary text-white mt-3">Save Wording</button>
                </div>

                <!-- COMMUNICATION -->
                <div class="section-card">
                    <div class="section-header"><i class="bi bi-chat-dots text-danger bg-light rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px;"></i> Communication Management</div>
                    <div class="mb-3">
                        <label>SMS API Endpoint</label>
                        <input type="text" class="form-control" value="https://sms.provider/api">
                    </div>
                    <div class="mb-3">
                        <label>Email Template</label>
                        <textarea class="form-control"
                            rows="4">Dear [Client], your policy [Policy No.] has been issued.</textarea>
                    </div>
                    <button class="btn btn-primary text-white">Save Communication</button>
                </div>

                <!-- ADDONS -->
                <div class="section-card">
                    <div class="section-header"><i class="bi bi-puzzle text-danger bg-light rounded-circle d-inline-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px;"></i> Addons</div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="smsAddon" checked>
                        <label class="form-check-label" for="smsAddon">Enable SMS Notifications</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="emailAddon" checked>
                        <label class="form-check-label" for="emailAddon">Enable Email Alerts</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="backupAddon">
                        <label class="form-check-label" for="backupAddon">Enable Daily Backup</label>
                    </div>
                    <button class="btn btn-primary text-white mt-2">Save Addons</button>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>