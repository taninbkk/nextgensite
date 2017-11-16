<?php
function bellini_core_footer_layout(){
global $bellini;
if(absint($bellini['bellini_footer_layout_type']) === 2) :
	if($bellini['bellini_show_footer_logo'] == true) : ?>
		<div class="col-md-12">
			<?php bellini_header_logo();?>
		</div>
	<?php endif;
	if($bellini['bellini_show_footer_copyright'] == true) :
		if(!empty($bellini['bellini_copyright_text'])) : ?>
			<div class="footer__copyright col-md-12 text-center">
		    	<?php echo do_shortcode(wp_kses_post($bellini['bellini_copyright_text'])); ?>
		    </div>
		<?php else: ?>
			<div class="col-md-12 text-center">
		    	<a href="<?php echo esc_url( __( 'http://www.camt.cmu.ac.th/', 'bellini' ) ); ?>" target="_blank">
		    		<?php printf( __( 'Website Content Generator using %s', 'bellini' ), 'Facebook API' ); ?>
		    	</a>
		    	<span class="sep"> | </span>
		    	<a href="<?php echo esc_url('http://nextgensite.com'); ?>" target="_blank">
					<?php printf( __( 'Website by : %1$s NextGenSite', 'bellini' ), ''); ?>
				</a>
			</div>
		<?php endif;
	endif;
	    if($bellini['bellini_show_footer_social_menu'] == true) : ?>
	        <div class="col-md-12">
	        <?php bellini_social_menu();?>
	        </div>
	<?php endif;
endif; // Layout 2
}