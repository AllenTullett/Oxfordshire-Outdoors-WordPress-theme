<?php get_header(); ?>

    <?php if (get_field('top_menu', 'options') == 'yes' ) { ?>

    <?php } else { ?>
        <?php include(TEMPLATEPATH.'/sidebar.php'); ?>
    <?php } ?>

    <main class="content<?php if (get_field('top_menu', 'options') == 'yes' ) { } else { ?> with-sidebar<?php } ?>">

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

        <?php if (get_field('top_menu', 'options') == 'yes' ) { ?>

            <div class="google-maps">
                <div class="overlay">
                    <?php echo do_shortcode( '[wpgmza id="1"]' ); ?>
                    <div class="content-wrapper">
                        <h2>Our centres</h2>
                    </div>
                </div>
            </div>

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

            <div style="clear:both;"></div>

            <div class="activity-and-course-benefits panel one-third">
                <h2>Activity &amp; course benefits</h2>
                <?php the_field('activity_and_course_benefits'); ?>
            </div>

            <div class="what-we-do panel one-third">
                <h2>What we do</h2>
                <?php the_field('what_we_do'); ?>
            </div>

            <div class="latest-updates panel one-third last">
                <h2>Latest updates</h2>
                <?php if( have_rows('latest_updates') ): ?>
                    <ul class="updates">
                    <?php while( have_rows('latest_updates') ): the_row(); ?>
                    <li>
                        <?php the_sub_field('update'); ?></p>
                    </li>
                    <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>

        <?php } else { ?>

            <?php if( have_rows('slider') ): ?>
            <ul class="slides <?php if (get_field('top_menu', 'options') == 'yes' ) { } else { ?> with-sidebar<?php } ?>">
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

          <div style="clear:both;"></div>

            <div class="page-contents">

              <h1><?php the_title(); ?></h1>
              <div style="clear:both;"></div>
              <?php the_content();?>
              <div style="clear:both;"></div>

          </div>

        <?php } ?>

    <?php endwhile; endif; ?>
    <?php wp_reset_postdata(); ?>

    </main>

<div style="clear:both;"></div>
<?php get_footer(); ?>
