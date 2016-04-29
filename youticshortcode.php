<?php
//function to add webshop shortcode
function add_youtic_shop($atts){
	extract( shortcode_atts( array(
        'vendorid' => '',
        'layout' => '',
    ), $atts)
    );

	return "<div class=\"tygh\" id=\"tygh_container\"></div>				
				<script type=\"text/javascript\">
				(function() { var url = 'https:' == document.location.protocol ? 'https%3A%2F%2Fwww.youtic.com%2F%3Fdispatch%3Dcompanies.products%26company_id=".$vendorid."' : 'http%3A%2F%2Fwww.youtic.com%2F%3Fdispatch%3Dcompanies.products%26company_id=".$vendorid."'; var cw = document.createElement('script'); cw.type = 'text/javascript'; cw.async = true; cw.src = '//widget.cart-services.com/static/init.js?url=' + url + '&#038;layout=".$layout."'; document.getElementById('tygh_container').appendChild(cw); })();
				</script>";
}

add_shortcode ('webshop','add_youtic_shop');

?>