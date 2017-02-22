        <footer class="footer">

            <div class="row other-sites">

                <div class="full-width">

                    <?php
                        $defaults = array(
                        'menu'            => 'Footer menu',
                        'menu_class'      => 'footer-menu',
                        'container'       => 'nav',
                        'container_class' => 'footer-menu',
                        'echo'            => true,
                        'items_wrap'      => '<ul>%3$s</ul>',
                        );
                        wp_nav_menu( $defaults );
                    ?>
                    <div style="clear:both;"></div>

                </div>

            </div>

            <div class="row cookies">

                <div class="full-width">

                    <p><a href="<?php bloginfo('site'); ?>/use-of-cookies">Our use of cookies</a></p>
                    <p>High quality residential outdoor education courses. Managed by <a href="https://www.groundwork.org.uk/sites/south" target="_blank">Groundwork South</p>
                    <div style="clear:both;"></div>

                </div>

            </div>

        </footer>

    </div> <!-- end container -->

</div> <!-- end sb site -->

<div class="sb-slidebar sb-left">

    <div class="sb-close light"></div>

    <div class="inner-container">

        <?php
    		$defaults = array(
    		'menu'            => 'Main menu',
    		'menu_class'      => 'slidebars-menu',
    		'container'       => 'nav',
    		'container_class' => 'slidebars-menu',
    		'echo'            => true,
    		'items_wrap'      => '<ul>%3$s</ul>',
    		);
    		wp_nav_menu( $defaults );
    	?>
    	<div style="clear:both;"></div>

    </div>

</div>

<?php wp_footer(); ?>

<script type="text/javascript">
$(document).ready(function() {
    // Slidebars
    $.slidebars();

    // CookieBar
    $.cookieBar({
        message: 'This website uses cookies to ensure you get the best experience on our website.',
        acceptButton: true,
        acceptText: 'I understand',
        acceptFunction: null,
        declineButton: false,
        declineText: 'Disable Cookies',
        declineFunction: null,
        policyButton: true,
        policyText: 'Our use of cookies',
        policyURL: '/use-of-cookies/',
        autoEnable: true,
        acceptOnContinue: false,
        acceptOnScroll: false,
        acceptAnyClick: false,
        expireDays: 365,
        renewOnVisit: false,
        forceShow: false,
        effect: 'slide',
        element: 'body',
        append: false,
        fixed: true,
        bottom: true,
        zindex: '',
        domain: 'www.yenworthylodge.co.uk',
        referrer: 'www.yenworthylodge.co.uk'
    });

    // Fitvids
    $(".container").fitVids();

});
// Hide Header on on scroll down - https://medium.com/@mariusc23/hide-header-on-scroll-down-show-on-scroll-up-67bbaae9a78c
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('.header-menus').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('.header-menus').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('.header-menus').removeClass('nav-up').addClass('nav-down');
        }
    }

    lastScrollTop = st;
}

</script>

</body>
</html>
