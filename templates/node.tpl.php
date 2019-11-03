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
    <?php
      // We hide the links now so that we can render them later.
      hide($content['links']);
      print render($content);
    ?>
  </div><!-- #content -->

  <?php
    // Remove the "Add new comment" link on the teaser page
    // or if the comment form is being displayed on the same page.
    if ($teaser || !empty($content['comments']['comment_form'])) {
      unset($content['links']['comment']['#links']['comment-add']);
    }
    // Only display the wrapper div if there are links.
    $links = render($content['links']);
    if ($links):
  ?>
    <div class="links">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php if ($comments): ?>
    <section class="comments" id="comments">
      <?php if ($comments['comments']): ?>
        <h2 class="title"><?php print t('Comments'); ?></h2>
        <?php print render($comments['comments']); ?>
      <?php endif; ?>

      <?php if ($comments['comment_form']): ?>
        <h2 class="title comment-form"><?php print t('Add comment'); ?></h2>
        <?php print render($comments['comment_form']); ?>
      <?php endif; ?>
    </section>
  <?php endif; ?>

</article>
