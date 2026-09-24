$(document).click(function(e) {
  if(!$(e.target).hasClass('dnc') && $('.js-month-cal-result').is(":visible")) {
    $('.js-month-cal-result').fadeOut().html('');
  }
});

$( document ).on( "click", ".js-month-cal", function() {
  if($('.js-month-cal-result').is(":visible") == false) {
    $.post( "/utility/timi/monthcalendar/")
    .done(function( data ) {
      $('.js-month-cal-result').html( data ).fadeIn();
    });
  }
});

$( document ).on( "click", ".close js-closecal", function() {
  $('.js-month-cal-result').fadeOut().html('');
});

$( document ).on( "click", ".js-cngm", function() {
  $.post( "/utility/timi/monthcalendar/", { date: $(this).data('date'), type: 'cngm' })
  .done(function( data ) {
    $('.js-month-cal-result .calmonth').html( data );
  });
});

$( document ).on( "click", ".cm-day", function() {
  $('.js-timi-date').val( $(this).data('date') );
  $('.js-month-cal-result').fadeOut().html('');
  if($('.js-times').is(":visible")) {
    $('.js-times').hide().html('');
    $('.js-times-h2').hide();
  }
  restimes();
});

function refreshBasket() {
  $.post( "/utility/timi/refreshbasket/")
  .done(function( data ) {
    $('.js-basket').fadeOut().html( data ).fadeIn();
  });
}

$( document ).on( "click", "#timi-send", function() {

    if($("#timi-cond").prop('checked'))       {var cond = 1;} else {var cond = 0;}
    if($("#timi-gdpr").prop('checked'))       {var gdpr = 1;} else {var gdpr = 0;}
    if($("#timi-marketing").prop('checked'))  {var marketing = 1;} else {var marketing = 0;}
    $.post( "/utility/timi/bookingsendorder/", {
      timi_name: $('#timi-name').val(),
      timi_surname: $('#timi-surname').val(),
      timi_email: $('#timi-email').val(),
      timi_note: $('textarea#timi-note').val(),
      timi_phone: $('#timi-phone').val(),
      timi_cond: cond,
      timi_gdpr: gdpr,
      timi_marketing: marketing,
      timi_payment: $('#timi-payment').val()
    }).done(function( data ) {

      response = jQuery.parseJSON(data);

      if(response.status == 'blocked') {
        $('#timi-form-info').html(response.response).fadeIn();
        refreshBasket();
        $([document.documentElement, document.body]).animate({
          scrollTop: ($("#timi-form-info").offset().top - 80)
        }, 600);
      } else

      if(response.status == 'error') {
        error = jQuery.parseJSON(response.response);

        if(error[1] == 'timi-name') { $("#timi-name").addClass('timi-red'); } else { $("#timi-name").removeClass('timi-red'); }
        if(error[2] == 'timi-surname') { $("#timi-surname").addClass('timi-red'); } else { $("#timi-surname").removeClass('timi-red'); }
        if(error[3] == 'timi-email') { $("#timi-email").addClass('timi-red'); } else { $("#timi-email").removeClass('timi-red'); }
        if(error[4] == 'timi-cond') { $("#timi-cond-bck").addClass('timi-red-bck'); } else { $("#timi-cond-bck").removeClass('timi-red-bck'); }
        if(error[5] == 'timi-gdpr') { $("#timi-gdpr-bck").addClass('timi-red-bck'); } else { $("#timi-gdpr-bck").removeClass('timi-red-bck'); }
        if(error[6] == 'timi-phone') { $("#timi-phone").addClass('timi-red'); } else { $("#timi-phone").removeClass('timi-red'); }

        $('#timi-form-info').html(error['text']).fadeIn();
        $([document.documentElement, document.body]).animate({
          scrollTop: ($("#timi-form-info").offset().top - 80)
        }, 600);

      } else
      if(response.status == 'true') {

        window.location.replace(response.response);

      } else {

        $('#timi-form').empty();
        $('#timi-form').html(response.response);

      }
    });

});

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
  return regex.test(email);
}

// popup popup
$( document ).on( "click", ".popup", function() {
  $("body").css({"overflow-y":'hidden'});
  $( "#popup" ).fadeIn("fast");
  var type = $(this).data('popup');
  var id = $(this).data('id');
  $.post( "/utility/bookingpopup/", {
    type: type,
    id: id
  }).done(function( data ) {
    $('#js-popup-content').html(data);
    invokeLightgallery();
  });
});

$( document ).on( "click", "#popup-close", function() {
  $("body").removeAttr("style");
  $( "#popup" ).fadeOut("fast", function() { $('#js-popup content').empty(); });
});
