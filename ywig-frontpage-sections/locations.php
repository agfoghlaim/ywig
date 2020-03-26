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
    $mapLink = get_term_meta($value->term_id, sprintf('ywig_location_%s_metadata', 'mapLink', true));
    $address = get_term_meta($value->term_id, sprintf('ywig_location_%s_metadata', 'address', true));
    $eircode = get_term_meta($value->term_id, sprintf('ywig_location_%s_metadata', 'eircode', true));
    $mapLink = get_term_meta($value->term_id, sprintf('ywig_location_%s_metadata', 'mapLink', true));
    $phone = get_term_meta($value->term_id, sprintf('ywig_location_%s_metadata', 'phone', true));
  ?>
    <div class="tab-pane fade show" id="<?php echo $aria; ?>" role="tabpanel" aria-labelledby="<?php echo $html_id; ?>">
      <div class="row">
        <div class="col col-sm-3"><a href="#" target="_blank">
            <img style="max-width:100%;" src="https://maps.googleapis.com/maps/api/staticmap?&amp;zoom=15&amp;size=300x300&amp;markers=youth+work+galway+ireland&amp;key=AIzaSyAMy60iJGjTU1DzZaO0x1f7KMx4qVoZhHM"></a>
        </div>
        <div class="col-sm-9">
          <h2><?php echo $value->name; ?></h2>
          <p> <?php echo isset($address[0]) ? $address[0] : ''; ?> </p>
          <p> <?php echo isset($eircode[0]) ? $eircode[0] : ''; ?> </p><br />
          <p> <?php echo isset($phone[0]) ? $phone[0] : ''; ?> </p>
        </div>
      </div>

      <?php
      // need to get projects with ~location $value->slug;
      $args = array(
        'post_type' => 'project',
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'location',
            'field' => 'slug',
            'terms' => $value->slug,
          ),
        ),
      );


      $projects_at_this_location = new WP_Query($args);
      ?>
      <div class="row projects-wrap">
        <?php
        $post_count = 0;
        if ($projects_at_this_location->have_posts()) :
          while ($projects_at_this_location->have_posts()) :
            $post_count += 1;
            $projects_at_this_location->the_post();
        ?>
          <div class="col-md-4 one-project-wrap" style="background:var(--pink); border:1px solid;">
            <h2><?php echo the_title(); ?> </h2>
            <?php echo the_post_thumbnail(); ?>
            <?php echo the_excerpt(); ?>
          </div>

        <?php
            /*
          Force next columns to break to new line.
          Bootstrap recommends this hack, need to do it every 3 projects .
          */

            if ($post_count % 3 === 0) {
              echo '<div class="w-100"></div> ';
            }

          endwhile;
        endif;
        ?>
      </div><!-- end .projects-wrap -->
    </div><!-- end .tab-pane -->
  <?php
  } // end foreach $allLocations
  ?>

</div><!-- end .tab-content -->