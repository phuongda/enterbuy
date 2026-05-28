<?php
$datas = get_field('hotsale_block', 'option');

if (!empty($datas)) :
    $title = $datas['title'];
    $products = $datas['products_list'];

    if (count($products) > 0) :
?>
    <section class="l-section l-hotsale">
        <h2 class="c-title"><?php echo replace_br($title, true); ?></h2>
        <div class="c-product c-hotsale c-swiper swiper-hotsale">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($products as $index => $item) : ?>
                        <?php get_template_part( 'template-parts/top/content-product-item', '', ['product_item' => $item['product_item']] ); ?>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
<?php
    endif;
  endif;
?>