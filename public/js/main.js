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

  // Begin fade after 1.5 seconds
  setTimeout(function() {
    $flashDiv.css('opacity', 0.0);
  }, 2500);

  // Hide flash message completely after 3.5 seconds (2.5 sec to begin fade, 1 sec for css fade)
  setTimeout(function() {
    $flashDiv.hide();
  }, 3500);

});
