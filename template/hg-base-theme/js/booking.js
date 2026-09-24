$(document).ready(function(){
    $('#nav-icon1').click(function(){
        $(this).toggleClass('open');
        $('#booking-menu').toggleClass('open');
    });
});

  $('.input-number-increment').click(function() {
    var $input = $(this).parents('.input-number-group').find('.input-number');
    var val = parseInt($input.val(), 10);
    $input.val(val + 1).trigger("change");
  });

  $('.input-number-decrement').click(function() {
    var $input = $(this).parents('.input-number-group').find('.input-number');
    var val = parseInt($input.val(), 10);
    if (val > 1) {

      $input.val(val - 1).trigger("change");
    }
    else {
      $input.val(0).trigger("change");
    }

  });
