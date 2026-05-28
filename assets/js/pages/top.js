import $ from 'jquery';
import initSlider from '../modules/slider.js';

import { config } from '../core/config.js';

$(function () {
  initSlider('mainvisual');
  config.isMobile && initSlider('slide', [".c-highlight", false]);
  initSlider('slide', [".c-brands", true, true, 2000]);
  initSlider('slide', [".swiper-product", false]);
  initSlider('slide', [".swiper-product", false]);
  initSlider('slide', [".swiper-hotsale", false, true, 2000]);
});