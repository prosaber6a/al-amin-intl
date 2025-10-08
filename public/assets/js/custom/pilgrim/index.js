"use strict";

// Class definition
var KTPilgrims = (function () {
    // Shared variables
    var table;
    var dt;
    // Modal
    var modal = new bootstrap.Modal(document.getElementById("kt_modal"));

    // Private functions
    var initDatatable = function () {
        dt = $("#kt_datatable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            // order: [[0, "asc"]],
            stateSave: false,
            ajax: {
                url: data_url,
            },
            columns: [
                { data: "DT_RowIndex" },
                { data: null },
                { data: "passport_no" },
                { data: "agent" },
                { data: "type" },
                { data: "created_at" },
                { data: "updated_at" },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 1,
                    data: null,
                    className: "text-start",
                    orderable: false,
                    render: function (data, type, row) {
                        return `${row.given_name} ${row.sure_name}`;
                    },
                },
                {
                    targets: 4,
                    data: "type",
                    className: "text-start",
                    orderable: true,
                    render: function (data, type, row) {
                        if (data == "umrah") {
                            return `<span class="badge badge-light-primary">Umrah</span>`;
                        }
                        return `<span class="badge badge-light-success">Hajj</span>`;
                    },
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: "text-end",
                    render: function (data, type, row) {
                        return `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                Actions
                                <span class="svg-icon fs-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-docs-table-filter="edit_row" data-id="${row.id}">
                                        Edit
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-docs-table-filter="delete_row" data-id="${row.id}">
                                        Delete
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        `;
                    },
                },
            ],
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on("draw", function () {
            handleDeleteRows();
            initModal();
            KTMenu.createInstances();
        });
    };

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector(
            '[data-kt-docs-table-filter="search"]'
        );
        filterSearch.addEventListener("keyup", function (e) {
            dt.search(e.target.value).draw();
        });
    };

    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll(
            '[data-kt-docs-table-filter="delete_row"]'
        );

        deleteButtons.forEach((d) => {
            // Delete button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest("tr");
                // Get customer name
                const hotelName = parent.querySelectorAll("td")[0].innerText;

                // Get id from the clicked edit button's data-id attribute
                const id = e.target.getAttribute("data-id");

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + hotelName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (result) {
                    if (result.value) {
                        // Simulate delete request -- for demo purpose only
                        Swal.fire({
                            text: "Deleting " + hotelName,
                            icon: "info",
                            buttonsStyling: false,
                            showConfirmButton: false,
                            timer: 2000,
                        }).then(function () {
                            $.ajax({
                                url: app_url + "/groups/" + id,
                                type: "DELETE",
                                success: function (response) {
                                    console.log(response);

                                    Swal.fire({
                                        text:
                                            "You have deleted " +
                                            hotelName +
                                            "!.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                                "btn fw-bold btn-primary",
                                        },
                                    }).then(function () {
                                        // delete row data from server and re-draw datatable
                                        dt.draw();
                                    });
                                },
                                error: function (error) {
                                    console.log("error", error);
                                    Swal.fire({
                                        text: "Sorry! An error occurred",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-danger",
                                        },
                                    });
                                },
                            });
                        });
                    } else if (result.dismiss === "cancel") {
                        Swal.fire({
                            text: hotelName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            },
                        });
                    }
                });
            });
        });
    };

    // Initialize Modal
    var initModal = () => {
        // init date picker
        $("[name='dob']").flatpickr({
            dateFormat: "Y-m-d",
            maxDate: "today",
        });

        $("[name='p_issue_date']").flatpickr({
            dateFormat: "Y-m-d",
            maxDate: "today",
        });

        $("[name='p_expiry_date']").flatpickr({
            dateFormat: "Y-m-d",
            minDate: "today",
        });

        // Select modal button
        const create_btn = document.getElementById("create_button");

        let modal_props = { name: "", action: "", id: 0, data: null };

        // agent group and hotel list
        $.ajax({
            url: app_url + "/pilgrims/agent-group-package-list",
            type: "get",
            processData: false,
            contentType: false,
            success: function (response) {
                console.log("success", response);
                const agents = response.agents;
                const groups = response.groups;
                const packages = response.packages;

                // populate agent select options
                let agent_options = "<option></option>";
                agents.forEach((agent) => {
                    agent_options += `<option value="${agent.id}">${agent.name}</option>`;
                });
                document
                    .querySelector("#kt_modal select[name='agent_id']")
                    .insertAdjacentHTML("beforeend", agent_options);

                // populate group select options
                let group_options = "";
                groups.forEach((group) => {
                    group_options += `<option value="${group.id}">${group.name}</option>`;
                });
                document
                    .querySelector("#kt_modal select[name='group_id']")
                    .insertAdjacentHTML("beforeend", group_options);

                // populate package select options
                let package_options = "";
                packages.forEach((pack) => {
                    package_options += `<option value="${pack.id}">${pack.name}</option>`;
                });
                document
                    .querySelector("#kt_modal select[name='package_id']")
                    .insertAdjacentHTML("beforeend", package_options);
            },
            error: function (error) {
                console.log("error", error);
            },
        });

        // modal button on click
        create_btn.addEventListener("click", function (e) {
            e.preventDefault();

            // set modal properties
            modal_props.data = null;
            modal_props.title = "Add Pilgrim";
            modal_props.action = "create";
            modal_props.id = 0;

            // reset form
            document.getElementById("modal_form").reset();

            modal_show(modal_props);
        });

        // Select all delete buttons
        const edit_buttons = document.querySelectorAll(
            '[data-kt-docs-table-filter="edit_row"]'
        );

        edit_buttons.forEach((btn) => {
            // Delete button on click
            btn.addEventListener("click", function (e) {
                e.preventDefault();

                // Get id from the clicked edit button's data-id attribute
                const id = e.target.getAttribute("data-id");

                if (!isNaN(id) && id > 0) {
                    $.ajax({
                        url: app_url + "/pilgrims/" + id + "/edit",
                        type: "get",
                        data: { id: id },
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            console.log("success", response);

                            // set modal properties
                            modal_props.title = "Edit Pilgrim";
                            modal_props.action = "update";
                            modal_props.id = response.id;
                            modal_props.data = response;

                            modal_show(modal_props);
                        },
                        error: function (error) {
                            console.log("error", error);

                            // Show popup confirmation
                            Swal.fire({
                                text: "Sorry! An error occurred",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-danger",
                                },
                            });
                        },
                    });
                }
            });
        });
    };

    var modal_show = (modal_props) => {
        // reset form
        document.getElementById("modal_form").reset();

        // dom set modal propeties
        $("#modal_form [name='action']").val(modal_props.action);
        $("#modal_form [name='id']").val(modal_props.id);
        $("#kt_modal .modal-title").text(modal_props.title);

        if (modal_props.action === "update") {
            // set form input value
            $("#modal_form [name='name']").val(modal_props.data.name);
            $("#modal_form [name='leader']").val(modal_props.data.leader);
            $("#modal_form [name='mobile']").val(modal_props.data.mobile);
        }

        modal.show();
    };

    // Handle form modal
    var handleFormSubmit = () => {
        // Define form submit button
        const form_submit_button = document.getElementById(
            "modal_form_submit_btn"
        );

        // Define type
        $("#pre_registration_info_fieldset").hide();
        $("#kt_modal select[name='type']").on("change", function () {
            const pligrim_type = $(this).val();
            if (pligrim_type === "Hajj") {
                $("#pre_registration_info_fieldset").show();
            } else {
                $("#pre_registration_info_fieldset").hide();
            }
        });

        // Define form element
        const modal_form = document.getElementById("modal_form");

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        let modal_form_validator = FormValidation.formValidation(modal_form, {
            fields: {
                agent_id: {
                    validators: {
                        integer: {
                            message: "The agent is not valid",
                            min: 1,
                        },
                    },
                },
                type: {
                    validators: {
                        notEmpty: {
                            message: "Pilgrim type is required",
                        },
                    },
                },
                package_id: {
                    validators: {
                        integer: {
                            message: "The package is not valid",
                            min: 1,
                        },
                    },
                },
                group_id: {
                    validators: {
                        integer: {
                            message: "The group is not valid",
                            min: 1,
                        },
                    },
                },
                given_name: {
                    validators: {
                        notEmpty: {
                            message: "Given name is required",
                        },
                    },
                },
                sure_name: {
                    validators: {
                        notEmpty: {
                            message: "Sure name is required",
                        },
                    },
                },
                dob: {
                    validators: {
                        notEmpty: {
                            message: "Date of birth is required",
                        },
                        date: {
                            format: "YYYY-MM-DD",
                            message: "The date of birth is not valid",
                        },
                    },
                },
                sex: {
                    validators: {
                        notEmpty: {
                            message: "Sex is required",
                        },
                    },
                },
                passport_no: {
                    validators: {
                        notEmpty: {
                            message: "Passport number is required",
                        },
                        stringLength: {
                            min: 9,
                            max: 9,
                            message:
                                "Passport number must be 9 characters long",
                        },
                    },
                },

                p_issue_date: {
                    validators: {
                        notEmpty: {
                            message: "Passport issue date is required",
                        },
                        date: {
                            format: "YYYY-MM-DD",
                            message: "The passport issue date is not valid",
                        },
                    },
                },

                p_expiry_date: {
                    validators: {
                        notEmpty: {
                            message: "Passport expiry date is required",
                        },
                        date: {
                            format: "YYYY-MM-DD",
                            message: "The passport expiry date is not valid",
                        },
                    },
                },

                mobile: {
                    validators: {
                        notEmpty: {
                            message: "Mobile number is required",
                        },
                    },
                },

                email: {
                    validators: {
                        emailAddress: {
                            message: "Email is not valid",
                        },
                    },
                },

                address: {
                    validators: {
                        stringLength: {
                            min: 3,
                            max: 60,
                            message: "Address must be 3 to 60 characters long",
                        },
                    },
                },
            },

            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                    eleInvalidClass: "",
                    eleValidClass: "",
                }),
            },
        });
        // Submit button handler
        form_submit_button.addEventListener("click", function (e) {
            e.preventDefault();

            // Validate form before submit
            if (modal_form_validator) {
                modal_form_validator.validate().then(function (status) {
                    if (status == "Valid") {
                        // Show loading indication
                        form_submit_button.setAttribute(
                            "data-kt-indicator",
                            "on"
                        );

                        // Disable button to avoid multiple click
                        form_submit_button.disabled = true;

                        $.ajax({
                            url: data_url,
                            type: "post",
                            data: new FormData(modal_form),
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                console.log("success", response);
                                // Remove loading indication
                                form_submit_button.removeAttribute(
                                    "data-kt-indicator"
                                );

                                // Enable button
                                form_submit_button.disabled = false;

                                //set message
                                let message =
                                    "Group info inserted successfully";
                                if (
                                    $("#kt_modal [name=action]").val() ===
                                    "update"
                                ) {
                                    message = "Group info updated successfully";
                                }

                                //reset modal form
                                $("#modal_form").trigger("reset");
                                //hide modal
                                modal.hide();

                                // Show popup confirmation
                                Swal.fire({
                                    text: message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });

                                // Reload the DataTable
                                dt.ajax.reload();
                            },
                            error: function (error) {
                                console.log("error", error);

                                // Remove loading indication
                                form_submit_button.removeAttribute(
                                    "data-kt-indicator"
                                );

                                // Enable button
                                form_submit_button.disabled = false;

                                // validation error
                                if (
                                    error.responseJSON.hasOwnProperty("errors")
                                ) {
                                    const errors = error.responseJSON.errors;

                                    for (const key in errors) {
                                        if (errors.hasOwnProperty(key)) {
                                            toastr.error(errors[key]);
                                        }
                                    }
                                }

                                // Show popup confirmation
                                Swal.fire({
                                    text: "Sorry! An error occurred",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-danger",
                                    },
                                });
                            },
                        });
                    }
                });
            }
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            handleDeleteRows();
            initModal();
            handleFormSubmit();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTPilgrims.init();
});
