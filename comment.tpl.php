<?php // $Id$   ?>  
<div class="comment <?php print $classes; ?>">

<?php if ($new): ?>
  <span class="new"><?php print $new ?></span>
<?php endif; ?>

<?php print render($title_prefix); ?>
<h3 class="title"><?php print $title ?></h3>
<?php print render($title_suffix); ?>

<?php if ($picture) print $picture; ?>
    <div class="submitted">
      <?php
        print t('Submitted by !username on !datetime.',
        array('!username' => $author, '!datetime' => $created));
      ?>
    </div>
    <div class="content">
      <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['links']);
        print render($content);
      ?>
    </div>
    <div class="links"><?php print render($content['links']) ?></div>
</div>
