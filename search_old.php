<?php
/**
 * Search results page
 * 
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_header();?>

<?php // Get number of results
$results_count = $wp_query->found_posts;
?>

<div class="jumbotron">
    <div class="container">
        <h1 class="article-title">Search <span class="keyword">&ldquo;<?php the_search_query(); ?>&rdquo;</span></h1>
        <?php if ($results_count == '' || $results_count == 0) { // No Results ?>
            <p><span class="label label-danger"><?php _e('No Results'); ?></span>&nbsp; <?php _e('Try different search terms.'); ?></p>
        <?php } else { // Results Found ?>
            <p><span class="label label-success"><?php echo $results_count . __(' Results'); ?></span></p>
        <?php } // end results check ?>
        <div class="row">
            <div class="col-md-10">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div> <!-- .container -->
</div> <!-- .jumbotron -->

<div class="container" id="main">
    <div class="row">
        <div class="col-md-10">
            <?php if (have_posts()) : // Results Found ?>

                <h1><?php _e('Search Results'); ?></h1>
                <?php while (have_posts()) : the_post(); ?>

                <article <?php post_class(); ?>>
                    <h5 class="small-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                    <div class="post-content">
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </article>

                <?php endwhile; ?>

            <?php else : // No Results ?>

                <p><?php _e('Sorry. We couldn&rsquo;t find anything for that search. View one of our site&rsquo;s pages or a recent article below.'); ?></p>
                <div class="row">
                    <div class="col-md-6 posts">
                        <h3><?php _e('Recent'); ?></h3>
                        <ul>
                            <?php
                                $args = array(
                                    'numberposts' => '10',
                                    'post_status' => 'publish',
                                    'post_type' => 'post'
                                );
                                $recent_posts = wp_get_recent_posts( $args );
                                foreach( $recent_posts as $recent ) {
                                    echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></li>';
                                }
                            ?>
                        </ul>
                    </div> <!-- .posts -->
                    <div class="col-md-6 pages">
                        <h3><?php _e('Page Sitemap'); ?></h3>
                        <ul>
                            <?php wp_list_pages('title_li=&sort_column=menu_order'); ?>
                        </ul>
                    </div> <!-- .pages -->
                </div> <!-- .row -->

            <?php endif; ?>

        </div> <!-- .col-md-8 -->

    </div> <!-- .row -->
</div><!-- .container -->

<?php

$search_post_types = array(
	'post' => array(
		'see_all_text' => 'See All Answers',
		'no_items_found' => '<p class="none-found">No answers found.</p>',
		'section_title' => 'Answers',
		'posts_per_page' => -1
	),
	'news' => array(
		'see_all_text' => 'See All News & Campaigns',
		'no_items_found' => '<p class="none-found">No News found.</p>',
		'section_title' => 'News & Campaigns'
	),
	'event' => array(
		'see_all_text' => 'See All Events',
		'no_items_found' => '<p class="none-found">No events found.</p>',
		'section_title' => 'Events'
	)
);


$post_types_to_print = array();
$selected_post_type = get_query_var( 'js-post-type', '' );

if( ! empty( $selected_post_type ) ) {
	$post_types_to_print = array( $selected_post_type );
}
else {
	foreach( $search_post_types as $post_type => $post_type_settings ) {
		$post_types_to_print[] = $post_type;
	}
}


echo '<div class="search-results-wrapper">';

foreach( $post_types_to_print as $post_type ) {
	$posts_per_page = 4;
	if( sizeof( $post_types_to_print ) === 1 ) {
		$posts_per_page = -1;
	}
	elseif( isset( $search_post_types[$post_type]['posts_per_page'] ) ) {
		$posts_per_page = $search_post_types[$post_type]['posts_per_page'];
	}

	$search_query_args = array(
		'post_type' => array( $post_type ),
		's' => get_search_query(),
		'posts_per_page' => $posts_per_page
	);

	$search_query = new WP_Query( $search_query_args );

	echo '<div class="container">';

	?>
	<div class="row post-type-name">
		<div class="col-md-8">
			<h3 class="other"><?php echo $search_post_types[$post_type]['section_title']; ?> <span class="number-found">(<?php echo $search_query->found_posts; ?>)</span></h3>
			<hr class="other-hr">
		</div>
	</div>
	<?php

	$posts_per_row = 4;
	if( isset( $search_post_types[$post_type]['posts_per_row'] ) ) {
		$posts_per_row = $search_post_types[$post_type]['posts_per_row'];
	}

	if( $search_query->have_posts() ) {
		$num_posts_printed = 0;
		$num_posts_in_row = 0;
		echo '<div class="row">';
		while( $search_query->have_posts() ) {
			$search_query->the_post();
			get_template_part('templates/' . get_post_type(), 'search' );
		
			$num_posts_printed++;
			$num_posts_in_row++;

			if( $num_posts_in_row === $posts_per_row && $num_posts_printed !== $search_query->found_posts ) {
				echo '</div><div class="row search-row">';
				$num_posts_in_row = 0;
			}
		}
		echo '</div>'; // .row
	}
	else {

	}

	hca_search_more_posts_button(array(
		'post_type' => $post_type,
		'found_posts' => $search_query->found_posts,
		'num_posts_to_display' => $search_query_args['posts_per_page'],
		'no_items_found' => $search_post_types[$post_type]['no_items_found'],
		'see_all_text' => $search_post_types[$post_type]['see_all_text']
	), get_search_query());


	echo '</div>'; // .container


	// ARTISTS AND SUBJECTS
	if( $post_type === 'post' && sizeof( $post_types_to_print ) !== 1 ) {
		// ARTISTS
		$num_artists_found = 0;
		$artist_query_args = array(
			'role'=> 'Artist',
			'search' => '*'.get_search_query().'*',
			'search_columns' => array( 'display_name','nicename','url' )
		);
		$artist_query = new WP_User_Query( $artist_query_args );

		$artists_html = '';

		if( !empty( $artist_query ) ) {
			foreach( $artist_query->results as $artist ) {
				$artists_html .= '<a class="btn btn-default btn-artist text-uppercase" href="'.get_author_posts_url( $artist->ID ).'">'.$artist->display_name.'</a>';
				$num_artists_found++;
			}
		}


		// SUBJECTS
		$num_subjects_found = 0;
		$subjects_html = '';
		$subjects = get_terms( array('subject'), array(
			'search' => get_search_query()
		));

		if( !empty( $subjects ) && !is_wp_error( $subjects ) ) {
			$num_subjects_found = count( $subjects );
			foreach( $subjects as $subject ) {
				$subjects_html .= '<a class="btn btn-default text-uppercase">'.$subject->name.'</a>';
			}
		}

		?>

		<div class="container">
			<div class="row post-type-name">
				<div class="col-xs-6">
					<h3 class="other">Artists <span class="number-found">(<?php echo $num_artists_found; ?>)</span></h3>
					<hr class="other-hr">
					<div class="search-results-artists">
						<?php

						if( !empty( $artists_html ) ) {
							echo $artists_html;
						}
						else {
							echo '<p class="none-found">No artists found.</p>';
						}

						?>
					</div>
				</div>
				<div class="col-xs-6">
					<h3 class="other">Subjects <span class="number-found">(<?php echo $num_subjects_found; ?>)</span></h3>
					<hr class="other-hr">
					<div class="entry-subjects">
						<?php

						if( !empty( $subjects_html ) ) {
							echo $subjects_html;
						}
						else {
							echo '<p class="none-found">No subjects found.</p>';
						}

						?>
					</div>
				</div>
			</div>
		</div>

		<?php
	}

	wp_reset_postdata();
}

echo '</div>'; // .search-results-wrapper



// FORMATS | CHANNELS | MOVEMENTS

if( sizeof( $post_types_to_print ) !== 1 ) {

	$tax_terms = array(
		'tags'   => array(
			'section_title' => 'Glossary Terms',
			'no_terms_found' => 'No Terms found.'
		)
	);

	echo '<div class="container"><div class="row post-type-name">';

		foreach( $tax_terms as $term => $term_settings ) {
			$found_terms = get_terms( array( $term ), array(
				'search' => get_search_query()
			));

			echo '<div class="col-xs-4">';

			echo '<h3 class="other">'.$term_settings['section_title'].' ';
			echo '<span class="number-found">('.count( $found_terms ).')</span>';
			echo '</h3>';
			echo '<hr class="other-hr">';

			if( !empty( $found_terms ) && !is_wp_error( $found_terms ) ) {
				$found_terms_html = array();
				foreach( $found_terms as $found_term ) {
					$term_link = get_term_link( $found_term );
					$found_terms_html[] = '<a class="large-links" href="'.esc_url($term_link).'">'.$found_term->name.'</a>';
				}
				echo implode(", ", $found_terms_html);
			}
			else {
				echo '<p class="none-found">' . $term_settings['no_terms_found'] . '</p>';
			}

			echo '</div>';
		}

	echo '</div></div>';

}
?>

<?php get_footer();?>