<?php
global $bellini;
	$prod_categories = array(
			'taxonomy'		=> 'product_cat',
		    'orderby'		=> 'name',
		    'order' 		=> 'ASC',
		    'hide_empty' 	=> true,
			'fields'        => 'all',
			'pad_counts'    => false,
	);

	$prod_categories_query = new WP_Term_Query( $prod_categories );

	foreach( (array)$prod_categories_query->terms as $prod_cat ) :
	    if ( $prod_cat->parent != 0 )
	        continue;
	    $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
	    $cat_thumb_url = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
	    $term_link = get_term_link( $prod_cat, 'product_cat' );
	    if (empty($cat_thumb_url[0])):
	    	$cat_thumb_url[0] = get_parent_theme_file_uri( '/images/category-image.png');
	    endif;
	    ?>
		<div itemprop="category" class="front-product-category__card <?php echo $bellini['woo_product_category_row'];?>">
		<div class="front-product-category__card__inner">
		<a href="<?php echo $term_link; ?>">
		    <img src="<?php echo $cat_thumb_url[0];?>" class="img-responsive" alt="<?php echo $prod_cat->name; ?>" itemprop="image" />
		    <h3 class="category_title">
		    	<?php echo $prod_cat->name;?>
		    </h3>
		</a>
		</div>
		</div>
<?php endforeach;
wp_reset_query();?>