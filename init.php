<?php
/*
Plugin Name: NOUVEAU Sidebar Widget Example
Plugin URI: http://nouveauframework.com/plugins/
Description: A simple, functional plugin that serves as an example for creating new WordPress "sidebar" widgets.
Author: Matt Van Andel
Version: 0.1
Author URI: http://mattstoolbox.com/
License: GPLv2 or later
*/

// We'll initialize the widget class from here, for simplicity
add_action( 'widgets_init', array('NV_Example_Widget','register'));

/**
 * Our Example Widget class
 */
class NV_Example_Widget extends WP_Widget
{

    /**
     * Used by the widgets_init hook to add the widget instance.
     *
     * @return WP_Widget A new instance of the widget object
     */
    public static function register()
    {
        return register_widget( 'NV_Example_Widget' );
    }

    /**
     * Register a new widget instance with WordPress.
     *
     * We need to explicitly call the parent constructor and return a few basic arguments.
     */
    public function __construct()
    {
        // Define the widget parameters
        parent::__construct(
            'nouveau_example_widget',   // Slug-friendly id
            'Nouveau Example Widget',   // Visible widget name (for admin)
            array(                      // Additional args
                'description' => __( 'This is an example widget!', 'nouveau' ),     //Description text for admin's Widget page
            )
        );
    }

    /**
     * Widget configuration form can be added here. These are the widget settings/text/HTML that can be displayed on the
     * Widgets admin screen.
     *
     * Use $instance to access any widget information previously stored by the widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Saved configuration options from the database.
     * @return string|void
     */
    public function form( $instance )
    {
        require('templates/form.php');
    }

    /**
     * Can be used to process or sanitize values before they are saved. Simply return an array to save it.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance New values from the form (about to be saved).
     * @param array $old_instance Old values from the database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance )
    {
        $instance = array();

        //We create a default value using shorthand ternary operator ( ?: )
        $instance['example_field'] = strip_tags( $new_instance['example_field'] ?: __('Default','nouveau') );

        //Return the array to save it
        return $instance;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Configuration-type arguments from hooks.
     * @param array $instance The custom configuration values from the database.
     */
    public function widget( $args, $instance )
    {
        echo $args['before_widget'];
        require('templates/widget.php');
        echo $args['after_widget'];
    }

}