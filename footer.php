<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Celulas Theme
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="esquerda-footer">
					
					<!-- ----------------- Mapa DO SITE ----------------- -->
					<div class="coluna-sitemap-esquerda">
					<?php wp_nav_menu( array( 'theme_location' => 'rodape-menu-1' ) ); ?>
					</div>
					
					<div class="coluna-sitemap-direita">
					<?php wp_nav_menu( array( 'theme_location' => 'rodape-menu-2' ) ); ?>
					</div>

		</div><!-- esquerda-footer-->
		
		<div class="direita-footer">
			<div class="parceiros-footer">
			<p>Aqui entra slider de parceiros </p>
			</div>	
		</div><!-- direita-footer-->
	
		<div class="site-info">
			
				<p><?php echo stripslashes (get_option('mo_footer_end')); ?></p>
				<p><?php echo stripslashes (get_option('mo_footer_mail')); ?></p>
			
			<?php do_action( 'celulas_theme_credits' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'celulas-theme' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'celulas-theme' ), 'Celulas Theme', '<a href="http://www.brasa.art.br" rel="designer">Brasa Team</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>