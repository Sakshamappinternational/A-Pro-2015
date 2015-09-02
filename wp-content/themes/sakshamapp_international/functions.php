 <?php
// Require the main plugin class
require_once dirname( __FILE__ ) . '/redux-framework-master/class.redux-plugin.php';

// Register hooks that are fired when the plugin is activated and deactivated, respectively.
register_activation_hook( __FILE__, array( 'ReduxFrameworkPlugin', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'ReduxFrameworkPlugin', 'deactivate' ) );

// Get plugin instance
add_action( 'plugins_loaded', array( 'ReduxFrameworkPlugin', 'instance' ) );

// The above line prevents ReduxFramework from instancing until all plugins have loaded.
// While this does not matter for themes, any plugin using Redux will not load properly.
// Waiting until all plugins have been loaded prevents the ReduxFramework class from
// being created, and fails the !class_exists('ReduxFramework') check in the sample_config.php,
// and thus prevents any plugin using Redux from loading their config file.
ReduxFrameworkPlugin::instance();
 
 require_once (dirname(__FILE__) . '/admin/barebones-config.php');
  
   
 
 
class Sakshamapp_International_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'igreen_alexa_widget', // Base ID
			'Igreen_Alexa_Widget', // Name
			array( 'description' => __( 'Sakshamapp_International_Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
	
	printSocialMedia();

  
		echo $after_widget;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( empty( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

} // class Foo_Widget

// register Foo_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "Sakshamapp_International_Widget" );' ) );
		 
		 
		 
		 
		 
		 
		 
		 

/**
 * Proper way to enqueue scripts and styles
 */
function sakshamapp_international_scripts() {
	
		wp_enqueue_style( 'bootstrap-css', "//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" );
	wp_enqueue_style( 'font-awesome', "//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" );
	
}

add_action( 'wp_enqueue_scripts', 'sakshamapp_international_scripts' );




/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sakshamapp_international_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'sakshamapp_international' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your Footer 1.', 'sakshamapp_international' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'sakshamapp_international' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your Footer 2.', 'sakshamapp_international' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sakshamapp_international_widgets_init' );




/* Various Functions */

function printSocialMedia()
{
 global  $sakshamapp_international_;
 $n=2;
 
 echo "<div class='sakshamapp_international_social_icon'>";
 
 if (!empty($sakshamapp_international_['facebook'])) {
    echo '<a href="'.$sakshamapp_international_['facebook'].'" target="_blank"><i class="fa fa-facebook   fa-'.$n.'x"></i></a>';
}
 if (!empty($sakshamapp_international_['linkedin'])) {
            echo '<a href="'.$sakshamapp_international_['linkedin'].'" target="_blank"><i class="fa fa-linkedin   fa-'.$n.'x"></i></a>';
}
  
 if (!empty($sakshamapp_international_['google-plus'])) {
    echo '<a href="'.$sakshamapp_international_['google-plus'].'" target="_blank"><i class="fa fa-google-plus   fa-'.$n.'x"></i></a>';
}


 if (!empty($sakshamapp_international_['twitter'])) {
    echo '<a href="'.$sakshamapp_international_['twitter'].'" target="_blank"><i class="fa fa-twitter   fa-'.$n.'x"></i></a>';
}

 if (!empty($sakshamapp_international_['rss'])) {
    echo '<a href="'.$sakshamapp_international_['rss'].'" target="_blank"><i class="fa fa-rss   fa-'.$n.'x"></i></a>';
}

 if (!empty($sakshamapp_international_['digg'])) {
                echo '<a href="'.$sakshamapp_international_['digg'].'" target="_blank"><i class="fa fa-digg   fa-'.$n.'x"></i></a>';
}


 if (!empty($sakshamapp_international_['reddit'])) {
        echo '<a href="'.$sakshamapp_international_['reddit'].'" target="_blank"><i class="fa fa-reddit   fa-'.$n.'x"></i></a>';
}


 if (!empty($sakshamapp_international_['tumblr'])) {
    echo '<a href="'.$sakshamapp_international_['tumblr'].'" target="_blank"><i class="fa fa-tumblr   fa-'.$n.'x"></i></a>';
}


 if (!empty($sakshamapp_international_['pinterest'])) {
    echo '<a href="'.$sakshamapp_international_['pinterest'].'" target="_blank"><i class="fa fa-pinterest   fa-'.$n.'x"></i></a>';
}

 if (!empty($sakshamapp_international_['instagram'])) {
    echo '<a href="'.$sakshamapp_international_['instagram'].'" target="_blank"><i class="fa fa-instagram   fa-'.$n.'x"></i></a>';
}


 if (!empty($sakshamapp_international_['vimeo'])) {
    echo '<a href="'.$sakshamapp_international_['vimeo'].'" target="_blank"><i class="fa fa-vimeo   fa-'.$n.'x"></i></a>';
}


 if (!empty($sakshamapp_international_['flickr'])) {
    echo '<a href="'.$sakshamapp_international_['flickr'].'" target="_blank"><i class="fa fa-flickr   fa-'.$n.'x"></i></a>';
} 
echo "</div>";

} 

add_action('wp_head','sakshamapp_international_head');

function sakshamapp_international_head() {

	 
 global  $sakshamapp_international_;
echo $sakshamapp_international_['header_area'];
}


add_action('wp_footer','sakshamapp_international_footer');

function sakshamapp_international_footer() {

	 
 global  $sakshamapp_international_;
echo $sakshamapp_international_['footer_area'];
}


