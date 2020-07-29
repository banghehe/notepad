<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/14/2020
 * Time: 9:48 AM
 */

$template = new III_Notepad_Template();

?>

<?php $template->get_template_part('header'); ?>
<div id="online-learning">
	<div class="container-fluid">
		<?php $template->get_template_part('worksheet/topbar'); ?>
		<?php $template->get_template_part('worksheet/menu'); ?>
		<div class="row wrapper_contend" id="wrapper">
			<div class="col-md-8 main-content main-worksheet">
				<?php $template->get_template_part('worksheet/notice'); ?>
				<?php $template->get_template_part('worksheet/sample'); ?>
				<?php $template->get_template_part('worksheet/content'); ?>
				<?php $template->get_template_part('worksheet/search'); ?>
				<?php $template->get_template_part('worksheet/preview'); ?>
			</div>
		</div>
	</div>
</div>
<?php $template->get_template_part('footer'); ?>