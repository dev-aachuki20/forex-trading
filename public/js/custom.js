jQuery(".search-icon").click(function($) {
  jQuery(this).toggleClass("open-search-menu");
  jQuery(".search-form").slideToggle();
});


$(document).on('click', '.navbar-nav .dropdown', function(){
  $(this).addClass('active').siblings().removeClass('active')
})


jQuery(function($) {
  $('.discription-context').each(function(){
    var show_char = 150;
    var ellipses = "... ";
    var content = $(this).html(); 

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