<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?= $page_title?></h5>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total"><?= $pagination["total"]?> Total</span>
                    <form class="ml-5">
                        <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                            <input type="text" class="form-control" id="kt_subheader_search_form" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <a href="<?= base_url()?>customer/recipe/view" class="btn btn-light-primary font-weight-bold ml-2">Add Recipe</a>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <?php if($data){ 
                for($i = 0 ; $i< count($data)/4; $i++){
            ?>
            <div class="row">
                <?php for($j = $i*4 ; $j < ($i+1)*4 ; $j ++){ if(isset($data[$j])) {?>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-custom gutter-b card-stretch">
                        <div class="card-body pt-4">
                            <div class="d-flex align-items-end mb-7">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                        <div class="symbol symbol-circle symbol-lg-75">
                                            <img src="<?= upload_url()?>recipe/<?= $data[$j]['img']?>" alt="image">
                                        </div>
                                        <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                            <span class="font-size-h3 font-weight-boldest">JM</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0"><?= $data[$j]["name"]?></a>
                                        <span class="text-muted font-weight-bold"><?= $data[$j]["category"]?></span>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-7"><?= $data[$j]['content']?></p>
                            <div class="mb-7">
                                <?php $i = 0 ; foreach($data[$j]["ingredients"] as $ingredient) { $i++?>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 font-weight-bolder mr-2"><?=$ingredient["name"]?>:</span>
                                        <span class="text-muted text-hover-primary"><?=$ingredient["allergen"]?></span>
                                    </div>
                                <?php if($i == 3) break;} ?>
                            </div>
                            <a href="<?= base_url()?>customer/recipe/view/<?= $data[$j]["id"]?>" class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4">Edit Recipe</a>
                            <a href="javascript:onView('<?= $data[$j]["id"]?>')" class="btn btn-block btn-sm btn-light-primary font-weight-bolder text-uppercase py-4">View Detail</a>
                            <a href="javascript:onDel('<?= $data[$j]["id"]?>')" class="btn btn-block btn-sm btn-light-danger font-weight-bolder text-uppercase py-4">Delete Recipe</a>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
            <?php }
            }else{ 
                echo("There is not search result");
            } ?>
            <!--end::Row-->
            <!--begin::Pagination-->
            <?php if($data) {?>
            <!-- <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap mr-3">
                    <a href="javascript:goPage('1')" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                    </a>
                    <a href="javascript:goPage('<?= $pagination["page"] -1?>')" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-arrow-back icon-xs"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">23</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">24</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">25</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">26</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">27</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">28</a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-arrow-next icon-xs"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;">
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="36">36</option>
                        <option value="">All</option>
                    </select>
                    <span class="text-muted">Displaying <?= count($data)?> of <?= $pagination["total"]?> records</span>
                </div>
            </div> -->
            <?php } ?>
            <!--end::Pagination-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<script>
    var HOST_URL = '<?= base_url()?>';    
    function onView(id){

    }

    function onDel(id){
        Swal.fire({
            text: "Really do you want to delete?",
            icon: "error",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn font-weight-bold btn-danger",
                cancelButton: "btn font-weight-bold btn-default"
            }
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: HOST_URL + 'customer/recipe/delete/'+id,
                    type: 'post',
                    // data: id,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        var data = JSON.parse(response);
                        if(data.success == true){
                            toastr.success(data.msg);
                            location.reload();
                        }else{
                            toastr.error(data.msg)
                        }
                    },
                });
                wizard.preventDefault(); 
            }
        });
    }

    function search(){

    }
    function goOage(){
        
    }
</script>