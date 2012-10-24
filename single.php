<?php
/*
	=================================================
	HTML5 Blank Slate - Default Single Post Template
	=================================================
*/
get_header(); ?>

	<div class="content" role="main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<article <?php post_class( 'group' ); ?> role="article">
			<header>
				<h1><?php the_title(); ?></h1>
				<time datetime="<?php the_time( 'Y-m-d' ) ?>" pubdate><?php the_time( 'F j, Y' ) ?></time>
			</header>

			<?php the_content(); ?>
			
			<section>
				<?php comment_form(); ?>
			</section>
		</article>
		
		<?php endwhile; endif; ?>
		
	</div><!-- end content -->
	
	<?php // get_sidebar(); ?>

<?php get_footer(); ?>