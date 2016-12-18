<!-- b-post-preview -->
<article class="b-post-preview">
    <?php if ($p->img()->isInitialized()) : ?>
    <a href="<?php echo $p->link() ?>" class="b-post-preview__thumbnail">
            <img class="b-post-preview__thumbnail__image" src="<?php echo $p->img()->src('200x200') ?>" alt="<?php echo $p->img()->alt() ?>">
            <span class="b-post-preview__thumbnail__meta">Posted on <?php echo $p->date() ?></span>
    </a>
    <?php endif ?>
    <div class="b-post-preview__content">
        <h3 class="b-post-preview__content__title"><a href="<?php echo $p->link() ?>" class="b-post-preview__content__title__link"><?php echo $p->title() ?></a></h3>
        <div class="b-post-preview__content__excerpt">
        <?php echo apply_filters('the_excerpt', $p->post_excerpt); ?>
        </div>
        <a href="<?php echo $p->link() ?>" class="b-post-preview__content__read-more"><?php _e('Read more', 'lolita') ?></a>
    </div>
</article>
<!-- /b-post-preview -->