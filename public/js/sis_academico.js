(function ($) {
  $('.fecha_cal').datepicker({
	format: "yyyy-mm-dd",
    todayBtn: "linked",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    toggleActive: true
  });
  $('[data-toggle="tooltip"]').tooltip()
}( jQuery ));
$(document).ready(function() {
	//------------------------------------------------------------------------------------------------------------------------
	$('.btn_calen').on('click', function() {$(this).parent().parent().find(".fecha_cal").focus();});
	//------------------------------------------------------------------------------------------------------------------------
});