<?php if (is_array($items) && count($items)) : ?>
<!-- b-pagination -->
<div class="b-pagination">
    <nav>
        <ul class="b-pagination__items">
            <?php foreach ($items as $el) : ?>
                <li class="b-pagination__item">
                    <?php if (array_key_exists('is_prev', $el)) : ?>
                        <?php if (array_key_exists('link', $el)) : ?>
                            <a class="b-pagination__item__prev" href="<?php echo $el['link'] ?>"><?php echo $el['text'] ?></a>
                        <?php else : ?>
                            <a class="b-pagination__item__prev b-pagination__item__prev--disabled" href="#"><?php echo $el['text'] ?></a>
                        <?php endif ?>
                    <?php elseif (array_key_exists('is_next', $el)) : ?>
                        <?php if (array_key_exists('link', $el)) : ?>
                            <a class="b-pagination__item__next" href="<?php echo $el['link'] ?>"><?php echo $el['text'] ?></a>
                        <?php else : ?>
                            <a class="b-pagination__item__next b-pagination__item__prev--disabled" href="#"><?php echo $el['text'] ?></a>
                        <?php endif ?>
                    <?php elseif (array_key_exists('link', $el)) : ?>
                        <a class="b-pagination__item__link" href="<?php echo $el['link'] ?>"><?php echo $el['text'] ?></a>
                    <?php else : ?>
                        <a class="b-pagination__item__link b-pagination__item__link--active" href="#"><?php echo $el['text'] ?></a>
                    <?php endif ?>
                </li>
            <?php endforeach ?>
        </ul>
        <span class="b-pagination__meta">Page <?php echo $current ?> of <?php echo $max_num_pages ?></span>
    </nav>
</div>
<!-- /b-pagination -->
<?php endif ?>