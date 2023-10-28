<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{!empty($title)?$title: "COOP"}}</title>
    @include('partials.styles')
</head>
<body>
@include('partials.header')
@include('partials.societymenu')
@yield('content')
@include('partials.footer')
@include('partials.scripts')
</body>
{{--<!-- jQuery -->--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.datatables.net/v/bs/dt-1.13.6/datatables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/v/bs/dt-1.13.6/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">

<script>

    $(document).ready(function () {

        function exportDataToJSON(dataTable) {
            const tableData = dataTable.rows({page: 'current'}).data().toArray();
            const jsonContent = JSON.stringify(tableData);

            // Create a temporary anchor element to trigger the download
            const blob = new Blob([jsonContent], {type: 'application/json'});
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'data.json';
            a.click();
            URL.revokeObjectURL(url);
        }

        $('#data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Export Excel',
                    className: 'btn btn-outline btn-success m-2', // Add a custom class for the Excel button
                    exportOptions: {
                        columns: ':visible',// Export only visible columns
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i> Export PDF',
                    className: 'btn btn-outline btn-success m-2',
                    exportOptions: {
                        columns: ':visible',// Export only visible columns
                    }
                },
                // {
                //     text: '<i class="fas fa-file-code"></i> Export JSON',
                //     className: 'btn btn-outline btn-success m-2',
                //     action: function (e, dt, button, config) {
                //         exportDataToJSON(dt); // Call a custom function to export data to JSON
                //     }
                //     },
            ],
            pageLength: 15,
            lengthChange: false,
            search: false,
            order: [[0, 'desc']]
            // columnDefs: [
            //     { targets: [0, 2], orderable: false } // Disable sorting for columns 0 and 1
            // ]
        });

        $('#data-table-dashboard').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Export Excel',
                    className: 'btn btn-outline btn-success m-2', // Add a custom class for the Excel button
                    exportOptions: {
                        columns: ':visible',// Export only visible columns
                    }
                },
            ],
            pageLength: 15,
            lengthChange: false,
            search: true,
            // order: [[0, 'desc']]
            // columnDefs: [
            //     { targets: [0, 2], orderable: false } // Disable sorting for columns 0 and 1
            // ]
        });
        $('#rcsdata-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Export Excel',
                    className: 'btn btn-outline btn-success m-2', // Add a custom class for the Excel button
                    exportOptions: {
                        columns: ':visible',// Export only visible columns
                    }
                },
            ],
            pageLength: 40,
            lengthChange: false,
            search: true,
            order: [[32, 'asc']]
            // columnDefs: [
            //     { targets: [0, 2], orderable: false } // Disable sorting for columns 0 and 1
            // ]
        });
        table.buttons().container().appendTo('#export-buttons');
    });

    const dateForm = document.getElementById('endDate');
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');

    dateForm.addEventListener('change', function (event) {
        event.preventDefault();

        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        if (startDate >= endDate) {
            alert('End date must be later than start date.');
        } else {
            // alert('Form submitted successfully.');
            // You can perform further actions here, e.g., submit the form data.
        }
    });

</script>
<style>
    /* Add this CSS to hide the search input */
    .dataTables_filter {
        display: none;
    }

    .dataTables_wrapper .dt-buttons {
        float: right;
        margin-right: 10px; /* Add some right margin for spacing */
    }

    #data-table, #data-table-dashboard {
        border: 1px solid #000; /* Add a 1px solid black border to the table */
    }

    #data-table-dashboard {
        border: 1px solid #000; /* Add a 1px solid black border to the table */
    }

    tr.odd {
        background-color: #f5f8fe !important;
    }

    .filterpaddings {
        padding: 20px 0px 4px 20px;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<script>
    $('#region').on('change', function () {
        var regionId = $(this).val();

        // If "All" is selected, clear and disable the "circle" dropdown
        if (regionId === '') {
            $('#circle').html('<option value="">Select Region First</option>');
            $('#circle').prop('disabled', true);
            return;
        }

        // Otherwise, fetch circle data via AJAX
        $.ajax({
            url: '/fetch-circles/' + regionId, // Replace with your actual route
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // Update the "circle" dropdown with fetched options
                $('#circle').html(data);
                $('#circle').prop('disabled', false);
            },
            error: function (e) {
                console.log(e);
                alert('Error fetching circle data');
            }
        });
    });
    $('#circle').on('change', function () {
        var circleId = $(this).val(); // Get the selected circle ID
        var region = $("#region").val(); // Get the selected circle ID

        // If "Select Region First" is selected or "All" is selected, clear and disable the "society" dropdown
        if (circleId === '' || circleId === 'all') {
            $('#society').html('<option value="">Select Circle First</option>');
            $('#society').prop('disabled', true);
            return;
        }

        // Otherwise, fetch society data via AJAX
        $.ajax({
            url: '/fetch-societies/' + circleId, // Replace with your actual route
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // Update the "society" dropdown with fetched options
                $('#society').html(data);
                $('#society').prop('disabled', false);
            },
            error: function () {
                alert('Error fetching society data');
            }
        });
        $.ajax({
            // url: '/fetch-societies-fromtype?socitytype=' + socitytype+'&circleID='+circle+'&region='+region, // Replace with your actual route
            url: '/fetch-societiestype-fromregions?' + 'circleID=' + circleId + '&region=' + region,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // Update the "society" dropdown with fetched options
                $('#societyTypes').html(data);
                $('#societyTypes').prop('disabled', false);
            },
            error: function () {
                alert('Error fetching society data');
            }
        });
    });
    $('#societyTypes').on('change', function () {
        var socitytype = $(this).val(); // Get the selected circle ID
        var region = $("#region").val(); // Get the selected circle ID
        var circle = $("#circle").val(); // Get the selected circle ID

        // If "Select Region First" is selected or "All" is selected, clear and disable the "society" dropdown
        if (socitytype === '' || socitytype === 'all') {
            $('#society').html('<option value="">Select society</option>');
            $('#society').prop('disabled', true);
            return;
        }

        // Otherwise, fetch society data via AJAX
        $.ajax({
            // url: '/fetch-societies-fromtype?socitytype=' + socitytype+'&circleID='+circle+'&region='+region, // Replace with your actual route
            url: '/fetch-societies-fromtype?socitytype=' + socitytype + '&circleID=' + circle + '&region=' + region,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // Update the "society" dropdown with fetched options
                $('#society').html(data);
                $('#society').prop('disabled', false);
            },
            error: function () {
                alert('Error fetching society data');
            }
        });
    });
    $('#generateSampleFile').on('click', function (e) {
        e.preventDefault();
        // Get the circle value from the input field
        var circleValue = $('#circle').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        if (circleValue == "") {
            alert("Please select circle ");

        } else {
            $.ajax({
                type: 'POST',
                url: '/jr/generatesampleFiles',
                method: 'POST',
                data: {circle: circleValue},
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Use the csrfToken variable
                },
                success: function (response) {
                    // Handle the response from the server
                    console.log(response);
                    // URL of the file to download
                    const fileUrl = response;

                    const downloadLink = document.createElement('a');
                    downloadLink.href = fileUrl;
                    downloadLink.target = '_blank'; // Open in a new tab/window (optional)
                    // downloadLink.download = 'desired-filename.csv'; // Specify the desired filename (optional)

// Trigger a click event on the anchor to initiate the download
                    downloadLink.click();
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    alert("Facing some technical issue ");
                }
            });

        }

        // Perform the AJAX request

    });
    $("#initiated_during_month_seventeena").change(function (e) {
        var total = $("#disciplinary_total_seventeena").val();
        $("#disposed_this_month_seventeena").attr("max", total);

    });
    $("#initiated_during_month_seventeenb").change(function (e) {
        var total = $("#disciplinary_total_seventeenb").val();
        $("#disposed_this_month_seventeenb").attr("max", total);

    });
    $("#Initiated_during_the_month").change(function (e) {
        var total = $("#total").val();
        $("#disposed_this_month").attr("max", total);

    });
    $("#reply_sent_date").change(function (e) {
        $("#closure").val("YES");
    });
    $("#counter_filed").change(function (e) {
        var value = $("#counter_filed").val();

        if (value == "YES") {
            $("#counter_filed_date").show();
            $("[name='counter_filed_date']").prop("required", true);

            $("#no_reason").hide();
            $("[name='no_reason']").prop("required", false);


        } else {
            $("#counter_filed_date").hide();
            $("[name='counter_filed_date']").prop("required", false);
            $("#no_reason").show();
            $("[name='no_reason']").prop("required", true);
        }

    });
    $("[name='respondents']").change(function (e) {
        if ($("[name='respondents']").val() == 5) {
            $("#otherrespondername").show();
            $("[name='otherrespondername']").prop("required", true);
        } else {
            $("#otherrespondername").hide();
            $("[name='otherrespondername']").prop("required", false);
        }
    });

    $("#interim_stay").change(function (e) {
        if ($("#interim_stay").val() == "YES") {
            $("#order_details").show();
            $("[name='order_details']").prop("required", true);
        } else {
            $("#order_details").hide();
            $("[name='order_details']").prop("required", false);
        }
    });
    $("#final_judgement").change(function (e) {
        if ($("#final_judgement").val() == "YES") {
            $("#direction_to_comply").show();
            $("[name='direction_to_comply']").prop("required", true);
        } else {
            $("#direction_to_comply").hide();
            $("[name='direction_to_comply']").prop("required", false);
        }
    });
    $("#writ_appeal").change(function (e) {
        if ($("#writ_appeal").val() == "YES") {
            $("#writ_appeal_details").show();
            $("[name='writ_appeal_details']").prop("required", true);
        } else {
            $("#writ_appeal_details").hide();
            $("[name='writ_appeal_details']").prop("required", false);
        }
    });
    $("#writ_appeal_stay").change(function (e) {
        if ($("#writ_appeal_stay").val() == "YES") {
            $("#writ_appeal_stage").show();
            $("[name='writ_appeal_stage']").prop("required", true);
        } else {
            $("#writ_appeal_stage").hide();
            $("[name='writ_appeal_stage']").prop("required", false);
        }
    });
    $("#FWDSelection").change(function () {

        if ($(this).val() == "YES") {
            $(".fwdSection").removeClass("d-none");
            $(".fwdSection").show();
        } else {
            $(".fwdSection").hide();
        }
    });
    $("#frwdsectionType").change(function () {

        var frwdValue = ["SECTION", "REGION", "OTHERS"];
        $(".hidefield").hide();
        if ($(this).val().includes("SECTION")) {
            $(".fwdsection").show();
        }
        if ($(this).val().includes("REGION")) {

            $(".fwdregion").show();
        }
        if ($(this).val().includes("OTHERS")) {

            $(".fwdother").show();
        }
        if ($(this).val().length == 0) {
            $(".hidefield").hide();
        }

    });
    $("#isObtainCoopTraing").change(function () {
        if ($(this).val() == "YES") {

            $(".iscooptraing").show();
        } else {
            $(".iscooptraing").hide();
        }
    });
    $("#appointmentType").change(function () {
        if ($(this).val() == "Regular") {

            $(".regularoption").show();
        } else {
            $(".regularoption").hide();
        }
    });
    $("#isonDeputation").change(function () {
        if ($(this).val() == "YES") {

            $(".deputationoption").show();
        } else {
            $(".deputationoption").hide();
        }
    });

    function FPSChangesExpens() {
        var contiogencharge =0;
        var tpexpense =0;
        var rentexpense =0;
        var ebcharge =0;
        var printstation =0;
        var maintanaceexpense =0;
        var otherexpense =0;
        var expenseTotal =0;
        var marginmoney =0;
        var saleemptygunnies =0;
        var totalincome =0;


         contiogencharge = parseFloat($("#contiogencharge").val())|| 0;
         tpexpense = parseFloat($("#tpexpense").val())|| 0;
         rentexpense = parseFloat($("#rentexpense").val())|| 0;
         ebcharge = parseFloat($("#ebcharge").val())|| 0;
         printstation = parseFloat($("#printstation").val())|| 0;
         maintanaceexpense = parseFloat($("#maintanaceexpense").val())|| 0;
         otherexpense = parseFloat($("#otherexpense").val())|| 0;
         expenseTotal = contiogencharge
            + tpexpense
            + rentexpense
            + ebcharge
            + printstation
            + maintanaceexpense
            + otherexpense;
        $("#totalexpense").val(expenseTotal);
        marginmoney = parseFloat($("#marginmoney").val())|| 0;
        saleemptygunnies = parseFloat($("#saleemptygunnies").val())|| 0;
        totalincome=marginmoney+saleemptygunnies;
        var difference= totalincome-  expenseTotal;
        $("#totalincome").val(totalincome);
        $("#difference").val(difference);

    }
</script>
<style>
    .hidefield {
        display: none;
    }
    .classDanger{
        background-color: #fd0001 !important;
        color: white;
    }
    .classyellow{
        background-color: #fdfd01 !important;
        color: white;
    }
    .classgreen{
        background-color: #92d050 !important;
        color: white;
    }
    .classDrakblue{
        background-color: #002060 !important;
        color: white;
    }



</style>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize the select2 plugin for the multiple select dropdown
        $('.js-example-basic-multiple').select2();
        @if(isset($class_array))
        @foreach($class_array as $key=>$value)
        $('.result_{{$key}}').addClass('{{$value}}');
        $('.result_{{$key}}').removeClass('odd');
        $('.result_{{$key}}').removeClass('even');
        @endforeach
        @endif
    });
</script>
</html>
