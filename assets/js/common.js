import $ from 'jquery';
import Swiper from 'swiper';
import 'swiper/css';

window.$ = window.jQuery = $;
window.Swiper = Swiper;

import initHeader from './modules/header';
import initSlider from './modules/slider.js';
import initTabs from './modules/tabs.js';
import initPanel from './modules/panel.js';

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