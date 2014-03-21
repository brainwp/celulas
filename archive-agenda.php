<?php
// Arquivo da Agenda
get_header(); ?>

<div id="container">
	<div id="content" role="main">
			<div id="resumo">	
				<h1 class="opificio"><a class="category-agenda" href="<?php echo home_url( '/agenda'); ?>">AGENDA</a></h1>
			</div><!-- #resumo -->
                      
				<div id="agenda-geral">	

                    <!-- Inicio Loop Agenda --> 
                            
                    <?php
                        $args = array(
                            'post_type' => 'agenda',
                            'posts_per_page' => 20, // Quantidade de Eventos a exibir
                            "meta_key" => "agenda-event-date", // Campo da Data do Evento
                            "orderby" => "meta_value", // This stays as 'meta_value' or 'meta_value_num' (str sorting or numeric sorting)
                            "order" => "DESC",
                            );
                        
                        $loop_agenda = new WP_Query( $args );
                        while ( $loop_agenda->have_posts() ) : $loop_agenda->the_post();
                        
                        global $post;
                            // Pega os dados e salva em variáveis
                            $ag_data = get_post_meta($post->ID,'agenda-event-date',TRUE);
                            $ag_inicio = get_post_meta($post->ID,'agenda_horario_inic',TRUE);
                            $ag_termino = get_post_meta($post->ID,'agenda_horario_fim',TRUE);
                            $ag_endereco = get_post_meta($post->ID,'agenda_endereco',TRUE);
                            $ag_bairro = get_post_meta($post->ID,'agenda_bairro',TRUE);
                            $ag_cidade = get_post_meta($post->ID,'agenda_cidade',TRUE);
                            $ag_estado = get_post_meta($post->ID,'agenda_estado',TRUE);
                    ?>
                    
                    <?php
                    // Seta a data atual - 1 dia
                    $datahoje = date('Y/m/d');
                    $dataexpira = strtotime( $datahoje );
                    
                    // Transforma a $ag_data em tempo
                    $ag_data_time = strtotime( $ag_data );
                    
                    // Condição: Se a data do evento for igual (HOJE) que a data de expiração, exibe!
                    if ( $ag_data_time == $dataexpira ) { ?>
                    
                                    <div class="evento-agenda evento-hoje">
									Esse evento acontece hoje
                                        <div class="data-evento-agenda">
                                            <a href="<?php
                                            the_permalink() ?>">
                                            <div id="data-loop-archive" class="opificio">
                                                <?php
                                                $data_invertida = $ag_data;
                                                $data_explode = explode("/", $data_invertida);
                                                ?>
                                                
                                                <?php echo
                                                $data_explode[2]
                                                . "/" .
                                                $data_explode[1]
                                                . "/" .
                                                $data_explode[0];
                                                ?>
                                            </div>
                                            
                                            <div id="titulo-evento-loop-archive" class="opificio">
                                            <?php the_title(); ?>
                                            </div>
                                            </a>
                                            <div id="infos-agenda"> 
                                            <p><span class="descricao-agenda-loop opificio">Hor&aacute;rio:</span> das <?php echo $ag_inicio; ?> &agrave;s <?php echo $ag_termino; ?></p>
                                            <p><span class="descricao-agenda-loop opificio">Endere&ccedil;o:</span> <?php echo $ag_endereco; ?> - <?php echo $ag_bairro; ?></p>
                                            <p><span class="descricao-agenda-loop opificio">Cidade/UF:</span> <?php echo $ag_cidade; ?> / <?php echo $ag_estado; ?></p>
                                            </div>
                    
                                        </div><!-- .data-evento-agenda -->	
                                    </div><!-- #evento-agenda -->
                    
                                <hr />
                    <?php }
                    
					// Condição: Se a data do evento for maior que a data de expiração, exibe normalmente!
                    if ( $ag_data_time > $dataexpira ) { ?>
                    
								<div class="evento-agenda">
                                Esse futuro
                                        <div class="data-evento-agenda">
                                            <a href="<?php
                                            the_permalink() ?>">
                                            <div id="data-loop-archive" class="opificio">
                                                <?php
                                                $data_invertida = $ag_data;
                                                $data_explode = explode("/", $data_invertida);
                                                ?>
                                                
                                                <?php echo
                                                $data_explode[2]
                                                . "/" .
                                                $data_explode[1]
                                                . "/" .
                                                $data_explode[0];
                                                ?>
                                            </div>
                                            
                                            <div id="titulo-evento-loop-archive" class="opificio">
                                            <?php the_title(); ?>
                                            </div>
                                            </a>
                                            <div id="infos-agenda"> 
                                            <p><span class="descricao-agenda-loop opificio">Hor&aacute;rio:</span> das <?php echo $ag_inicio; ?> &agrave;s <?php echo $ag_termino; ?></p>
                                            <p><span class="descricao-agenda-loop opificio">Endere&ccedil;o:</span> <?php echo $ag_endereco; ?> - <?php echo $ag_bairro; ?></p>
                                            <p><span class="descricao-agenda-loop opificio">Cidade/UF:</span> <?php echo $ag_cidade; ?> / <?php echo $ag_estado; ?></p>
                                            </div>
                    
                                        </div><!-- .data-evento-agenda -->	
                                    </div><!-- #evento-agenda -->
                    
                                <hr />
                    
                    
                    <?php } 
                     // Condição: Se a data do evento for menor que a data de expiração, exibe! Evento Passado
                    if ( $ag_data_time < $dataexpira ) { ?>
                    Esse evento passou
                                    <div class="evento-agenda evento-passado">
                                        <div class="data-evento-agenda">
                                            <a href="<?php
                                            the_permalink() ?>">
                                            <div id="data-loop-archive" class="opificio">
                                                <?php
                                                $data_invertida = $ag_data;
                                                $data_explode = explode("/", $data_invertida);
                                                ?>
                                                
                                                <?php echo
                                                $data_explode[2]
                                                . "/" .
                                                $data_explode[1]
                                                . "/" .
                                                $data_explode[0];
                                                ?>
                                            </div>
                                            
                                            <div id="titulo-evento-loop-archive" class="opificio">
                                            <?php the_title(); ?>
                                            </div>
                                            </a>
                                            <div id="infos-agenda"> 
                                            <p><span class="descricao-agenda-loop opificio">Hor&aacute;rio:</span> das <?php echo $ag_inicio; ?> &agrave;s <?php echo $ag_termino; ?></p>
                                            <p><span class="descricao-agenda-loop opificio">Endere&ccedil;o:</span> <?php echo $ag_endereco; ?> - <?php echo $ag_bairro; ?></p>
                                            <p><span class="descricao-agenda-loop opificio">Cidade/UF:</span> <?php echo $ag_cidade; ?> / <?php echo $ag_estado; ?></p>
                                            </div>
                    
                                        </div><!-- .data-evento-agenda -->	
                                    </div><!-- #evento-agenda -->
                    
                                <hr />
                    <?php } ?>
                                    <?php endwhile; ?>
                                <!-- Fim Loop -->
                    
                           
                            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
                            <?php /* Display navigation to next/previous pages when applicable */ ?>
                            <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                                            <div id="nav-below-big" class="navigation">
                                                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
                                                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
                                            </div><!-- #nav-below -->
                            <?php endif; ?>
                            </div>
	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>

<?php
echo $data_teste;
function expirationdate_delete_expired_posts() {
    global $wpdb;
    $result = $wpdb->get_results('select post_id, meta_value from ' . $wpdb->postmeta . ' as postmeta, '.$wpdb->posts.' as posts where postmeta.post_id = posts.ID AND posts.post_status = "publish" AND postmeta.meta_key = "agenda-event-date" AND postmeta.meta_value <= "' . mktime() . '"'); }
?>
