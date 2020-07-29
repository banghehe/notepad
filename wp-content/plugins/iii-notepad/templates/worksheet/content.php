<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/14/2020
 * Time: 10:34 AM
 */

?>

<div id="w-panel" class="">
	<div class="ws-actions-top">
		<div class="ws-mode">
			<input type="hidden" class="ws-mode-input" value="1">
			<div class="btn-ws-mode practice-mode" data-type="1">
				<img class="on" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/icon_07_Practice_ON.png">
				<img class="off" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/icon_08_Practice_OFF.png">
			</div>
			<div class="btn-ws-mode test-mode" data-type="2">
				<img class="on" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/icon_09_Test_ON.png">
				<img class="off" src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/icon_10_Test_OFF.png">
			</div>
		</div>
		<div class="ws-action">
			<div class="ws-clear">
				<span>
					<?php echo esc_html__('Clear', 'iii-notepad'); ?>
				</span>
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/icon_12_Clear_Page.png">
			</div>
			<div class="ws-delete">
				<span>
					<?php echo esc_html__('Close', 'iii-notepad'); ?>
				</span>
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/icon_11_Delete_Worksheet.png">
			</div>
		</div>
	</div>
	<div class="ws-title-subject">
		<div class="ws-title">
			<input type="text" name="ws-title" class="ws-title-input" placeholder="<?php echo esc_html__('Worksheet Title:', 'iii-notepad'); ?>"/>
			<input type="hidden" class="wsid" name="wsid" />
			<input type="hidden" class="wsstate" name="wsstate" value="1" />
			<input type="hidden" class="tid" name="tid" />
			<span class="ws-title-clear">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Title_01_Clear_Title.png" />
			</span>
		</div>
		<div class="ws-subject">
			<select class="iii-select">
				<?php echo iii_notepad_worksheet_create_subject_options(); ?>
			</select>
		</div>
	</div>

	<div class="ws-questions-number">
		<div class="wsq-arrow wsq-arrow-left">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Question_03_Left_Arrow.png" />
		</div>
		<ul>
		</ul>
		<div class="wsq-actions">
			<div class="wsq-insert-single">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Pages_Single_Insert.png" />
			</div>
			<div class="wsq-insert-multi">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Pages_Multiple_Insert.png" />
			</div>
			<div class="wsq-delete-current">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Question_02_Delete.png" />
			</div>
			<div class="wsq-arrow wsq-arrow-right">
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Question_04_Right_Arrow.png" />
			</div>
		</div>
	</div>
	<div class="ws-no-worksheet">
		<div class="ws-no-worksheet-inner">
			<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/No-worksheet_icon.png" />
			<span>
				<?php echo esc_html__('Currently, there is no worksheet. Create a new worksheet by selecting new from the menu', 'iii-notepad'); ?>
			</span>
		</div>
	</div>
</div>
<div class="w-panel-disable"></div>
