<?php
/**
 * Template Name: Events
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

<?php while ( have_posts() ) : the_post(); ?>
   <div class="top-section">
	  <div class="container">
	   <div class="row md-bottom">
		   <div class="col-md-6">
				<h1 class="category-title"><?php the_title( '', false ); ?></h1>
				<div class="main-lead">Online Resources for New York City Tenants and Housing Advocates.</div>
		   </div>
		   <div id="resource-quote" class="col-md-4 col-md-offset-2 xs-m-t-3">
				<span class="resource-quote">“Easily New York’s best online resource for New York landlord-tenant case law, statutes, secondary authority, and a great deal more law . . .”</span></br>
				<div class="quote-credit">Gerald Lebovits,<br/><span class="quote-credit-company">N.Y. Real Property Law Journal</div>

		  </div>
	    </div>
	  </div>
	</div>
<?php endwhile; ?>
<?php endif; ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
		<?php
			$scroller_var = '';
			$resource_query = hca_get_resources_query();
			if( $resource_query->have_posts() ) {
				while( $resource_query->have_posts() ){
					$resource_query->the_post();
					$post_slug = basename(get_permalink());
					$post_title = get_the_title();
					 ?>
					<article <?php post_class("md-m-b-6"); ?>>
						<span class="anchor" id="<?php echo( basename(get_permalink()) ); ?>"></span>
						<div class="category-page-section highlight">
						<h3 class="section-title"><?php the_title(); ?></h3>
						<hr/>
						<div class="links-post-content"><?php the_content(); ?></div>
						</div>
					</article>
					<?php $scroller_var .= '<li><a href="#'. $post_slug . '">'. $post_title . '</a></li>';	?>
	   <?php	}
			}

		?>
		</div>

		<div class="col-md-3 col-md-offset-1">
			<div id="scroll-nav" role="navigation">
				<ul class="sub-nav nav hidden-xs hidden-sm resources" data-spy="affix" data-offset-top="444" data-offset-bottom="600">
					<?php echo $scroller_var; ?>
			  </ul>
			</div>
        </div>
	</div>
</div>

<?php get_footer();?>
