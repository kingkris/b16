<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Water_-_Save_it
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="KriShne Gowda NL">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="shortcut icon" href="favicon.ico">
	<link rel="profile" href="http://gmpg.org/xfn/11">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,500" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  <!-- Add your site or application content here -->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'water' ); ?></a>
<header class="site-header-inner">
  <div class="container">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> <small><?php bloginfo( 'description' ); ?></small></h1>
			<?php else : ?>
				<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> <small><?php bloginfo( 'description' ); ?></small></div>
			<?php endif; ?>
    <div class="ham">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <nav>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'simple-menu',
					'container' => false,
				) );
			?>
    </nav>
  </div>
</header>



<div class="banner">
  <?php if ( has_post_thumbnail() ) : 
     the_post_thumbnail('full'); 
   else: ?>
    <picture>
      <source media="(max-width: 767px)" srcset="https://api.fnkr.net/testimg/418x658/202409/FFF/?text=img+mobil">
      <source media="(min-width: 1400px)" srcset="https://api.fnkr.net/testimg/2000x900/202409/FFF/?text=img+xl">
      <source media="(min-width: 980px)" srcset="https://api.fnkr.net/testimg/1500x675/202409/FFF/?text=img+desktop">
      <source media="(min-width: 768px)" srcset="https://api.fnkr.net/testimg/860x800/202409/FFF/?text=img+tab">
      <img src="img/banner-l.jpg" alt="Save water Save earth">
    </picture>
  <?php endif; ?>

  <div>
    Wakeup now!
    <span>Start saving today!</span>
  </div>

  

</div>
<!-- 
<div class="banner">
  <div>
    Wakeup now!
    <span>Start saving today!</span>
  </div>
</div>
 -->


	<div id="content" class="site-content">
