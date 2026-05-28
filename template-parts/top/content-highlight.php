<?php
$datas = get_field('highlights_block', 'option');

if (!empty($datas)) :
?>
    <section class="l-section l-highlight">
        <div class="c-highlight">
            <?php if (!wp_is_mobile()) : ?>
                <?php
                    foreach ($datas as $index => $item) :
                        $title = $item['title'];
                        $content = $item['content'];
                        $image = $item['image'];
                        $url = $item['url'];
                ?>
                    <a href="<?php echo $url; ?>" class="item highlight-<?php echo ($index + 1); ?>">
                        <img src="<?php echo $image; ?>" loading="lazy" <?php device_width_height(40, 40, 40, 40); ?>>
                        <div>
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo $content; ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($datas as $index => $item) :
                                $title = $item['title'];
                                $content = $item['content'];
                                $image = $item['image'];
                                $url = $item['url'];
                        ?>
                            <a href="<?php echo $url; ?>" class="item swiper-slide highlight-<?php echo ($index + 1); ?>">
                                <img src="<?php echo $image; ?>" loading="lazy" <?php device_width_height(40, 40, 40, 40); ?>>
                                <div>
                                    <h3><?php echo $title; ?></h3>
                                    <p><?php echo $content; ?></p>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>