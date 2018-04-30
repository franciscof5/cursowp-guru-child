<?php
function redirect_nonloggedin_users($current_uri, $redirect_to) {
    // Redirect users to the homepage
    // Caution! Exclude the homepage from 'Private BuddyPress' options
    // to avoid redirection loops!
    return get_option('siteurl') . '/acesso-restrito/?from=' . $redirect_to;
}

add_filter('pbp_redirect_login_page', 'redirect_nonloggedin_users', 10, 2);

?>