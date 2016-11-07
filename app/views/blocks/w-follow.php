<?php if (array_key_exists('data', $items)) : ?>
    <!-- w-folow -->
    <div class="w-folow">
        <h5 class="w-folow__title"><?php _e('Folow', 'lolita') ?></h5>
        <div class="w-folow__frame">
            <ul class="w-folow__items">
                <?php foreach ($items['data'] as $i) : ?>
                    <li class="w-folow__item">
                        <a href="<?php echo $i['link'] ?>" class="w-folow__item__link">
                            <img class="w-folow__item__image" src="<?php echo $i['images']['thumbnail']['url'] ?>" alt="<?php echo esc_attr($i['caption']['text']) ?>">
                            <div class="w-folow__item__desc"><?php echo $i['caption']['text'] ?></div>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <!-- /w-folow -->
<?php endif ?>
