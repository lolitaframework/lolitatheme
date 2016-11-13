<?php if (0 == $level) : ?>
<!-- b-menu -->
<nav class="b-menu b-menu--header l-header__top-item">
    <ul class="w-menu__container">
        <?php echo $items ?>
    </ul>
</nav>
<?php else : ?>
    <ul class="w-menu__sub-menu">
        <?php echo $items ?>
    </ul>
<?php endif ?>