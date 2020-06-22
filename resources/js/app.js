require("./bootstrap");
require("@fortawesome/fontawesome-free/js/all.js");

("use strict");

$(function() {
  $("input[type='password'][data-eye]").each(function(i) {
    var $this = $(this),
      id = "eye-password-" + i,
      el = $("#" + id);

    $this.wrap(
      $("<div/>", {
        style: "position:relative",
        id: id
      })
    );

    $this.css({
      paddingRight: 60
    });
    $this.after(
      $("<div/>", {
        html: "Show",
        class: "btn btn-primary btn-sm",
        id: "passeye-toggle-" + i
      }).css({
        position: "absolute",
        right: 10,
        top: $this.outerHeight() / 2 - 12,
        padding: "2px 7px",
        fontSize: 12,
        cursor: "pointer"
      })
    );

    $this.after(
      $("<input/>", {
        type: "hidden",
        id: "passeye-" + i
      })
    );

    var invalid_feedback = $this
      .parent()
      .parent()
      .find(".invalid-feedback");

    if (invalid_feedback.length) {
      $this.after(invalid_feedback.clone());
    }

    $this.on("keyup paste", function() {
      $("#passeye-" + i).val($(this).val());
    });
    $("#passeye-toggle-" + i).on("click", function() {
      if ($this.hasClass("show")) {
        $this.attr("type", "password");
        $this.removeClass("show");
        $(this).removeClass("btn-outline-primary");
      } else {
        $this.attr("type", "text");
        $this.val($("#passeye-" + i).val());
        $this.addClass("show");
        $(this).addClass("btn-outline-primary");
      }
    });
  });

  $(".my-login-validation").submit(function() {
    var form = $(this);
    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.addClass("was-validated");
  });
});

(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict

