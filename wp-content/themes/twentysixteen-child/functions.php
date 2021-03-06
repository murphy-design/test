<?php 
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function my_enqueue_assets() {
   //wp_enqueue_script( 'ajax-pagination',  get_stylesheet_directory_uri() . '/custom.js', array( 'jquery' ), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'my_enqueue_assets'); 

function my_ajax_pag() {
		$numPosts = (isset($_POST['numPosts'])) ? $_POST['numPosts'] : 0;
		$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
		$my_query = new WP_Query(array(
			 'posts_per_page' => $numPosts,
       'paged'          => $page
			 ));
			while ( $my_query->have_posts() ) : $my_query->the_post();
				get_template_part( 'article-single');
				//$post_id = $my_query->ID;
 			endwhile;
    die();
}

add_action( 'wp_ajax_my_ajax_pag', 'my_ajax_pag' );
add_action( 'wp_ajax_nopriv_my_ajax_pag', 'my_ajax_pag' );

?>