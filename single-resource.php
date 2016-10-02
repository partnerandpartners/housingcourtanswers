<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_header();?>

<div class="container">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
	<article <?php post_class(); ?>>
		
		    <span class="small-header">
		    
<?php
$taxonomy = 'category';

// get the term IDs assigned to post.
$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
// separator between links
$separator = '&nbsp;//&nbsp;';

if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

	$term_ids = implode( ',' , $post_terms );
	$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
	$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

	// display post categories
	echo  $terms;
}
?>

</span>
		    
		    
		    <div class="row">
			    <div class="col-md-12" role="main">
					<h1 class="article-title"><?php the_title(); ?></h1>
					<?php the_tags(); ?></p>
				</div>
            </div>
			
			<div class="row">
				<div class="col-sm-9">
				   <div class="entry-content"><?php the_content(); ?></div>
				</div>
            </div>
            
            <div class="row">
				<div class="col-sm-6">
				   <div class="text-left"><span class="small-header">Previous Question</span></div>
				   <div class="text-left"><span class="next-previous"><?php previous_post_link('%link', '%title', TRUE, ''); ?></span></div>
				</div>
				<div class="col-sm-6">
				   <div class="text-right"><span class="small-header">Next Question</span></div>
				   <div class="text-right"><span class="next-previous"><?php next_post_link('%link', '%title', TRUE, ''); ?></span></div>
				</div>
            </div>
            
            <div class="row">
			
            </div>
	</article>

<?php endwhile; ?>

<?php endif; ?>

</div>

<?php get_footer();?>