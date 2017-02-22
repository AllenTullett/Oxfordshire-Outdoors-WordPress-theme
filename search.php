<?php get_header(); ?>

    <?php include(TEMPLATEPATH.'/sidebar.php'); ?>

    <main class="content">

        <h2>Search results for: '<?php echo get_search_query(); ?>'</h2>

        <ul class="search-results">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                <li>
                    <p><strong><?php the_title(); ?></strong></p>
                    <?php the_excerpt();?>
                    <span class="read-more"><a href="<?php echo get_permalink(); ?>?post=true">Read more &raquo;</a></span>
                </li>

        <?php endwhile; endif; ?>
        <?php wp_reset_postdata(); ?>
        </ul>

    </main>

<div style="clear:both;"></div>
<?php get_footer(); ?>
