<?php require ("session_controller.php"); ?>
<!DOCTYPE html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?php echo $sitename; ?> - <?php echo $fullname; ?></title>
    <link rel="icon" type="image/png" href="../access/images/favicon.png">

    <link rel="stylesheet" href="backend/css/bootstrap1.min.css" />

    <link rel="stylesheet" href="backend/vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="backend/vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="backend/vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="backend/vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="backend/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="backend/vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="backend/vendors/datepicker/date-picker.css" />
    <link rel="stylesheet" href="backend/vendors/vectormap-home/vectormap-2.0.2.css" />

    <link rel="stylesheet" href="backend/vendors/scroll/scrollable.css" />

    <link rel="stylesheet" href="backend/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="backend/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="backend/vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="backend/vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="backend/vendors/morris/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="backend/vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="backend/css/metisMenu.css">

    <link rel="stylesheet" href="backend/css/style1.css" />
    <link rel="stylesheet" href="backend/css/colors/default.css" id="colorSkinCSS">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-loading-overlay@1.1.0/dist/js-loading-overlay.min.js"></script>
    <script type="text/javascript" src="backend/js/overlay.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .ENABLED{
            font-weight: bolder !important;
            font-size: small;
            color: blue;
        }

        .DISABLED{
            font-weight: bolder !important;
            font-size: small;
            color: red;
        }
    </style>
</head>

<body class="crm_body_bg">


    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <h5 class="large_logo"><?php echo strtoupper($sitename); ?></h5>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li>
                <a href="<?php echo $adminurl; ?>/dashboard" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-home"></i>
                    </div>
                    <div class="nav_title">
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <h4 class="menu-text"><span>CUSTOM</span> <i class="fas fa-ellipsis-h"></i> </h4>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-gear"></i>
                    </div>
                    <div class="nav_title">
                        <span>Web Settings</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/contact_settings">Contact Info.</a></li>
                    <li><a href="<?php echo $adminurl; ?>/site_keys">My Site APIKeys</a></li>
                    <li><a href="<?php echo $adminurl; ?>/blacklist_mobile">Blacklist Number</a></li>
                    <li><a href="<?php echo $adminurl; ?>/order_mobiles">Order Number(s)</li>
                    <li><a href="<?php echo $adminurl; ?>/guest_price">Guest Price</a></li>
                </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-shopping-cart"></i>
                    </div>
                    <div class="nav_title">
                        <span>Transactions</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/all_transactions">All Transactions</a></li>
                    <li><a href="<?php echo $adminurl; ?>/true_transactions">Success Transactions</a></li>
                    <li><a href="<?php echo $adminurl; ?>/fail_transactions">Failed Transactions</a></li>
                    <li><a href="<?php echo $adminurl; ?>/query_transactions">Query Transactions</a></li>
                    <li><a href="<?php echo $adminurl; ?>/query_funding">Query Funding</a></li>
                    <li><a href="<?php echo $adminurl; ?>/wallet_summary">Wallet Summary</a></li>
                    <li><a href="<?php echo $adminurl; ?>/sales_analysis">Sales Analysis</a></li>
                    <li><a href="<?php echo $adminurl; ?>/query_staff">Query Staffs</a></li>
                </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-credit-card"></i>
                    </div>
                    <div class="nav_title">
                        <span>Financial Sect.</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/deposit_money">Deposit Funds</a></li>
                    <li><a href="<?php echo $adminurl; ?>/remove_money">Remove Funds</a></li>
                </ul>
            </li>


            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="nav_title">
                        <span>Manage Users</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/upgrade_users">Upgrade users</a></li>
                    <li><a href="<?php echo $adminurl; ?>/all_active_users">All active users</a></li>
                    <li><a href="<?php echo $adminurl; ?>/all_pend_users">All pending users</a></li>
                    <li><a href="<?php echo $adminurl; ?>/all_block_users">All suspend users</a></li>
                    <li><a href="<?php echo $adminurl; ?>/query_users.php">Find accounts</a></li>
                    <li><a href="<?php echo $adminurl; ?>/all_mobiles">All Users Mobile</a></li>
                    <li><a href="<?php echo $adminurl; ?>/all_emails">All Users Email</a></li>
                    <li><a href="<?php echo $adminurl; ?>/resetpassword_users">Reset Password</a></li>
                    <li><a href="<?php echo $adminurl; ?>/resetpin_users">Reset T-PIN</a></li>
                </ul>
            </li>


            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="nav_title">
                        <span>Manage Staffs</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/createStaff">Create / Edit Info</a></li>
                </ul>
            </li>


            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-shopping-bag"></i>
                    </div>
                    <div class="nav_title">
                        <span>Hot API Deals</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/createAPI">Create/Edit APIUser</a></li>
                </ul>
            </li>


            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-gear"></i>
                    </div>
                    <div class="nav_title">
                        <span>Store Control</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/system_lock">click to edit</a>
                </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-plug"></i>
                    </div>
                    <div class="nav_title">
                        <span>Set Automation</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/system_switch">click to edit</a>
                </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-sort-amount-desc"></i>
                    </div>
                    <div class="nav_title">
                        <span>Price Settings</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/dataPrice">All-Data Prices</a></li>
                    <li><a href="<?php echo $adminurl; ?>/vtuPrice">AirtimeVtu Discount</a></li>
                    <li><a href="<?php echo $adminurl; ?>/snsPrice">AirtimeSns Discount</a></li>
                    <li><a href="<?php echo $adminurl; ?>/exvtuPrice">Airtime Exchange</a></li>
                    <li><a href="<?php echo $adminurl; ?>/cablePrice">CableTv Prices</a></li>
                    <li><a href="<?php echo $adminurl; ?>/billsPrice">Utility-Bills</a></li>
                    <li><a href="<?php echo $adminurl; ?>/epinsPrice">Exam-Epins Prices</a></li>
                    <li><a href="<?php echo $adminurl; ?>/smsPrice">BulkSMS Prices</a></li>
                </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-smile"></i>
                    </div>
                    <div class="nav_title">
                        <span>Miscellaneous</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/withdraw_charge">Withdraw Charges</a></li>
                    <li><a href="<?php echo $adminurl; ?>/account_charge">User Level Charges</a></li>
                </ul>
            </li>


            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-bank"></i>
                    </div>
                    <div class="nav_title">
                        <span>Set Bank Info.</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/bank_list">Bank List Details</a></li>
                    <li><a href="<?php echo $adminurl; ?>/add_bank">Add New Bank</a></li>
                </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <div class="nav_title">
                        <span>Notification</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/popupMessage">PopUp Message</a></li>
                    <li><a href="<?php echo $adminurl; ?>/scrollMessage">Scroll Message</a></li>
                    <li><a href="<?php echo $adminurl; ?>/blockMessage1">Opt. Message1</a></li>
                    <li><a href="<?php echo $adminurl; ?>/blockMessage2">Opt. Message2</a></li>
                    <li><a href="<?php echo $adminurl; ?>/blockMessage3">Opt. Message3</a></li>
                </ul>
            </li>


            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div class="nav_title">
                        <span>Feedback Reports</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/liveChat">Check Live Chats</a></li>
                    <li><a href="<?php echo $adminurl; ?>/rateComments">Rating comments</a></li>
                    <li><a href="<?php echo $adminurl; ?>/webComments">Complaints/helps</a></li>
                </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="nav_title">
                        <span>Profile Settings</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo $adminurl; ?>/change_password">Change Password</a></li>
                </ul>
            </li>

            <li>
                <a href="<?php echo $adminurl; ?>/logout" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa-solid fa-power-off"></i>
                    </div>
                    <div class="nav_title">
                        <span>Logout </span>
                    </div>
                </a>
            </li>


        </ul>
    </nav>

    <section class="main_content dashboard_part large_header_bg">

        <div class="container-fluid g-0" style="background-color: #fff;">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none" style="cursor: pointer;">
                            <i class="ti-menu"></i>
                        </div>
                        <label class="form-label switch_toggle d-none d-lg-block" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="slider round open_miniSide"></div>
                        </label>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                <li>

                            </div>
                            <div class="profile_info">
                                <img src="backend/img/customer-image.png" alt="#">
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <p>Welcome </p>
                                        <h5><?php echo $fullname; ?></h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="<?php echo $adminurl; ?>/logout">Log Out </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="successModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <br />
                    <br />

                    <center><img src="backend/img/success2.png" height="100"></center>
                    <div class="modal-body" style="text-align: center;">

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" onclick="closeSuccessModal()">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <div id="errorModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <br />
                    <br />

                    <center><img src="backend/img/error.png" height="100"></center>
                    <div class="modal-body" style="text-align: center;">

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" onclick="closeErrorModal()">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <div id="priceModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <br />
                    <br />

                    <div class="modal-body" style="text-align: left;">

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" onclick="closePriceModal()">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <div id="rateRes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="h6 modal-title">Rate Response ! <i class="fa fa-smile" style="color: red;"></i></h2>
                        <button class="btn-close" aria-label="Close" onclick="closeRateX()"></button>
                    </div>
                    <div class="modal-body"></div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" onclick="closeRateX()">Close</button>
                    </div>

                </div>
            </div>
        </div>


        <script>
            function Closepopup() {
                $("#myModal3").modal("hide");
            }

            function PopUp() {
                $("#myModal3").modal("show");
            }

            function openRate() {
                $("#rateModal").modal("show");
            }

            function closeSuccessModal() {
                $("#successModal").modal("hide");
            }

            function closeRateX() {
                $("#rateRes").modal("hide");
            }

            function closePriceModal() {
                $("#priceModal").modal("hide");
            }

            function closeErrorModal() {
                $("#errorModal").modal("hide");
            }
        </script>