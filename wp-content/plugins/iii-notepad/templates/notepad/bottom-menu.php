<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/14/2020
 * Time: 10:18 AM
 */

?>


<div class="row bottom-menu">
	<div class="actionOnRight">
		<div class="block-chat">






			<p class="toogle-menu-tray active">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/01_icon_Chat_Participants.png" />
			</p>
<!--			<p class="pop-chat active">-->
<!--				<img src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets/images/reveal/01_icon_Chat_Participants.png" />-->
<!--			</p>-->
			<p class="video-mode">
				<a href="http://localhost/3i/zoom?username=<?php if (is_user_logged_in()) : ?><?php $current_user = wp_get_current_user(); ?><?php echo $current_user->display_name; ?><?php endif; ?>" target="_blank">
					<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/02_icon_VideoMode.png" />
				</a>
			</p>
			<p class="video_list">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/06_icon_Visable_ON.png" />
			</p>
			<p id="catturacam" class="">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/04_icon_Sound_ON.png" />
			</p>
		</div>
		<div class="block-video">
			<p class="switch hidden" id="toggleVideoMute">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/07_icon_Visable_OFF.png" />
			</p>
		</div>
		<div class="block-voice hidden">
			<p class="switch" id="toggleAudioMute">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/05_icon_Sound_OFF.png" alt="Voice" />
			</p>
		</div>
	</div>
</div>
<div class="popUpBtn">
	<p>
		<img class="fl img-fluid clickToHideBottom" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/08_icon_Bottom_Close.png" alt="Hide"/>
	</p>
	<p>
		<img class="fl img-fluid clickToShowBottom" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/09_icon_Bottom_Open.png" alt="Show" />
	</p>
</div>
<div class="end-notepad">
	<p>
		<img class="" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/17_icon_Active_Close.png" />
	</p>
</div>
<div class="video-mode-content">
	<div class="video-mode-content-inner">
		<ul>
			<li class="sl">
				<span class="img">
					<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/20_icon_Video_SLIDE.png" />
				</span>
				<span class="txt">
					<?php echo esc_html__('Slide', 'iii-notepad'); ?>
				</span>
			</li>
			<li class="fs">
				<span class="img">
					<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/21_icon_Video_FULLSCREEN.png" />
				</span>
				<span class="txt">
					<?php echo esc_html__('Full Screen', 'iii-notepad'); ?>
				</span>
			</li>
			<li class="noac">
				<span class="img">
					<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/22_icon_Video_ACTIVE_disable.png" />
				</span>
				<span class="txt">
					<?php echo esc_html__('Active Speaker', 'iii-notepad'); ?>
				</span>
			</li>
			<li class="cl noac">
				<span class="img">
					<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/video/23_icon_Video_CLOSE_disable.png" />
				</span>
				<span class="txt">
					<?php echo esc_html__('Close Video', 'iii-notepad'); ?>
				</span>
			</li>
		</ul>
	</div>
</div>
