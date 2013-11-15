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
                <?php
    $parceiros = "";
    $parceiros = get_page_by_title( 'Parceiros' );
    $attachment_page = get_attachment_link($parceiros->ID); ?>
			<p>Aqui entra slider de parceiros </p>
             <div id="carousel_wrap">
						<a class="prev" id="prev2" href="#"><span></span></a>
                        <a class="next" id="next2" href="#"><span></span></a>
                        <ul id="carousel">
                            <?php
                        $args = array(
                                'post_type' => 'attachment',
                                'numberposts' => -1,
                                'post_status' => null,
                                'post_parent' => $parceiros->ID,
                                'orderby' => 'rand'
                                );
                            
                            $anexos = get_posts ( $args );
                            
                            if ( $anexos ) {
                                foreach ( $anexos as $anexo ) { ?>
                                <?php 
                                    $attachment_id = $anexo->ID;
                                    $image_attributes = wp_get_attachment_image_src( $attachment_id, 'thumb' );
                                ?>
                            <li>                     
                            <img class="cada-slides" src="<?php echo $image_attributes[0]; ?>" alt="<?php echo apply_filters('the_title', $anexo->post_title); ?>">
                            </li>
                            <?php } } ?>
                        </ul>
						
                        <div class="clearfix"></div>
                
				</div><!-- #carousel_wrap -->
			</div>	
		</div><!-- direita-footer-->
	
		<div class="site-info">
			<?php do_action( 'celulas_theme_credits' ); ?>
			<?php echo stripslashes (get_option('mo_footer_end')); ?> | <?php echo stripslashes (get_option('mo_footer_mail')); ?> | 
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Desenvolvido com %s', 'celulas-theme' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Tema %1$s por %2$s.', 'celulas-theme' ), 'Celulas Theme', '<a href="http://www.brasa.art.br" rel="designer">Brasa</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>