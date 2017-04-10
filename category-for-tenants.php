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
//$for_tenants_menu = wp_get_nav_menu_items('For Tenants');
// print "<pre style='font-size: 10px;'>";
// print_r($for_tenants_menu);
// print "</pre>";
?>

<div class="container-fluid full bg green">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
					<div class="header-image-left hidden-sm hidden-xs" style="">
						<img class="img-responsive hidden-sm hidden-xs" style="" src="<?php echo get_template_directory_uri(); ?>/img/tenants/hca-tenants-bg-bldg-left.png" />
						<img class="clouds hidden-sm hidden-xs" id="cloud-left" style="" src="<?php echo get_template_directory_uri(); ?>/img/clouds/hca-bg-cloud-left.png" />
						<img class="clouds hidden-sm hidden-xs" id="cloud-center" style="" src="<?php echo get_template_directory_uri(); ?>/img/clouds/hca-bg-cloud-center.png" />
						<img class="clouds hidden-sm hidden-xs" id="cloud-right" style="" src="<?php echo get_template_directory_uri(); ?>/img/clouds/hca-bg-cloud-right.png" />

					</div>
					<?php if ( have_posts() ): ?>
					<h1 class="text-uppercase"><?php echo single_cat_title( '', false ); ?></h1>
					<div class="large-main-lead"><?php echo category_description(); ?></div>
					<?php endif; ?>
			</div>
			<div class="col-md-5">
				<div class="header-image-right hidden-sm hidden-xs" style="">
					<img class="img-responsive main-image" style="" src="<?php echo get_template_directory_uri(); ?>/img/tenants/hca-tenants-bg-bldg-main.png" />
					<img class="img-responsive right-image hidden-sm hidden-xs" style="" src="<?php echo get_template_directory_uri(); ?>/img/tenants/hca-tenants-bg-bldg-right.png" />
				</div>
				<div class="header-image-right hidden-lg hidden-md hidden-sm visible-sm-*" style="">
					<img class="img-responsive main-image" style="" src="<?php echo get_template_directory_uri(); ?>/img/tenants/hca-tenants-bg-bldg-main.png" />
				</div>
			</div>
	</div>
	</div>
</div>

<div id="main-content-container" class="container" >
	<div class="row">
		<div class="col-md-8">
			<?php
			// Loop over each item in the For Tenants Menu
			foreach ($ft_items as $ft_item ) {
					$id = (int)$ft_item['ID']; // Get the item ID
					$title = $ft_item['title']; // Get the item title
					$type = $ft_item['type'];
					$link = get_term_link($id);
					$slug = get_term($id)->slug; // Get the item link
					$tip_num = get_category($id)->count; // Get the amount of posts
					$description = term_description($id); // Get the description
					$output_array['scrollspy'] .= '<li><a href="#' . $slug . '">' . $title . '</a></li>';
			?>

			<!-- Top Section of each category -->
			<div class="xs-m-b-6">
				<span class="anchor" id="<?php echo $slug ?>" data-target="<?php echo $slug ?>"></span>
				<div class="xs-m-b-1"><a href="<?php echo $link ?>" class="section-link"><?php echo $title ?></a></div>
				<div class="lead xs-m-b-2"><?php echo $description ?></div>

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
							$sub_link = $ft_child['url'];
							// getting the post excerpt
							$the_post = get_post($sub_id);
							setup_postdata($the_post);
							$sub_description = get_the_excerpt();
							$card_class = 'card';
					}

					if ($ft_item_count == 2 ) {  $ft_item_count = 0; ?>

					</div><div class="row md-m-b-3">
						<div class="col-sm-6 xs-m-b-2 md-m-b-0">
							<?php include('templates/card.php') ?>
						</div>

					<?php	} else { ?>

					<div class="col-sm-6 xs-m-b-2 md-m-b-0">
						<?php include('templates/card.php') ?>
					</div>

					<?php
					//echo '<li><a href=" '. $sub_link.' ">' . $sub_title . '</a><small>' .$sub_description.'</small></li>';
					} $ft_item_count++;
				} ?>

			</div><!-- .row -->
		</div><!-- div with margin bottom -->
			<?php
				} else {
					echo '**Something is wrong here**';
				}
			} ?>

		</div><!-- col-md-8 -->

		<div class="col-md-3 col-md-offset-1">
			<div id="scroll-nav" role="navigation">
				<ul class="sub-nav nav hidden-xs hidden-sm" data-spy="affix" data-offset-top="643" data-offset-bottom="650">
					<?php echo $output_array['scrollspy']; ?>
					<div class="back-to-topp"><a href="#"><br/>Back to Top &#8679;</a></div>
				</ul>

			</div>
		</div>

	</div>
</div>

<?php get_footer();?>
