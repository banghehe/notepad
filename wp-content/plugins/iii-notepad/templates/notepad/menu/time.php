<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/16/2020
 * Time: 9:30 AM
 */
global $wpdb;

$user_id			= is_user_logged_in() ? wp_get_current_user()->ID : '';
$student_plan 		= $wpdb->get_row("SELECT * FROM {$wpdb->prefix}dict_tutoring_plan WHERE id_user = '" . $user_id . "' AND tutor_id = '" . $teacher_id . "' AND id = '" . $sid . "'");
$student_point		= get_user_meta($user_id, 'user_points', true);
$time				= is_object($student_plan) ? $student_plan->time : '';
$time				= str_replace(':am', ' AM', $time);
$time				= str_replace(':pm', ' PM', $time);
$time_arr			= explode('~', $time);
$time_ranger		= 1800;

if (!empty($time_arr) && $time_arr[0] != '') {
	$time_ranger = strtotime($time_arr[1]) - strtotime($time_arr[0]);
}

wp_localize_script('iii-notepad-script', 'iii_variable', array(
	'time_ranger'	=> $time_ranger,
));

//point
$price_tutoring = get_user_meta($user_id, 'price_tutoring', true);
$point_required = empty($price_tutoring) ? 15 : $price_tutoring;
?>
<div class="block-right">
	<p class="block-time hidden">
		<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/icons/icon_Timer.png" alt="Timer">
	</p>
	<span class="time-class fr">
		<?php echo sprintf('%02d:%02d:%02d', ($time_ranger/3600),($time_ranger/60%60), $time_ranger%60); ?>
	</span>
	<p id="time-action">
		<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/regular/icon_Main_Menu_Trigger.png" />
	</p>
	<div class="time-menu-popup hidden">
		<ul>
			<li class="btn-extend-time">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/regular/icon_menu_Extend_Time.png" />
				<span>
					<?php echo esc_html__('Extend Time', 'iii-notepad'); ?>
				</span>
			</li>
			<li class="btn-close-session">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/regular/icon_menu_Exit.png" />
				<span>
					<?php echo esc_html__('Exit Tutoring Seassion', 'iii-notepad'); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="popup-time-extend hidden">
		<div class="pte-content">
			<div class="pte-top">
				<div class="icon">
					<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/regular/icon_notice.png" />
				</div>
				<div class="ct">
					<span class="notice"><?php echo esc_html__('Extension requires ', 'iii-notepad'); ?><strong><?php echo esc_attr($point_required); ?> points for 30 munites</strong></span>
					<div class="ctc">
						<label>
							<?php echo esc_html__('Extension time:', 'iii-notepad'); ?>
						</label>
						<select name="time" value="30" data-time="<?php echo esc_attr($point_required); ?>">
							<option value="30"><?php echo esc_html__('30 min', 'iii-notepad'); ?></option>
							<option value="60"><?php echo esc_html__('01 hr', 'iii-notepad'); ?></option>
							<option value="90"><?php echo esc_html__('01 hr 30 min', 'iii-notepad'); ?></option>
							<option value="120"><?php echo esc_html__('02 hr', 'iii-notepad'); ?></option>
							<option value="150"><?php echo esc_html__('02 hr 30 min', 'iii-notepad'); ?></option>
							<option value="180"><?php echo esc_html__('03 hr', 'iii-notepad'); ?></option>
							<option value="210"><?php echo esc_html__('03 hr 30 min', 'iii-notepad'); ?></option>
							<option value="240"><?php echo esc_html__('04 hr', 'iii-notepad'); ?></option>
						</select>
					</div>
				</div>
			</div>
			<div class="pte-bot">
				<div class="icon">
					<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/regular/icon_menu_Points.png" />
				</div>
				<div class="time-info">
					<ul>
						<li class="total">
							<label>
								<?php echo esc_html__('Time Extension Fee', 'iii-notepad'); ?>
							</label>
							<span><?php echo $point_required . esc_html__(' points'); ?></span>
						</li>
						<li class="user-point">
							<label>
								<?php echo esc_html__('My Total Points', 'iii-notepad'); ?>
							</label>
							<span><?php echo $student_point . esc_html__(' points'); ?></span>
						</li>
					</ul>
				</div>
			</div>
			<div class="pte-btn">
				<button type="button" class="pte-ok">
					<?php echo esc_html__('Accept', 'iii-notepad'); ?>
				</button>
				<button type="button" class="pte-close">
					<?php echo esc_html__('Decline', 'iii-notepad'); ?>
				</button>
			</div>
		</div>
	</div>
</div>