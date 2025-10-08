<div class="modal fade" data-bs-focus="false" tabindex="-1" id="kt_modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
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

                    <fieldset>
                        <legend>Official Information</legend>

                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="agent_id" class="form-label">Agent</label>
                                <select class="form-select form-select-solid" name="agent_id" data-control="select2"
                                    data-placeholder="Select an agent" data-allow-clear="true"
                                    data-dropdown-parent="#kt_modal">
                                    <option selected disabled value="">Select an agent</option>
                                </select>
                            </div>

                            <div class="col fv-row">
                                <label for="type" class="required form-label">Type</label>
                                <select class="form-select form-select-solid" name="type">
                                    <option selected disabled value="">Select type</option>
                                    <option value="Hajj">Hajj</option>
                                    <option value="Umrah">Umrah</option>
                                </select>
                            </div>



                        </div>

                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="package_id" class="form-label">Package</label>
                                <select class="form-select form-select-solid" name="package_id" data-control="select2"
                                    data-placeholder="Select a package" data-allow-clear="true"
                                    data-dropdown-parent="#kt_modal">
                                    <option selected disabled value="">Select a package</option>
                                </select>
                            </div>
                            <div class="col fv-row">
                                <label for="group_id" class="form-label">Group</label>
                                <select class="form-select form-select-solid" name="group_id" data-control="select2"
                                    data-placeholder="Select a group" data-allow-clear="true"
                                    data-dropdown-parent="#kt_modal">
                                    <option selected disabled value="">Select a group</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>


                    <fieldset>
                        <legend>Personal Information</legend>

                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="given_name" class="required form-label">Given Name</label>
                                <input type="text" name="given_name" class="form-control form-control-solid"
                                    placeholder="Given Name" />
                            </div>
                            <div class="col fv-row">
                                <label for="sure_name" class="required form-label">Sure Name</label>
                                <input type="text" name="sure_name" class="form-control form-control-solid"
                                    placeholder="Sure Name" />
                            </div>
                        </div>

                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="dob" class="required form-label">Date of Birth</label>
                                <input type="text" name="dob" class="form-control form-control-solid"
                                    placeholder="Date of Birth" />
                            </div>

                            <div class="col fv-row">
                                <label for="sex" class="required form-label">Sex</label>

                                <div class="mt-3">
                                    <label class="form-check form-check-custom form-check-solid d-inline">
                                        <input class="form-check-input" type="radio" name="sex" value="male" checked />
                                        <span class="form-check-label">
                                            Male
                                        </span>
                                    </label> &nbsp;&nbsp;
                                    <label class="form-check form-check-custom form-check-solid d-inline">
                                        <input class="form-check-input" type="radio" name="sex" value="female" />
                                        <span class="form-check-label">
                                            Female
                                        </span>
                                    </label>
                                </div>
                            </div>

                        </div>


                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="place_of_birth" class="form-label">Place of Birth</label>
                                <input type="text" name="place_of_birth" class="form-control form-control-solid"
                                    placeholder="Place of Birth" />
                            </div>
                            <div class="col fv-row">
                                <label for="passport_no" class="required form-label">Passport No.</label>
                                <input type="text" name="passport_no" class="form-control form-control-solid"
                                    placeholder="Passport No." />
                            </div>
                        </div>

                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="p_issue_date" class="required form-label">Passport Issue Date</label>
                                <input type="text" name="p_issue_date" class="form-control form-control-solid"
                                    placeholder="Passport Issue Date" />
                            </div>
                            <div class="col fv-row">
                                <label for="p_expiry_date" class="required form-label">Passport Expiry Date</label>
                                <input type="text" name="p_expiry_date" class="form-control form-control-solid"
                                    placeholder="Passport Expiry Date" />
                            </div>
                        </div>

                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="mobile" class="required form-label">Mobile</label>
                                <input type="text" name="mobile" class="form-control form-control-solid"
                                    placeholder="Mobile" />
                            </div>
                            <div class="col fv-row">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control form-control-solid"
                                    placeholder="Email" />
                            </div>
                        </div>

                        <div class="mb-10 fv-row">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" class="form-control form-control-solid"
                                placeholder="Address"></textarea>
                        </div>
                    </fieldset>

                    <fieldset id="pre_registration_info_fieldset">
                        <legend>Pre Registration Information</legend>

                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="pre_registration_no" class="form-label">Pre-Registration
                                    No.</label>
                                <input type="text" name="pre_registration_no" class="form-control form-control-solid"
                                    placeholder="Pre-registration no." />
                            </div>
                            <div class="col fv-row">
                                <label for="mofa_no" class="form-label">Mofa No.</label>
                                <input type="text" name="mofa_no" class="form-control form-control-solid"
                                    placeholder="Mofa No." />
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="registration_status" class="form-label">Registration Status</label>
                                <select class="form-select form-select-solid" name="registration_status">
                                    <option selected disabled value="">Select a status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                            <div class="col fv-row">
                                <label for="registration_date" class="form-label">Registration Date</label>
                                <input type="text" name="registration_date" class="form-control form-control-solid"
                                    placeholder="Registration Date" />
                            </div>
                        </div>

                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="mahrem_name" class="form-label">Mahrem Name</label>
                                <input type="text" name="mahrem_name" class="form-control form-control-solid"
                                    placeholder="Mahram Name" />
                            </div>
                            <div class="col fv-row">
                                <label for="mahrem_relation" class="form-label">Mahram Relation</label>
                                <input type="text" name="mahrem_relation" class="form-control form-control-solid"
                                    placeholder="Mahrem Relation" />
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col fv-row">
                                <label for="is_first_time" class="required form-label">Is First Time</label>

                                <div class="mt-3">
                                    <label class="form-check form-check-custom form-check-solid d-inline">
                                        <input class="form-check-input" type="radio" name="is_first_time" value="true"
                                            checked />
                                        <span class="form-check-label">
                                            Yes
                                        </span>
                                    </label> &nbsp;&nbsp;
                                    <label class="form-check form-check-custom form-check-solid d-inline">
                                        <input class="form-check-input" type="radio" name="is_first_time"
                                            value="false" />
                                        <span class="form-check-label">
                                            No
                                        </span>
                                    </label>
                                </div>

                            </div>
                            <div class="col fv-row">
                                <label for="medical_certificate_no" class="form-label">Medical Certificate No.</label>
                                <input type="text" name="medical_certificate_no" class="form-control form-control-solid"
                                    placeholder="Medical Certificate No." />
                            </div>
                        </div>

                        <div class="mb-10 fv-row">
                            <label for="remarks" class="form-label">Remark</label>
                            <textarea name="remarks" class="form-control form-control-solid"
                                placeholder="Remark"></textarea>
                        </div>



                    </fieldset>







                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modal_form_submit_btn">Save</button>
            </div>
        </div>
    </div>
</div>