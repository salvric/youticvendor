<?php
/**
* Plugin Name: Youtic widget
* Plugin URI: http://www.youtic.com/
* Description: Integrate your youtic webshop in few clicks. This plugin will add a page on your wordpress .  
* Version: 1.0
* Author: Salvatore Ricciu
* Author URI: http://www.youtic.com/
**/

//add menu page
add_action('admin_menu', 'youticwidget_page');

function youticwidget_page(){
    add_menu_page( 'Youtic Admin Page', 'Youtic', 'manage_options', 'youticwidget', 'youtic_options','youtic_admin_options','dashicons-cart','28');
}

//register settings
add_action( 'admin_init', 'regYoutic_plugin_settings' );
function regYoutic_plugin_settings() {
    //register our settings
    register_setting( 'test-plugin-settings-group', 'vendorID' );
    register_setting( 'test-plugin-settings-group', 'layout' );
}

function youtic_admin_options(){
?>
        <h1>Welcome to the Youtic admin panel</h1>
        <h3>Digit your vendor ID and the layout you want to render on your webshop</h3>
	    <h1>Test Plugin</h1>
    	<form method="post" action="options.php">
        <?php settings_fields( 'test-plugin-settings-group' ); ?>
        <?php do_settings_sections( 'test-plugin-settings-group' ); ?>
        <table class="form-table">
          <tr valign="top">
          <th scope="row">Vendor ID :</th>
          <td><input type="text" name="vendorID" value="<?php echo get_option( 'vendorID' ); ?>"/></td>
          </tr>
          <tr valign="top">
          <th scope="row">Layout :</th>
          <td><input type="text" name="layout" value="<?php echo get_option( 'layout' ); ?>"/></td>
          </tr>
        </table>
    <?php submit_button(); ?>
    </form>

<?php } ?>

<!--
//include 'form.php';
//global $vendorID;
//global $layout;
//$vendorID = $_POST['vendorID'];
//$layout = $_POST['layout'];
//function youticEshop ($pluginCode){
	//$vendorID  = "56";
	//$layout = "2";
	//global $vendorID;
	//global $layout;
	$pluginCode = "<div class=\"tygh\" id=\"tygh_container\"></div>				
				<script type=\"text/javascript\">
				(function() { var url = 'https:' == document.location.protocol ? 'https%3A%2F%2Fwww.youtic.com%2F%3Fdispatch%3Dcompanies.products%26company_id%3D".$vendorID."' : 'http%3A%2F%2Fwww.youtic.com%2F%3Fdispatch%3Dcompanies.products%26company_id%3D".$vendorID."'; var cw = document.createElement('script'); cw.type = 'text/javascript'; cw.async = true; cw.src = '//widget.cart-services.com/static/init.js?url=' + url + '&#038;layout=".$layout."'; document.getElementById('tygh_container').appendChild(cw); })();
				</script>";
	return $pluginCode;
}
add_filter ('the_content', 'youticEshop');*/
?>-->