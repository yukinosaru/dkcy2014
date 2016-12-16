<?php get_header(); ?>

<div id=main>
<!-- Gets most recent post -->
<?php $args = array('posts_per_page'   => 1, 'offset' => 0 );
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
	<h2><?php the_time('F jS, Y') ?></h2>
	<?php
            global $more;
            $more = 1;       // Set to display all content, including text below more.
	    the_content();
            $more = 0;       // Set to show the cut line.
?>
	<p class="postmetadata"><?php the_tags('', ', ', '<br />'); ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
<?php endforeach; 
wp_reset_postdata();
?>
	
<!-- Gets remaining 9 most recent posts as snippets -->
<?php if (have_posts()) : ?>
	<?php $args = array('posts_per_page'   => 9, 'offset' => 1 );
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

	<div class=snippets id="post-<?php the_ID(); ?>">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<small><?php the_time('F jS, Y') ?></small>

		<div class="entry">
			<?php the_content('More &raquo;'); ?>
		</div>

		<p class="postmetadata"><small><?php the_tags('', ', ', '<br />'); ?></small>  <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
	</div>
<?php endforeach; 
wp_reset_postdata();
endif;
?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

</body>
</html>