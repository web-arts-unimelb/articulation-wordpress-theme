<?php
/**
 * Template name: page_list_entity_events.php
 */
?>

<?php get_header(); ?>

<div id="container">

    <?php 
        $this_page_id = get_query_var("page_id"); 
        $is_all_events = $_GET["is_all_events"];
        $current_url = get_permalink($this_page_id);
        
        $school_name = __translate_page_id_to_entity_name($this_page_id);
        $category_id = __translate_entity_name_to_category_id($school_name);
        $category_name = get_cat_name($category_id);
    ?>

    <?php if(!empty($this_page_id) && empty($is_all_events)): ?>
        <div id="content" role="main">
            <?php
				$post_id_array = _get_post_ids_by_event_time(array($category_id), 10);
            ?>
        
			<?php echo _display_entity_banner($category_id); ?>	
            <h3>Recent events for <?php echo "\"". $category_name. "\"" ?></h3>
			<ul>
				<?php foreach($post_id_array as $post_id => $event_time): ?>
					<?php
						$post = get_post($post_id);
					?>
					<li>
						<?php //echo get_post_meta($post_id, "event-time", true). " - "; ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
        
            <?php $current_url = $current_url. "&is_all_events=true"; ?>
            <p>
                <a href="<?php echo $current_url ?>">More events...</a>
            </p>
        </div><!-- end content -->
    <?php else: ?>
	    <div id="content" role="main">
			<?php echo _display_entity_banner($category_id); ?>

            <?php
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

                    <h3><?php echo $this_year. " - ". $category_name ?></h3>
                    <ul><!-- start ul -->
                <?php endif; ?>
                
                <li>
					<?php //echo get_post_meta($post_id, "event-time", true). " - "; ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
                
                <?php $prev_year = $this_year; ?> 
                
            <?php endforeach; ?>        
            
            </ul><!-- close ul -->
	    </div><!-- #content -->
	<?php endif; ?>
	
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
