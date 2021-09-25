<?php

class GalleryBlocks {
  function __construct(){
    add_action('init', array($this, 'onLoad'));
  }

  function onLoad() {

    wp_enqueue_script( 'my-super-unique-handle', get_stylesheet_directory_uri() . '/block-templates/dist/custom-blocks.js', array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components', 'wp-api'), true );

  }
}

$galleryBlocks = new GalleryBlocks();