<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" class="single">
			<div id="agenda-geral">	
						
						<div class="data-evento-agenda-single">
							<?php 	global $post;
						//Pega a data escolhida no admin e grava em $ag_data, $ag_inicio...
						$ag_data = get_post_meta($post->ID,'agenda-event-date',TRUE);
							?>
								<?php
								$data_invertida = $ag_data;
								/* Quebra a Data em 3 */
								$data_explode = explode("/", $data_invertida);
								$mes = $data_explode[1];
    
								switch ($mes){
									case 1: $mes="Jan"; break;
									case 2: $mes="Fev"; break;
									case 3: $mes="Mar"; break;
									case 4: $mes="Abr"; break;
									case 5: $mes="Mai"; break;
									case 6: $mes="Jun"; break;
									case 7: $mes="jul"; break;
									case 8: $mes="Ago"; break;
									case 9: $mes="Set"; break;
									case 10: $mes="Out"; break;
									case 11: $mes="Nov"; break;
									case 12: $mes="Dez"; break;
									default: $mes="Valor invalido"; 
								}
							
								?>
							<div id="mes-agenda"><?php echo $mes; ?></div>
							<div id="dia-agenda"><?php echo $data_explode[2]; ?></div>


						</div><!-- .data-evento-agenda -->
						
			</div><!-- #agenda-geral -->
			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'singleagenda' );
			?>
			</div><!-- #content -->
			<div id="single-voltar"><a class="query-agenda" href="<?php echo home_url( '/eventos' ); ?>"><h1 class="title-query">voltar para eventos</h1></a></div>
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
