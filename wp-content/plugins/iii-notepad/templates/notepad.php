<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/14/2020
 * Time: 9:48 AM
 */

if (!isset($_GET['user_id']) || !isset($_GET['teacher_id']) || !isset($_GET['sid'])) {
	//return;
}

if ($current_user_id_wp != $student_id && $current_user_id_wp != $teacher_id) {
	//return;
}

$current_user_id_wp = get_current_user_id();
$student_id 		= $_GET['user_id'];
$teacher_id 		= $_GET['teacher_id'];
$sid 				= $_GET['sid'];
$type_id			= $_GET['mode'];

$uid1 	= $_GET['uid1'];
$uid2	= $_GET['uid2'];
$roomid	= ($uid1 && $uid2) ? 'r' . $uid1 . '_' . $uid2 . 'm' : 'public';


if ($student_id && $teacher_id) {
	$roomid	= 'r' . $student_id . '_' . $teacher_id . 'm';
}

$roomid = $roomid . 'iii';
$roomid	= substr($roomid, 0, 6);

$template = new III_Notepad_Template();

wp_localize_script('iii-notepad', 'iii_script', array(
	'roomid' 		=> $roomid,
	'user_id'		=> $student_id,
	'teacher_id'	=> $teacher_id,
	'sid'			=> $sid,

));

?>

<?php $template->get_template_part('header'); ?>
<div id="online-learning">
	<div class="container-fluid">
		<?php $template->get_template_part('notepad/topbar'); ?>
		<?php $template->get_template_part('notepad/menu'); ?>
		<div class="row wrapper_contend" id="wrapper">
			<?php $template->get_template_part('notepad/content'); ?>
			<?php $template->get_template_part('notepad/sidebar'); ?>
		</div>
		<?php $template->get_template_part('notepad/bottom-menu'); ?>
		<?php $template->get_template_part('notepad/list-sheet'); ?>
	</div>
</div>
<?php $template->get_template_part('notepad/popup'); ?>
<?php $template->get_template_part('footer'); ?>