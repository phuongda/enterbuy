<?php
$datas = get_field('contact_block', 'option');
$is_show_form = true;
$is_not_full = false;

if (isset($not_full) && !empty($not_full)) {
    $is_not_full = true;
}

if (isset($form_type) && $form_type === 'blog') {
    $is_show_form = get_field('show_contact_form');
}

if ($is_show_form) :
    $title = $datas['title'];
    $subtitle = $datas['subtitle'];
    $youtube = $datas['youtube'];
    $youtube = str_replace('iframe', 'iframe loading="lazy"', $youtube);
?>
    <section class="l-section l-advise not-full">
        <h2 class="c-title<?php echo $is_not_full ? ' mx-auto width-auto' : ''; ?>"><?php echo replace_br($title, true); ?></h2>
        <div class="c-cols c-cols--col2 c-cols--col-gap40 align-center">
            <div class="c-col mb-sp-30">
                <?php echo $youtube; ?>
            </div>
            <div class="c-col">
                <h3 class="c-subtitle"><?php echo $subtitle; ?></h3>
                <?php
                    switch ($form_type) {
                        case 'blog':
                            echo do_shortcode('[contact-form-7 id="ec24f97" title="Form Đặt câu hỏi nhận tư vấn" html_class="c-form form-new form-ebook"]');
                            break;
                        case 'contact':
                        default:
                            echo do_shortcode('[contact-form-7 id="641e03e" title="Form Liên hệ" html_class="c-form form-new form-ebook"]');
                            break;
                    }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>