'use strict';

// When docuemnt is ready:
$(function() {


  /*
   *  Make the flash message dissapear after a few seconds
   *
   *
  */
  // Jquery obj for flash-message div
  var $flashDiv = $('div.flash-message');

  // Begin fade after 3 seconds
  setTimeout(function() {
    $flashDiv.css('opacity', 0.0);
  }, 2000);

  // Hide flash message completely after 6 seconds (3 sec to begin fade, 3 sec for fade)
  setTimeout(function() {
    $flashDiv.hide();
  }, 5001);

  // Hide the flash message if the user hovers over the div
  $flashDiv.hover(function() {
    $flashDiv.hide();
  });

  /*
   *  Set content field as a WYSIWYG editor
   *
   *
  */
  $('#content').trumbowyg(); // TODO: make this only run on select pages to avoid errors



});
