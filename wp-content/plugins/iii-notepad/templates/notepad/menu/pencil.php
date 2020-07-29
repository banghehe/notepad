<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/16/2020
 * Time: 9:25 AM
 */


?>
<p id="change-size-pencil" class="tool-btn tooltip-wrap" data-layer="1">
	<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/pen.png" />
	<span class="hidden tooltip-icon">
		<span class="h"><?php echo esc_html__('Pen tool', 'iii-notepad'); ?></span>
		<span class="t"><?php echo esc_html__('Draw on the screen', 'iii-notepad'); ?></span>
	</span>
</p>
<div class="hidden pencil-class style-popup-pencil tool-submenu">
	<ul id="pencils-body">
		<li class="icon-layer close-popup-pencil">
			<span style="line-height: 0;" class="icon-layer close-popup-pencil">
				<?php echo esc_html__('Pen', 'iii-notepad'); ?>
			</span>
		</li>
		<li class="icon-layer btn-pencil hr1 active" data-pencil="1">
			<img style="width: 5px;height: 5px" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/pencil/1.png" />
		</li>
		<li class="icon-layer btn-pencil hr2" data-pencil="2">
			<img style="width: 8px;height: 8px" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/pencil/2.png" />
		</li>
		<li class="icon-layer btn-pencil hr3" data-pencil="3">
			<img style="width: 11px;height: 11px" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/pencil/3.png" />
		</li>
		<li class="icon-layer btn-pencil hr4" data-pencil="4">
			<img style="width: 14px;height: 14px" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/pencil/4.png" />
		</li>
		<li class="icon-layer btn-pencil hr5" data-pencil="5">
			<img style="width: 18px;height: 18px" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/pencil/5.png" />
		</li>
	</ul>
</div>
<div class="hidden  hello close-class style-popup-close">
	<div class="col-md-9 text-popup-close">
		<?php echo esc_html__('No layer is selected', 'iii-notepad'); ?>
	</div>
	<div class="col-md-3 no-padding">
		<button type="button" class="red-btn scel-btn close-popup-close">
			<?php echo esc_html__('Cancel', 'iii-notepad'); ?>
		</button>
	</div>
</div>
