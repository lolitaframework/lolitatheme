<?php echo do_shortcode('[header]') ?>
	<!-- l-main-block -->
    <section class="l-full-screen">
        <!-- l-front-block -->
        <div class="l-full-screen__l-front-block">
            <div class="l-front-block">
                <div class="l-front-block__w-menu">
                    <!-- w-menu -->
                    <div class="w-menu">
                        <?php echo do_shortcode('[w-menu]') ?>
                    </div>
                    <!-- /w-menu -->
                </div>
                <div class="l-front-block__w-logo l-front-block__w-logo--visible">
                    <?php echo do_shortcode('[w-logo]') ?>
                </div>
            </div>
        </div>
        <!-- /l-front-block -->
        <div class="l-full-screen__w-search-block">
            <?php echo do_shortcode('[w-search-block w_class="w-search-block w-search-block--hidden" b_class="b-search-form"]') ?>
        </div>
        <div class="l-full-screen__b-small-logo">
            <?php echo do_shortcode('[b-small-logo]') ?>
        </div>
        <!-- /l-main-block -->
    </section>
<?php echo do_shortcode('[footer]') ?>
