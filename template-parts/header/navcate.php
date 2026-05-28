<?php
$datas = get_field('header_category', 'option');

if (!empty($datas)) :
?>
    <div class="l-header-cate">
        <?php echo !wp_is_mobile() ? '<div class="l-container">' : ''; ?>

        <div class="c-header-cate">
            <?php
                foreach ($datas as $item) :
                    $image = $item['image'];
                    $title = $item['title'];
                    $link = $item['link'];
            ?>
                <a href="<?php echo $link; ?>" class="item">
                    <img src="<?php echo $image; ?>" loading="lazy" <?php device_width_height(30, 30, 20, 20); ?>>
                    <span><?php echo replace_br($title, true); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
        
        <?php echo !wp_is_mobile() ? '</div>' : ''; ?>
    </div>
<?php endif; ?>