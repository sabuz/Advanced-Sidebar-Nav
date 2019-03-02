jQuery(document).ready(function () {
    // insert toggle button
    jQuery(".advanced-sidebar-menu").each(function () {
        jQuery(".menu-item-has-children", jQuery(this)).each(function () {
            jQuery("> a", jQuery(this)).append(
                '<span class="advanced-sidebar-menu-toggle-button"></span>'
            );
        });
    });

    // menu toggle
    jQuery(".advanced-sidebar-menu", jQuery(this)).on(
        "click",
        ".advanced-sidebar-menu-toggle-button",
        function (e) {
            e.preventDefault();
            jQuery(this).toggleClass(
                "advanced-sidebar-menu-toggle-button-open"
            );
            jQuery(this).hasClass("advanced-sidebar-menu-toggle-button-open") ?
                jQuery(this)
                .parent('a')
                    .siblings("ul")
                    .slideDown(300) :
                jQuery(this)
                .parent('a')
                    .siblings("ul")
                    .slideUp(300);
        }
    );
});