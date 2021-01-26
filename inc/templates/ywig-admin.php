<h1>YWIG Theme Settings</h1>


<?php settings_errors(); ?>

<?php
  $logo          = esc_attr( get_option( 'logo' ) );
  $footer_logo   = esc_attr( get_option( 'footer_logo' ) );
  $twitter_link  = esc_attr( get_option( 'twitter_link' ) );
  $facebook_link = esc_attr( get_option( 'facebook_link' ) );
  $youtube_link  = esc_attr( get_option( 'youtube_link' ) );
?>


<div class="ywig-preview">
  <h5>Header Logo</h5>
  <div class="header-logo-preview">
	<?php
	if ( '' !== $logo ) {

		?>
	<img style="max-width:60px" src="<?php echo esc_url( $logo ); ?>" alt="logo">
		<?php
	} else {
		echo '<p>Not set.</p>';
	}
	?>

  </div>
	<h5>Footer Logo</h5>
  <div class="footer-logo-preview">
  <?php
	if ( '' !== $footer_logo ) {
		?>
	  <img style="max-width:60px" src="<?php echo esc_url( $footer_logo ); ?>" alt="logo">
		<?php
	} else {
		echo '<p>Not set.</p>';
	}
	?>
  </div>
</div>
<form method="post" action="options.php" class="ywig-settings-form">
<div id="preview-footer-logo"></div>
  <?php settings_fields( 'ywig-settings-group' ); ?>
  <?php do_settings_sections( 'moh_ywig' ); ?> 
  <?php submit_button( 'Save Changes', 'primary', 'submit-settings' ); ?>
</form>
