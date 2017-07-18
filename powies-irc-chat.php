<?php
/*
Plugin Name: Powie's IRC Chat
Plugin URI: http://www.powie.de
Description: IRC Chat with Coolsmile Applet
Version: 0.9.2
License: Bearware 4,8% - GPLv2
Author: Thomas Ehrhardt
Author URI: http://www.powie.de
*/

//Define some stuff
define( 'PIRC_PLUGIN_DIR', dirname( plugin_basename( __FILE__ ) ) );

//create custom plugin settings menu
add_action('admin_menu', 'pirc_create_menu');
add_action('admin_init', 'pirc_register_settings' );
add_action('init', 'pirc_translation');
add_shortcode('pirc', 'pirc_shortcode');
//Hook for Activation
register_activation_hook( __FILE__, 'pirc_activate' );
//Hook for Deactivation
register_deactivation_hook( __FILE__, 'pirc_deactivate' );

function pirc_create_menu() {
	//options page
	add_options_page(__('PIRC Settings', 'pirc'),__('PIRC Settings', 'pirc'), 9,  PIRC_PLUGIN_DIR.'/pirc_settings.php');
}

function pirc_translation(){
	load_plugin_textdomain( 'pirc', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

function pirc_register_settings() {
	//register settings
	register_setting( 'pirc-settings', 'pirc-server' );
	register_setting( 'pirc-settings', 'pirc-port', 'intval' );
	register_setting( 'pirc-settings', 'pirc-join' );
	register_setting( 'pirc-settings', 'pirc-width' , 'intval' );
	register_setting( 'pirc-settings', 'pirc-height' , 'intval' );
}

function pirc_shortcode( $atts ) {
	//var_Dump($atts);
	/*
	extract( shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts ) );
	return "Hallo -> foo = {$foo}";
	*/
	$server = get_option('pirc-server');
	$port = get_option('pirc-port');
	$join = get_option('pirc-join');
	$width = get_option('pirc-width');
	$height = get_option('pirc-height');
	if ($width < 100 ) { $width = 640; }
	if ($height < 100 ) { $height = 400; }
	//User Nick
	if(!is_user_logged_in()) {
		$nickname = __('Guest??', 'pirc');
		$realname = __('WP pirc', 'pirc');
	} else {
		global $current_user;
		get_currentuserinfo();
		$nickname = $current_user->display_name;
		$realname = $current_user->user_firstname.' '.$current_user->user_lastname;
	}
	$codebase = plugins_url('powies-irc-chat/chat');
	//output
	$sc = '<!-- pirc Plugin Output -->';
	$sc.='<applet codebase="'.$codebase.'" code="EIRC.class" name="coolsmile" width="'.$width.'" height="'.$height.'">
	<PARAM name="archive" value="EIRC.jar,EIRC-cfg.jar">
	<PARAM name="cabbase" value="EIRC.cab,EIRC-cfg.cab">
	<PARAM name="server" value="'.$server.'">
	<PARAM name="port" value="'.$port.'">
	<PARAM name="ssl" value="0">
	<PARAM name="irc_pass" value="">
	<PARAM name="font_name" value="SansSerif">
	<PARAM name="font_size" value="11">
	<PARAM name="language" value="">
	<PARAM name="mainbg" value="#809BDC">
	<PARAM name="mainfg" value="#000000">
	<PARAM name="textbg" value="#FFFFFF">
	<PARAM name="textfg" value="#000000">
	<PARAM name="selbg" value="#F0F0FF">
	<PARAM name="selfg" value="#000000">
	<PARAM name="join" value="'.$join.'">
	<PARAM name="username" value="pirc">
	<PARAM name="realname" value="'.$realname.'">
	<PARAM name="nickname" value="'.$nickname.'">
	<PARAM name="user_modes" value="">
	<PARAM name="nicksrv_pass" value="">
	<PARAM name="login" value="1">
	<PARAM name="asl" value="0">
	<PARAM name="spawn_frame" value="0">
	<PARAM name="disabled_cmds" value="">
	<PARAM name="gui_nick" value="1">
	<PARAM name="gui_away" value="1">
	<PARAM name="gui_chanlist" value="1">
	<PARAM name="gui_userlist" value="1">
	<PARAM name="gui_options" value="1">
	<PARAM name="gui_help" value="1">
	<PARAM name="gui_connect" value="1">
	<PARAM name="width" value="700">
	<PARAM name="height" value="500">
	<PARAM name="write_color" value="12">
	<PARAM name="userid" value="">
	<PARAM name="configuration" value="">
	<PARAM name="debug_traffic" value="0">
	<PARAM name="boxmessage" value="Please wait while loading chat box...">
	<PARAM name="boxbgcolor" value="blue">
	<PARAM name="boxfgcolor" value="black">
	<PARAM name="progressbar" value="true">
	<PARAM name="progresscolor" value="red">
	<B>You must enable or <A HREF="http://www.java.com">setup Java</A> in your web browser !</B>
	</APPLET>';
	$sc.='<!-- /pirc Plugin Output -->';
	return $sc;
}

//Activate
function pirc_activate() {
	// do not generate any output here
}

//Deactivate
function pirc_deactivate() {
	// do not generate any output here
}

?>