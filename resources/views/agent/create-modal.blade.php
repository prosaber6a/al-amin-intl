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
                <form action="" method="post">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="action" value="">


                    <div class="mb-10 text-center">


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
                                title="Change avatar">
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


                    <div class="mb-10">
                        <label for="name" class="required form-label">Name</label>
                        <input type="text" name="name" class="form-control form-control-solid"
                            placeholder="Agent Name" />
                    </div>

                    <div class="mb-10">
                        <label for="email" class="required form-label">Email</label>
                        <input type="email" name="email" class="form-control form-control-solid"
                            placeholder="Agent Email" />
                    </div>

                    <div class="mb-10">
                        <label for="phone" class="required form-label">Phone</label>
                        <input type="text" name="phone" class="form-control form-control-solid"
                            placeholder="Agent Phone" />
                    </div>

                    <div class="mb-10">
                        <label for="address" class="required form-label">Address</label>
                        <textarea name="address" class="form-control form-control-solid"
                            placeholder="Agent Address"></textarea>
                    </div>









                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
