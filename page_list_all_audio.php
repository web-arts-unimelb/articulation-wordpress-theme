<?php
/**
 * Template name: page_list_all_audio.php
 */
?>

<?php get_header(); ?>

<div id="container">
	<div id="content" role="main">
		<h3>Complete list of audios</h3>
	
		<?php
			$category_id = 24;
			$max_post_num = _get_max_post_num();
			$post_id_array = _get_post_ids_by_event_time(array($category_id), $max_post_num);
		?>

		<?php $prev_year = null; ?>
		<?php foreach($post_id_array as $post_id => $event_time): ?>
			<?php
				$post = get_post($post_id);
				setup_postdata($post);

				$event_time = get_post_meta($post_id, "event-time", true);
				$this_year = __get_year($event_time);   
			?>

			<?php if($prev_year != $this_year): ?>
				<?php if(!is_null($prev_year)): ?>
					<!-- A list is already open, close it first -->
					</ul>
				<?php endif;?> 

				<h3><?php echo $this_year ?></h3>
				<ul><!-- start ul -->
			<?php endif; ?>

					<li>
						<?php //echo get_post_meta($post_id, "event-time", true). " - "; ?>
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					</li>
					<?php $prev_year = $this_year; ?>

		<?php endforeach; ?>        

		</ul><!-- close ul -->

	</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
