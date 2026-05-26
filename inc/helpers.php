<?php
require_once get_stylesheet_directory() . '/inc/config.php';

function currentURL($without_filter = false, $without_page = false, $without_num = false) {
    $result = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if ($without_filter) {
        $result = preg_replace( '/\?.*/', '', $result );

        if ($without_num){
            if ( preg_match( '/\/+\D*0\d$/', $result ) ) {
                $result = preg_replace( '/0\d/', '', $result );
            }
        }
    }

    if ($without_page) {
        $result = preg_replace('/\/page\/[0-9]+/', '', $result);
    }

    return $result;
}

function currentPath($without_filter = true, $without_page = false, $without_num = true) {
    $result = $_SERVER['REQUEST_URI'];

    if ($without_filter) {
        $result = preg_replace( '/\?.*/', '', $result );

        if ($without_num){
            if ( preg_match( '/\/+\D*0\d$/', $result ) ) {
                $result = preg_replace( '/0\d/', '', $result );
            }
        }
    }

    if ($without_page) {
        $result = preg_replace('/\/page\/[0-9]+/', '', $result);
    }

    return $result;
}

function get_home_directory($path = '') {
    return HOME_URL . ltrim($path, '/');
}