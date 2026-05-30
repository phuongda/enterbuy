import $ from 'jquery';

import { config } from '../core/config';

import initSlider from '../modules/slider';
import { selectShowroom } from '../modules/select';

$(function () {
  initSlider('mainvisual');
  config.is_mobile && initSlider('slide', [".c-highlight", false]);
  initSlider('slide', [".c-brands", true, true, 2000]);
  initSlider('slide', [".swiper-hotsale", false, true, 2000]);
  initSlider('slide', [".swiper-product", false]);
  initSlider('slide', [".c-press", false, true, 2000]);
  initSlider('2row', [".c-videos", false]);
  initSlider('slide', [".c-news", false]);
  initSlider('gallery');
  selectShowroom();
});