<article <?php post_class( 'col-md-4' ); ?>>
	<header class="md-m-b-1">
    <h6 class="news-date"><?php the_date(); ?></h6>
		<h4 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<p class="news-subtitle text-uppercase"><?php the_field('subtitle'); ?></p>
	</header>
	<div class="secondary-type"><?php the_excerpt(); ?></div>
</article>
