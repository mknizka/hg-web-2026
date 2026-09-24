$( document ).ready(function() {

  $("#nav-icon1").click(function() {
    if($(this).attr('class') == "superopen") {
      $("#nav-icon1").removeClass( "superopen" )
      $("#main_menu").animate({ "right": "-150%" }, 800, "linear");
    } else {
      $("#nav-icon1").addClass( "superopen"  );
      $("#main_menu").animate({ "right": "0px" }, 100, "linear");
    }
  });

  $("#boarding").hide("slow");

  $("#close-btn").click(function() {
    if($(this).attr('class') ==! "superopen") {
      $("#account_info").animate({
        "margin-left": "-500px"
      }, 1000, 'easeOutQuad'),
      $("#close-btn").animate({
        "right": "-38px"
      }, 1000, 'easeOutQuad', function() {
        $("#info_open").addClass( "superopen" ),
        $("#close-btn").addClass( "superopen" )
      });
    } else {
      $("#account_info").animate({
        "margin-left": "0px"
      }, 1000, 'easeOutQuad'),
      $("#close-btn").animate({
        "right": "-45px"
      }, 1000, 'easeOutQuad', function() {
          $("#info_open").removeClass( "superopen" ),
        $("#close-btn").removeClass( "superopen" )
      });
    }
  });

  var height = $(document).height();
  $('#account_info').height(height);

  $("#info_open").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
  });


  // This button will increment the value
  $('.qtyplus').click(function(e) {
    e.preventDefault();
    fieldName = $(this).attr('field');
    var currentVal = parseInt($('input[name='+fieldName+']').val());
    if (!isNaN(currentVal)) {
      if (currentVal < 20) {
        $('input[name='+fieldName+']').val(currentVal + 1);
        $('.qtyminus').val("-").removeAttr('style');
      } else {
        $('.qtyplus').val("+").css('color','#aaa');
        $('.qtyplus').val("+").css('cursor','not-allowed');
      }
    } else {
      $('input[name='+fieldName+']').val(1);
    }
  });

});
// input plus minus buttons

$('.input-number-increment').click(function() {
  var $input = $(this).parents('.input-number-group').find('.input-number');
  var val = parseInt($input.val(), 10);
  $input.val(val + 1);
});

$('.input-number-decrement').click(function() {
  var $input = $(this).parents('.input-number-group').find('.input-number');
  var val = parseInt($input.val(), 10);
  if (val > 0) {
    $input.val(val - 1);
  } else {
    $input.val()
  }
});

$('a').click(function() {
  $("#boarding").show();
});
