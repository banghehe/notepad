<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/16/2020
 * Time: 9:26 AM
 */

?>
<p class="tool-btn tooltip-wrap" id="change-eraser">
	<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/eraser.png" />
	<span class="hidden tooltip-icon">
		<span class="h"><?php echo esc_html__('Eraser tool', 'iii-notepad'); ?></span>
		<span class="t"><?php echo esc_html__('Eraser lines and image from screen', 'iii-notepad'); ?></span>
	</span>
</p>
<div class="hidden eraser-class style-popup-eraser tool-submenu">
	<ul id="erasers-body">
		<li class="icon-layer close-popup-eraser">
			<span>
				<?php echo esc_html__('Eraser', 'iii-notepad'); ?>
			</span>
		</li>
		<li class="icon-layer btn-eraser active" data-eraser="30">
			<img style="width: 5px;height: 5px;" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/eraser/1.png" />
		</li>
		<li class="icon-layer btn-eraser" data-eraser="50">
			<img style="width: 8px;height: 8px;" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/eraser/1.png" />
		</li>
		<li class="icon-layer btn-eraser" data-eraser="70">
			<img style="width: 11px;height: 11px;" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/eraser/1.png" />
		</li>
		<li class="icon-layer btn-eraser" data-eraser="90">
			<img style="width: 14px;height: 14px;" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/eraser/1.png" />
		</li>
		<li class="icon-layer btn-eraser" data-eraser="100">
			<img style="width: 18px;height: 18px;" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/eraser/1.png" />
		</li>
		<li class="icon-layer btn-eraser-clear border-bottom">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/eraser-all.png" />
		</li>

	</ul>
</div>
