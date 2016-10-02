<?php

// Rest api stuff for autocomplete
require_once( 'external/housing-court-rest-api.php' );

function housing_enqueue() {
	wp_enqueue_style( 'housingyo', get_stylesheet_directory_uri() . '/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'housing_enqueue' );


require_once( 'external/starkers-utilities.php' );

add_theme_support('post-thumbnails');
add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer', 10 );
add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

function starkers_script_enqueuer() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array(), '', true );
	wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery') );
	wp_register_script( 'compiled', get_template_directory_uri().'/js/compiled.js', array('jquery', 'bootstrap'), '', true );
	// 

	// wp_register_script(
	// 	'autocomplete-setup',
	// 	get_template_directory_uri() . '/js/autocomplete-setup.js',
	// 	array( 'compiled' ),
	// 	'',
	// 	true
	// );

	// wp_enqueue_script( 'autocomplete-setup' );

  wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'compiled' ), '', true );
	wp_enqueue_script( 'site' );

	wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
			wp_enqueue_style( 'screen' );
}

function hca_print_tag_list() {
	$tags = get_terms('post_tag',array());

	foreach( $tags as $tag ) {
		$term_link = esc_url( get_term_link( $tag ) );
		echo '<li>'.$tag->name.'</li>';
	}
 
}

	/**
	* 
	* Register the navigation menus for the site.
	* 
	*/
	function housingcourtanswers_register_nav_menus() {
		register_nav_menu( 'main', 'Main Menu' );
		register_nav_menu( 'footer', 'Footer Menu' );
	}
	add_action( 'after_setup_theme', 'housingcourtanswers_register_nav_menus' );	
	
	
	/**
	 * 
	 * Adds 'Read More' button to the excerpt.
	 * 
	 */
	function new_excerpt_more( $more ) {
		global $post;
		$text = 'Read More';
		return '...<br/><a class="btn read-more-button" role="button" href="'. get_permalink( get_the_ID() ) . '">'.$text.' &rarr;</a>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );
	
	
	function custom_excerpt_length( $length ) {
		return 32;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	
	
	function hca_custom_post_types() {
	
		// Events
		$event_labels = array(
			'name' => 'Events',
			'singular_name' => 'Event',
			'add_new_item' => 'Add New Event',
			'edit_item' => 'Edit Event',
			'new_item' => 'New Event',
			'view_item' => 'View Event',
			'search_items' => 'Search Events',
			'not_found' => 'No Events Found',
			'not_found_in_trash' => 'No Events Found In Trash'
		);
		$event_args = array(
			'public' => true,
			'label' => 'Events',
			'labels' => $event_labels,
			'menu_icon' => 'dashicons-calendar-alt',
			'exclude_from_search' => false,
			'taxonomies' => array('category', 'post_tag'),
			'supports' => array('title','editor','comments','excerpt','revisions')
		);
		register_post_type( 'event', $event_args );
	
	
		// News
		$news_labels = array(
			'name' => 'News',
			'singular_name' => 'News Post',
			'add_new_item' => 'Add New Post',
			'edit_item' => 'Edit Post',
			'new_item' => 'New Post',
			'view_item' => 'View Post',
			'search_items' => 'Search News',
			'not_found' => 'No News Found',
			'not_found_in_trash' => 'No News Found In Trash'
		);
		$news_args = array(
			'public' => true,
			'label' => 'News',
			'menu_icon' => 'dashicons-media-text',
			'exclude_from_search' => false,
			'labels' => $news_labels,
			'taxonomies' => array('category', 'post_tag'),
			'supports' => array('title','editor','comments','excerpt','revisions')
		);
		register_post_type( 'news', $news_args );
		
		// Resources & Links
		$resource_labels = array(
			'name' => 'Resources & Links',
			'singular_name' => 'Link Post',
			'add_new_item' => 'Add New Link Post',
			'edit_item' => 'Edit Link Post',
			'new_item' => 'New Link Post',
			'view_item' => 'View Link Post',
			'search_items' => 'Search Links',
			'not_found' => 'No Links Found',
			'not_found_in_trash' => 'No Links Found In Trash'
		);
		$resource_args = array(
			'public' => true,
			'label' => 'Links',
			'menu_icon' => 'dashicons-admin-links',
			'exclude_from_search' => false,
			'labels' => $resource_labels,
			'supports' => array('title','editor','comments','excerpt','revisions')
		);
		register_post_type( 'resource', $resource_args );
		
	}
	
	add_action( 'init', 'hca_custom_post_types' );
	
	
	
	/**
	 * Upcoming events query
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	
function hca_get_upcoming_events_query() {
	$current_timestamp = current_time('timestamp');

	$args = array(
		'post_type' => array('event'),
		'posts_per_page' => -1,
		'meta_key' => 'end_date',
		'meta_compare' => '>=',
		'meta_value' => $current_timestamp,
		'orderby' => 'meta_value_num',
		'order' => 'ASC'
	);

	$upcoming_events_query = new WP_Query( $args );

	return $upcoming_events_query;
}

function hca_get_upcoming_events_home_query() {
	$current_timestamp = current_time('timestamp');

	$args = array(
		'post_type' => array('event'),
		'posts_per_page' => 3,
		'meta_key' => 'end_date',
		'meta_compare' => '>=',
		'meta_value' => $current_timestamp,
		'orderby' => 'meta_value_num',
		'order' => 'DESC'
	);

	$upcoming_events_query = new WP_Query( $args );

	return $upcoming_events_query;
}
		
function hca_get_past_events_query() {
	$current_timestamp = current_time('timestamp');

	$args = array(
		'post_type' => array('event'),
		'posts_per_page' => -1,
		'meta_key' => 'end_date',
		'meta_compare' => '<',
		'meta_value' => $current_timestamp,
		'orderby' => 'meta_value_num',
		'order' => 'DESC'
	);

	$past_events_query = new WP_Query( $args );

	return $past_events_query;
}
		
		function hca_get_news_query() {
	$current_timestamp = time();

	$args = array(
		'post_type' => array('news'),
		'posts_per_page' => -1,
		'order' => 'DESC'
	);

	$news_query = new WP_Query( $args );

	return $news_query;
		}
		
		function hca_get_recent_news_query() {
	$current_timestamp = time();

	$args = array(
		'post_type' => array('news'),
		'posts_per_page' => 3,
		'order' => 'DESC'
	);

	$recent_news_query = new WP_Query( $args );

	return $recent_news_query;
		}
		
		function hca_get_resources_query() {

	$args = array(
		'post_type' => array('resource'),
		'posts_per_page' => -1,
		'order' => 'ASC'
	);

	$resource_query = new WP_Query( $args );

	return $resource_query;
		}

/**
 * Custom callback for outputting comments 
 *
 * @return void
 * @author Keir Whitaker
 */
	
	function hca_search_more_posts_button( $args, $search_query ) {
	$default_args = array(
		'see_all_text' => 'See all posts',
		'no_items_found' => 'No posts found',
		'found_posts' => 0,
		'num_posts_to_display' => 4,
		'post_type' => 'post'
	);

	$current_uri = get_search_link( $search_query );

	$args = wp_parse_args( $args, $default_args );

	if( $args['found_posts'] === 0 ) {
		echo '<div class="row"><div class="col-md-12 text-center"><p>'.$args['no_items_found'].'</p></div></div>';
	}
	elseif( $args['num_posts_to_display'] !== -1 && $args['found_posts'] > $args['num_posts_to_display'] ) {
		$url = remove_query_arg( 'js-post-type', $current_uri );
		$url = esc_url( add_query_arg( 'js-post-type', $args['post_type'], $url ) );

		echo '<div class="row"><div class="col-md-12 text-center see-more"><a href="' . $url . '" class="btn btn-large btn-primary text-uppercase">';
		echo $args['see_all_text'];
		echo '</a></div></div>';
	}
}



/**
 * Custom callback for outputting comments 
 *
 * @return void
 * @author Keir Whitaker
 */
function starkers_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; 
	?>
	<?php if ( $comment->comment_approved == '1' ): ?>	
	<li>
		<article id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar( $comment ); ?>
			<h4><?php comment_author_link() ?></h4>
			<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
			<?php comment_text() ?>
		</article>
	<?php endif;
}


function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );


// Add an options page for site-wide setting via ACF
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme Settings');
}


function housing_court_print_categories( $parent = 0 ) {
	$categories = get_terms(array(
		'taxonomy' => 'category',
		'parent' => $parent
	));

	echo '<ul>';

	foreach( $categories as $category ) {
		$posts_in_category = new WP_Query(array(
			'posts_per_page' => -1,
			'cat' => $category->term_id
		));

		$num_posts_in_category = $posts_in_category->found_posts;

		wp_reset_postdata();

		switch($num_posts_in_category) {
			case '1':
				$num_posts_in_category = $num_posts_in_category . ' post';
				break;
			default:
				$num_posts_in_category = $num_posts_in_category . ' posts';
				break;
		}

		echo '<li>';
			echo '<a href="' . get_term_link( $category->term_id ) . '">' . $category->name . ' <span>' . $num_posts_in_category . '</span></a>';
			housing_court_print_categories( $category->term_id );
		echo '</li>';
	}
	echo '</ul>';
}


function housing_court_flatten_array( $array ) {
	$return = array();
  array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
  return $return;
}


function housing_court_get_child_categories( $category_id ) {
	$categories = get_terms(array(
		'taxonomy' => 'category',
		'parent' => $category_id
	));

	$return_array = array();

	foreach( $categories as $category ) {
		$return_array[ $category->term_id ]['id'] = $category->term_id;
		$return_array[ $category->term_id ]['children'] = housing_court_get_child_categories( $category->term_id );
	}

	return $return_array;
}



function housing_court_get_post_ids_in_category( $category_id ) {
	$post_ids = array();

  // $child_categories = get_terms(array(
  //   'child_of' => $category_id,
  //   'taxonomy' => 'category'
  // ));

  // $categories_not_in = array();
  // foreach( $child_categories as $child_category ) {
  //   $categories_not_in[] = $child_category->term_id;
  // }

  $query_args = array(
    'posts_per_page' => -1,
    'category__in' => $category_id,
  );

  if( get_term_children( $category_id, 'category' ) ) {
    $query_args['category__not_in'] = get_term_children( $category_id, 'category' );
  }

	$posts_in_category = new WP_Query( $query_args );

	$num_posts_in_category = $posts_in_category->found_posts;

	if( $posts_in_category->have_posts() ) {
		while( $posts_in_category->have_posts() ) {
			$posts_in_category->the_post();
			$post_ids[] = get_the_ID();
		}
	}

	wp_reset_postdata();

	return $post_ids;
}


function housing_court_previous_next_post( $post_id ) {
	$grandparent_categories = array();

	$category_hierarchy = housing_court_get_child_categories( 0 );

	foreach( $category_hierarchy as $key => $value ) {
		$grandparent_categories[$value['id']] = housing_court_flatten_array( $category_hierarchy[$key] );
	}

  $post_ids_list = array();

	foreach( $grandparent_categories as $grandparent_id => $grandparent_child ) {
    // $grandparent_posts = housing_court_get_post_ids_in_category( $grandparent_id );
    $child_category_posts = housing_court_get_post_ids_in_category( $grandparent_child );

    // echo '<p>';
    // echo sizeof($grandparent_posts);
    // echo ', ';
    // echo sizeof($child_category_posts);
    // echo '</p>';

    $post_ids_list[$grandparent_id] =  $child_category_posts;
    //array_merge( $grandparent_posts, $child_category_posts );
	}

  foreach( $post_ids_list as $grandparent_id => $post_ids ) {
    $index_of_post_id_in_category_hierarchy = array_search( $post_id, $post_ids );
    if( $index_of_post_id_in_category_hierarchy !== false ) {
      // We're at the beginning of the list of posts, so no "Previous post"
      if( $index_of_post_id_in_category_hierarchy == 0 ) {
        echo '<h2>NO PREVIOUS POST</h2>';
      }
      // We're at the end of the list of posts so no "Next" post
      else if( $index_of_post_id_in_category_hierarchy == ( sizeof( $post_ids ) -1 ) ) {
        echo '<h2>NO NEXT POST</h2>';
      }
      // 
      else {
        $previous_post_id = $post_ids[$index_of_post_id_in_category_hierarchy - 1];
        $next_post_id = $post_ids[$index_of_post_id_in_category_hierarchy + 1];
        ?>

        <div class="row">
          <div class="col-sm-6">
            <div class="text-left xs-bottom"><span class="small-header">Previous Tip</span></div>
            <div class="text-left md-bottom"><span class="next-previous"><a href="<?php echo get_permalink( $previous_post_id ); ?>"><?php echo get_the_title( $previous_post_id ); ?></a></span></div>
          </div>
          <div class="col-sm-6">
            <div class="text-right xs-bottom"><span class="small-header">Next Tip</span></div>
            <div class="text-right"><span class="next-previous"><a href="<?php echo get_permalink( $next_post_id ); ?>"><?php echo get_the_title( $next_post_id ); ?></a></span></div>
          </div>
        </div>
        <?php
      }
    }
  }
}



function housing_court_get_deepest_category_link( $post_id, $text_before = '' ) {
  $categories = wp_get_post_categories( $post_id );

  $longest_list_of_ancestors = 0;

  foreach( $categories as $category_id ) {
    $category_ancestors = get_ancestors( $category_id, 'category' );
    if( sizeof($category_ancestors) > $longest_list_of_ancestors ) {
      $longest_list_of_ancestors = sizeof( $category_ancestors );
    }
  }

  foreach( $categories as $category_id ) {
    $category_ancestors = get_ancestors( $category_id, 'category' );
    if( sizeof($category_ancestors) == $longest_list_of_ancestors ) {
      $category = get_term( $category_id, 'category' );
      return $text_before . '<a href="'.get_term_link($category_id).'">' . $category->name . '</a>';
    }
  }

  return '';
}









function housing_court_get_front_page_suggestions() {
  // SST 'Suggested Search Terms'

  $fps_tags = get_field( 'fps_tags', 'option' );
  $fps_categories = get_field( 'fps_categories', 'option' );
  $fps_posts = get_field( 'fps_posts', 'option' );

  // TAGS
  $tags_response = array();
  foreach( $fps_tags as $tag_array ) {
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
  foreach( $fps_categories as $category_array ) {
    $category_id = $category_array['category'];
    $category = get_term( $category_id, 'category' );

    $grandparent_category = false;
    $category_ancestors = get_ancestors( $category->term_id, 'category' );

    if( $grandparent_category == false && !empty( $category_ancestors ) ) {
      $highest_category = get_category( $category_ancestors[ sizeof($category_ancestors) - 1 ] );
      $grandparent_category = array(
        'name' => $highest_category->name,
        'permalink' => get_term_link( $highest_category->term_id, 'category' ),
        'count' => $highest_category->count,
        'grandparent_category' => $grandparent_category
      );
    }

    $categories_response[] = array(
      'name' => $category->name,
      'count' => $category->count,
      'permalink' => get_term_link( $category_id, 'category' ),
      'grandparent_category' => $grandparent_category
    );
  }

  // Posts
  $posts_response = array();
  foreach( $fps_posts as $post_array ) {
    // var_dump( $post_array );
    $the_post = $post_array['post'];

    if($the_post instanceof WP_Post) {
      $grandparent_category = false;

      $categories = wp_get_post_categories( $the_post->ID );
      foreach( $categories as $index => $category_id ) {
        $post_category = get_category( $category_id );
        // var_dump( $post_category );
        if( $post_category->category_parent == 0 && $grandparent_category == false ) {
          $grandparent_category = array(
            'name' => $post_category->name,
            'permalink' => get_term_link( $post_category->term_id, 'category' ),
            'count' => $post_category->count
          );
          break;
        } else {
          $post_category_ancestors = get_ancestors( $post_category->term_id, 'category' );
          if( $grandparent_category == false && !empty($post_category_ancestors) ) {
            $highest_category = get_category( $post_category_ancestors[ sizeof($post_category_ancestors) - 1 ] );
            $grandparent_category = array(
              'name' => $highest_category->name,
              'permalink' => get_term_link( $highest_category->term_id, 'category' ),
              'count' => $highest_category->count
            );
          }
        }
      }

      $posts_response[] = array(
        'title' => $the_post->post_title,
        'permalink' => get_permalink( $the_post->ID ),
        'grandparent_category' => $grandparent_category
      );

    }
  }

  return array(
    'tags' => $tags_response,
    'categories' => $categories_response,
    'posts' => $posts_response,
  );
}
