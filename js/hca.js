// Custom JS here
//$('body').scrollspy({ target: '#for-tenants-nav' })
function getOffset(elmnt) {
  var el = elmnt;
  var offsetLeft = el.offset().left;
  var offsetTop = el.offset().top;
  console.log(offsetTop + offsetLeft);
}

$( window ).scroll(function() {
console.log($(window).scrollTop());
});
