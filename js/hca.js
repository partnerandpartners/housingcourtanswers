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
    if (($(window).scrollTop() > 5)) {
      $("header").addClass("bg");
    } else {
      $("header").removeClass("bg");
    }
  });
  //$("li.dropdown:first-child").addClass("dropdown-toggle");
  if ($('#glossary-labels').length) {
    var glossaryOffset = $('#glossary-labels').offset().top;
    $('#glossary-labels').affix({
      offset: (glossaryOffset-50)
    });
  }



});



$( window ).scroll(function() {
 console.log($(window).scrollTop());
});
