<?php
/**
 * @package Hamza Lite
 */
?>

<?php
global $post;
$hamza_lite_cat_blog = get_theme_mod('hamza_lite_blog_category');
$hamza_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'hamza-lite-blog-image', false);
?>
<style>

    .entry-thumbnail > img {
        width: 100%;
    }

    .entry-content .fabric-list .fabric-list-li {
        background-color: #f1f1f1;
        border: 1px solid #ccc;
        float: left;
        margin: 5px;
        min-height: 350px;
        width: 250px;
    }

    .fabric-list-li {
        list-style: outside none none;
    }

    center {
        height: 500px;
        width: 100%;
    }

    .entry-content .fabric-list {
        float: left;
        min-height: 750px;
        margin-left: 5px;
        width: 100%;
    }

    .fabric > li {
        list-style: outside none none;
    }

    .fabric {
        margin-left: 0;
    }

    .fabric li:nth-child(odd) {
        background-color: #ccc;
    }

    .fabric li:nth-child(odd) p, .fabric li:nth-child(odd) span {
        color: #fff;
    }

    .set-title {
        background-color: #29bb9c;
        color: #fff;
        padding: 10px;
        font-weight: 700;
        margin-top: 0px;
    }
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <h3 class="set-title"><?php the_title(); ?></h3>
        <div class="entry-thumbnail">
            <img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>"/>
        </div>
    <?php } ?>

    <header class="entry-header clearfix">
        <?php if (has_category($hamza_lite_cat_blog) && !empty($hamza_lite_cat_blog)) { ?>
            <figure class="blog-author-img">
                <?php echo get_avatar(get_the_author_meta('ID'), 62); ?>
            </figure>
        <?php } ?>

        <div class="entry-meta">
            <!-- <h2 class="entry-title"><?php //the_title(); ?></h2>-->
            <?php if (has_category($hamza_lite_cat_blog) && !empty($hamza_lite_cat_blog)) { ?>

                <div class="blog-date">
                    <?php echo get_the_date('F n Y'); ?>
                </div>

                <div class="comment-count">
                    <?php printf(_nx('1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'hamza-lite'), number_format_i18n(get_comments_number())); ?>
                </div>

                <?php
                /* translators: used between list items, there is a space after the comma */
                $hamza_lite_tags_list = get_the_tag_list('', __(', ', 'hamza-lite'));
                if ($hamza_lite_tags_list) :
                    ?>
                    <div class="tags-links">
                        <?php printf(__('%1$s', 'hamza-lite'), $hamza_lite_tags_list); ?>
                    </div>
                <?php endif; // End if $tags_list ?>

                <?php if (function_exists('echo_views')) { ?>
                    <div class="post-view-count">
                        <?php echo_views(get_the_ID()); ?>
                        <?php echo __('Views', 'hamza-lite'); ?>
                    </div>
                <?php } ?>

                <div class="by-line">
                    <?php echo __('By ', 'hamza-lite');
                    the_author_posts_link(); ?>
                </div>

            <?php } ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->


    <div class="entry-content">
        <div class="short-content clearfix"><?php the_field('set_top_desciption'); ?></div>
        <!-- 1st if-->
        <div>
            <?php if (get_field('field_name')) {
                echo "<h3 class=\"bttn\">Out of Stock</h3>";
            } else {
                echo "<span class=\"glyphicon glyphicon-inbox\"></span> In Stock";
            }

            ?>
            <!-- end 1st First -->
            <a href="<?php the_field('set_shipping_option'); ?>">Shipping Details</a>
        </div>
        <?php
        $imgTemp = get_the_post_thumbnail($post->ID, array(50, 50));
        $posts = get_field('set_product_list');

        if ($posts): ?>
            <!-- 2nd if -->
            <center>
                <ul class="fabric-list">
                    <?php
                    $z = 0;

                    foreach ($posts as $post): // variable must be called $post (IMPORTANT)
                    ?>
                    <?php setup_postdata($post); ?>
                    <li class="fabric-list-li">
                        <?php $image = the_post_thumbnail(); ?>

                        <?php if (!empty($image)):; ?>

                        <a href="<?php the_permalink(); ?>">
                            <?php if ($z > 0) {
                                if ($z == 1) {
                                    print "<h3>Tried this yet?</h3>";
                                }

                            } else { ?>
                                <img src="<?php the_post_thumbnail(); ?>"/></a>
                            <?php } ?>

                        <?php else: ?>

                        <?php endif; ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php if (get_field('product_options')):
                            ?><?php echo '<ul class="fabric">'; ?>
                            <?php
                            /* ////////////////////////////////////////////////////////////////////////////*/
                            while (the_flexible_field("product_options")): ?>

                                <?php if (get_row_layout() == "product_options_lay"): // layout: Content ?>


                                    <?php $temp_fab = get_sub_field("fabric");
                                    echo "<li>";
                                    echo "<p>";
                                    echo "<a href='" . post_permalink($temp_fab) . "'>" . get_the_title($temp_fab) . "</a>";
                                    echo "</p>";
                                    echo "<span>";
                                    echo '$';
                                    echo the_sub_field("price");
                                    echo "</span>";
                                    echo "</li>";

                                    ?>
                                <?php else:
                                    //echo"</li><!-_close3-->";
                                    //echo"</ul><!-_close-ul-1-->";
                                    ?>


                                <?php endif; ?>

                            <?php endwhile;
                            echo "</ul><!-_close-ul-fabric-->";

                        /*/////////////////////////////////////////////////////////////////////////*/
                        else:

                        endif; ?>


                        <?php

                        $z++;

                        endforeach;
                        echo "</ul>"; ?>

            </center>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php else :; ?>

            <?php //the_post_thumbnail(array(500,500, true)); ?>
        <?php endif; ?>

        <?php

        ?>
        <div style="border-bottom: 1px solid #ccc;">...</div>
        <?php
        $posts = get_field('set_aditional_sets');

        if ($posts): ?>
            <ul>
                <?php foreach ($posts as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="entry-thumbnail">
                            <img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>"/>
                            </div><?php } ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
        <?php
        $posts = get_field('product_options2');

        if ($posts):
            foreach ($posts as $post): // variable must be called $post (IMPORTANT)
                setup_postdata($post);
                $term_list = wp_get_post_terms($post->ID, 'product_option_category', array("fields" => "slugs"));
                if (!in_array("swatch", $term_list)): ?>
                    <div class="product_option">
                        <?php
                        the_content(); // Print post content
                        ?>
                    </div>
                <?php endif; ?>
                <?php
            endforeach;
        endif;
        wp_reset_postdata();
        ?>
        <p><?php the_field('set_offer'); ?></p>

        <div class="table-responsive"><?php the_field('set_table'); ?></div>
        <script>
            jQuery(document).ready(function ($) {
                var $tableContainer = $(".table-responsive");
                var $theTable = $tableContainer.find('table');
                console.log($theTable.width());
                console.log($theTable.css("width"));
                $theTable.addClass("table");
            });
        </script>

        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php edit_post_link(__('Edit', 'hamza-lite'), '<span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
