<?php
/**
 * Celulas Theme functions and definitions
 *
 * @package Celulas Theme
 */
 
 //Adiciona o CustomPostType Agenda
require_once (get_stylesheet_directory() . '/requires-agenda.php');

//Adiciona as Minhas Opções
require_once (get_stylesheet_directory() . '/options/admin_options.php');


/**
* Adiciona um tamanho de imagem
*
*/
if ( function_exists( 'add_image_size' ) ) { 
        add_image_size( 'destaqueimg', 310, 150, true );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'celulas_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function celulas_theme_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Celulas Theme, use a find and replace
	 * to change 'celulas-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'celulas-theme', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */	
		add_action( 'init', 'register_my_menus' );
		 
		function register_my_menus() {
		register_nav_menus(
		array(
		'primary' => __( 'Primary Menu', 'celulas-theme' ),
		'rodape-menu-1' => __( 'Menu Rodape 1', 'celulas-theme' ),
		'rodape-menu-2' => __( 'Menu Rodape 2', 'celulas-theme' )
		)
		);
		}
	
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'celulas_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // celulas_theme_setup

add_action( 'after_setup_theme', 'celulas_theme_setup' );

/**
 * Register widgetized areas
 */
	register_sidebar( array(
		'name'          => __( 'Sidebar Home', 'celulas-theme' ),
		'description' => __( 'Sidebar Home', 'celulas-theme' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


/**
 * Enqueue scripts and styles
 */
function celulas_theme_scripts() {
	wp_enqueue_style( 'celulas-theme-style', get_stylesheet_uri() );
	// wp_enqueue_style( 'celulas-theme-style',  get_template_directory_uri() . '/twentyeleven.css', true );
	
	wp_enqueue_script( 'celulas-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'celulas-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'celulas-theme-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'celulas_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if ( ! function_exists( 'twentyeleven_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_theme_support('custom-header') in twentyeleven_setup().
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_admin_header_image() { ?>
	<div id="headimg">
		<?php
		$color = get_header_textcolor();
		$image = get_header_image();
		if ( $color && $color != 'blank' )
			$style = ' style="color:#' . $color . '"';
		else
			$style = ' style="display:none"';
		?>
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc" class="displaying-header-text"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // twentyeleven_admin_header_image


	// Add support for custom headers.
	$custom_header_support = array(
		// The default header text color.
		'default-text-color' => '000',
		// The height and width of our custom header.
		/**
		 * Filter the Twenty Eleven default header image width.
		 *
		 * @since Twenty Eleven 1.0
		 *
		 * @param int The default header image width in pixels. Default 985.
		 */
		'width' => apply_filters( 'twentyeleven_header_image_width', 985 ),
		/**
		 * Filter the Twenty Eleven default header image height.
		 *
		 * @since Twenty Eleven 1.0
		 *
		 * @param int The default header image height in pixels. Default 280.
		 */
		'height' => apply_filters( 'twentyeleven_header_image_height', 280 ),
		// Support flexible heights.
		'flex-height' => true,
		// Random image rotation by default.
		'random-default' => true,
		
		// Callback used to display the header preview in the admin.
		'admin-preview-callback' => 'twentyeleven_admin_header_image',
	);

	add_theme_support( 'custom-header', $custom_header_support );

	if ( ! function_exists( 'get_custom_header' ) ) {
		// This is all for compatibility with versions of WordPress prior to 3.4.
		define( 'HEADER_IMAGE', '' );
		define( 'HEADER_IMAGE_WIDTH', $custom_header_support['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $custom_header_support['height'] );
		add_custom_image_header( $custom_header_support['wp-head-callback'], $custom_header_support['admin-head-callback'], $custom_header_support['admin-preview-callback'] );
		add_custom_background();
	}


