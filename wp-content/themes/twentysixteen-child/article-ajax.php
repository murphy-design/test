<?php
/*
Template Name: Ajax
*/

get_header(); ?>
<?php echo $numPosts;?>
<script type="text/javascript">
	var ajax_pag = {"ajaxurl":"http:\/\/jordan.website-design-shirley.co.uk\/wp-admin\/admin-ajax.php"};
	var getid = 1;
	
function load_posts(){
	
	jQuery('.article').append( "<div id='loading-content'>loading content</div>" );
	
	jQuery.ajax({
		url: ajax_pag.ajaxurl,
		type: 'post',
		data: {
			action: 'my_ajax_pag',
			numPosts : 1,
			pageNumber: getid
		},
		success: function( html ) {
			jQuery('.article').empty();
			jQuery('.article').append(html);
			//alert(getid);
			var getUrl = jQuery(location).attr('href') + jQuery('.entry-header .entry-title').attr('id');
			history.pushState('data', '', getUrl);
			event.preventDefault();
		},
		error: function (html){
			jQuery('.article').append( "<div id='loading-content'>No Articles</div>" );
		}
	})
}

jQuery(document).ready(function(){
	load_posts();
	jQuery(window).scroll(function(){
		if(jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()){
	  	jQuery("html, body").animate({ scrollTop: 0 }, "slow");
	  	getid++;
	  	history.pushState('data', '', '');
	  	load_posts();
	    
	  }
  }); 
});
	
</script>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="article">
			<!-- Ajax content will go here -->
		</div>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
