<!-- b-might-like -->
<div class="b-might-like">
    <h2 class="b-might-like__title"><?php _e('You might also like', 'lolita') ?></h2>
    <ul class="b-might-like__items">
        <?php foreach ($items as $el) : ?>
            <li class="b-might-like__item">
                <a href="<?php echo $el->link() ?>" class="b-might-like__item__link">
                    <?php if ($el->img()->isInitialized()) : ?>
                        <img src="<?php echo $el->img()->src('340x260') ?>" class="b-might-like__item__image" alt="<?php echo esc_attr($el->title()) ?>">
                    <?php else : ?>
                        <img src="http://placehold.it/340x260" class="b-might-like__item__image" alt="<?php echo esc_attr($el->title()) ?>">
                    <?php endif ?>
                    
                    <h4 class="b-might-like__item__caption"><?php echo $el->title() ?></h4>
                    <div class="b-might-like__item__meta"><?php echo $el->date() ?></div>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</div>
<!-- /b-might-like -->