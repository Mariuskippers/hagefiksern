/**
 * Hagefiksern Theme - Main JavaScript file
 */

(function($) {
  'use strict';
  
  /**
   * Document ready function
   */
  $(document).ready(function() {
    // Initialize components
    initStickyHeader();
    initSmoothScroll();
    initParallax();
    initAnimations();
    initMobileMenu();
  });

  /**
   * Handle sticky header functionality
   */
  function initStickyHeader() {
    var header = $('.site-header');
    var scrollPosition = 50;
    
    // Add scrolled class on page load if needed
    if ($(window).scrollTop() > scrollPosition) {
      header.addClass('scrolled');
    }
    
    // Add/remove scrolled class on scroll
    $(window).scroll(function() {
      if ($(this).scrollTop() > scrollPosition) {
        header.addClass('scrolled');
      } else {
        header.removeClass('scrolled');
      }
    });
  }
  
  /**
   * Handle smooth scrolling for anchor links
   */
  function initSmoothScroll() {
    // Handle smooth scroll links
    $('a.smooth-scroll, .main-navigation a[href^="#"]').on('click', function(e) {
      const target = $(this.hash);
      
      if (target.length) {
        e.preventDefault();
        
        $('html, body').animate({
          scrollTop: target.offset().top - 80
        }, 800);
        
        // Update URL hash without jumping
        if (history.pushState) {
          history.pushState(null, null, this.hash);
        } else {
          location.hash = this.hash;
        }
        
        // If mobile menu is open, close it
        if ($('.menu-container').hasClass('active')) {
          $('.menu-container').removeClass('active');
          $('.menu-toggle').removeClass('active');
        }
      }
    });
  }
  
  /**
   * Initialize parallax effect on elements
   */
  function initParallax() {
    // Apply parallax effect to elements with parallax class
    if (window.innerWidth > 768) {
      $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        
        $('.parallax').each(function() {
          var speed = $(this).data('speed') || 0.2;
          var offset = $(this).offset().top;
          var yPos = -(scrollTop - offset) * speed;
          
          $(this).css('background-position', 'center ' + yPos + 'px');
        });
      });
    }
  }
  
  /**
   * Initialize on-scroll animations
   */
  function initAnimations() {
    // Add .fade-in class to elements that should animate on scroll
    $('.section-title, .service-card, .about-image, .contact-form-container, .post-inner').addClass('fade-in');
    
    // Check if elements are visible on initial load
    checkElementsVisibility();
    
    // Check elements on scroll
    $(window).scroll(function() {
      checkElementsVisibility();
    });
    
    function checkElementsVisibility() {
      var windowHeight = $(window).height();
      var windowTopPosition = $(window).scrollTop();
      var windowBottomPosition = windowTopPosition + windowHeight;
      
      $('.fade-in').each(function() {
        var elementHeight = $(this).outerHeight();
        var elementTopPosition = $(this).offset().top;
        var elementBottomPosition = elementTopPosition + elementHeight;
        
        // Check if element is visible in viewport
        if (
          (elementBottomPosition >= windowTopPosition && elementTopPosition <= windowBottomPosition) ||
          (elementTopPosition <= windowTopPosition && elementBottomPosition >= windowBottomPosition)
        ) {
          $(this).addClass('visible');
        }
      });
    }
  }
  
  /**
   * Handle mobile menu functionality
   */
  function initMobileMenu() {
    var menuToggle = $('.menu-toggle');
    var menuContainer = $('.menu-container');
    
    menuToggle.on('click', function() {
      $(this).toggleClass('active');
      menuContainer.toggleClass('active');
    });
    
    // Close menu when clicking outside
    $(document).on('click', function(e) {
      if (!$(e.target).closest('.main-navigation').length) {
        menuToggle.removeClass('active');
        menuContainer.removeClass('active');
      }
    });
    
    // Handle window resize
    $(window).resize(function() {
      if (window.innerWidth > 768) {
        menuToggle.removeClass('active');
        menuContainer.removeClass('active');
      }
    });
  }
  
})(jQuery);