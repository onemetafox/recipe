<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5"><?=$page_title?></h5>
                </div>
            </div>
            <div class="d-flex align-items-center">
            <a class="btn btn-light-primary font-weight-bolder btn-sm" id="new_btn">Add New User</a>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-xl-3">
                                <div class="row align-items-center">
                                    <div class="col-md-12 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Payment:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="0">None Payment</option>
                                        <option value="1">Monthly Payment</option>
                                        <option value="2">Yearly Payment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Restaurant:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">All</option>
                                        <?php foreach($restaurants as $restaurant) { ?>
                                            <option value="<?= $restaurant->id?>"><?= $restaurant->name?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3 mt-5 mt-lg-0">
                                <button id="search_btn" class="btn btn-light-primary px-6 font-weight-bold">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="datatable datatable-bordered datatable-head-custom" id="users"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--begin::Modal-->
<div class="modal fade" id="kt_select2_modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="ki ki-close"></i>
        </button>
      </div>
      <form class="form" id ="form">
        <div class="modal-body">
          <div class="form-group row">
            <input type="hidden" id="id" name="id">
            <label class="col-form-label text-right col-lg-3 col-sm-12">User Name</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input class="form-control form-control-solid form-control-lg" name="name" id="name" type="text" value="" required>
                <div class="fv-plugins-message-container"></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Email</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
              <input type="email" class="form-control form-control-solid form-control-lg" name="email" id="email" value="" required>
              <div class="fv-plugins-message-container"></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Restaurant</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <select class="form-control" id="restaurant">
                <?php foreach($restaurants as $restaurant) { ?>
                    <option value="<?= $restaurant->id?>"><?= $restaurant->name?></option>
                <?php } ?>
            </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary px-15 mr-2" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary px-15">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end::Modal-->
<script src="<?= asset_url()?>scripts/user.js"></script>
<script>
    var HOST_URL = '<?= base_url()?>';
</script>