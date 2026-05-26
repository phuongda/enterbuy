<div class="c-menu-bottom">
    <div class="item">
        <a href="javascript:void(0)" class="menu-toggle"><i class="c-icon icon-menu"></i><span>Menu</span></a>
    </div>
    <div class="item">
        <a href="javascript:void(Tawk_API.toggle())"><i class="c-icon icon-advise"></i><span>Tư vấn</span></a>
    </div>
    <div class="item">
        <a target="_blank" href="<?php echo get_field('zalo', 'option'); ?>"><i class="c-icon icon-zalo"></i><span>Chat 24/7</span></a>
    </div>
    <div class="item">
        <a href="tel:<?php echo preg_replace('/[\s\.,]/', '', get_field('hotline', 'option')); ?>" class="btn-call"><i class="c-icon icon-phone2"></i><span>Gọi điện</span></a>
    </div>
</div>