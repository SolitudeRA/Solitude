<?php get_header("index"); ?>
<?php get_sidebar("left"); ?>
<?php get_sidebar("right"); ?>
<?php get_template_part("template-parts/title/title", "main"); ?>

<?php if (have_posts()) :

    while (have_posts()) : the_post();
        get_template_part("template-parts/post/content", get_post_format());
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

<?php get_footer("index"); ?>

