<?php
require_once get_stylesheet_directory() . '/inc/config.php';
require_once get_stylesheet_directory() . '/inc/setup.php';
require_once get_stylesheet_directory() . '/inc/helpers.php';
require_once get_stylesheet_directory() . '/inc/shortcode.php';

function body_attributes() {
    $page = 'default';

    if (is_page_template('page-templates/page-top.php')) {
        $page = 'top';
    }

    if (is_singular('product')) {
        $page = 'product';
    }

    echo 'data-page="' . esc_attr($page) . '"';
}

function print_pre($content, $hidden = false) {
    echo $hidden ? '<pre hidden>' : '<pre>';
    print_r($content);
    echo '</pre>';
}

function get_pcbr($with_space = false) {
    $result = $with_space ? ' ' : '';

    if (!wp_is_mobile()) {
        $result = '<br>';
    }

    return $result;
}

function get_spbr($with_space = false) {
    $result = $with_space ? ' ' : '';

    if (wp_is_mobile()) {
        $result = '<br>';
    }

    return $result;
}

function the_pcbr($with_space = false) {
    $result = $with_space ? ' ' : '';

    if (!wp_is_mobile()) {
        $result = '<br>';
    }

    echo $result;
}

function the_spbr($with_space = false) {
    $result = $with_space ? ' ' : '';

    if (wp_is_mobile()) {
        $result = '<br>';
    }

    echo $result;
}

function replace_br($text, $with_space = false) {
    $space_str = $with_space ? ' ' : '';
    $regex_arr = ['{$brpc}', '{$brsp}'];
    $brpc = get_pcbr() ?: $space_str;
    $brsp = get_spbr() ?: $space_str;
    $replace_arr = [$brpc, $brsp];
    
    $result = str_replace($regex_arr, $replace_arr, $text);

    echo $result;
}

/* Get width/height of image */
function device_width_height($pc_w = null, $pc_h = null, $sp_w = null, $sp_h = null){
    if (!wp_is_mobile() && ($pc_w !== null || $pc_h !== null)) {
        $sp_w = $pc_w ?? $sp_w;
        $sp_h = $pc_h ?? $sp_h;
    }
    printf('width="%d" height="%d"', $sp_w, $sp_h);
}

function format_price($price) {
    return number_format($price, 0, ',', '.') . '₫';
}

function get_product_price($product_id, $to_html = false) {
    $product = wc_get_product($product_id);
    if (!$product) return null;

    // ✅ Check nếu sản phẩm có child products
    if(function_exists('check_have_child_products') && check_have_child_products($product_id)) {
        $child_products = get_child_products($product_id);
        
        if(!empty($child_products)) {
            $min_price = PHP_INT_MAX;
            $max_price = 0;
            
            foreach($child_products as $child) {
                $child_price = (float) $child->get_price();
                if($child_price < $min_price) {
                    $min_price = $child_price;
                }
                if($child_price > $max_price) {
                    $max_price = $child_price;
                }
            }
            
            // ✅ Đảm bảo min < max (trong trường hợp bị lỗi)
            if($min_price > $max_price) {
                $temp = $min_price;
                $min_price = $max_price;
                $max_price = $temp;
            }
            
            $min_price_formatted = format_price($min_price);
            $max_price_formatted = format_price($max_price);
            
            $result = [
                'price_type' => 'priced',
                'min_price' => $min_price,
                'max_price' => $max_price,
            ];
            
            return $to_html ? get_product_price_html($result) : $result;
        }
    }

    $regular_price = $product->get_regular_price();
    $sale_price    = $product->get_sale_price();
    $is_out_of_stock = !$product->is_in_stock();

    if ($regular_price === '' && $sale_price === '') {
        $result = [
            'price_type' => 'contact',
            'is_out_of_stock' => $is_out_of_stock,
        ];
        return $to_html ? get_product_price_html($result) : $result;
    }

    $regular_price = (float) $regular_price;
    $sale_price    = (float) $sale_price;

    $has_sale = $sale_price > 0 && $sale_price < $regular_price;
    $discount_percent = $has_sale ? round((($regular_price - $sale_price) / $regular_price) * 100) : null;

    $result = [
        'price_type' => 'priced',
        'regular_price' => $regular_price,
        'sale_price'    => $has_sale ? $sale_price : null,
        'discount_percent' => $discount_percent,
        'is_out_of_stock' => $is_out_of_stock,
    ];

    return $to_html ? get_product_price_html($result) : $result;
}

function get_product_price_html($data) {
    $result = '<div class="item-prices">';

    if (!empty($data['is_out_of_stock'])) {
        $result .= '<span class="price-out-of-stock">Hết hàng</span>';
    } elseif ($data['price_type'] === 'contact') {
        $result .= '<span class="price-contact">Liên hệ</span>';
    } elseif (isset($data['min_price']) && isset($data['max_price'])) {
        // ✅ Hiển thị khoảng giá cho sản phẩm có child products
        $result .= '<span class="min-price">' . format_price($data['min_price']) . '</span> - <span class="max-price">' . format_price($data['max_price']) . '</span>';
    } elseif (!empty($data['sale_price'])) {
        $result .= '<span class="sale-price">' . format_price($data['sale_price']) . '</span>';
        $result .= '<span class="old-price">' . format_price($data['regular_price']) . '</span> ';
        if (!is_null($data['discount_percent'])) {
            $result .= '<span class="percent">-' . $data['discount_percent'] . '%</span> ';
        }
    } else {
        $result .= '<span class="normal-price">' . format_price($data['regular_price']) . '</span>';
    }

    $result .= '</div>';
    return $result;
}

function get_client_ip() {
    // Check if the client IP is passed via a proxy or load balancer (using HTTP_X_FORWARDED_FOR)
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // This header contains a comma-separated list of IPs if passed through multiple proxies
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        // If the client is behind a proxy, the client IP may be passed in this header
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        // The direct IP address of the client (use this as a fallback)
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        // If no IP is found, return an unknown IP
        $ip = 'Unknown IP';
    }

    // In case multiple IPs are passed (such as from a proxy), we take the first one
    $ip = explode(',', $ip);
    return trim($ip[0]); // Return the first IP in the list
}

function check_is_dev() {
    $result = false;
  
    if (is_user_logged_in()) {
      $current_user = wp_get_current_user();
      $username = $current_user->user_login;
      if ($username === 'fuong') $result = true;
    }
  
    return $result;
}
