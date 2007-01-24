<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
  <head>
    <title><?php print $head_title ?></title>
    <?php print $head ?>
    <?php print $styles ?>
    <?php print $scripts ?>
	<style type="text/css" media="print">@import "<?php print base_path() . path_to_theme() ?>/print.css";</style>
  </head>
  <body<?php print phptemplate_body_class($sidebar_left, $sidebar_right); ?>>
    <p><a id="top"></a></p>
    <div id="wrapper-header">
      <div id="header"> 
        <?php
		// Prepare header
		$site_fields = array();
		if ($site_name) {
		  $site_fields[] = check_plain($site_name);
		}
		$site_title = implode(' ', $site_fields);
		$site_fields[0] = $site_fields[0];
		$site_html = implode(' ', $site_fields);
		
		if ($logo || $site_title) {
		  print '<h1 class="site-name"><a href="'. check_url($base_path) .'" title="'. $site_title .'">';
		  if ($logo) {
		    print '<img src="'. check_url($logo) .'" alt="'. $site_title .'" id="logo" />';
		  }
		  print $site_html .'</a></h1>';
		}
		?>
        <?php if (isset($site_slogan)) : ?>
          <h2 class="slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
        <?php if (isset($primary_links)) : ?>
          <?php print theme('linksnew', $primary_links, array('class' => 'links primary-links')) ?>
        <?php endif; ?>
		<div id="header-block">
		  <?php print $header; ?>
		</div>
      </div><!-- /header -->
    </div><!-- /wrapper-header -->

    <div id="wrapper-main"> 
      <div id="main"> 
        <div id="content"> 
          <div id="center"> 
		    <?php if ($breadcrumb): print $breadcrumb; endif; ?>
			<?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
			
			<?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
			<?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
			<?php if ($tabs): print $tabs .'</div>'; endif; ?>
			
			<?php if (isset($tabs2)): print $tabs2; endif; ?>
			
			<?php if ($help): print $help; endif; ?>
			<?php if ($messages): print $messages; endif; ?>
			<?php print $content ?>
			<span class="clear"></span>
			<?php print $feed_icons ?>
			<p><a href="#top" class="to-top">Back to top</a></p>
          </div><!-- /center -->
          <?php if ($sidebar_right): ?>
          <div id="sidebar-right" class="sidebar">
            <?php if (!$sidebar_left && $search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
            <?php print $sidebar_right ?>
          </div><!-- /sidebar-right -->
          <?php endif; ?>
        </div><!-- /content -->
		
		<?php if ($sidebar_left): ?>
        <div id="sidebar-left" class="sidebar">
          <?php if ($search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
          <?php print $sidebar_left ?>
        </div><!-- /sidebar-left -->
        <?php endif; ?>
      </div><!-- /main -->

	  <div id="footer"> 
        <?php print $footer_message ?>
	  </div>
    </div><!-- /wrapper-main -->
	
  <?php print $closure ?>	
  </body>
</html>