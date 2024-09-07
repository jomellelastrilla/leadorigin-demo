<?php 
  function lo_website_projects_function( ){

    if ( !isset( $_POST['nonce'] ) ||  !wp_verify_nonce( $_POST['nonce'], LO_NONCE )		)
    {
      wp_send_json_error( array(
        'message' => __( 'Invalid request', 'lo' ),
        'type'    => 'invalid',
      ) );
      wp_die();
    }

    $fields = $_POST; 
    
    $args = array();

    $args = array(
      'post_type'       => 'website-project', 
      'order'           => 'ASC', 
      'orderby'         => 'title',
      'post_status'     => array('publish')
    );

    if ($fields['category'] !== "-1") :
      $args['tax_query'] = array(
        array(
          'taxonomy'  => 'web-category',
          'field'     => 'id',
          'terms'     =>  $fields['category']
        )
      );
    endif; 

    $content = '';

    $query = new WP_Query($args);

    if ( $query->have_posts() ) :
      ob_start(); 
      
      
      
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
  
      $content =  ob_get_clean();
      
    endif;

    wp_reset_postdata();    

    wp_send_json_success($content);
  }

  add_action('wp_ajax_lo_website_projects', 'lo_website_projects_function');
  add_action('wp_ajax_nopriv_lo_website_projects', 'lo_website_projects_function');
?>