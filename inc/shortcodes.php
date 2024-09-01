<?php

function lo_website_listings_function(){
  ob_start();


  $args = array();
  
  $args = array(
    'post_type'       => 'website-projects', 
    'order'           => 'ASC', 
    'orderby'         => 'title',
    'post_status'     => array('publish')
  );

  $query = new WP_Query($args);

  $count = $query->found_posts;

  if ( $query->have_posts() ) :
    ob_start(); 
    while ( $query->have_posts() ) : $query->the_post();  
    
      get_template_part('section/content' , 'listings');

    endwhile;
  endif;

  

  $content = ob_get_clean();

  return $content;
}

add_shortcode('lo_website_listings', 'lo_website_listings_function');