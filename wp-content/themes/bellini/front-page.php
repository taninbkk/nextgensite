<?php
/**
* Load the correct front page template.
*
* If a page hasn't been selected for the front page, show the blog (home)
* template.
*
* Otherwise, display the frontpage template.
*
*/
if ( get_option( 'show_on_front' ) == 'page' ) {
    include( get_page_template() );
}else {
	get_template_part( 'template-parts/template', 'homepage' );
}