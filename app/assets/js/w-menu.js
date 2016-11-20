$w_menu = jQuery('.w-menu');
$w_menu__item = jQuery('.w-menu__item');
$w_menu__item__has_submenu = jQuery('.w-menu__item.w-menu__item--has_submenu');
$w_menu__container = jQuery('.w-menu__container');
$w_menu__undered_line = jQuery('<span class="w-menu__undered-line"></span>');

// get menu items weight
function getMenuItemsWidth() {
    $w_menu_items_width = 0;
    $w_menu__item.not(':last').each(
        function() {
            $w_menu_items_width = $w_menu_items_width + jQuery(this).outerWidth();
        }
    );
    return $w_menu_items_width;
}

// add line into menu container
$w_menu__container.append($w_menu__undered_line);
$w_menu__item__has_submenu.hover(
    function() {
        $w_menu_items_width = getMenuItemsWidth();
        $w_menu__undered_line.animate({ 'width': $w_menu_items_width + 'px' }, 100);
    },
    function() {
        $w_menu_items_width = getMenuItemsWidth();
        $w_menu__undered_line.animate({ 'width': '0' }, 100);
    }
);

// add search button trigger
$w_menu__link__search = jQuery('.w-menu__link--search');
$w_menu__link__search.on('click',
    function() {
        jQuery('body').trigger('w_menu__link__search_click')
    }
);

// add mobile elements
$w_menu__mb_search = jQuery('<button class="w-menu__mb-search">Search</button>');
$w_menu__mb_menu_button = jQuery('<button class="w-menu__mb-menu-button">Menu</button>');
$w_menu.append($w_menu__mb_search);
$w_menu.append($w_menu__mb_menu_button);

$w_menu__mb_search.on('click',
    function(e) {
        e.preventDefault();
        jQuery('body').trigger('w_menu__link__search_click');
    }
);

$w_menu__mb_menu_button.on('click',
    function(e) {
        e.preventDefault();
        jQuery('body').trigger('w_menu__mb_menu_button_click');
        $w_menu__mb_menu_button.toggleClass('w-menu__mb-menu-button--opened');
        $w_menu__mb_search.toggleClass('w-menu__mb-search--hidden');
        $w_menu__container.toggle();
    }
);
