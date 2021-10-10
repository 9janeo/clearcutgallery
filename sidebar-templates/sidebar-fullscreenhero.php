<?php
/**
 * Sidebar - hero setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if ( is_active_sidebar( 'fullscreenhero' ) ) : ?>

<!-- ******************* The Full Screen Hero Widget Area ******************* -->

<div id="home-carousel" class="carousel carousel-fade slide" data-ride="carousel" data-pause="false">

	<div class="carousel-inner" role="listbox">

		<?php 
			dynamic_sidebar( 'fullscreenhero' );
		?>

	</div>

</div><!-- .carousel -->

<script>
	jQuery( ".carousel-item" ).first().addClass( "active" );
</script>

<?php
endif;