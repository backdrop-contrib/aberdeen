<?php
/**
 * @file
 * Template for the Harris layout.
 *
 * Variables:
 * - $title: The page title, for use in the actual HTML content.
 * - $messages: Status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node.)
 * - $action_links: Array of actions local to the page, such as 'Add menu' on
 *   the menu administration interface.
 * - $classes: Array of CSS classes to be added to the layout wrapper.
 * - $attributes: Array of additional HTML attributes to be added to the layout
 *     wrapper. Flatten using backdrop_attributes().
 * - $content: An array of content, each item in the array is keyed to one
 *   region of the layout. This layout supports the following sections:
 *   - $content['header']
 *   - $content['top']
 *   - $content['content']
 *   - $content['sidebar']
 *   - $content['sidebar2']
 *   - $content['bottom']
 *   - $content['footer']
 */
?>
<div class="layout--harris <?php print implode(' ', $classes); ?>"<?php print backdrop_attributes($attributes); ?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <a id="top"></a>

  <?php if ($content['header']): ?>
    <header id="wrapper-header" class="l-header" role="banner" aria-label="<?php print t('Site header'); ?>">
      <div id="header" class="l-header-inner container container-fluid">
        <?php print $content['header']; ?>
      </div>
    </header>
  <?php endif; ?>

  <div id="wrapper-main" class="l-wrapper">
    <div id="main" class="l-wrapper-inner container container-fluid">

      <div class="l-middle row">
        <main id="content" class="l-content col-md-6 col-md-push-3" role="main" aria-label="<?php print t('Main content'); ?>">
          <?php if (!empty($content['top'])): ?>
            <div class="l-top">
              <?php print $content['top']; ?>
            </div>
          <?php endif; ?>

          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear">'; endif; ?>

          <div class="l-page-title">
            <a id="main-content"></a>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
              <h1 class="page-title<?php if ($tabs): print ' with-tabs'; endif; ?>">
                <?php print $title; ?>
              </h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
          </div>

          <?php if ($tabs): ?>
            <nav class="tabs" role="tablist" aria-label="<?php print t('Admin content navigation tabs.'); ?>">
              <?php print $tabs; ?>
            </nav>
          <?php endif; ?>

          <?php if ($tabs): print '</div>'; endif; ?>

          <?php print $action_links; ?>

          <?php if ($messages): ?>
            <div class="l-messages" role="status" aria-label="<?php print t('Status messages'); ?>">
              <?php print $messages; ?>
            </div>
          <?php endif; ?>

          <?php print $content['content']; ?>
          </div>
        </main>
        <div id="sidebar-first" class="l-sidebar l-sidebar-first col-md-3 col-md-pull-6">
          <?php print $content['sidebar']; ?>
        </div>
        <div id="sidebar-second" class="l-sidebar l-sidebar-second col-md-3">
          <?php print $content['sidebar2']; ?>
        </div>
      </div><!-- /.l-middle -->

      <?php if (!empty($content['bottom'])): ?>
        <div class="l-bottom">
          <?php print $content['bottom']; ?>
        </div>
      <?php endif; ?>

    </div><!-- /.l-wrapper-inner -->

    <?php if ($content['footer']): ?>
      <footer id="footer" class="l-footer"  role="footer">
        <div class="l-footer-inner container container-fluid">
          <p><a href="#top" class="to-top"><?php print t('Back to top'); ?></a></p>
          <?php print $content['footer']; ?>
        </div>
      </footer>
    <?php endif; ?>

  </div><!-- /.l-wrapper -->
</div><!-- /.layout--harris -->
