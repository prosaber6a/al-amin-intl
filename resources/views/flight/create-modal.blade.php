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
                        <label for="flight_no" class="required form-label">Flight No</label>
                        <input type="text" name="flight_no" class="form-control form-control-solid"
                            placeholder="Flight No" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="airline" class="required form-label">Airline</label>
                        <input type="text" name="airline" class="form-control form-control-solid"
                            placeholder="Airline" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="from" class="required form-label">From</label>
                        <input type="text" name="from" class="form-control form-control-solid" placeholder="From" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="to" class="required form-label">To</label>
                        <input type="text" name="to" class="form-control form-control-solid" placeholder="To" />
                    </div>


                    <div class="mb-10 fv-row">
                        <label for="departure" class="required form-label">Departure</label>
                        <input type="text" name="departure" class="form-control form-control-solid"
                            placeholder="Departure" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="arrival" class="required form-label">Arrival</label>
                        <input type="text" name="arrival" class="form-control form-control-solid"
                            placeholder="Arrival" />
                    </div>

                    <div class="mb-10 fv-row">
                        <label for="price" class="required form-label">Price</label>
                        <input type="text" name="price" class="form-control form-control-solid" placeholder="Price" />
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