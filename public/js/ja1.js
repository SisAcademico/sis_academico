function googleExpandoToggle() {
  $(this).toggleClass('active');
  $(this).next().toggleClass('active');
}
$('.google-expando__icon').on('click', function() {
  googleExpandoToggle.call(this);
  $('.negro').fadeIn(500);
});
$('.negro').click(function(){
  $('.google-expando__icon').toggleClass('active');
  $('.google-expando__icon').next().toggleClass('active');
  $('.negro').fadeOut(200);
});