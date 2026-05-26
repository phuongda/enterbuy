export default function initPanel() {
  togglePanel();
}

function togglePanel() {
  let btn = $('.c-panel .l-title');

  btn.click(function (e) {
    let that = $(this);
    let content = that.next('.l-content');
    if (!that.hasClass('active')) {
      that.addClass('active');
      content.slideDown();
    } else {
      that.removeClass('active');
      content.slideUp();
    }
  });
}