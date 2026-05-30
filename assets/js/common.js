import $ from 'jquery';
import Swiper from 'swiper';

import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import 'swiper/css/grid';

window.$ = window.jQuery = $;
window.Swiper = Swiper;

import initHeader from './modules/header';
import initSlider from './modules/slider';
import initTabs from './modules/tabs';
import initPanel from './modules/panel';

$(function () {
  initHeader();
  initSlider('footer-banner');
  initTabs();
  initPanel();
});

// $(function () {
//   const page = document.body.dataset.page;

//   switch (page) {
//     case 'top':
//       initTopPage();
//       break;
//   }
// });