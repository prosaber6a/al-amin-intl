<!--begin::Header-->
<div id="kt_app_header" class="app-header">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex align-items-stretch flex-stack" id="kt_app_header_container">
        <!--begin::Sidebar toggle-->
        <div class="d-flex align-items-center d-block d-lg-none ms-n3" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px me-2" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-outline ki-abstract-14 fs-2"></i>
            </div>
            <!--begin::Logo image-->
            <a href="{{ route('dashboard') }}">
                <img alt="Logo" src="<?php env('APP_URL'); ?>/assets/media/logos/demo42-small.svg" class="h-30px" />
            </a>
            <!--end::Logo image-->
        </div>
        <!--end::Sidebar toggle-->
        <!--begin::Toolbar wrapper-->
        <div class="app-navbar flex-lg-grow-1" id="kt_app_header_navbar">
            <div class="app-navbar-item d-flex flex-lg-grow-1 align-baseline">
                <h2>{{ env('APP_NAME') }}</h2>
            </div>

            <!--begin::Quick links-->
            <div class="app-navbar-item ms-1 ms-md-3">
                <!--begin::Menu- wrapper-->
                <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                    data-kt-menu-placement="bottom-end">
                    <i class="ki-outline ki-abstract-26 fs-1"></i>
                </div>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
                    <!--begin::Heading-->
                    <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10"
                        style="background-image:url('assets/media/misc/menu-header-bg.jpg')">
                        <!--begin::Title-->
                        <h3 class="text-white fw-semibold mb-3">Quick Links</h3>
                        <!--end::Title-->
                        <!--begin::Status-->
                        <span class="badge bg-primary text-inverse-primary py-2 px-3">25 pending tasks</span>
                        <!--end::Status-->
                    </div>
                    <!--end::Heading-->
                    <!--begin:Nav-->
                    <div class="row g-0">
                        <!--begin:Item-->
                        <div class="col-6">
                            <a href="apps/projects/budget.html"
                                class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                <i class="ki-outline ki-dollar fs-3x text-primary mb-2"></i>
                                <span class="fs-5 fw-semibold text-gray-800 mb-0">Accounting</span>
                                <span class="fs-7 text-gray-500">eCommerce</span>
                            </a>
                        </div>
                        <!--end:Item-->
                        <!--begin:Item-->
                        <div class="col-6">
                            <a href="apps/projects/settings.html"
                                class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
                                <i class="ki-outline ki-sms fs-3x text-primary mb-2"></i>
                                <span class="fs-5 fw-semibold text-gray-800 mb-0">Administration</span>
                                <span class="fs-7 text-gray-500">Console</span>
                            </a>
                        </div>
                        <!--end:Item-->
                        <!--begin:Item-->
                        <div class="col-6">
                            <a href="apps/projects/list.html"
                                class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
                                <i class="ki-outline ki-abstract-41 fs-3x text-primary mb-2"></i>
                                <span class="fs-5 fw-semibold text-gray-800 mb-0">Projects</span>
                                <span class="fs-7 text-gray-500">Pending Tasks</span>
                            </a>
                        </div>
                        <!--end:Item-->
                        <!--begin:Item-->
                        <div class="col-6">
                            <a href="apps/projects/users.html"
                                class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
                                <i class="ki-outline ki-briefcase fs-3x text-primary mb-2"></i>
                                <span class="fs-5 fw-semibold text-gray-800 mb-0">Customers</span>
                                <span class="fs-7 text-gray-500">Latest cases</span>
                            </a>
                        </div>
                        <!--end:Item-->
                    </div>
                    <!--end:Nav-->
                </div>
                <!--end::Menu-->
                <!--end::Menu wrapper-->
            </div>
            <!--end::Quick links-->

            <!--begin::Header menu toggle-->
            <!--end::Header menu toggle-->
        </div>
        <!--end::Navbar-->
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->
