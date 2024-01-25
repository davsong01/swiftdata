<?php require("site_header.php"); ?>


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">My Account</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>
                            <li class="breadcrumb-item active">Default</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-xl-12">
                <div class="white_card card_height_100 mb_30 social_media_card">
                    <div class="white_card_header">
                        <div class="main-title">
                            <h3 class="m-0"></h3>
                            <span>Level : <?php echo $level; ?></span>
                        </div>
                    </div>

                    <div class="media_thumb ml_25">
                        <center>
                            <h3><?php echo $fullname; ?></h3>
                        </center>
                    </div>

                    <div class="media_card_body" style="width: 100%">
                        <div class="media_card_list">


                        </div>
                    </div>

                </div>
            </div>


            <div class="col-xl-12">
                <div class="white_card card_height_100 mb_30 sales_card_wrapper">
                    <div class="white_card_header d-flex justify-content-end">
                        <a href="change_password"><button class="export_btn">Change Password</button></a>
                    </div>


                    <div class="alert" style="background-color: #fff;">

                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <span class="" id="basic-addon1"><i class="fa fa-user" style="font-size: 25px;"></i></span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $fullname; ?>" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <span class="" id="basic-addon1"><i class="fa fa-phone" style="font-size: 25px;"></i></span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $mobile; ?>" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <span class="" id="basic-addon1"><i class="fa fa-envelope" style="font-size: 25px;"></i></span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $email; ?>" aria-describedby="basic-addon1">
                        </div>

                        <button class="btn btn-primary" style="width: 100%">UPDATE PROFILE</button>


                        <hr>

                        <input type="checkbox" name=""> I want to deactivate my account.
                        <br>
                        <button class="btn btn-danger">Deactivate</button>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>

<?php require("site_footer.php"); ?>