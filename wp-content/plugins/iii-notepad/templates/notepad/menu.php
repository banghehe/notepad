<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/14/2020
 * Time: 10:13 AM
 */

$template		= new III_Notepad_Template();
?>

<div id="menu-main">
	<div class="row">
		<div class="no-padding border-r">
			<div class="row taskbar-notepad r-taskbar">
				<div class="block-toolbar">
					<div class="block-ws">
						<?php $template->get_template_part('notepad/menu/ws'); ?>
					</div>
					<div class="block-control fl">
						<?php $template->get_template_part('notepad/menu/pencil'); ?>
						<?php $template->get_template_part('notepad/menu/eraser'); ?>
						<?php $template->get_template_part('notepad/menu/color'); ?>
						<?php $template->get_template_part('notepad/menu/layer'); ?>
						<?php $template->get_template_part('notepad/menu/grid'); ?>
					</div>
					<?php $template->get_template_part('notepad/menu/action'); ?>
				</div>
				<div class="block-reveal left">
					<p class="img-height" id="reveal-icon-left">
						<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/reveal/10_icon_More_menus.png" />
					</p>
					<p class="img-height" id="reveal-icon-right">
						<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/reveal/11_icon_More_menus_Open.png" />
					</p>
				</div>
				<?php $template->get_template_part('notepad/menu/time'); ?>
			</div>
		</div>
	</div>
</div>