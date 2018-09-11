<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<?php do_action( 'perfect_blog_before_slider' ); ?>

<?php /** slider section **/ ?>
<div class="slider-main">
  <?php
    // Get pages set in the customizer (if any)
    $pages = array();
    for ( $count = 1; $count <= 5; $count++ ) {
      $mod = absint( get_theme_mod( 'perfect_blog_slidersettings_page' . $count ) );
      if ( 'page-none-selected' != $mod ) {
        $pages[] = $mod;
      }
    }
    
    if( !empty($pages) ) :
      $args = array(
        'posts_per_page' => 5,
        'post_type' => 'page',
        'post__in' => $pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        $count = 1;
        ?>
        <div id="slider" class="nivoSlider">
          <?php
            $perfect_blog_n = 0;
          while ( $query->have_posts() ) : $query->the_post();
              
              $perfect_blog_n++;
              $perfect_blog_slideno[] = $perfect_blog_n;
              $perfect_blog_slidetitle[] = get_the_title();
              $perfect_blog_slidetext[] = get_the_excerpt();
              $perfect_blog_slidelink[] = esc_url( get_permalink() );
              ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $perfect_blog_n ); ?>" />
              <?php
            $count++;
          endwhile; wp_reset_postdata(); ?>
        </div>

        <?php
        $perfect_blog_k = 0;
          foreach( $perfect_blog_slideno as $perfect_blog_sln ){ ?>
            <div id="slidecaption<?php echo esc_attr( $perfect_blog_sln ); ?>" class="nivo-html-caption">
              <div class="slide-cap  ">
                <div class="container">
                  <h2><?php echo esc_html( $perfect_blog_slidetitle[$perfect_blog_k] ); ?></h2>
                  <p><?php echo esc_html( $perfect_blog_slidetext[$perfect_blog_k] ); ?></p>
                  <div class="slider-btn">
                    <a class="read-more" href="<?php echo esc_url( $perfect_blog_slidelink[$perfect_blog_k] ); ?>"><?php esc_html_e( 'READ MORE','perfect-blog' ); ?></a>
                  </div>
                </div>
              </div>
            </div>
            <?php $perfect_blog_k++;
        }
      else : ?>
          <div class="header-no-slider"></div>
        <?php
      endif;
    else : ?>
        <div class="header-no-slider"></div>
    <?php
    endif; 
  ?>
</div>

<?php do_action( 'perfect_blog_after_slider' ); ?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <?php if( get_theme_mod('perfect_blog_cat_title') != ''){ ?> <h3><?php echo esc_html(get_theme_mod('perfect_blog_cat_title',__('THINGS YOU DONT WANNA MISS','perfect-blog'))); ?></h3>
      <?php }?>
      <div class="category-section row">
        <?php 
          $page_query = new WP_Query(array( 'category_name' => get_theme_mod('perfect_blog_category','theblog')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-md-4 col-sm-4"> 
              <div class="imagebox">
                <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
              </div>
              <div class="contentbox">
                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
              </div>
            </div>
            <?php endwhile; 
            wp_reset_postdata();
        ?>
      </div>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
    <div id="sidebar" class="col-md-3">
      <?php dynamic_sidebar('home-page'); ?>
    </div>
  </div>
</div>

<?php do_action( 'perfect_blog_after_post_section' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>