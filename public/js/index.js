var swiper = new Swiper('.swiper-container', {
    slidesPerView:1,
    loop: true, 
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints:{
        1400: {
            slidesPerView: 3,
            spaceBetween: 0,
        },
        1000: {
          slidesPerView: 2,
          spaceBetween: 0,
      },
    }
  });