			<footer class="footer" itemscope itemtype="http://schema.org/WPFooter">

				<div class="container">
					<div class="row">
						<div class="col-sm-12 wrapper-footer">
							<div class="copyright">
                                                             
                                                            <div class="col-md-8 col-sm-8 col-xs-8 text-copyright">
								<p><?php _e('Dictionaries : Copy right by Merriam Webster, All right reserved', 'iii-dictionary') ?><br>
								<?php _e('Software and graphics : Copyright by Innovative Knowldge, Inc. All right reserved', 'iii-dictionary') ?></p>
                                                                
                                                            </div>
                                                           <div class="col-md-4 col-sm-4 col-xs-4 logo-footer">
								<a href="<?php echo site_home_url(); ?>?r=about-us" rel="nofollow" title="Innovative Knowledge">
									<img style="height: 19px; width: 92px;" src="<?php echo get_template_directory_uri(); ?>/library/images/ik_logo_at_bottom.png" alt="">
								</a>
                                                            </div>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>

		<?php add_action('wp_footer', 'print_js_messages') ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
