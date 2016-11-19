<!-- b-stories -->
<div class="b-stories">
    <h2 class="b-stories__title"><?php _e('Success stories', 'lolita') ?></h2>
    <p class="b-stories__desc"><?php _e('Stories of people inspired by Lolita inc. to change their life trough our products and services.', 'lolita') ?></p>
    <?php if (count($items)) : ?>
        <div>
            <ul class="b-stories__items">
            <?php foreach ($items as $p) : ?>
                <li class="b-stories__items__item">
                    <?php if ('' !== (string) $p->story_link) : ?>
                        <a href="<?php echo $p->story_link ?>" class="b-stories__items__item__image" style="background-image: url('<?php echo $p->img()->src('100x100') ?>');"></a>

                        <a href="<?php echo $p->story_link ?>" class="b-stories__items__item__name"><?php echo $p->title() ?></a>
                    <?php else : ?>
                        <span class="b-stories__items__item__image" style="background-image: url('<?php echo $p->img()->src('100x100') ?>');"></span>
                        <span class="b-stories__items__item__name"><?php echo $p->title() ?></span>
                    <?php endif ?>
                    
                    <span class="b-stories__items__item__position"><?php echo $p->story_position ?></span>
                    <span class="b-stories__items__item__story"><?php echo $p->content() ?></span>
                </li>
            <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>
    <ul class="b-stories__pages">
    </ul>
</div>
<!-- /b-stories -->