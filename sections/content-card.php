<?php 
  $data = $args;
?>

<div class="lo-website-item">
  <a href="<?= $data['site_link']; ?>" alt="" target="_blank">
    <img src="<?= $data['featured_image'] ? $data['featured_image'] : 'https://placehold.co/535x300?text=Website\nProject'; ?>" title="<?= $data['title']; ?>"/>
  </a>
  <span class="lo-website-category">Website Category</span>
  <a href="<?= $data['site_link']; ?>"><?= $data['title']; ?></a>
</div>