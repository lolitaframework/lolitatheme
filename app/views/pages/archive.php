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
            <h1 class="l-archive__title__h1"><?php echo $qo->name ?></h1>
        </div>
        <div class="l-archive__breadcrumbs">
            <?php echo do_shortcode('[lolita-breadcrumbs_sc]'); ?>
        </div>
        <div class="l-archive__meta">
            <?php echo (int) $query->found_posts ?> <?php _e('results found', 'lolita') ?>
        </div>
        <div class="l-archive__results">
            <?php foreach ($items as $p) : ?>
                <div class="l-archive__archive__results__item">
                    <!-- b-post-preview -->
                    <article class="b-post-preview">
                        <?php if ($p->img()->isInitialized()) : ?>
                        <a href="<?php echo $p->link() ?>" class="b-post-preview__thumbnail">
                                <img class="b-post-preview__thumbnail__image" src="<?php echo $p->img()->src('200x200') ?>" alt="<?php echo $p->img()->alt() ?>">
                                <span class="b-post-preview__thumbnail__meta">Posted on <?php echo $p->date() ?></span>
                        </a>
                        <?php endif ?>
                        <div class="b-post-preview__content">
                            <h3 class="b-post-preview__content__title"><a href="<?php echo $p->link() ?>" class="b-post-preview__content__title__link"><?php echo $p->title() ?></a></h3>
                            <div class="b-post-preview__content__excerpt">
                                <?php echo preg_replace('/<pre class="prettyprint.*/s', '', $p->post_content ) ?>
                            </div>
                            <a href="<?php echo $p->link() ?>" class="b-post-preview__content__read-more"><?php _e('Read more', 'lolita') ?></a>
                        </div>
                    </article>
                    <!-- /b-post-preview -->
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