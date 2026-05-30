<?php
add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Cài đặt chung',
            'menu_title' => 'Cài đặt',
            'menu_slug'  => 'acf-options',
            'capability' => 'edit_posts',
            'redirect'   => false
        ]);

        acf_add_options_sub_page([
            'page_title'  => 'Thông tin chung',
            'menu_title'  => 'Thông tin',
            'parent_slug' => 'acf-options',
        ]);

        acf_add_options_sub_page([
            'page_title'  => 'Header',
            'menu_title'  => 'Header',
            'parent_slug' => 'acf-options',
        ]);

        acf_add_options_sub_page([
            'page_title'  => 'Footer',
            'menu_title'  => 'Footer',
            'parent_slug' => 'acf-options',
        ]);

        acf_add_options_sub_page([
            'page_title'  => 'Trang chủ',
            'menu_title'  => 'Trang chủ',
            'parent_slug' => 'acf-options',
        ]);
    }
});

// custom post type
function custom_post_type_video() {
    // Đăng ký post type "video"
    $labels = array(
        'name'               => 'Videos',
        'singular_name'      => 'Video',
        'menu_name'          => 'Videos',
        'name_admin_bar'     => 'Video',
        'add_new'            => 'Thêm mới',
        'add_new_item'       => 'Thêm video mới',
        'new_item'           => 'Video mới',
        'edit_item'          => 'Chỉnh sửa video',
        'view_item'          => 'Xem video',
        'all_items'          => 'Tất cả videos',
        'search_items'       => 'Tìm video',
        'parent_item_colon'  => 'Video cha:',
        'not_found'          => 'Không tìm thấy video nào.',
        'not_found_in_trash' => 'Không tìm thấy video nào trong thùng rác.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'video'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-video-alt3',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments')
    );

    register_post_type('video', $args);

    // Đăng ký taxonomy "video_category" (giống như danh mục)
    $taxonomy_labels = array(
        'name'              => 'Danh mục video',
        'singular_name'     => 'Danh mục video',
        'search_items'      => 'Tìm danh mục',
        'all_items'         => 'Tất cả danh mục',
        'parent_item'       => 'Danh mục cha',
        'parent_item_colon' => 'Danh mục cha:',
        'edit_item'         => 'Chỉnh sửa danh mục',
        'update_item'       => 'Cập nhật danh mục',
        'add_new_item'      => 'Thêm danh mục mới',
        'new_item_name'     => 'Tên danh mục mới',
        'menu_name'         => 'Danh mục'
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'video-category')
    );

    register_taxonomy('video_category', array('video'), $taxonomy_args);
}

add_action('init', 'custom_post_type_video');
