<?php
/*
Plugin Name: Resultados Quiniela
Plugin URI: http://nordestedesign.com.ar/blog/
Description: Resultados de quiniela Argentina - Nacional y Bonaerence
Author: Luis Daniel
Version: 1.0.0
Author URI: http://www.nordestedesign.com.ar/
*/
class quiniela_Widget extends WP_Widget
{
	function quiniela_Widget() {
	$widget_ops = array('classname' => 'quiniela_Widget', 'description' => 'Resultados de quiniela Argentina - Nacional y Bonaerence' );
	parent::__construct( 'quiniela_Widget', 'Resultados Quiniela', $widget_ops );
	}
 
	
 
 function form( $instance ) {
    $defaults = array( 'title' => __( 'Resultados Quiniela', 'wptheme' ), 'avatar' => 'off' );
    $instance = wp_parse_args( ( array ) $instance, $defaults ); ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
        <input class="widefat"  id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'title' ] ); ?>" />
    </p>
    <!-- The checkbox -->
    <p>
        <input class="checkbox" type="checkbox" <?php checked( $instance[ 'avatar' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'avatar' ); ?>" name="<?php echo $this->get_field_name( 'avatar' ); ?>" /> 
        <label for="<?php echo $this->get_field_id( 'avatar' ); ?>"> Powered By</label>
    </p>
  
<?php
}


 
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
   
    // The update for the variable of the checkbox
    $instance[ 'avatar' ] = $new_instance[ 'avatar' ];
    return $instance;
}
 
	function widget( $args, $instance )
	{
	extract( $args, EXTR_SKIP );
 	echo $before_widget;
	$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
	if ( ! empty($title) ) {
		echo $before_title . $title . $after_title;
		

		echo '<iframe width="302" height="331" src="http://www.resultados-quiniela.info/resultados.php" frameborder="0" allowfullscreen></iframe>' ;
		if ($instance['avatar']=='on') {

			echo '<a href="http://www.resultados-quiniela.info/" target="_blank">Resultados Quiniela</a>' ;
		}


		echo $after_widget;
	}
  }
 
}

add_action( 'widgets_init', create_function('', 'return register_widget("quiniela_Widget");') );?>