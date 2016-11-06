<?php if (is_array($comments) && count($comments)) : ?>
    <?php if (0 === $parent) : ?>
        <?php $ul_class = 'b-comments__items'; ?>
    <?php else : ?>
        <?php $ul_class = 'b-comments-sub__items'; ?>
    <?php endif ?>
    <ul class="<?php echo $ul_class ?>">
        <?php foreach ($comments as $comment) : ?>
            <li class="b-comments__item">
                <?php
                echo $comment->avatar(
                    56,
                    '',
                    esc_attr($comment->comment_author),
                    array('class' => 'b-comments__item__img')
                );
                ?>
                <div class="b-comments__item__comment">
                    <div class="b-comments__item__comment__author"><?php echo $comment->comment_author ?></div>
                    <div class="b-comments__item__comment__meta"><?php echo $comment->date() ?> at <?php echo $comment->time() ?></div>
                    <div class="b-comments__item__comment__text">
                        <?php echo $comment->comment_content ?>
                    </div>
                    <a href="<?php echo $comment->reply() ?>" class="b-comments__item__comment__reply">Reply</a>
                </div>
                <?php if (count($comment->getChildren())) : ?>
                    <?php
                    echo $__View::make(
                        $path,
                        array(
                            'comments' => $comment->getChildren(),
                            'path'     => $path,
                            'parent'   => $comment->comment_ID,
                        )
                    );
                    ?>
                <?php endif ?>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif ?>