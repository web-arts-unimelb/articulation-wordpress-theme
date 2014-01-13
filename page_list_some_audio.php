<?php
/**
 * Template name: page_list_some_audio.php
 */
?>

<?php get_header(); ?>

<div id="container">
	<div id="content" role="main">
		<h3>Audio</h3>

		<?php
		  $numberposts = 10;
		  // Category_id is the event category id
		  $category_array = array(24);
    ?>
       
		<?php
			$post_id_array = _get_post_ids_by_event_time($category_array,  $numberposts);	
		?>

		<ul>
			<?php foreach($post_id_array as $post_id => $event_time): ?>
				<?php
					$post = get_post($post_id);
				?>
				<li>
						<?php //echo get_post_meta($post_id, "event-time", true); ?>
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				</li>
			<?php endforeach; ?>
		</ul>   
    
    <p><a href="/?page_id=2614">More....</a></p>   
	</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
