<?php

function amphibious_child_script_setup() {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}

add_action('wp_enqueue_scripts', 'amphibious_child_script_setup');

?>