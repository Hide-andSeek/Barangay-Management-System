// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    'use strict';

    // Back to top smooth scroll

    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
    });


    // Scroll to top animated button

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scroll-up').fadeIn();
        } else {
            $('.scroll-up').fadeOut();
        }
    });

   

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top'
    })

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });


    // Script for Portfolio Section

    $(document).ready(function() {

        // Slider top 


        $('#myCarousel-one').carousel({
            interval: 9000, //changes the speed
            keyboard: false,
        })


        //Clients carousel

        $('#myCarousel-two').carousel({
            interval: 4000, //changes the speed
            keyboard: false,
        })

        //Barangay official carousel

        $('#myCarousel-three').carousel({
            interval: 8000, //changes the speed
            keyboard: false,
        })

    });

    /* Animated Titles of Sections*/

    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    $(window).scroll(function() {
        $('.section-heading, .section-subheading').each(function() {
            if (isScrolledIntoView(this) === true) {
                $(this).addClass('animated fadeInUp')
            }
        });


    });



    /* Header shrink function*/

    $(function() {
        var shrinkHeader = 350;
        $(window).scroll(function() {
            var scroll = getCurrentScroll();
            if (scroll >= shrinkHeader) {
                $('.navbar').addClass('navbar-shrink');
            } else {
                $('.navbar').removeClass('navbar-shrink');
            }
        });

        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }
    });

  

    /*-- Fuction for Login Modal Form --*/
    var modal = document.getElementById('id01');
    

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }    
	});

   
    function openForm(evt, formName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("form");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" form-active", "");
        }
        document.getElementById(formName).style.display = "block";
        evt.currentTarget.className += " form-active";
      }

      // Date & Time

      function display_c(){
        var refresh = 1000;
        timeSet = setTimeout('display_ct()', refresh)
      }
  
  
      function display_ct(){
      var dt = new Date();
      document.getElementById('date-time').innerHTML=dt;
      display_c();
      }


jQuery(document).ready(function() {
    // for hover dropdown menu
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    });
    // slick slider call 
    $('.slick_slider').slick({
        dots: true,
        infinite: true,
        speed: 800,
        slidesToShow: 1,
        slide: 'div',
        autoplay: true,
        autoplaySpeed: 5000,
        cssEase: 'linear'
    });
    // latest post slider call 
    $('.latest_postnav').newsTicker({
        row_height: 64,
        speed: 800,
        prevButton: $('#prev-button'),
        nextButton: $('#next-button')
    });
    jQuery(".fancybox-buttons").fancybox({
        prevEffect: 'none',
        nextEffect: 'none',
        closeBtn: true,
        helpers: {
            title: {
                type: 'inside'
            },
            buttons: {}
        }
    });
    // jQuery('a.gallery').colorbox();
    //Check to see if the window is top if not then display button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    //Click event to scroll to top
    $('.scrollToTop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('.tootlip').tooltip();
    $("ul#ticker01").liScroll();
});

// Get the container element
var btnContainer = document.getElementById("myDIV");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("btnhover");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("activehover");
    current[0].className = current[0].className.replace(" activehover", "");
    this.className += " activehover";
});
}


// For Request Document

               