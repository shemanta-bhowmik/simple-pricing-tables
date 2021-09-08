<?php

    /**
     * Plugin Name: Simple Pricing Tables
     * Plugin URI: https://shemantabhowmik.com
     * Description: This is a dynamic pricing table. This very simple and easy to use pricing table. Anyone can use this.
     * Version: 1.0
     * Requires at least: 4.0
     * Requires PHP: 5.0
     * Author: Shemanta Bhowmik
     * Author URI: http://shemantabhowmik.com
     * Domain Path: /languages
     */

    /**
     * Require Files
     * -- metabox files
     */
     if ( file_exists( dirname( __FILE__ ) . '/metabox/init.php' ) ) {
         require_once( dirname( __FILE__ ) . '/metabox/init.php' );
     }
     if ( file_exists( dirname( __FILE__ ) . '/metabox/custom.php' ) ) {
        require_once( dirname( __FILE__ ) . '/metabox/custom.php' );
     }

    /**
     * Register a custom post type called "simple-pricing-tables".
     */

     function simple_pricing_tables_func() {

        // textdomain
        load_theme_textdomain( 'simple-pricing-tables', get_template_directory_uri() . '/languages' );

        // prefix
        $prefix = '_simple_';

        $labels = [

            'name'                  => _x( 'Pricing Tables', 'Post type general name', 'simple-pricing-tables' ),
            'singular_name'         => _x( 'Pricing Table', 'Post type singular name', 'simple-pricing-tables' ),
            'menu_name'             => _x( 'Pricing Tables', 'Admin Menu text', 'simple-pricing-tables' ),
            'name_admin_bar'        => _x( 'Pricing Table', 'Add New on Toolbar', 'simple-pricing-tables' ),
            'add_new'               => __( 'Add New Table', 'simple-pricing-tables' ),
            'add_new_item'          => __( 'Add New Table', 'simple-pricing-tables' ),
            'new_item'              => __( 'New Table', 'simple-pricing-tables' ),
            'edit_item'             => __( 'Edit Table', 'simple-pricing-tables' ),
            'view_item'             => __( 'View Table', 'simple-pricing-tables' ),
            'all_items'             => __( 'All Pricing Tables', 'simple-pricing-tables' ),
            'search_items'          => __( 'Search Tables', 'simple-pricing-tables' ),
            'parent_item_colon'     => __( 'Parent Tables:', 'simple-pricing-tables' ),
            'not_found'             => __( 'No pricing tables found.', 'simple-pricing-tables' ),
            'not_found_in_trash'    => __( 'No pricing tables found in Trash.', 'simple-pricing-tables' ),
            'archives'              => _x( 'Pricing Table archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'simple-pricing-tables' ),
            'insert_into_item'      => _x( 'Insert into tables', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'simple-pricing-tables' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this table', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'simple-pricing-tables' ),
            'filter_items_list'     => _x( 'Filter pricing tables list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'simple-pricing-tables' ),
            'items_list_navigation' => _x( 'Pricing tables list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'simple-pricing-tables' ),
            'items_list'            => _x( 'Pricing tables list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'simple-pricing-tables' ),
        
        ];
    
        $args = [

            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => [ 'slug' => 'pricing-tables' ],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => [ 'title' ],
            'menu_icon'             => 'dashicons-text-page',
        
        ];
    
        register_post_type( "simple-pricing-table", $args );
    }
    
    add_action( 'init', 'simple_pricing_tables_func' );