<?php
function redirect_nonloggedin_users($current_uri, $redirect_to) {
    // Redirect users to the homepage
    // Caution! Exclude the homepage from 'Private BuddyPress' options
    // to avoid redirection loops!
    return get_option('siteurl') . '/acesso-restrito/?from=' . $redirect_to;
}

add_filter('pbp_redirect_login_page', 'redirect_nonloggedin_users', 10, 2);

function wpdocs_child_theme_setup() {
    load_child_theme_textdomain( 'iamd_text_domain', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wpdocs_child_theme_setup' );

function my_home_category( $query ) {
 if ( $query->is_home() && $query->is_main_query() ) {
 $query->set( 'cat', '28');
 }
}
add_action( 'pre_get_posts', 'my_home_category' );



?>