<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title">
                    <?php single_cat_title(); ?>
                </h1>
            </header><!-- .page-header -->
            <?php get_template_part('template-parts/content', 'set-usage-left-sidebar'); ?>

            <div class="content-area col-md-8" id="primary">
                <?php /* Start the Loop */ ?>
                <?php $index = 0;
                while (have_posts()) :
                the_post(); ?>
                <?php /* Include the Post-Format-specific template for the content.         * If you want to override this in a child theme, then include a file         * called content-___.php (where ___ is the Post Format name) and that will be used instead.         */
                if ($index == 0):
                    echo '<div class="row">'; ?>

                <?php elseif ($index % 4 == 0):
                echo '</div>'; ?>
                <div class="row">
                    <?php endif;
                    get_template_part('template-parts/content', 'set-category');
                    $index++; ?>
                    <?php endwhile; ?>
                    <div class="clear"></div>
                    <?php else : ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    <?php endif; ?>
                </div>
            </div><!-- #primary -->
        </div><!-- .row -->
    </div>
<?php get_footer(); ?>