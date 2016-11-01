<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_header();
// Get the current page category and assign it to global variables
// $GLOBALS['current_category'] = get_category( get_query_var( 'cat' ) );
// $GLOBALS['current_category_id'] = $current_category->cat_ID;

$ft_items = wp_get_menu_array('For Tenants');
	$output_array = array('main' => '', 'scrollspy' => '' );
// $for_tenants_menu = wp_get_nav_menu_items('For Tenants');
// print "<pre style='font-size: 10px;'>";
// print_r($for_tenants_menu);
// print "</pre>";
?>

<div class="container-fluid full-bg-green">
	<div class="container">
		<?php get_search_form(); ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
					<?php if ( have_posts() ): ?>
					<h1 class="text-uppercase"><?php echo single_cat_title( '', false ); ?></h1>
					<div class="main-lead"><?php echo category_description(); ?></div>
					<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<hr/>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php
			// Loop over each item in the For Tenants Menu
			foreach ($ft_items as $ft_item ) {
					$id = (int)$ft_item['ID']; // Get the item ID
					$title = $ft_item['title']; // Get the item title
					$type = $ft_item['type'];
					$link = get_term_link($id); // Get the item link
					$tip_num = get_category($id)->count; // Get the amount of posts
					$description = term_description($id); // Get the description
					$output_array['scrollspy'] .= '<li><a href="#' . $title . '"> ' . $title . '</a></li>';
			?>

			<!-- Top Section of each category -->
			<a href="<?php echo $link ?>">
				<h2 id="<?php echo $title ?>"><?php echo $title ?></h2>
			</a>
			<p class="lead"><?php echo $description ?></p>

			<?php
			//echo '<li><a href=" '. $link.' "><h3>' . $title . '</h3></a>' .$description.'</li>';
			// Check to see if the item has children under it
			if (!empty($ft_item['children'])) {
				$ft_item_count = 0; ?>

				<div class="row md-m-b-3">

				<?php
				foreach ($ft_item['children'] as $ft_child) {
					$sub_id = (int)$ft_child['ID'];
					$sub_title = $ft_child['title'];
					$sub_type = $ft_child['type'];
					if ($sub_type == 'category') {
						$sub_link = get_term_link($sub_id);
						$sub_tip_num = get_category($sub_id)->count;
						$sub_description = term_description($sub_id);
						$card_class = 'card-stack';
					} elseif ($sub_type == 'post') {
						$sub_link = $ft_child['link'];
							// getting the post excerpt
							$the_post = get_post($sub_id);
							setup_postdata($the_post);
							$sub_description = get_the_excerpt();
							$card_class = 'card';
					}

					if ($ft_item_count == 2 ) {  $ft_item_count = 0; ?>

					</div><div class="row md-m-b-3">
						<div class="col-sm-6">
							<div class="<?php echo $card_class ?>">
								<a href="<?php echo $sub_link ?>">
									<h4><?php echo $sub_title ?></h4>
								</a>
								<p><?php echo $sub_description ?></p>
							</div>
						</div>

					<?php	} else { ?>

					<div class="col-sm-6">
						<div class="<?php echo $card_class ?>">
							<a href="<?php echo $sub_link ?>">
								<h4><?php echo $sub_title ?></h4>
							</a>
							<p><?php echo $sub_description ?></p>
						</div>
					</div>

					<?php
					//echo '<li><a href=" '. $sub_link.' ">' . $sub_title . '</a><small>' .$sub_description.'</small></li>';
					} $ft_item_count++;
				} ?>

			</div><!-- .row -->

			<?php
				} else {
					echo '**Something is wrong here**';
				}
			} ?>
		</div><!-- col-md-8 -->

		<div class="col-md-4 scrollspy">
			<?php echo $output_array['scrollspy']; ?>
		</div>

	</div>
</div>

<?php get_footer();?>
