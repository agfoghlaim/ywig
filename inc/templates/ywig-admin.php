<h1>YWIG Theme Settings</h1>
<h3 class="title">Manage Options</h3>

<?php settings_errors(); ?>

<?php 
  $logo = esc_attr( get_option('logo') );
  $twitter_link = esc_attr( get_option('twitter_link'));
?>

<div class="ywig-preview">
  <div class="preview-item">
  <img src="<?php echo $logo; ?>" alt="">
  </div>
</div>
<form method="post" action="options.php ">
  <?php settings_fields('ywig-settings-group'); ?>
  <?php do_settings_sections('moh_ywig') ?> 
  <?php submit_button(); ?>
</form>