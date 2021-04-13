<link href="<?= asset_url()?>css/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
<script src="<?= asset_url()?>css/pages/wizard/wizard-4.js"></script>
<script src="<?= asset_url()?>js/pages/crud/forms/widgets/select2.js"></script>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?= $page_title?></h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Enter recipe details and submit</span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="<?= base_url()?>customer/recipe" class="btn btn-default font-weight-bold btn-sm px-10 font-size-base">Back</a>
                <!--end::Button-->
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
            <div class="card card-custom card-transparent">
                <div class="card-body p-0">
                    <!--begin::Wizard-->
                    <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="true">
                        <!--begin::Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps" style="justify-content: flex-start;">
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">1</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Recipe</div>
                                            <div class="wizard-desc">Recipe's Information</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">2</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Ingredients</div>
                                            <div class="wizard-desc">Ingredients information</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Nav-->
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-12">
                                        <!--begin::Wizard Form-->
                                        <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" enctype="multipart/form-data">
                                        <input type="hidden" id="id" name = "id" value="<?= isset($recipe)?$recipe["id"]:""?>">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-12">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <h5 class="text-dark font-weight-bold mb-10">Recipe's Details:</h5>
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <div class="col-lg-12 col-xl-12 text-center">
                                                                <div class="image-input image-input-outline" id="kt_user_add_avatar">
                                                                    <div class="image-input-wrapper" style="background-image: url(<?= isset($recipe)?upload_url()."/recipe/".$recipe["img"]:"" ?>)"></div>
                                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                                        <input type="file" name="profile_avatar" id="image" accept=".png, .jpg, .jpeg">
                                                                        <input type="hidden" name="profile_avatar_remove">
                                                                    </label>
                                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Recipe Name</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="recipeName" type="text" value="<?= isset($recipe)?$recipe["name"]:""?>">
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container" data-select2-id="353">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Category</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <select class="form-control select2" id="kt_select2_11"  multiple="multiple" name="categories">
                                                                <?php foreach($categories as $category) { ?>
                                                                    <option value="<?= $category["name"]?>"><?= $category["name"]?></option>
                                                                <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Recipe detail</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    <textarea class="form-control" id="kt_autosize_1" rows="3" name="content" value="<?= isset($recipe)?$recipe["content"]:""?>"></textarea>
                                                                </div>
                                                                <div class="fv-plugins-message-container"></div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                    <!--end::Wizard Step 1-->
                                                    <!--begin::Wizard Step 2-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="mt-3 ingredients">
                                                                            <?php if(isset($recipe)){ foreach($ingredients as $ingredient) {?>
                                                                                <div class="d-flex align-items-center bg-light-success rounded p-3 mb-2" name="<?= $ingredient["code"]?>">
                                                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                                                        <span class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1" name="name"><?= $ingredient["name"]?></span>
                                                                                        <span class="text-muted font-size-sm" name="code"><?= $ingredient["code"]?>, <?= $ingredient["allergen"]?></span>
                                                                                    </div>
                                                                                    <a href="javascript:clicking('<?= $ingredient["code"]?>')"><i class="flaticon2-cross text-danger"></i></a>
                                                                                </div>
                                                                            <?php } }?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <div class="card-body">
                                                                            <!--begin: Search Form-->
                                                                            <div class="mb-7">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-lg-9 col-xl-8">
                                                                                        <div class="row align-items-center">
                                                                                            <div class="col-md-7 my-2 my-md-0">
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
                                                                                        <span id="search_btn" class="btn btn-light-primary px-6 font-weight-bold">Search</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Search Form-->
                                                                            <!--begin: Datatable-->
                                                                            <div class="datatable datatable-bordered datatable-head-custom" id="ingredient"></div>
                                                                            <!--end: Datatable-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Step 2-->
                                                    <!--begin::Wizard Actions-->
                                                    <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                        <div class="mr-2">
                                                            <button type="button" id="prev-step" class="btn btn-light-primary font-weight-bolder px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="btn btn-success font-weight-bolder px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                            <button type="button" id="next-step" class="btn btn-primary font-weight-bolder px-9 py-4" data-wizard-type="action-next">Next</button>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Actions-->
                                                </div>
                                            </div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var HOST_URL = '<?= base_url()?>';    
    var ingredients = new Object();
    <?php if($ingredients) foreach($ingredients as $item) { ?>
        ingredients['<?=$item["code"]?>'] = ['<?= $item["name"]?>', '<?= $item["code"]?>', '<?= $item["allergen"]?>'];
    <?php } ?>
</script>
<script src="<?= asset_url()?>scripts/add-recipe.js"></script>
<script src="<?= asset_url()?>scripts/ingredient.js"></script>
