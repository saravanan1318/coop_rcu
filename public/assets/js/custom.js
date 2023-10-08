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
