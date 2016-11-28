<!-- w-banner -->
<div class="<?php echo $class ?>">
    <?php if ('image/gif' !== $img->mime()) : ?>
        <div class="w-banner__image" style="background-image: url('<?php echo $img->src('20x20') ?>');" data-large="<?php echo $img->src('1440x500') ?>"></div>
    <?php else : ?>
        <div class="w-banner__image" style="background-image: url('<?php echo $img->src('20x20') ?>');" data-large="<?php echo $img->src('full') ?>"></div>
    <?php endif ?>
</div>
<!-- /w-banner -->
