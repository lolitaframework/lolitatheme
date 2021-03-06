<?php echo do_shortcode('[header]') ?>
    <!-- l-header -->
    <header class="l-header">
        <div class="l-header__top">
            <div class="l-header__wide-container">
                <div class="l-header__w-logo">
                    <?php echo do_shortcode('[w-logo--white]') ?>
                </div>
                <div class="l-header__w-menu">
                    <!-- w-menu -->
                    <div class="w-menu w-menu--header">
                        <?php echo do_shortcode('[w-menu]') ?>
                    </div>
                    <!-- /w-menu -->
                </div>
                <div class="l-header__w-search-block l-header__w-search-block--hidden">
                    <?php echo do_shortcode('[w-search-block w_class="w-search-block w-search-block--header w-search-block--hidden" b_class="b-search-form b-search-form--header"]') ?>
                </div>
            </div>
        </div>
    </header>
    <!-- /l-header -->
    <!-- l-archive -->
    <div class="l-archive">
        <div class="l-archive__title">
            <h1 class="l-archive__title__h1"><?php _e('Search', 'lolita') ?></h1>
            <div class="l-archive__title__search">
                <!-- b-search-form -->
                <form class="b-search-form b-search-form--archive" action="/" method="get" accept-charset="utf-8">
                    <input type="text" name="s" class="b-search-form__input" placeholder="<?php _e('Search..', 'lolita') ?>" value="<?php echo $s ?>">
                    <button class="b-search-form__clear">X</button>
                </form>
                <!-- /b-search-form -->
            </div>
        </div>
        <div class="l-archive__meta">
            <?php echo (int) $query->found_posts ?> <?php _e('results found', 'lolita') ?>
        </div>
        <div class="l-archive__results">
            <?php foreach ($items as $p) : ?>
                 <div class="l-archive__archive__results__item">
                    <?php
                    echo $__View::make(
                        'blocks' . DS . 'b-post-preview',
                        array(
                            'p' => $p,
                        )
                    );
                    ?>
                </div>
            <?php endforeach ?>
        </div>
        <div class="l-archive__pagination">
            <?php echo do_shortcode('[b-pagination max_num_pages="' . $max_num_pages . '" current="' . $current_page .'"]') ?>
        </div>
    </div>
    <!-- /l-archive -->
    <!-- l-footer -->
    <div class="l-footer">
        <div class="l-footer__row">
            <?php echo do_shortcode('[w-follow]') ?>
        </div>
        <div class="l-footer__row">
            <?php echo do_shortcode('[w-social-buttons]') ?>
        </div>
        <div class="l-footer__row l-footer__row--centered">
            <?php echo do_shortcode('[b-small-logo]') ?>
        </div>
    </div>
    <!-- /l-footer -->
<?php echo do_shortcode('[footer]') ?>