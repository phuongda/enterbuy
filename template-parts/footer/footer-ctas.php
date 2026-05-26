<?php
$datas = get_field('footer_cta_block', 'option');

if (!empty($datas)) :
?>
    <section class="l-ctas-footer">
        <div class="l-container">
            <div class="c-ctas-footer">
                <?php
                    foreach ($datas as $item) :
                        $title = $item['title'];
                        $image = $item['image'];
                        $link = $item['link'];
                ?>
                    <a href="<?php echo $link; ?>" class="item">
                        <img src="<?php echo $image; ?>" loading="lazy" <?php device_width_height(45, 45, 35, 35); ?>>
                        <h3><?php echo $title; ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>