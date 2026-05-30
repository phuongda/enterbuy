export default function initPanel() {
  togglePanel();
}

function togglePanel() {
  let btn = $('.js-panel .js-panel-title');

  btn.click(function (e) {
    let that = $(this);
    let content = that.next('.js-panel-content');
    if (!that.hasClass('active')) {
      that.addClass('active');
      content.slideDown();
    } else {
      that.removeClass('active');
      content.slideUp();
    }
  });
}