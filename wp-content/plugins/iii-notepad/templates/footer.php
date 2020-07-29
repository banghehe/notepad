<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/14/2020
 * Time: 9:48 AM
 */

?>
		<div class="wrapper-bg"></div>
		<div class="user-login-form hidden">
			<div class="userForm">
				<div class="userForm-inner">
					<form class="userLoginForm">
						<div class="user-1 form-section">
							<p>
								<?php echo esc_html__('Login 1', 'iii-notepad'); ?>
							</p>
							<label>
								<?php echo esc_html__('Username (email address', 'iii-notepad'); ?>
							</label>
							<input type="text" name="user1" class="user1"/>
						</div>

						<div class="user-2 form-section">
							<p>
								<?php echo esc_html__('Login 2', 'iii-notepad'); ?>
							</p>
							<label>
								<?php echo esc_html__('Username (email address', 'iii-notepad'); ?>
							</label>
							<input type="text" name="user2" class="user2"/>
						</div>
						<div class="form-section">
							<button type="button" class="userFormSubmit">
								<?php echo esc_html__('Login', 'iii-notepad'); ?>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
