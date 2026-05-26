import { config } from '../core/config.js';

export default function initHeader() {
  stickyHeader();
  searchHeader();
  // searchForm();
  btnMenuToggle();
  toggleChildMenu();
}

function stickyHeader() {
  let header = config.isMobile ? $('.l-header .l-header-main') : $('.l-header .l-header-cate');
  // let header_height = header.outerHeight();
  let header_height = 0;
  let offset = 0;

  $(window).on('scroll', function () {
    if ($(this).scrollTop() > (header_height + offset)) {
      $('.l-header').addClass('sticky');
    } else {
      $('.l-header').removeClass('sticky');
    }
  });
}

function searchHeader() {
  let btn = $('.l-header .l-nav .nav-btn.btn-search');
  let header = $('.l-header');
  let overlay = $('.overlay');

  btn.click(function (e) {
    e.preventDefault();

    let that = $(this);

    if (!header.hasClass('is-search')) {
      header.addClass('is-search');
      that.children('.c-icon').removeClass('icon-search').addClass('icon-close');
      overlay.addClass('active');
    } else {
      header.removeClass('is-search');
      that.children('.c-icon').removeClass('icon-close').addClass('icon-search');
      overlay.removeClass('active');
    }

    $(document).one('click', function closeMenu(e) {
      if ($('.l-header').has(e.target).length === 0) {
        header.removeClass('is-search');
        that.children('.c-icon').removeClass('icon-close').addClass('icon-search');
        overlay.removeClass('active');
      } else {
        $(document).one('click', closeMenu);
      }
    });
  });
}

function searchForm() {
  $('.search-form').each(function () {
    let form = $(this);
    let append = $(this).find('.search-results');
    let serviceUrl = flatsomeVars.ajaxurl + '?action=flatsome_ajax_search_products';

    $(this).find('.search-field').devbridgeAutocomplete({
      minChars: 3,
      appendTo: append,
      triggerSelectOnValidInput: false,
      serviceUrl: serviceUrl,
      deferRequestBy: parseInt(flatsomeVars.options.search_result_latency),
      onSearchStart: function () {
        $('.btn-submit').removeClass('loading');
        $('.btn-submit').addClass('loading');
      },
      onSelect: function (suggestion) {
        if (suggestion.id != -1) {
          window.location.href = suggestion.url;
        }
      },
      onSearchComplete: function () {
        $('.btn-submit').removeClass('loading');
      },
      beforeRender: function (container) {
        $(container).removeAttr('style');
      },
      formatResult: function (suggestion, currentValue) {
        let html = `<div class="suggestion-item">
          <figure class="c-figure">
            <img src="${suggestion.img}">
          </figure>
          <div class="item-info">
            <h3>${suggestion.value}</h3>
            ${getProductPriceHtml(suggestion.price_data)}
          </div>
        </div>`;

        return html;
      }
    });
  });
}

function btnMenuToggle() {
  let menu = $('.c-menu');

  $('.menu-toggle').click(function () {
    let that = $(this);
    that.addClass('active');
    menu.addClass('is-show');
  });

  $('.menu-close').click(function () {
    let that = $(this);
    that.removeClass('active');
    menu.removeClass('is-show');
  });
}

function toggleChildMenu() {
  let btn_tab = $('.c-childs .item');

  $('.c-childs .item:first-child').addClass('active');
  $('.c-childs-content .item:first-child').addClass('is-show');

  if (config.isMobile) {
    btn_tab.click(function (e) {
      let that = $(this);
      let tab_id = that.attr('data-tab');
      let tab_content = $('#' + tab_id);

      that.addClass('active');
      that.siblings('.item').removeClass('active');
      tab_content.addClass('is-show');
      tab_content.siblings('.item').removeClass('is-show');
    });
  } else {
    btn_tab.hover(function (e) {
      let that = $(this);
      let tab_id = that.attr('data-tab');
      let tab_content = $('#' + tab_id);

      that.addClass('active');
      that.siblings('.item').removeClass('active');
      tab_content.addClass('is-show');
      tab_content.siblings('.item').removeClass('is-show');
    });
  }
}