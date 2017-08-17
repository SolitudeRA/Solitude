<article id="post-<?php the_ID(); ?>" <?php post_class("row container-full col-iPad-12 col-iPadPro-12 col-laptop-12 col-fhd-12 col-wqhd-12", null); ?>>

    <header class="post_header">
        <?php if ("" !== get_the_post_thumbnail() && !is_single()): ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(""); ?></a>
            </div><!-- Post thumbnail -->
        <?php endif; ?>
        <div class="post_title">
            <?php if (is_single()):
                the_title(null, null);
            else:
                the_title(null, null);
            endif; ?>
        </div>
        <div class="post_meta">
            <section class="post_meta_time">
                <h4><?php _e("Time posted:", "galaxy-domain") ?></h4>
                <?php the_date("Y F j"); ?>  <?php the_time("g:i a"); ?>
            </section>
            <section class="post_meta_cat">
                <h4><?php _e("Category", "galaxy-domain") ?></h4>
                <?php the_category(" "); ?>
            </section>
            <section class="post_meta_tags">
                <h4><?php _e("Tags", "galaxy-domain") ?></h4>
                <?php the_tags(null, ",", null); ?>
            </section>
            <section class="post_meta_edit">
                <?php edit_post_link(__('Edit', 'galaxy-domain'), null, null, null, null) ?>
            </section>
        </div>
    </header>

    <div class="post_content">
        <?php the_content(sprintf(__("Read more...", "galaxy-domain"), get_the_title())); ?>
    </div>

</article>