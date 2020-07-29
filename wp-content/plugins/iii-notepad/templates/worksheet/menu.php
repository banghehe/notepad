<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/14/2020
 * Time: 10:14 AM
 */

global $wp;

$current_url	= add_query_arg($wp->query_vars, home_url());
?>

<div id="menu-main">
	<div class="row">


		<div class="no-padding border-r">

			<?php //if (($current_user_id_wp == $teacher_id && $teacher_id != '') || !$teacher_id) : ?>
			<div class="row taskbar-worksheet r-taskbar">

                <div class="containerr" style="margin-bottom: -14px;margin-left: -8px; margin-right:65px; margin-top: 7px">

                    <div class="select-box" id="dropdown">

                        <div class="options-container" >

                            <div class="option" id="newhihi">
                                <input type="radio" class="radio" id="Automobiles" name="category" value="n">
                                <label for="Automobiles" ><?php echo esc_html__('New', 'iii-notepad'); ?></label>
                            </div>

                            <div class="option" id="openhihi">
                                <input type="radio" class="radio" id="Film" name="category" value="">
                                <label for="Film"><?php echo esc_html__('Open', 'iii-notepad'); ?></label>
                            </div>


                            <div class="option" id="savehihi">
                                <input type="radio" class="radio" id="science" name="category" value="">
                                <label for="science"><?php echo esc_html__('Save', 'iii-notepad'); ?></label>
                            </div>


                            <div class="option" id="p">
                                <input type="radio" class="radio" id="Music" name="category" value="">
                                <label for="Music"><?php echo esc_html__('Preview', 'iii-notepad'); ?></label>
                            </div>
                        </div>
                        <div class="selected">
                            Select Action
                        </div>
                    </div>
                </div>
<!--				<div class="tutor-ws-div">-->
<!--					<div class="trigger-action" id="acc">-->
<!--						<span>-->
<!--							--><?php //echo esc_html__('Select Action', 'iii-notepad'); ?>
<!--						</span>-->
<!--					</div>-->
<!--					<div class="list-action">-->
<!--						<ul>-->
<!--							<li>-->
<!--								<a href="#" class="" data-type="n">-->
<!--									--><?php //echo esc_html__('New', 'iii-notepad'); ?>
<!--								</a>-->
<!--							</li>-->
<!--							<li>-->
<!--								<a href="#" class="" data-type="e">-->
<!--									--><?php //echo esc_html__('Test Camera', 'iii-notepad'); ?>
<!--								</a>-->
<!--							</li>-->
<!--							<li>-->
<!--								<a href="#" class="" data-type="s">-->
<!--									--><?php //echo esc_html__('Test Mic', 'iii-notepad'); ?>
<!--								</a>-->
<!--							</li>-->
<!--							<li>-->
<!--								<a href="#" class="" data-type="p">-->
<!--									--><?php //echo esc_html__('Open Worksheet', 'iii-notepad'); ?>
<!--								</a>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="block-ws">-->
<!--					<select class="ws-change">-->
<!--						<option value="" class="hidden">-->
<!--							--><?php //echo esc_html__('Select Action', 'iii-notepad'); ?>
<!--						</option>-->
<!--						<option value="n">-->
<!--							--><?php //echo esc_html__('New', 'iii-notepad'); ?>
<!--						</option>-->
<!--						<option value="e">-->
<!--							--><?php //echo esc_html__('Open', 'iii-notepad'); ?>
<!--						</option>-->
<!--						<option value="s">-->
<!--							--><?php //echo esc_html__('Save', 'iii-notepad'); ?>
<!--						</option>-->
<!--						<option value="p">-->
<!--							--><?php //echo esc_html__('Preview', 'iii-notepad'); ?>
<!--						</option>-->
<!--					</select>-->
<!--				</div>-->

				
				<!--				<div class="block-control">-->
					<!--					<p class="img-height active" id="btn-ws-edit">-->
						<!--						<img class="white" src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets/images/worksheet/Mode_01_Edit_white.png"-->
						<!--							 alt="Save">-->
						<!--						<img class="dark" src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets/images/worksheet/Mode_01_Edit_dark.png"-->
						<!--							 alt="Save">-->
						<!--					</p>-->
						<!--					<p class="img-height" id="btn-ws-preview">-->
							<!--						<img class="white" src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets/images/worksheet/Mode_02_Preview_white.png"-->
							<!--							 alt="Save">-->
							<!--						<img class="dark" src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets/images/worksheet/Mode_02_Preview_dark.png"-->
							<!--							 alt="Save">-->
							<!--					</p>-->
							<!--				</div>-->
							<!--				<div class="block-control">-->
								<!--					<p class="img-height" id="btn-ws-add-single">-->
									<!--						<img src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets/images/worksheet/icon_05_Create_Single_Worksheet.png"-->
									<!--							 alt="AddSingleQuestion">-->
									<!--					</p>-->
									<!--					<p class="img-height" id="btn-ws-add-multi">-->
										<!--						<img src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets/images/worksheet/icon_06_Create_Multiple_Worksheet.png"-->
										<!--							 alt="AddMultiQuestions">-->
										<!--					</p>-->
										<!--				</div>-->
										<div class="block-control">
											<!--					<p class="img-height" id="btn-ws-open-list">-->
												<!--						<img src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets/images/worksheet/icon_Open_Worksheet_List.png"-->
												<!--							 alt="Undo">-->
												<!--					</p>-->
												<!--					<p class="img-height" id="btn-ws-undo">-->
													<!--						<img src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets/images/notepad/redo.png"-->
													<!--							 alt="Undo">-->
													<!--					</p>-->
													<!--					<p class="img-height" id="btn-ws-redo">-->
														<!--						<img src="--><?php //echo III_NOTEPAD_PLUGIN_DIR_URL; ?><!--assets/images/notepad/undo.png"-->
														<!--							 alt="Redo">-->
														<!--					</p>-->
														<p id="btn-ws-add-type-box" class="tooltip-wrap">
															<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/text_box.png" alt="Upload">
															<span class="hidden tooltip-icon">
																<span class="h"><?php echo esc_html__('Text', 'iii-notepad'); ?></span>
																<span class="t"><?php echo esc_html__('Insert text box on the worksheet', 'iii-notepad'); ?></span>
															</span>
														</p>
														<p id="btn-ws-add-image" class="tooltip-wrap">
															<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/upload_image.png" alt="Upload">
															<span class="hidden tooltip-icon">
																<span class="h"><?php echo esc_html__('Image', 'iii-notepad'); ?></span>
																<span class="t"><?php echo esc_html__('Insert image box on the worksheet', 'iii-notepad'); ?></span>
															</span>
														</p>
														<p id="btn-ws-add-video" class="tooltip-wrap">
															<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/notepad/upload_video_player.png" alt="ScreenShots">
															<span class="hidden tooltip-icon">
																<span class="h"><?php echo esc_html__('Video', 'iii-notepad'); ?></span>
																<span class="t"><?php echo esc_html__('Insert video box on the worksheet', 'iii-notepad'); ?></span>
															</span>
														</p>
													</div>
												</div>
												<?php //endif; ?>
											</div>
										</div>
									</div>