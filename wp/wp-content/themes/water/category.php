<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Water_-_Save_it
 */

get_header(); ?>

<div class="container">
			
		<main id="main" class="site-main">



<ul>
<?php

global $post;
$args = array( 'posts_per_page' => 5, 'offset'=> 1	 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</li>
<?php endforeach; 
wp_reset_postdata();?>

</ul>










		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->

	<?php get_sidebar(); ?>
</div><!-- /.container -->
<?php
get_footer();
