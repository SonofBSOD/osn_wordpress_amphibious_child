<?php
$post_taxonomies = get_the_terms(get_the_ID(), RETREAT_TYPE_TAXONOMY);
$get_taxonomy_name = function ($taxonomy) {
    return $taxonomy->name;
};

$post_taxonomy_to_text = $post_taxonomies ? implode(", ", array_map($get_taxonomy_name, $post_taxonomies)) : '';
$post_taxonomy_text = empty($post_taxonomy_to_text) ? "" : "(${post_taxonomy_to_text})";

the_title( sprintf( '<h2 class="entry-title"><a href="%1$s" rel="bookmark"></a>', esc_url(get_permalink())), sprintf('<span> %1$s</span></h2>', $post_taxonomy_text));

?>