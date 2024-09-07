<?php

function lo_localize_scripts() {
  $args =  array(
    'nonce'         => wp_create_nonce(LO_NONCE)
  );

  wp_localize_script('lo-scripts','LO_DATA', $args);    
}

function lo_get_website_category($post_id) {
  // Get an array of term IDs associated with the post in the custom taxonomy 'web-category'
  $term_ids = wp_get_post_terms($post_id, 'web-category', array('fields' => 'ids'));

  if ($term_ids && !is_wp_error($term_ids)) {
      // Retrieve the name of the first term
      $term = get_term($term_ids[0], 'web-category');
      return $term->name;
  } else {
      return false; // Return false if no term is found
  }
}


function lo_website_categories() {
  $categories = get_terms(
    array(
        'taxonomy' => 'web-category',  // Taxonomy name for categories (usually 'category')
        'object_type' => array('web-projects'),  // Custom post type name
    )
  );

  if (!empty($categories) && !is_wp_error($categories)) {
      return $categories;
  } else {
    return false;
  }
  
}