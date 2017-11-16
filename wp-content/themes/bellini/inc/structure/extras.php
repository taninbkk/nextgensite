<?php
global $bellini;
$bellini = bellini_option_defaults();

add_filter( 'get_the_archive_title', 'bellini_clean_archive_title');

function bellini_clean_archive_title() {

  if ( is_category() ) {
      $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
      $title = single_tag_title( '', false );
  }

  return $title;
}


add_filter( 'body_class', 'bellini_body_classes' );

function bellini_body_classes( $classes ) {
global $bellini;

  // Multiple Author
    if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  // Not Singular
    if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  // Add a class if there is a custom header.
  if ( has_header_image() ) {
    $classes[] = 'has-header-image';
  }

  // Single Post Layout 3 Selected
    if ( absint($bellini['bellini_layout_single-post']) === 3 && is_single() ){
    $classes[] = 's__post--l3';
  }

    return $classes;
}

// Check if left sidebar is active
function bellini_sidebar_active_left(){
    if (is_active_sidebar( 'sidebar-left' )){
        return true;
    }else{
        return false;
    }
}

// Check if right sidebar is active
function bellini_sidebar_active_right(){
    if (is_active_sidebar( 'sidebar-right' )){
        return true;
    }else{
        return false;
    }
}

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
    function is_woocommerce_activated() {
        return class_exists( 'woocommerce' ) ? true : false;
    }
}


/**
* Including class for sidebar widget css class
*/
function bellini_sidebar_content_class(){
    if ( is_singular() && bellini_sidebar_active_left() && bellini_sidebar_active_right() ){
        echo 'col-md-6';
    }elseif( is_singular() && bellini_sidebar_active_left()){
        echo 'col-md-8';
    }elseif( is_singular() &&  bellini_sidebar_active_right()){
        echo 'col-md-8';
    }else{
        echo 'col-md-12';
    }
}

function bellini_sidebar_widget_class(){
    if ( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 'sidebar-right' ) ){
        echo 'widget-area--both';
    }else{
        echo 'default';
    }
}

function bellini_blog_sidebar(){
	if (is_active_sidebar( 'sidebar-blog' )){
		echo 'col-md-9';
	}else{
		echo 'col-md-12';
	}
}

/**
* Posts Category
*/
function bellini_category() {
    if ( 'post' === get_post_type() ) {
    /* translators: used between list items, there is a space after the comma */
    $categories_list = get_the_category_list( esc_html__( ' ', 'bellini' ) );

        if ( $categories_list && bellini_categorized_blog() ) {
            printf( '<span class="post-meta__category category" rel="tag">' . esc_html__( '%1$s', 'bellini' ) . '</span>', $categories_list ); // WPCS: XSS OK.
        }
    }
}

/**
* Prints HTML with meta information for the Tags
*/
function bellini_post_tag() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html__( ',', 'bellini' ) );
        if ( $tags_list ) {
            printf( '<span class="post-meta__tag__item" rel="category tag">' . esc_html__( '%1$s', 'bellini' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
    }
}

/**
* Prints Post published date
*/
function bellini_published_on() { ?>
    <span class="post-meta__time">

      <span itemprop="datePublished">
        <time datetime="<?php echo get_the_date(get_option('date_format')); ?>" pubdate>
        <?php echo get_the_date(get_option('date_format'));?>
        </time>
      </span>

      <meta itemprop="dateModified" content="<?php the_modified_time(get_option('date_format'));?>">
    </span>

<?php }

/**
* Prints the total comment of a post
*/
function bellini_comment_count(){
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
        comments_popup_link( esc_html__( 'Leave a comment', 'bellini' ), esc_html__( '1 Comment', 'bellini' ), esc_html__( '% Comments', 'bellini' ) );
        echo '</span>';
    }
}

/**
* Prints HTML with meta information for the current post-date/time and author.
*/
function bellini_post_author() { ?>

  <p class="post-meta__author" itemprop="author" itemscope itemtype="http://schema.org/Person">
  <span class="vcard author author_name" itemprop="name" >
  <span class="fn">
    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ));?>" class="post-meta__author__link" itemprop="url">
    <?php the_author(); ?>
    </a>
  </span>
  </span>
  </p>

<?php
}

/**
* Edit Content
*/
function bellini_edit_content() {
    edit_post_link(sprintf(esc_html__( 'Edit %s', 'bellini' ),the_title( '<span class="screen-reader-text">"', '"</span>', false )),'<span class="edit-link">','</span>');
}

/**
* Returns true if a blog has more than 1 category.
*
* @return bool
*/
function bellini_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'bellini_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
                                        'fields'     => 'ids',
                                        'hide_empty' => 1,
                                        // We only need to know if there is more than one category.
                                        'number'     => 2,
                                        )
    );
    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );
    set_transient( 'bellini_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so bellini_categorized_blog should return true.
        return true;
    } else {
    // This blog has only 1 category so bellini_categorized_blog should return false.
        return false;
    }
}

/**
* Flush out the transients used in bellini_categorized_blog.
*/
add_action( 'edit_category', 'bellini_category_transient_flusher' );
add_action( 'save_post',     'bellini_category_transient_flusher' );
function bellini_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'bellini_categories' );
}

/**
* If it doesn't have a featured image, set a default image as Post thumbnail
*/
function bellini_post_thumbnail(){
    global $bellini;
    if ( has_post_thumbnail() ) {

                $meta   = wp_get_attachment_metadata( get_post_thumbnail_id( get_the_ID() ) );
                $width  = $meta['width'];
                $height = $meta['height'];
        ?>
            <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                <?php the_post_thumbnail('bellini-thumb', array('class' => 'img-respponsive blog__post__image'));?>
                <meta itemprop="url" content="<?php echo esc_url( the_post_thumbnail_url() ); ?>" />
                <meta itemprop="width" content="<?php echo esc_attr( $width ); ?>" />
                <meta itemprop="height" content="<?php echo esc_attr( $height ); ?>" />
            </figure><!--/itemprop=image-->

<?php
    }else{?>
        <img itemprop="image" src="<?php if ($bellini['bellini_post_featured_image' ]) : echo $bellini['bellini_post_featured_image']; else: echo get_parent_theme_file_uri('/images/featured-image.jpg'); endif; ?>" class="img-responsive blog__post__image" alt="<?php the_title(); ?>" />
    <?php }
}

/**
* Add class to the next page div
*/
add_filter('next_posts_link_attributes', 'bellini_next_page_add_class');
function bellini_next_page_add_class() {
    return 'class="bellini__pagination--np__next"';
}

/**
* Add class to the pevious page div
*/
add_filter('previous_posts_link_attributes', 'bellini_previous_page_add_class');
function bellini_previous_page_add_class() {
    return 'class="bellini__pagination--np__previous"';
}

/**
* Bellini Pagination
*/
if ( ! function_exists( 'bellini_pagination' ) ) :
function bellini_pagination() {
    global $bellini;
    if($bellini['bellini_blog_pagination_type'] == 1):
        // Next & Previous Page Pagination
        echo '<div class="bellini__pagination--np col-xs-12">';
        next_posts_link('Next Page', 0);
        previous_posts_link('Previous Page', 0);
        echo '</div>';
    endif;
    if($bellini['bellini_blog_pagination_type'] == 2):
        // Numeric Pagination
        echo '<div class="col-xs-12">';
        the_posts_pagination();
        echo '</div>';
    endif;
    if($bellini['bellini_blog_pagination_type'] == 3):
        // Display Pagination using WP-PageNavi Plugin
        if ( function_exists('wp_pagenavi') ){
            wp_pagenavi();
        }
    endif;
}
endif;


/**
* Prints Out Breadcrumbs
*/
if ( ! function_exists( 'bellini_breadcrumb_integration' ) ) :
function bellini_breadcrumb_integration() {
    global $bellini;
    if($bellini['bellini_show_page_breadcrumb'] == true) :
        // Breadcrumb NavXT
        if($bellini['bellini_page_breadcrumb_type'] === 1):
            if( function_exists('bcn_display') ) : ?>
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                    <?php bcn_display(); ?>
                </div>
        <?php
            endif;
        endif;
        // Yoast Breadcrumb
        if($bellini['bellini_page_breadcrumb_type'] === 2):
            if( function_exists('yoast_breadcrumb') ) :
                yoast_breadcrumb('<span class="breadcrumbs">','</span>');
            endif;
        endif;
        // WooCommerce Breadcrumb
        if($bellini['bellini_page_breadcrumb_type'] === 3):
            if( function_exists('woocommerce_breadcrumb') ) :
                woocommerce_breadcrumb();
            endif;
        endif;
        endif;
}
endif;


/**
* Prints Out Single Post thumbnail with Schema
*/
function bellini_single_post_thumbnail(){
    if ( has_post_thumbnail() ) : ?>

        <?php
                $meta   = wp_get_attachment_metadata( get_post_thumbnail_id( get_the_ID() ) );
                $width  = $meta['width'];
                $height = $meta['height'];
        ?>
            <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive single-post__featured-image'));?>
                <meta itemprop="url" content="<?php echo esc_url( the_post_thumbnail_url() ); ?>" />
                <meta itemprop="width" content="<?php echo esc_attr( $width ); ?>" />
                <meta itemprop="height" content="<?php echo esc_attr( $height ); ?>" />
            </figure><!--/itemprop=image-->
    <?php

    endif;
}

/**
* Prints Out Class Whether the box should be wide or narrow
*/
function canvas_width($canvas){
	if ($canvas === 1){
		return 'bellini__canvas';
	}else{
		return 'bellini__canvas--fluid';
	}
}


/**
* Switches Two Column Content Class
*/
function bellini_section_header_class_switcher($value){
    switch ($value){
       case 1:
           return 'col-md-12';
           break;
       case 2:
           return 'col-md-4';
           break;
       default:
           return 'col-md-4 col-md-push-8';
           break;
    }
}

/**
* Switches Two Column Content Class
*/
function bellini_section_content_class_switcher($value){
    switch ($value){
       case 1:
           return 'col-md-12';
           break;
       case 2:
           return 'col-md-8';
           break;
       default:
           return 'col-md-8 col-md-pull-4';
           break;
    }
}

/**
* Check & Prints out Scroll To Top if activated
*/
function bellini_scroll_to_top(){
  global $bellini;
    if($bellini['bellini_show_scroll_to_top'] == true){ ?>
  <script>
  // Scroll To Top
  jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 700) {
        jQuery('.scrollToTop').fadeIn();
    } else {
        jQuery('.scrollToTop').fadeOut();
    }
    });

    //Click event to scroll to top
    jQuery('.scrollToTop').click(function(){
      jQuery('html, body').animate({scrollTop : 0},1000);
            return false;
    });
    </script>
<?php }}


/**
* Changes Footer Column Count
*/
add_filter( 'bellini_widget_footer_column', 'bellini_footer_column_function' );

function bellini_footer_column_function( $class ) {
    global $bellini;
    if ($bellini['bellini_footer_widget_column_selector'] === 1):
        $class = '<section id="%1$s" class="widget__after__content col-md-12 %2$s">';
        return $class;
    endif;
    if ($bellini['bellini_footer_widget_column_selector'] === 2):
        $class = '<section id="%1$s" class="widget__after__content col-md-6 %2$s">';
        return $class;
    endif;
    if ($bellini['bellini_footer_widget_column_selector'] === 3):
        $class = '<section id="%1$s" class="widget__after__content col-md-4 %2$s">';
        return $class;
    endif;
    if ($bellini['bellini_footer_widget_column_selector'] === 4):
        $class = '<section id="%1$s" class="widget__after__content col-md-3 %2$s">';
        return $class;
    endif;
}