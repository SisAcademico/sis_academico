function googleExpandoToggle() {
  $(this).toggleClass('active');
  $(this).next().toggleClass('active');
}
$('.google-expando__icon').on('click', function() {
  googleExpandoToggle.call(this);
  $('.negro').fadeToggle(500);
});
$('.negro').click(function(){
  $('.google-expando__icon').toggleClass('active');
  $('.google-expando__icon').next().toggleClass('active');
  $('.negro').fadeOut(200);
});
$('.expand-pago__icon').on('click', function() {
    $('.google-expando__icon').toggleClass('active');
    $('.google-expando__icon').next().toggleClass('active');
    $('.negro').fadeIn(500);
});

$('#btn2').on('click', function() {
    $('#idboleta').val($('#nro_boleta').val());
});
$('#btn2').click(function(){
    $('.google-expando__icon').toggleClass('active');
    $('.google-expando__icon').next().toggleClass('active');
    $('.negro').fadeOut(200);
});