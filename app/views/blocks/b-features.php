<!-- b-features -->
<div class="b-features">
    <h2 class="b-features__title"><?php _e('Dreams come true with us!', 'lolita') ?></h2>
    <p class="b-features__desc"><?php _e('We strive for customer satisfaction so perfect it’ll leave you speechless. That is Lolita inc.', 'lolita') ?></p>
    <?php if (count($items)) : ?>
        <ul class="b-features__items">
        <?php foreach ($items as $el) : ?>
            <li class="b-features__items__item">
                <div class="b-features__items__item__image" style="background-image: url('<?php echo $el->img()->src('large') ?>');"></div>
                <h3 class="b-features__items__item__caption"><?php echo $el->title() ?></h3>
                <ul class="b-features__items__item__features">
                    <?php echo $el->content() ?>
                </ul>
                <div class="b-features__items__item__price"><?php echo $el->feature_price ?></div>
                <a class="b-features__items__item__hire-us" href="<?php echo $el->feature_link ?>"><?php _e('Buy', 'lolita') ?></a>
            </li>
        <?php endforeach ?>
        </ul>
    <?php endif ?>
</div>
<!-- /b-features -->