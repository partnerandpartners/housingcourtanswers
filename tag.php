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

<?php if ( have_posts() ): ?>

<div class="container">
	<div class="row">
		<div class="col-md-7">
			<h1 class="single-tag-title"><?php echo single_tag_title( '', false ); ?></h1>
			<h5 class="category-description"><?php echo tag_description(); ?></h5>
		</div>
		<div class="col-md-4 col-md-offset-1">
				<span class="hotline-small-title">Housing Court Answers Hotline</span>
				</br>9 am to 5 pm
				</br>Tuesday — Thursday
				</br><a class="btn btn-default hotline-btn" role="button" href="">Call (212) 962-4795</a>
		</div>
	</div>
</div>

<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <hr/>
         <?php 
         $tag = get_term_by( 'slug', get_query_var('tag'), 'post_tag' );

         ?><h3 class="section-title"><span class="tip-count"><?php echo $tag->count; ?> Tips</span> relating to "<?php echo single_tag_title( '', false ); ?>"</h3>
      </div>
   </div>
</div>


<div class="container">
   <div class="row">
      <div class="col-sm-10" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<h5 class="small-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
					<div class="post-content"><?php the_content(); ?></div>
				</article>
		<?php endwhile; ?>
	   </div>
   </div>
</div>
<?php else: ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="single-tag-title"><?php echo single_tag_title( '', false ); ?></h1>
			<h5 class="category-description"><?php echo tag_description(); ?></h5>
		</div>
	</div>
</div>

<div class="container">
   <div class="row">
      <div class="col-sm-12" role="main">
      	<hr/>
	  	<h3 class="section-title"><span class="tip-count">No tips</span> to display in "<?php echo single_tag_title( '', false ); ?>"</h3>
	  </div>
   </div>
</div>
<?php endif; ?>

<div>

	<div class="sticky scroll-bar hidden-xs hidden-sm">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="first-table-row"><div class="">Court Term</div><div class="">Definition</div><div class="back-to-top"><a href="#">Back to Top &uarr;</a></div></div>
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