<?php

/*

@package ywig-theme

YWIG Front Page - Locations section

*/
?>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <?php

  $allLocations = get_terms(array(
    'taxonomy' => 'location',
    'hide_empty' => false,
  ));


  foreach ($allLocations as $location => $value) {
    $html_id = sprintf('pills-%s-tab', $value->slug);
    $href = sprintf('#pills-%s', $value->slug);
    $aria = sprintf('pills-%s', $value->slug);
  ?>
    <li class="nav-item">
      <a class="nav-link" id="<?php echo $html_id; ?>" data-toggle="pill" href="<?php echo $href; ?>" role="tab" aria-controls="<?php echo $aria; ?>" aria-selected="true">
        <?php echo $value->name; ?>
      </a>
    </li>

  <?php
  } //end foreach $allLocations
  ?>

</ul>
<div class="tab-content" id="pills-tabContent">
  <?php
  foreach ($allLocations as $location => $value) {
    $html_id = sprintf('pills-%s-tab', $value->slug);
    $href = sprintf('#pills-%s', $value->slug);
    $aria = sprintf('pills-%s', $value->slug);
  ?>
    <div class="tab-pane fade show" id="<?php echo $aria; ?>" role="tabpanel" aria-labelledby="<?php echo $html_id; ?>">
      <div class="row">
        <div class="col col-sm-3"><a href="#" target="_blank">
            <img style="max-width:100%;" src="https://maps.googleapis.com/maps/api/staticmap?&amp;zoom=15&amp;size=300x300&amp;markers=youth+work+galway+ireland&amp;key=AIzaSyAMy60iJGjTU1DzZaO0x1f7KMx4qVoZhHM" data-lazy-src="https://maps.googleapis.com/maps/api/staticmap?&amp;zoom=15&amp;size=300x300&amp;markers=youth+work+galway+ireland&amp;key=AIzaSyAMy60iJGjTU1DzZaO0x1f7KMx4qVoZhHM" data-was-processed="true"></a>
        </div>
        <div class="col-sm-9">
          <h2><?php echo $value->name; ?></h2>
          <?php
          $socials = ywig_list_of_socials(); // needs renaming, will be address, phone, eircode, google map img url (not social)
          foreach ($socials as $social => $val) {
            $term_key = sprintf('ywig_location_%s_metadata', $val['id']);
            $metadata = get_term_meta($value->term_id, $term_key, true);

            if (!empty($metadata)) {
              echo '<p>' . $metadata . '</p>';
            } 
          }

          ?>
        </div>
      </div>
    </div>
  <?php

  }
  ?>

</div>