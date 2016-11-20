<!-- b-comments -->
<div class="b-comments">
    <h2 class="b-comments__title"><?php echo count((array) $p->comments()) ?> <?php _e('Comments', 'lolita') ?></h2>
    <?php echo $elements ?>
    <?php echo $form ?>
</div>
<!-- /b-comments -->