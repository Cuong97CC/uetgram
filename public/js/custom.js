$(document).ready(function () {

  'use strict';
  // ------------------------------------------------------- //
  // Search Box
  // ------------------------------------------------------ //
  $('#search').on('click', function (e) {
      e.preventDefault();
      $('.search-box').fadeIn();
  });
  $('.dismiss').on('click', function () {
      $('.search-box').fadeOut();
  });
  // ------------------------------------------------------- //
  // Sidebar Functionality
  // ------------------------------------------------------ //
  $('#toggle-btn').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('active');

    $('.side-navbar').toggleClass('shrinked');
    $('.content-inner').toggleClass('active');

    if ($(window).outerWidth() > 1183) {
      if ($('#toggle-btn').hasClass('active')) {
        $('.navbar-header .brand-small').hide();
        $('.navbar-header .brand-big').show();
      } else {
        $('.navbar-header .brand-small').show();
        $('.navbar-header .brand-big').hide();
      }
    }

    if ($(window).outerWidth() < 1183) {
      $('.navbar-header .brand-small').show();
    }
  });

});
