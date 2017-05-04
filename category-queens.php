<?php
/**
 * Template Name: Events Queens
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
    <div class="full">
      <div class="container">
    		<div class="row md-bottom">
    		   <div class="col-md-8 col-md-offset-2 text-center">
    		      <span class="large-borough-badge"><?php echo single_cat_title( '', false ); ?></span>
    		      <h5 class="category-description"><?php echo category_description(); ?></h5>
    		   </div>
    		</div>
    	</div>
    </div>
<?php endif; ?>

<div class="container xs-m-t-6">
    <div class="row md-bottom">
      <div class="col-sm-12">
         <hr/>
         <h3 class="section-title">Upcoming</h3>
      </div>
    </div>
</div>

<div class="container">
  <div class="row">
    <?php
    $current_timestamp = current_time('timestamp');
    $args = array(
      'post_type' => array('event'),
      'category_name' => 'Citywide',
      'posts_per_page' => -1,
      'order' => 'DESC'
    );

    $upcoming_events_query = new WP_Query( $args );
    $rowCounter = 0;
    if( $upcoming_events_query->have_posts() ) {
      while( $upcoming_events_query->have_posts() ){
        $upcoming_events_query->the_post();
        $end_date_field = get_field('end_date');
        if ($end_date_field >= $current_timestamp) {

        ?>

          <article <?php post_class( 'col-md-4 xs-m-b-3 md-m-b-3 xs-m-t-3 md-m-t-3' ); ?>>
          		<span class="borough-badge"><?php the_category( '&#58; ' ); ?></span>
          		<h6 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
          		<div class="secondary-type xs-m-b-1"><?php the_field( 'subtitle'); ?></div>
          		<div class="news-event-meta">
          			<span class="small-header">When</span>
          			<div class="event-data xs-m-b-1">
          				<?php the_field( 'exact_date'); ?>
          			</div>
          			<span class="small-header">Where</span>
          			<div class="event-data">
          				<?php the_field( 'address'); ?>
          			</div>
          		</div>
          </article>

        <?php
        $rowCounter++;
        if($rowCounter==3){
          echo('</div><div class="row">');//new row at 3rd post.
          $rowCounter = 0;
          }
        }
      }
    }
    wp_reset_query();
    ?>
  </div>
</div>

<div class="container xs-m-t-6">
    <div class="row md-bottom">
      <div class="col-sm-12">
         <hr/>
         <h3 class="section-title">Past</h3>
      </div>
    </div>
</div>

<div class="container">
  <div class="row">
    <?php
    $current_timestamp = current_time('timestamp');
    $args = array(
      'post_type' => array('event'),
      'category_name' => 'Citywide',
      'posts_per_page' => -1,
      'order' => 'DESC'
    );

    $upcoming_events_query = new WP_Query( $args );
    $rowCounter = 0;

    if( $upcoming_events_query->have_posts() ) {
      while( $upcoming_events_query->have_posts() ){
        $upcoming_events_query->the_post();
        $end_date_field = get_field('end_date');
        if ($end_date_field < $current_timestamp) {

        ?>

          <article <?php post_class( 'col-md-4 xs-m-b-3 md-m-b-3 xs-m-t-3 md-m-t-3' ); ?>>
          		<span class="borough-badge"><?php the_category( '&#58; ' ); ?></span>
          		<h6 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
          		<div class="secondary-type xs-m-b-1"><?php the_field( 'subtitle'); ?></div>
          		<div class="news-event-meta">
          			<span class="small-header">When</span>
          			<div class="event-data xs-m-b-1">
          				<?php the_field( 'exact_date'); ?>
          			</div>
          			<span class="small-header">Where</span>
          			<div class="event-data">
          				<?php the_field( 'address'); ?>
          			</div>
          		</div>
          </article>


        <?php
        $rowCounter++;
        if($rowCounter==3){
          echo('</div><div class="row">');//new row at 3rd post.
          $rowCounter = 0;
          }
        }
      }
    }
    wp_reset_query();
    ?>
  </div>
</div>

<?php get_footer();?>
