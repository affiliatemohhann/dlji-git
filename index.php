<?php
/**
 * Main fallback template.
 *
 * @package Dealji
 */

declare(strict_types=1);

if (! defined('ABSPATH')) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
	<?php if (have_posts()) : ?>
		<?php
		while (have_posts()) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>
	<?php else : ?>
		<section class="no-results not-found">
			<h1><?php esc_html_e('Nothing found', 'dealji'); ?></h1>
			<p><?php esc_html_e('No content is available yet.', 'dealji'); ?></p>
		</section>
	<?php endif; ?>
</main>

<?php
get_footer();
