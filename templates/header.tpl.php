<?php
/**
 * @file
 * Display generic site information such as logo, site name, etc.
 *
 * Available variables:
 *
 * - $base_path: The base path of the Backdrop installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $front_page: The URL of the front page. Use this instead of $base_path, when
 *   linking to the front page. This includes the language domain or prefix.
 * - $site_name: The name of the site, empty when display has been disabled.
 * - $site_slogan: The site slogan, empty when display has been disabled.
 * - $menu: The menu for the header (if any), as an HTML string.
 */
?>
<?php if($is_front): /* Use h1 when the content title is empty */ ?>
  <h1 id="site-name" class="site-name">
    <a href="<?php print $front_page; ?>" title="<?php print strip_tags($site_name); ?>" rel="home">
      <?php if ($logo): ?>
        <img src="<?php print $logo; ?>" alt="<?php print strip_tags($site_name) . t(' Home'); ?>" id="logo" />
      <?php endif; ?>
      <span><?php print strip_tags($site_name); ?></span>
    </a>
  </h1>
<?php else: ?>
  <div id="site-name" class="site-name">
    <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>" rel="home">
      <?php if ($logo): ?>
        <img src="<?php print $logo; ?>" alt="<?php print strip_tags($site_name) . t(' Home'); ?>" id="logo" />
      <?php endif; ?>
      <strong><?php print strip_tags($site_name); ?></strong>
    </a>
  </div><!-- #site-name -->
<?php endif; ?>

<?php if ($menu): ?>
  <nav class="header-menu">
    <?php print $menu; ?>
  </nav>
<?php endif; ?>
