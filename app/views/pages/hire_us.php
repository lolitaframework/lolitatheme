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
            <!-- b-get-in-touch -->
            <div class="b-get-in-touch">
                <h1 class="b-get-in-touch__title"><?php _e('Get in touch!', 'lolita') ?></h1>
                <form id="hire-us" class="b-get-in-touch__form" action="/" method="post" accept-charset="utf-8">
                    <input class="b-get-in-touch__form__input" type="text" name="name" value="" placeholder="<?php _e('Name', 'lolita') ?>">
                    <input class="b-get-in-touch__form__input" type="email" name="email" value="" placeholder="<?php _e('Email', 'lolita') ?>">
                    <textarea class="b-get-in-touch__form__textarea" name="message" placeholder="<?php _e('Write as much as you want', 'lolita') ?>"></textarea>
                    <button class="b-get-in-touch__form__submit" type="submit"><?php _e('Submit', 'lolita') ?></button>
                </form>
            </div>
            <!-- /b-get-in-touch -->
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
<?php echo do_shortcode('[footer]') ?>