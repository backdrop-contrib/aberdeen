<?php
/**
 * @file
 * PHP functions for Aberdeen Backdrop theme.
 */

/********** Alter Functions ***************************************************/


/********** Preprocess Functions **********************************************/

/**
 * Prepare variables for all page templates.
 * @see page.tpl.php
 */
function aberdeen_preprocess_page(&$variables) {
  $options = array(
    'group' => CSS_THEME,
    'browsers' => array('IE' => 'IE', '!IE' => FALSE),
    'preprocess' => FALSE,
  );
  // Uncomment to Add conditional stylesheets for IE.
  // You will need to manually create this file if you uncomment this function.
  // backdrop_add_css(path_to_theme() . '/ie.css', $options);

  // Add the not-front class to the body tag.
  if (!backdrop_is_front_page()) {
    $variables['classes'][] = 'not-front';
  }
}

/**
 * Prepare variables for the layout templates.
 * @see layout.tpl.php
 */
function aberdeen_preprocess_layout(&$variables) {
  // Add the slogan to all layout templates.
  $site_config = config('system.core');
  $variables['site_slogan'] = filter_xss_admin($site_config->getTranslated('site_slogan'));
}

/**
 * Prepare variables for the node templates.
 * @see node.tpl.php
 */
function aberdeen_preprocess_node(&$variables) {
  // Remove the "Add new comment" link on the teaser, or when the comment form
  // is displayed.
  if ($variables['teaser'] || !empty($variables['comments']['comment_form'])) {
    unset($variables['content']['links']['comment']['#links']['comment-add']);
  }

  // Render the links early for a cleaner template file.
  $variables['links'] = backdrop_render($variables['content']['links']);
}

/**
 * Prepare variables for the menu_tree theme function.
 * @see theme_menu_tree()
 */
function aberdeen_preprocess_menu_tree(&$variables) {
  $style_set = isset($variables['attributes']['data-menu-style']);
  if ($style_set && $variables['attributes']['data-menu-style'] == 'tree') {
    // Remove the menu-tree class from the menus.
    $key = array_search('menu-tree', $variables['attributes']['class']);
    if ($key !== FALSE) {
      unset($variables['attributes']['class'][$key]);
    }
  }
}

/********** Theme Functions ***************************************************/

/**
 * Implements theme_breadcrumb.
 */
function aberdeen_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $title = strip_tags(backdrop_get_title());

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">';
    $output .= implode(' &raquo; ', $breadcrumb) . ' &raquo; ' . $title;
    $output .= '</div>';
    return $output;
  }
}

/**
 * Implements theme_field__field_type().
 */
function aberdeen_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>';
    $output .= backdrop_render($item);
    $output .= '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output  = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">';
  $output .= $output;
  $output .= '</div>';

  return $output;
}
