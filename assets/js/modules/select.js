export function selectShowroom() {
    let select = $('.js-select-showroom');

    select.change(function (e) {
        let that = $(this);
        let key = that.val();
        let this_content = $(`#showroom-${key}`);

        if (!this_content.hasClass('active')) {
            this_content.addClass('active');
            this_content.siblings().removeClass('active');
        }
    });
}