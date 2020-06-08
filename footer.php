<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="wrapper-footer">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row">
            <div class="col-md-12">
                <footer class="site-footer" id="colophon">
                    <div class="site-info">
						<?php
						$posts = get_posts( [
							'post_type' => 'wp_block',
							'title'     => 'footer'
						] );
						if ( ! empty( $posts ) ) {
							apply_filters( 'the_content', $posts[0]->post_content );
						}
						?>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

