<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Water_-_Save_it
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<h2>this is sidebar.php</h2>
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
