function isNumberKey(evt) {

    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31

        && (charCode < 48 || charCode > 57))

        return false;



    return true;

}
function numberMobile(e){
    e.target.value = e.target.value.replace(/[^\d]/g,'');
    return false;
}


$(document).ready(function() {
    $('#generateSampleFile').on('click', function() {
        // Get the circle value from the input field
        var circleValue = $('#circle').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        if(circleValue =="")
        {
            alert("Please select circle ");

        }
        else
        {
            $.ajax({
                type: 'POST',
                url: '/jr/generatesampleFiles',
                method: 'POST',
                data: {circle: circleValue},
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Use the csrfToken variable
                },
                success: function(response) {
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
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    alert("NOt comming");
                }
            });

        }

        // Perform the AJAX request

    });
});
