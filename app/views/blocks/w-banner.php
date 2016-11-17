<!-- w-banner -->
<div class="<?php echo $class ?>">
    <div class="w-banner__image" style="background-image: url('<?php echo $img->src('20x20') ?>');" data-large="<?php echo $img->src('1440x500') ?>"></div>
</div>
<!-- /w-banner -->
<?php if ('image/gif' == $p->img()->mime()) : ?>
                <div class="l-header__botton">
                    <!-- w-banner -->
                    <div class="w-banner w-banner--header w-banner--loading w-banner--gif">
                        <div class="w-banner__image" style="background-image: url('<?php echo $p->img()->src('20x20') ?>');" data-large="<?php echo $p->img()->src('1440x500') ?>"></div>
                    </div>
                    <!-- /w-banner -->
                </div>
            <?php else : ?>
                <div class="l-header__botton">
                    <!-- w-banner -->
                    <div class="w-banner w-banner--header w-banner--loading">
                        <div class="w-banner__image" style="background-image: url('<?php echo $p->img()->src('20x20') ?>');" data-large="<?php echo $p->img()->src('1440x500') ?>"></div>
                    </div>
                    <!-- /w-banner -->
                </div>
            <?php endif ?>