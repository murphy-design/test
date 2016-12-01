var ajax_pagination = {"ajaxurl":"http:\/\/jordan.website-design-shirley.co.uk\/wp-admin\/admin-ajax.php"};
var getid = 1;
	
function load_posts(){
	jQuery('.article').append( "<div id='loading-content'>loading content</div>" );
	var id_post = jQuery('.entry-header').attr('id');
	
	jQuery.ajax({
		url: ajax_pagination.ajaxurl,
	    type: 'post',
	    data: {
	      action: 'my_ajax_pagination',
	      post_id: id_post
	    },
	    success: function( html ) {   
				jQuery('.article').empty();
				jQuery('.article').append(html);
				alert(id_post);
				var getUrl = jQuery(location).attr('href') + jQuery('.entry-header .entry-title').attr('id');
				history.replaceState('data', '', getUrl);
				event.preventDefault();
	    }
		})
}

jQuery(document).ready(function(){
	
	load_posts();
	jQuery(window).scroll(function(){
		if(jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()){
	  	load_posts(getid);
	    getid++;
	    alert ('bottom');
	  }
  }); 
});