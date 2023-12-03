// PRE LOADER JS

setTimeout(function() {
    $('#ctn-preloader').addClass('loaded');
    // Una vez haya terminado el preloader aparezca el scroll
    $('body').removeClass('no-scroll-y');

    if ($('#ctn-preloader').hasClass('loaded')) {
      // Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
      $('#preloader').delay(1000).queue(function() {
        $(this).remove();
      });
    }
}, 600);

$('.banner-carousel').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:1
      },
      1000:{
          items:1
      }
  }
})

$('.testimonial-carousel').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  dots: false,
  responsive:{
      0:{
          items:1
      },
      768:{
          items:2
      },
      1000:{
          items:3
      }
  }
})

$('.product-carousel').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  responsive:{
      0:{
          items:1
      },
      768:{
          items:2
      },
      1000:{
          items:3
      }
  }
})

$(document).ready(function() {
  $('.js-example-basic-single').select2();
});

$('#new-password, #confirm-new-password').on('keyup', function() {
    if ($('#new-password').val() == '' || $('#new-password').val() == null) {
        $('#message').html('').css('color', 'green');
        $("#password").prop('disabled', true);

        return;
    }
    if ($('#new-password').val() == $('#confirm-new-password').val()) {
        $(".password").removeClass("common");

        $("#password").prop('disabled', false);
        $('#message').html('Matching').css('color', 'green');


    } else {
        $(".password").addClass("common");

        $('#message').html('Not Matching').css('color', 'red');
        $("#password").prop('disabled', true);

        // $('.submit-button').prop('disabled', true);
    }
});
$(document).ready(function () {
    // Attach a click event to the Search button
    $("#searchButton").on("click", function (e) {
        // Prevent the default form submission behavior
        e.preventDefault();

        // Get selected values from the dropdowns
        var modelId = $("#model").val();
        var state = $("#state").val();
        var x = '/view/part?';


        if(modelId != null){
            var x = x + 'model=' + modelId;
        }
        if(state != null){
            var x = x + '&state=' + state;
        }
        window.location.href  = x ;

    });
    $(".searchButton2").on("click", function (e) {
        // Prevent the default form submission behavior
        e.preventDefault();

        // Get selected values from the dropdowns
        var vehicle_type = $(".vehicle_type").val();
        var statechange = $(".statechange").val();
        var manufacturer = $(".manufacturer").val();
        var price = $(".price").val();

        var x = '/view/part?';

        if(vehicle_type != null){
            var x = x + 'vehicle_type=' + vehicle_type;
        }
        if(statechange != null){
            var x = x + '&state=' + statechange;
        }
        if(price != null){
            var x = x + '&price=' + price;
        }
        if(manufacturer != null){
            var x = x + '&manufacturer=' + manufacturer;
        }
        window.location.href  = x ;

    });
});
