import { Swiper } from 'swiper';
import { Autoplay, Pagination, Navigation } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

export default function initSlider(key, data) {
  switch (key) {
    case 'mainvisual':
      slideMainvisual();
      break;
    case 'gallery':
      slideGallery();
      break;
    case 'thumb':
      slideThumb();
      break;
    case 'slide':
      slideCenter(data[0], data[1], data[2], data[3]);
      break;
    case 'slidesp':
      slideSPOnly(data[0], data[1], data[2], data[3]);
      break;
    case 'footer-banner':
      slideFooterBanner();
      break;
    case '2row':
      slide2Row(data[0], data[1], data[2], data[3]);
  }
}

function slideFooterBanner() {
  const $el = $('.l-footer-banner .swiper');

  if (!$el.length) return;

  // tránh init lại nhiều lần (rất quan trọng)
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
      el: '.l-footer-banner .swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.l-footer-banner .swiper-button-next',
      prevEl: '.l-footer-banner .swiper-button-prev',
    },
  });

  // mark đã init
  $el.data('swiper-initialized', true);
}