<?php
add_shortcode('video_frame', function() {
    $video_frame = get_field('video_frame', 'option');
    $title = $video_frame['title'];
    $video = $video_frame['video'];
    $video = str_replace('iframe', 'iframe loading="lazy"', $video);
    $html = '';

    if (!empty($video)) {
        $html = '<div class="c-video-frame new-style">
            <div class="frame-container">
                <div class="frame-main">' . $video . '</div>
                <div class="frame-bg">
                    <img src="https://enterbuy.vn/wp-content/uploads/2025/10/Enterbuy-frame-video.webp" loading="lazy">
                </div>
            </div>
        </div>';
    }

    return $html;
});

add_action('wp_ajax_video_frame_shortcode', 'video_frame_shortcode');
add_action('wp_ajax_nopriv_video_frame_shortcode', 'video_frame_shortcode');

function video_frame_shortcode() {
  echo do_shortcode('[video_frame]');
  wp_die();
}

add_filter('the_content', function($content) {
    if (is_singular('post') || is_singular('video')) {
        $content .= do_shortcode('[video_frame]');
    }
    return $content;
});
