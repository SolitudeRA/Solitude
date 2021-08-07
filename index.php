<?php get_header("index"); ?>
<?php get_sidebar("left"); ?>

<?php get_template_part("template-parts/index/index", "main"); ?>

<?php if (have_posts()):

    while (have_posts()):the_post();
        if (has_post_format()):
            get_template_part("template-parts/post/content", get_post_format());
        else:
            get_template_part("template-parts/post/content", "default");
        endif;

    endwhile;
else:
    get_404_template();
endif; ?>

<?php get_sidebar("bottom"); ?>
<?php get_footer("index"); ?>

