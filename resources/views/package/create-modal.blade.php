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
                        <label for="name" class="required form-label">Package Name</label>
                        <input type="text" name="name" class="form-control form-control-solid"
                            placeholder="Package Name" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="type" class="required form-label">Type</label>
                        <select class="form-select form-select-solid" name="type">
                            <option selected disabled value="">Select type</option>
                            <option value="hajj">Hajj</option>
                            <option value="umrah">Umrah</option>
                        </select>
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="price" class="required form-label">Price</label>
                        <input type="text" name="price" class="form-control form-control-solid" placeholder="Price" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="duration" class="required form-label">Duration</label>
                        <input type="text" name="duration" class="form-control form-control-solid"
                            placeholder="Duration" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="hotel_id" class="required form-label">Hotel</label>
                        <select class="form-select form-select-solid" name="hotel_id" data-control="select2"
                            data-placeholder="Select a hotel">
                            <option selected disabled value="">Select a hotel</option>
                        </select>
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="flight_id" class="required form-label">Flight</label>
                        <select class="form-select form-select-solid" name="flight_id" data-control="select2"
                            data-placeholder="Select a flight">
                            <option selected disabled value="">Select a flight</option>
                        </select>
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