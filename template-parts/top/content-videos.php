<?php
$terms_list = array(874, 878, 875, 876, 877);
?>
<?php if (wp_is_mobile()) echo do_shortcode('[video_frame]'); ?>
<section class="l-section l-videos">
    <div class="l-title center">
        <a href="<?php echo home_url(); ?>/video.html"><h2 class="c-title">Video nổi bật</h2></a>
    </div>
    <div class="c-tabs tab-scroll">
        <div class="wrapper">
            <?php
                $terms = get_terms(array(
                    'taxonomy' => 'video_category',
                    'hide_empty' => false,
                    'include' => $terms_list,
                ));

                foreach ($terms as $index => $term) :
                    $term_id = $term->term_id;
                    $term_name = $term->name;
            ?>
                <span class="item" data-tab="<?php echo ($index + 1); ?>"><?php echo $term_name; ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (!wp_is_mobile()) : ?>
        <?php echo do_shortcode('[video_frame]'); ?>
    <?php endif; ?>

    <?php if (!wp_is_mobile()) : ?>
        <div class="c-tab-wrap">
    <?php endif; ?>

    <?php
        $args = array(
            'post_type'           => 'video',
            'post_status'         => 'publish',
            'posts_per_page'      => 10,
            'order'               => 'DESC',
            'orderby'             => 'date',
            'ignore_sticky_posts' => true,
            'tax_query'           => array(
                array(
                'taxonomy' => 'video_category',
                'field'    => 'term_id',
                'terms'    => $terms_list,
                ),
            ),
        );

        $video_query = new WP_Query($args);

        if ($video_query->have_posts()) :
    ?>
        <div id="tab0" class="c-tab-contents is-show">
            <div class="l-content">
                <div class="c-videos c-swiper">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                        <?php
                            while ($video_query->have_posts()) :
                                $video_query->the_post();

                                $video_iframe = get_field('video');

                                // Tìm URL trong thẻ iframe
                                preg_match('/src="([^"]+)"/', $video_iframe, $src_matches);
                                $iframe_src = $src_matches[1] ?? '';

                                // Trích ID video từ đường dẫn dạng embed
                                preg_match('/embed\/([^?]+)/', $iframe_src, $id_matches);
                                $video_id = $id_matches[1] ?? '';

                                // Tạo URL thumbnail YouTube
                                $thumbnail_url = $video_id ? "https://img.youtube.com/vi/{$video_id}/hqdefault.jpg" : '';
                        ?>
                            <a href="<?php the_permalink(); ?>" class="item swiper-slide">
                                <figure class="c-figure">
                                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>" loading="lazy" <?php device_width_height(210, 157, 136, 101); ?>>
                                </figure>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        ?>
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
        $terms = get_terms(array(
            'taxonomy'   => 'video_category',
            'hide_empty' => false,
            'include'    => $terms_list,
        ));

        foreach ($terms as $index => $term) :
            $term_name = $term->ID;
            $term_id = $term->term_id;
    ?>
        <div id="<?php echo 'tab' . ($index + 1); ?>" class="c-tab-contents">
            <div class="l-content">
                <div class="c-videos c-swiper">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php
                                $args = array(
                                    'post_type'      => 'video',
                                    'post_status'    => 'publish',
                                    'posts_per_page' => 10,
                                    'order' => 'DESC',
                                    'orderby' => 'date',
                                    'tax_query'      => array(
                                        array(
                                        'taxonomy' => 'video_category',
                                        'field'    => 'term_id',
                                        'terms'    => $term_id,
                                        ),
                                    ),
                                );

                                $video_query = new WP_Query($args);

                                if ($video_query->have_posts()) :
                            ?>
                                <?php
                                    while ($video_query->have_posts()) :
                                        $video_query->the_post();

                                        $video_iframe = get_field('video');

                                        // Tìm URL trong thẻ iframe
                                        preg_match('/src="([^"]+)"/', $video_iframe, $src_matches);
                                        $iframe_src = $src_matches[1] ?? '';

                                        // Trích ID video từ đường dẫn dạng embed
                                        preg_match('/embed\/([^?]+)/', $iframe_src, $id_matches);
                                        $video_id = $id_matches[1] ?? '';

                                        // Tạo URL thumbnail YouTube
                                        $thumbnail_url = $video_id ? "https://img.youtube.com/vi/{$video_id}/hqdefault.jpg" : '';
                                ?>
                                    <a href="<?php the_permalink(); ?>" class="item swiper-slide">
                                        <figure class="c-figure">
                                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>" loading="lazy" <?php device_width_height(210, 157, 136, 101); ?>>
                                        </figure>
                                        <h3><?php the_title(); ?></h3>
                                    </a>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                ?>
                            <?php endif; ?>
                        </div>
                        <?php if (!wp_is_mobile()) : ?>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php if (!wp_is_mobile()) : ?>
    </div>
    <?php endif; ?>
    
</section>
