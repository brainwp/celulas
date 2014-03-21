<?php

get_header(); ?>
		<div id="container">
			<div id="content" role="main">
			<h1 class="opificio"><a class="category-agenda" href="<?php echo home_url( '/agenda'); ?>">AGENDA</a></h1>
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

			</div><!-- #content -->
		</div><!-- #container -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
