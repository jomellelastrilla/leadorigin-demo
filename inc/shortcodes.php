<?php

function lo_website_listings_function(){

  $args = array();
  
  $args = array(
    'post_type'       => 'website-project', 
    'order'           => 'ASC', 
    'orderby'         => 'title',
    'post_status'     => array('publish'),
    'posts_per_page'  => -1
  );

  $query = new WP_Query($args);
  $content = '';

  $count = $query->found_posts;

  if ( $query->have_posts() ) :
    ob_start(); 
    
    get_template_part('sections/content' , 'listings-start');
    
      while ( $query->have_posts() ) : $query->the_post();  

      $payload = array(
        'id'             => get_the_ID(),
        'title'          => get_the_title(),        
        'featured_image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
        'site_link'      => get_field('website_url'),
        'category'       => lo_get_website_category(get_the_ID())
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