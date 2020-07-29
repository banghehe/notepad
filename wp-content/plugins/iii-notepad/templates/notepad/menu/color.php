<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/16/2020
 * Time: 9:27 AM
 */

?>

<p class="tool-btn tooltip-wrap" id="change-color">
	<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/color/top/black.png" alt="Colors">
	<span class="hidden tooltip-icon">
		<span class="h"><?php echo esc_html__('Color tool', 'iii-notepad'); ?></span>
		<span class="t"><?php echo esc_html__('Select a line color', 'iii-notepad'); ?></span>
	</span>
</p>
<div class="hidden color-class style-popup-color tool-submenu">
	<ul id="colors-body">
		<li class="icon-layer close-popup-color">
			<span>
				<?php echo esc_html__('Color', 'iii-notepad'); ?>
			</span>
		</li>
		<li class="icon-layer btn-color" data-color="#ffffff" data-image-url="white.png">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/color/white.png" />
		</li>
		<li class="icon-layer btn-color active" data-color="#000000" data-image-url="black.png">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/color/black.png" />
		</li>
		<li class="icon-layer btn-color" data-color="#0000FF" data-image-url="blue.png">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/color/blue.png" />
		</li>
		<li class="icon-layer btn-color" data-color="#FF0000" data-image-url="red.png">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/color/red.png" />
		</li>
		<li class="icon-layer btn-color" data-color="#008000" data-image-url="green.png">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/color/green.png" />
		</li>
		<li class="icon-layer btn-color" data-color="#C500AF" data-image-url="redPurple.png">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/color/light_purple.png" />
		</li>
		<li class="icon-layer btn-color" data-color="#FF8D15" data-image-url="orange.png">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/color/orange.png" />
		</li>
		<li class="icon-layer btn-color" data-color="#8E3AFF" data-image-url="purple.png">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/color/purple.png" />
		</li>
	</ul>
</div>
