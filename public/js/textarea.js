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

  $imageLinkDiv.blur(function() {
    urlExists( $imageLinkDiv.val(), function(status) {
      if (status === 200) {
        var imageSrc = "<p>Image Preview</p><img src='" + $imageLinkDiv.val() + "' class='img-responsive'>"
        $imagePreview.html(imageSrc);
      } else if ($imageLinkDiv.val().length === 0) {
        // Do nothing
      } else {
        $imagePreview.html('<p class="btn btn-default">Image url is not valid!</p>');
      }
    });
  });


});
