<?php
global $bellini;
//Block One
 if ($bellini['bellini_feature_block_image_one'] or $bellini['bellini_feature_block_title_one'] or $bellini['bellini_feature_block_content_one'] ): ?>
<div class="<?php echo esc_attr($bellini['bellini_feature_block_row']);?>">
<div class="feature-block__inner row">
	<div class="feature-block__image--l3 col-sm-4">
		<?php if (!empty($bellini['bellini_feature_block_image_one'])): ?>
			<img src="<?php echo esc_url($bellini['bellini_feature_block_image_one']);?>" >
		<?php endif; ?>
	</div>
	<div class="block-one feature-block__content--l3 col-sm-8">
		<?php if(!empty($bellini['bellini_feature_block_title_one'])):?>
		    <h3 class="block-title">
		    <?php echo do_shortcode(wp_kses_post($bellini['bellini_feature_block_title_one']));?>
		    </h3>
		<?php endif;?>
		<?php if (!empty($bellini['bellini_feature_block_content_one'])): ?>
			<p>
				<?php echo do_shortcode(wp_kses_post($bellini['bellini_feature_block_content_one'])); ?>
			</p>
		<?php endif; ?>
	</div>
</div>
</div>
<?php endif;?>

<!-- Block Two -->
<?php if ($bellini['bellini_feature_block_image_two'] or $bellini['bellini_feature_block_title_two'] or $bellini['bellini_feature_block_content_two'] ): ?>
<div class="<?php echo esc_attr($bellini['bellini_feature_block_row']);?>">
<div class="feature-block__inner row">
	<div class="feature-block__image--l3 col-sm-4">
		<?php if (!empty($bellini['bellini_feature_block_image_two'])): ?>
			<img src="<?php echo esc_url($bellini['bellini_feature_block_image_two']);?>" >
		<?php endif; ?>
	</div>
	<div class="block-two feature-block__content--l3 col-sm-8">
		<?php if(!empty($bellini['bellini_feature_block_title_two'])):?>
		    <h3 class="block-title">
		    <?php echo do_shortcode(wp_kses_post($bellini[ 'bellini_feature_block_title_two']));?>
		    </h3>
		<?php endif;?>
		<?php if (!empty($bellini['bellini_feature_block_content_two'])): ?>
			<p>
				<?php echo do_shortcode(wp_kses_post($bellini['bellini_feature_block_content_two'])); ?>
			</p>
		<?php endif; ?>
	</div>
</div>
</div>
<?php endif;?>

<!-- Block Three -->
<?php if ($bellini['bellini_feature_block_image_three'] or $bellini['bellini_feature_block_title_three'] or $bellini['bellini_feature_block_content_three'] ): ?>
<div class="<?php echo esc_attr($bellini['bellini_feature_block_row']);?>">
<div class="feature-block__inner row">
	<div class="feature-block__image--l3 col-sm-4">
		<?php if (!empty($bellini['bellini_feature_block_image_three'])): ?>
			<img src="<?php echo esc_url($bellini['bellini_feature_block_image_three']);?>" >
		<?php endif; ?>
	</div>
	<div class="block-three feature-block__content--l3 col-sm-8">
		<?php if(!empty($bellini['bellini_feature_block_title_three'])): ?>
		    <h3 class="block-title">
		    	<?php echo do_shortcode(esc_html($bellini['bellini_feature_block_title_three']));?>
		    </h3>
		<?php endif;?>
		<?php if (!empty($bellini['bellini_feature_block_content_three'])): ?>
			<p>
				<?php echo do_shortcode(esc_html($bellini['bellini_feature_block_content_three'])); ?>
			</p>
		<?php endif; ?>
	</div>
</div>
</div>
<?php endif;?>