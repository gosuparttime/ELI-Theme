<?php if(has_post_thumbnail()){
		echo '<div class="pad-one-tb">';
		the_post_thumbnail( 'featured' );
		echo '</div>';	
	  } ?>
<header>
  <hgroup>
    <div class="page-header">
      <?php 
			$subhead =  get_the_subheading();
	 	  	if ($subhead) : 
				$head_class = "page-title clean-bottom"; 
            else: 
			 	$head_class = "page-title"; 
			endif; ?>
      <h1 class="<? echo $head_class ?>" itemprop="headline"> <?php echo eli_theme_title(); ?> </h1>
      <?php if (function_exists('the_subheading')) : 
									the_subheading('<h2 class="subheading">', '</h2>'); 
                                 endif; ?>
    </div>
  </hgroup>
</header>
