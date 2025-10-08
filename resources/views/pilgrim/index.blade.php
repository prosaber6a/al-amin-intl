@extends('layouts.app')

@section('head')
    <link href="{{ env('APP_URL') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
@endsection

@section('foot')
    <script>
        const app_url = "{{ env('APP_URL') }}";
        const data_url = "{{ route('pilgrims.index') }}";
    </script>
    <script src="{{ env('APP_URL') }}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ env('APP_URL') }}/assets/js/custom/pilgrim/index.js"></script>
@endsection

@section('content')
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <h2 class="py-10">All Pilgirms</h2>
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span
                                class="path2"></span></i>
                        <input type="text" data-kt-docs-table-filter="search"
                            class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Add user-->
                        <button type="button" class="btn btn-primary" id="create_button">
                            <i class="ki-outline ki-plus fs-2"></i>Add Pilgrim</button>
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">

                <table id="kt_datatable" class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                            <th>#</th>
                            <th class="min-w-200px">Name</th>
                            <th class="min-w-125px">Passport</th>
                            <th class="min-w-125px">Agent</th>
                            <th class="min-w-125px">Type</th>
                            <th class="min-w-125px">Created Date</th>
                            <th class="min-w-125px">Last Update</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                    </tbody>
                </table>
                <!--end::Datatable-->

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content container-->

    @include('pilgrim.create-modal')

@endsection