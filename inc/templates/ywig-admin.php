<h1>YWIG Theme Settings</h1>
<h3 class="title">Manage Options</h3>

<?php settings_errors(); ?>

<?php
  $logo          = esc_attr( get_option( 'logo' ) );
  $twitter_link  = esc_attr( get_option( 'twitter_link' ) );
  $facebook_link = esc_attr( get_option( 'facebook_link' ) );
  $youtube_link  = esc_attr( get_option( 'youtube_link' ) );
?>

<div class="ywig-preview">
  <div class="preview-item">
  <img src="<?php echo $logo; ?>" alt="">
  </div>
</div>
<form method="post" action="options.php" class="ywig-settings-form">
  <?php settings_fields( 'ywig-settings-group' ); ?>
  <?php do_settings_sections( 'moh_ywig' ); ?> 
  <?php submit_button( 'Save Changes', 'primary', 'submit-settings' ); ?>
</form>
