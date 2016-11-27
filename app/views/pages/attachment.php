<?php echo do_shortcode('[header]') ?>
    <!-- l-full-screen -->
    <section class="l-full-screen">
        <div class="l-full-screen__item b-attachment">
            <!-- b-attachment -->
            <div class="b-attachment <?php echo $p->img()->isInitialized() ? '' : 'b-attachment--file' ?>">
                <?php if ($p->img()->isInitialized()) : ?>
                    <div class="b-attachment__image" style="background-image: url('<?php echo $p->img()->src('250x250') ?>');"></div>
                <?php else : ?>
                    <div class="b-attachment__image" style="background-image: url('<?php echo $default_image ?>');"></div>
                <?php endif ?>
                <div class="b-attachment__info">
                    <ul class="b-attachment__items">
                        <li class="b-attachment__info_item"><b><?php _e('File name', 'lolita') ?>:</b> <?php echo basename($p->guid) ?></li>
                        <li class="b-attachment__info_item"><b><?php _e('File type', 'lolita') ?>:</b> <?php echo $p->post_mime_type ?></li>
                        <li class="b-attachment__info_item"><b><?php _e('Uploaded on', 'lolita') ?>:</b> <?php echo $p->date() ?></li>
                        <li class="b-attachment__info_item"><b><?php _e('File size', 'lolita') ?>:</b> <?php echo $file_size ?></li>
                        <?php if ($p->img()->isInitialized()) : ?>
                        <li class="b-attachment__info_item"><b><?php _e('Dimensions', 'lolita') ?>:</b> <?php echo $width ?> X <?php echo $height ?></li>
                        <?php endif ?>
                    </ul>
                    <a href="<?php echo $p->guid ?>" class="b-attachment__link"><?php _e('Download', 'lolita') ?></a>
                </div>
                <a href="<?php echo home_url() ?>" class="b-attachment__close"><?php _e('Close', 'lolita') ?></a>
            </div>
            <!-- /b-attachment -->
        </div>
        <div class="l-full-screen__b-small-logo l-full-screen__b-small-logo--visible">
            <?php echo do_shortcode('[b-small-logo]') ?>
        </div>
    </section>
    <!-- /l-full-screen -->
<?php echo do_shortcode('[footer]') ?>