
<?php get_header(); ?>
	<div class="mod-pageContent">
		<?php if(is_archive()):?>
			<div class="page-title">
				<div class="page-title-wrapper row">
					<div class="entry-info large-12 columns">
							<h1 class="page-title"><?php sonoichi_archive_title(); ?></h1>
							<h3><?php echo category_description(); ?></h3>	
					</div> 
				</div>
			</div>	
		<?php endif; ?>		
		<div class="mod-pageContent-inner row">
			<div class="mod-pageContent-wrapper">   
				<div class="mod-pageContent-primary large-9 columns">
					<div class="mod-pageContent-primary-inner">
						<div id="content" role="main">
						<?php if ( have_posts() ) : ?>
							<?php /* The loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>
													<?php get_template_part( 'content', get_post_format() ); ?>
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
