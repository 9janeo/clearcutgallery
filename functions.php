<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    
    // function understrap_remove_scripts() {
    //     wp_dequeue_style( 'understrap-styles' );
    //     wp_deregister_style( 'understrap-styles' );
    
    //     wp_dequeue_script( 'understrap-scripts' );
    //     wp_deregister_script( 'understrap-scripts' );
    //     // Removes the parent themes stylesheet and scripts from inc/enqueue.php
    // }
    // add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

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

    // show_admin_bar( true );

    register_sidebar(
        array(
            'name'          => __( 'Fullscreen', 'understrap' ),
            'id'            => 'fullscreenhero',
            'description'   => __( 'Full screen widget with dynamic grid', 'understrap' ),
            'before_widget' => '<div id="%1$s" class="fullscreen-slide carousel-item %2$s">',
            'after_widget'  => '</div><!-- .fullscreen-hero-widget -->',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

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
