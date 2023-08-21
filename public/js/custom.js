jQuery(".search-icon").click(function($) {
  jQuery(this).toggleClass("open-search-menu");
  jQuery(".search-form").slideToggle();
});


$(document).on('click', '.navbar-nav .dropdown', function(){
  $(this).addClass('active').siblings().removeClass('active')
})