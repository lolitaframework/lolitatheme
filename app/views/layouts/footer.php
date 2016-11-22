    <!-- SCRIPTS -->
    <?php wp_footer(); ?>
    <!-- /SCRIPTS -->
    <?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-80756875-1', 'auto');
            ga('send', 'pageview');
        </script>
    <?php endif; ?>
    <?php echo do_shortcode('[lf_css_loader_hide]') ?>
</body>
</html>