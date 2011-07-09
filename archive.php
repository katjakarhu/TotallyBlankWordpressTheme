<?php get_header(); ?>


<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
	
		<article>

			<aside>
				<?php 	
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail();
				} ?>
			</aside>


			<a href="<?php the_permalink() ?>">
			<?php the_title(); ?>
			</a>

			<?php echo get_the_date( ); ?> <!-- Date published -->
			<?php the_time(); ?>  <!-- Time published -->
			<?php  the_author(); ?><br /> <!-- Author of the post -->

			<?php the_excerpt(); ?>
		
		</article>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
