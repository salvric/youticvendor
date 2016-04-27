<?php

/**
* Plugin Name: Youtic Vendor
* Plugin URI: http://www.youtic.com/
* Description: Integrate your youtic webshop in few clicks. This plugin will add a page on your wordpress.  
* Version: 1.0
* Author: Salvatore Ricciu
* Author URI: http://www.youtic.com/
**/

//add menu page
add_action('admin_menu', 'youticAdmin_page');

function youticAdmin_page(){
    add_menu_page( 'Youtic Admin Page', 'Youtic', 'manage_options', 'youticadmin', 'youtic_options','youtic_admin_options','dashicons-cart','27');
}
//register settings
add_action( 'admin_init', 'register_test_plugin_settings' );
function register_test_plugin_settings() {
    //register our settings
    register_setting( 'test-plugin-settings-group', 'new_option_name' );
    register_setting( 'test-plugin-settings-group', 'some_other_option' );
}

function youtic_options(){
        echo "<h1>Welcome to the Youtic admin panel</h1>";
        echo "<h3>Digit your vendor ID and the layout you want to render on your webshop</h3><br/>";

	    add_action( 'add_meta_boxes', 'cd_meta_box_add' );
		function cd_meta_box_add()
			{
	    		  add_meta_box( 'my-meta-box-id', 'Youtic Vendor', 'meta_box', 'page', 'normal', 'high' );
	    	}	  
	   function meta_box()
			{
    			echo 'What you put here, show\'s up in the meta box';   
			}
      
        //echo "<iframe src='https://www.youtic.com/vendor.php/?sl=en' width='100%' height='800px'></iframe>";
        //include 'form.php';
        //global $vendorID;
        //global $layout;
        //$vendorID = $_POST['vendorID'];
        //$layout = $_POST['layout'];
}

function youticEshop ($pluginCode){
	//$vendorID  = "D56";
	//$layout = "2";
	//global $vendorID;
	//global $layout;
	$pluginCode = "<div class=\"tygh\" id=\"tygh_container\"></div>				
				<script type=\"text/javascript\">
				(function() { var url = 'https:' == document.location.protocol ? 'https%3A%2F%2Fwww.youtic.com%2F%3Fdispatch%3Dcompanies.products%26company_id%3D".$vendorID."' : 'http%3A%2F%2Fwww.youtic.com%2F%3Fdispatch%3Dcompanies.products%26company_id%3D".$vendorID."'; var cw = document.createElement('script'); cw.type = 'text/javascript'; cw.async = true; cw.src = '//widget.cart-services.com/static/init.js?url=' + url + '&#038;layout=".$layout."'; document.getElementById('tygh_container').appendChild(cw); })();
				</script>";
	return $pluginCode;
}
add_filter ('the_content', 'youticEshop');
?>