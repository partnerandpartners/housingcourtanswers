// Custom JS here
//$('body').scrollspy({ target: '#for-tenants-nav' })
function getOffset(elmnt) {
  var el = elmnt;
  var offsetLeft = el.offset().left;
  var offsetTop = el.offset().top;
  console.log(offsetTop + offsetLeft);
}

$( document ).ready(function() {
  var headerHeight = $(".full").outerHeight();
  console.log(headerHeight);
  $( window ).scroll(function() {
    if (($(window).scrollTop() > headerHeight)) {
      $("header").addClass("bg");
    } else {
      $("header").removeClass("bg");
    }
  });
  //$("li.dropdown:first-child").addClass("dropdown-toggle");
});



$( window ).scroll(function() {
 console.log($(window).scrollTop());
});
