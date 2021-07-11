<?php
/**
 * Hero setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_active_sidebar( 'hero' ) || is_active_sidebar( 'statichero' ) || is_active_sidebar( 'herocanvas' ) || is_active_sidebar( 'fullscreenhero' ) ) :
	?>

	<div class="wrapper" id="wrapper-hero">

		<?php
		get_template_part( 'sidebar-templates/sidebar', 'hero' );
		get_template_part( 'sidebar-templates/sidebar', 'herocanvas' );
		get_template_part( 'sidebar-templates/sidebar', 'statichero' );
		// get_template_part( 'sidebar-templates/sidebar', 'fullscreen' );
		if(is_page_template('fullscreen.php')) { 
			echo '<div class="fullscreen">';
			get_template_part( 'sidebar-templates/sidebar', 'fullscreenhero', array(
					'class' => 'fullscreenhero'
				)
			); 
			echo '</div>';
		}
		?>

	</div>

	<?php
endif;
