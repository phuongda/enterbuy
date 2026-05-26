<?php if (!wp_is_mobile()) : ?>
    <header class="l-header">
        <div class="l-header-main">
            <div class="l-container">
                <div class="l-nav">
                    <div class="nav-logo">
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_home_directory('/wp-content/uploads/2022/05/enterbuy.png'); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" <?php device_width_height(150, 43, 103, 30); ?>></a>
                    </div>
                    <div class="nav-search">
                        <form class="search-form" method="get" action="<?php echo home_url(); ?>">
                            <input type="hidden" name="post_type" value="product">
                            <input type="text" name="s" class="search-box search-field" placeholder="Vui lòng nhập từ khóa cần tìm kiếm...">
                            <button type="submit" class="search-button btn-submit">
                                <i class="c-icon icon-search-green"></i>
                            </button>
                            <div class="search-results"></div>
                        </form>
                    </div>
                    <div class="nav-other">
                        <?php $hotline = get_field('hotline', 'option'); ?>
                        <a href="tel:<?php echo preg_replace('/[\s\.,]/', '', $hotline); ?>">
                            <i class="c-icon icon-phone-green"></i>
                            <p>Hotline<span><?php echo $hotline; ?></span></p>
                        </a>
                        <a href="<?php echo home_url(); ?>/gio-hang.html" class="nav-btn btn-cart">
                            <i class="c-icon icon-cart-green"></i>
                            <p><span>Giỏ hàng</span></p>
                        </a>
                    </div>
                </div>
                <?php get_template_part( 'template-parts/header/navmenu' ); ?>
            </div>
        </div>
        <?php get_template_part( 'template-parts/header/navcate' ); ?>
    </header>
<?php else : ?>
    <header class="l-header">
        <div class="l-header-main">
            <div class="l-nav">
                <div class="nav-left">
                    <a href="javascript:void(0)" class="nav-menu menu-toggle">
                        <i class="c-icon icon-menu"></i>
                    </a>
                    <div class="nav-logo">
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_home_directory('/wp-content/uploads/2022/05/enterbuy.png'); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" <?php device_width_height(150, 43, 103, 30); ?>></a>
                    </div>
                </div>
                <div class="nav-right">
                    <a class="nav-btn btn-search">
                        <i class="c-icon icon-search"></i>
                    </a>
                    <a href="<?php echo home_url(); ?>/gio-hang.html" class="nav-btn btn-cart">
                        <i class="c-icon icon-cart"></i>
                    </a>
                </div>
            </div>
            <div class="l-nav-search">
                <form class="search-form" method="get" action="<?php echo home_url(); ?>">
                    <input type="search" name="s" class="search-box search-field" placeholder="Vui lòng nhập từ khóa cần tìm kiếm...">
                        <button type="submit" class="search-button btn-submit">
                            <i class="c-icon icon-search-green"></i>
                        </button>
                    <div class="search-results"></div>
                </form>
            </div>
        </div>
        <?php get_template_part( 'template-parts/header/navcate' ); ?>
    </header>
<?php endif; ?>
<div class="clear"></div>
<div class="overlay"></div>
<?php if (wp_is_mobile()) : ?>
  <?php get_template_part( 'template-parts/header/navmenu-sp' ); ?>
  <?php get_template_part( 'template-parts/header/menubar' ); ?>
<?php endif; ?>