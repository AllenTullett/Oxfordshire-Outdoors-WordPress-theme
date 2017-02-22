<?php get_header(); ?>

    <?php include(TEMPLATEPATH.'/sidebar.php'); ?>

    <main class="content<?php if (get_field('top_menu', 'options') == 'yes' ) { ?><?php global $post; $children = get_pages( array( 'child_of' => $post->ID ) ); if ( is_page() && $post->post_parent ) : elseif ( is_page() && count( $children ) > 0 ) : else : ?> full-width<?php endif; ?><?php } else { } ?>">

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

          <?php if (get_field('top_menu', 'options') == 'yes' ) { ?>

          <?php } else { ?>

              <?php $images = get_field('slider'); if( !empty($images) ): ?>

              <?php if( have_rows('slider') ): ?>
              <ul class="slides">
                    <?php while( have_rows('slider') ): the_row(); ?>
                    <li style="background-image:url(<?php $sliderimage = get_sub_field('slider_image'); echo $sliderimage; ?>);">
                        <div class="overlay">
                            <div class="content-wrapper">
                                <section>
                                    <p><?php the_sub_field('caption'); ?></p>
                                </section>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

            <?php endif; ?>

          <?php } ?>

          <div class="page-contents">

            <h1><?php the_title(); ?></h1>
            <div style="clear:both;"></div>
            <?php the_content();?>
            <div style="clear:both;"></div>

        </div>

    <?php endwhile; endif; ?>
    <?php wp_reset_postdata(); ?>

    </main>

<div style="clear:both;"></div>
<?php get_footer(); ?>
