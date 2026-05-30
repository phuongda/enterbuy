<?php
$args = array(
    'taxonomy' => 'local_category',
    'orderby' => 'name',
    'order'   => 'ASC'
);

$cats = get_categories($args);
?>
<section class="l-showroom">
    <div class="l-container">
        <div class="l-title">
            <h2 class="c-title center">Hệ thống showroom Enterbuy</h2>
        </div>
        <div class="l-content">
            <div class="c-select-wrap">
                <select name="location-showroom" id="locationShowroom" class="c-select js-select-showroom">
                    <?php
                        $i = 0;
                        foreach ($cats as $cat) :
                            $cat_slug = $cat->slug;
                            $cat_name = $cat->name;
                    ?>
                        <option value="<?php echo $cat_slug; ?>"<?php echo ($i === 0) ? ' selected' : ''; ?>><?php echo $cat_name; ?></option>
                    <?php
                            $i++;
                        endforeach;
                    ?>
                </select>
            </div>
            <div class="c-showroom">
                <?php
                    $y = 0;
                    foreach($cats as $cat) :
                        $cat_slug = $cat->slug;
                        $cat_name = $cat->name;
                        $cat_term = $cat->term_id;

                        $args = array(
                            'post_type' => 'local-store',
                            'post_status'  => 'publish',
                            'posts_per_page' => -1, 
                            'tax_query' => array(
                                array(
                                'taxonomy' => 'local_category',
                                'field' => 'term_id',
                                'terms' => $cat_term,
                                )
                            )
                        );

                        $query = new WP_Query( $args );

                        while ($query->have_posts()) :
                            $query->the_post();

                            $id = get_the_ID();
                            $url_map = get_field('url_map', $id);
                            $images = get_field('map_media', $id);
                            $opening = get_field('opening_hours', $id);
                            $str_opening = $opening['open'] . ' - ' . $opening['close'];

                            $meta    = get_post_meta($id, 'dvls_data', true);
                            $address = $meta['address'] ?? '';
                            $phone1   = $meta['phone1'] ?? '';
                            $phone2   = $meta['phone2'] ?? '';

                            $str_phone = '';
                            if ($phone1 && $phone2) {
                                $str_phone = '<p><i class="c-icon icon-location"></i><a href="tel:'.str_replace([' ', '.'], '', $phone1).'"><span>'.$phone1.'</span></a> - <a href="tel:'.str_replace([' ', '.'], '', $phone2).'"><span>'.$phone2.'</span></a></p>';
                            } elseif ($phone1) {
                                $str_phone = '<a href="tel:'.str_replace([' ', '.'], '', $phone1).'"><i class="c-icon icon-phone"></i><span>'.$phone1.'</span></a>';
                            } elseif ($phone2) {
                                $str_phone = '<a href="tel:'.str_replace([' ', '.'], '', $phone2).'"><i class="c-icon icon-phone"></i><span>'.$phone2.'</span></a>';
                            }
                ?>
                    <div id="showroom-<?php echo $cat_slug; ?>" class="item<?php echo ($y == 0) ? ' active' : ''; ?>">
                        <div class="c-cols c-cols--col2">
                            <div class="c-col">
                                <h3><?php the_title(); ?></h3>

                                <?php if ($address) : ?>
                                    <a href="<?php echo $url_map; ?>" target="_blank"><i class="c-icon icon-location"></i><span><?php echo $address; ?></span></a>
                                <?php endif; ?>

                                <?php if ($str_phone) : ?>
                                    <?php echo $str_phone; ?>
                                <?php endif; ?>

                                <?php if (!empty($opening)) : ?>
                                    <p><i class="c-icon icon-time"></i><span><?php echo $str_opening; ?></span></p>
                                <?php endif; ?>

                                <div class="contact-showroom">

                                    <?php if ($url_map) : ?>
                                        <a href="<?php echo $url_map; ?>" target="_blank" class="c-button btn-orange">Xem chỉ đường</a>
                                    <?php endif; ?>

                                    <?php if ($phone1) : ?>
                                        <a href="tel:<?php echo str_replace([' ', '.'], '', $phone1); ?>" class="c-button btn-orange">Liên hệ tư vấn</a>
                                    <?php elseif ($phone2) : ?>
                                        <a href="tel:<?php echo str_replace([' ', '.'], '', $phone2); ?>" class="c-button btn-orange">Liên hệ tư vấn</a>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <?php if (!empty($images)) : ?>
                                <div class="c-col">
                                    <div class="c-gallery">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($images as $image) : ?>
                                                    <div class="item swiper-slide">
                                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" loading="lazy">
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                        endwhile;
                        wp_reset_postdata();
                        $y++;
                    endforeach;
                ?>
            </div>
        </div>
    </div>
</section>