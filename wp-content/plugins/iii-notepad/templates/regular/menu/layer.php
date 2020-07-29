<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/16/2020
 * Time: 9:27 AM
 */

?>

<p class="block-layer tool-btn tooltip-wrap" id="add-layer">
	<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/layers.png" />
	<span class="hidden tooltip-icon">
		<span class="h"><?php echo esc_html__('Layer tool', 'iii-notepad'); ?></span>
		<span class="t"><?php echo esc_html__('Create, delete and manage the layers', 'iii-notepad'); ?></span>
	</span>
</p>
<div class="hidden layer-class style-popup-layer tool-submenu">
	<ul id="layers-body">
		<li class="close-popup-layer">
			<p id="layer-span">
				<?php echo esc_html__('Layers', 'iii-notepad'); ?>
			</p>
		</li>
		<li class="icon-layer btn-add-layer">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/layer/add.png" />
		</li>
		<li class="icon-layer btn-delete-layer border-bottom">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/layer/delete.png" />
		</li>
		<li class="icon-layer icon-selector active">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/layer/layer-1.png" />
		</li>
	</ul>
</div>
