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
				<div class="block-ws">
					<?php $template->get_template_part('regular/menu/ws'); ?>
				</div>
				<div class="block-control fl">
					<?php $template->get_template_part('regular/menu/pencil'); ?>
					<?php $template->get_template_part('regular/menu/eraser'); ?>
					<?php $template->get_template_part('regular/menu/color'); ?>
					<?php $template->get_template_part('regular/menu/layer'); ?>
					<?php $template->get_template_part('regular/menu/grid'); ?>
				</div>
				<?php $template->get_template_part('regular/menu/action'); ?>
			</div>
		</div>
	</div>
</div>