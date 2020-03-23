<?php
/*
  The Header Template
 @package ywig-theme
  */

$twitter = esc_attr(get_option('twitter_link'));
$facebook = esc_attr(get_option('facebook_link'));
$youtube = esc_attr(get_option('youtube_link'));
$socials = array($twitter, $facebook, $youtube);
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    </link>
  <?php endif; ?>
  <?php wp_head(); ?>
  <meta name="description" content="<?php bloginfo('description'); ?>">
  </meta>
  <title><?php bloginfo('name');
          wp_title(); ?></title>
</head>

<body <?php body_class(); ?>>

  <header id="home" class="header">

    <div class="container-fluid top-line">
      <div class="row">
        <div class="navbar-socials col-sm" style="background:yellow">

          <?php
          if (!empty($twitter)) : ?>
            <a href="<?php echo $twitter; ?>" target="_blank" class="ywig-social-btn">
              <span class="ywig-icon-sidebar ywig-icon ywig-twitter"></span>
              <span class="sr-only">Visit our Twitter</span></a>
          <?php endif;
          if (!empty($facebook)) : ?>
            <a href="<?php echo $facebook; ?>" target="_blank" class="ywig-social-btn">
              <span class="ywig-icon-sidebar ywig-icon ywig-facebook"></span>
              <span class="sr-only">Visit our Facebook</span></a>
          <?php endif;
          if (!empty($youtube)) : ?>
            <a href="<?php echo $youtube; ?>" target="_blank" class="ywig-social-btn">
              <span class="ywig-icon-sidebar ywig-icon ywig-youtube"></span>
              <span class="sr-only">Visit our Youtube</span></a>
          <?php endif;
          ?>

        </div>
        <div class="navbar-brand col-sm">
          <a href="#" class="custom-logo-link" rel="home">
            <img width="200" height="67" src="http://youthworkgalway.ie/wp-content/uploads/2018/06/ywig_new_logo-_op.png" />
          </a>
        </div> <!-- /.navbar-brand -->
        <div class="navbar-donate col-sm">
          <a href="#" target="_blank" class="btn btn-danger">Donate</a>
        </div>
      </div>

    </div>

    <nav class="navbar nav-fill w-100 navbar-expand-sm navbar-light bg-light">
      <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" style="border:2px solid blue;" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <?php
        wp_nav_menu(array(
          'theme_location'  => 'main',
          'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
          'container'       => 'div',
          'container_class' => 'collapse navbar-collapse',
          'container_id'    => 'navbarSupportedContent',
          'menu_class'      => 'navbar-nav mx-auto',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new WP_Bootstrap_Navwalker(),
        ));
        ?>

      </div>
    </nav>

    <div class="home-hero-wrap">
      <div class="row">
        <div class="ywig-hero-box col-md-4 col-sm-4 col-xs-6" id="ywig-hero-box-one">
          <svg baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" width="300" height="300" viewBox="0 0 200 200" xml:space="preserve">
            <path class="blue" fill="#01cbfb" stroke="none" stroke-miterlimit="10" d="M102.514 117.705a121.69 121.69 0 00-25.347 24.256C30.926 90.982 40.648 31.601 40.648 31.601c38.852 24.825 55.23 58.532 61.866 86.104z" />
            <path class="blue" fill="#01cbfb" stroke="none" stroke-miterlimit="10" d="M105.36 167c-6.158-4.223-11.756-8.617-16.839-13.127 6.312-.853 12.154-2.074 17.544-3.594.234 10.322-.705 16.721-.705 16.721z" />
            <path class="darkgreen" id="ywig-dg" fill="none" stroke="none" stroke-miterlimit="10" d="M106.766 150.279c-5.389 1.52-11.232 2.741-17.544 3.594a153.675 153.675 0 01-12.055-11.912 121.69 121.69 0 0125.347-24.256 153.694 153.694 0 014.252 32.574z" />
            <path class="orange" fill="#3e4e32" stroke="none" stroke-miterlimit="10" d="M89.222 153.873c-6.429.865-13.357 1.337-20.811 1.337 0 0 2.75-5.536 8.755-13.249a153.692 153.692 0 0012.056 11.912zM169.204 95.493s-11.612 40.5-62.438 54.786a153.564 153.564 0 00-4.252-32.574 118.542 118.542 0 0119.79-11.367c-2.205 4.754-4.116 10.12-5.589 16.162 0 0 23.983-4.495 39.647-25.865 4.113-.571 8.392-.951 12.842-1.142z" />
            <path class="red" fill="none" stroke="none" stroke-miterlimit="10" d="M156.362 96.635c-15.664 21.37-39.647 25.863-39.647 25.863 1.473-6.04 3.384-11.403 5.589-16.16 9.819-4.448 21.144-7.94 34.058-9.703z" />
            <path class="pink" fill="#ffc0cb" stroke="none" stroke-miterlimit="10" d="M168.064 69.248c-2.189 11.296-6.484 20.277-11.702 27.387-12.914 1.764-24.239 5.255-34.059 9.703 15.482-33.299 45.761-37.09 45.761-37.09z" />
            <path class="green" fill="#7fce45" stroke="none" stroke-miterlimit="10" d="M106.825 41.104s17.876 28.529-.762 63.521c0 0-20.538-27.008.762-63.521z" /></svg>

        </div>

        <div class="ywig-hero-box col-md-4 col-sm-4 col-xs-6" id="ywig-hero-box-two"></div>

        <div class="ywig-hero-box col col-md-4 col-sm-4 col-xs-6" id="ywig-hero-box-three"></div>
      </div>

      <div class="row">
        <div class="ywig-hero-box col col-md-4 col-sm-4 col-xs-6" id="ywig-hero-box-four"></div>
        <div class="ywig-hero-box col col-md-4 col-sm-4 col-xs-6" id="ywig-hero-box-five"></div>
        <div class="ywig-hero-box col col-md-4 col-sm-4 col-xs-6" id="ywig-hero-box-six"></div>
      </div><!-- .row -->

      <div id="ywig-hero-h1-wrap" class="col col-md-8 col-lg-8 col-md-offset-3 col-lg-offset-3 col-sm-8 col-sm-offset-3">
        <h1 class="ywig-hero-h1">
          Youth Work Ireland
          <span class="ywig-hero-h1-span">Galway</span>
        </h1>
        <h2 class="ywig-hero-h2">Empowering young people</h2>
      </div>
    </div><!-- home-hero-wrap -->

  </header>

  <section class="about" id="about">

    <div class="container-fluid">

      <?php
      $mission_h = get_theme_mod('ywig-about-section-mission-h');
      $mission_p = get_theme_mod('ywig-about-section-mission-p');
      $box_1_h = get_theme_mod('ywig-about-section-box-1-h');
      $box_1_p = get_theme_mod('ywig-about-section-box-1-p');
      $box_2_h = get_theme_mod('ywig-about-section-box-2-h');
      $box_2_p = get_theme_mod('ywig-about-section-box-2-p');
      $box_3_h = get_theme_mod('ywig-about-section-box-3-h');
      $box_3_p = get_theme_mod('ywig-about-section-box-3-p');
      $img_url = wp_get_attachment_url(get_theme_mod('ywig-about-section-image'));

      ?>
      <div class="row ywig-mission-row">
        <div class="offset-lg-3 col-lg-6 offset-md-3 col-md-6">
          <h3><?php echo $mission_h; ?></h3>
          <blockquote class="ywig-blockquote"><?php echo $mission_p; ?></blockquote>
        </div>
      </div>

      <div class="row ywig-about-row ywig-about-row-1">

        <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 ywig-about-box-1">
          <h3 class="ywig-about-h3"><?php echo $box_1_h; ?></h3>

          <!-- TODO - php/wp has some function that will put these into paragraphs as per paragraphs in textarea of customizer -->
          <p class="ywig-about-p"><?php echo $box_1_p; ?></p>
        </div>

        <div class="col col-lg-6 col-md-6">
          <div class="ywig-about-box-2">
            <img src="<?php echo $img_url; ?>">
          </div>
        </div>
      </div>

      <div class="row ywig-about-row ywig-about-row-2">
        <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 ywig-about-box-3">
          <h3 class="ywig-about-h3"><?php $box_2_h; ?></h3>
          <p class="ywig-about-p"><?php echo $box_2_p; ?></p>
        </div>

        <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 ywig-about-box-4">
          <h3 class="ywig-about-h3"><?php echo $box_3_h; ?></h3>
          <p class="ywig-about-p"><?php echo $box_3_p; ?></p>
          <div class="ywig-about-btn-group">
            <button class="btn btn-info">Learn More</button>
            <button class="btn btn-info">Donate</button>
            <button class="btn btn-info">Get Involved</button>
          </div>
        </div>

      </div><!-- .ywig-about-row-2 -->

    </div> <!-- .container-fluid-->
  </section>

  <section class="locations" id="locations">
    <div class="section-title-wrap">
      <div class="row ywig-section-title-row">
        <img src="http://youthworkgalway.ie/wp-content/uploads/2018/06/ywig_tiny_colour.png">
      </div>
      <div class="row ywig-section-title-row">
        <h2 class="dark-text">Locations &amp; Projects</h2>
      </div>
    </div>

    <div class="row">
      <div class="offset-lg-3 col-lg-6 offset-md-3 col-md-6">
        <p class="text-center">This needs to be editable in the theme customizer under 'Locations Section'.</p>
      </div>
    </div>
    
    <?php require_once( get_template_directory() . '/ywig-frontpage-sections/locations.php'); ?>

  </section>