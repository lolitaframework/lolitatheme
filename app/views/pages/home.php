<?php echo do_shortcode('[header]') ?>
	<!-- l-main-block -->
    <section class="l-full-screen">
        <!-- l-front-block -->
        <div class="l-full-screen__l-front-block">
            <div class="l-front-block">
                <div class="l-front-block__w-menu">
                    <!-- w-menu -->
                    <div class="w-menu">
                        <nav>
                            <ul class="w-menu__container">
                                <li class="w-menu__item w-menu__item--has_submenu">
                                    <a href="#" class="w-menu__link">Docs</a>
                                    <ul class="w-menu__sub-menu">
                                        <li class="w-menu__sub-menu-item"><a href="#" class="w-menu__sub-menu-link">Configuration</a>
                                        </li>
                                        <li class="w-menu__sub-menu-item"><a href="#" class="w-menu__sub-menu-link">Core</a></li>
                                        <li class="w-menu__sub-menu-item"><a href="#" class="w-menu__sub-menu-link">Controls</a></li>
                                    </ul>
                                </li>
                                <li class="w-menu__item w-menu__item--has_submenu">
                                    <a href="#" class="w-menu__link">About me</a>
                                    <ul class="w-menu__sub-menu">
                                        <li class="w-menu__sub-menu-item"><a href="#" class="w-menu__sub-menu-link">Configuration1</a></li>
                                        <li class="w-menu__sub-menu-item"><a href="#" class="w-menu__sub-menu-link">Core1</a></li>
                                        <li class="w-menu__sub-menu-item"><a href="#" class="w-menu__sub-menu-link">Controls1</a></li>
                                    </ul>
                                </li>
                                <li class="w-menu__item w-menu__item--has_submenu">
                                    <a href="#" class="w-menu__link">Our works</a>
                                    <ul class="w-menu__sub-menu">
                                        <li class="w-menu__sub-menu-item"><a href="#" class="w-menu__sub-menu-link">Configuration3</a></li>
                                    </ul>
                                </li>
                                <li class="w-menu__item"><a href="#" class="w-menu__link w-menu__link--search">Search</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- /w-menu -->
                </div>
                <div class="l-front-block__w-logo l-front-block__w-logo--visible">
                    <!-- w-logo -->
                    <div class="w-logo">
                        <a href="<?php echo home_url() ?>" class="w-logo__link" style="background-image:url('<?php echo $logo ?>');"></a>
                    </div>
                    <!-- /w-logo -->
                </div>
            </div>
        </div>
        <!-- /l-front-block -->
        <div class="l-full-screen__w-search-block">
            <!-- w-search-block -->
            <div class="w-search-block w-search-block--hidden">
                
                <div class="w-search-block__b-search-form">
                    <!-- b-search-form -->
                    <form class="b-search-form" action="/" method="get" accept-charset="utf-8">
                        <input type="search" name="search" class="b-search-form__input" value="" placeholder="Search..." autofocus>
                    </form>
                    <!-- /b-search-form -->
                </div>
                
                <ul class="w-search-block__results">
                    <li class="w-search-block__item">
                        <a href="#" class="w-search-block__link">
                            <img class="w-search-block__img" src="./img/i-m-g-0055@3x.png" alt="">
                            <div class="w-search-block__text">
                                <h3><b>Here is</b> will be title</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati atque sit eius, doloribus autem officia! Totam laboriosam quisquam possimus, omnis sequi quod amet reiciendis, nesciunt repudiandae minima illo molestias qui.</p>
                            </div>
                        </a>
                    </li>
                    <li class="w-search-block__item">
                        <a href="#" class="w-search-block__link">
                            <img class="w-search-block__img" src="./img/i-m-g-0055@3x.png" alt="">
                            <div class="w-search-block__text">
                                <h3><b>Here is</b> will be title</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati atque sit eius, doloribus autem officia! Totam laboriosam quisquam possimus, omnis sequi quod amet reiciendis, nesciunt repudiandae minima illo molestias qui.</p>
                            </div>
                        </a>
                    </li>
                    <li class="w-search-block__item">
                        <a href="#" class="w-search-block__link">
                            <img class="w-search-block__img" src="./img/i-m-g-0055@3x.png" alt="">
                            <div class="w-search-block__text">
                                <h3><b>Here is</b> will be title</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati atque sit eius, doloribus autem officia! Totam laboriosam quisquam possimus, omnis sequi quod amet reiciendis, nesciunt repudiandae minima illo molestias qui.</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <button class="w-search-block__close">Close</button>
            </div>
            <!-- /w-search-block -->
        </div>
        <div class="l-full-screen__b-small-logo">
            <!-- b-small-logo -->
            <div class="b-small-logo">
                <a href="<?php echo home_url() ?>" class="b-small-logo__item" style="background-image:url('<?php echo $logo ?>');"></a>
            </div>
            <!-- /b-small-logo -->
        </div>
        <!-- /l-main-block -->
    </section>
<?php echo do_shortcode('[footer]') ?>
