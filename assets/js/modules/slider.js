import $ from 'jquery';
import Swiper from 'swiper';

import { config } from '../core/config';
import { Autoplay, Pagination, Navigation, Grid } from 'swiper/modules';

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
    case '2row':
      slide2Row(data[0], data[1], data[2], data[3]);
      break;
    case 'gallery':
      slideGallery();
      break;
    // case 'thumb':
    //   slideThumb();
    //   break;
    // case 'slidesp':
    //   slideSPOnly(data[0], data[1], data[2], data[3]);
    //   break;
  }
}

function slideMainvisual() {
  let class_name = '.c-mainvisual';
  let class_swiper = `${class_name} .swiper`;
  const $el = $(class_swiper);

  if (!$el.length) return;

  if ($el.data('swiper-initialized')) return;

  let slideCount = $el.find('.swiper-slide').length;
  let slidesPerView = 1;

  const swiper = new Swiper(class_swiper, {
    modules: [Autoplay, Pagination, Navigation],
    loop: slideCount > slidesPerView,
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
  let class_swiper = `${class_name} .swiper`;
  const $el = $(class_swiper);

  if (!$el.length) return;

  if ($el.data('swiper-initialized')) return;

  let slideCount;
  let slidesPerView;

  switch (class_name) {
    case '.c-brands':
    case '.c-press':
      let parent_width = $(class_name).width();
      let child_width = $el.width();

      if (!config.is_mobile && child_width < parent_width) return;

      slideCount = $el.find('.swiper-slide').length;
      slidesPerView = config.is_mobile ? 2 : 5;

      const swiper = new Swiper(class_swiper, {
        modules: [Autoplay],
        loop: slideCount > slidesPerView,
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
    case '.c-highlight':
      slideCount = $el.find('.swiper-slide').length;
      slidesPerView = config.is_mobile ? 2 : 3;

      const swiper2 = new Swiper(class_swiper, {
        modules: [Autoplay],
        loop: slideCount > slidesPerView,
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
      slideCount = $el.find('.swiper-slide').length;
      slidesPerView = config.is_mobile ? 2.2 : 4;

      const swiper3 = new Swiper(class_swiper, {
        modules: [Autoplay, Pagination, Navigation],
        loop: slideCount > slidesPerView,
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

function slide2Row(class_name, center_slide = true, auto_play = false, slde_speed = 500) {
  let class_swiper = `${class_name} .swiper`;
  const $el = $(class_swiper);

  if (!$el.length) return;

  if ($el.data('swiper-initialized')) return;

  const swiper = new Swiper(class_swiper, {
    modules: [Autoplay, Pagination, Navigation, Grid],
    autoplay: auto_play ? { delay: 2000, disableOnInteraction: false } : false,
    speed: slde_speed,
    centeredSlides: false,
    grid: {
      rows: 2,
      fill: 'row',
    },
    breakpoints: {
      0: {
        slidesPerView: 2.2,
        spaceBetween: 10,
        grid: {
          rows: 1,
        },
      },
      769: {
        slidesPerView: 2,
        spaceBetween: 20,
        grid: {
          rows: 2,
        },
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

  $el.data('swiper-initialized', true);
}

function slideGallery() {
  let class_name = '.c-gallery';
  let class_swiper = `${class_name} .swiper`;
  const $el = $(class_swiper);

  if (!$el.length) return;

  if ($el.data('swiper-initialized')) return;

  const swiper = new Swiper(class_swiper, {
    modules: [Autoplay, Pagination, Navigation],
    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    speed: 2000,
    spaceBetween: 40,
    breakpoints: {
      769: {
        spaceBetween: 50,
      },
    },
    navigation: {
      nextEl: class_name + " .swiper-button-next",
      prevEl: class_name + " .swiper-button-prev",
    },
    pagination: {
      el: class_name + " .swiper .swiper-pagination",
      clickable: true,
    },
  });

  $el.data('swiper-initialized', true);
}

function slideFooterBanner() {
  let class_name = '.l-footer-banner';
  let class_swiper = `${class_name} .swiper`;
  const $el = $(class_swiper);

  if (!$el.length) return;

  if ($el.data('swiper-initialized')) return;

  let slideCount = $el.find('.swiper-slide').length;
  let slidesPerView = 1;

  const swiper = new Swiper(class_swiper, {
    modules: [Autoplay, Pagination, Navigation],
    loop: slideCount > slidesPerView,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    speed: 2000,
    pagination: {
      el: `${class_name} .swiper .swiper-pagination`,
      clickable: true,
    },
    navigation: {
      nextEl: `${class_name} .swiper-button-next`,
      prevEl: `${class_name} .swiper-button-prev`,
    },
  });

  $el.data('swiper-initialized', true);
}