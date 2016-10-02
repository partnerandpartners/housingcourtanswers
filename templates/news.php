<article <?php post_class( 'col-md-4' ); ?>>
	<header>
    	<h6 class="news-date"><?php the_date(); ?><h6>
		<h5 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
		<h6 class="news-subtitle"><?php the_field('subtitle'); ?></h6>
	</header>
	<?php the_excerpt(); ?>
</article>