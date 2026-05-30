<?php
$datas = get_field('media_channel_block', 'option');

if (!empty($datas)) :
    $title = $datas['title'];
    $channels = $datas['channels'];

    $channels = count($channels) <= 6 ? array_merge($channels, $channels) : $channels;
?>
    <section class="l-section l-press">
        <h2 class="c-title"><?php echo $title; ?></h2>
        <div class="c-press">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                        foreach ($channels as $item) :
                            $image = $item['image'];
                            $alt = $item['alt'];
                    ?>
                        <div class="item swiper-slide">
                            <img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" loading="lazy" <?php device_width_height(120, 50, 120, 50); ?>>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>