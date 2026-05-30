<?php
$datas = get_field('news_block', 'option');

if (!empty($datas)) :
    $title = $datas['title'];
    $link = $datas['link'];
    $category = $datas['news_category'];
?>
    <section class="l-section l-news">
        <div class="l-title center">
            <a href="<?php echo $link; ?>"><h2 class="c-title"><?php echo $title; ?></h2></a>
        </div>
        <div class="c-tabs tab-scroll">
            <div class="wrapper">
            <?php
                foreach ($category as $index => $term_id) :
                $term_name = get_term($term_id)->name;
            ?>
                <span class="item" data-tab="<?php echo ($index + 1); ?>"><?php echo $term_name ?></span>
            <?php endforeach; ?>
            </div>
        </div>
        <?php
            $args = array(
                'post_type'  => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 10,
                'order' => 'DESC',
                'orderby' => 'date',
                'ignore_sticky_posts' => true,
            );

            $proall2 = new WP_Query($args);

            if ($proall2->have_posts()) :
        ?>
            <div id="tab0" class="c-tab-contents is-show">
                <div class="l-content">
                    <div class="c-news c-swiper">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                    while ($proall2->have_posts()) :
                                        $proall2->the_post();

                                        $thumbnail = (has_post_thumbnail($post->ID)) ? wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail') : '';
                                ?>
                                    <a href="<?php the_permalink(); ?>" class="item swiper-slide">
                                        <figure class="c-figure">
                                            <img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" loading="lazy" <?php device_width_height(285, 176, 156, 117); ?>>
                                        </figure>
                                        <h3><?php the_title(); ?></h3>
                                        <div><?php the_excerpt(); ?></div>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                            <?php if (!wp_is_mobile()) : ?>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
            foreach ($category as $index => $term_id) :
                $args = array(
                    'post_type'  => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 10,
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $term_id
                    )
                    )
                );

                $proall = new WP_Query($args);

                if ($proall->have_posts()) :
        ?>
            <div id="<?php echo 'tab' . ($index + 1); ?>" class="c-tab-contents">
                <div class="l-content">
                    <div class="c-news c-swiper">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                    while ($proall->have_posts()) :
                                        $proall->the_post();

                                        $thumbnail = (has_post_thumbnail($post->ID)) ? wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail') : '';
                                ?>
                                    <a href="<?php the_permalink(); ?>" class="item swiper-slide">
                                        <figure class="c-figure">
                                            <img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" loading="lazy" <?php device_width_height(285, 176, 156, 117); ?>>
                                        </figure>
                                        <h3><?php the_title(); ?></h3>
                                        <div><?php the_excerpt(); ?></div>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                            <?php if (!wp_is_mobile()) : ?>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            endif;
            endforeach;
        ?>
        <?php wp_reset_postdata(); ?>
    </section>
<?php endif; ?>