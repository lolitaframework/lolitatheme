<?php echo do_shortcode('[header]') ?>
        <!-- l-like-window  -->
        <header class="l-like-window">
            <a class="l-like-window__back" href="<?php echo home_url() ?>">
                <?php _e('Back', 'lolita') ?>
            </a>
        </header>
        <!-- /header -->
        <!-- /l-like-window  -->
        <!-- l-content -->
        <div class="l-content">
            <div class="l-content__wrapper">
                <div class="l-content__row l-content__row--showcase">
                    <?php echo do_shortcode('[b-features]') ?>
                </div>
                <div class="l-content__row l-content__row--showcase">
                    <?php echo do_shortcode('[b-latest-projects]') ?>
                </div>
                <div class="l-content__row l-content__row--showcase l-content__row--color1">
                    <?php echo do_shortcode('[b-services]') ?>
                </div>
                <div class="l-content__row l-content__row--showcase">
                    <?php echo do_shortcode('[b-products]') ?>
                </div>
                <div class="l-content__row l-content__row--showcase l-content__row--color1">
                    <!-- b-request-a-quote -->
                    <div class="b-request-a-quote">
                        <h2 class="b-request-a-quote__title">
                            <b><?php _e('Describe your WordPress dreams</b> in a few words and get dev budgeting the same day', 'lolita') ?>
                        </h2>
                        <a class="b-request-a-quote__request" href="<?php echo home_url('/hire-us') ?>"><?php _e('Request a quote', 'lolita') ?></a>
                    </div>
                    <!-- /b-request-a-quote -->
                </div>
                <div class="l-content__row l-content__row--showcase">
                    <?php echo do_shortcode('[b-stories]') ?>
                </div>
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
        <!-- /l-full-screen -->
<?php echo do_shortcode('[footer]') ?>