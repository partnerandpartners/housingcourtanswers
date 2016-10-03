<article <?php post_class( 'col-md-4' ); ?>>
	<header class="md-m-b-1">
    <h5 class="news-date"><?php the_date(); ?></h5>
		<h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="news-subtitle text-uppercase"><?php the_field('subtitle'); ?></p>
	</header>
	<?php the_excerpt(); ?>
</article>
