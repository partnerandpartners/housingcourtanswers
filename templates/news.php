<article <?php post_class( 'col-md-4 xs-m-b-3 md-m-b-3' ); ?>>
	<header class="md-m-b-1">
    <span class="small-header"><?php the_date(); ?></span>
		<h6 class="news-title"><a href="<?php the_field('external_link'); ?>"><?php the_title(); ?></a></h6>
		<p class="news-subtitle xs-m-b-1"><?php the_field('subtitle'); ?></p>
	</header>
	<div class="secondary-type"><?php the_excerpt(); ?></div>
	<a class="more-link text-uppercase" href="<?php the_field('external_link'); ?>" target="_blank">Read Article</a>
</article>
