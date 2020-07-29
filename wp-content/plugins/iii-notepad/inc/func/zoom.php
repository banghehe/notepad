<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 3/24/2020
 * Time: 9:11 AM
 */

if (!function_exists('iii_notepad_zoom_create_meeting')) {
	function iii_notepad_zoom_create_meeting() {
		$user_id	= '4N0k0DepQO2Oy3jxtcGQFg';
		$token		= 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IkFqZkx2WTQ1UzYyaVRnZ2tLRHd3TVEiLCJleHAiOjE1ODU3MTE4ODcsImlhdCI6MTU4NTcwNjQ4N30.8MRkZ8azscRuOszFVGHGAP2o4EVAeT4QU7LWsvnB-wI';

		$curl = curl_init();

		$args = array(
			'topic'			=> 'Test Chat 1',
			'type'			=> 2,
//			'start_time'	=> current_time('Y-m-d'),
//			'duration'		=> 30,
//			'timezone'		=> '',
			'password'		=> '',
//			'agenda'		=> '',
//			'recurrence'	=> array(
//				'type'				=> '',
//				'repeat_interval'	=> '',
//				'weekly_days'		=> '',
//				'monthly_day'		=> '',
//				'monthly_week'		=> '',
//				'monthly_week_day'	=> '',
//				'end_times'			=> '',
//				'end_date_time'		=> '',
//			),
			'settings'		=> array(
				'host_video'				=> true,
				'participant_video'			=> true,
//				'cn_meeting'				=> '',
//				'in_meeting'				=> '',
				'join_before_host'			=> true,
//				'mute_upon_entry'			=> '',
//				'watermark'					=> '',
//				'use_pmi'					=> '',
				'approval_type'				=> 2,
//				'registration_type'			=> 1,
//				'audio'						=> '',
//				'auto_recording'			=> '',
//				'enforce_login'				=> false,
//				'enforce_login_domains'		=> '',
//				'alternative_hosts'			=> '',
//				'global_dial_in_countries'	=> array()
			),
//			'registrants_email_notification'	=> '',
		);

		curl_setopt_array($curl, array(
			CURLOPT_URL				=> 'https://api.zoom.us/v2/users/' . $user_id . '/meetings',
			CURLOPT_RETURNTRANSFER	=> true,
			CURLOPT_ENCODING		=> '',
			CURLOPT_MAXREDIRS		=> 10,
			CURLOPT_TIMEOUT			=> 30,
			CURLOPT_HTTP_VERSION	=> CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST	=> 'POST',
			CURLOPT_POSTFIELDS		=> json_encode($args),
			CURLOPT_HTTPHEADER		=> array(
				'authorization: Bearer ' . $token,
				'content-type: application/json'
		  ),
		));

		$response	= curl_exec($curl);
		$err		= curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
			exit;
		} else {
			echo json_encode($response);
			exit;
		}
	}

	add_action('wp_ajax_iii_notepad_zoom_create_meeting', 'iii_notepad_zoom_create_meeting');
	add_action('wp_ajax_nopriv_iii_notepad_zoom_create_meeting', 'iii_notepad_zoom_create_meeting');
}