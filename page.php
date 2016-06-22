<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */


if(
	isset($post->post_title)
	&& $post->post_title == "Home"
){
	$has_sidebar = true;

} else {
	$has_sidebar = false;
};

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main<?php if($has_sidebar){ echo ' left-col'; }else{ echo ' full-width'; } ?>" role="main">


			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if($has_sidebar) {
	get_sidebar();
}
get_footer();
