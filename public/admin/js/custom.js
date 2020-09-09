
    (function () {
  // Display the image to be uploaded.
  $('#dvd_image').on('change', function (e) {
    return readURL(this);
  });

  this.readURL = function (input) {
    var reader;

    // Read the contents of the image file to be uploaded and display it.

    if (input.files && input.files[0]) {
      reader = new FileReader();
      reader.onload = function (e) {
        var $preview;
        $('.image_to_upload').attr('src', e.target.result);
        $preview = $('.preview');
        if ($preview.hasClass('hide')) {
          return $preview.toggleClass('hide');
        }
      };
      return reader.readAsDataURL(input.files[0]);
    }
  };

}).call(this);

  
        (function($) {
            "use strict";
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#dvd_image').attr('src', e.target.result);
                    $('#dvd_image').hide();
                    $('#dvd_image').fadeIn(650);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#dvd_image2').attr('src', e.target.result);
                    $('#dvd_image2').hide();
                    $('#dvd_image2').fadeIn(650);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#dvd_image3').attr('src', e.target.result);
                    $('#dvd_image3').hide();
                    $('#dvd_image3').fadeIn(650);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file-input").change(function() {
            readURL(this);
        });
        $("#file-input2").change(function() {
            readURL2(this);
        });
        $("#file-input3").change(function() {
            readURL3(this);
        });
        })(jQuery);
    