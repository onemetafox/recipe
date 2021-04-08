
<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Logo-->
            <div class="header-logo">
                <a href="index.html">
                    <img alt="Logo" src="<?= asset_url()?>media/logos/logo-dark.png">
                </a>
            </div>
            <!--end::Header Logo-->
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <!--begin::Header Nav-->
                <ul class="menu-nav">
                    <?php foreach($menus as $menu) {?>
                        <li class="menu-item menu-item-submenu menu-item-rel menu-item-active" aria-haspopup="true">
                            <a href="<?= base_url() . $menu["url"]?>" class="menu-link">
                                <span class="menu-text"><?= $menu["name"]?></span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::User-->
            <div class="topbar-item">
                <div class="dropdown">
                    <!--begin::Toggle-->
                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                        <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                            <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                            <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><?= $user["name"]?></span>
                            <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                            </span>
                        </div>
                    </div>
                    <!--end::Toggle-->
                    <!--begin::Dropdown-->
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                        <form>
                            <!--begin::Header-->
                            <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(<?=asset_url()?>media/misc/bg-1.jpg)">
                                <!--begin::Title-->
                                <h4 class="d-flex flex-center rounded-top">
                                    <a href="<?= base_url()?>welcome/logout"><span class="btn btn-text btn-outline-danger btn-sm font-weight-bold btn-font-md py-3 px-14">Log out</span></a>
                                </h4>
                                <!--end::Title-->
                                <!--begin::Tabs-->
                                <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_events">Support</a>
                                    </li>
                                </ul>
                                <!--end::Tabs-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Content-->
                            <div class="tab-content">
                                <!--begin::Tabpane-->
                                <div class="tab-pane active show" id="topbar_notifications_events" role="tabpanel">
                                    <!--begin::Nav-->
                                    <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="200" data-mobile-height="200">
                                        <!--begin::Item-->
                                        <a href="#" class="navi-item">
                                            <div class="navi-link">
                                                <div class="navi-icon mr-2">
                                                    <i class="flaticon-download-1 text-danger"></i>
                                                </div>
                                                <div class="navi-text">
                                                    <div class="font-weight-bold">Finance report</div>
                                                    <div class="text-muted">User can see the invoice</div>
                                                </div>
                                            </div>
                                        </a>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <a href="#" class="navi-item">
                                            <div class="navi-link">
                                                <div class="navi-icon mr-2">
                                                    <i class="flaticon-security text-warning"></i>
                                                </div>
                                                <div class="navi-text">
                                                    <div class="font-weight-bold">Account setting</div>
                                                    <div class="text-muted">Update user information</div>
                                                </div>
                                            </div>
                                        </a>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <a href="#" class="navi-item">
                                            <div class="navi-link">
                                                <div class="navi-icon mr-2">
                                                    <i class="flaticon2-analytics-1 text-success"></i>
                                                </div>
                                                <div class="navi-text">
                                                    <div class="font-weight-bold">Contact message</div>
                                                    <div class="text-muted">Check the contact messages</div>
                                                </div>
                                            </div>
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Nav-->
                                </div>
                                <!--end::Tabpane-->
                            </div>
                            <!--end::Content-->
                        </form>
                    </div>
                    <!--end::Dropdown-->
                </div>
                <!--  -->
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->

            