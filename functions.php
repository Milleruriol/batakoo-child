<?php /* This Section start, It is Function that create a Post Type Called Product */

function my_custom_post_product() {

$labels = array(

'name'               => _x( 'Products', 'post type general name' ),

'singular_name'      => _x( 'Product', 'post type singular name' ),

'add_new'            => _x( 'Add New', 'product' ),

'add_new_item'       => __( 'Add New Product' ),

'edit_item'          => __( 'Edit Product' ),

'new_item'           => __( 'New Product' ),

'all_items'          => __( 'All Products' ),

'view_item'          => __( 'View Product' ),

'search_items'       => __( 'Search Products' ),

'not_found'          => __( 'No products found' ),

'not_found_in_trash' => __( 'No products found in the Trash' ),

'parent_item_colon'  => '',

'menu_name'          => 'Products'

);

$args = array(

'labels'        => $labels,

'description'   => 'Holds our products and product specific data',

'public'        => true,

'menu_position' => 5,

'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),

'has_archive'   => true,

'taxonomies' => array('claim','allergen','ou','kosher'),

);

register_post_type( 'product', $args );

}

/* This Section ends, It is Function that create a Post Type Called Product */



/* This Section start, It is Function that create a Taxonomy Called Product Categories */

add_action( 'init', 'my_custom_post_product' );

function my_taxonomies_product() {

$labels = array(

'name'              => _x( 'Product Categories', 'taxonomy general name' ),

'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),

'search_items'      => __( 'Search Product Categories' ),

'all_items'         => __( 'All Product Categories' ),

'parent_item'       => __( 'Parent Product Category' ),

'parent_item_colon' => __( 'Parent Product Category:' ),

'edit_item'         => __( 'Edit Product Category' ),

'update_item'       => __( 'Update Product Category' ),

'add_new_item'      => __( 'Add New Product Category' ),

'new_item_name'     => __( 'New Product Category' ),

'menu_name'         => __( 'Product Categories' ),

);

$args = array(

'labels' => $labels,

'hierarchical' => true,

'show_ui'               => true,

'show_admin_column'     => true,

'query_var'             => true,

);

register_taxonomy( 'product_category', 'product', $args );

}

add_action( 'init', 'my_taxonomies_product', 1 );

/* This Section ends, It is Function that create a Taxonomy Called Product Categories*/



/* This Section start, It is Function that create a Post Type Called Product */

function my_custom_post_set() {

$labels = array(

'name'               => _x( 'Sets', 'post type general name' ),

'singular_name'      => _x( 'Set', 'post type singular name' ),

'add_new'            => _x( 'Add New', 'set' ),

'add_new_item'       => __( 'Add New Set' ),

'edit_item'          => __( 'Edit Set' ),

'new_item'           => __( 'New Set' ),

'all_items'          => __( 'All Sets' ),

'view_item'          => __( 'View Set' ),

'search_items'       => __( 'Search Sets' ),

'not_found'          => __( 'No sets found' ),

'not_found_in_trash' => __( 'No sets found in the Trash' ),

'parent_item_colon'  => '',

'menu_name'          => 'Sets'

);

$args = array(

'labels'        => $labels,

'description'   => 'Holds our sets and set specific data',

'public'        => true,

'menu_position' => 5,

'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),

'has_archive'   => true,

'taxonomies' => array('set'),

);

register_post_type( 'set', $args );

}

add_action( 'init', 'my_custom_post_set' );

/* This Section ends, It is Function that create a Post Type Called Product */

function my_taxonomies_claim() {
    $labels = array(
        'name'              => _x( 'Category', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Category Tags' ),
        'all_items'         => __( 'All Category Tags' ),
        'parent_item'       => __( 'Parent Category Tag' ),
        'parent_item_colon' => __( 'Parent Category Tag:' ),
        'edit_item'         => __( 'Edit Category Tag' ),
        'update_item'       => __( 'Update Category Tag' ),
        'add_new_item'      => __( 'Add New Category Tag' ),
        'new_item_name'     => __( 'New Category Tag' ),
        'menu_name'         => __( 'Category Tags' ),
    );
    $args = array(

        'labels'                => $labels,
        'hierarchical'          => false,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'public'               => true
    );
    register_taxonomy( 'category', 'set', $args );
}
add_action( 'init', 'my_taxonomies_claim', 1 );

/* This Section start, It is Function that create a Taxonomy Called Product Categories */

function set_usage() {

$labels = array(

'name'              => _x( 'Set Usages', 'taxonomy general name' ),

'singular_name'     => _x( 'Set Usage', 'taxonomy singular name' ),

'search_items'      => __( 'Search Set Usages' ),

'all_items'         => __( 'All Set Usages' ),

'parent_item'       => __( 'Parent Set Usage' ),

'parent_item_colon' => __( 'Parent Set Usage:' ),

'edit_item'         => __( 'Edit Set Usage' ),

'update_item'       => __( 'Update Set Usage' ),

'add_new_item'      => __( 'Add New Set Usage' ),

'new_item_name'     => __( 'New Set Usage' ),

'menu_name'         => __( 'Set Usage' ),

);

$args = array(

'labels' => $labels,

'hierarchical' => true,

'show_ui'               => true,

'show_admin_column'     => true,

'query_var'             => true,

);

register_taxonomy( 'set-usage', 'set', $args );

}

add_action( 'init', 'set_usage', 1 );

/* This Section ends, It is Function that create a Taxonomy Called Product Categories*/

