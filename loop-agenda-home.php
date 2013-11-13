<!-- Loop do CPT Agenda para Sidebar's-->

<div id="agenda-geral">
					<?php 
                /* Pega a página selecionada para o box */
				$qtd_eventos = get_option ('mo_qtd_eventos');
				?>			
				<!-- Inicio Loop -->
<?php $dias = array(); ?>				
				<?php
					
					$qtd_eventos = (get_option('mo_qtd_eventos'));
					$d = date("Y-m-d");
					$args = array(
						'post_type'             => 'eventos',
						'meta_key'              => 'agenda-event-date',
						'orderby'               => 'meta_value',
						'order'                     => 'ASC',
						'meta_query'            => array(
							array(
								'key' => 'agenda-event-date',
								'value' => $d,
								'type' => 'date',
								'compare' => '>'
							)
						)
);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					
					global $post;
						//Pega a data escolhida no admin e grava em $ag_data, $ag_inicio...
						$ag_data = get_post_meta($post->ID,'agenda-event-date',TRUE);
						
						// Seta a data atual - 1 dia
						$datahoje = date('Y/m/d');
						$dataexpira = strtotime( $datahoje );
						
						// Transforma a $ag_data em tempo
						$ag_data_time = strtotime( $ag_data );
				?>
				
					
	<?php
	// Condição: Se a data do evento for maior ou igual que a data de expiração, exibe normalmente!
    if ( $ag_data_time >= $dataexpira ) { ?>

   	<div class="evento-agenda">
	<a href="<?php the_permalink() ?>">
       	<div class="data-evento-agenda">
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
	</a>	
		
        <div class="titulo-evento-agenda">
           	<?php the_title(); ?>
				<div id="leia-mais-agenda">
				<a href="<?php the_permalink() ?>">Leia mais</a>
				</div>
		</div><!-- .titulo-evento-agenda -->
            
	</div><!-- #evento-agenda -->
	<?php } ?>

	<?php endwhile; ?>
	<!-- Loop -->

            
</div><!-- #agenda-geral -->