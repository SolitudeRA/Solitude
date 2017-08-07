<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="post-header">
        <?php if ( "" !== get_the_post_thumbnail() && ! is_single() ): ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( "" ); ?></a>
            </div><!-- Post thumbnail -->
        <?php endif; ?>
        <div class="post-meta">
            <section class="post-meta-time">
                <h4><?php _e( "Time posted:", "galaxy-domain" ) ?></h4>
                <?php the_date( "Y F j" ); ?><?php the_time( "g:i a" ); ?>
            </section>
            <section class="post-meta-cat">
                <h4><?php _e( "Category", "galaxy-domain" ) ?></h4>
                <?php the_category( " " ); ?>
            </section>
            <section class="post-meta-tags">
                <h4><?php _e( "Tags", "galaxy-domain" ) ?></h4>
                <?php the_tags( "", ",", "" ); ?>
            </section>
            <section class="post-meta-edit">
                <?php edit_post_link( __( 'Edit', 'galaxy-domain' ), "", "", null, "" ) ?>
            </section>
        </div>
    </header>

</article>