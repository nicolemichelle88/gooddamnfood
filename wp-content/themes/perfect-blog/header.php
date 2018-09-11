<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-ts">
 *
 * @package perfect-blog
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'perfect-blog' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','perfect-blog'); ?></a></div>

  <div id="header">
    <div class="container">
      <div class="row">
        <div class="logo col-md-3 col-sm-3">
          <?php if( has_custom_logo() ){ perfect_blog_the_custom_logo();
           }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?> 
            <p class="site-description"><?php echo esc_html($description); ?></p>       
          <?php endif; }?>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="nav">
            <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
          </div>
        </div>
        <div class="social-media col-md-3 col-sm-3">
          <?php if( get_theme_mod( 'perfect_blog_facebook_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'perfect_blog_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'perfect_blog_twitter_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'perfect_blog_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'perfect_blog_youtube_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'perfect_blog_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
          <?php } ?> 
          <?php if( get_theme_mod( 'perfect_blog_rss_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'perfect_blog_rss_url','' ) ); ?>"><i class="fas fa-rss"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'perfect_blog_insta_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'perfect_blog_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'perfect_blog_pint_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'perfect_blog_pint_url','' ) ); ?>"><i class="fab fa-pinterest-p"></i></a>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>