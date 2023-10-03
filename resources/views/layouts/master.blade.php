<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
        $('#data-table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Export Excel',
                    className: 'btn btn-outline btn-success m-2', // Add a custom class for the Excel button
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i> Export PDF',
                    className: 'btn btn-outline btn-success m-2',
                },
            ],
            pageLength: 15,
            lengthChange: false,
            search: false,
            order: [[0, 'desc']]
            // columnDefs: [
            //     { targets: [0, 2], orderable: false } // Disable sorting for columns 0 and 1
            // ]
        } );
        $('#data-table-dashboard').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Export Excel',
                    className: 'btn btn-outline btn-success m-2', // Add a custom class for the Excel button
                },
            ],
            pageLength: 15,
            lengthChange: false,
            search: true,
            // order: [[0, 'desc']]
            // columnDefs: [
            //     { targets: [0, 2], orderable: false } // Disable sorting for columns 0 and 1
            // ]
        } );

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
    #data-table-dashboard
    {
        border: 1px solid #000; /* Add a 1px solid black border to the table */
    }
    tr.odd {
        background-color: #f5f8fe !important;
    }
    .filterpaddings{
        padding: 20px 0px 4px 20px;
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
</script>
</html>
