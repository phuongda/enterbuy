<?php
$product_id = $args['product_item'] ?? false;

if (!empty($product_id)) :
    $product_title = get_the_title($product_id);
    $product_link = get_permalink($product_id);
    $product_image = get_the_post_thumbnail_url($product_id, 'thumbnail');
?>
    <a href="<?php echo $product_link; ?>" class="item swiper-slide">
        <figure class="c-figure">
            <img src="<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" loading="lazy" <?php device_width_height(255, 265, 136, 145); ?>>
        </figure>
        <div class="item-info">
            <h3><?php echo $product_title; ?></h3>
            <?php echo get_product_price($product_id, true); ?>
        </div>
    </a>
<?php endif; ?>