<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/16/2020
 * Time: 9:28 AM
 */

?>

<p class="block-grid tool-btn tooltip-wrap" id="icon-grid">
	<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/grids.png" />
	<span class="hidden tooltip-icon">
		<span class="h"><?php echo esc_html__('Grids tool', 'iii-notepad'); ?></span>
		<span class="t"><?php echo esc_html__('Triggers guidelines and change background colors', 'iii-notepad'); ?></span>
	</span>
</p>
<div class="hidden grid-class style-popup-grid tool-submenu">
	<ul id="grids-body">
		<li class="icon-layer close-popup-grid">
			<span>
				<?php echo esc_html__('Grid', 'iii-notepad'); ?>
			</span>
		</li>
		<li class="icon-layer btn-color-grid active" data-color="#FFFFFF">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/grid/white.png" />
		</li>
		<li class="icon-layer btn-color-grid" data-color="#DDDDDD">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/grid/gray.png" />
		</li>
		<li class="icon-layer btn-color-grid" data-color="#fffdbf">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/grid/yellow.png" />
		</li>
		<li class="icon-layer btn-color-grid border-bottom" data-color="#d1fffe">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/grid/blue.png" />
		</li>
		<li class="icon-layer btn-grid" data-grid="1">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/grid/type1.png" />
		</li>
		<li class="icon-layer btn-grid" data-grid="2">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/grid/type2.png" />
		</li>
	</ul>
</div>