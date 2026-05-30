<?php
$datas = get_field('reasons_block', 'option');

if (!empty($datas)) :
    $title = $datas['title'];
    $img_pc = $datas['image']['image_pc'];
    $img_sp = $datas['image']['image_sp'];
?>
    <section class="l-section l-reasons">
        <h2 class="c-title"><?php echo replace_br($title, true); ?></h2>
        <img src="<?php echo (wp_is_mobile()) ? $img_sp : $img_pc; ?>" loading="lazy">
    </section>
<?php endif; ?>