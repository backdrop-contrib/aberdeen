<?php // $Id$   ?>  
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes ?>"> 
  <?php if ($page == 0): ?>
    <h2 class="title">
      <a href="<?php print $node_url ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>

  <?php if ($user_picture): ?>
    <?php print $user_picture; ?>
  <?php endif; ?>  
  
  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print t('Posted ') . format_date($node->created, 'custom', "F jS, Y") . t(' by ') . theme('username', $node); ?></span> 
  <?php endif; ?>

  <?php if (!empty($content['links']['terms'])): ?>
    <div class="taxonomy"><?php print t(' in ') . print render($content['links']['terms']);  ?></div>
  <?php endif; ?>
  
  <div class="content">
    <?php
      // Hide comments and links and render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  
  <?php if ($content['links']): ?>
    <div class="links">
      <?php print render($content['links']); ?>
    </div>
  <?php endif; ?>
  
  <?php print render($content['comments']); ?>
</div>
