<?php
/**
 * The template part for displaying single posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">	
		<h1 class="entry-title" id="<?php echo $post->post_name; ?>" ><?php echo the_title(); ?></h1>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php	the_content();	?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
