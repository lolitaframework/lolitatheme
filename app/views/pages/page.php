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
        <?php if ($p->img()->isInitialized()) : ?>
            <?php if ('image/gif' == $p->img()->mime()) : ?>
                <div class="l-header__botton">
                    <!-- w-banner -->
                    <div class="w-banner w-banner--header <?php echo $w_banner_gif ?>">
                        <div class="w-banner__image" style="background-image: url('<?php echo $p->img()->src('20x20') ?>');" data-image="<?php echo $p->img()->src('full') ?>"></div>
                    </div>
                    <!-- /w-banner -->
                </div>
            <?php else : ?>
                <div class="l-header__botton">
                    <!-- w-banner -->
                    <div class="w-banner w-banner--header">
                        <div class="w-banner__image" style="background-image: url('<?php echo $p->img()->src('large') ?>');"></div>
                    </div>
                    <!-- /w-banner -->
                </div>
            <?php endif ?>
        <?php endif ?>
    </header>
    <!-- /l-header -->
    <!-- l-content -->
    <div class="l-content">
        <div class="l-content__row">
            <!-- b-article -->
            <div class="b-article">
                <header class="b-article__header">
                    <div class="b-article__header__categories">
                        <?php if (is_array($p->categories) && count($p->categories)) : ?>
                            <!-- b-categories -->
                            <div class="b-categories">
                                <nav>
                                    <ul class="b-categories__list">
                                        <?php foreach ($p->categories as $cat) : ?>
                                            <li class="b-categories__list__item">
                                                <a class="b-categories__list__item__link" href="<?php echo $cat->link() ?>"><?php echo $cat->name ?></a>
                                            </li>
                                        <?php endforeach ?>
                                     </ul>
                                </nav>
                            </div>
                            <!-- /b-categories -->
                        <?php endif ?>
                    </div>
                    <h1 class="b-article__header__title"><?php echo $p->title() ?></h1>
                    <div class="b-article__header__meta">
                        Posted on <?php echo $p->date() ?>
                    </div>
                </header>
                <div class="b-article__content">
                    <div class="b-text">
                        <?php echo $p->content() ?>
                    </div>
                </div>
                <footer class="b-article__footer">
                    <?php if (is_array($p->tags) && count($p->tags)) : ?>
                        <!-- b-tags -->
                        <div class="b-tags">
                            <nav>
                                <ul class="b-tags__list">
                                <?php foreach ($p->tags as $tag) : ?>
                                    <li class="b-tags__list__item">
                                        <a class="b-tags__list__item__link" href="<?php echo $tag->link() ?>"><?php echo $tag->name ?></a>
                                    </li>
                                <?php endforeach ?>
                                </ul>
                            </nav>
                        </div>
                        <!-- /b-tags -->
                    <?php endif ?>
                </footer>
            </div>
            <!-- /b-article -->
        </div>
        <div class="l-content__row">
            <?php echo do_shortcode('[b-might-like p="' . $p->ID . '"]') ?>
        </div>
        <div class="l-content__row">
            <?php echo do_shortcode('[lolita-comments_sc]') ?>
        </div>
    </div>
    <!-- /l-content -->
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