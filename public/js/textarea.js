'use strict';

// When docuemnt is ready:
$(function() {

  $('#content').trumbowyg();

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


  //
  var $imagePreview = $('#image-preview');
  var $imageLinkDiv = $('#image-link');

  var urlExists = function(url, cb){
    jQuery.ajax({
        url:      url,
        dataType: 'text',
        type:     'GET',
        complete:  function(xhr){
            if(typeof cb === 'function')
               cb.apply(this, [xhr.status]);
        }
    });
  }

  var checkImageStatus = function() {
    urlExists( $imageLinkDiv.val(), function(status) {
      if (status === 200 && $imageLinkDiv.val().length > 0) {
        var imageSrc = "<h4>Image Preview</h4><img src='" + $imageLinkDiv.val() + "' class='img-responsive'>"
        $imagePreview.html(imageSrc);
      } else if ($imageLinkDiv.val().length === 0) {
        $imagePreview.html('<h4>Image Preview</h4><h6>No image URL has been given yet.</h6>');
      } else {
        $imagePreview.html('<h4>Image Preview</h4><h6>Image URL is not valid!</h6>');
      }
    });
  }

  // When docuemnt loads
  checkImageStatus();

  // And on subsequnet updates
  $imageLinkDiv.blur(function() {
    checkImageStatus();
  });

  //
  var $hyperError = $('#hyper-error');
  var $linkDiv = $('#link');
  var $hyperContainer = $('#hyper-error-container');

  var fade = function(inputDiv) {
    inputDiv.css('opacity', 1.0);

    // Begin fade after 1.5 seconds
    setTimeout(function() {
      inputDiv.css('opacity', 0.0);
    }, 5000);
  }

  var checkLinkStatus = function() {
    urlExists( $linkDiv.val(), function(status) {
      if (status === 200 && $linkDiv.val().length > 0) {
        $hyperError.html('<div class="hyper-status-good">Hyperlink is valid and will be linked to this blog post\'s title.</div>');
        // $hyperContainer.css('opacity', 1.0);
        fade($hyperContainer);
      } else if ($linkDiv.val().length === 0) {
        $hyperError.html('<div class="hyper-status-none">Hyperlink has been removed and will no longer be included in this blog post.</div>');
        // $hyperContainer.css('opacity', 1.0);
        fade($hyperContainer);
      } else {
        $hyperError.html('<div class="hyper-status-fail">Hyperlink did not validate and will not be added to this blog post!</div>');
        // $hyperContainer.css('opacity', 1.0);
        fade($hyperContainer);
      }
    });
  }

  // And on subsequnet updates
  $linkDiv.blur(function() {
    checkLinkStatus();
  });


});
