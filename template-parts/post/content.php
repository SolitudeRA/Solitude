<article id="post-<?php the_ID(); ?>" <?php post_class( "container-full", null ); ?>>

    <header class="post-header">
        <?php if ( "" !== get_the_post_thumbnail() ): ?>
            <div class="row post-thumbnail">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( "" ); ?></a>
            </div><!-- Post thumbnail -->
        <?php endif; ?>
        <div class="row post-title-container">
            <?php if ( is_single() ):
                the_title( "<div class='post-title-single'>", "</div>" );
            else:
                the_title( "<div class='post-title-index'>", "</div>" );
            endif; ?>
        </div>
        <div class="row post-meta-container">
            <section class="post-meta-time">
                <h4><?php _e( "Time posted:", "galaxy-domain" ) ?></h4>
                <?php the_date( "Y F j" ); ?>  <?php the_time( "g:i a" ); ?>
            </section>
            <section class="post-meta-cat">
                <h4><?php _e( "Category", "galaxy-domain" ) ?></h4>
                <?php the_category( " " ); ?>
            </section>
            <section class="post-meta-tags">
                <h4><?php _e( "Tags", "galaxy-domain" ) ?></h4>
                <?php the_tags( null, ",", null ); ?>
            </section>
            <section class="post-meta-edit">
                <?php edit_post_link( __( 'Edit', 'galaxy-domain' ), null, null, null, null ) ?>
            </section>
        </div>
    </header>

    <div class="row post-content">
        <?php the_content( sprintf( __( "Read more...", "galaxy-domain" ), get_the_title() ) ); ?>
    </div>

</article>