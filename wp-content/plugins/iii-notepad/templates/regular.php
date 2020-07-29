<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 3/27/2020
 * Time: 4:25 PM
 */ 

$template = new III_Notepad_Template();
?>
<?php $template->get_template_part('header'); ?>
<div id="online-learning">
	<div class="container-fluid">
		<?php $template->get_template_part('regular/topbar'); ?>
		<?php $template->get_template_part('regular/menu'); ?>
		<div class="row wrapper_contend" id="wrapper">
			<?php $template->get_template_part('regular/content'); ?>
			<?php $template->get_template_part('regular/sidebar'); ?>
		</div>
	</div>
</div>
<?php $template->get_template_part('regular/bottom-menu'); ?>
<?php $template->get_template_part('footer'); ?>