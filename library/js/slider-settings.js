jQuery(function() {
    jQuery(".slides").responsiveSlides({
        auto: true,             // Boolean: Animate automatically, true or false
        speed: 1000,            // Integer: Speed of the transition, in milliseconds
        timeout: 8000,          // Integer: Time between slide transitions, in milliseconds
        pager: true,            // Boolean: Show pager, true or false
        nav: false,             // Boolean: Show navigation
        manualControls: "#slides-pager"
    });
});
