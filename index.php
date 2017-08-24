<?php get_header(); ?>

<div class="container-full">
    <?php get_sidebar("left"); ?>

    <div class="posts-container">
        <?php if(have_posts()) :

            while(have_posts()) : the_post();

                get_template_part("template-parts/post/content", get_post_format());

            endwhile;

            the_posts_pagination(array(
                                     "mid_size"           => "",
                                     "prev_text"          => "",
                                     "next_text"          => "",
                                     "before_page_number" => ""
                                 ));

        else : get_404_template();

        endif;
        ?>
    </div>

</div>
<?php get_footer(); ?>

