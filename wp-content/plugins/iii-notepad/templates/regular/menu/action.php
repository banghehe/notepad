<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/16/2020
 * Time: 9:29 AM
 */

?>
<div class="block-image fl">
	<p id="add-type-box" class="tooltip-wrap">
		<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/text_box.png" />
		<span class="hidden tooltip-icon">
			<span class="h"><?php echo esc_html__('Text tool', 'iii-notepad'); ?></span>
			<span class="t"><?php echo esc_html__('Create text on the screen', 'iii-notepad'); ?></span>
		</span>
	</p>
	<p class="add-image tooltip-wrap">
		<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/upload_image.png" />
		<input id="file-input" class="form-control inputfile input-sm" type="file">
		<span class="hidden tooltip-icon">
			<span class="h"><?php echo esc_html__('Image tool', 'iii-notepad'); ?></span>
			<span class="t"><?php echo esc_html__('Insert images from the local drive', 'iii-notepad'); ?></span>
		</span>
	</p>
	<div class="hidden np-sheet-info"></div>
	<p id="icon-screenshot tooltip-wrap">
		<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/screenShot.png" />
		<span class="hidden tooltip-icon">
			<span class="h"><?php echo esc_html__('Capture Image', 'iii-notepad'); ?></span>
			<span class="t"><?php echo esc_html__('Take a screenshots', 'iii-notepad'); ?></span>
		</span>
	</p>
	<div class="hidden screenshot-class style-popup-screenshot">
		<p class="name-popup">
			<?php echo esc_html__('Capture Images', 'iii-notepad'); ?>
		</p>
		<ul>
			<li class="item-screenshot" style=" padding-right: 20px">
				<input type="checkbox" class="checkbox-style" id="screenshot-check" value="" />
			</li>
			<li class="item-screenshot" style=" width: 100px;">
				<form method="get">
					<select class="select-box-it form-control" id="select-screenshot">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="4">4</option>
						<option value="8">8</option>
						<option value="20">20</option>
						<option value="60">60</option>
						<option value="120">120</option>
						<option value="300">300</option>
						<option value="600">600</option>
					</select><span class="style-sec">Sec.</span>
				</form>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
</div>

