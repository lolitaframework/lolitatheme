<?php echo do_shortcode('[header]') ?>
	<!-- l-main-block -->
    <section class="l-full-screen">
        <!-- l-front-block -->
        <div class="l-full-screen__l-front-block">
            <div class="l-front-block">
                <div class="l-front-block__w-menu">
                    <?php echo do_shortcode('[lolita-menu_sc]' . $JSON_menu . '[/lolita-menu_sc]') ?>
                </div>
                <div class="l-front-block__w-logo l-front-block__w-logo--visible">
                    <!-- w-logo -->
                    <div class="w-logo">
                        <a href="<?php echo home_url() ?>" class="w-logo__link" style="background-image:url('<?php echo $logo ?>');"></a>
                    </div>
                    <!-- /w-logo -->
                </div>
            </div>
        </div>
        <!-- /l-front-block -->
        <div class="l-full-screen__w-search-block">
            <!-- w-search-block -->
            <div class="w-search-block w-search-block--hidden">
                
                <div class="w-search-block__b-search-form">
                    <!-- b-search-form -->
                    <form class="b-search-form" action="/" method="get" accept-charset="utf-8">
                        <input type="search" name="search" class="b-search-form__input" value="" placeholder="Search..." autofocus>
                    </form>
                    <!-- /b-search-form -->
                </div>
                <?php echo $tmpl_search_item ?>
                <ul class="w-search-block__results">
                </ul>
                <button class="w-search-block__close">Close</button>
            </div>
            <!-- /w-search-block -->
        </div>
        <div class="l-full-screen__b-small-logo">
            <!-- b-small-logo -->
            <div class="b-small-logo">
                <a href="<?php echo home_url() ?>" class="b-small-logo__item" style="background-image:url('<?php echo $logo ?>');"></a>
            </div>
            <!-- /b-small-logo -->
        </div>
        <!-- /l-main-block -->
    </section>
<?php echo do_shortcode('[footer]') ?>
