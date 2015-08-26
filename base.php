<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'eli_theme'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>

  <div class="wrap" role="document">
    <div class="content row pad-one-b">
      <main class="main col-sm-8 col-xs-12" role="main">
        <?php include eli_theme_template_path(); ?>
      </main><!-- /.main -->
      <?php if (eli_theme_display_sidebar()) : ?>
        <aside class="col-sm-4 col-xs-12 hidden-xs" role="complementary" id="sidebar"><div class="sidebar"> 
          <?php include eli_theme_sidebar_path(); ?></div>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>
	<!-- Piwik -->
<script type="text/javascript">
 var _paq = _paq || [];
 _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
 _paq.push(["setCookieDomain", "*.syr.edu"]);
 _paq.push(["setDomains", ["*.syr.edu"]]);
 _paq.push(['trackPageView']);
 _paq.push(['enableLinkTracking']);
 (function() {
   var u="//its-suwi.syr.edu/";
   _paq.push(['setTrackerUrl', u+'piwik.php']);
   _paq.push(['setSiteId', 1]);
   var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
   g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
 })();
</script>
<noscript><p><img src="//its-suwi.syr.edu/piwik.php?idsite=1&rec=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</body>
</html>
