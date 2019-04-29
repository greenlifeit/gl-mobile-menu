<?php

/*
 * Plugin Name: Paira Mobile Menu
 */

/**
 * Enqueue Paira Scripts.
 */
function paira_menu_enqueue_scripts() {
    // Detect plugin. For use on Front End only.
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    if ( is_plugin_active( 'paira-mobile-menu/paira-mobile-menu.php' ) ) {
        wp_enqueue_style( 'slicknav', plugins_url( '/css/slicknav.css', __FILE__ ) );
        wp_enqueue_script( 'jquery.slicknav', plugins_url( '/js/jquery.slicknav.min.js', __FILE__ ), array( 'jquery' ) );
    } else {
        wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/inc/paira-mobile-menu/css/slicknav.css' );
        wp_enqueue_script( 'jquery.slicknav', get_template_directory_uri() . '/inc/paira-mobile-menu/js/jquery.slicknav.min.js', array( 'jquery' ) );
    }
}

add_action( 'wp_enqueue_scripts', 'paira_menu_enqueue_scripts' );

/**
 * Active Slicknav Menu.
 */
function paira_active_menu_scripts() {
    ?>
    <script>
        jQuery(document).ready(function ($) {
            var sknav_id = $('#paira-menu');
            var sknav_btn = $('.slicknav_btn');
            var sknav_append = sknav_btn.parent();

            sknav_id.slicknav({
                label: '',
                appendTo: sknav_append,
                openedSymbol: '<i class="fa fa-minus-circle"></i>',
                closedSymbol: '<i class="fa fa-plus-circle"></i>',
                removeClasses: true,
                allowParentLinks: true,
            });

            sknav_btn.click(function () {
                sknav_id.slicknav('toggle');
            });

        });
    </script>
    <?php

}

add_action( 'wp_footer', 'paira_active_menu_scripts' );