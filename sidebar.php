<?php if (get_field('top_menu', 'options') == 'yes' ) { ?>


	<?php
	global $post;
	$children = get_pages( array( 'child_of' => $post->ID ) );

	if ( is_page() && $post->post_parent ) : ?>

		<aside class="sidebar child-pages">

			<ul class="child-sibling-pages">
				<?php wp_list_pages('title_li=&child_of='.$post->post_parent); ?>
			</ul>

		</aside>

	<?php elseif ( is_page() && count( $children ) > 0 ) : ?>

		<aside class="sidebar child-pages">

			<ul class="child-sibling-pages">
				<?php wp_list_pages('title_li=&child_of='.$post->ID); ?>
			</ul>

		</aside>

	<?php else : ?>


	<?php endif; ?>


<?php } else { ?>

	<aside class="sidebar">

		<?php
			$defaults = array(
			'menu'            => 'Main menu',
			'menu_class'      => 'main-menu',
			'container'       => 'nav',
			'container_class' => 'main-menu',
			'echo'            => true,
			'items_wrap'      => '<ul>%3$s</ul>',
			);
			wp_nav_menu( $defaults );
		?>
		<div style="clear:both;"></div>

		<div class="green-button">
			<a href="http://www.oxfordshireoutdoorlearningservice.co.uk/">More about Oxfordshire Outdoors</a>
		</div>

	</aside>

<?php } ?>
