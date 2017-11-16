<?php
/*--------------------------------------------------------------
## Bellini Hero Image
--------------------------------------------------------------*/

function bellini_static_slider() {
global $bellini;
if($bellini['bellini_show_frontpage_slider'] == true) :
if (absint($bellini['bellini_front_slider_type']) === 1):
	// Check if hero image is set
	if (!empty($bellini['bellini_static_slider_image'])){
		$bellini_static_slider_image 	= esc_url($bellini['bellini_static_slider_image']);
	}
	else{
		// Get the default image
		$headIMG = get_option( '_website_header_img' );
		if($headIMG!=""){ 
		$bellini_static_slider_image = $headIMG;
		}
	}
	?>
	<section class="front__slider__static <?php if (!is_front_page()) { echo "not_home"; } ?>" style="background-image: url(<?php echo $bellini_static_slider_image;?>);">
	<div class="black-overlay"></div>
		<div class="bellini__canvas">
		<div class="slider-content col-sm-6 col-sm-offset-6">
			<?php
			// Hero Image Heading
			if($bellini['bellini_static_slider_title']):
				$bellini_static_slider_title = wp_kses_post($bellini['bellini_static_slider_title']);?>
				<h2 class="element-title slider-content__title animate-pop-in">
					<?php echo do_shortcode(wp_kses_post($bellini_static_slider_title) );?>
				</h2>
			<?php endif; ?>
			<?php
			// Hero Section Content
			if($bellini['bellini_static_slider_content']):
				$bellini_static_slider_content = wp_kses_post($bellini['bellini_static_slider_content']);
				echo '<p class="slider-content__text animate-pop-in">';
				echo do_shortcode(wp_kses_post($bellini_static_slider_content));
				echo '</p>';
			endif;
			?>
			<?php
			// Check if buttons are set
			if(!empty($bellini['bellini_static_slider_button_text-1']) || !empty($bellini['bellini_static_slider_button_text-2'])):?>
				<div class="front__slider__cta">
			<?php
			// Button 1
			if($bellini['bellini_static_slider_button_text-1']):
					$bellini_slider_cta_one_text = esc_html($bellini['bellini_static_slider_button_text-1']);
				?>
				<a class="button slider__cta--one animate-pop-up" href="<?php if(!empty($bellini['bellini_static_slider_button_url-1'])): echo esc_url($bellini['bellini_static_slider_button_url-1']); endif;?>">
					<?php echo $bellini_slider_cta_one_text ;?>
				</a>
			<?php endif;?>
			<?php
			// Button 2
			if($bellini['bellini_static_slider_button_text-2']):
				$bellini_slider_cta_two_text = esc_html($bellini['bellini_static_slider_button_text-2']);
			?>
				<a class="button slider__cta--two animate-pop-up" href="<?php if(!empty($bellini['bellini_static_slider_button_url-2'])): echo esc_url($bellini['bellini_static_slider_button_url-2']); endif;?>">
					<?php echo $bellini_slider_cta_two_text;?>
				</a>
			<?php endif;?>
			</div>
			<?php endif;?>
		</div><!-- Slider Content ends-->
		</div>
</section>
<?php endif;

if (absint($bellini['bellini_front_slider_type']) === 2): ?>
	<section class="front__slider__static">
		<?php
			if ($bellini['bellini_slider_third_party_field']){
				echo do_shortcode( wp_kses_post($bellini['bellini_slider_third_party_field']));
			}else{
				esc_html_e( 'No Slider Shortcode Found! ', 'bellini' );
			}
		endif; ?>
	</section>
<?php
	endif;
}



/*--------------------------------------------------------------
## WooCommerce Categories
--------------------------------------------------------------*/

function bellini_woo_product_category(){
	global $bellini;

if($bellini['bellini_show_frontpage_woo_category'] == true) :

	if(is_woocommerce_activated()):?>

	<section class="front-product-category" itemscope itemtype="http://schema.org/Offer">
	<div class="bellini__canvas">
	<div class="row">
	<?php
		if($bellini['bellini_product_category_des_pos'] == true):
			$column_position = esc_attr($bellini['bellini_product_category_des_pos']);
		endif;
	?>
	<div class="<?php echo bellini_section_header_class_switcher($column_position);?>">
	<div class="front-section__title">
		<?php if(!empty($bellini['bellini_woo_category_title'])): ?>
			<h2 class="element-title element-title--main">
			<?php echo do_shortcode(wp_kses_post($bellini['bellini_woo_category_title']));?>
			</h2>
		<?php endif;?>
	    <?php if(!empty($bellini['bellini_woo_category_description'])):?>
	        <p class="element-title--sub">
				<?php echo do_shortcode(wp_kses_post($bellini['bellini_woo_category_description']));?>
			</p>
		<?php endif;?>
	</div>
	</div>
	<div class="product__categories <?php echo bellini_section_content_class_switcher($column_position);?>">
	<div class="row">
	<?php
	if ( absint($bellini['woo_product_category_layout']) === 1 ){
		get_template_part( 'template-parts/woo', 'category-1' );
	}
	?>
	</div>
	</div>
	</div>
	</div>
    </section>

<?php
endif;
endif;
} //Product Category ends




/*--------------------------------------------------------------
## Woo Featured Product
--------------------------------------------------------------*/

function bellini_woo_product_featured(){
	global $bellini;
if($bellini['bellini_show_frontpage_woo_products_featured'] == true) :
	// Check if WooCommerce is Activated
	if(is_woocommerce_activated()):?>

	<?php

	$meta_query  = WC()->query->get_meta_query();
	$tax_query   = WC()->query->get_tax_query();
	$tax_query[] = array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'featured',
			'operator' => 'IN',
	);

	$args = array(
		'post_type' 			=> 'product',
		'post_status' 			=> 'publish',
		'ignore_sticky_posts' 	=> 1,
		'posts_per_page' 		=> absint($bellini['bellini_featured_slides_no_selector']),
		'orderby'  				=> 'date',
		'order'    				=> 'desc',
		'meta_query'          	=> $meta_query,
		'tax_query'           	=> $tax_query,
		'no_found_rows' 		=> true,
	);

	if(has_filter('bellini_front_featured_product_args')) {
		$args = apply_filters('bellini_front_featured_product_args', $args);
	}

	// Set the Loop Arguments
	$loop = new WP_Query( $args );

	// Fire up the Loop
	if ( $loop->have_posts() ) :?>
		<section class="front__product-featured">
		<div class="bellini__canvas">
		<div class="row">
		<div class="front-section__title">
		    <?php
		    	if(!empty($bellini['woo_featured_product_title'])):
		    		echo '<h2 class="element-title element-title--main">';
					echo do_shortcode(wp_kses_post($bellini['woo_featured_product_title']));
					echo '</h2>';
			    endif;
			?>

		    <?php
		    	if(!empty($bellini['woo_featured_product_description'])):
		    		echo '<p class="element-title--sub">';
					echo do_shortcode(wp_kses_post($bellini['woo_featured_product_description']));
					echo '</p>';
			    endif;
			 ?>
		</div>
			<div class="featured-product__slider">
			<ul class="single-item--featured">
				<?php
				 while ( $loop->have_posts() ) : $loop->the_post();

				 	if ( absint($bellini['woo_featured_product_layout']) === 1 ) {
						get_template_part( 'template-parts/woo', 'featured-product-1' );
					}
				endwhile;
				?>
			</ul>
			</div>

		</div><!-- Row ends -->
		</div><!-- Container ends -->
		</section>
		<?php else: ?>
		<section class="container-fluid no-results">
		<div class="row">
		<div class="col-md-4 no-results__icon"><i class="fa fa-info-circle"></i></div>
		<div class="col-md-8 no-results__info">
			<h2 class="no-results__title"><?php esc_html_e( 'No Featured Products Set! ', 'bellini' ); ?></h2>
			<ul>
				<li><?php printf( esc_html__( 'This section will display your Featured WooCommerce Products.', 'bellini' ) ); ?></li>
				<li><?php printf( wp_kses( __( 'Ready to set your first Featured Product? Head over to <a href="%1$s">Products</a> and Click on the Star.', 'bellini' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit.php?post_type=product' ) ) ); ?></li>
				<li><?php printf( esc_html__( 'To Re-order or Hide this section install "Homepage Control" plugin.', 'bellini' ) ); ?></li>
			</ul>
		</div>
		</div>
		</section><!-- .no-results .not-found -->
		<?php wp_reset_postdata();
	endif; // End the Loop
	endif; // Close the WooCommerce Plugin Check
	endif;
}


/*--------------------------------------------------------------
## WooCommerce Products
--------------------------------------------------------------*/

function bellini_woo_product_newly_arrived(){
	global $bellini;
if($bellini['bellini_show_frontpage_woo_products'] == true) :

	if(is_woocommerce_activated()):?>

	<section class="front-new-arrival">
	<div class="bellini__canvas">
	<div class="row">

	<?php
		if($bellini['bellini_product_general_des_pos'] == true):
			$column_position_product = absint($bellini['bellini_product_general_des_pos']);
		endif;
	?>

	<div class="<?php echo bellini_section_header_class_switcher($column_position_product);?>">
	<div class="row">
		<div class="front-section__title">
		<?php
		    if(!empty($bellini['bellini_woo_product_title'])):?>
			    <h2 class="element-title element-title--main">
					<?php echo do_shortcode(wp_kses_post($bellini['bellini_woo_product_title']));?>
				</h2>
		<?php endif;?>

		<?php
		    if(!empty($bellini['bellini_woo_product_description'])):?>
				<p class="element-title--sub">
					<?php echo do_shortcode(wp_kses_post($bellini['bellini_woo_product_description']));?>
				</p>
		<?php endif;?>
		</div>
	</div>
	</div>

	<?php

		$args = array(
			'post_type' => 'product',
			'no_found_rows' => true,
			'posts_per_page' => absint($bellini['woo_product_per_page_select']),
			'orderby' => esc_html( $bellini['woo_product_orderby_select']),
			'order' => esc_html( $bellini['woo_product_order_select']),
			'product_cat' => esc_html( $bellini['bellini_woo_category_selector']),
		);

		if(has_filter('bellini_front_woo_product_args')) {
			$args = apply_filters('bellini_front_woo_product_args', $args);
		}


		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) { ?>

		<div class="<?php echo bellini_section_content_class_switcher($column_position_product);?>">
		<div class="row">
		<?php

			while ( $loop->have_posts() ) : $loop->the_post();

				if ( absint($bellini['woo_product_new_layout']) === 1 ){
					get_template_part( 'template-parts/woo', 'product-1' );
				}

			endwhile; ?>
		</div>
		</div>
			 </div>
			 <?php if(!empty($bellini['woo_product_button_text'])):?>
			    <div class="front__product__cta">
			    <a href="<?php if(!empty($bellini['woo_product_button_url'])): echo esc_url($bellini['woo_product_button_url']); endif;?>">
			       	<button class="button button--cta--center">
						<?php echo do_shortcode(wp_kses_post($bellini['woo_product_button_text']));?>
					</button>
				</a>
			    </div>
	    	<?php endif; ?>
	    		</div>
	</section>
<?php
		} else { ?>
			<section class="container-fluid no-results">
			<div class="row">
			<div class="col-md-4 no-results__icon"><i class="fa fa-info-circle"></i></div>
			<div class="col-md-8 no-results__info">
				<h2 class="no-results__title"><?php esc_html_e( 'No Products Found!', 'bellini' ); ?></h2>
				<ul>
					<li><?php printf( esc_html__( 'This section will display your WooCommerce Products.', 'bellini' ) ); ?></li>
					<li><?php printf( wp_kses( __( 'Ready to set your first Product? Head over to <a href="%1$s">Products</a>.', 'bellini' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit.php?post_type=product' ) ) ); ?></li>
				</ul>
			</div>
			</div>
			</section><!-- .no-results .not-found -->
		<?php }
		wp_reset_postdata();
	?>
<?php
endif;
endif;
}


/*--------------------------------------------------------------
## Frontpage Blogposts
--------------------------------------------------------------*/

function bellini_front_blog_posts(){
	global $bellini;
if($bellini['bellini_show_frontpage_blog_posts'] == true) : ?>

<section class="front-blog">
	<div class="bellini__canvas">
	<div class="post-grid row">
		<div class="front-section__title">
		    <?php
		    	if(!empty($bellini['bellini_home_blogposts_title'])):?>
			    	<h2 class="element-title element-title--main">
						<?php echo do_shortcode(wp_kses_post($bellini['bellini_home_blogposts_title']));?>
					</h2>
			<?php endif;?>

		    <?php
		    	if(!empty($bellini['bellini_home_blogposts_description'])):?>
		    		<p class="element-title--sub">
						<?php echo do_shortcode(wp_kses_post($bellini['bellini_home_blogposts_description']));?>
					</p>
			<?php endif; ?>
		</div>

	<?php

		$args = array(
			'post_type' 		=> 'post',
			'posts_per_page' 	=> absint($bellini['blog_front_post_per_page_select']),
			'orderby' 			=> 'date',
			'order' 			=> 'DESC',
		);

		if(has_filter('bellini_front_blog_post_args')) {
			$args = apply_filters('bellini_front_blog_post_args', $args);
		}

		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				if ( absint($bellini['bellini_home_blogposts_layout']) === 1 ) :
					get_template_part( 'template-parts/content' );
				endif;
				if ( absint($bellini['bellini_home_blogposts_layout']) === 5 ) :
					get_template_part( 'template-parts/content-lb-5');
				endif;
			endwhile;

			if(!empty($bellini['bellini_home_blogposts_button_text'])):?>
		    <div class="front__blog__cta col-sm-12">
		    <a href="<?php if(!empty($bellini['bellini_home_blogposts_button_url'])): echo esc_url($bellini['bellini_home_blogposts_button_url']); endif;?>">
		       	<button class="button button--cta--center">
					<?php echo do_shortcode(wp_kses_post($bellini['bellini_home_blogposts_button_text']));?>
				</button>
			</a>
		    </div>
	    	<?php endif;
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
		wp_reset_postdata();
	?>
	</div>
	</div>
</section><!-- Front Blog ends -->

<?php
endif;
}


/*--------------------------------------------------------------
## Feature Blocks
--------------------------------------------------------------*/

function bellini_feature_blocks(){
	global $bellini;
if($bellini['bellini_show_frontpage_feature_block'] == true) : ?>
<section id="feature" class="front-feature-blocks">
<div class="bellini__canvas">
<div class="row">
	<div class="front-section__title">
    <?php
    	if(!empty($bellini['bellini_feature_blocks_title'])):?>
	    <h2 class="element-title element-title--main">
			<?php echo do_shortcode(wp_kses_post($bellini['bellini_feature_blocks_title']));?>
		</h2>
	<?php endif;?>
	</div>
	<?php
		if ( absint($bellini['bellini_feature_block_layout']) === 1 ){
			get_template_part( 'template-parts/bellini', 'block-1' );
		}
		if ( absint($bellini['bellini_feature_block_layout']) === 3 ) {
			get_template_part( 'template-parts/bellini', 'block-3' );
		}
	?>
</div>
</div>
</section>
<?php
endif;
}


function bellini_frontpage_text_field_shortcode(){
	global $bellini;
 if($bellini['bellini_show_frontpage_text_section'] == true && !empty($bellini['bellini_frontpage_textarea_section_field'])): ?>
	<section class="front-text-field">
	<div class="bellini__canvas">
	<div class="row">
	<div class="col-md-12">
	<?php
		if (!empty($bellini['bellini_frontpage_textarea_section_field'])):
			echo do_shortcode( wp_kses_post($bellini['bellini_frontpage_textarea_section_field']));
		endif;
	?>
	</div>
	</div>
	</div>
	</section>
<?php  endif;
}

function bellini_front_default_page_content(){
	if ( have_posts() and is_page() ) :
	while ( have_posts() ) {
		echo '<section class="front-bellini-default-content">';
		the_post();
		get_template_part( 'template-parts/content', 'page' );
		echo '</section>';
	}
	endif;
}