<article <?php post_class( 'col-md-4 xs-m-b-3 md-m-b-3' ); ?>>
    <span class="small-header"><?php the_date(); ?></span>
    <?php if( get_field('external_link') ) { ?>
    	<h6 class="news-title"><a href="<?php the_field('external_link'); ?>"><?php the_title(); ?></a></h6>
    <?php } else { ?>
      <h6 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
    <?php } ?>
	<div class="secondary-type"><?php the_field('subtitle'); ?></div>
  <?php if( get_field('external_link') ) { ?>
    <a class="more-link text-uppercase" href="<?php the_field('external_link'); ?>" target="_blank">Go to Article</a>
  <?php } else { ?>
    <a class="more-link text-uppercase" href="<?php the_permalink(); ?>">Read More</a>
  <?php } ?>
</article>
