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
