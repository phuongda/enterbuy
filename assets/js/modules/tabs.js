import { config } from '../core/config';

export default function initTabs() {
    togglecTabs();
}

function togglecTabs() {
    let btn_tab = $('.c-tabs .item');

    btn_tab.click(function (e) {
        let that = $(this);
        let tab_index = that.attr('data-tab');

        if (that.parents('.l-videos').length > 0 && !config.is_mobile) {
            let tab_content = that.parents('.c-tabs').siblings('.c-tab-wrap').children('#tab' + tab_index);
            let first_tab_content = that.parents('.c-tabs').siblings('.c-tab-wrap').children('#tab0');

            if (!tab_content.hasClass('is-show')) {
                that.addClass('active');
                that.siblings('.item').removeClass('active');
                tab_content.addClass('is-show');
                tab_content.siblings('.c-tab-contents').removeClass('is-show');
            } else {
                that.removeClass('active');
                that.siblings('.item').removeClass('active');
                tab_content.removeClass('is-show');
                first_tab_content.addClass('is-show').siblings('.c-tab-contents').removeClass('is-show');
            }
        } else {
            let tab_content = that.parents('.c-tabs').siblings('#tab' + tab_index);
            let first_tab_content = that.parents('.c-tabs').siblings('#tab0');

            if (!tab_content.hasClass('is-show')) {
                that.addClass('active');
                that.siblings('.item').removeClass('active');
                tab_content.addClass('is-show');
                tab_content.siblings('.c-tab-contents').removeClass('is-show');
            } else {
                that.removeClass('active');
                that.siblings('.item').removeClass('active');
                tab_content.removeClass('is-show');
                first_tab_content.addClass('is-show').siblings('.c-tab-contents').removeClass('is-show');
            }
        }
    });
}