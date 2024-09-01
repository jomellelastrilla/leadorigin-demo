<?php 
  $website_categories = lo_website_categories();
?>


<select id="lo-website-filter">
 <option value="-1" selected>All Projects</option>
  <?php 
    if ($website_categories):
      foreach($website_categories as $website_category):
        if ($website_category->slug !== 'uncategorized'):
  ?>
        <option value="<?= $website_category->term_id; ?>">
          <?= $website_category->name; ?>
          (<?= $website_category->count; ?>)
        </option>
  <?php 
        endif;
      endforeach;
    endif;
  ?>
</select>