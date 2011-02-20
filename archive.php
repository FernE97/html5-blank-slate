<?php
/*
	=================================================
	HTML5 Blank Slate - Default Archives Template
	Author: Eric Fernandez - www.efdezigns.com
	=================================================
*/
get_header(); ?>

	<div id="content" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article class="post" id="post-<?php the_ID(); ?>">
			<header>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<time datetime="<?php the_time('Y-m-d') ?>" pubdate><?php the_time('F j, Y') ?></time>
			</header>
			<?php the_excerpt(); ?>
		</article>
		
		<div class="page-nav">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

		<?php endwhile; endif; ?>

	</div><!-- end content -->
	
	<?php // get_sidebar(); ?>

<?php get_footer(); ?>