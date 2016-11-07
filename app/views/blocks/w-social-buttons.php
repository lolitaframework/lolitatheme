<?php if (count($icons)) : ?>
    <!-- w-social-buttons -->
    <div class="w-social-buttons">
        <ul class="w-social-buttons__items">
        <?php foreach ($icons as $icon) : ?>
            <li class="w-social-buttons__item">
                <a href="<?php echo $icon['url'] ?>" class="w-social-buttons__link">
                    <i class="w-social-buttons__link__icon <?php echo $icon['icon_css'] ?>"></i>
                </a>
            </li>
        <?php endforeach ?>
        </ul>
    </div>
    <!-- /w-social-buttons -->
<?php endif ?>
