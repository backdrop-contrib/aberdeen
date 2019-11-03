<?php
/**
 * @file
 * Node template.
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print implode(' ', $classes); ?>"<?php print backdrop_attributes($attributes); ?>>
  <?php print render($title_prefix); ?>
  <?php if (!$page && !empty($title)): ?>
    <h2 class="title"<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <footer>
      <?php print $user_picture; ?>
      <span class="submitted"><?php print $submitted; ?></span>
    </footer>
  <?php endif; ?>

  <div class="content"<?php print backdrop_attributes($content_attributes); ?>>
    <?php print render($content); ?>
  </div><!-- #content -->

  <div class="links">
    <?php print $links; ?>
  </div>

  <?php if ($comments): ?>
    <section id="comments" class="comments">
      <?php if ($comments['comments']): ?>
        <?php if ($node->type != 'forum'): ?>
          <h2 class="title"><?php print t('Comments'); ?></h2>
        <?php endif; ?>
        <?php print render($comments['comments']); ?>
      <?php endif; ?>

      <?php if ($comments['comment_form']): ?>
        <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
        <?php print render($comments['comment_form']); ?>
      <?php endif; ?>
    </section>
  <?php endif; ?>

</article>
