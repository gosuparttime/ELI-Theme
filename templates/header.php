<a href="#content" tabindex="1" class="off-screen">skip navigation</a>
<div id="university" class="container zero-pad" role="banner">
  <div class="row mar-one-tb">
    <div class="col-sm-4 col-xs-12"><a href="http://www.syr.edu/"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/SU-logo.png" alt="Syracuse University" />
      <h2 class="hide notranslate">Syracuse University</h2>
      </a></div>
    <div class="col-sm-8 col-xs-12 pull-right">
      <nav class="pull-right hidden-xs" role="navigation">
        <?php utility_nav(); ?>
      </nav>
    </div>
  </div>
</div>
<div id="wrapper" class="white">
<header role="banner" id="top-header">
  <div id="inner-header" class="container zero-pad">
    <div class="row">
      <div class="col-sm-6 col-xs-10">
        <div class="siteinfo"> <a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/ELI-logo.png" alt="<?php bloginfo( 'name' ); ?>" />
          <h1 class="hide notranslate">
            <?php bloginfo('name'); ?>
          </h1>
          </a> </div>
      </div>
      <div class="col-sm-5 col-sm-offset-1 col-xs-12 hidden-xs">
        <div class="clearfix container-fluid zero-pad-r">
          <form class="navbar-search col-xs-10 pull-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
            <label for="s" class="hidden">Search</label>
            <div class="col-xs-8 zero-pad"><input name="s" id="s" type="text" class="form-control" autocomplete="off" placeholder="<?php _e('Search','eli_theme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>' tabindex="2">
            </div><div class="col-xs-4 zero-pad"><button name="search-submit" type="submit" value="Search" class="btn-blue btn btn-block" tabindex="3">Search <i class="fa fa-search visible-lg"></i></button></div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id="banner-image" class="hero-unit container">
  <?php if (is_front_page()){ ?>
  <div id="myCarousel" class="carousel slide">
    
    <ol class="carousel-indicators hidden-xs">
      <?php 
			$post_num = 0;
            $query = new WP_Query(array( 'post_type' => 'slide'));
			while ( $query->have_posts() ) : $query->the_post();
			
			echo  '<li data-target="#myCarousel" data-slide-to="'.$post_num.'" ';
			 
			if($post_num == 0){ 
				echo 'class="active"';
			}
			echo '>';
			$post_num++;
			echo $post_num;
			echo '</li>';
			
			endwhile; ?>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
	<?php 
			$post_num = 0;
            $query = new WP_Query(array( 'post_type' => 'slide'));
			while ( $query->have_posts() ) : $query->the_post();
			$post_num++;
			// Image swaps?
			$attachment_id = get_field('slide_image');
			$size = "carousel";
			$image = wp_get_attachment_image_src( $attachment_id, $size );
            echo '<div class="item ';
			if($post_num == 1){ 
				echo 'active';
			}
			echo '"><img src="';
			echo $image[0];
			echo '" alt="';
			the_title();
			echo '" /><div class="carousel-caption">';
			echo '<h2>';
			the_title();
			echo '</h2>';
			the_field('slide_caption');
			echo '<a class="btn btn-block" href="';
			if(get_field('slide_url')){ 
				the_field('slide_url');
				echo '" target="_self" ';
			}
			else if(get_field('outside_url')){ 
				the_field('outside_url');
				echo '" target="_blank" ';
			}
			echo '><i class="fa fa-arrow-right icon-white"></i>';
			the_field('slide_action');
			echo '</a></div></div>';
			
			endwhile; ?>
    </div>
    <!-- Carousel nav -->
    <!-- Carousel nav -->
  <div class="visible-xs"><a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a></div>
  </div>
    <? } else { ?>
    <?php if (get_field('header_image')) { 
			$banner_id = get_field('header_image');
			$banner_size = "banner";
			$banner_image = wp_get_attachment_image_src( $banner_id, $banner_size );
			echo '<img src="';
			echo $banner_image[0];
			echo '" alt="';
			the_title();
			echo '"/>';
	
	} else { ?>
    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/banners/rotate.php" alt="A Random Header Image" />
	<? } ?>
    <h2 class="page-header">
      <?php
$parent_title = get_the_title($post->post_parent);
echo $parent_title;
?>
    </h2>
    <? } ?>
  </div>
  <!-- end #inner-header -->
  <div class="navbar navbar-default navbar-top">
    <div class="navbar-inner">
      <div class="container nav-container zero-pad">
        <nav role="navigation"><button type="button" class="navbar-toggle btn-block" data-toggle="collapse" data-target="#navbar-main">Menu<div class="pull-right"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div></button>
          <div class="collapse navbar-collapse" id="navbar-main">
            <?php eli_main_nav(); // Adjust using Menus in Wordpress Admin ?>
            <div class="clearfix visible-xs pad-one">
            
          <form class="navbar-search col-xs-12" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
            <label for="s" class="hidden">Search</label>
            <div class="col-xs-8 zero-pad"><input name="s" id="s" type="text" class="form-control" autocomplete="off" placeholder="<?php _e('Search','eli_theme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>' tabindex="2">
            </div><div class="col-xs-4 zero-pad"><button name="search-submit" type="submit" value="Search" class="btn-blue btn btn-block" tabindex="3">Search <i class="fa fa-search visible-xs"></i></button></div>
          </form>
        </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <div class="navbar navbar-inverse">
    <div class="navbar-inner container">
      <div class="container nav-container zero-pad">
        <nav role="navigation"><button type="button" class="navbar-toggle btn-block" data-toggle="collapse" data-target="#navbar-lang">Select Language<div class="pull-right"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div></button>
          <div class="navbar-collapse collapse" id="navbar-lang"><div class="row">
          	<div class="col-sm-8 col-xs-12"><?php eli_lang_nav(); // Adjust using Menus in Wordpress Admin ?></div>
            <div class="col-sm-4 col-xs-12" id="translation"><?php echo do_shortcode('[google-translator]'); ?></div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>

<!-- end header -->

<div class="container zero-pad">
