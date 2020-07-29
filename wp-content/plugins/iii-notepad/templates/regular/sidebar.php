<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/16/2020
 * Time: 10:24 AM
 */

$default_image	= III_NOTEPAD_PLUGIN_DIR_URL . 'assets\images\notepad\sidebar\Profile_User.png';
$user_avatar	= '';
$user_name		= '';
$total			= '';

if (is_user_logged_in()) {
	$current_user 	= wp_get_current_user();
	$user_name		= $current_user->data->display_name;
	$user_avatar	= get_user_meta($current_user->ID, 'ik_user_avatar', true);
	$total			= '(1)';
	$avatar_img		= '<img src ="' . $user_avatar . '" />';
}

?>
<div class="col-4 sb-right">
	<div class="opacitySideMenu">
		<div class="opacitySideMenu-inner">
			<div class="opactiyPercentage">
				<p id="rangevalue"></p><span>%</span>
			</div>
			<div class="editBar">
				<input type="range" class="slider" name="bgopacity" id="bgopacity" value="100" min="0" max="100" step="1" />
			</div>
<!--			<div class="closeSideMenu">-->
<!--				<p class="phideSideMenu">-->
<!--					<img class="img-fluid fr hideSideMenu" src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets\images\reveal\08_icon_Menu_Close.png" alt="close" />-->
<!--				</p>-->
<!--				<p>-->
<!--					<img class="img-fluid fr showSideMenu hidden" src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets\images\reveal\09_icon_Menu_Open.png" alt="open" />-->
<!--				</p>-->
<!--			</div>-->
		</div>
		<p class="tit-head"><?php echo esc_html__('Participants', 'iii-notepad'); ?> <span><?php echo esc_attr($total); ?><span></p>
		<div class="hidden-participant-btn">
			<img class="on" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\video/12_icon_Side_Close.png" />
			<img class="off" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\video/13_icon_Side_Open.png" />
		</div>
		<div class="hide-participant-line hidden"></div>
	</div>

	<div id="videoAndMic" class="hidden">
		<div class="turnVideo hidden">
			<p class="On_Video hidden">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar/Video_Chat_ON.png" />
				<span><?php echo esc_html__('Video Is On', 'iii-notepad'); ?></span>
			</p>
			<p class="Off_Video hidden">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar/Video_Chat_OFF.png" />
				<span><?php echo esc_html__('Video Is Off', 'iii-notepad'); ?></span>
			</p>
		</div>
		<div class="turnMic hidden">
			<p class="On_Mic hidden">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar/Video_Chat_ON.png" />
				<span><?php echo esc_html__('Mic Is On', 'iii-notepad'); ?></span>
			</p>
			<p class="Off_Mic hidden">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar/Video_Chat_OFF.png" />
				<span><?php echo esc_html__('Mic Is Off', 'iii-notepad'); ?></span>
			</p>
		</div>
	</div>

	<div class="wrap-sidebar-left">
		<div class="menu-tray show-both" style="display: block">
			<div class="attend-list style-scrollbar" style="display: block">
				<div class="row list_participants">
					<ul>
						<li class="item-list">
							<div class="avatar-attend">
								<?php echo $avatar_img; ?>
							</div>
							<p class="text-overfl">
								<?php echo esc_attr($user_name); ?>
							</p>
						</li>
					</ul>
				</div>

				<div class="clearfix"></div>
			</div>

			<div class="attend-video-list">
				<div class="row">
					<div class="col-md-12">
						<div class="participantLowerBottom">
							<img class="img-fluid" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar\Status_TooFast.png" />
						</div>
						<div class="participantLowerBottom">
							<img class="img-fluid" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar/Status_TooFast.png" />
						</div>
						<div class="participantLowerBottom">
							<img class="img-fluid" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar/Status_TooFast.png" />
						</div>
						<div class="participantLowerBottom">
							<img class="img-fluid" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar/Status_TooFast.png" />
						</div>
						<div class="participantLowerBottom">
							<img class="img-fluid" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar/Status_TooFast.png" />
						</div>
					</div>
				</div>
			</div>

			<div class="chat_box" style="display: block;">
				<div class="ui-resizable-handle ui-resizable-n"></div>
				<div id="chat" class="message-list">
					<ul id="testichat" class="inbox-message">
					</ul>
				</div>
				<div class="start-tutoring">
					<span>
						<?php echo esc_html__('Start Tutoring', 'iii-notepad'); ?>
					</span>
				</div>
				<div class="message-send">
					<div class="float-left message-input">
						<input type="text" id="scrivi" rows="1" name="message-input" placeholder="<?php echo esc_html__('Type Your Message Here...', 'iii-notepad'); ?>" />
						<input type="hidden" id="emoji" name="emoji" value="default"/>
					</div>

					<div class="button-send float-left">
						<div id="btn-send">
							<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\video\16_icon_Chat_Enter_Arrow.png" />
							</div>
						<div class="status-selector">
							<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\video/15_Icon_Status_Default.png" />
						</div>
					</div>
					<div class="status-selector-bar" style="display: none; ">
						<ul>
							<li class="ic-fast" data-type="fast">
								<p><?php echo esc_html__('Too Fast', 'iii-notepad'); ?></p>
								<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar\Status_TooFast.png" />
							</li>
							<li class="ic-confused" data-type="confused">
								<p><?php echo esc_html__('Confused', 'iii-notepad'); ?></p>
								<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar\Status_Confused.png" />
							</li>
							<li class="ic-understand" data-type="understand">
								<p><?php echo esc_html__('Good', 'iii-notepad'); ?></p>
								<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets\images\notepad\sidebar\Status_Good.png" />
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
