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

  var $trumbowygEditor = $('.trumbowyg-editor');
  var $trumbowygBox = $('.trumbowyg-box');

  $trumbowygBox.focus(function() {
    $trumbowygBox.css('border-color', '#66afe9');
    $trumbowygBox.css('outline', 0);
    $trumbowygBox.css('box-shadow', 'inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)');
  });

  $trumbowygBox.blur(function() {
    $trumbowygBox.css('border-color', '#ddd');
    $trumbowygBox.css('outline', 1);
    $trumbowygBox.css('box-shadow', 'inset 0 0 0 rgba(0,0,0,0.0),0 0 0 rgba(0,0,0,0.0)');
  });

  $trumbowygEditor.focus(function() {
    $trumbowygBox.triggerHandler('focus');
  });

  $trumbowygEditor.blur(function() {
    $trumbowygBox.triggerHandler('blur');
  });

});
