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
                <form action="" method="post" id="modal_form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="action" value="">



                    <div class="mb-10 fv-row">
                        <label for="name" class="required form-label">Hotel Name</label>
                        <input type="text" name="name" class="form-control form-control-solid"
                            placeholder="Hotel Name" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="location" class="required form-label">Location</label>
                        <input type="text" name="location" class="form-control form-control-solid"
                            placeholder="Hotel Location" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="room_type" class="required form-label">Room Type</label>
                        <input type="text" name="room_type" class="form-control form-control-solid"
                            placeholder="Room Type" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="room_capacity" class="required form-label">Room Capacity</label>
                        <input type="text" name="room_capacity" class="form-control form-control-solid"
                            placeholder="Room Capacity" />
                    </div>


                    <div class="mb-10 fv-row">
                        <label for="price_per_night" class="required form-label">Price Per Night</label>
                        <input type="text" name="price_per_night" class="form-control form-control-solid"
                            placeholder="Price Per Night" />
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
