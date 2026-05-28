<?php
$datas = get_field('brands_block', 'option');

if (!empty($datas)) :
    $title = $datas['title'];
    $brands = $datas['brands_item'];

    $brands = count($brands) <= 6 ? array_merge($brands, $brands) : $brands;
?>
    <section class="l-section l-brands">
        <h2 class="c-title center"><?php echo replace_br($title, true); ?></h2>
        <div class="c-brands">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                        foreach ($brands as $item) :
                        $image = $item['image'];
                        $alt = $item['alt'];
                        $url = $item['url'];
                    ?>
                        <a href="<?php echo $url; ?>" class="item swiper-slide">
                            <img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" loading="lazy" <?php device_width_height(150, 50, 150, 50); ?>>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>