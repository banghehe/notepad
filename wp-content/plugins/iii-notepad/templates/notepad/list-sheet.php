<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 3/18/2020
 * Time: 9:28 PM
 */

?>
<div class="w-list hidden notepad-sheet-search">
	<div class="w-list-inner">
		<div class="wls-close">
			<span>
				<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Search_Close.png" />
			</span>
		</div>
		<h3 class="w-list-title">
			<?php echo esc_html__('List of Worksheets', 'iii-notepad'); ?>
		</h3>
		<div class="w-list-searchbox">
			<div class="wls-inner">
				<div class="wls-ctn">
					<input type="text" placeholder="<?php echo esc_html__('Type Worksheet Name', 'iii-notepad'); ?>" />
					<i class="wls-open-subject-list"></i>
					<div class="wls-subject-list">
						<ul>
							<li data-value="" class="active"><?php echo esc_html__('All Subjects', 'iii-notepad'); ?></li>
							<?php $options = iii_notepad_worksheet_select_sheet_subject_from_db(); ?>
							<?php if (!empty($options)) :?>
								<?php foreach ($options as $key => $value) : ?>
									<li data-value="<?php echo esc_attr($key); ?>">
										<?php echo esc_attr($value); ?>
									</li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</div>
					<div class="wls-type" data-state="all">
						<span>
							<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Search_Type_ALL.png" />
						</span>
					</div>
				</div>
				<button class="wls-btn">
					<?php echo esc_html__('Search', 'iii-notepad'); ?>
				</button>
			</div>
		</div>
		<div class="w-list-listworksheet">
			<div class="w-list-row">
				<ul class="wlr-label">
					<li>
						<span>
							<?php echo esc_html__('Name', 'iii-notepad'); ?>
						</span>
					</li>
					<li>
						<span>
							<?php echo esc_html__('Type', 'iii-notepad'); ?>
						</span>
					</li>
				</ul>
				<div class="wlr-content">
					<?php
						$current_user_id_wp = get_current_user_id();
						$list_sheet = iii_notepad_get_list_worksheet_by_teacher($current_user_id_wp);
					?>
					<?php iii_notepad_worksheet_list_sheet_html($list_sheet); ?>
				</div>
			</div>
		</div>
	</div>
</div>



