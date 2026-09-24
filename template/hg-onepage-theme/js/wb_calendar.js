$( document ).on( "click", ".bfc-plus", function() {
  var id = $(this).data('id');
  var input = $('.' + id);
  var value = parseInt(input.val());
  if(value < 4) {
    input.val(value + 1);
    countPersons();
  }
});

$( document ).on( "click", ".bfc-minus", function() {
  var id = $(this).data('id');
  var input = $('.' + id);
  var value = parseInt(input.val());
  if(input.hasClass( "bfc-item-adu" )) {
    var minimum = 1;
  } else {
    var minimum = 0;
  }
  if(value > minimum) {
    input.val(value - 1);
    countPersons();
  }
});

function countPersons() {
  var sum = 0;
  $(".countall").each(function(){
      sum += +$(this).val();
  });
  $("#js-all-pepples").html(sum);
}

$( document ).on( "click", ".js-closepersons", function() {
  $("#js-peoples").fadeToggle( 400, function() {
    if($("#calendar-block").is(":hidden") && $("#js-peoples").is(":hidden")) {
      $( ".pop-bg" ).fadeOut("fast");
    }
  });
});

$( document ).on( "click", ".js-closecalendar", function() {
  $("#calendar-block").fadeToggle( 400, function() {
    if($("#calendar-block").is(":hidden") && $("#js-peoples").is(":hidden")) {
      $( ".pop-bg" ).fadeOut("fast");
    }
  });
});

$( document ).on( "click", ".js-show-calendar", function() {
  $( "#js-peoples" ).hide();
  $( ".pop-bg" ).fadeIn("fast");
  startDay();
  endDay();
  betweenDays();
  $( "#calendar-block" ).fadeToggle( 400, function() {
    if($("#calendar-block").is(":hidden") && $("#js-peoples").is(":hidden")) {
      $( ".pop-bg" ).fadeOut("fast");
    }
  });
});

$( document ).on( "click", ".js-peoples", function() {
  $( ".pop-bg" ).fadeIn("fast");
  $( "#calendar-block" ).hide();
  $( "#js-peoples" ).fadeToggle( 400, function() {
    if($("#calendar-block").is(":hidden") && $("#js-peoples").is(":hidden")) {
      $( ".pop-bg" ).fadeOut("fast");
    }
  } );
});

function startDay() {
  var spanDate = $('#rf-start span').html().split('.');
  date = spanDate[2] + spanDate[1] + spanDate[0];
  $("#js-calendar").find("[data-number='" + date + "']").addClass('startdate');
}

function endDay() {
  var spanDate = $('#rf-end span').html().split('.');
  date = spanDate[2] + spanDate[1] + spanDate[0];
  $("#js-calendar").find("[data-number='" + date + "']").addClass('enddate');
}

function betweenDays() {
  var startDay = $('.startdate').data('number');
  var endDay = $('.enddate').data('number');
  for (var i = startDay; i < endDay; i++) {
    $("#js-calendar").find("[data-number='" + i + "']").addClass('selecteddays');
  }
}

function clearAllDates() {
  $('.selectable').removeClass('startdate enddate selecteddays');
}

// set start and end date

var action = 0;

$( document ).on( "click", ".selectable", function() {

  action += 1;

  if(action == 1) {
    clearAllDates();
    var startDay = $(this).data('number');
    $startDay = startDay;
    $(this).addClass('startdate');
    $('#rf-start span').html($(this).data('date'));
  }

  if(action == 2) {
    var startDay = $('.startdate').data('number');
    var endDay = $(this).data('number');
    if(endDay > startDay) {
      $(this).addClass('enddate');
      $('#rf-end span').html($(this).data('date'));
      betweenDays();
      action = 0;
      $( "#calendar-block" ).fadeToggle( 400, function() {
      $( ".pop-bg" ).fadeOut("fast"); } );
    } else {
      action = 1;
    }
  }

});

// we have start date and finding end date
$( document ).on( "mouseover", ".selectable", function() {
  if(action == 1) {
    $actual = $(this).data('number');
    if($actual > $startDay) {
      $('.selectable').removeClass('selecteddays');
      for (var i = $startDay; i < $actual; i++) {
        $("#js-calendar").find("[data-number='" + i + "']").addClass('selecteddays');
      }
    } else {
      $('.selectable').removeClass('selecteddays');
    }
  }
});

// for walking in calendar
$( document ).on( "click", "#js-cb-next", function() {
  if($("#calendar-wrapper").is(':animated') == false) {
    var position = $('#calendar-wrapper').position();
    var left = position.left;
    var width = $('.month-block').width() + 20;
    var newleft = left - width;
    if(((newleft - width) * -1) < $('#calendar-wrapper').width()) {
      $("#calendar-wrapper").animate({
        left: newleft
      }, 300, function() {
        $('#js-cb-prev').removeClass('disabled');
        if(newleft == width * -13) {
          $('#js-cb-next').addClass('disabled');
        }
      });
    }
  }
});

$( document ).on( "click", "#js-cb-prev", function() {
  if($("#calendar-wrapper").is(':animated') == false) {
    var position = $('#calendar-wrapper').position();
    var left = position.left;
    var width = $('.month-block').width() + 20;
    var newleft = left + width;
    if(left < 0) {
      $("#calendar-wrapper").animate({
        left: left + width
      }, 300, function() {
        $('#js-cb-next').removeClass('disabled');
        if(newleft == 0) {
          $('#js-cb-prev').addClass('disabled');
        }
      });
    }
  }
});

$( document ).on( "click", "#rf-button", function() {
  var checkin = $('#rf-start span').html();
  var checkout = $('#rf-end span').html();
  var persons = '';
  $( ".bfc-i" ).each(function( index ) {
    persons = persons + $(this).val();
  });
  window.location.href='/booking/1/?checkin='+checkin+'&checkout='+checkout+'&persons='+persons+'&result=auto';
});
