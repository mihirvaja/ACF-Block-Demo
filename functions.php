<?php

//register acf blocks and disable gutenberg blocks together
$my_acf_blocks = array(
    'team-carousel',
);

// Register ACF Blocks
add_action('init', function() use ($my_acf_blocks) {
    foreach ($my_acf_blocks as $block) {
        register_block_type(__DIR__ . '/blocks/' . $block);
    }
});

//register block scripts to be called in block.json
function register_block_scripts() {
	wp_register_script( 'team-carousel', get_template_directory_uri() . '/blocks/team-carousel/team-carousel.js' );	
	wp_register_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js' );	
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js' );	
}

add_action('wp_enqueue_scripts', 'register_block_scripts');

//don't load assets if block isn't used
add_filter( 'should_load_separate_core_block_assets', '__return_true' );
