<script type="text/html" id="tmpl-search-item">
    <li class="w-search-block__item">
        <a href="{{ data.url }}" class="w-search-block__link">
            <# if(data.img) { #>
                <img class="w-search-block__img" src="{{ data.img }}" alt="{{ data.img_alt }}">
            <# } #>
            
            <div class="w-search-block__text">
                <h3>{{{ data.title }}}</h3>
                <p>{{{ data.content }}}</p>
            </div>
        </a>
    </li>
</script>

<!-- w-search-block -->
<div class="<?php echo $w_class ?>">
    <div class="w-search-block__b-search-form">
        <!-- b-search-form -->
        <form class="<?php echo $b_class ?>" action="<?php echo home_url() ?>" method="get" accept-charset="utf-8">
            <input type="search" name="s" class="b-search-form__input" value="" placeholder="<?php _e('Search...', 'lolita') ?>" autofocus>
        </form>
        <!-- /b-search-form -->
    </div>
    <ul class="w-search-block__results">
    </ul>
    <button class="w-search-block__close"><?php _e('Close', 'lolita') ?></button>
</div>
<!-- /w-search-block -->
