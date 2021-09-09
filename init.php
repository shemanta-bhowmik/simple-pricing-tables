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

    defined( 'ABSPATH' ) or die( 'directory browing is disabled' );

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
      * Script and Style files
      */
      
      function script_n_styles_func() {

            wp_enqueue_style( 'custom-stylesheet', PLUGINS_URL( '/css/custom.css', __FILE__ ) );
            wp_enqueue_style( 'font-awesome-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );

      }
      add_action( 'wp_enqueue_scripts', 'script_n_styles_func' );

    /**
     * Register a custom post type called "simple-pricing-tables".
     */

     function simple_pricing_tables_func() {

        // textdomain
        load_theme_textdomain( 'simple-pricing-tables-textdomain', get_template_directory_uri() . '/languages' );

        // prefix
        $prefix = '_simple_';

        $labels = [

            'name'                  => _x( 'Pricing Tables', 'Post type general name', 'simple-pricing-tables-textdomain' ),
            'singular_name'         => _x( 'Pricing Table', 'Post type singular name', 'simple-pricing-tables-textdomain' ),
            'menu_name'             => _x( 'Pricing Tables', 'Admin Menu text', 'simple-pricing-tables-textdomain' ),
            'name_admin_bar'        => _x( 'Pricing Table', 'Add New on Toolbar', 'simple-pricing-tables-textdomain' ),
            'add_new'               => __( 'Add New Table', 'simple-pricing-tables-textdomain' ),
            'add_new_item'          => __( 'Add New Table', 'simple-pricing-tables-textdomain' ),
            'new_item'              => __( 'New Table', 'simple-pricing-tables-textdomain' ),
            'edit_item'             => __( 'Edit Table', 'simple-pricing-tables-textdomain' ),
            'view_item'             => __( 'View Table', 'simple-pricing-tables-textdomain' ),
            'all_items'             => __( 'All Pricing Tables', 'simple-pricing-tables-textdomain' ),
            'search_items'          => __( 'Search Tables', 'simple-pricing-tables-textdomain' ),
            'parent_item_colon'     => __( 'Parent Tables:', 'simple-pricing-tables-textdomain' ),
            'not_found'             => __( 'No pricing tables found.', 'simple-pricing-tables-textdomain' ),
            'not_found_in_trash'    => __( 'No pricing tables found in Trash.', 'simple-pricing-tables-textdomain' ),
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

    /**
     * Design Part
     * Adding Shortcode
     */

    function simple_pricing_tables_shortcode() {

        ob_start(); 
        
        // prefix
        $prefix = '_simple_';
        
        ?>

        <div class="all-simple-pricing-tables">
            <?php
            
                $simple_pricing_tables_query = new WP_Query( [
                    'post_type'         => 'simple-pricing-table',
                    'posts_per_page'    => '3',
                ] );

                while ( $simple_pricing_tables_query -> have_posts() ) : $simple_pricing_tables_query -> the_post();
            
            ?>
            <div class="simple-pricing-table">
                <div class="pricing-titles">
                    <h3 class="pricing-title"><?php echo get_post_meta( get_the_id(), '_simple_pricing_tables_field_title', true ); ?></h3>
                    <p><?php echo get_post_meta( get_the_id(), $prefix . 'pricing_tables_field_subtitle', true ); ?></p>
                </div>
                <div class="pricing-content">
                    <?php

                        // if ( !empty( get_post_meta( get_the_id(), $prefix . 'pricing_tables_field_fields', true ) ) )
                        //     echo '<i class="fas fa-check-square"></i>'; 
                        $value = get_post_meta( get_the_id(), $prefix . 'pricing_tables_field_fields', true );
                        echo $value;                    
                    ?>
                </div>
                <div class="pricing-duration">
                    <p>
                        $<span><?php echo get_post_meta( get_the_id(), $prefix . 'pricing_tables_field_price', true ); ?></span>
                        / <?php 
                            
                            $options = get_post_meta( get_the_id(), $prefix . 'pricing_tables_field_duration' ); 
                            foreach( $options as $option )
                                echo $option;
                            
                        ?>
                    </p>
                </div>
                <div class="pricing-button">
                    <a href="<?php echo get_post_meta( get_the_id(), $prefix . 'pricing_tables_field_button_link', true ); ?>"><?php echo get_post_meta( get_the_id(), $prefix . 'pricing_tables_field_button', true ); ?></a>
                </div>
            </div>

            <?php endwhile; ?>

        </div>

    <?php return ob_get_clean();

    }
    add_shortcode( 'simple-pricing-tables-sc', 'simple_pricing_tables_shortcode' );
