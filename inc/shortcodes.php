<?php

function lo_website_listings_function(){

  $args = array();
  
  $args = array(
    'post_type'       => 'website-project', 
    'order'           => 'ASC', 
    'orderby'         => 'title',
    'post_status'     => array('publish')
  );

  $query = new WP_Query($args);
  $content = '';

  $count = $query->found_posts;

  if ( $query->have_posts() ) :
    ob_start(); 
    
    get_template_part('sections/content' , 'listings-start');
    
      while ( $query->have_posts() ) : $query->the_post();  

      $payload = array(
        'id'             => '',
        'title'          => '',
        'featured_image' => '',
        'external_link'  => ''
      );
    
      get_template_part('sections/content' , 'card', $payload);

    endwhile;

    get_template_part('sections/content' , 'listings-end');

    wp_reset_postdata();
  endif;

  

  $content = ob_get_clean();

  return $content;
}

add_shortcode('lo_website_listings', 'lo_website_listings_function');