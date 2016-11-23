<?php if (is_array($comments) && count($comments)) : ?>
    <?php if (0 === $parent) : ?>
        <?php $ul_class = 'b-comments__items'; ?>
    <?php else : ?>
        <?php $ul_class = 'b-comments__sub-items'; ?>
    <?php endif ?>
    <ul class="<?php echo $ul_class ?>">
        <?php foreach ($comments as $comment) : ?>
            <li id="comment-<?php echo $comment->comment_ID ?>" class="b-comments__item">
                <div class="b-comments__item__comment">
                    <?php
                    echo $comment->avatar(
                        56,
                        '',
                        esc_attr($comment->comment_author),
                        array('class' => 'b-comments__item__comment__img')
                    );
                    ?>        
                    <div class="b-comments__item__comment__inner">
                        <div class="b-comments__item__comment__inner__author"><?php echo $comment->comment_author ?></div>
                        <div class="b-comments__item__comment__inner__meta"><?php echo $comment->date() ?> at <?php echo $comment->time() ?></div>
                        <div class="b-comments__item__comment__inner__text">
                            <?php echo $comment->comment_content ?>
                        </div>
                        <a href="<?php echo $comment->reply() ?>" class="b-comments__item__comment__inner__reply">Reply</a>
                    </div>        
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