<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="post-header">
				<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permalänk till <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				
				<div class="post-meta">
					<small>Skrivet den <?php the_time('j F, Y') ?> av <?php the_author_posts_link() ?></small>
				</div><!-- .post-meta -->
			</header><!-- .post-header -->

		<?php if ( is_archive() || is_search() ) { // Visa bara ett utdrag på arkiv- och sök-sidorna ?>
			
			<div class="post-utdrag">
				<?php the_excerpt( __( 'Läs mer →' ) ); ?>
			</div><!-- .post-utdrag -->

		<?php } else { // Visa hela the_content om det INTE är en arkiv- eller sök-sida ?>
			
			<div class="post-content">
				<?php the_content( __( 'Läs mer →' ) ); ?>
				<?php wp_link_pages(); ?>
			</div><!-- .post-content -->

		<?php } // Slut på if ?>

			<footer class="post-meta">
				<small>Sorterat under <?php the_category(', '); ?> <?php the_tags('med etiketterna: ', ', '); ?> med <?php comments_popup_link( __( '0 kommentarer' ), __( '1 kommentar' ), __( '% kommentarer' ) ); ?></small>
				<?php edit_post_link( __( 'Redigera det här inlägget' ), ' | ' ); ?>
			</footer><!-- ."post-meta -->

		</article>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<nav id="nav-nedan">
		<?php 
			/**
			 * Om WP-PageNavi finns, använd den. Annars
			 * vanliga länkar.
			 * 
			 * http://wordpress.org/extend/plugins/wp-pagenavi/
			 */
		if ( function_exists( 'wp_pagenavi' ) ) { 
			wp_pagenavi(); 
		} else { ?>
			<div class="alignleft">
				<?php next_posts_link(__('&laquo; Äldre inlägg')); ?>
			</div>
			<div class="alignright">
				<?php previous_posts_link(__('Nyare inlägg &raquo;')); ?>
			</div>
		<?php } ?>
	</nav><!-- #nav-nedan -->
	
</div><!-- #main -->

<?php get_footer(); ?>