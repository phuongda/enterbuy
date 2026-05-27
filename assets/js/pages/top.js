import $ from 'jquery';
import initSlider from '../modules/slider.js';

$(function () {
  initSlider('mainvisual');
  initSlider('slide', [".swiper-product", false]);
});