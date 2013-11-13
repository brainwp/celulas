<?php

/* 
Template Name: Home
*/

get_header(); ?>


	<div class="slider-home">
	<?php if(function_exists("insert_post_highlights")) insert_post_highlights(); ?>
	</div>
	<div class="mapa-home">
<div class="fluid-wrapper">
<iframe src="http://mapa.wp-brasil.org" width="980" height="300"></iframe>
</div>
	</div>
	
	<div class="conteudo-home">
		
		<div class="superior-home">
			<div class="agenda-home">
					<a class="query-agenda" href="<?php echo home_url( '/eventos' ); ?>"><h3 class="title-query-link">Eventos</h3></a>	
					<?php 
					//Adiciona o Loop CPT Agenda
					get_template_part( 'loop-agenda-home');
					?>
			</div>
			
			<div class="page-destaque-home">
				<?php 
                /* Pega a página selecionada para o box */
				$box01 = get_option ('mo_box01');
				?>				

				<?php query_posts('pagename='.$box01.'&showposts=1'); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<a  class="query-agenda" href="<?php the_permalink(); ?>"><h3 class="title-query-link"><?php the_title(); ?></h3></a>
								<div class="thumb-destaque">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('destaqueimg'); ?></a>
								</div><!-- .thumb-destaque -->
					<?php the_excerpt(); ?>
					<a class="veja" href="<?php the_permalink(); ?>">Veja &gt;&gt;</a>
					<?php endwhile; endif; wp_reset_query(); ?>
			</div>
			
			<div class="banco-celulas-home">
					<?php do_action( 'before_sidebar' ); ?>
					<?php  if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
					<?php endif; // end sidebar widget area ?>
			</div>

		</div><!-- .superior-home -->
		
		<div class="inferior-home">
				<p>Aqui entra as Noticias de todas as Celulas</p>
			<div class="cada-post">
				<div class="cada-post-thumb"></div>
				<div class="cada-post-content"></div>
				<div class="cada-post-meta"></div>
			</div><!-- .cada-post-home -->
			
		</div><!-- .inferior-home -->	
		
	</div><!-- .conteudo-home -->
<?php get_footer(); ?>