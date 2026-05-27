<?php
$datas = get_field('banners_block', 'option');

if (!empty($datas)) :
?>
    <section class="l-section c-mainvisual">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                    foreach ($datas as $index => $item) :
                    $img_pc = $item['images']['image_pc'];
                    $img_sp = $item['images']['image_sp'];
                    $alt = $item['alt'];
                    $url = $item['url'];
                ?>
                    <a href="<?php echo $url; ?>" class="item swiper-slide">
                        <figure class="c-figure">
                            <?php if ($index === 0) : ?>
                                <img src="<?php echo (wp_is_mobile()) ? $img_sp : $img_pc; ?>" alt="<?php echo $alt; ?>" <?php device_width_height(1200, 400, 375, 281); ?> fetchpriority="high">
                            <?php else : ?>
                                <img src="<?php echo (wp_is_mobile()) ? $img_sp : $img_pc; ?>" alt="<?php echo $alt; ?>" <?php device_width_height(1200, 400, 375, 281); ?> loading="lazy">
                            <?php endif; ?>
                        </figure>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
<?php endif; ?>