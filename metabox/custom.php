<?php

    /**
     * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
     */
    if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
        require_once dirname( __FILE__ ) . '/cmb2/init.php';
    } elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
        require_once dirname( __FILE__ ) . '/CMB2/init.php';
    }
    
    // textdomain
    load_theme_textdomain( 'simple-pricing-tables-textdomain', get_template_directory_uri() . '/languages' );

    function simple_pricint_tables_options_func() {
        
        // prefix
        $prefix = '_simple_';

        $cmb_demo = new_cmb2_box( array(

            'id'            => $prefix . 'pricing-table-metabox',
            'title'         => esc_html__( 'Simple Pricing Options', 'simple-pricing-tables-textdomain' ),
            'object_types'  => array( 'simple-pricing-table' ), // Post type

        ) );

        $cmb_demo->add_field( array(

            'name'       => esc_html__( 'Title', 'cmb2' ),
            'desc'       => esc_html__( 'Add a subtitle below pricing title', 'simple-pricing-tables-textdomain' ),
            'id'         => $prefix . 'pricing_tables_field_title',
            'type'       => 'text',

        ) );

        $cmb_demo->add_field( array(

            'name'       => esc_html__( 'Subtitle', 'cmb2' ),
            'desc'       => esc_html__( 'Add a subtitle below pricing title', 'simple-pricing-tables-textdomain' ),
            'id'         => $prefix . 'pricing_tables_field_subtitle',
            'type'       => 'text',

        ) );

        $cmb_demo->add_field( array(

            'name'       => esc_html__( 'Fields', 'cmb2' ),
            'desc'       => esc_html__( 'Add your pricing fields using list style below', 'simple-pricing-tables-textdomain' ),
            'id'         => $prefix . 'pricing_tables_field_fields',
            'type'       => 'wysiwyg',

        ) );

        $cmb_demo->add_field( array(

            'name'          => esc_html__( 'Price', 'cmb2' ),
            'desc'          => esc_html__( 'Add your pricing', 'simple-pricing-tables-textdomain' ),
            'id'            => $prefix . 'pricing_tables_field_price',
            'type'          => 'text_money',
            'before_field'  => '$',

        ) );

        $cmb_demo->add_field( array(

            'name'       => esc_html__( 'Duration', 'cmb2' ),
            'desc'       => esc_html__( 'Add your pricing fields using list style below', 'simple-pricing-tables-textdomain' ),
            'id'         => $prefix . 'pricing_tables_field_duration',
            'type'       => 'select',
            'default'    => 'Year',
            'options'    => [
                'Month'  => __( 'Month' ),
                'Year'   => __( 'Year' ),
            ],

        ) );

        $cmb_demo->add_field( array(

            'name'       => esc_html__( 'Button Text', 'cmb2' ),
            'desc'       => esc_html__( 'Add your pricing fields using list style below', 'simple-pricing-tables-textdomain' ),
            'id'         => $prefix . 'pricing_tables_field_button',
            'type'       => 'text',

        ) );

        $cmb_demo->add_field( array(

            'name'       => esc_html__( 'Button Link', 'cmb2' ),
            'desc'       => esc_html__( 'Add your pricing fields using list style below', 'simple-pricing-tables-textdomain' ),
            'id'         => $prefix . 'pricing_tables_field_button_link',
            'type'       => 'text_url',

        ) );

    }
    add_action( 'cmb2_admin_init', 'simple_pricint_tables_options_func' );
