<?php 
  $data = $args;
?>

<div class="lo-website-item">
  <a href="<?= $data['site_link']; ?>" alt="" target="_blank">
    <img src="<?= $data['featured_image']; ?>" title="test text"/>
  </a>
  <span class="lo-website-category">Website Category</span>
  <a href="<?= $data['site_link']; ?>"><?= $data['title']; ?></a>
</div>