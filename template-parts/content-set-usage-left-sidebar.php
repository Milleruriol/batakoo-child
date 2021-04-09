<?php
/**
 * Created by PhpStorm.
 * User: Kyle
 * Date: 12/3/2015
 * Time: 10:08 AM
 */

global $post;
$tags_array = Array();
?>

<div class="side-bar-left col-md-4">
    <h3>Collections</h3>
    <ul id="collection-list">
        <?php while (have_posts()) : the_post(); ?>
            <li><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
    </ul>
    <hr />
    <h3>Categories</h3>
    <ul id="category-list">
        <?php
        //print_r($term_list);

        ?>
        <?php for($i = 1; $i < 25; $i++): ?>
            <li>Category <?php echo $i; ?></li>
        <?php endfor ?>
    </ul>
</div>
