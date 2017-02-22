<?php
/*
Template Name: News posts
*/
?>

<?php get_header(); ?>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <?php
    $image = get_field('header_image');
    if(!empty($image)) { ?>

    <div class="row page-header no-title" style="background-image:url(<?php echo $image['url']; ?>);">

    <?php } else { ?>

    <div class="row page-header no-title" style="background-image:url(<?php bloginfo('template_directory'); ?>/library/images/default-background.png);">

    <?php }; ?>

        <div class="page-header-overlay">

        </div>

    </div>

    <div class="row">

        <div class="container">

            <main class="two-thirds page center" data-aos="fade-in">

                <h2 class="page-mini-header">News article</h2>
                <?php
                $image = get_field('main_image');
                if( !empty($image) ): ?>
                <figure class="post-photo main" style="background-image:url(<?php echo $image['url']; ?>);" title="">
                    <h1><?php the_title(); ?></h1>
                </figure>
                <?php endif; ?>

                <p class="post-date">Posted on <?php the_time('l jS F, Y'); ?></p>

                <?php the_content();?>

                <?php if( have_rows('resources') ): ?>
                    <section class="resources">
                        <h3>Resources</h3>
                        <ul>
                        <?php while( have_rows('resources') ): the_row(); ?>
                            <li>
                                <a href="<?php the_sub_field('file'); ?>" title="<?php the_sub_field('title'); ?>" target="_blank"><?php the_sub_field('title'); ?></a>
                            </li>
                        <?php endwhile; ?>
                        </ul>
                    </section>
                <?php endif; ?>

                <section class="page-footer">
                    <h3><a href="<?php bloginfo('url'); ?>/news" title="Back to news page" class="back-link">Read more news</a></h3>
                    <?php include(TEMPLATEPATH.'/social-share.php'); ?>
                </section>

            </main>

        </div>

    </div>

    <?php endwhile; endif; ?>
    <?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
