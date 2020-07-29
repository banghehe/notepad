<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/17/2020
 * Time: 1:43 PM
 */

?>
<div class="w-notice">
	<div class="ws-notice hidden">
		<div class="ws-notice-inner">
			<div class="wsn-left">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Icon_Warning.png" class="" />
				<p class="wsn-text"></p>
				<input type="hidden" class="wsn-type" />
			</div>
			<div class="wsn-right">
				<div class="wsn-btn">
					<span class="wsn-btn-yes wsn-btn-only-yes">
						<?php echo esc_html__('Yes', 'iii-notepad'); ?>
					</span>
					<span class="wsn-btn-yes wsn-btn-ok">
						<?php echo esc_html__('Ok', 'iii-notepad'); ?>
					</span>
					<span class="wsn-btn-no">
						<?php echo esc_html__('No', 'iii-notepad'); ?>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
