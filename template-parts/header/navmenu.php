<?php
$datas = get_field('header_menu', 'option');

if (!empty($datas)) :
?>
    <div class="l-nav-menu">
        <div class="c-nav-menu">
            <?php
                foreach ($datas as $menu) :
                    $title = $menu['title'];
                    $link = !empty($menu['link']) ? $menu['link'] : 'javascript:void(0)';
                    $icon_class = $menu['icon_class'];
                    $menu_list = $menu['menu_list'];
            ?>
        
                <?php if (!empty($menu_list)) : ?>
                    <div class="item-menus">
                <?php endif; ?>

                <a href="<?php echo $link; ?>" class="item-menu<?php echo !empty($menu_list) ? ' have-child' : ''; ?>">
                    <?php if ($icon_class) : ?>
                        <i class="c-icon <?php echo $icon_class ?>"></i>
                    <?php endif; ?>
                    <span><?php echo $title; ?></span>
                </a>

                <?php if (!empty($menu_list)) : ?>
                    <div class="nav-menu-child">
                        <div class="c-childs">
                        <?php
                            foreach ($menu_list as $index => $tab) :
                                $tab_title = $tab['title'];
                                $tab_link = !empty($tab['link']) ? $tab['link'] : 'javascript:void(0)';
                                $tab_image = $tab['image'];
                        ?>
                            <a href="<?php echo $tab_link; ?>" class="item have-child" data-tab="content<?php echo $index + 1; ?>">
                                <img class="icon-img" src="<?php echo $tab_image; ?>" loading="lazy" <?php device_width_height(25, 25, 25, 25); ?>>
                                <span><?php echo $tab_title; ?></span>
                            </a>
                        <?php endforeach; ?>
                        </div>
                        <div class="c-childs-content">
                            <?php
                                foreach ($menu_list as $index => $tab) :
                                    $brand_list = $tab['brand_filter'];
                                    $menu_child = $tab['menu_child'];
                            ?>
                                <div id="content<?php echo $index + 1; ?>" class="item">
                                    <div class="wrapper">

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
                                                                    <img src="<?php echo $item_image ?>" loading="lazy" <?php device_width_height(144, 50, 133, 50); ?>>
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

                <?php if (!empty($menu_list)) : ?>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>