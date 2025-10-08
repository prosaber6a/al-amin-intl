<div class="modal fade" tabindex="-1" id="kt_modal" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"></h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="" method="post" id="modal_form">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="action" value="">



                    <div class="mb-10 fv-row">
                        <label for="name" class="required form-label">Group Name</label>
                        <input type="text" name="name" class="form-control form-control-solid"
                            placeholder="Group Name" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="leader" class="required form-label">Group Leader</label>
                        <input type="text" name="leader" class="form-control form-control-solid"
                            placeholder="Leader Name" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="mobile" class="required form-label">Leader Mobile</label>
                        <input type="text" name="mobile" class="form-control form-control-solid"
                            placeholder="Mobile Number" />
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
