<?php

class Bellini_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

    function widget($args, $instance) {
        extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'bellini') : $instance['title'], $instance, $this->id_base);

        if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
            $number = 5;
            $vault = new WP_Query( apply_filters( 'widget_posts_args', array(
            	'posts_per_page' => $number,
            	'no_found_rows' => true,
            	'post_status' => 'publish',
            	'ignore_sticky_posts' => true )
           	) );

        if( $vault->have_posts() ) :
            $before_title = '<h2 class="element-title widget-title">';
            $after_title = '</h2>';
            echo $before_widget;
            if( $title ) echo $before_title  . $title . $after_title; ?>
                <div class="widget recent row">
                    <?php while( $vault->have_posts() ) : $vault->the_post(); ?>
                    <article class="post col-xs-12">
                        <div class="row flexify--center">
                            <div class="col-xs-4 recent__post__image">
								<a href="<?php the_permalink();?>">
									<?php echo bellini_post_thumbnail();?>
								</a>
							</div>
                            <div class="col-xs-8 recent__post__info">
                                <p class="meta"><?php the_time(get_option('date_format')); ?></p>
                                <p><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></p>
                            </div>
                        </div>
                    </article>
                    <?php endwhile; ?>
                </div>
            <?php
            echo $after_widget;
            wp_reset_postdata();
        endif;
    }
}



class Bellini_Recent_Comments_Widget extends WP_Widget_Recent_Comments {

    function widget( $args, $instance ) {
        global $comments, $comment;

        $cache = wp_cache_get('widget_recent_comments', 'widget');

        if ( ! is_array( $cache ) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        extract($args, EXTR_SKIP);
        $output = '';

        $title = ( ! empty( $instance['title'] ) && isset($instance['title']) ) ? $instance['title'] : __( 'Recent Comments', 'bellini' );

        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) && isset($instance['number']) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;

        $comments = get_comments( apply_filters( 'widget_comments_args', array(
            'number'      => $number,
            'status'      => 'approve',
            'post_status' => 'publish'
        ) ) );

        $output .= $before_widget;
        if ( $title )
            $output .= $before_title . $title . $after_title;

        if ( $comments ) {
            // Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
            $post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
            _prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

            foreach ( (array) $comments as $comment) {
                $output .= '<div class="recentcomments row flexify--center">';
                if(get_avatar($comment)) {
                    $output .= '<figure class="col-xs-3">';
                    $output .= '<a href="' . get_comment_author_url() . '">';
                    $output .= get_avatar( $comment, 80 );
                    $output .= '</a>';
                    $output .= '</figure>';
                    $output .= '<div class="recent-comment__content col-xs-9">';
                } else {
                    $output .= '<div class="content no-img">';
                }
                $output .= sprintf(__('%1$s on %2$s', 'bellini'), get_comment_author_link(), '<a href="' . esc_url( get_comment_link($comment->comment_ID) )) . '">';
                $output .= get_the_title($comment->comment_post_ID) . '</a>';
                $output .= '</div>';
                $output .= '</div>';
            }
        }
        $output .= $after_widget;

        echo $output;
        $cache[$args['widget_id']] = $output;
        wp_cache_set('widget_recent_comments', $cache, 'widget');
    }

}
