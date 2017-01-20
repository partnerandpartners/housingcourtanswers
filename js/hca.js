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
  var glossaryOffset = $('#glossary-labels').offset().top;
  console.log(headerHeight);
  $( window ).scroll(function() {
    if (($(window).scrollTop() > headerHeight)) {
      $("header").addClass("bg");
    } else {
      $("header").removeClass("bg");
    }
  });
  //$("li.dropdown:first-child").addClass("dropdown-toggle");

  $('#glossary-labels').affix({
    offset: (glossaryOffset-60)
  });


});



$( window ).scroll(function() {
 console.log($(window).scrollTop());
});
