  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
    $("#collectionsubmit").click(function (e) {
        console.log("Form is trying to submit");
        e.preventDefault();
        if($("#collectionadd").validate()){
            $("#collectionadd").submit();
        }
    });
    $("#annualsubmit").click(function (e) {
        console.log("Form is trying to submit");
        e.preventDefault();
        if($("#annualadd").validate()){
            $("#annualadd").submit();
        }
    });
    $("#depositsubmit").click(function (e) {
        console.log("Form is trying to submit");
        e.preventDefault();
        if($("#depositsadd").validate()){
            $("#depositsadd").submit();
        }
    });
    $('#purchase_id').on('change', function() {


        $("#govtnoofvarieties").val("");
        $("#govtquantity").val("");
        $("#govtvalues").val("");
        $("#coopnoofvarieties").val("");
        $("#coopquantity").val("");
        $("#coopvalues").val("");
        $("#privatenoofvarieties").val("");
        $("#privatequantity").val("");
        $("#privatevalues").val("");
        $("#jpcnoofvarieties").val("");
        $("#jpcquantity").val("");
        $("#jpcvalues").val("");

        if(this.value == "1"){

            $("#govtnoofvarieties").attr("readonly",false);
            $("#govtquantity").attr("readonly",false);
            $("#govtvalues").attr("readonly",false);
            $("#coopnoofvarieties").attr("readonly",false);
            $("#coopquantity").attr("readonly",false);
            $("#coopvalues").attr("readonly",false);
            $("#privatenoofvarieties").attr("readonly",false);
            $("#privatequantity").attr("readonly",false);
            $("#privatevalues").attr("readonly",false);
            $("#jpcnoofvarieties").attr("readonly",true);
            $("#jpcquantity").attr("readonly",true);
            $("#jpcvalues").attr("readonly",true);
            
        }else if(this.value == "2"){

            $("#govtnoofvarieties").attr("readonly",true);
            $("#govtquantity").attr("readonly",true);
            $("#govtvalues").attr("readonly",true);
            $("#coopnoofvarieties").attr("readonly",true);
            $("#coopquantity").attr("readonly",true);
            $("#coopvalues").attr("readonly",true);
            $("#privatenoofvarieties").attr("readonly",true);
            $("#privatequantity").attr("readonly",false);
            $("#privatevalues").attr("readonly",false);
            $("#jpcnoofvarieties").attr("readonly",true);
            $("#jpcquantity").attr("readonly",false);
            $("#jpcvalues").attr("readonly",false);

        }else if(this.value == "3"){
            $("#govtnoofvarieties").attr("readonly",true);
            $("#govtquantity").attr("readonly",true);
            $("#govtvalues").attr("readonly",true);
            $("#coopnoofvarieties").attr("readonly",true);
            $("#coopquantity").attr("readonly",false);
            $("#coopvalues").attr("readonly",false);
            $("#privatenoofvarieties").attr("readonly",true);
            $("#privatequantity").attr("readonly",false);
            $("#privatevalues").attr("readonly",false);
            $("#jpcnoofvarieties").attr("readonly",true);
            $("#jpcquantity").attr("readonly",true);
            $("#jpcvalues").attr("readonly",true);

        }else if(this.value == "4"){

            $("#govtnoofvarieties").attr("readonly",false);
            $("#govtquantity").attr("readonly",false);
            $("#govtvalues").attr("readonly",false);
            $("#coopnoofvarieties").attr("readonly",true);
            $("#coopquantity").attr("readonly",true);
            $("#coopvalues").attr("readonly",true);
            $("#privatenoofvarieties").attr("readonly",true);
            $("#privatequantity").attr("readonly",true);
            $("#privatevalues").attr("readonly",true);
            $("#jpcnoofvarieties").attr("readonly",true);
            $("#jpcquantity").attr("readonly",true);
            $("#jpcvalues").attr("readonly",true);

        }else if(this.value == "5"){

            $("#govtnoofvarieties").attr("readonly",false);
            $("#govtquantity").attr("readonly",true);
            $("#govtvalues").attr("readonly",false);
            $("#coopnoofvarieties").attr("readonly",false);
            $("#coopquantity").attr("readonly",true);
            $("#coopvalues").attr("readonly",false);
            $("#privatenoofvarieties").attr("readonly",false);
            $("#privatequantity").attr("readonly",true);
            $("#privatevalues").attr("readonly",false);
            $("#jpcnoofvarieties").attr("readonly",false);
            $("#jpcquantity").attr("readonly",true);
            $("#jpcvalues").attr("readonly",false);

        }
    });

    $("#govtnoofvarieties").attr("readonly",false);
    $("#govtquantity").attr("readonly",false);
    $("#govtvalues").attr("readonly",false);
    $("#coopnoofvarieties").attr("readonly",false);
    $("#coopquantity").attr("readonly",false);
    $("#coopvalues").attr("readonly",false);
    $("#privatenoofvarieties").attr("readonly",false);
    $("#privatequantity").attr("readonly",false);
    $("#privatevalues").attr("readonly",false);
    $("#jpcnoofvarieties").attr("readonly",true);
    $("#jpcquantity").attr("readonly",true);
    $("#jpcvalues").attr("readonly",true);
    
</script>
