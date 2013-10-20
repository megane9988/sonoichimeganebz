<?php get_header(); ?>
	<div class="mod-pageContent">
		<?php if ( have_posts() ) : ?>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>		
			<div class="page-title">
				<div class="page-title-wrapper row">
					<div class="entry-info large-12 columns">
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<h3><?php	if( has_excerpt() ){the_excerpt();}	?></h3>	
					</div> 
				</div>
			</div>						
		<div class="mod-pageContent-inner row">
			<div class="mod-pageContent-wrapper"> 
				<div class="mod-pageContent-primary large-9 columns">
					<div class="mod-pageContent-primary-inner">
						<div id="content" role="main">
								<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
								<?php if ( is_search() ) : // Only display Excerpts for Search ?>
									<div class="entry-summary">
										<?php the_excerpt(); ?>
									</div><!-- .entry-summary -->
								<?php else : ?>
									<div class="entry-content">
										<?php the_content( __( '<span class="mod-readMore">Read more</span>', 'sonoichi' ) ); ?>
										<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sonoichi' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
									</div><!-- .entry-content -->
									<?php if ( ! is_page('contact') ) { ?>					
									<div class="page-contact">
										<h3>お問い合わせはこちらから</h3>
										<p>ごにょごした説明</p>	
										<a href="/contact" class="large radius expand button">お問い合わせを行う</a>
									</div>
									<?php } ?>
								<?php endif; ?>
								</article><!-- #post -->
								<?php endwhile; ?>
														<?php // if ( is_singular())  comments_template(); ?>
							<?php else : ?>
							<article id="post-0" class="post no-results not-found">
								<div class="entry-info">
									<header class="entry-header">
										<h1 class="entry-title"><?php _e( 'Under Construction', 'sonoichi' ); ?></h1>
									</header>
								</div>
								<div class="entry-content">
									<p><?php _e( 'Sorry, please wait momentarily.', 'sonoichi' ); ?></p>
								</div><!-- .entry-content -->
							</article>
							<?php endif; ?>
						</div><!-- #content -->
					</div>
				</div>
				<!--/mod-pageContent-primary-->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<!--/mod-pageContent-->
	<?php get_footer(); ?>
