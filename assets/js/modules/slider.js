import $ from 'jquery';
import Swiper from 'swiper';

import { Autoplay, Pagination, Navigation } from 'swiper/modules';

export default function initSlider(key, data) {
  switch (key) {
    case 'mainvisual':
      slideMainvisual();
      break;
    case 'slide':
      slideCenter(data[0], data[1], data[2], data[3]);
      break;
    case 'footer-banner':
      slideFooterBanner();
      break;
    // case 'gallery':
    //   slideGallery();
    //   break;
    // case 'thumb':
    //   slideThumb();
    //   break;
    // case 'slidesp':
    //   slideSPOnly(data[0], data[1], data[2], data[3]);
    //   break;
    // case '2row':
    //   slide2Row(data[0], data[1], data[2], data[3]);
    //   break;
  }
}

function slideMainvisual() {
  let class_name = '.c-mainvisual';
  const $el = $(`${class_name} .swiper`);

  if (!$el.length) return;

  if ($el.data('swiper-initialized')) return;

  const swiper = new Swiper($el[0], {
    modules: [Autoplay, Pagination, Navigation],
    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    speed: 2000,
    pagination: {
      el: `${class_name} .swiper-pagination`,
      clickable: true,
    },
    navigation: {
      nextEl: `${class_name} .swiper-button-next`,
      prevEl: `${class_name} .swiper-button-prev`,
    },
  });

  $el.data('swiper-initialized', true);
}

function slideCenter(class_name, center_slide = true, auto_play = false, slde_speed = 500) {
  const $el = $(`${class_name} .swiper`);

  if (!$el.length) return;

  if ($el.data('swiper-initialized')) return;

  switch (class_name) {
    case '.c-brands':
    case '.c-press':
      let parent_width = $(class_name).width();
      let child_width = $el.width();

      if (!isMobile && child_width < parent_width) return;

      var swiper = new Swiper(`${class_name} .swiper`, {
        modules: [Autoplay],
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: auto_play ? { delay: 2000, disableOnInteraction: false } : false,
        speed: slde_speed,
        slidesPerView: 'auto',
        spaceBetween: 0,
        centeredSlides: center_slide,
        freeMode: false,
        touchRatio: 0.2,
      });
      break;
    case '.c-ctas':
      var swiper = new Swiper(`${class_name} .swiper`, {
        modules: [Autoplay],
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: auto_play ? { delay: 5000, disableOnInteraction: false } : false,
        speed: slde_speed,
        slidesPerView: 'auto',
        spaceBetween: 0,
        centeredSlides: false,
        freeMode: false,
        touchRatio: 0.2,
        breakpoints: {
          769: {
            centeredSlides: center_slide,
          },
        },
      });
      break;
    default:
      var swiper = new Swiper(`${class_name} .swiper`, {
        modules: [Autoplay, Pagination, Navigation],
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: auto_play ? { delay: 2000, disableOnInteraction: false } : false,
        speed: slde_speed,
        slidesPerView: 2.2,
        spaceBetween: 10,
        breakpoints: {
          769: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
        },
        navigation: {
          nextEl: `${class_name} .swiper-button-next`,
          prevEl: `${class_name} .swiper-button-prev`,
        },
        pagination: {
          el: `${class_name} .swiper .swiper-pagination`,
          clickable: true,
        },
      });
      break;
  }

  $el.data('swiper-initialized', true);
}

function slideFooterBanner() {
  let class_name = '.l-footer-banner';
  const $el = $(`${class_name} .swiper`);

  if (!$el.length) return;

  if ($el.data('swiper-initialized')) return;

  const swiper = new Swiper($el[0], {
    modules: [Autoplay, Pagination, Navigation],
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    speed: 2000,
    pagination: {
      el: `${class_name} .swiper-pagination`,
      clickable: true,
    },
    navigation: {
      nextEl: `${class_name} .swiper-button-next`,
      prevEl: `${class_name} .swiper-button-prev`,
    },
  });

  $el.data('swiper-initialized', true);
}