<?php get_header("index"); ?>
<?php get_sidebar("left"); ?>
<?php get_sidebar("right"); ?>

<?php if (have_posts()) :

    while (have_posts()) : the_post();
        if (has_post_format()) :
            get_template_part("template-parts/post/content", get_post_format());
        endif;
        get_template_part("template-parts/content/content");
    endwhile;

    the_posts_pagination(array(
        "mid_size" => "10",
        "prev_text" => "",
        "next_text" => "",
        "before_page_number" => ""
    ));

else : get_404_template();
endif;
?>

<?php get_sidebar("bottom"); ?>
<?php get_footer("index"); ?>

