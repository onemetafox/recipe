<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5"><?= $page_title?></h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile Account Information-->
            <div class="d-flex flex-row">
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <!--begin::Header-->
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">Account Information</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account settings</span>
                            </div>
                            <div class="card-toolbar">
                                <button type="reset" onclick ="save()"class="btn btn-success mr-2">Save Changes</button>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form class="form">
                            <div class="card-body">
                                <!--begin::Heading-->
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mb-6">Account:</h5>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" id="name" value="<?=$user["name"]?>" placeholder="User Name">
                                        </div>
                                    </div>
                                </div>
                                
                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-at"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" id="email" value="<?= $user["email"]?>" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Old Password</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-lock"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control form-control-lg form-control-solid" id="old_pwd" value="" placeholder="Old Password">
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-lock"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control form-control-lg form-control-solid" id="new_pwd" value="" placeholder="New Password">
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-lock"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" value="" id="cfm_pwd" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                                <?php if($user["role"] != 1) {?>
                                    <!--begin::Form Group-->
                                    <div class="separator separator-dashed my-5"></div>
                                    <!--begin::Form Group-->
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6">Premium:</h5>
                                        </div>
                                    </div>
                                    <!--begin::Form Group-->
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Restaurant</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <span class="mb-7"><?= $restaurant["name"]?></span><br>
                                            <span class="mb-7"><?= $restaurant["address"]?></span><br>
                                            <span class="mb-7"><?= $restaurant["contact_info"]?></span>
                                            <!-- <p class="form-text text-muted pt-2">address</p> -->
                                        </div>
                                    </div>
                                    <!--begin::Form Group-->
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Premium Level</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="checkbox-inline">
                                                <span></span><?= $user["pay_type"]?></label>
                                            </div>
                                            <p class="form-text text-muted py-2">To make limitless recipe, you can upgrade your premium type.
                                            <a href="#" class="font-weight-boldk">Learn more</a>.</p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Profile Account Information-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<script>
    function save(){
        var formData = {
            email: $("#Email").val(),
            name: $("#name").val(),
            old_pwd: $("#old_pwd").val(),
            new_pwd: $("#new_pwd").val(),
            cfm_pwd: $("#cfm_pwd").val()
        };

        $.ajax({
            type: "POST",
            url: "<?=base_url()?>/users/update",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            

          
            
        });
       
    }
</script>