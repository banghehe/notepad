<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/14/2020
 * Time: 9:47 AM
 */

global $wp;

$type_id		= $_GET['mode'];
$body_class		= array();
$html_class		= array();

$body_class[] 	= ($type_id == 'ws') ? 'worksheet-on' : '';
$body_class[]	= ($type_id == 'regular') ? 'regular-on' : '';
$body_class[]	= (!$type_id) ? 'none-active notepad-on' : '';

$html_class[] 	= ($type_id == 'ws') ? 'worksheet-on' : '';
$html_class[]	= ($type_id == 'regular') ? 'regular-on' : '';
$html_class[]	= (!$type_id) ? 'notepad-on' : '';


$current_url	= add_query_arg($wp->query_vars, home_url());
?>
<!DOCTYPE html>
<html class="<?php echo implode(' ', $html_class); ?>">
	<head>
		<meta name="google-site-verification" content="WC9FfWNfVRyJn8pWPXTHM4uCe_p-U13-iz0dV8A6puk"/>
		<meta charset="utf-8"/>
		<meta property="og:site_name"
			  content="Real time white board for drawing on line, share photo and capture image from webcam"/>
		<meta property="og:type" content="article"/>
		<meta property="og:url" content="https://vrobbi-nodedrawing.herokuapp.com"/>
		<meta property="fb:admins" content="100004633505284"/>
		<meta property="og:title" content="Real time whiteboard collaborative with chat in html5 and websocket"/>
		<meta property="fb:app_id" content="508864332486444"/>
		<meta name="keywords"
			  content="lavagna collaborativa, disegnare on line, applicazione real time, multiuser whiteboard, realtime application, drawing on line, drawing game, html5, web 2.0, software, internet, image capture, webcam"/>
		<meta name="description"
			  content="lavagna multiutente condivisa in tempo reale, multiuser whiteboard real time application, draw on line and share your draw with all on the net"/>

		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>Notepad and Chating</title>

		<?php wp_head(); ?>
	</head>
	<body class="<?php echo implode(' ', $body_class); ?>">
		<div id="cc-loading"><span></span></div>
		<input type="hidden" class="current_url" value="<?php echo $current_url; ?>">