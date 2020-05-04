<?php
// display custom taxonomy dropdown in admin
function ct_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'class';
	$taxonomy  = 'course';
	if ($typenow == $post_type) {
		$selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __('All', 'christatimmer' ) . ' ' . $info_taxonomy->label,
			'taxonomy' => $taxonomy,
			'name' => $taxonomy,
			'orderby' => 'name',
			'selected' => $selected,
			'show_count' => true,
			'hide_empty' => true,
		));
	};
}
add_action('restrict_manage_posts', 'ct_filter_post_type_by_taxonomy');

// filter posts by taxonomy in admin
function ct_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'class'; // change to your post type
	$taxonomy  = 'course'; // change to your taxonomy
	$q_vars = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}
add_filter('parse_query', 'ct_convert_id_to_term_in_query');