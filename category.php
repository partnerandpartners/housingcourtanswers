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
    $output_array['top_section'] .= '<div class="main-lead">' . $category->description . '</p></div>';
  } else {
    $current_section .= '<h3 class="section-title">' . $category->name . '</h3>';
    $current_section .= '<div class="lead"><p>' . $category->description . '</p></div>';
  }

  ob_start();

  if( $category_posts_query->have_posts() ) {
    $item_count = 0;
    if( !$is_parent ) {
      $output_array['scrollspy'] .= '<li><a href="#' . $category->slug . '"> ' . $category->name . '</a></li>';
    }

    echo '<span class="anchor" id="' . $category->slug . '"></span><hr/>';
    echo '<div class="category-page-section"><div class="row md-m-b-3"><div class="col-xs-12 xs-m-b-3 md-m-b-0">';

    echo $current_section;

    echo '</div></div><div class="row md-m-b-2">';

    while( $category_posts_query->have_posts() ) {
      $category_posts_query->the_post();

      $link_title = ' title="Permalink to '.esc_attr(get_the_title()).'" ';
      $sub_title = esc_attr(get_the_title());
      $sub_link = esc_attr(get_the_permalink());
      $sub_description = get_the_excerpt();
      $card_class = 'card';

      if ($item_count == 3 ) {  $item_count = 0;
      ?>

    </div><div class="row md-m-b-2">
      <div class="col-md-4 xs-m-b-2">
        <?php include('templates/card.php') ?>
      </div>

      <?php } else { ?>
        <div class="col-md-4 xs-m-b-2">
          <?php include('templates/card.php') ?>
        </div>

      <?php } $item_count++;

    }
    echo '</div></div>';
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
<div class="category-title-section container">
    <div class="row md-p-t-2">
      <div class="col-xs-12">
        <?php echo $output_array['top_section']; ?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <?php echo $output_array['main']; ?>
      </div>
      <!-- <div id="scroll-spy" class="col-xs-12 col-md-3 col-md-offset-1">
        <?php if( !empty( get_term_children( $current_category_id, 'category' ) ) ): ?>
        <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix" data-spy="affix" data-offset-top="432" data-offset-bottom="906">
          <div id="scroll-nav" role="navigation">
            <ul class="sub-nav nav hidden-xs hidden-sm">
              <?php //echo $output_array['scrollspy']; ?>
            </ul>
          </div>
        </nav>
        <?php endif; ?>
      </div> -->
    </div>
  </div>


<?php get_footer(); ?>
