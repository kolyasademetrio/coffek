<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
    $content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Twenty Fifteen 1.0
     */
    function twentyfifteen_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfifteen
         * If you're building a theme based on twentyfifteen, use a find and replace
         * to change 'twentyfifteen' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'twentyfifteen' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 825, 510, true );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu',      'twentyfifteen' ),
            'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ) );

        /*
         * Enable support for custom logo.
         *
         * @since Twenty Fifteen 1.5
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 248,
            'width'       => 248,
            'flex-height' => true,
        ) );

        $color_scheme  = twentyfifteen_get_color_scheme();
        $default_color = trim( $color_scheme[0], '#' );

        // Setup the WordPress core custom background feature.

        /**
         * Filter Twenty Fifteen custom-header support arguments.
         *
         * @since Twenty Fifteen 1.0
         *
         * @param array $args {
         *     An array of custom-header support arguments.
         *
         *     @type string $default-color     		Default color of the header.
         *     @type string $default-attachment     Default attachment of the header.
         * }
         */
        add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
            'default-color'      => $default_color,
            'default-attachment' => 'fixed',
        ) ) );

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );

        // Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Widget Area', 'twentyfifteen' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
    /**
     * Register Google fonts for Twenty Fifteen.
     *
     * @since Twenty Fifteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function twentyfifteen_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Sans, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
            $fonts[] = 'Noto Sans:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Serif, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
            $fonts[] = 'Noto Serif:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Inconsolata, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
            $fonts[] = 'Inconsolata:400,700';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

        if ( 'cyrillic' == $subset ) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ( 'greek' == $subset ) {
            $subsets .= ',greek,greek-ext';
        } elseif ( 'devanagari' == $subset ) {
            $subsets .= ',devanagari';
        } elseif ( 'vietnamese' == $subset ) {
            $subsets .= ',vietnamese';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

    // Add Genericons, used in the main stylesheet.
    wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

    // Load our main stylesheet.
    wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
    wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
    wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

    wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
    }

    wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
    wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
        'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
        'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
    ) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Fifteen 1.7
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function twentyfifteen_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'twentyfifteen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
            $urls[] = array(
                'href' => 'https://fonts.gstatic.com',
                'crossorigin',
            );
        } else {
            $urls[] = 'https://fonts.gstatic.com';
        }
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'twentyfifteen_resource_hints', 10, 2 );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
    if ( ! is_single() ) {
        return;
    }

    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    $css      = '';

    if ( is_attachment() && 'attachment' == $previous->post_type ) {
        return;
    }

    if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
        $prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
        $css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    if ( $next && has_post_thumbnail( $next->ID ) ) {
        $nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
        $css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
    if ( 'primary' == $args->theme_location && $item->description ) {
        $item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
    }

    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
    return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Fifteen 1.9
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyfifteen_widget_tag_cloud_args( $args ) {
    $args['largest']  = 22;
    $args['smallest'] = 8;
    $args['unit']     = 'pt';
    $args['format']   = 'list';

    return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyfifteen_widget_tag_cloud_args' );


/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';



/* =================================================================================================
====================================================================================================
========================================== my functions ============================================
====================================================================================================
==================================================================================================*/
/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function custom_scripts() {
    /* ==============================================================================================
    ================================= Подключение стилей ============================================
    ================================================================================================*/
    // Load our main stylesheet
    wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri(), array( 'bootstrap', 'flexslider', 'magnific-popup', 'fonts') );
    // Load bootstrap stylesheet
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('bootstrap');
    // Load flexslider stylesheet
    wp_register_style('slick-slider-css', get_template_directory_uri() . '/plugins/slick-slider/slick.css');
    wp_enqueue_style('slick-slider-css');
    // Load magnific-popup stylesheet
    wp_register_style('magnific-popup', get_template_directory_uri() . '/plugins/magnific-popup/magnific-popup.css');
    wp_enqueue_style('magnific-popup');
    if (  is_page_template('page-templates/error-template.php') || is_page_template('page-templates/thx-template.php') ) {
        wp_register_style('thx-error-style', get_template_directory_uri() . '/css/thx-error-style.css');
        wp_enqueue_style('thx-error-style');
    }
    // Load fonts stylesheet
    wp_register_style('fonts', get_template_directory_uri() . '/css/fonts.css');
    wp_enqueue_style('fonts');
    /* ==============================================================================================
    ============================ Подключение jQuery & javascript ====================================
    ================================================================================================*/
    //Отключение  jQuery по умолчанию и подключение своего скрипта
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/custom-js/jquery-1.12.3.min.js', NULL, NULL, true);
    wp_enqueue_script('jquery');
    wp_register_script('slick-slider', get_template_directory_uri() . '/plugins/slick-slider/slick.js', array('jquery'), NULL, true);
    wp_enqueue_script('slick-slider');
    wp_register_script('magnific-popup-js', get_template_directory_uri() . '/plugins/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), NULL, true);
    wp_enqueue_script('magnific-popup-js');
    wp_register_script('maskedinput-js', get_template_directory_uri() . '/plugins/maskedinput/jquery.maskedinput.min.js', array('jquery'), NULL, true);
    wp_enqueue_script('maskedinput-js');
    wp_register_script('custom-js', get_template_directory_uri() . '/js/custom-js/custom.js', array('jquery'), NULL, true);
    wp_enqueue_script('custom-js');
    wp_register_script('init-js', get_template_directory_uri() . '/js/custom-js/init.js', array('jquery'), NULL, true);
    wp_enqueue_script('init-js');
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );
/* ==============================================================================================
============================ Подключение скриптов и стилей End ==================================
================================================================================================*/



/* ==============================================================================================
================================== Отключение обновлений ========================================
================================================================================================*/
// отключаем обновление тем
remove_action( 'load-update-core.php', 'wp_update_themes' );
add_filter( 'pre_site_transient_update_themes', '__return_null' );
// отключаем авто обновления
add_filter( 'auto_update_theme', '__return_false' );
// спрячем имеющиеся уведомления
add_action('admin_menu','hide_admin_notices');
function hide_admin_notices() {
    remove_action( 'admin_notices', 'update_nag', 3 );
}
/* ==============================================================================================
================================ Отключение обновлений End ======================================
================================================================================================*/



/* ==============================================================================================
=============================== Плагин my_cfs_options_screens ===================================
================================================================================================*/
function my_cfs_options_screens( $screens ) {
    $screens[] = array(
        'name'            => 'options',
        'menu_title'      => __( 'Шапка и Подвал' ),
        'page_title'      => __( 'Шапка и Подвал' ),
        'menu_position'   => 10,
        'icon'            => 'dashicons-admin-generic', // optional, dashicons-admin-generic is the default
        'field_groups'    => array(
            'Шапка сайта',
            'Подвал сайта'
        ), // Field Group name(s) of CFS Field Group to use on this page (can also be post IDs)
    );
    return $screens;
}
//add_filter( 'cfs_options_screens', 'my_cfs_options_screens' );
/* вывод в шаблоне */
/* $var = cfs_get_option('options', 'field_name');
	первый параметр - $screens['name'] - ( массива $screens с ключем name ) */
/* ==============================================================================================
============================= Плагин my_cfs_options_screens End =================================
================================================================================================*/





/* ==============================================================================================
======================================= Создание виджета ========================================
================================================================================================*/
function my_widgets_init() {
    /* header_logo_sidebar */
    register_sidebar( array(
        'name' => __( 'Logo Sidebar', 'header_logo_sidebar' ),
        'id' => 'header_logo_sidebar',
    ) );

    /* header_phone_sidebar */
    register_sidebar( array(
        'name' => __( 'Phone Sidebar', 'header_phone_sidebar' ),
        'id' => 'header_phone_sidebar',
    ) );

    /* header_menu_sidebar */
    register_sidebar( array(
        'name' => __( 'Menu Sidebar', 'header_menu_sidebar' ),
        'id' => 'header_menu_sidebar',
    ) );

    /* header_auth_sidebar */
    register_sidebar( array(
        'name' => __( 'Auth Button text Sidebar', 'header_auth_sidebar' ),
        'id' => 'header_auth_sidebar',
    ) );

    /* header_menu_social_sidebar */
    register_sidebar( array(
        'name' => __( 'Menu Social Sidebar', 'header_menu_social_sidebar' ),
        'id' => 'header_menu_social_sidebar',
    ) );

    /* header_lang_switcher_sidebar */
    register_sidebar( array(
        'name' => __( 'Lang Switcher Sidebar', 'header_lang_switcher_sidebar' ),
        'id' => 'header_lang_switcher_sidebar',
    ) );

    /* header_try_free_sidebar */
    register_sidebar( array(
        'name' => __( 'Try Sidebar', 'header_try_free_sidebar' ),
        'id' => 'header_try_free_sidebar',
    ) );

    /* header_hamburger_sidebar */
    register_sidebar( array(
        'name' => __( 'Hamburger Sidebar', 'header_hamburger_sidebar' ),
        'id' => 'header_hamburger_sidebar',
    ) );
}
add_action( 'widgets_init', 'my_widgets_init' );





// Register and load the widget
function wpb_load_widget() {
    register_widget( 'header_logo_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );



// Creating the widget
class header_logo_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

            'header_widget',
            __('Виджет для лого шапки сайта', 'header_widget_domain'),

            array( 'description' => __( 'Виджет для лого шапки сайта', 'header_widget_domain' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        if ( ! empty( $title ) ) {
            echo '<div class="header__logoWrap">
						<a href="' . esc_url(home_url("/")) . '" class="header__logoLink">
							<img src="' . $title . '" alt="" class="header__logoImg">
						</a>
					</div>';
        }



// This is where you run the code and display the output
    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'wpb_widget_domain' );
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here
/* ==============================================================================================
========================================== Создание виджета End =================================
================================================================================================*/


/**
 * Widget API: WP_Widget_Custom_HTML class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.8.1
 */

/**
 * Core class used to implement a Custom HTML widget.
 *
 * @since 4.8.1
 *
 * @see WP_Widget
 */
class WP_Widget_Custom_HTML extends WP_Widget {

    /**
     * Whether or not the widget has been registered yet.
     *
     * @since 4.9.0
     * @var bool
     */
    protected $registered = false;

    /**
     * Default instance.
     *
     * @since 4.8.1
     * @var array
     */
    protected $default_instance = array(
        'title' => '',
        'content' => '',
    );

    /**
     * Sets up a new Custom HTML widget instance.
     *
     * @since 4.8.1
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'widget_custom_html',
            'description' => __( 'Arbitrary HTML code.' ),
            'customize_selective_refresh' => true,
        );
        $control_ops = array(
            'width' => 400,
            'height' => 350,
        );
        parent::__construct( 'custom_html', __( 'Custom HTML' ), $widget_ops, $control_ops );
    }

    /**
     * Add hooks for enqueueing assets when registering all widget instances of this widget class.
     *
     * @since 4.9.0
     *
     * @param integer $number Optional. The unique order number of this widget instance
     *                        compared to other instances of the same class. Default -1.
     */
    public function _register_one( $number = -1 ) {
        parent::_register_one( $number );
        if ( $this->registered ) {
            return;
        }
        $this->registered = true;

        wp_add_inline_script( 'custom-html-widgets', sprintf( 'wp.customHtmlWidgets.idBases.push( %s );', wp_json_encode( $this->id_base ) ) );

        // Note that the widgets component in the customizer will also do the 'admin_print_scripts-widgets.php' action in WP_Customize_Widgets::print_scripts().
        add_action( 'admin_print_scripts-widgets.php', array( $this, 'enqueue_admin_scripts' ) );

        // Note that the widgets component in the customizer will also do the 'admin_footer-widgets.php' action in WP_Customize_Widgets::print_footer_scripts().
        add_action( 'admin_footer-widgets.php', array( 'WP_Widget_Custom_HTML', 'render_control_template_scripts' ) );

        // Note this action is used to ensure the help text is added to the end.
        add_action( 'admin_head-widgets.php', array( 'WP_Widget_Custom_HTML', 'add_help_text' ) );
    }

    /**
     * Filter gallery shortcode attributes.
     *
     * Prevents all of a site's attachments from being shown in a gallery displayed on a
     * non-singular template where a $post context is not available.
     *
     * @since 4.9.0
     *
     * @param array $attrs Attributes.
     * @return array Attributes.
     */
    public function _filter_gallery_shortcode_attrs( $attrs ) {
        if ( ! is_singular() && empty( $attrs['id'] ) && empty( $attrs['include'] ) ) {
            $attrs['id'] = -1;
        }
        return $attrs;
    }

    /**
     * Outputs the content for the current Custom HTML widget instance.
     *
     * @since 4.8.1
     *
     * @global WP_Post $post
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Custom HTML widget instance.
     */
    public function widget( $args, $instance ) {
        global $post;

        // Override global $post so filters (and shortcodes) apply in a consistent context.
        $original_post = $post;
        if ( is_singular() ) {
            // Make sure post is always the queried object on singular queries (not from another sub-query that failed to clean up the global $post).
            $post = get_queried_object();
        } else {
            // Nullify the $post global during widget rendering to prevent shortcodes from running with the unexpected context on archive queries.
            $post = null;
        }

        // Prevent dumping out all attachments from the media library.
        add_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );

        $instance = array_merge( $this->default_instance, $instance );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

        // Prepare instance data that looks like a normal Text widget.
        $simulated_text_widget_instance = array_merge( $instance, array(
            'text' => isset( $instance['content'] ) ? $instance['content'] : '',
            'filter' => false, // Because wpautop is not applied.
            'visual' => false, // Because it wasn't created in TinyMCE.
        ) );
        unset( $simulated_text_widget_instance['content'] ); // Was moved to 'text' prop.

        /** This filter is documented in wp-includes/widgets/class-wp-widget-text.php */
        $content = apply_filters( 'widget_text', $instance['content'], $simulated_text_widget_instance, $this );

        /**
         * Filters the content of the Custom HTML widget.
         *
         * @since 4.8.1
         *
         * @param string                $content  The widget content.
         * @param array                 $instance Array of settings for the current widget.
         * @param WP_Widget_Custom_HTML $this     Current Custom HTML widget instance.
         */
        $content = apply_filters( 'widget_custom_html_content', $content, $instance, $this );

        // Restore post global.
        $post = $original_post;
        remove_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );

        // Inject the Text widget's container class name alongside this widget's class name for theme styling compatibility.
        $args['before_widget'] = preg_replace( '/(?<=\sclass=["\'])/', 'widget_text ', $args['before_widget'] );

//		echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
//		echo '<div class="textwidget custom-html-widget">'; // The textwidget class is for theme styling compatibility.
        echo trim($content);
//		echo '</div>';
//		echo $args['after_widget'];
    }

    /**
     * Handles updating settings for the current Custom HTML widget instance.
     *
     * @since 4.8.1
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Settings to save or bool false to cancel saving.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array_merge( $this->default_instance, $old_instance );
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        if ( current_user_can( 'unfiltered_html' ) ) {
            $instance['content'] = $new_instance['content'];
        } else {
            $instance['content'] = wp_kses_post( $new_instance['content'] );
        }
        return $instance;
    }

    /**
     * Loads the required scripts and styles for the widget control.
     *
     * @since 4.9.0
     */
    public function enqueue_admin_scripts() {
        $settings = wp_enqueue_code_editor( array(
            'type' => 'text/html',
            'codemirror' => array(
                'indentUnit' => 2,
                'tabSize' => 2,
            ),
        ) );

        wp_enqueue_script( 'custom-html-widgets' );
        if ( empty( $settings ) ) {
            $settings = array(
                'disabled' => true,
            );
        }
        wp_add_inline_script( 'custom-html-widgets', sprintf( 'wp.customHtmlWidgets.init( %s );', wp_json_encode( $settings ) ), 'after' );

        $l10n = array(
            'errorNotice' => array(
                /* translators: %d: error count */
                'singular' => _n( 'There is %d error which must be fixed before you can save.', 'There are %d errors which must be fixed before you can save.', 1 ),
                /* translators: %d: error count */
                'plural' => _n( 'There is %d error which must be fixed before you can save.', 'There are %d errors which must be fixed before you can save.', 2 ), // @todo This is lacking, as some languages have a dedicated dual form. For proper handling of plurals in JS, see #20491.
            ),
        );
        wp_add_inline_script( 'custom-html-widgets', sprintf( 'jQuery.extend( wp.customHtmlWidgets.l10n, %s );', wp_json_encode( $l10n ) ), 'after' );
    }

    /**
     * Outputs the Custom HTML widget settings form.
     *
     * @since 4.8.1
     * @since 4.9.0 The form contains only hidden sync inputs. For the control UI, see `WP_Widget_Custom_HTML::render_control_template_scripts()`.
     *
     * @see WP_Widget_Custom_HTML::render_control_template_scripts()
     * @param array $instance Current instance.
     * @returns void
     */
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, $this->default_instance );
        ?>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" class="title sync-input" type="hidden" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
        <textarea id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" class="content sync-input" hidden><?php echo esc_textarea( $instance['content'] ); ?></textarea>
        <?php
    }

    /**
     * Render form template scripts.
     *
     * @since 4.9.0
     */
    public static function render_control_template_scripts() {
        ?>
        <script type="text/html" id="tmpl-widget-custom-html-control-fields">
            <# var elementIdPrefix = 'el' + String( Math.random() ).replace( /\D/g, '' ) + '_' #>
                <p>
                    <label for="{{ elementIdPrefix }}title"><?php esc_html_e( 'Title:' ); ?></label>
                    <input id="{{ elementIdPrefix }}title" type="text" class="widefat title">
                </p>

                <p>
                    <label for="{{ elementIdPrefix }}content" id="{{ elementIdPrefix }}content-label"><?php esc_html_e( 'Content:' ); ?></label>
                    <textarea id="{{ elementIdPrefix }}content" class="widefat code content" rows="16" cols="20"></textarea>
                </p>

                <?php if ( ! current_user_can( 'unfiltered_html' ) ) : ?>
                <?php
                $probably_unsafe_html = array( 'script', 'iframe', 'form', 'input', 'style' );
                $allowed_html = wp_kses_allowed_html( 'post' );
                $disallowed_html = array_diff( $probably_unsafe_html, array_keys( $allowed_html ) );
                ?>
                <?php if ( ! empty( $disallowed_html ) ) : ?>
                <# if ( data.codeEditorDisabled ) { #>
                    <p>
                        <?php _e( 'Some HTML tags are not permitted, including:' ); ?>
                        <code><?php echo join( '</code>, <code>', $disallowed_html ); ?></code>
                    </p>
                    <# } #>
                        <?php endif; ?>
                        <?php endif; ?>

                        <div class="code-editor-error-container"></div>
        </script>
        <?php
    }

    /**
     * Add help text to widgets admin screen.
     *
     * @since 4.9.0
     */
    public static function add_help_text() {
        $screen = get_current_screen();

        $content = '<p>';
        $content .= __( 'Use the Custom HTML widget to add arbitrary HTML code to your widget areas.' );
        $content .= '</p>';

        if ( 'false' !== wp_get_current_user()->syntax_highlighting ) {
            $content .= '<p>';
            $content .= sprintf(
            /* translators: 1: link to user profile, 2: additional link attributes, 3: accessibility text */
                __( 'The edit field automatically highlights code syntax. You can disable this in your <a href="%1$s" %2$s>user profile%3$s</a> to work in plain text mode.' ),
                esc_url( get_edit_profile_url() ),
                'class="external-link" target="_blank"',
                sprintf( '<span class="screen-reader-text"> %s</span>',
                    /* translators: accessibility text */
                    __( '(opens in a new window)' )
                )
            );
            $content .= '</p>';

            $content .= '<p id="editor-keyboard-trap-help-1">' . __( 'When using a keyboard to navigate:' ) . '</p>';
            $content .= '<ul>';
            $content .= '<li id="editor-keyboard-trap-help-2">' . __( 'In the editing area, the Tab key enters a tab character.' ) . '</li>';
            $content .= '<li id="editor-keyboard-trap-help-3">' . __( 'To move away from this area, press the Esc key followed by the Tab key.' ) . '</li>';
            $content .= '<li id="editor-keyboard-trap-help-4">' . __( 'Screen reader users: when in forms mode, you may need to press the Esc key twice.' ) . '</li>';
            $content .= '</ul>';
        }

        $screen->add_help_tab( array(
            'id' => 'custom_html_widget',
            'title' => __( 'Custom HTML Widget' ),
            'content' => $content,
        ) );
    }
}


/**
 * Widget API: WP_Widget_Text class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Text widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Text extends WP_Widget {

    /**
     * Whether or not the widget has been registered yet.
     *
     * @since 4.8.1
     * @var bool
     */
    protected $registered = false;

    /**
     * Sets up a new Text widget instance.
     *
     * @since 2.8.0
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'widget_text',
            'description' => __( 'Arbitrary text.' ),
            'customize_selective_refresh' => true,
        );
        $control_ops = array(
            'width' => 400,
            'height' => 350,
        );
        parent::__construct( 'text', __( 'Text' ), $widget_ops, $control_ops );
    }

    /**
     * Add hooks for enqueueing assets when registering all widget instances of this widget class.
     *
     * @param integer $number Optional. The unique order number of this widget instance
     *                        compared to other instances of the same class. Default -1.
     */
    public function _register_one( $number = -1 ) {
        parent::_register_one( $number );
        if ( $this->registered ) {
            return;
        }
        $this->registered = true;

        wp_add_inline_script( 'text-widgets', sprintf( 'wp.textWidgets.idBases.push( %s );', wp_json_encode( $this->id_base ) ) );

        if ( $this->is_preview() ) {
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_preview_scripts' ) );
        }

        // Note that the widgets component in the customizer will also do the 'admin_print_scripts-widgets.php' action in WP_Customize_Widgets::print_scripts().
        add_action( 'admin_print_scripts-widgets.php', array( $this, 'enqueue_admin_scripts' ) );

        // Note that the widgets component in the customizer will also do the 'admin_footer-widgets.php' action in WP_Customize_Widgets::print_footer_scripts().
        add_action( 'admin_footer-widgets.php', array( 'WP_Widget_Text', 'render_control_template_scripts' ) );
    }

    /**
     * Determines whether a given instance is legacy and should bypass using TinyMCE.
     *
     * @since 4.8.1
     *
     * @param array $instance {
     *     Instance data.
     *
     *     @type string      $text   Content.
     *     @type bool|string $filter Whether autop or content filters should apply.
     *     @type bool        $legacy Whether widget is in legacy mode.
     * }
     * @return bool Whether Text widget instance contains legacy data.
     */
    public function is_legacy_instance( $instance ) {

        // Legacy mode when not in visual mode.
        if ( isset( $instance['visual'] ) ) {
            return ! $instance['visual'];
        }

        // Or, the widget has been added/updated in 4.8.0 then filter prop is 'content' and it is no longer legacy.
        if ( isset( $instance['filter'] ) && 'content' === $instance['filter'] ) {
            return false;
        }

        // If the text is empty, then nothing is preventing migration to TinyMCE.
        if ( empty( $instance['text'] ) ) {
            return false;
        }

        $wpautop = ! empty( $instance['filter'] );
        $has_line_breaks = ( false !== strpos( trim( $instance['text'] ), "\n" ) );

        // If auto-paragraphs are not enabled and there are line breaks, then ensure legacy mode.
        if ( ! $wpautop && $has_line_breaks ) {
            return true;
        }

        // If an HTML comment is present, assume legacy mode.
        if ( false !== strpos( $instance['text'], '<!--' ) ) {
            return true;
        }

        // In the rare case that DOMDocument is not available we cannot reliably sniff content and so we assume legacy.
        if ( ! class_exists( 'DOMDocument' ) ) {
            // @codeCoverageIgnoreStart
            return true;
            // @codeCoverageIgnoreEnd
        }

        $doc = new DOMDocument();
        @$doc->loadHTML( sprintf(
            '<!DOCTYPE html><html><head><meta charset="%s"></head><body>%s</body></html>',
            esc_attr( get_bloginfo( 'charset' ) ),
            $instance['text']
        ) );
        $body = $doc->getElementsByTagName( 'body' )->item( 0 );

        // See $allowedposttags.
        $safe_elements_attributes = array(
            'strong' => array(),
            'em' => array(),
            'b' => array(),
            'i' => array(),
            'u' => array(),
            's' => array(),
            'ul' => array(),
            'ol' => array(),
            'li' => array(),
            'hr' => array(),
            'abbr' => array(),
            'acronym' => array(),
            'code' => array(),
            'dfn' => array(),
            'a' => array(
                'href' => true,
            ),
            'img' => array(
                'src' => true,
                'alt' => true,
            ),
        );
        $safe_empty_elements = array( 'img', 'hr', 'iframe' );

        foreach ( $body->getElementsByTagName( '*' ) as $element ) {
            /** @var DOMElement $element */
            $tag_name = strtolower( $element->nodeName );

            // If the element is not safe, then the instance is legacy.
            if ( ! isset( $safe_elements_attributes[ $tag_name ] ) ) {
                return true;
            }

            // If the element is not safely empty and it has empty contents, then legacy mode.
            if ( ! in_array( $tag_name, $safe_empty_elements, true ) && '' === trim( $element->textContent ) ) {
                return true;
            }

            // If an attribute is not recognized as safe, then the instance is legacy.
            foreach ( $element->attributes as $attribute ) {
                /** @var DOMAttr $attribute */
                $attribute_name = strtolower( $attribute->nodeName );

                if ( ! isset( $safe_elements_attributes[ $tag_name ][ $attribute_name ] ) ) {
                    return true;
                }
            }
        }

        // Otherwise, the text contains no elements/attributes that TinyMCE could drop, and therefore the widget does not need legacy mode.
        return false;
    }

    /**
     * Filter gallery shortcode attributes.
     *
     * Prevents all of a site's attachments from being shown in a gallery displayed on a
     * non-singular template where a $post context is not available.
     *
     * @since 4.9.0
     *
     * @param array $attrs Attributes.
     * @return array Attributes.
     */
    public function _filter_gallery_shortcode_attrs( $attrs ) {
        if ( ! is_singular() && empty( $attrs['id'] ) && empty( $attrs['include'] ) ) {
            $attrs['id'] = -1;
        }
        return $attrs;
    }

    /**
     * Outputs the content for the current Text widget instance.
     *
     * @since 2.8.0
     *
     * @global WP_Post $post
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Text widget instance.
     */
    public function widget( $args, $instance ) {
        global $post;

        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
        $is_visual_text_widget = ( ! empty( $instance['visual'] ) && ! empty( $instance['filter'] ) );

        // In 4.8.0 only, visual Text widgets get filter=content, without visual prop; upgrade instance props just-in-time.
        if ( ! $is_visual_text_widget ) {
            $is_visual_text_widget = ( isset( $instance['filter'] ) && 'content' === $instance['filter'] );
        }
        if ( $is_visual_text_widget ) {
            $instance['filter'] = true;
            $instance['visual'] = true;
        }

        /*
         * Suspend legacy plugin-supplied do_shortcode() for 'widget_text' filter for the visual Text widget to prevent
         * shortcodes being processed twice. Now do_shortcode() is added to the 'widget_text_content' filter in core itself
         * and it applies after wpautop() to prevent corrupting HTML output added by the shortcode. When do_shortcode() is
         * added to 'widget_text_content' then do_shortcode() will be manually called when in legacy mode as well.
         */
        $widget_text_do_shortcode_priority = has_filter( 'widget_text', 'do_shortcode' );
        $should_suspend_legacy_shortcode_support = ( $is_visual_text_widget && false !== $widget_text_do_shortcode_priority );
        if ( $should_suspend_legacy_shortcode_support ) {
            remove_filter( 'widget_text', 'do_shortcode', $widget_text_do_shortcode_priority );
        }

        // Override global $post so filters (and shortcodes) apply in a consistent context.
        $original_post = $post;
        if ( is_singular() ) {
            // Make sure post is always the queried object on singular queries (not from another sub-query that failed to clean up the global $post).
            $post = get_queried_object();
        } else {
            // Nullify the $post global during widget rendering to prevent shortcodes from running with the unexpected context on archive queries.
            $post = null;
        }

        // Prevent dumping out all attachments from the media library.
        add_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );

        /**
         * Filters the content of the Text widget.
         *
         * @since 2.3.0
         * @since 4.4.0 Added the `$this` parameter.
         * @since 4.8.1 The `$this` param may now be a `WP_Widget_Custom_HTML` object in addition to a `WP_Widget_Text` object.
         *
         * @param string                               $text     The widget content.
         * @param array                                $instance Array of settings for the current widget.
         * @param WP_Widget_Text|WP_Widget_Custom_HTML $this     Current Text widget instance.
         */
        $text = apply_filters( 'widget_text', $text, $instance, $this );

        if ( $is_visual_text_widget ) {

            /**
             * Filters the content of the Text widget to apply changes expected from the visual (TinyMCE) editor.
             *
             * By default a subset of the_content filters are applied, including wpautop and wptexturize.
             *
             * @since 4.8.0
             *
             * @param string         $text     The widget content.
             * @param array          $instance Array of settings for the current widget.
             * @param WP_Widget_Text $this     Current Text widget instance.
             */
            $text = apply_filters( 'widget_text_content', $text, $instance, $this );
        } else {
            // Now in legacy mode, add paragraphs and line breaks when checkbox is checked.
            if ( ! empty( $instance['filter'] ) ) {
                $text = wpautop( $text );
            }

            /*
             * Manually do shortcodes on the content when the core-added filter is present. It is added by default
             * in core by adding do_shortcode() to the 'widget_text_content' filter to apply after wpautop().
             * Since the legacy Text widget runs wpautop() after 'widget_text' filters are applied, the widget in
             * legacy mode here manually applies do_shortcode() on the content unless the default
             * core filter for 'widget_text_content' has been removed, or if do_shortcode() has already
             * been applied via a plugin adding do_shortcode() to 'widget_text' filters.
             */
            if ( has_filter( 'widget_text_content', 'do_shortcode' ) && ! $widget_text_do_shortcode_priority ) {
                if ( ! empty( $instance['filter'] ) ) {
                    $text = shortcode_unautop( $text );
                }
                $text = do_shortcode( $text );
            }
        }

        // Restore post global.
        $post = $original_post;
        remove_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );

        // Undo suspension of legacy plugin-supplied shortcode handling.
        if ( $should_suspend_legacy_shortcode_support ) {
            add_filter( 'widget_text', 'do_shortcode', $widget_text_do_shortcode_priority );
        }

//        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $text = preg_replace_callback( '#<(video|iframe|object|embed)\s[^>]*>#i', array( $this, 'inject_video_max_width_style' ), $text );

        ?><?php echo trim(strip_tags($text)); ?>
        <?php
//        echo $args['after_widget'];
    }

    /**
     * Inject max-width and remove height for videos too constrained to fit inside sidebars on frontend.
     *
     * @since 4.9.0
     *
     * @see WP_Widget_Media_Video::inject_video_max_width_style()
     * @param array $matches Pattern matches from preg_replace_callback.
     * @return string HTML Output.
     */
    public function inject_video_max_width_style( $matches ) {
        $html = $matches[0];
        $html = preg_replace( '/\sheight="\d+"/', '', $html );
        $html = preg_replace( '/\swidth="\d+"/', '', $html );
        $html = preg_replace( '/(?<=width:)\s*\d+px(?=;?)/', '100%', $html );
        return $html;
    }

    /**
     * Handles updating settings for the current Text widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Settings to save or bool false to cancel saving.
     */
    public function update( $new_instance, $old_instance ) {
        $new_instance = wp_parse_args( $new_instance, array(
            'title' => '',
            'text' => '',
            'filter' => false, // For back-compat.
            'visual' => null, // Must be explicitly defined.
        ) );

        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        if ( current_user_can( 'unfiltered_html' ) ) {
            $instance['text'] = $new_instance['text'];
        } else {
            $instance['text'] = wp_kses_post( $new_instance['text'] );
        }

        $instance['filter'] = ! empty( $new_instance['filter'] );

        // Upgrade 4.8.0 format.
        if ( isset( $old_instance['filter'] ) && 'content' === $old_instance['filter'] ) {
            $instance['visual'] = true;
        }
        if ( 'content' === $new_instance['filter'] ) {
            $instance['visual'] = true;
        }

        if ( isset( $new_instance['visual'] ) ) {
            $instance['visual'] = ! empty( $new_instance['visual'] );
        }

        // Filter is always true in visual mode.
        if ( ! empty( $instance['visual'] ) ) {
            $instance['filter'] = true;
        }

        return $instance;
    }

    /**
     * Enqueue preview scripts.
     *
     * These scripts normally are enqueued just-in-time when a playlist shortcode is used.
     * However, in the customizer, a playlist shortcode may be used in a text widget and
     * dynamically added via selective refresh, so it is important to unconditionally enqueue them.
     *
     * @since 4.9.3
     */
    public function enqueue_preview_scripts() {
        require_once dirname( dirname( __FILE__ ) ) . '/media.php';

        wp_playlist_scripts( 'audio' );
        wp_playlist_scripts( 'video' );
    }

    /**
     * Loads the required scripts and styles for the widget control.
     *
     * @since 4.8.0
     */
    public function enqueue_admin_scripts() {
        wp_enqueue_editor();
        wp_enqueue_media();
        wp_enqueue_script( 'text-widgets' );
        wp_add_inline_script( 'text-widgets', 'wp.textWidgets.init();', 'after' );
    }

    /**
     * Outputs the Text widget settings form.
     *
     * @since 2.8.0
     * @since 4.8.0 Form only contains hidden inputs which are synced with JS template.
     * @since 4.8.1 Restored original form to be displayed when in legacy mode.
     * @see WP_Widget_Visual_Text::render_control_template_scripts()
     * @see _WP_Editors::editor()
     *
     * @param array $instance Current settings.
     * @return void
     */
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title' => '',
                'text' => '',
            )
        );
        ?>
        <?php if ( ! $this->is_legacy_instance( $instance ) ) : ?>
            <?php

            if ( user_can_richedit() ) {
                add_filter( 'the_editor_content', 'format_for_editor', 10, 2 );
                $default_editor = 'tinymce';
            } else {
                $default_editor = 'html';
            }

            /** This filter is documented in wp-includes/class-wp-editor.php */
            $text = apply_filters( 'the_editor_content', $instance['text'], $default_editor );

            // Reset filter addition.
            if ( user_can_richedit() ) {
                remove_filter( 'the_editor_content', 'format_for_editor' );
            }

            // Prevent premature closing of textarea in case format_for_editor() didn't apply or the_editor_content filter did a wrong thing.
            $escaped_text = preg_replace( '#</textarea#i', '&lt;/textarea', $text );

            ?>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" class="title sync-input" type="hidden" value="<?php echo esc_attr( $instance['title'] ); ?>">
            <textarea id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" class="text sync-input" hidden><?php echo $escaped_text; ?></textarea>
            <input id="<?php echo $this->get_field_id( 'filter' ); ?>" name="<?php echo $this->get_field_name( 'filter' ); ?>" class="filter sync-input" type="hidden" value="on">
            <input id="<?php echo $this->get_field_id( 'visual' ); ?>" name="<?php echo $this->get_field_name( 'visual' ); ?>" class="visual sync-input" type="hidden" value="on">
        <?php else : ?>
            <input id="<?php echo $this->get_field_id( 'visual' ); ?>" name="<?php echo $this->get_field_name( 'visual' ); ?>" class="visual" type="hidden" value="">
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
            </p>
            <div class="notice inline notice-info notice-alt">
                <?php if ( ! isset( $instance['visual'] ) ) : ?>
                    <p><?php _e( 'This widget may contain code that may work better in the &#8220;Custom HTML&#8221; widget. How about trying that widget instead?' ); ?></p>
                <?php else : ?>
                    <p><?php _e( 'This widget may have contained code that may work better in the &#8220;Custom HTML&#8221; widget. If you haven&#8217;t yet, how about trying that widget instead?' ); ?></p>
                <?php endif; ?>
            </div>
            <p>
                <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:' ); ?></label>
                <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea>
            </p>
            <p>
                <input id="<?php echo $this->get_field_id( 'filter' ); ?>" name="<?php echo $this->get_field_name( 'filter' ); ?>" type="checkbox"<?php checked( ! empty( $instance['filter'] ) ); ?> />&nbsp;<label for="<?php echo $this->get_field_id( 'filter' ); ?>"><?php _e( 'Automatically add paragraphs' ); ?></label>
            </p>
            <?php
        endif;
    }

    /**
     * Render form template scripts.
     *
     * @since 4.8.0
     * @since 4.9.0 The method is now static.
     */
    public static function render_control_template_scripts() {
        $dismissed_pointers = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
        ?>
        <script type="text/html" id="tmpl-widget-text-control-fields">
            <# var elementIdPrefix = 'el' + String( Math.random() ).replace( /\D/g, '' ) + '_' #>
                <p>
                    <label for="{{ elementIdPrefix }}title"><?php esc_html_e( 'Title:' ); ?></label>
                    <input id="{{ elementIdPrefix }}title" type="text" class="widefat title">
                </p>

                <?php if ( ! in_array( 'text_widget_custom_html', $dismissed_pointers, true ) ) : ?>
                    <div hidden class="wp-pointer custom-html-widget-pointer wp-pointer-top">
                        <div class="wp-pointer-content">
                            <h3><?php _e( 'New Custom HTML Widget' ); ?></h3>
                            <?php if ( is_customize_preview() ) : ?>
                                <p><?php _e( 'Did you know there is a &#8220;Custom HTML&#8221; widget now? You can find it by pressing the &#8220;<a class="add-widget" href="#">Add a Widget</a>&#8221; button and searching for &#8220;HTML&#8221;. Check it out to add some custom code to your site!' ); ?></p>
                            <?php else : ?>
                                <p><?php _e( 'Did you know there is a &#8220;Custom HTML&#8221; widget now? You can find it by scanning the list of available widgets on this screen. Check it out to add some custom code to your site!' ); ?></p>
                            <?php endif; ?>
                            <div class="wp-pointer-buttons">
                                <a class="close" href="#"><?php _e( 'Dismiss' ); ?></a>
                            </div>
                        </div>
                        <div class="wp-pointer-arrow">
                            <div class="wp-pointer-arrow-inner"></div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( ! in_array( 'text_widget_paste_html', $dismissed_pointers, true ) ) : ?>
                    <div hidden class="wp-pointer paste-html-pointer wp-pointer-top">
                        <div class="wp-pointer-content">
                            <h3><?php _e( 'Did you just paste HTML?' ); ?></h3>
                            <p><?php _e( 'Hey there, looks like you just pasted HTML into the &#8220;Visual&#8221; tab of the Text widget. You may want to paste your code into the &#8220;Text&#8221; tab instead. Alternately, try out the new &#8220;Custom HTML&#8221; widget!' ); ?></p>
                            <div class="wp-pointer-buttons">
                                <a class="close" href="#"><?php _e( 'Dismiss' ); ?></a>
                            </div>
                        </div>
                        <div class="wp-pointer-arrow">
                            <div class="wp-pointer-arrow-inner"></div>
                        </div>
                    </div>
                <?php endif; ?>

                <p>
                    <label for="{{ elementIdPrefix }}text" class="screen-reader-text"><?php esc_html_e( 'Content:' ); ?></label>
                    <textarea id="{{ elementIdPrefix }}text" class="widefat text wp-editor-area" style="height: 200px" rows="16" cols="20"></textarea>
                </p>
        </script>
        <?php
    }
}



/**
 * Widget API: WP_Nav_Menu_Widget class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement the Navigation Menu widget.
 *
 * @since 3.0.0
 *
 * @see WP_Widget
 */
class WP_Nav_Menu_Widget extends WP_Widget {

    /**
     * Sets up a new Navigation Menu widget instance.
     *
     * @since 3.0.0
     */
    public function __construct() {
        $widget_ops = array(
            'description' => __( 'Add a navigation menu to your sidebar.' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'nav_menu', __('Navigation Menu'), $widget_ops );
    }

    /**
     * Outputs the content for the current Navigation Menu widget instance.
     *
     * @since 3.0.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Navigation Menu widget instance.
     */
    public function widget( $args, $instance ) {
        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

        if ( ! $nav_menu ) {
            return;
        }

        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

//        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $nav_menu_args = array(
            'fallback_cb' => '',
            'menu'        => $nav_menu
        );

        /**
         * Filters the arguments for the Navigation Menu widget.
         *
         * @since 4.2.0
         * @since 4.4.0 Added the `$instance` parameter.
         *
         * @param array    $nav_menu_args {
         *     An array of arguments passed to wp_nav_menu() to retrieve a navigation menu.
         *
         *     @type callable|bool $fallback_cb Callback to fire if the menu doesn't exist. Default empty.
         *     @type mixed         $menu        Menu ID, slug, or name.
         * }
         * @param WP_Term  $nav_menu      Nav menu object for the current menu.
         * @param array    $args          Display arguments for the current widget.
         * @param array    $instance      Array of settings for the current widget.
         */
        wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );

//        echo $args['after_widget'];
    }

    /**
     * Handles updating settings for the current Navigation Menu widget instance.
     *
     * @since 3.0.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        if ( ! empty( $new_instance['title'] ) ) {
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
        }
        if ( ! empty( $new_instance['nav_menu'] ) ) {
            $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        }
        return $instance;
    }

    /**
     * Outputs the settings form for the Navigation Menu widget.
     *
     * @since 3.0.0
     *
     * @param array $instance Current settings.
     * @global WP_Customize_Manager $wp_customize
     */
    public function form( $instance ) {
        global $wp_customize;
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        // Get menus
        $menus = wp_get_nav_menus();

        // If no menus exists, direct the user to go and create some.
        ?>
        <p class="nav-menu-widget-no-menus-message" <?php if ( ! empty( $menus ) ) { echo ' style="display:none" '; } ?>>
            <?php
            if ( $wp_customize instanceof WP_Customize_Manager ) {
                $url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
            } else {
                $url = admin_url( 'nav-menus.php' );
            }
            ?>
            <?php echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) ); ?>
        </p>
        <div class="nav-menu-widget-form-controls" <?php if ( empty( $menus ) ) { echo ' style="display:none" '; } ?>>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ) ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
                <select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
                    <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
                    <?php foreach ( $menus as $menu ) : ?>
                        <option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
                            <?php echo esc_html( $menu->name ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
                <p class="edit-selected-nav-menu" style="<?php if ( ! $nav_menu ) { echo 'display: none;'; } ?>">
                    <button type="button" class="button"><?php _e( 'Edit Menu' ) ?></button>
                </p>
            <?php endif; ?>
        </div>
        <?php
    }
}




