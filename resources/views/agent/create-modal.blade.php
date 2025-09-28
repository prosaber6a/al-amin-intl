<div class="modal fade" tabindex="-1" id="kt_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Modal title</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="" method="post" id="modal_form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="action" value="">

                    <div class="mb-10 text-center fv-row">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true"
                            style="background-image: url({{env('APP_URL')}}/assets/media/svg/avatars/blank.svg)">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url({{env('APP_URL')}}/assets/media/avatars/blank.png)"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label
                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Change photo">
                                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                        class="path2"></span></i>

                                <!--begin::Inputs-->
                                <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                        </div>
                        <!--end::Image input-->


                    </div>


                    <div class="mb-10 fv-row">
                        <label for="name" class="required form-label">Name</label>
                        <input type="text" name="name" class="form-control form-control-solid"
                            placeholder="Agent Name" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="email" class="required form-label">Email</label>
                        <input type="email" name="email" class="form-control form-control-solid"
                            placeholder="Agent Email" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="phone" class="required form-label">Phone</label>
                        <input type="text" name="phone" class="form-control form-control-solid"
                            placeholder="Agent Phone" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="address" class="required form-label">Address</label>
                        <textarea name="address" class="form-control form-control-solid"
                            placeholder="Agent Address"></textarea>
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="status" class="required form-label">Status</label>

                        <div>
                            <!--begin::Radio group-->
                            <div class="btn-group w-100 w-lg-50" data-kt-buttons="true"
                                data-kt-buttons-target="[data-kt-button]">
                                <!--begin::Radio-->
                                <label class="btn btn-outline btn-color-muted btn-active-primary active" data-kt-button="true">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="status" value="active" checked />
                                    <!--end::Input-->
                                    Active
                                </label>
                                <!--end::Radio-->

                                <!--begin::Radio-->
                                <label class="btn btn-outline btn-color-muted btn-active-secondary"
                                    data-kt-button="true">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="status" value="inactive" />
                                    <!--end::Input-->
                                    Inactive
                                </label>
                                <!--end::Radio-->
                            </div>
                            <!--end::Radio group-->
                        </div>














                    </div>









                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modal_form_submit_btn">Save</button>
            </div>
        </div>
    </div>
</div>