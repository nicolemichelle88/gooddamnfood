<?php
/**
 * The template part for displaying services
 *
 * @package perfect-blog
 * @subpackage perfect-blog
 * @since perfect-blog 1.0
 */
?>  
<div class="page-box">
    <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
    <div class="metabox">
        <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
        <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></span>       
        <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'perfect-blog'), __('0 Comments', 'perfect-blog'), __('% Comments', 'perfect-blog') ); ?> </span>
    </div>
    <div class="new-text">
        <p><?php the_excerpt();?></p>
        <div class="second-border">
            <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'Read More', 'perfect-blog' ); ?>"><?php esc_html_e('read complete post','perfect-blog'); ?></a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>