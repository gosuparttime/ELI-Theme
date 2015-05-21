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

</body>
</html>
