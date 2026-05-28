<?php
$datas = get_field('products_block', 'option');

if (!empty($datas)) :
    $title = $datas['title'];
    $products_group = $datas['products_group'];

    if (count($products_group) > 0) :
?>
    <section class="l-section l-products">
        <h2 class="c-title"><?php echo replace_br($title, true); ?></h2>
        <div class="c-cols">
            <?php
                foreach ($products_group as $products) :
                $products_title = $products['title'];
                $products_link = $products['link'];
                $products_list = $products['products_list'];
                $products_length = count($products_list);
            ?>
                <div class="c-col">
                    <?php if ($products_link) : ?>
                        <a href="<?php echo $products_link; ?>"><h3 class="c-subtitle"><?php echo $products_title ?><i class="c-icon icon-arrow-green"></i></h3></a>
                    <?php else : ?>
                        <h3 class="c-subtitle"><?php echo $products_title ?><i class="c-icon icon-arrow-green"></i></h3>
                    <?php endif; ?>
                    <div class="c-product c-swiper swiper-product">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($products_list as $index => $item) : ?>
                                    <?php get_template_part( 'template-parts/top/content-product-item', '', ['product_item' => $item['product_item']] ); ?>
                                <?php endforeach; ?>
                            </div>
                            <?php if (!wp_is_mobile()) : ?>
                                <?php if ($products_length > 4) : ?>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php
    endif;
endif;
?>