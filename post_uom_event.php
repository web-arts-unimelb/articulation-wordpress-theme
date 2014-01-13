<?php
/**
 * Template name: post_uom_event.php
 */
?>

<?php get_header(); ?>

<div id="container">
	<div id="content" role="main">
  	<?php $post_id = get_the_ID(); ?>

		<h2><?php echo get_the_title($post_id) ?></h2>

		<?php
			echo get_post_meta($post_id, 'event_start_end_time', true);
			echo get_post_meta($post_id, 'event_location', true);
			echo get_post_meta($post_id, 'event_presenter', true);
			echo get_post_meta($post_id, 'event_description', true);

			echo get_post_meta($post_id, 'event_info', true);
      echo get_post_meta($post_id, 'event_booking', true);
      echo get_post_meta($post_id, 'event_org_link', true);


		?>      
	</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
