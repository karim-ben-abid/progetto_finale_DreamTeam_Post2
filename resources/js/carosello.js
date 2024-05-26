// <!-- Initialize Swiper -->
  
    const swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
    let swiperSlide = document.querySelectorAll('.swiper-slide')
    if (window.innerWidth < 600) {
      swiperSlide.forEach(slide =>{
        slide.classList.add('w-100')
        slide.classList.remove('w-50')
      })
      swiper.update()
    }else{
      swiperSlide.forEach(slide =>{
        slide.classList.remove('w-100')
        slide.classList.add('w-50')
      })
      swiper.update()
    }
    
