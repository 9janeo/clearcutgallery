<?php

function loadMyBlockFiles() {
  wp_enqueue_script(
    'my-super-unique-handle',
    get_stylesheet_directory_uri() . '/block-templates/my-block.js',
    array('wp-blocks', 'wp-i18n', 'wp-editor'),
    true
  );
}

add_action('enqueue_block_editor_assets', 'loadMyBlockFiles');