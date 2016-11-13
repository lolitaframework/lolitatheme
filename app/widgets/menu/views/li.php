<?php if ('' !== $submenu) : ?>
    <?php $a_class = ' w-menu__link--has_submenu'; ?>
    <?php $li_class = ' w-menu__item--has_submenu'; ?>
<?php else : ?>
    <?php $a_class = ''; ?>
    <?php $li_class = ''; ?>
<?php endif ?>

<?php if (0 == $level) : ?>
    <li class="w-menu__item <?php echo $li_class ?>">
        <a href="<?php echo $p->url ?>" class="w-menu__link <?php echo $a_class ?> <?php echo implode(' ', (array) $p->classes) ?>"><?php echo $p->title ?></a>
        <?php echo $submenu ?>
    </li>
<?php else : ?>
    <li class="w-menu__sub-menu-item <?php echo $li_class ?>">
        <a href="<?php echo $p->url ?>" class="w-menu__sub-menu-link <?php echo $a_class ?> <?php echo implode(' ', (array) $p->classes) ?>"><?php echo $p->title ?></a>
        <?php echo $submenu ?>
    </li>
<?php endif ?>
