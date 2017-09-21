<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Water_-_Save_it
 */

get_header(); ?>

<h1>single.php</h1>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="cb">

<?php
$lastposts = get_posts( array(
    'posts_per_page' => 3
) );
 
if ( $lastposts ) {
    foreach ( $lastposts as $post ) :
        setup_postdata( $post ); ?>
        <div class="article">
        	 <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					 <div>
					    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php 
									if ( has_post_thumbnail() ) : 
								  		the_post_thumbnail('thumbnail');
									else:?>
										<img src="https://api.fnkr.net/testimg/250x250/00CED1/FFF/?text=feku">
								 <?php endif; ?>
					    </a>
					 </div>
        </div><!-- /.article -->
    <?php
    endforeach; 
    wp_reset_postdata();
}
?>
</div><!-- /.cb -->


<?php
get_sidebar();
get_footer();
