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
