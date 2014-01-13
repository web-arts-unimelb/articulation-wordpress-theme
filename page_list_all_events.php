<?php
/**
 * Template name: page_list_all_events.php
 */
?>

<?php get_header(); ?>

<div id="container">
    <?php
        $numberposts = 10;
        // Category_id is the event category id
        $category_array = array(5);
    ?>

	<div id="content" role="main">
        <h3>Recent events</h3>

        <?php
			$post_id_array = _get_post_ids_by_event_time($category_array, 10);	
        ?>
        
        <ul>
            <?php foreach($post_id_array as $post_id => $event_time): ?>
				<?php
					$post = get_post($post_id);
				?>
                <li>
                    <?php //echo get_post_meta($post_id, "event-time", true); ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        
	</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
