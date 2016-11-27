<!-- w-banner -->
<div class="<?php echo $class ?>">
    <div class="w-banner__image" style="background-image: url('<?php echo $img->src('20x20') ?>');" data-large="<?php echo $img->src('1440x500') ?>"></div>
    <?php echo '<pre>';
    var_dump($img->mime());
    echo '</pre>'; ?>
</div>
<!-- /w-banner -->
