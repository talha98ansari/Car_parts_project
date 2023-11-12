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