<?php // $Id$   ?>

    <p><a id="top"></a></p>
    <div id="wrapper-header">
      <div id="header"> 
        <h1 id="site-name"><a href="<?php print $base_path; ?>" title="<?php print $site_name; ?>">
					<?php if ($logo): ?>
						<img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" id="logo" />
					<?php endif; ?>
					<?php print $site_name; ?></a>
				</h1>
				<?php if ($site_slogan): ?>
					<h2 id='site-slogan'>
						<?php print $site_slogan; ?>
					</h2>
				<?php endif; ?> <!-- /logo-name-and-slogan -->
        <?php if ($main_menu): ?>
          <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => array('links', 'main-menu')))); ?>
        <?php endif; ?>
         
        <?php if($secondary_menu):?>  
          <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('links', 'secondary-menu')))); ?>
        <?php endif; ?>
					<!-- /main-and-secondary-menus -->
      </div><!-- /header -->
    </div><!-- /wrapper-header -->

    <div id="wrapper-main"> 
      <div id="main"> 
	    <?php if ($page['header']): ?>
				<div id="topbar">
					<?php print render($page['header']); ?>
				</div>
	    <?php endif; ?> 
		
        <div id="content">
          <div id="center">
          <a name="main-content" id="main-content"></a>
						<?php if ($breadcrumb): print $breadcrumb; endif; ?>
						<?php if ($page['highlight']): print '<div id="mission">'. print render($page['highlight']) .'</div>'; endif; ?>
						<?php if ($tabs): print '<div id="tabs-wrapper" class="clearfix">'; endif; ?>
						<?php print render($title_prefix); ?>
						<?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
						<?php if ($tabs): print render($tabs) .'</div>'; endif; ?>
						<?php if (isset($tabs2)): print $tabs2; endif; ?>
						<?php print render($page['help']); ?>
            <?php if ($action_links): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
						<?php if ($messages): print $messages; endif; ?>
						<?php print render($page['content']); ?>
						<?php print $feed_icons ?>
						<p><a href="#top" class="to-top"><?php print t('Back to top'); ?></a></p>
          </div><!-- /center -->
					
          <?php if ($page['sidebar_second']): ?>
						<div id="sidebar-second" class="sidebar">
							<?php print render($page['sidebar_second']); ?>
						</div><!-- /sidebar-second -->
          <?php endif; ?>
        </div><!-- /content -->
		
		<?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="sidebar">
				<?php print render($page['sidebar_first']); ?>
			</div><!-- /sidebar-first -->
		<?php endif; ?>
    </div><!-- /main -->

	  <div id="footer">
      <?php if ($page['footer']): ?>
        <?php print render($page['footer']); ?>
      <?php endif; ?>
				
	  </div>
    </div><!-- /wrapper-main -->
</html>