<?php
// $Id$ 

/**
 *
 * The theme settings
 * 
 */

  $form['breadcrumb'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Breadcrumb settings'),
  );
  $form['breadcrumb']['aberdeen_breadcrumb'] = array(
    '#type'          => 'select',
    '#title'         => t('Display breadcrumb'),
    '#default_value' => $settings['aberdeen_breadcrumb'],
    '#options'       => array(
                          'yes'   => t('Yes'),
                          'admin' => t('Only in admin section'),
                          'no'    => t('No'),
                        ),
  );
  $form['breadcrumb']['aberdeen_breadcrumb_separator'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Breadcrumb separator'),
    '#description'   => t('Text and spaces'),
    '#default_value' => $settings['aberdeen_breadcrumb_separator'],
    '#size'          => 5,
    '#maxlength'     => 10,
  );
  $form['breadcrumb']['aberdeen_breadcrumb_trailing'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append a separator to the end of the breadcrumb'),
    '#default_value' => $settings['aberdeen_breadcrumb_trailing'],
  );
  $form['breadcrumb']['aberdeen_breadcrumb_title'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append the content title to the end of the breadcrumb'),
    '#default_value' => $settings['aberdeen_breadcrumb_title'],
  );