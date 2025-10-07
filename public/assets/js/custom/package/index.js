"use strict";

// Class definition
var KTPackages = (function () {
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
            order: [[0, "asc"]],
            stateSave: false,
            ajax: {
                url: data_url,
            },
            columns: [
                { data: "name" },
                { data: "type" },
                { data: "price" },
                { data: "duration" },
                { data: "hotel" },
                { data: "flight" },
                { data: "created_at" },
                { data: "updated_at" },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 1,
                    data: "type",
                    render: function (data, type, row) {
                        return data.toUpperCase();
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
                const name = parent.querySelectorAll("td")[0].innerText;

                // Get id from the clicked edit button's data-id attribute
                const id = e.target.getAttribute("data-id");

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + name + "?",
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
                            text: "Deleting " + name,
                            icon: "info",
                            buttonsStyling: false,
                            showConfirmButton: false,
                            timer: 2000,
                        }).then(function () {
                            $.ajax({
                                url: app_url + "/packages/" + id,
                                type: "DELETE",
                                success: function (response) {
                                    console.log(response);

                                    Swal.fire({
                                        text: "You have deleted " + name + "!.",
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
                            text: name + " was not deleted.",
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
        // Select modal button
        const create_btn = document.getElementById("create_button");

        let modal_props = { name: "", action: "", id: 0, data: null };

        // hotel and flight list
        $.ajax({
            url: app_url + "/packages/hotel-flight-list",
            type: "get",
            processData: false,
            contentType: false,
            success: function (response) {
                console.log("success", response);
                const hotels = response.hotels;
                const flights = response.flights;

                // populate hotel select options
                let hotel_options = "";
                hotels.forEach((hotel) => {
                    hotel_options += `<option value="${hotel.id}">${hotel.name} (${hotel.room_type}, ${hotel.room_capacity}person, ${hotel.price_per_night}/night)</option>`;
                });
                document
                    .querySelector("#kt_modal select[name='hotel_id']")
                    .insertAdjacentHTML("beforeend", hotel_options);

                // populate flight select options
                let flight_options = "";
                flights.forEach((flight) => {
                    const departure = moment(flight.departure).format(
                        "DD-MMM-YY HH:mm"
                    );
                    const arrival = moment(flight.arrival).format(
                        "DD-MMM-YY HH:mm"
                    );
                    flight_options += `<option value="${flight.id}">${flight.airline} - ${flight.flight_no} (${departure} to ${arrival})</option>`;
                });
                document
                    .querySelector("#kt_modal select[name='flight_id']")
                    .insertAdjacentHTML("beforeend", flight_options);
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
            modal_props.title = "Add Package";
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
                        url: app_url + "/packages/" + id + "/edit",
                        type: "get",
                        data: { id: id },
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            console.log("success", response);

                            // set modal properties
                            modal_props.title = "Edit Package";
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
            $("#modal_form [name='type']")
                .val(modal_props.data.type)
                .trigger("change");
            $("#modal_form [name='price']").val(modal_props.data.price);
            $("#modal_form [name='duration']").val(modal_props.data.duration);
            $("#modal_form [name='hotel_id']")
                .val(modal_props.data.hotel_id)
                .trigger("change");
            $("#modal_form [name='flight_id']")
                .val(modal_props.data.flight_id)
                .trigger("change");
        }

        modal.show();
    };

    // Handle form modal
    var handleFormSubmit = () => {
        // Define form submit button
        const form_submit_button = document.getElementById(
            "modal_form_submit_btn"
        );

        // Define form element
        const modal_form = document.getElementById("modal_form");

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        let modal_form_validator = FormValidation.formValidation(modal_form, {
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: "Package name is required",
                        },
                    },
                },
                type: {
                    validators: {
                        notEmpty: {
                            message: "Package type is required",
                        },
                    },
                },
                price: {
                    validators: {
                        notEmpty: {
                            message: "Price is required",
                        },
                        numeric: {
                            message: "Price must be a number",
                        },
                    },
                },
                duration: {
                    validators: {
                        notEmpty: {
                            message: "Duration is required",
                        },
                        numeric: {
                            message: "Duration must be a number",
                        },
                    },
                },
                hotel_id: {
                    validators: {
                        notEmpty: {
                            message: "Hotel is required",
                        },
                        integer: {
                            message: "Hotel must be an integer",
                        },
                    },
                },
                flight_id: {
                    validators: {
                        notEmpty: {
                            message: "Flight is required",
                        },
                        integer: {
                            message: "Flight must be an integer",
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
                                    "Package info inserted successfully";
                                if (
                                    $("#kt_modal [name=action]").val() ===
                                    "update"
                                ) {
                                    message =
                                        "Package info updated successfully";
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
    KTPackages.init();
});
