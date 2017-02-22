<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="Chloe Osborne">
    <meta name="copyright" content="Copyright <?php bloginfo('name'); ?>. All Rights Reserved.">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <?php wp_head(); ?>

</head>

<body<?php if (is_front_page() ) { ?> class="homepage"<?php } else { ?><?php } ?>>

    <div id="sb-site">

        <div class="mobile-view header-menus nav-down">

            <div class="sb-toggle-left">
                <a href="#0">Menu</a>
            </div>

        </div>

        <div class="container">

            <header class="header<?php if (get_field('top_menu', 'options') == 'yes' ) { ?> top-menu<?php } else { } ?>" style="background-image: url(<?php the_field('background_image','options'); ?>);<?php if (is_front_page() ) { ?> margin-bottom: 20px;<?php } ?>">

                <?php if (get_field('top_menu', 'options') == 'yes' ) { ?>

                    <?php
            			$defaults = array(
            			'menu'            => 'Main menu',
            			'menu_class'      => 'oo-main-menu',
            			'container'       => 'nav',
            			'container_class' => 'oo-menu',
            			'echo'            => true,
            			'items_wrap'      => '<ul>%3$s</ul>',
            			);
            			wp_nav_menu( $defaults );
            		?>

                    <?php include(TEMPLATEPATH.'/searchform.php'); ?>

            	<?php } else { ?>

            	<?php } ?>

            </header>
