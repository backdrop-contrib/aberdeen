<?php
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module ?>">  
  <div class="blockinner">
    <?php print render($title_prefix); ?>
    <?php if (!empty($block->subject)): ?>
      <h2 class="title"<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
    <?php endif;?>
    <?php print render($title_suffix); ?>
    <div class="content">
      <?php print render($content);?>
    </div>    
  </div>
</div>

