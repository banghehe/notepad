<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/14/2020
 * Time: 10:12 AM
 */

global $wp;
$current_url = add_query_arg($wp->query_vars, home_url());
?>

<div id="menu-top">
	<div class="row">
		<div class="logo fl">
			<a href="#">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/normal/ik_Logo.png" />
			</a>
		</div>
		<div class="actions-r">
			<div class="tb-register">
				<?php if (is_user_logged_in()) : ?>
					<?php $current_user = wp_get_current_user(); ?>
					<div class="tb-user-info">
						<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/login/04_icon_n_user.png" />
						<span>
							<?php echo $current_user->display_name; ?>
						</span>
					</div>
				<?php else : ?>
					<a href="https://iktutor.com/iklearn/en/?r=login&ref=notepad" class="tb-register-btn">
						<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/login/03_icon_n-create_account.png" />
						<span class="tb-register-txt">
							<?php echo esc_html__('Create Account', 'iii-notepad'); ?>
						</span>
					</a>
				<?php endif; ?>
			</div>
			<div class="tb-login">
				<?php if (is_user_logged_in()) : ?>
					<?php $current_user = wp_get_current_user(); ?>
					<a href="<?php echo esc_url(wp_logout_url($current_url)); ?>" class="tb-logout-btn">
						<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/login/02_icon_n_logout.png" />
						<span class="tb-logout-txt">
							<?php echo esc_html__('Logout', 'iii-notepad'); ?>
						</span>
					</a>
				<?php else : ?>
					<a href="javascript::void(0)" class="tb-login-btn">
						<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/login/01_icon_n_login.png" />
						<span class="tb-login-txt">
							<?php echo esc_html__('Login', 'iii-notepad'); ?>
						</span>
					</a>
					<div class="tb-login-popup hidden">
						<form name="tb-login-form" id="tb-login-form" method="post">
							<p class="login-username">
								<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/normal/2_ID.png" />
								<input type="text" name="log" placeholder="<?php echo esc_html__('Username (email)', 'iii-notepad'); ?>" id="user_login" class="input" value="" size="20" />
							</p>
							<p class="login-password">
								<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/normal/3_Password.png" />
								<input type="password" name="pwd" placeholder="<?php echo esc_html__('Password:', 'iii-notepad'); ?>" id="user_pass" class="input" value="" size="20" />
							</p>
							<p class="login-submit">
								<button type="button" id="tb-login-submit" class="button-primary">
									<?php echo esc_html__('Log In', 'iii-notepad'); ?>
								</button>
								<button type="button" id="tb-login-cancel" class="button-primary">
									<?php echo esc_html__('Cancel', 'iii-notepad'); ?>
								</button>
							</p>
						</form>
					</div>
				<?php endif; ?>
			</div>
			<div class="tb-mode">
				<select onchange="window.location.href= this.value">
					<option value="<?php echo esc_url(site_url()); ?>/?mode=regular" selected>
						<?php echo esc_html__('Notepad', 'iii-notepad'); ?>
					</option>
					<option value="<?php echo esc_url(site_url()); ?>">
						<?php echo esc_html__('Tutoring', 'iii-notepad'); ?>
					</option>
					<option value="<?php echo esc_url(site_url()); ?>/?mode=ws">
						<?php echo esc_html__('Worksheet', 'iii-notepad'); ?>
					</option>
				</select>
			</div>
			<div class="full-screen-mode full">
				<p>
					<img class="full" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/normal/01_Icon_Full_Screen.png" />
					<img class="min" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/normal/02_Icon_Min_Screen.png" />
				</p>
			</div>
		</div>
	</div>
</div>
