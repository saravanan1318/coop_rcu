  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  <script type="">
      $("#signin").click(function (e) {
        console.log("Form is trying to submit");
        e.preventDefault();
        if($("#loginform").validate()){
            $("#loginform").submit();
        }
    });
    $("#issuesubmit").click(function (e) {
        console.log("Form is trying to submit");
        e.preventDefault();
        if($("#issueadd").validate()){
            $("#issueadd").submit();
        }
    });
    $("#outstandingsubmit").click(function (e) {
        console.log("Form is trying to submit");
        e.preventDefault();
        if($("#outstandingadd").validate()){
            $("#outstandingadd").submit();
        }
    });
    $("#fdgovtsubmit").click(function (e) {
        console.log("Form is trying to submit");
        e.preventDefault();
        if($("#fdgovtadd").validate()){
            $("#fdgovt
            add").submit();
        }
    });
</script>