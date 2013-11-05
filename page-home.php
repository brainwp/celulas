<?php

/* 
Template Name: Home
*/

get_header(); ?>


	<div class="slider-home"></div>
	<div class="mapa-home"></div>
	
	<div class="conteudo-home">
		
		<div class="superior-home">
			<div class="agenda-home"></div>
			<div class="page-destaque-home"></div>
			<div class="banco-celulas"></div>
		</div><!-- .superior-home -->
		
		<div class="inferior-home">
			
			<div class="cada-post">
				<div class="cada-post-thumb"></div>
				<div class="cada-post-content"></div>
				<div class="cada-post-meta"></div>
			</div><!-- .cada-post-home -->
			
		</div><!-- .inferior-home -->	
		
	</div><!-- .conteudo-home -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
