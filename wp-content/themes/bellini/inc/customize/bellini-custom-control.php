<?php

/**
 * Customizer Title Control with Description
 */
class Bellini_UI_Helper_Title extends WP_Customize_Control {
	public $type 	= 'info';
	public $class 	= '';
	public function render_content() { ?>
		<label class="<?php echo $this->class;?>">
		<?php if ( !empty( $this->label ) ) : ?>
			<span class="customize-control-title bellini-ui__title">
				<?php echo esc_html( $this->label ); ?>
			</span>
		<?php endif; ?>
		</label>
		<?php if ( !empty( $this->description ) ) : ?>
			<span class="description customize-control-description">
				<?php echo $this->description; ?>
			</span>
		<?php endif; ?>
        <?php if ( !$this->value() ) :
        		echo $this->value();
			endif;
	}
}


/**
 * Customizer Control For Pro Conversion
 */
class Bellini_Pro_Conversion extends WP_Customize_Control {

	public function render_content() { ?>
		<div class="bellini_pro_section">
		<label>
		<?php if ( !empty( $this->label ) ) : ?>
			<span class="customize-control-title bellini-pro__title">
				<?php echo esc_html( $this->label ); ?>
			</span>
		<?php endif; ?>
		</label>

		<?php if ( !empty( $this->description ) ) : ?>
			<span class="description bellini-pro__description">
				<?php echo $this->description; ?>
			</span>
		<?php endif;
		echo '</div>';
	}
}