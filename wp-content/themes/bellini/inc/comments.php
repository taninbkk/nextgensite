<?php
/**
* bellini comment template
* @since 1.0.0
*/
function bellini_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
            <li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
            <p><?php _e( 'Pingback:', 'bellini' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'bellini' ), ' ' ); ?></p>
        <?php break;
        default : ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class('comment'); ?>>
            <div class="comment-body row">

                <div class="col-md-2 col-xs-12 comment-body__left text-right">
                <div class="author vcard">
                    <?php echo get_avatar( $comment, 60 ); ?>
                </div>
                <h5 class="comment__author">
                    <?php comment_author(); ?>
                </h5>
                </div>

                <div class="col-md-10 col-xs-12 comment-body__right text-left">
                <div class="row">

                    <div class="col-md-12 comment__body">
                        <?php comment_text(); ?>
                    </div>

                    <span class="comment__meta col-md-12">
                        <time>
                            <span class="comment__date"><?php comment_date(); ?></span>
                            <span class="comment__time"><?php comment_time(); ?></span>
                        </time>
                    </span>

                    <span class="col-md-6 button--reply text-left" role="button">
                        <?php
                            comment_reply_link( array_merge( $args, array(
                                'reply_text' => esc_html__('Reply', 'bellini'),
                                'depth' => $depth,
                                'max_depth' => $args['max_depth']
                        ) ) ); ?>
                    </span>

                     <span class="col-md-6 comment__edit text-right">
                        <?php edit_comment_link( esc_html__( 'Edit', 'bellini' ), '  ', '' ); ?>
                    </span>

                </div>
                </div>
            </div>
          </article>
        <?php
        break;
endswitch;
}