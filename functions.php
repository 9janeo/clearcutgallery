<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
    function theme_enqueue_styles() {
    
        // Get the theme data
        $the_theme = wp_get_theme();
        wp_enqueue_style( 'cc-gallery-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
        // wp_enqueue_script( 'jquery');
        wp_enqueue_script( 'cc-gallery-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), false );
        // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        //     wp_enqueue_script( 'comment-reply' );
        // }
    }

    include 'block-templates/gallery-blocks.php';

    // Loads the custom gallery-bloks.js script as a module
    function add_type_attribute($tag, $handle, $src) {
        // if not your script, do nothing and return original $tag
        if ( 'my-super-unique-handle' !== $handle ) {
            return $tag;
        }
        // change the script tag by adding type="module" and return it.
        $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
        return $tag;
    }
    add_filter( 'script_loader_tag', 'add_type_attribute', 10, 3 );

    if(is_user_logged_in()){
        show_admin_bar( true );
    }

    add_action( 'understrap_site_info', 'understrap_add_site_info' );
    // if ( ! function_exists( 'understrap_add_site_info' ) ) {
        /**
         * Add site info content.
         */
        function understrap_add_site_info() {
            $the_theme = wp_get_theme();

            $site_info = sprintf(
                // '© THE BEN ENWONWU FOUNDATION 2021. ALL RIGHTS RESERVED.'
                '%2$s',
                // '<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
                esc_url( __( 'https://wordpress.org/', 'understrap' ) ),
                sprintf(
                    /* translators: WordPress */
                    esc_html__( '© THE BEN ENWONWU FOUNDATION 2021', 'understrap' ),
                    // 'WordPress'
                ),
                sprintf( // WPCS: XSS ok.
                    /* translators: 1: Theme name, 2: Theme author */
                    esc_html__( 'Theme: %1$s by %2$s.', 'understrap' ),
                    $the_theme->get( 'Name' ),
                    '<a href="' . esc_url( __( 'https://understrap.com', 'understrap' ) ) . '">understrap.com</a>'
                ),
                sprintf( // WPCS: XSS ok.
                    /* translators: Theme version */
                    esc_html__( 'Version: %1$s', 'understrap' ),
                    $the_theme->get( 'Version' )
                )
            );

            echo apply_filters( 'understrap_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    // }
