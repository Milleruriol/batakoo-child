<?php
global $post;
?>
<div class="col-sm-3 col-lg-3 col-md-3">
    <article id="post-<?php the_ID(); ?>" class="thumbnail">
        <div class="set-thumb">
            <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '');
            $url = $thumb['0']; ?>
            <a href="<?php the_permalink(); ?>">
                <img class="img-responsive" src="<?php echo $url; ?>" alt=""/>
            </a>
            <?php /*the_post_thumbnail('', array('class' => "img-responsive")); */ ?>
        </div>
        <div class="caption">
            <h4>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h4>

            <div class="entry-summary">
                <?php /*the_excerpt(); */ ?>
            </div><!-- .entry-summary -->
            <!--<div style="height: 25px;">
                <p>
                    <a href="<?php /*the_permalink(); */ ?>"
                       class="btn btn-block btn-default pull-right">
                        Learn More
                    </a>
                </p>
            </div>-->
        </div>
    </article>
</div>