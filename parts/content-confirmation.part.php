<?php
// the query
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-189" class="post-189 page type-page status-publish hentry">
		<div class="entry-content">
			<?php  the_content(); ?>
		</div>
	</article>
    <!-- end of the loop -->
	<?php endwhile; ?>
	<!-- pagination here -->
	<?php wp_reset_postdata(); ?>
<?php else : ?>
<?php endif; ?>