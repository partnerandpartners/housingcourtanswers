<?php
/**
 * The template used to display Tag Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_header();?>

<?php if ( have_posts() ):?>

<?php $rowCounter = 0; ?>


<div class="full xs-m-b-2">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<h1 class="single-tag-title"><?php echo single_tag_title( '', false ); ?></h1>
				<h5 class="category-description"><?php echo tag_description(); ?></h5>
 	   	</div>
		</div>
	</div>
</div>

<div class="container">
   <div class="row">
      <div class="col-sm-12 xs-m-b-3">
         <hr/>
         <?php
         $tag = get_term_by( 'slug', get_query_var('tag'), 'post_tag' );

         ?><h5 class="tag-count-text"><span class="large-badge"><?php echo $tag->count; ?> Tips</span> relating to "<?php echo single_tag_title( '', false ); ?>"</h5>
      </div>
   </div>
</div>


<div class="container">
   <div class="row">
		<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-sm-4 xs-m-b-3">
					<a href="<?php the_permalink(); ?>">
					  <div class="card-wrapper">
					    <div class="card">
					        <h5><?php the_title (); ?></h5>
					        <p><?php the_excerpt (); ?></p>
					          <a class="more-link text-uppercase" href="<?php the_permalink(); ?>">Read More</a>
					    </div>
					  </div>
					</a>
				</div>
				<?php
					$rowCounter++;
					if($rowCounter==3){
						echo('</div><div class="row">');//new row at 3rd post.
						$rowCounter = 0;
					}
				?>
		<?php endwhile; ?>
	   </div>
   </div>
</div>
<?php else: ?>

	<div class="full">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h1 class="single-tag-title"><?php echo single_tag_title( '', false ); ?></h1>
					<h5 class="category-description"><?php echo tag_description(); ?></h5>
	 	   	</div>
			</div>
		</div>
	</div>

<div class="container">
   <div class="row">
      <div class="col-sm-12 xs-m-b-3" role="main">
      	<hr/>
	  	<h5 class="tag-count-text"><span class="large-badge">No tips</span> to display for "<?php echo single_tag_title( '', false ); ?>"</h5>
	  </div>
   </div>
</div>
<?php endif; ?>

<div>
<div class="glossary-label-wrapper hidden-sm hidden-xs" style="min-height:47px">
	<div id="glossary-labels" class="container-fluid" style="width: 100%;">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="first-table-row"><div class="">Court Term</div><div class="">Definition</div><div class="back-to-top"><a href="#">Back to Top &#8679;</a></div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


		<div class="container glossary-margin-top">
		<div class="row">
		<div class="col-sm-12">
		<?php
			$args = array( 'hide_empty' => 0 );
			$i = 0;
			$terms = get_terms( 'post_tag', $args );



			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			    $count = count( $terms );
			    $term_list = '<p class="my_term-archive">';

			    $current_letter = false;

			    foreach ( $terms as $term ) {

			    	$current_term_first_letter = strtoupper(substr($term->name, 0, 1));

				    if( $current_letter == false ) {
				    	$current_letter = $current_term_first_letter;
				    	echo '<div class="row letter-table"><div class=""><h3>'.$current_letter.'</h3></div><div class=""></div></div>';
				    } else if( $current_letter !== $current_term_first_letter ) {
				    	$current_letter = $current_term_first_letter;
				    	echo '<div class="row letter-table"><div class=""><h3>'.$current_letter.'</h3></div><div class=""></div></div>';
				    }

				    echo '<div class="term-table">';
			        echo '<div class="mobile-sm-bottom"><a rel="tag" href="' . get_tag_link( $term ) . '">' . $term->name . '</a></div>';
			        echo '<div class="definition">'.$term->description .'</div>';
			        $i++;

			        if($i==1){
						echo('</div>');//new row at 3rd post.
						$i = 0;
				    }
			    }
			}
		?>
		</div>
		</div>
	</div>

</div>


<?php get_footer();?>
