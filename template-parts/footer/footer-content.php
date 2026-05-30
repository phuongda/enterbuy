<?php
$about_text = get_field('about_text', 'option');
$company_name = get_field('company_name', 'option');
$tax_information = get_field('tax_information', 'option');
$social_information = get_field('social_information', 'option');

$contact_information = get_field('contact_information', 'option');
$customer_support = get_field('customer_support', 'option');
$about_enterbuy = get_field('about_enterbuy', 'option');
$partners = get_field('partners', 'option');
$others = get_field('others', 'option');
?>
<footer class="l-footer">
    <div class="footer-main">
        <div class="l-container">
            <div class="footer-left">
                <div class="c-col">
                    <a href="<?php echo home_url(); ?>" class="footer-logo">
                        <img src="<?php echo get_home_directory('/wp-content/uploads/2022/05/enterbuy.png'); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" loading="lazy" <?php device_width_height(140, 45, 140, 45); ?>>
                    </a>
                </div>
                <div class="c-cols flex-column mt-10">
                    <div class="c-col flex-column width-auto">
                        <?php if (!empty($about_text)) : ?>
                            <p class="mb-20 text-justify"><?php echo $about_text; ?></p>
                        <?php endif; ?>
                        
                        <?php if (!empty($company_name)) : ?>
                            <p class="mb-5 font-bold text-14"><?php echo replace_br($company_name, true); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($tax_information)) : ?>
                            <p class="mb-0">MST: <?php echo $tax_information['tax']; ?><br>Ngày cấp: <?php echo $tax_information['date']; ?><br><?php echo $tax_information['place']; ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if (wp_is_mobile()) : ?>
                        <?php
                            if (!empty($contact_information)) :
                                $address_list = $contact_information['address_list'];
                                $phone_list = $contact_information['phone_list'];
                                $hotline_list = $contact_information['hotline_list'];
                                $email = $contact_information['email'];
                                $website = $contact_information['website'];
                        ?>
                            <div class="c-col mt-sp-20 ">
                                <div class="l-title">
                                    <h3 class="c-title mb-sp-10">THÔNG TIN LIÊN HỆ</h3>
                                </div>
                                <div class="l-content">

                                    <?php
                                        $address_length = count($address_list);
                                        foreach ($address_list as $address) :
                                            $area = $address['area'];
                                            $address = $address['address'];
                                            $link = $address['link'] ?? 'javascript:void(0)';
                                    ?>
                                        <a href="<?php echo $link; ?>">
                                            <i class="c-icon icon-location-green"></i><?php if ($address_length > 1) : ?><span class="font-bold"><?php echo $area ?>:</span>&nbsp;<?php endif; ?><?php echo $address; ?>
                                        </a>
                                    <?php endforeach; ?>

                                    <?php if (!empty($phone_list)) : ?>
                                        <p>
                                            <i class="c-icon icon-phone-green"></i><?php foreach ($phone_list as $index => $phone) : ?><?php if ($index > 0) echo ' - '; ?><a href="tel:<?php echo $phone['phone']; ?>"><span class="font-bold"><?php echo $phone['phone']; ?></span></a><?php endforeach; ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($email)) : ?>
                                        <a href="<?php echo $email; ?>" class="font-bold"><i class="c-icon icon-mail-green"></i><?php echo $email; ?></a>
                                    <?php endif; ?>

                                    <?php if (!empty($website)) : ?>
                                        <a href="<?php echo $website; ?>" class="font-bold"><i class="c-icon icon-earth-green"></i><?php echo $website; ?></a>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($hotline_list)) : ?>
                                        <p class="mb-0">
                                            <i class="c-icon icon-hotline-green"></i><span>Hotline: </span><?php foreach ($hotline_list as $index => $hotline) : ?><?php if ($index > 0) echo ' - '; ?><a href="tel:<?php echo $hotline['hotline']; ?>"><span class="font-bold"><?php echo $hotline['hotline']; ?></span></a><?php endforeach; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if (!wp_is_mobile()) : ?>
                        <div class="c-col mt-30 mt-sp-15">
                            <div class="c-license">
                                <div class="item brand-1">
                                    <img src="<?php echo get_home_directory('/wp-content/uploads/images/footer-1.webp'); ?>" alt="" loading="lazy" <?php device_width_height(54, 26, 54, 25); ?>>
                                </div>
                                <div class="item brand-2">
                                    <img src="<?php echo get_home_directory('/wp-content/uploads/images/footer-2.webp'); ?>" alt="" loading="lazy" <?php device_width_height(25, 25, 25, 25); ?>>
                                </div>
                                <a href="http://online.gov.vn/Home/WebDetails/79814" class="item brand-3">
                                    <img src="<?php echo get_home_directory('/wp-content/uploads/images/footer-3.webp'); ?>" alt="logo bộ công thương" loading="lazy" <?php device_width_height(65, 25, 65, 25); ?>>
                                </a>
                                <a href="https://www.dmca.com/Protection/Status.aspx?ID=95e827d6-af20-43a0-bd27-692d642b2268&refurl=https://www.geyser.com.vn/san-pham" class="item brand-4">
                                    <img src="<?php echo get_home_directory('/wp-content/uploads/images/footer-4.webp'); ?>" alt="DMCA.com Protection Status" loading="lazy" <?php device_width_height(93, 16, 93, 16); ?>>
                                </a>
                            </div>
                        </div>
                        <div class="c-col mt-30 mt-sp-30 flex-column">
                            <div class="l-title">
                                <h3 class="c-title mb-sp-10">Theo dõi Enterbuy Việt Nam</h3>
                            </div>
                            <div class="c-social">
                                <?php if ($facebook = $social_information['facebook']) : ?>
                                    <a href="<?php echo $facebook; ?>" class="item logo-facebook">
                                        <img src="<?php echo get_home_directory('/wp-content/uploads/images/icon/logo-facebook.png'); ?>" alt="facebook" loading="lazy" <?php device_width_height(44, 44, 44, 44); ?>>
                                    </a>
                                <?php endif; ?>

                                <?php if ($tiktok = $social_information['tiktok']) : ?>
                                    <a href="<?php echo $tiktok; ?>" class="item logo-tiktok">
                                        <img src="<?php echo get_home_directory('/wp-content/uploads/images/icon/logo-tiktok.png'); ?>" alt="tiktok" loading="lazy" <?php device_width_height(44, 44, 44, 44); ?>>
                                    </a>
                                <?php endif; ?>

                                <?php if ($youtube = $social_information['youtube']) : ?>
                                    <a href="<?php echo $youtube; ?>" class="item logo-youtube">
                                        <img src="<?php echo get_home_directory('/wp-content/uploads/images/icon/logo-youtube.png'); ?>" alt="youtube" loading="lazy" <?php device_width_height(44, 44, 44, 44); ?>>
                                    </a>
                                <?php endif; ?>

                                <?php if ($twitter = $social_information['twitter']) : ?>
                                    <a href="<?php echo $twitter; ?>" class="item logo-twitter">
                                        <img src="<?php echo get_home_directory('/wp-content/uploads/images/icon/logo-twitter.png'); ?>" alt="twitter" loading="lazy" <?php device_width_height(44, 44, 44, 44); ?>>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer-right">
                <div class="c-cols">
                    <?php if (!wp_is_mobile()) : ?>
                        <div class="c-cols__left">
                            <?php
                                if (!empty($contact_information)) :
                                    $address_list = $contact_information['address_list'];
                                    $phone_list = $contact_information['phone_list'];
                                    $hotline_list = $contact_information['hotline_list'];
                                    $email = $contact_information['email'];
                                    $website = $contact_information['website'];
                            ?>
                                <div class="c-col">
                                    <div class="l-title">
                                        <h3 class="c-title">THÔNG TIN LIÊN HỆ</h3>
                                    </div>
                                    <div class="l-content">

                                        <?php
                                            $address_length = count($address_list);
                                            foreach ($address_list as $address) :
                                                $area = $address['area'];
                                                $address = $address['address'];
                                                $link = $address['link'] ?? 'javascript:void(0)';
                                        ?>
                                            <a href="<?php echo $link; ?>">
                                                <i class="c-icon icon-location-green"></i><?php if ($address_length > 1) : ?><span class="font-bold"><?php echo $area ?>:</span>&nbsp;<?php endif; ?><?php echo $address; ?>
                                            </a>
                                        <?php endforeach; ?>
                                        
                                        <?php if (!empty($phone_list)) : ?>
                                            <p>
                                                <i class="c-icon icon-phone-green"></i><?php foreach ($phone_list as $index => $phone) : ?><?php if ($index > 0) echo ' - '; ?><a href="tel:<?php echo $phone['phone']; ?>"><span class="font-bold"><?php echo $phone['phone']; ?></span></a><?php endforeach; ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if (!empty($email)) : ?>
                                            <a href="<?php echo $email; ?>" class="font-bold"><i class="c-icon icon-mail-green"></i><?php echo $email; ?></a>
                                        <?php endif; ?>

                                        <?php if (!empty($website)) : ?>
                                            <a href="<?php echo $website; ?>" class="font-bold"><i class="c-icon icon-earth-green"></i><?php echo $website; ?></a>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($hotline_list)) : ?>
                                            <p>
                                                <i class="c-icon icon-hotline-green"></i><span>Hotline: </span><?php foreach ($hotline_list as $index => $hotline) : ?><?php if ($index > 0) echo ' - '; ?><a href="tel:<?php echo $hotline['hotline']; ?>"><span class="font-bold"><?php echo $hotline['hotline']; ?></span></a><?php endforeach; ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                                
                            <div class="c-col">
                                <div class="l-title">
                                    <h3 class="c-title mb-sp-10">Hỗ trợ khách hàng</h3>
                                </div>
                                <div class="l-content">
                                    <?php
                                        foreach ($customer_support as $item) :
                                        $title = $item['title'];
                                        $link = !empty($item['link']) ? $item['link'] : 'javascript:void(0)';
                                    ?>
                                        <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="c-cols__right">
                        <div class="c-col<?php echo wp_is_mobile() ? ' c-panel js-panel' : ''; ?>">
                            <div class="l-title<?php echo wp_is_mobile() ? ' js-panel-title' : ''; ?>">
                                <h3 class="c-title">Về Enterbuy</h3>
                            </div>
                            <div class="l-content<?php echo wp_is_mobile() ? ' js-panel-content' : ''; ?>">
                                <div class="wraper flex flex-column">
                                    <?php
                                        foreach ($about_enterbuy as $item) :
                                        $title = $item['title'];
                                        $link = !empty($item['link']) ? $item['link'] : 'javascript:void(0)';
                                    ?>
                                        <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php if (wp_is_mobile()) : ?>
                            <div class="c-col<?php echo wp_is_mobile() ? ' c-panel js-panel' : ''; ?>">
                                <div class="l-title<?php echo wp_is_mobile() ? ' js-panel-title' : ''; ?>">
                                    <h3 class="c-title">Hỗ trợ khách hàng</h3>
                                </div>
                                <div class="l-content<?php echo wp_is_mobile() ? ' js-panel-content' : ''; ?>">
                                    <div class="wraper flex flex-column">
                                        <?php
                                            foreach ($customer_support as $item) :
                                                $title = $item['title'];
                                                $link = !empty($item['link']) ? $item['link'] : 'javascript:void(0)';
                                        ?>
                                            <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="c-col<?php echo wp_is_mobile() ? ' c-panel js-panel' : ''; ?>">
                            <div class="l-title<?php echo wp_is_mobile() ? ' js-panel-title' : ''; ?>">
                                <h3 class="c-title">Đối tác</h3>
                            </div>
                            <div class="l-content<?php echo wp_is_mobile() ? ' js-panel-content' : ''; ?>">
                                <div class="wraper flex flex-column">
                                    <?php
                                        foreach ($partners as $item) :
                                        $title = $item['title'];
                                        $link = !empty($item['link']) ? $item['link'] : 'javascript:void(0)';
                                    ?>
                                        <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="c-col<?php echo wp_is_mobile() ? ' c-panel js-panel' : ''; ?>">
                            <div class="l-title<?php echo wp_is_mobile() ? ' js-panel-title' : ''; ?>">
                                <h3 class="c-title">Khác</h3>
                            </div>
                            <div class="l-content<?php echo wp_is_mobile() ? ' js-panel-content' : ''; ?>">
                                <div class="wraper flex flex-column">
                                    <?php
                                        foreach ($others as $item) :
                                            $title = $item['title'];
                                            $link = !empty($item['link']) ? $item['link'] : 'javascript:void(0)';
                                    ?>
                                        <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (wp_is_mobile()) : ?>
                    <div class="c-cols flex-column mt-10">
                        <div class="c-col mt-30 mt-sp-20">
                            <div class="c-license">
                                <div class="item brand-1">
                                    <img src="<?php echo get_home_directory('/wp-content/uploads/images/footer-1.webp'); ?>" alt="" loading="lazy" <?php device_width_height(54, 26, 54, 25); ?>>
                                </div>
                                <div class="item brand-2">
                                    <img src="<?php echo get_home_directory('/wp-content/uploads/images/footer-2.webp'); ?>" alt="" loading="lazy" <?php device_width_height(25, 25, 25, 25); ?>>
                                </div>
                                <a href="http://online.gov.vn/Home/WebDetails/79814" class="item brand-3">
                                    <img src="<?php echo get_home_directory('/wp-content/uploads/images/footer-3.webp'); ?>" alt="logo bộ công thương" loading="lazy" <?php device_width_height(65, 25, 65, 25); ?>>
                                </a>
                                <a href="https://www.dmca.com/Protection/Status.aspx?ID=95e827d6-af20-43a0-bd27-692d642b2268&refurl=https://www.geyser.com.vn/san-pham" class="item brand-4">
                                    <img src="<?php echo get_home_directory('/wp-content/uploads/images/footer-4.webp'); ?>" alt="DMCA.com Protection Status" loading="lazy" <?php device_width_height(93, 16, 93, 16); ?>>
                                </a>
                            </div>
                        </div>
                        <div class="c-col mt-30 mt-sp-30 flex-column">
                            <div class="l-title">
                                <h3 class="c-title mb-sp-10">Theo dõi Enterbuy Việt Nam</h3>
                            </div>
                            <div class="c-social">
                                <?php if ($facebook = $social_information['facebook']) : ?>
                                    <a href="<?php echo $facebook; ?>" class="item logo-facebook">
                                        <img src="<?php echo get_home_directory('/wp-content/uploads/images/icon/logo-facebook.png'); ?>" alt="facebook" loading="lazy" <?php device_width_height(44, 44, 44, 44); ?>>
                                    </a>
                                <?php endif; ?>

                                <?php if ($tiktok = $social_information['tiktok']) : ?>
                                    <a href="<?php echo $tiktok; ?>" class="item logo-tiktok">
                                        <img src="<?php echo get_home_directory('/wp-content/uploads/images/icon/logo-tiktok.png'); ?>" alt="tiktok" loading="lazy" <?php device_width_height(44, 44, 44, 44); ?>>
                                    </a>
                                <?php endif; ?>

                                <?php if ($youtube = $social_information['youtube']) : ?>
                                    <a href="<?php echo $youtube; ?>" class="item logo-youtube">
                                        <img src="<?php echo get_home_directory('/wp-content/uploads/images/icon/logo-youtube.png'); ?>" alt="youtube" loading="lazy" <?php device_width_height(44, 44, 44, 44); ?>>
                                    </a>
                                <?php endif; ?>

                                <?php if ($twitter = $social_information['twitter']) : ?>
                                    <a href="<?php echo $twitter; ?>" class="item logo-twitter">
                                        <img src="<?php echo get_home_directory('/wp-content/uploads/images/icon/logo-twitter.png'); ?>" alt="twitter" loading="lazy" <?php device_width_height(44, 44, 44, 44); ?>>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="footer-since">Enterbuy - Chuyên gia máy lọc nước © Copyright 2025</div>
</foote>