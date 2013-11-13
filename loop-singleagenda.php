<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<?php 	global $post;
						//Pega a data escolhida no admin e grava em $ag_data, $ag_inicio...
						$ag_inicio = get_post_meta($post->ID,'agenda_horario_inic',TRUE);
						$ag_endereco = get_post_meta($post->ID,'agenda_endereco',TRUE);
							?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title-single-agenda"><?php the_title(); ?></h1>
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
					<div id="info-evento">
					<h1 class="negrito">Hor&aacute;rio:</h1>
					<p class="archive"><?php echo $ag_inicio; ?></p>
					<h1 class="negrito">Endere&ccedil;o:</h1>
					<p class="archive"><?php echo $ag_endereco; ?></p>
					</div>
				</div>
<?php endwhile; // end of the loop. ?>