<?php
/*
	=================================================
	HTML5 Blank Slate - Default Page Template
	Author: Eric Fernandez - www.efdezigns.com
	=================================================
*/
get_header(); ?>

	<div id="content" role="main">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article class="post" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
		
		<?php endwhile; endif; ?>
		
	</div><!-- end content -->
	
	<?php // get_sidebar(); ?>
	
<?php get_footer(); ?>