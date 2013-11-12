<?php

/* 
Template Name: Home
*/

get_header(); ?>


	<div class="slider-home">
	<?php if(function_exists("insert_post_highlights")) insert_post_highlights(); ?>
	</div>
	<div class="mapa-home"></div>
	
	<div class="conteudo-home">
		
		<div class="superior-home">
			<div class="agenda-home">
					<?php 
					//Adiciona o Loop CPT Agenda
					get_template_part( 'loop-agenda-home');
					?>
			</div>
			<div class="page-destaque-home">
					<?php do_action( 'before_sidebar' ); ?>
					<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
					<?php endif; // end sidebar widget area ?>
			</div>
			<div class="banco-celulas">
					<?php do_action( 'before_sidebar' ); ?>
					<?php  if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
					<?php endif; // end sidebar widget area ?>
			</div>

		</div><!-- .superior-home -->
		
		<div class="inferior-home">
			
			<div class="cada-post">
				<div class="cada-post-thumb"></div>
				<div class="cada-post-content"></div>
				<div class="cada-post-meta"></div>
			</div><!-- .cada-post-home -->
			
		</div><!-- .inferior-home -->	
		
	</div><!-- .conteudo-home -->
<?php get_footer(); ?>