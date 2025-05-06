<?php
/**
 * The header for our theme
 *
 * @package Hagefiksern
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
  <header id="masthead" class="site-header">
    <div class="header-container">
      <div class="site-branding">
        <div class="site-title-container">
          <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
              <?php bloginfo('name'); ?>
            </a>
          </h1>
          <p class="site-description">
            <?php echo esc_html(get_bloginfo('description')); ?>
          </p>
        </div>
      </div>
      <nav id="site-navigation" class="main-navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
          <span class="menu-toggle-icon"></span>
          <?php esc_html_e('Menu', 'hagefiksern'); ?>
        </button>
        <div class="menu-container">
          <ul class="main-menu">
            <li><a href="#home">Hjem</a></li>
            <li><a href="#services">Tjenester</a></li>
            <li><a href="#contact">Kontakt oss</a></li>
            <li><a href="#about">Om oss</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
