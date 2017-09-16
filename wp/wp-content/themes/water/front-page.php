<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Water_-_Save_it
 */

get_header(); ?>



<div class="white-bg">
	<div class="container">
		<h1>Some info on saving water</h1>
		<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia eum, sunt voluptatum nihil veniam cum reprehenderit similique, voluptas eveniet officia!</p>


<?php
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty'   => false
) );
 
foreach( $categories as $category ) {
    $category_link = sprintf( 
        '<a href="%1$s" alt="%2$s">%3$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
        esc_html( $category->name )
    );
     
    echo '<h2>' . sprintf( $category_link ) . '</h2> ';
    echo '<p>' . sprintf(  $category->description ) . '</p>';
} 
?>


	</div><!-- /.container -->
</div><!-- /.white-bg -->



		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

<?php
get_footer();
