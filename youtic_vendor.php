<?php
/**
* Plugin Name: Youtic Vendor
* Plugin URI: http://www.youtic.com/
* Description: Youtic admin page on WP and webshop integration.
* Version: 1.0
* Author: Salvatore Ricciu
* Author URI: http://www.youtic.com/
**/

//add menu page
add_action('admin_menu', 'youticAdmin_page');

function youticAdmin_page(){
    add_menu_page( 'Youtic Admin Page', 'Youtic Admin', 'manage_options', 'youticadmin', 'youtic_options','dashicons-cart','27');
}
//function to add webshop shortcode
function add_youtic_shop($atts){
	extract( shortcode_atts( array(
        'vendorid' => '',
        'layout' => '',
    ), $atts)
    );

	return "<div class=\"tygh\" id=\"tygh_container\"></div>				
				<script type=\"text/javascript\">
				(function() { var url = 'https:' == document.location.protocol ? 'https%3A%2F%2Fwww.youtic.com%2F%3Fdispatch%3Dcompanies.products%26company_id%3D".$vendorid."' : 'http%3A%2F%2Fwww.youtic.com%2F%3Fdispatch%3Dcompanies.products%26company_id%3D".$vendorid."'; var cw = document.createElement('script'); cw.type = 'text/javascript'; cw.async = true; cw.src = '//widget.cart-services.com/static/init.js?url=' + url + '&#038;layout%3D".$layout."'; document.getElementById('tygh_container').appendChild(cw); })();
				</script>";
}
add_shortcode ('webshop','add_youtic_shop');

function youtic_options(){
        
	echo "    
		<script>
			$(window).on('load resize', function(){
		    $window = $(window);
		    $('.iframewindow').height(function(){
		        return $window.height()-$(this).offset().top;});
			});</script>
		<iframe class='iframewindow' src='https://www.youtic.com/vendor.php/?sl=en' noresize='noresize' style='frameborder:0; width:100%; height:800px; display:block; margin:0; padding:0; border:0'>
		</iframe>";
}
?>