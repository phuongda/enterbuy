<?php
  /* Template Name: Top Page */
?>
<?php get_header(); ?>

<main class="l-main">
    <div class="l-container">
        <?php get_template_part( 'template-parts/top/content-mainvisual' ); ?>
        <?php get_template_part( 'template-parts/top/content-highlight' ); ?>
        <?php get_template_part( 'template-parts/top/content-brand' ); ?>
        <?php get_template_part( 'template-parts/top/content-hotsale' ); ?>
        <?php get_template_part( 'template-parts/top/content-solution' ); ?>
        <?php get_template_part( 'template-parts/top/content-products' ); ?>
        <?php get_template_part( 'template-parts/top/content-reasons' ); ?>
        <?php get_template_part( 'template-parts/top/content-advise' ); ?>
        <?php get_template_part( 'template-parts/top/content-press' ); ?>
        <?php get_template_part( 'template-parts/top/content-videos' ); ?>
        <?php get_template_part( 'template-parts/top/content-news' ); ?>
    </div>
</main>

<?php get_template_part( 'template-parts/top/content-showroom' ); ?>

<?php get_footer(); ?>