function googleExpandoToggle() {
  $(this).toggleClass('active');
  $(this).next().toggleClass('active');
}
$('.google-expando__icon').on('click', function() {
  $('.google-expando__icon').css('z-index','100');
  googleExpandoToggle.call(this);
  $('.negro').fadeToggle(500);
  $('.pdfss').css('z-index','1');
});

$('.pdfss').on('click', function() {
  $('.pdfss').css('z-index','100');
  googleExpandoToggle.call(this);
  $('.negros').fadeToggle(500);
  $('.google-expando__icon').css('z-index','1');
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