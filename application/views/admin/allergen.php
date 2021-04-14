<script src="<?= asset_url()?>js/pages/crud/forms/widgets/autosize.js"></script>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5"><?=$page_title?></h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <a class="btn btn-light-primary font-weight-bolder btn-sm" id="new_btn">Add New Allergen</a>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-xl-4">
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
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <button id="search_btn" class="btn btn-light-primary px-6 font-weight-bold">Search</button>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="allergen"></div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--begin::Modal-->
<div class="modal fade" id="kt_select2_modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Allergen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="ki ki-close"></i>
        </button>
      </div>
      <form class="form" id ="kt_form" enctype="multipart/form-data">
        <input type= "hidden" id="id" name="id">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Allergen Name</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input class="form-control form-control-solid form-control-lg" name="name" id="name" type="text" value="" required>
                <div class="fv-plugins-message-container"></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Description</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
              <textarea class="col-lg-12 col-xl-12" id="kt_autosize_1" cols="30" rows="10" name="content"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Image</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input type="file" name="profile_avatar" id="image" accept=".png, .jpg, .jpeg">
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

<script src="<?= asset_url()?>scripts/allergen.js"></script>
<script>
    var HOST_URL = '<?= base_url()?>';
</script>