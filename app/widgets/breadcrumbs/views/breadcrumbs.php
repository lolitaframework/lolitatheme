<?php echo $__Arr::get($args, 'before_widget') ?>
    <?php if ($crumbs) :
        $numItems = count($crumbs);
        $i = 0;
    ?>

        <!-- b-breadcrumbs -->
        <div class="b-breadcrumbs">
            <nav>
                <ul class="b-breadcrumbs__crumbs">
                    <?php foreach ($crumbs as $crumb) : ?>
                        <?php if (null === $crumb->getLink()) : ?>
                            <li class="b-breadcrumbs__crumb">
                                <a href="#" class="b-breadcrumbs__crumb__link b-breadcrumbs__crumb__link--disabled"><?php echo $crumb->getLabel() ?></a>
                            </li>
                        <?php else : ?>
                            <li class="b-breadcrumbs__crumb">
                                <a href="<?php echo $crumb->getLink() ?>" class="b-breadcrumbs__crumb__link"><?php echo $crumb->getLabel() ?></a>
                            </li>
                        <?php endif ?>
                        <?php if (++$i !== $numItems) : ?>
                            &nbsp;&gt;
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </nav>
        </div>
        <!-- /b-breadcrumbs -->
    <?php endif ?>
<?php echo $__Arr::get($args, 'after_widget') ?>
