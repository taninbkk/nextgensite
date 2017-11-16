<section id="multifeature" class="multi-feature">
	<!-- feature section -->
	<div class="multi-feature-area">
		<div class="container">

			<div class="breadcrumb">
				<h1><?php the_title(); ?></h1>
			</div>
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<div class="page-description">
				<?php the_content(); ?>
			</div>
			<?php
			endwhile;
			endif;
			?>
		</div>
	</div>
</section>