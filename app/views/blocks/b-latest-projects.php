<!-- b-latest-projects -->
<div class="b-latest-projects">
    <h2 class="b-latest-projects__title"><?php _e('Latest Projects', 'lolita') ?></h2>
    <p class="b-latest-projects__desc"><?php _e('We help clients across the world achieve success through high-quality, innovative & creative design work.', 'lolita') ?></p>
    <?php if (count($items)) : ?>
        <ul class="b-latest-projects__items">
        <?php foreach ($items as $p) : ?>
            <a class="b-latest-projects__items__item" href="<?php echo $p->project_link ?>" style="background-image: url('<?php echo $p->img()->src('340x260') ?>');" target="_blank">
                <span class="b-latest-projects__items__item__name"><?php echo $p->project_link ?></span>
            </a>
        <?php endforeach ?>
        </ul>
    <?php endif ?>
</div>
<!-- /b-latest-projects -->