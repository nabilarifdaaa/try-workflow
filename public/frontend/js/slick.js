$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            },
        ]
    });
});

$(document).ready(function(){
    $('.card-position').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 2500,
        nextArrow: '<div class="button-next"><i class="fas fa-arrow-right"></i></div>',
        prevArrow: '<div class="button-prev"><i class="fas fa-arrow-left"></i></div>',
        dots: false,
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: false,
              }
            },
        ]
    });
    $('.single-item').slick({
        nextArrow: '<div class="button-next"><i class="fas fa-arrow-right"></i></div>',
        prevArrow: '<div class="button-prev"><i class="fas fa-arrow-left"></i></div>',
        centerMode: true,
        centerPadding: '5px',
        variableWidth: true
    });
    $('.center').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 3
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]
      });
});

$(document).ready(function(){
    $('.testimoni-slider').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        variableWidth: true,
        nextArrow: '<div class="button-next"><i class="fas fa-arrow-right"></i></div>',
        prevArrow: '<div class="button-prev"><i class="fas fa-arrow-left"></i></div>',
    });
});

$('#menu-toggle').click(function(){
    $(this).toggleClass('open');
  })
