'use strict';

$(document).ready(function(){

  $('.carousel').slick({
    lazyLoad: 'ondemand',
    autoplay: true,
    autoplaySpeed: 4000,
    dots: false,
    slidesToShow: 1,
    infinite: true,
    speed: 600,
    fade: true,
    arrows: false,
    ease: 'linear',
    useCSS: false,
    pauseOnHover: false
  });

  $('.btn-menu').on('click', function(){
    $('.nav').toggleClass('open');
  });

});
