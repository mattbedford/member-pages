<?php

//Adding both Vue and conventional scripts when on members page
function member_home_page_setup( $template ) {

    if ( is_page( 'member-home' )) {
        load_vue_core();
        
        $plugindir = dirname( __FILE__ );
       
        $template = $plugindir . '/templates/member_home_template.php';
        //Vue scripts
        wp_register_script( // the app build script generated by Webpack.
            'vue-app',
            'http://localhost:8080/js/app.js',
            //$plugindir . '/dist/js/app.500297bd.js',
            array(),
            false,
            true
        ); 
        wp_register_script( // the app build script generated by Webpack.
            'vue-chunks',
            'http://localhost:8080/js/chunk-vendors.js',
            //$plugindir . '/dist/js/chunk-vendors.c5180c15.js',
            array(),
            false,
            true
        );
        //Other scripts
        wp_register_style('member_styles', $plugindir . '/assets/member-styles.js');
        wp_register_script( 'member-scripts', $plugindir . '/assets/member-scripts.js');

        //Enqueue everything
            //wp_enqueue_script('vue-app');
            //wp_enqueue_script('vue-chunks');
        wp_enqueue_script('member-scripts');
        wp_enqueue_style('member-styles');
    }
    return $template;
    
}
add_action( 'template_include', 'member_home_page_setup' );
