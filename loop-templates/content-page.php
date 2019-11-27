<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">
    </header>

    <div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			[
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			]
		);
		?>

    </div><!-- .entry-content -->

    <footer class="entry-footer"></footer>

</article><!-- #post-## -->
