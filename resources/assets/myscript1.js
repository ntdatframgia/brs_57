$( document ).ready(function() {
    $('.fixsome').delay(3000).slideUp();
     $('#datepicker').datepicker({
      autoclose: true,
      dateFormat: 'dd-mm-yy'
    });
});
