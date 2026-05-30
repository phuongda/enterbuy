<?php
$datas = get_field('solution_block', 'option');

if (!empty($datas)) :
    $title = $datas['title'];
    $img_pc = $datas['image']['image_pc'];
    $img_sp = $datas['image']['image_sp'];
    $solutions = $datas['solution_item'];
?>
    <section class="l-section l-solution">
        <h2 class="c-title center"><?php echo replace_br($title, true); ?></h2>
        <div class="c-cols c-cols--col2">
            <div class="c-col col-left">
                <img src="<?php echo (wp_is_mobile()) ? $img_sp : $img_pc; ?>" loading="lazy">
            </div>
            <div class="c-col col-right">
                <div class="c-solution">
                <?php
                    foreach ($solutions as $item) :
                    $solution_title = $item['title'];
                    $solution_content = $item['content'];
                ?>
                    <div class="item js-panel">
                        <div class="title js-panel-title">
                            <h3><?php echo $solution_title; ?></h3>
                        </div>
                        <div class="content js-panel-content">
                            <p><?php echo $solution_content; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>