<?php
/**
 * Template part for displaying posts
 *
 *
 * @package Starry Solitude Studio
 * @subpackage Solitude
 * @since Solitude 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="post-header ">
        <?php if ("" !== get_the_post_thumbnail()): ?>
            <div class="row">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(""); ?></a>
            </div><!-- Post thumbnail -->
        <?php endif; ?>
        <div class="row post-title-container">
            <?php if (is_single()):
                the_title("<div class='post-title-single col-common-3 col-common-offset-4 col-fhd-expand-4 col-wqhd-expand-4 col-fhd-expand-offset-6 col-wqhd-expand-offset-6'>", "</div>");
            else:
                the_title("<div class='post-title-index col-common-3 col-common-offset-4 col-fhd-expand-4 col-wqhd-expand-4 col-fhd-expand-offset-6 col-wqhd-expand-offset-6'>", "</div>");
            endif; ?>
        </div>
        <div class="row post-meta-container">
            <div class="post-meta-time col-iPad-3 col-iPadPro-3 col-fhd-expand-4 col-wqhd-expand-4">
                <?php _e("Time posted:", "galaxy-domain") ?>
                <?php the_date("Y F j"); ?><?php the_time("g:i a"); ?>
            </div>
            <div class="post-meta-cat col-iPad-3 col-iPadPro-3 col-fhd-expand-4 col-wqhd-expand-4">
                <?php _e("Category", "galaxy-domain") ?>
                <?php the_category(" "); ?>
            </div>
            <div class="post-meta-tags col-iPad-3 col-iPadPro-3 col-fhd-expand-4 col-wqhd-expand-4">
                <?php _e("Tags", "galaxy-domain") ?>
                <?php the_tags(null, ",", null); ?>
            </div>
        </div>
    </div>

    <div class="row post-content">
        <?php the_content(sprintf(__("Read more...", "galaxy-domain"), get_the_title())); ?>
    </div>

</div>