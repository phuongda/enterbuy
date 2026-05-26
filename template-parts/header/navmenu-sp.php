<?php
$datas = get_field('header_menu', 'option');
$menu_list = $datas[0]['menu_list'];

$hotline = get_field('hotline', 'option');
?>
<div class="c-menu">
    <div class="menu-top">
        <div class="nav-btns">
            <a href="tel:<?php echo preg_replace('/[\s\.,]/', '', get_field('hotline', 'option')); ?>" class="btn-phone"><i class="c-icon icon-phone"></i>Hotline<strong><?php echo $hotline; ?></strong></a>
            <a class="btn-close menu-close"><i class="c-icon icon-close"></i></a>
        </div>
        <form class="nav-btn btn-search" method="get" action="<?php echo home_url(); ?>">
            <input type="text" name="s" class="search-box" placeholder="Vui lòng nhập từ khóa cần tìm kiếm...">
            <button type="submit" class="search-button btn-submit">
                <i class="c-icon icon-search"></i>
            </button>
            <input type="hidden" name="post_type" value="product">
        </form>
    </div>
    <div class="menu-bottom">
        <div class="c-tabs">
            <span class="item active" data-tab="1">Danh mục</span>
            <span class="item" data-tab="2">Menu</span>
        </div>
        <div id="tab1" class="c-tab-contents is-show">
            <?php if (!empty($menu_list)) : ?>
                <div class="nav-menu-child">
                    <div class="c-childs">
                        <?php
                            foreach ($menu_list as $index => $tab) :
                                $tab_title = $tab['title'];
                                $tab_image = $tab['image'];
                        ?>
                            <a href="javascript:void(0)" class="item have-child" data-tab="content<?php echo $index + 1; ?>">
                                <img class="icon-img" src="<?php echo $tab_image; ?>" loading="lazy">
                                <span><?php echo $tab_title; ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="c-childs-content">
                        <?php
                            foreach ($menu_list as $index => $tab) :
                                $tab_title = $tab['title'];
                                $tab_link = !empty($tab['link']) ? $tab['link'] : 'javascript:void(0)';
                                $brand_list = $tab['brand_filter'];
                                $menu_child = $tab['menu_child'];
                        ?>
                            <div id="content<?php echo $index + 1; ?>" class="item">
                                <div class="wrapper">

                                    <a href="<?php echo $tab_link; ?>" class="tab-link"><span>Tất cả <?php echo mb_strtolower($tab_title); ?></span><i class="c-icon icon-arrow-black"></i></a>

                                    <?php if (!empty($brand_list)) : ?>
                                        <?php
                                            foreach ($brand_list as $index => $brand) :
                                                $brand_title = $brand['title'];
                                                $brand_link = !empty($brand['link']) ? $brand['link'] : 'javascript:void(0)';
                                                $brand_item = $brand['brand_item'];
                                        ?>
                                            <div class="l-child-menu child-brand">
                                                
                                                <?php if (!empty($brand_link)) : ?>
                                                    <a href="<?php echo $brand_link ?>" class="c-title"><?php echo $brand_title ?></a>
                                                <?php else: ?>
                                                    <span class="c-title"><?php echo $brand_title ?></span>
                                                <?php endif; ?>

                                                <?php if (!empty($brand_item)) : ?>
                                                    <div class="c-child-menu">
                                                        <?php
                                                            foreach ($brand_item as $index => $item) :
                                                                $item_image = $item['image'];
                                                                $item_link = $item['link'];
                                                        ?>
                                                            <a href="<?php echo $item_link ?>" class="child-item">
                                                                <img src="<?php echo $item_image ?>" loading="lazy">
                                                            </a>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <?php if (!empty($menu_child)) : ?>
                                        <?php
                                            foreach ($menu_child as $index => $menu_child) :
                                                $menu_child_title = $menu_child['title'];
                                                $menu_child_link = !empty($menu_child['link']) ? $menu_child['link'] : 'javascript:void(0)';
                                                $menu_item = $menu_child['menu_item'];
                                        ?>

                                            <?php if (!empty($brand_list)) : ?>
                                                <div class="flex flex-wrap mt-20">
                                            <?php endif; ?>

                                            <div class="l-child-menu child-link">

                                                <?php if (!empty($menu_child_link)) : ?>
                                                    <a href="<?php echo $menu_child_link ?>" class="c-title"><?php echo $menu_child_title ?></a>
                                                <?php else: ?>
                                                    <span class="c-title"><?php echo $menu_child_title ?></span>
                                                <?php endif; ?>

                                                <?php if (!empty($menu_item)) : ?>
                                                    <div class="c-child-menu">
                                                        <?php
                                                            foreach ($menu_item as $index => $item) :
                                                                $item_title = $item['title'];
                                                                $item_link = $item['link'];
                                                        ?>
                                                            <a href="<?php echo $item_link ?>" class="child-item"><?php echo $item_title ?></a>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <?php if (!empty($brand_list)) : ?>
                                                </div>
                                            <?php endif; ?>

                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div id="tab2" class="c-tab-contents">
            <div class="nav-menu">
                <div class="wraper">
                    <?php
                        foreach ($datas as $index => $menu) :
                            $title = $menu['title'];
                            $link = !empty($menu['link']) ? $menu['link'] : 'javascript:void(0)';
                    ?>
                        <?php if ($index !== 0) : ?>
                            <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>