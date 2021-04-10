<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5"><?= $page_title?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="d-flex flex-row">
                <div class="flex-row-fluid ml-lg-12">
                    <div class="card card-custom">
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">Account Information</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account settings</span>
                            </div>
                            <div class="card-toolbar">
                                <button type="reset" onclick ="save()"class="btn btn-success mr-2">Save Changes</button>
                            </div>
                        </div>
                        <form class="form">
                            <input type="hidden" id="id" name="id" value="<?= $user["id"]?>">
                            <div class="card-body">
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
                                
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-at"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" id="email" value="<?= $user["email"]?>" placeholder="Email" readonly>
                                        </div>
                                    </div>
                                </div>
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
                                    <div class="separator separator-dashed my-5"></div>
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6">Premium:</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Restaurant</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <span class="mb-7"><?= $restaurant["name"]?></span><br>
                                            <span class="mb-7"><?= $restaurant["address"]?></span><br>
                                            <span class="mb-7"><?= $restaurant["contact_info"]?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Premium Level</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="checkbox-inline">
                                                <?php if($user["pay_type"] == 1){ ?>
                                                    <span class="label label-xl label-inline label-light-success">Monthly Premium</span>'
                                                <?php } else if($user["pay_type"] == 2 ){ ?>
                                                    <span class="label label-xl label-inline label-light-warning">Yearly Premium</span>
                                                <?php }else{ ?>
                                                    <span class="label label-xl label-inline label-light-danger">Non Premium</span>
                                                <?php } ?>
                                            </div>
                                            <p class="form-text text-muted py-2">To make limitless recipe, you can upgrade your premium type.
                                            <a href="#" class="font-weight-boldk">Learn more</a>.</p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function save(){
        var formData = {
            id:$("#id").val(),
            // email: $("#email").val(),
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
            if(data["success"] == true){
                toastr.success(data["msg"]);
            }else{
                toastr.error(data["msg"]);
            }
        });
       
    }
</script>