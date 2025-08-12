<?php
/*
* Plugin Name: GL Mobile Menu
* Plugin URI: https://greenlifeit.com/plugins/
* Description: WordPress plugin to Add a responsive mobile menu to your website.
* Version: 1.0.0
* Author: Asiqur Rahman <asiq.webdev@gmail.com>
* Author URI: https://asique.net/
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: gl-mobile-menu
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue Scripts.
 */
function gl_mobile_menu_enqueue_scripts() {
    // if jquery not registered then register it.
    if ( ! wp_script_is( 'jquery', 'registered' ) ) {
        wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, '1.12.4', true );
    }
    
    wp_enqueue_style( 'slicknav', plugins_url( '/css/slicknav.css', __FILE__ ) );
    wp_enqueue_script( 'jquery.slicknav', plugins_url( '/js/jquery.slicknav.min.js', __FILE__ ), array( 'jquery' ) );
}

add_action( 'wp_enqueue_scripts', 'gl_mobile_menu_enqueue_scripts', 99 );

/**
 * Display Slicknav Menu.
 */
function gl_mobile_menu_frontend_button() {
    echo '<div class="gl-mobile-menu-wrapper"><button class="gl-mobile-menu-btn">Open Mobile Menu</button></div>';
}

//add_action( 'wp_body_open', 'gl_mobile_menu_frontend_button' );

/**
 * Active Slicknav Menu.
 */
function gl_mobile_menu_active_scripts() {
    ?>
	<script>
		jQuery( document ).ready( function ( $ ) {
			var sknav_id = $( '#modal-1-content ul.wp-block-page-list' );

//			var sknav_btn = $( '.gl-mobile-menu-btn' );
//			var sknav_append = sknav_btn.parent();
			
			sknav_id.slicknav( {
				label: '',
//				appendTo: sknav_append,
				openedSymbol: '<i class="fa fa-minus-circle"></i>',
				closedSymbol: '<i class="fa fa-plus-circle"></i>',
				removeClasses: true,
				allowParentLinks: true,
			} );

//			sknav_btn.click( function () {
//				sknav_id.slicknav( 'toggle' );
//			} );
		} );
	</script>
    <?php
}

add_action( 'wp_footer', 'gl_mobile_menu_active_scripts' );
