<?php
$current_time = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
$status = get_field('status', 'option');
$banners = get_field('banners', 'option');
$full_width = get_field('full_width', 'option');
$class = $full_width ? 'full-width' : '';

if ($status) :
?>
    <?php if ($full_width) : ?>
        <section class="l-footer-banner mt-0 mb-0">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                        foreach ($banners as $item) :
                            $banner_pc = $item['banner_pc'];
                            $banner_sp = $item['banner_sp'];
                            $banner = wp_is_mobile() ? $banner_sp : $banner_pc;
                            $alt_text = $item['alt_text'];
                            $link_banner = (!empty($item['link_banner'])) ? $item['link_banner'] : 'javascript:void(0)';

                            $start_time = new DateTime($item['start_time'], new DateTimeZone('Asia/Ho_Chi_Minh'));
                            $end_time = new DateTime($item['end_time'], new DateTimeZone('Asia/Ho_Chi_Minh'));

                            if (($current_time >= $start_time) && ($current_time < $end_time)) :
                    ?>
                        <a href="<?php echo $link_banner; ?>" class="c-figure swiper-slide">
                            <img class="width-full height-auto" src="<?php echo $banner; ?>" alt="<?php echo $alt_text; ?>" loading="lazy" <?php device_width_height(1920, 640, 375, 281); ?>>
                        </a>
                    <?php
                            endif;
                        endforeach;
                    ?>
                </div>
            </div>
        </section>
    <?php else : ?>
        <section class="l-footer-banner">
            <div class="l-container">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($banners as $item) :
                                $banner_pc = $item['banner_pc'];
                                $banner_sp = $item['banner_sp'];
                                $banner = wp_is_mobile() ? $banner_sp : $banner_pc;
                                $alt_text = $item['alt_text'];
                                $link_banner = (!empty($item['link_banner'])) ? $item['link_banner'] : 'javascript:void(0)';

                                $start_time = new DateTime($item['start_time'], new DateTimeZone('Asia/Ho_Chi_Minh'));
                                $end_time = new DateTime($item['end_time'], new DateTimeZone('Asia/Ho_Chi_Minh'));

                                if (($current_time >= $start_time) && ($current_time < $end_time)) :
                        ?>
                            <a href="<?php echo $link_banner; ?>" class="c-figure swiper-slide">
                                <img class="c-image width-full height-auto" src="<?php echo $banner; ?>" alt="<?php echo $alt_text; ?>" loading="lazy" <?php device_width_height(1920, 640, 375, 281); ?>>
                            </a>
                        <?php
                                endif;
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
