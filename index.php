<?php get_header(); ?>

    <body <?php body_class(); ?>>
    
    <?php get_sidebar(); ?>

    <article>
        <?php if ( have_posts() ) :
            
            while ( have_posts() ) : the_post();
                
                get_template_part( "template-parts/post/content", get_post_format() );
            
            endwhile;
            
            the_posts_pagination( array(
                "mid_size"           => "",
                "prev_text"          => "",
                "next_text"          => "",
                "before_page_number" => ""
            ) );
        
        else : get_404_template();
        
        endif;
        ?>
    </article>

    <script src=""></script>
    <script src=""></script>
    </body>

<?php get_footer(); ?>