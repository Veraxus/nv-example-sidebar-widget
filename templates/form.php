<p><?php printf( __('Code for this example widget can be found in <tt>%s</tt>','nouveau'), __FILE__ ); ?></p>
<p>
    <label for="<?php echo $this->get_field_id( 'example_field' ); ?>"><?php _e('Example Field:','nouveau'); ?> </label>
    <input
        type="text"
        id="<?php echo $this->get_field_id( 'example_field' ); ?>"
        name="<?php echo $this->get_field_id( 'example_field' ); ?>"
        value="<?php echo esc_attr( $instance['example_field'] ) ?>" />
</p>