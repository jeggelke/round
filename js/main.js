$(document).ready(function(){
  toggleNavVisibility();
  stickyBar();
});

$(window).on('resize', function(){
  toggleNavVisibility();
  stickyBar();
})



function toggleNavVisibility(){
  container = document.getElementById( 'site-navigation' );
  if ( ! container ) {
    return;
  }

  button = container.getElementsByTagName( 'button' )[0];
  if ( 'undefined' === typeof button ) {
    return;
  }

  if (!window.matchMedia('(max-width: 768px)').matches)
  {
    $('#nav-button').hide();
    $('#primary-menu').attr('aria-expanded', true);
    if ($('.menu-mainnav-container.toggled').length == 0)
    {
      button.click(); //open menu
    }
  }
  else {
    $('#nav-button').show();
    $('#primary-menu').attr('aria-expanded', false);
    if ($('.menu-mainnav-container.toggled').length > 0)
    {
      $('.menu-mainnav-container').attr('class', 'menu-mainnav-container collapse'); //close menu
    }
  }

  if (window.matchMedia('(width: 768px)').matches)
  {
    $('.menu-mainnav-container').attr('class', 'menu-mainnav-container collapse');
  }
  else
  {
    $('.menu-mainnav-container').attr('class', 'menu-mainnav-container toggled');
  }
}

function stickyBar(){
  //scrolling Header
  // When the user scrolls the page, execute myFunction
  window.onscroll = function() {myFunction()};

  // Get the header
  var header = document.getElementById("site-navigation");
  var contentArea = document.getElementById("content");
  var topRow = document.getElementById("top-row");

  // Get the offset position of the navbar
  var sticky = header.offsetTop;

  // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
  function myFunction() {
    if (window.pageYOffset >= sticky) {
      header.classList.add("sticky");
      contentArea.classList.add("content-area-added-padding");
  //    topRow.classList.add('top-row-added-margin');
    } else {
      header.classList.remove("sticky");
      contentArea.classList.remove("content-area-added-padding");
  //    topRow.classList.remove('top-row-added-margin');
    }
  }
}

$(document).ready(function(){

  container = document.getElementById( 'site-navigation' );
  if ( ! container ) {
    return;
  }

  button = container.getElementsByTagName( 'button' )[0];
  if ( 'undefined' === typeof button ) {
    return;
  }

  // Select all links with hashes
  $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      console.log(button.id);
      if ($('#' + button.id + ':visible').length > 0)
      {
        button.click(); //close menu
      }
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top -60
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
      }
    });

    $('#primary').click(function(){
      if($('#nav-button').attr('aria-expanded') == 'true')
      {
        $('#nav-button').click();
      }
      else
      {
        console.log('not clicked');
      }
    });
})
