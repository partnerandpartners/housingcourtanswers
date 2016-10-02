<?php

define( 'HC_AUTOCOMPLETE_TRANSIENT', 'housing_court_autocomplete' );


// WHILE WE'RE STILL DEVELOPING
// delete_transient( HC_AUTOCOMPLETE_TRANSIENT );

function housing_court_get_initial_autocomplete_suggestions() {
	// SST 'Suggested Search Terms'

	$sst_tags = get_field( 'sst_tags', 'option' );
	$sst_categories = get_field( 'sst_categories', 'option' );
	$sst_for_tenants = get_field( 'sst_for_tenants', 'option' );
	$sst_for_landlords = get_field( 'sst_for_landlords', 'option' );

	// TAGS
	$tags_response = array();
	foreach( $sst_tags as $tag_array ) {
		$tag_id = $tag_array['tag'];
		$tag = get_term( $tag_id, 'post_tag' );

		$tags_response[] = array(
			'name' => $tag->name,
			'count' => $tag->count,
			'permalink' => get_term_link( $tag_id, 'post_tag' )
		);
	}

	// Categories
	$categories_response = array();
	foreach( $sst_categories as $category_array ) {
		$category_id = $category_array['category'];
		$category = get_term( $category_id, 'category' );

		$categories_response[] = array(
			'name' => $category->name,
			'count' => $category->count,
			'permalink' => get_term_link( $category_id, 'category' )
		);
	}

	// For Tenants
	$for_tenants_response = array();
	foreach( $sst_for_tenants as $post_array ) {
		$post = $post_array['post'];

		$post_tags = wp_get_post_tags( $post->ID );
		$response_post_tags = array();
		foreach( $post_tags as $tag ) {
			$response_post_tags[] = $tag->name;
		}

		$post_response['tags'] = $response_post_tags;

		$for_tenants_response[] = array(
			'title' => $post->post_title,
			'content' => wp_strip_all_tags( $post->post_content ),
			'permalink' => get_permalink( $post->ID ),
			'tags' => $response_post_tags
		);
	}

	// For Landlords

	$for_landlords_response = array();
	foreach( $sst_for_landlords as $post_array ) {
		$post = $post_array['post'];

		$post_tags = wp_get_post_tags( $post->ID );
		$response_post_tags = array();
		foreach( $post_tags as $tag ) {
			$response_post_tags[] = $tag->name;
		}

		$post_response['tags'] = $response_post_tags;

		$for_landlords_response[] = array(
			'title' => $post->post_title,
			'content' => wp_strip_all_tags( $post->post_content ),
			'permalink' => get_permalink( $post->ID ),
			'tags' => $response_post_tags
		);
	}

	return array(
		'tags' => $tags_response,
		'categories' => $categories_response,
		'for_tenants' => $for_tenants_response,
		'for_landlords' => $for_landlords_response
	);
}


function housing_court_get_autocomplete_tenant_posts_response() {
	$for_tenants_id = get_cat_ID( 'For Tenants' );

	$response = array();

	if( $for_tenants_id !== 0 ) {

		$the_query = new WP_Query( array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'cat' => $for_tenants_id
		) );
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$response_array = array(
					'title' => get_the_title(),
					'content' => wp_strip_all_tags( get_the_content() ),
					'permalink' => get_permalink()
				);

				$post_tags = wp_get_post_tags( get_the_ID() );
				$response_post_tags = array();
				foreach( $post_tags as $tag ) {
					$response_post_tags[] = $tag->name;
				}

				$response_array['tags'] = $response_post_tags;

				$response[] = $response_array;
			}
		}
		wp_reset_postdata();

	}

	return $response;
}

function housing_court_get_autocomplete_landlord_posts_response() {
	$for_landlords_id = get_cat_ID( 'For Landlords' );

	$response = array();

	if( $for_landlords_id !== 0 ) {

		$the_query = new WP_Query( array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'cat' => $for_landlords_id
		) );
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$response_array = array(
					'title' => get_the_title(),
					'content' => wp_strip_all_tags( get_the_content() ),
					'permalink' => get_permalink()
				);

				$post_tags = wp_get_post_tags( get_the_ID() );
				$response_post_tags = array();
				foreach( $post_tags as $tag ) {
					$response_post_tags[] = $tag->name;
				}

				$response_array['tags'] = $response_post_tags;

				$response[] = $response_array;
			}
		}
		wp_reset_postdata();

	}

	return $response;
}


function housing_court_get_autocomplete_tags_response() {
	// $response = array();

	$tags = get_terms(array(
		'taxonomy' => 'post_tag',
		'order_by' => 'name',
	));
	if( !empty( $tags ) && !is_wp_error( $tags ) ) {
		foreach( $tags as $tag ) {
			$response[] = array(
				'name' => $tag->name,
				'permalink' => get_term_link( $tag->term_id, 'post_tag' ),
				'count' => $tag->count
			);
		}
	}

	return $response;
}


function housing_court_get_autocomplete_categories_response() {
	$response = array();

	$categories = get_terms(array(
		'taxonomy' => 'category',
		'order_by' => 'name',
	));
	if( !empty( $categories ) && !is_wp_error( $categories ) ) {
		foreach( $categories as $category ) {
			$response[] = array(
				'name' => $category->name,
				'permalink' => get_term_link( $category->term_id, 'category' ),
				'count' => $category->count
			);
		}
	}

	return $response;
}


function housing_court_autocomplete_endpoint() {
	$json_response = get_transient( HC_AUTOCOMPLETE_TRANSIENT );

	if( false === $json_response ) {
		$json_response = array();

		$json_response = array(
			'suggestions' => housing_court_get_initial_autocomplete_suggestions(),
			'tags' => housing_court_get_autocomplete_tags_response(),
			'categories' => housing_court_get_autocomplete_categories_response(),
			'for_tenants' => housing_court_get_autocomplete_tenant_posts_response(),
			'for_landlords' => housing_court_get_autocomplete_landlord_posts_response()
		);

		set_transient( HC_AUTOCOMPLETE_TRANSIENT, $json_response, WEEK_IN_SECONDS );
	}

	return $json_response;
}


function housing_court_register_endpoints() {
	register_rest_route( 'housing-court/v1', '/autocomplete', array(
		'methods' => 'GET',
		'callback' => 'housing_court_autocomplete_endpoint',
	) );
}
add_action( 'rest_api_init', 'housing_court_register_endpoints' );


// Any time either a post, category, or tag is created, updated, or deleted,
// we delete the old transient value that contains all of our posts, tags, &
// categories so that the autocomplete rest api endpoint has to be
// re-generated.
function housing_court_delete_autocomplete_transient() {
	delete_transient( HC_AUTOCOMPLETE_TRANSIENT );
}
add_action( 'edit_term', 'housing_court_delete_autocomplete_transient' );
add_action( 'delete_term', 'housing_court_delete_autocomplete_transient' );
add_action( 'deleted_post', 'housing_court_delete_autocomplete_transient' );
add_action( 'edit_post', 'housing_court_delete_autocomplete_transient' );
add_action( 'publish_post', 'housing_court_delete_autocomplete_transient' );
add_action( 'save_post', 'housing_court_delete_autocomplete_transient' );
add_action( 'acf/save_post', 'housing_court_delete_autocomplete_transient' );


function housing_court_add_inline_autocomplete_json() {
	$base_url_array = array(
		'base_url' => home_url('/')
	);
	wp_localize_script( 'site', 'autocomplete_base_url', $base_url_array );
}
add_action( 'wp_enqueue_scripts', 'housing_court_add_inline_autocomplete_json', 20 );