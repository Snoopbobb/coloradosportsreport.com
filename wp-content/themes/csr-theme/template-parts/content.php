<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CSR-Theme
 */

?>

<?php 
	if ( has_post_thumbnail() ) {
?>
		<article class="lead-story">
			<a href="<?php esc_url( get_the_guid() ) ?>" rel="bookmark" target="_blank"><?php csr_theme_post_thumbnail(); ?></a>
			<div>
<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_the_guid() ) . '" rel="bookmark" target="_blank">', '</a></h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_the_guid() ) . '" rel="bookmark" target="_blank">', '</a></h2>' );
				endif;
				csr_theme_posted_on();
				the_excerpt();
?>				
				<a class="read-link" href="<?php the_guid() ?>" rel="bookmark" target="_blank">Read More</a>
				<?php 
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'csr-theme' ),
							'after'  => '</div>',
						)
					);
				?>
			</div>
			<footer class="entry-footer">
				<?php csr_theme_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</article>
<?php 
	} else {
?>	
<article class="support-story" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_the_guid() ) . '" rel="bookmark" target="_blank">', '</a></h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_the_guid() ) . '" rel="bookmark" target="_blank">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				csr_theme_posted_on();
				// csr_theme_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<a href="<?php esc_url( get_the_guid() ) ?>" rel="bookmark" target="_blank"><?php csr_theme_post_thumbnail(); ?></a>

	<div class="entry-content">
		<?php
		the_excerpt();
		// the_content(
		// 	sprintf(
		// 		wp_kses(
		// 			/* translators: %s: Name of current post. Only visible to screen readers */
		// 			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'csr-theme' ),
		// 			array(
		// 				'span' => array(
		// 					'class' => array(),
		// 				),
		// 			)
		// 		),
		// 		wp_kses_post( get_the_title() )
		// 	)
		// );

		?>
		<a class="read-link" href="<?php the_guid() ?>" rel="bookmark" target="_blank">Read More</a>

		<?php 
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'csr-theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php csr_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php
	}
?>
