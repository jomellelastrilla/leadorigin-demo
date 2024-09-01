<?php

function lo_website_listings_function(){
  ob_start();

  get_template_part('section/content' , 'listings');
  
  $content = ob_get_clean();

  return $content;
}

add_shortcode('lo_website_listings', 'lo_website_listings_function');