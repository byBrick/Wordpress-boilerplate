	<?php get_header(); ?>

	<!-- BEGIN #main -->
	<div id="main">

		<!-- BEGIN loop -->
		<?php while ( have_posts() ) : the_post(); ?>
		
		<!-- BEGIN article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<!-- BEGIN article header -->
    		<header class="post-header">
    			
    			<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permalänk till <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
    			
    			<!-- BEGIN article post-meta -->
    			<div class="post-meta">
    			
    				<small>Skrivet den <?php the_time('j F, Y') ?> av <?php the_author_posts_link() ?></small>
    			
    			<!-- BEGIN article post-meta -->
    			</div>
    		
    		<!-- END article header -->
    		</header>
    
    		<?php if ( is_archive() || is_search() ) : // Visa bara ett utdrag på arkiv- och sök-sidorna ?>
    		
    		<!-- BEGIN the_excerpt -->
    		<div class="post-utdrag">
    		
    			<?php the_excerpt( __( 'Läs mer →' ) ); ?>
    		
    		<!-- BEGIN the_excerpt -->
    		</div>
    		
    		<?php else : // Visa hela the_content om det INTE är en arkiv- eller sök-sida ?>
    		
    		<!-- BEGIN the_content -->
    		<div class="post-content">
    		
    			<?php the_content( __( 'Läs mer →' ) ); ?>
    			<?php wp_link_pages(); ?>
    		
    		<!-- BEGIN the_content -->
    		</div>
    		
    		<?php endif; // Slut på if ?>
    
    		<!-- BEGIN article footer -->
    		<footer class="post-meta">
    		
    			<small>Sorterat under <?php the_category(', '); ?> <?php the_tags('med etiketterna: ', ', '); ?> med <?php comments_popup_link( __( '0 kommentarer' ), __( '1 kommentar' ), __( '% kommentarer' ) ); ?></small>
    			<?php edit_post_link( __( 'Redigera det här inlägget' ), ' | ' ); ?>
    		
    		<!-- END article footer -->
    		</footer>
    	
    	<!-- END article -->
    	</article>
		
		<?php comments_template(); ?>
		
    	<!-- END loop -->		
		<?php endwhile; ?>
			
		<!-- START nav-nedan -->
		<nav id="nav-nedan">
		
    		<?php wp_pagenavi(); // Plugin URL: http://wordpress.org/extend/plugins/wp-pagenavi/ ?>
    	
    	<!-- END nav-nedan -->
    	</nav>
    	    	
	<!-- END #main -->
	</div>

	<?php get_footer(); ?>