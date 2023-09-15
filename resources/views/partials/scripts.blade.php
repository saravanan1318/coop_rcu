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
            $("#privatenoofvarieties").attr("readonly",true);
            $("#privatequantity").attr("readonly",true);
            $("#privatevalues").attr("readonly",true);
            $("#jpcnoofvarieties").attr("readonly",false);
            $("#jpcquantity").attr("readonly",false);
            $("#jpcvalues").attr("readonly",false);

        }else if(this.value == "2"){

            $("#govtnoofvarieties").attr("readonly",true);
            $("#govtquantity").attr("readonly",true);
            $("#govtvalues").attr("readonly",true);
            $("#coopnoofvarieties").attr("readonly",true);
            $("#coopquantity").attr("readonly",true);
            $("#coopvalues").attr("readonly",true);
            $("#privatenoofvarieties").attr("readonly",false);
            $("#privatequantity").attr("readonly",true);
            $("#privatevalues").attr("readonly",false);
            $("#jpcnoofvarieties").attr("readonly",false);
            $("#jpcquantity").attr("readonly",true
            );
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


    $('#sale_id').on('change', function() {

        $("#noofvarieties").val("");
        $("#noofoutlets").val("");
        $("#noofcustomers").val("");
        $("#nooffarmers").val("");
        $("#quantitykilo").val("");
        $("#quantitylitres").val("");
        $("#salesamountphysical").val("");
        $("#salesamountcoopbazaar").val("");

        if(this.value == "1"){

            $("#noofvarieties").attr("readonly",false);
            $("#noofoutlets").attr("readonly",true);
            $("#noofcustomers").attr("readonly",true);
            $("#nooffarmers").attr("readonly",false);
            $("#quantitykilo").attr("readonly",false);
            $("#quantitylitres").attr("readonly",true);
            $("#salesamountphysical").attr("readonly",false);
            $("#salesamountcoopbazaar").attr("readonly",true);

        }else if(this.value == "2"){

            $("#noofvarieties").attr("readonly",false);
            $("#noofoutlets").attr("readonly",true);
            $("#noofcustomers").attr("readonly",true);
            $("#nooffarmers").attr("readonly",false);
            $("#quantitykilo").attr("readonly",false);
            $("#quantitylitres").attr("readonly",false);
            $("#salesamountphysical").attr("readonly",false);
            $("#salesamountcoopbazaar").attr("readonly",true);

        }else if(this.value == "3"){

            $("#noofvarieties").attr("readonly",false);
            $("#noofoutlets").attr("readonly",true);
            $("#noofcustomers").attr("readonly",false);
            $("#nooffarmers").attr("readonly",true);
            $("#quantitykilo").attr("readonly",true);
            $("#quantitylitres").attr("readonly",true);
            $("#salesamountphysical").attr("readonly",false);
            $("#salesamountcoopbazaar").attr("readonly",true);

        }else if(this.value == "4"){

            $("#noofvarieties").attr("readonly",false);
            $("#noofoutlets").attr("readonly",true);
            $("#noofcustomers").attr("readonly",false);
            $("#nooffarmers").attr("readonly",true);
            $("#quantitykilo").attr("readonly",true);
            $("#quantitylitres").attr("readonly",true);
            $("#salesamountphysical").attr("readonly",false);
            $("#salesamountcoopbazaar").attr("readonly",true);


        }else if(this.value == "5"){

            $("#noofvarieties").attr("readonly",false);
            $("#noofoutlets").attr("readonly",false);
            $("#noofcustomers").attr("readonly",true);
            $("#nooffarmers").attr("readonly",true);
            $("#quantitykilo").attr("readonly",true);
            $("#quantitylitres").attr("readonly",false);
            $("#salesamountphysical").attr("readonly",false);
            $("#salesamountcoopbazaar").attr("readonly",true);

        }else if(this.value == "6"){

            $("#noofvarieties").attr("readonly",false);
            $("#noofoutlets").attr("readonly",true);
            $("#noofcustomers").attr("readonly",true);
            $("#nooffarmers").attr("readonly",true);
            $("#quantitykilo").attr("readonly",false);
            $("#quantitylitres").attr("readonly",false);
            $("#salesamountphysical").attr("readonly",false);
            $("#salesamountcoopbazaar").attr("readonly",false);

        }else if(this.value == "7"){

            $("#noofvarieties").attr("readonly",true);
            $("#noofoutlets").attr("readonly",false);
            $("#noofcustomers").attr("readonly",true);
            $("#nooffarmers").attr("readonly",true);
            $("#quantitykilo").attr("readonly",true);
            $("#quantitylitres").attr("readonly",true);
            $("#salesamountphysical").attr("readonly",false);
            $("#salesamountcoopbazaar").attr("readonly",true);

        }
    });

    $('#region_id').on('change', function() {
        $.ajax
        ({
            type:'POST',
            url:'/fetch/circle',
            data: {"region_id":this.value,"_token":"<?php echo csrf_token() ?>"},
            success:function(data) {
               console.log(data.data);

               var html = "<option value=''>SELECT</option>";
               var circle = data.data;
               for(var i=0; i<circle.length; i++){
                    html += '<option value="'+circle[i].id+'">'+circle[i].circle_name+'</option>';
                   // html += '<option value='+circle[i]->id+'>'+circle[i]->circle_name+'</option>';
               }

               $("#circle_id").html(html);
            }
        });
    });
    $('#circle_id').on('change', function() {
        $.ajax
        ({
            type:'POST',
            url:'/fetch/society',
            data: {"region_id":$("#region_id").val(),"circle_id":this.value,"_token":"<?php echo csrf_token() ?>"},
            success:function(data) {
               console.log(data.data);

               var html = "<option value=''>SELECT</option>";
               var society = data.data;
               for(var i=0; i<society.length; i++){
                    html += '<option value="'+society[i].id+'">'+society[i].society_name+'</option>';
                   // html += '<option value='+circle[i]->id+'>'+circle[i]->circle_name+'</option>';
               }

               $("#society_id").html(html);
            }
        });
    });
</script>
