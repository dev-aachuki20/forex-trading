jQuery(".search-icon").click(function($) {
  jQuery(this).toggleClass("open-search-menu");
  jQuery(".search-form").slideToggle();
});


$(document).on('click', '.navbar-nav li', function(){
  $(this).toggleClass('active')
})
$(document).on('click', 'li.nav-item.dropdown.language-dropdown', function(){
  $('li.nav-item.dropdown.language-dropdown ul').toggle(200);
})


jQuery(function($) {
  $('.discription-context').each(function(){
    var show_char = 130;
    var ellipses = "... ";
    var content = $(this).text(); 

    if (content.trim().length > show_char) {
      var a = content.trim().substr(3, show_char);
      var b = content.trim().substr(show_char - content.trim().length).replace('</p>' , ''); 
      var html = a + "<span class='truncated'>" + ellipses + "</span><span class='truncated' style='display:none'>" + b + "</span><a class='read-more' href='#'>View More</a>";

      $(this).html('<p>' + html  + '</p>'); 
    }
  });

  $(".read-more").click(function(e) {
    e.preventDefault();
      $(this).text( ( i , v) => v == "View More" ? "View Less" : "View More"); 
      $(this).closest(".discription-context").find(".truncated").toggle();
  });
});

// nav 
$('.navbar-toggler').click(function(){
  $('.navbar-collapse ul').find('.active').removeClass('active');
})


// show more data 

$(".showDetails-more").click(function () {
  console.log(showDetails-more)
  var $wrapper =$('.showMore-wrapper');
  if($wrapper.hasClass("showDetails-height")) {
    $(".showDetails-more").text("Show less");
  } else {
    $(".showDetails-more").text("Show more");
  }
  $wrapper.toggleClass("showDetails-height");
});

