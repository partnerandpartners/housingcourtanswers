<?php

get_header();

function housing_court_print_category_posts_tree( $category_id, $is_parent = false, $output_array ) {
  $category_posts_query = new WP_Query(array(
    'posts_per_page' => -1,
    'category__in' => $category_id,
    'category__not_in' => array_merge(get_term_children( $category_id, 'category' ))
  ));

  // var_dump( array_merge(get_term_children( $category_id, 'category' ) ) );
  // die();

  $category = get_term( $category_id, 'category' );


  $is_parent_and_has_posts = true;
  if( !$is_parent ) {
    $is_parent_and_has_posts = false;
  }

  $current_section = '';

  if( $is_parent ) {
    $output_array['top_section'] .= '<h1 class="category-title">' . $category->name . '</h1>';
    $output_array['top_section'] .= '<h5 class="category-description">' . $category->description . '</h5>';
  } else {
    $current_section .= '<h3 class="section-title">' . $category->name . '</h3>';
    $current_section .= '<h6 class="section-description">' . $category->description . '</h6><hr/>';
  }

  ob_start();

  if( $category_posts_query->have_posts() ) {
    if( !$is_parent ) {
      $output_array['scrollspy'] .= '<li><a href="#' . $category->slug . '"> ' . $category->name . '</a></li>';
    }

    echo '<span class="anchor" id="' . $category->slug . '"></span>';
    echo '<div class="highlight category-page-section">';

    echo $current_section;

    while( $category_posts_query->have_posts() ) {
      $category_posts_query->the_post();

      $link_title = ' title="Permalink to '.esc_attr(get_the_title()).'" ';
      ?>

      <article>
        <h5 class="sub-title"><a href="<?php the_permalink(); ?>" rel="bookmark" <?php echo $link_title; ?>><?php the_title(); ?></a></h5>
        <div class="post-content"><?php the_content(); ?></div>
      </article>

      <?php
    }
    echo '</div>';
  }

  $output_array['main'] .= ob_get_clean();

  wp_reset_postdata();

  $child_categories = get_terms(array(
    'taxonomy' => 'category',
    'parent' => $category_id
  ));

  foreach( $child_categories as $child_category ) {
    $output_array = housing_court_print_category_posts_tree( $child_category->term_id, false, $output_array );
  }

  return $output_array;
}

$current_category = get_category( get_query_var( 'cat' ) );
$current_category_id = $current_category->cat_ID;
$output_array = array( 'top_section' => '', 'main' => '', 'scrollspy' => '' );
$output_array = housing_court_print_category_posts_tree( $current_category_id, true, $output_array );

?>

<div class="top-section">
  <div class="container">
    <div class="row md-bottom">
      <div class="col-xs-12 col-sm-7">
        <?php echo $output_array['top_section']; ?>
      </div>
      <div id="hotline-callout" class="col-xs-12 col-sm-4 col-sm-offset-1">
        <span class="hotline-small-title">Housing Court Answers Hotline</span>
        </br>9 am to 5 pm
        </br>Tuesday — Thursday
        </br><a class="btn btn-default hotline-btn" role="button" href="">Call (212) 962-4795</a>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-9">
      <?php echo $output_array['main']; ?>
    </div>
    <div id="scroll-spy" class="col-xs-12 col-md-3">
      <?php if( !empty( get_term_children( $current_category_id, 'category' ) ) ): ?>
      <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix" data-spy="affix" data-offset-top="432" data-offset-bottom="906">
        <div id="nav">
          <ul class="sub-nav nav hidden-xs hidden-sm">
          	<span class="small-header">Related Topics</span>
            <?php echo $output_array['scrollspy']; ?>
          </ul>
        </div>
      </nav>
      <?php endif; ?>
    </div>
  </div>
</div>

<div class="container md-top">
	<div class="row">
		<div class="col-sm-12">
			<?php comments_template(); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>
