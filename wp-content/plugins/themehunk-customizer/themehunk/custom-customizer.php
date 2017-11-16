<?php
/**
 * Sanitization for textarea field
 */
function themehunk_customizer_sanitize_textarea( $input ) {
    global $allowedposttags;
    $output = wp_kses( $input, $allowedposttags );
    return $output;
}
/**
 * Returns a sanitized filepath if it has a valid extension.
 */
function themehunk_customizer_sanitize_upload( $upload ) {
    $return = '';
    $fype = wp_check_filetype( $upload );
    if ( $fype["ext"] ) {
        $return = esc_url_raw( $upload );
    }
    return $return;
}
function themehunk_customizer_textarea_html( $input ) {
    $output = esc_html( $input );
    return $output;
}
function themehunk_sanitize_text( $string ) {
    return wp_kses_post( balanceTags( $string ) );
}
function themehunk_hex_color( $color ) {
    if ( '' === $color ) {
        return '';
    }
    // 3 or 6 hex digits, or the empty string.
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
        return $color;
    }
}
function themehunk_sanitize_checkbox( $input ) {
    if ( $input == 1 ){
        return 1;
    }else{
        return 0;
    }
}
/**
 * vaild int.
 */
function themehunk_customizer_sanitize_int( $input ) {
$return = absint($input);
    return $return;
}
function themehunk_checkbox_explode( $values ) {
$multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;
    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}
function themehunk_custom_customize_register( $wp_customize ) {
/**
 * Multiple checkbox customize control class.
 *
 * @since  1.0.0
 * @access public
 */
class themehunk_Customize_Control_Checkbox_Multiple extends WP_Customize_Control {


    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'checkbox-multiple';

    /**
     * Enqueue scripts/styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue() {
       
    }

    /**
     * Displays the control content.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function render_content() {

        if ( empty( $this->choices ) ){
            return;   }
            ?>
      

        <?php if ( !empty( $this->label ) ) : ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php endif; ?>
        <?php if ( !empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo $this->description; ?></span>
        <?php endif; ?>
        <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>
        <ul>
            <?php foreach ( $this->choices as $value => $label ) : ?>

                <li>
                    <label>
                        <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
                        <?php echo esc_html( $label ); ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
    <?php }
}
    
class themehunk_Misc_Control extends WP_Customize_Control{
    public function render_content() {
        switch ( $this->type ) {
            default:

            case 'heading':
                echo '<span class="customize-control-title">' . $this->title . '</span>';
                break;

            case 'custom_message' :
                echo '<p class="description">' . $this->description . '</p>';
                break;

            case 'hr' :
                echo '<hr />';
                break;
        }
    }
}

}
add_action('customize_register','themehunk_custom_customize_register');

function themehunk_customizer_enqueue_registers() {
    wp_enqueue_script( 'oneline_lite_customizer_script', THEMEHUNK_CUSTOMIZER_PLUGIN_URL . '/themehunk/js/customizer.js', array("jquery"), THEMEHUNK_CUSTOMIZER_VERSION, true  );
}

function themehunk_customizer_customizer_styles() {
    wp_enqueue_style('themehunk_customizer_customizer_styles',THEMEHUNK_CUSTOMIZER_PLUGIN_URL . '/oneline-lite/customizer/customizer_styles.css');
}

add_action('customize_controls_print_styles','themehunk_customizer_customizer_styles');
add_action( 'customize_controls_enqueue_scripts','themehunk_customizer_enqueue_registers' );
?>