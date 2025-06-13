let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header');

menu.onclick = () => {
    menu.classList.toggle('fa-times');     // Toggle ikon (misalnya ganti ke X)
    navbar.classList.toggle('active');     // Tampilkan/sembunyikan navbar
};

window.onscroll = () => {
    if (window.scrollY > 0) {
        header.classList.add('active');    // Tambahkan box shadow saat scroll
    } else {
        header.classList.remove('active');
    }

    // Sembunyikan menu saat scroll
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

window.onload = () => {
    if (window.scrollY > 0) {
        header.classList.add('active');
    } else {
        header.classList.remove('active');
    }
};


var swiper = new Swiper(".vehicles-slider", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      grabCursor:true,
      centeredSlides:true,
      autoplay: {
        delay: 9500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        991: {
          slidesPerView: 3,
        },
      },
    });


var swiper = new Swiper(".featured-slider", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      grabCursor:true,
      centeredSlides:true,
      autoplay: {
        delay: 9500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        991: {
          slidesPerView: 3,
        },
      },
    });
   
