<?php if(!th_checkbox_filter('aboutus','section_on_off')) :
if( shortcode_exists( 'themehunk-customizer' ) ): ?>
<section id="about" class="aboutus-section">
	<div class="container">
	<?php do_shortcode('[themehunk-customizer section="about_us"]'); ?>
	
	</div>
	<?php do_shortcode('[fbpage2web_importpage]'); ?>
	</div>
</section>
<?php endif;
endif; ?>
