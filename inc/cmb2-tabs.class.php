<?php

namespace cmb2_tabs\inc;

/**
 * Class CMB2_Tabs
 * @package cmb2_tabs\inc
 * @since   1.2.1
 */
class CMB2_Tabs {

	/**
	 * CMB2_Tabs constructor.
	 */
	public function __construct() {
		add_action( 'cmb2_render_tabs', array( $this, 'render' ), 10, 5 );
		add_filter( 'cmb2_sanitize_tabs', array( $this, 'save' ), 10, 4 );
	}


	/**
	 * Hook: Render field
	 *
	 * @param $field_object
	 * @param $escaped_value
	 * @param $object_id
	 * @param $object_type
	 * @param $field_type_object
	 */
	public function render( $field_object, $escaped_value, $object_id, $object_type, $field_type_object ) {
		$a = $field_type_object->parse_args( $field_object->data_args(), 'tabs', array(
			'class' => 'dtheme-cmb2-tabs',
		) );

		echo sprintf( '<div %s>%s</div>', $field_type_object->concat_attrs( $a, array(
			'value',
			'name',
			'type'
		) ), $this->get_tabs( $field_object, $object_id ) );
	}


	/**
	 * Render tabs
	 *
	 * @param $field_object
	 * @param $object_id
	 *
	 * @return string
	 */
	public function get_tabs( $field_object, $object_id ) {
		$settings = $field_object->args['tabs'];
		ob_start();
		?>

		<ul>
			<?php foreach ( $settings['tabs'] as $key => $tab ): ?>
				<li><a href="#<?php echo $tab['id']; ?>"><?php echo $tab['title']; ?></a></li>
			<?php endforeach; ?>
		</ul>

		<?php foreach ( $settings['tabs'] as $key => $tab ): ?>
			<div id="<?php echo $tab['id']; ?>">
				<?php
				// render fields from tab
				$this->render_fields( $settings['args'], $tab['fields'], $object_id );
				?>
			</div>
		<?php endforeach;

		return ob_get_clean();
	}


	/**
	 * Render fields from tab
	 *
	 * @param $args
	 * @param $fields
	 * @param $object_id
	 */
	public function render_fields( $args, $fields, $object_id ) {
		// set options to cmb2
		$setting_fields = array_merge( $args, array( 'fields' => $fields ) );
		$CMB2           = new \CMB2( $setting_fields, $object_id );

		foreach ( $fields as $key_field => $field ) {
			if ( $CMB2->is_options_page_mb() ) {
				$CMB2->object_type( $args['object_type'] );
			}
			// cmb2 render field
			$CMB2->render_field( $field );
		}
	}


	/**
	 * Hook: Save field values
	 *
	 * @param $override_value
	 * @param $value
	 * @param $post_id
	 * @param $data
	 */
	public function save( $override_value, $value, $post_id, $data ) {
		foreach ( $data['tabs']['tabs'] as $tab ) {
			$setting_fields = array_merge( $data['tabs']['args'], array( 'fields' => $tab['fields'] ) );
			$CMB2           = new \CMB2( $setting_fields, $post_id );

			if ( $CMB2->is_options_page_mb() ) {
				$cmb2_options = cmb2_options( $post_id );
				$values       = $CMB2->get_sanitized_values( $_POST );
				foreach ( $values as $key => $value ) {
					$cmb2_options->update( $key, $value );
				}
			} else {
				$CMB2->save_fields();
			}
		}
	}
}