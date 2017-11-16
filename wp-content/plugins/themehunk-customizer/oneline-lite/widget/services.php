<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 *  Multi-Service Widget
 */
class themehunk_customizer_services_widget extends WP_Widget {
    
    function __construct() {
        $widget_ops = array('classname' => 'themehunk-customizer-services',
            'description' => 'Show your services provided');
        parent::__construct('themehunk-customizer-services-widget', __('ThemeHunk : Service Widget','themehunk-customizer'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;

        $text = isset($instance['text'])?$instance['text']:__('writing your description','themehunk-customizer');
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:__('New Title','themehunk-customizer');
        $fontaws = isset($instance['fontaws'])?$instance['fontaws']:'fa fa-taxi';
?>
        <li class="service-list">
            <div class="service-icon"><a  href="<?php echo $link; ?>"><i  class="<?php echo $fontaws; ?>"></i></a></div>
            <div class="service-title"><a href="<?php echo $link; ?>"><?php echo apply_filters('widget_title', $title ); ?></a></div>
                <div class="service-content"><p ><?php echo $text; ?></p></div>
            </li>

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['fontaws'] = $new_instance['fontaws'];
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['text'] = $new_instance['text'];
        $instance['link'] = $new_instance['link'];
        return $instance;
    }

    function form($instance) {
         if( $instance) {
        $title = esc_attr($instance['title']);
        $fontaws = esc_attr($instance['fontaws']);
        $text = $instance['text'];
        $link = $instance['link'];

    } else {
        $title = '';
        $fontaws = 'fa fa-taxi';
        $text = '';
        $link = 'http://';
    }
    ?>
        <div class="clearfix"></div>
      
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php  echo $title; ?>" style="margin-top:5px;">
        
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description','themehunk-customizer'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"  class="widefat" ><?php echo $text; ?></textarea>
        
        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','themehunk-customizer');  _e('ex: http://www.abc.com','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php  echo $link; ?>" style="margin-top:5px;">
       
        <label for="<?php echo $this->get_field_id('fontaws'); ?>"><?php _e('Font Awesome Icon','themehunk-customizer'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws'); ?>" id="<?php echo $this->get_field_id('fontaws'); ?>" value="<?php  echo $fontaws; ?>" style="margin-top:5px;">
        <?php
    }
}