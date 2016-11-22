<!-- w-folow -->
<div class="w-folow" style="display: none;">
    <h5 class="w-folow__title"><?php _e('Folow', 'lolita') ?></h5>
    <div class="w-folow__frame">
        <ul class="w-folow__items"></ul>
    </div>
</div>
<!-- /w-folow -->
<script type="text/html" id="tmpl-insta-item">
<li class="w-folow__item">
    <a href="{{ data.link }}" class="w-folow__item__link">
        <img class="w-folow__item__image" src="{{ data.placeholder }}" data-src="{{ data.src }}" alt="{{ data.text }}">
        <div class="w-folow__item__desc">{{{ data.text }}}</div>
    </a>
</li>
</script>
