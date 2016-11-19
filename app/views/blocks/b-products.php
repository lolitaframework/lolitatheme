<!-- b-products -->
<div class="b-products">
    <h2 class="b-products__title"><?php _e('Products', 'lolita') ?></h2>
    <p class="b-products__desc"><?php _e('Our products on', 'lolita') ?> <a href="https://codecanyon.net/user/lolitainc/portfolio"><?php _e('envanto market', 'lolita') ?></a></p>
    <?php if (count($items)) : ?>
        <ul class="b-products__items">
        <?php foreach ($items as $p) : ?>
            <li class="b-products__items__item">
                <span class="b-products__items__item__image" style="background-image: url('<?php echo $p->img()->src('128x128') ?>');"></span>
                <span class="b-products__items__item__desc"><?php echo $p->content(); ?></span>
            </li>
        <?php endforeach ?>
        </ul>
    <?php endif ?>
</div>
<!-- /b-products -->