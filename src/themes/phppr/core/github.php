<?php

session_start();

define( 'AUTORIZE_URL', 'https://github.com/login/oauth/authorize' );
define( 'TOKEN_URL', 'https://github.com/login/oauth/access_token' );
define( 'API_URL_BASE', 'https://api.github.com' );
define( 'AJAX_REDIRECT_URL', get_site_url() . '/wp-admin/admin-ajax.php?action=github_oauth_callback' );

function update_github_option_keys() {
    $phppr_github_tokens = get_option( 'phppr_github_tokens' );
    update_option( "github_app_name", $phppr_github_tokens['github_app_name'] );
    update_option( "github_key", $phppr_github_tokens['github_key'] );
    update_option( "github_secret", $phppr_github_tokens['github_secret'] );
}

add_action( 'init', 'update_github_option_keys', 1 );

function apiRequest($url, $post = false, $headers=array()) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if($post) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    }

    $headers[] = 'Accept: application/json';

    if(session('access_token')) {
        $headers[] = 'Authorization: Bearer ' . session('access_token');
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_USERAGENT, get_option("github_app_name"));

    $response = curl_exec($ch);

    return json_decode($response);
}

function GithubApiRequest($url, $post = false, $headers=array()) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if($post) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    }

    $headers[] = 'Accept: application/json';

    if(session('access_token')) {
        $headers[] = 'Authorization: Bearer ' . get_user_meta(get_current_user_id(), "github_access_token", true);
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_USERAGENT, get_option("github_app_name"));

    $response = curl_exec($ch);

    return json_decode($response);
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

function get($key, $default = null) {
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function session($key, $default = null) {
    return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}

function github_oauth_redirect() {
	global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
	require_once("../wp-load.php");

	define('OAUTH2_CLIENT_ID', get_option("github_key"));
	define('OAUTH2_CLIENT_SECRET', get_option("github_secret"));

	$_SESSION['state'] = hash('sha256', microtime(true).rand().$_SERVER['REMOTE_ADDR']);
	unset($_SESSION['access_token']);
	$params = array(
    	'client_id' => OAUTH2_CLIENT_ID,
    	'redirect_uri' => AJAX_REDIRECT_URL,
    	'scope' => 'user',
    	'state' => $_SESSION['state']
  	);

  	header('Location: ' . AUTORIZE_URL . '?' . http_build_query($params));
	die;
}

add_action("wp_ajax_github_oauth_redirect", "github_oauth_redirect");
add_action("wp_ajax_nopriv_github_oauth_redirect", "github_oauth_redirect");

function update_user_registered($user_id, $github_user_data) {
    $github_username = $github_user_data->login;
    $github_name = $github_user_data->name;
    $github_bio = $github_user_data->bio;
    $github_url = $github_user_data->html_url;

    $array_update_user = array(
        'ID' => $user_id,
        'display_name' => $github_name,
        'description' => $github_bio,
        'user_url' => $github_url
    );

    wp_update_user($array_update_user);
    update_user_meta($user_id, "github_access_token", $_SESSION["access_token"]);
    update_user_meta($user_id, "github_username", $github_username);
    update_user_meta($user_id, "github_url", $github_url);
}

function github_oauth_callback() {
	global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
	require_once("../wp-load.php");

	define('OAUTH2_CLIENT_ID', get_option("github_key"));
	define('OAUTH2_CLIENT_SECRET', get_option("github_secret"));

	if(get('code')) {
  		if(!get('state') || $_SESSION['state'] != get('state')) {
    		header('Location: ' . $_SERVER['PHP_SELF']);
    		die;
  		}
  	}

  	$token = apiRequest(TOKEN_URL, array(
	    'client_id' => OAUTH2_CLIENT_ID,
	    'client_secret' => OAUTH2_CLIENT_SECRET,
	    'redirect_uri' => AJAX_REDIRECT_URL,
	    'state' => $_SESSION['state'],
	    'code' => get('code')
  	));

 	$_SESSION['access_token'] = $token->access_token;

    if(session('access_token')) {
        $user = apiRequest(API_URL_BASE . '/user');
        $github_username = $user->login;

        if(username_exists($github_username)) {
            $user_id = username_exists($github_username);
            wp_set_auth_cookie($user_id);
            update_user_registered($user_id, $user);
            header('Location: ' . get_site_url());
        } else {
            //create a new account and then login
            wp_create_user($github_username, generateRandomString(), $user->email);
            $user_id = username_exists($github_username);
            wp_set_auth_cookie($user_id);
            update_user_registered($user_id, $user);
            header('Location: ' . get_site_url());
        }
    } else {
        header('Location: ' . get_site_url());
    }
    die;
}

add_action("wp_ajax_github_oauth_callback", "github_oauth_callback");
add_action("wp_ajax_nopriv_github_oauth_callback", "github_oauth_callback");
