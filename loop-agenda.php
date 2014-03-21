<!-- Loop do CPT Agenda para Sidebar's-->

<div id="agenda-geral">
	
    <!-- Loop -->   
   
<?php
	$args = array(
			'post_type' => 'agenda',
			'posts_per_page' => 5, /* Quantidade de Posts a exibir */
			'orderby' => 'meta_value',
			'order' => 'DESC', /* Ordem DESC > DECRESCENTE ou ASC > ACRESCENTE */
			'meta_query' => array(
						'relation' => 'OR',
				array(
						'key' => 'agenda-event-date',
					),
				 )
			);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
	
	global $post;
		//Pega a data escolhida no admin e grava em $ag_data
		$ag_data = get_post_meta($post->ID,'agenda-event-date',TRUE);
		$ag_cidade = get_post_meta($post->ID,'agenda_cidade',TRUE);
		$ag_estado = get_post_meta($post->ID,'agenda_estado',TRUE);
		
		//Explode $ag_data para $data[0],$data[1],$data[2]
		$data = explode(" / ", $ag_data);
		//Adiciona os valores as variáveis $dia, $mes, $ano
		$dia = $data[0];
		$mes = $data[1];
		$ano = $data[2];	
?>


   	<div class="evento-agenda">
	<a href="<?php the_permalink() ?>">
		<div id="data-agenda" class="opificio"><?php echo $ag_data; ?>
		</div>
			
		<div id="titulo-evento-agenda" class="opificio">
           	<?php the_title(); ?>
		</div><!-- .titulo-evento-agenda -->
        
        			
		<div id="cidade-evento-agenda" class="opificio">
				
		<?php echo $ag_cidade; ?><?php // echo $ag_estado; ?>
				
		</div>
	</a>	
		            
	</div><!-- #evento-agenda -->

<hr />

	<?php endwhile; ?>
	<!-- Loop -->

            
</div><!-- #agenda-geral -->