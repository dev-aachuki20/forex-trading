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

/*
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
});*/

// nav 
$('.navbar-toggler').click(function(){
  $('.navbar-collapse ul').find('.active').removeClass('active');
})


// show more data 
$(document).ready(function() {
  $(".showDetails-more").click(function () {
    // console.log('.showDetails-more')
    var $wrapper =$('.showMore-wrapper');
    if($wrapper.hasClass("showDetails-height")) {
      $(".showDetails-more").text("Show less");
    } else {
      $(".showDetails-more").text("Show more");
    }
    $wrapper.toggleClass("showDetails-height");
  });

});

// twitter sharing 

function shareOnTwitter() {
  const navUrl =
    'https://twitter.com/intent/tweet?text= How Do I Get Started As A Funded Trader?';
  window.open(navUrl, '_blank');
}

const tweet = document.getElementById('twitter');
if(tweet){
  tweet.addEventListener('click', shareOnTwitter);
}

// top bottom 

// Get the button element by its ID
var btn = document.getElementById("topup");

// Add a scroll event listener to the window
window.addEventListener("scroll", function() {
    if (window.pageYOffset > 300) {
        btn.classList.add("show");
    } else {
        btn.classList.remove("show");
    }
});

// Add a click event listener to the button
btn.addEventListener("click", function(e) {
    e.preventDefault();
    // Scroll to the top of the page
    window.scrollTo({
        top: 0,
        behavior: "smooth" // For smooth scrolling (if supported)
    });
});

// end 