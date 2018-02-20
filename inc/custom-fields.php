<?php
/**
 * Misfist custom fields functions
 *
 * @package Understrap
 * @subpackage Misfist\Inc
 * @since 1.0.0
 */

if( function_exists( 'acf_add_local_field_group' ) ) {

  acf_add_local_field_group( array(
    'key' => 'group_projects',
    'title' => __( 'Project Details', 'misfist' ),
    'fields' => array(
      array(
        'key' => 'field_link',
        'label' => __( 'External Link', 'misfist' ),
        'name' => 'link',
        'type' => 'url',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => __( 'https://example.com', 'misfist' ),
      ),
    ),
    'location' => array(
    array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'post',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));

}
