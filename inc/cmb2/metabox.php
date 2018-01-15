<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'awesome_theme_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object.
 *
 * @return bool             True if metabox should show
 */
function awesome_theme_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_on_front' ) !== $cmb->object_id ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object.
 *
 * @return bool                     True if metabox should show
 */
function awesome_theme_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category.
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function awesome_theme_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
		<p><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label></p>
		<p><input id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo esc_html( $description ); ?></p>
	</div>
	<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function awesome_theme_display_text_small_column( $field_args, $field ) {
	?>
	<div class="custom-column-display <?php echo esc_attr( $field->row_classes() ); ?>">
		<p><?php echo $field->escaped_value(); ?></p>
		<p class="description"><?php echo esc_html( $field->args( 'description' ) ); ?></p>
	</div>
	<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters.
 * @param  CMB2_Field object $field      Field object.
 */
function awesome_theme_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'awesome_membership_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function awesome_membership_metabox() {
	$prefix = 'awt_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_home = new_cmb2_box( array(
		'id'            => $prefix . 'home_metabox',
		'title'         => esc_html__( 'Details', 'cmb2' ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 23 ) ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section One Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one_heading',
		'type' => 'text',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section One', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one',
		'type' => 'text',
		'repeatable' => true,
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Two Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_two_heading',
		'type' => 'text',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Two Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_two_content',
		'type' => 'textarea',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Two Featured Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_two_image',
		'type' => 'file',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Two Background Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_two_bg_image',
		'type' => 'file',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Three Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_heading',
		'type' => 'textarea',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Three Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_content',
		'type' => 'textarea',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Three Featured Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_image',
		'type' => 'file',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Three Button', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_btn',
		'type' => 'textarea',
	) );


	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Four Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_four_heading',
		'type' => 'text',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Four Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_four_content',
		'type' => 'textarea',
	) );

	$group_field_id = $cmb_home->add_field( array(
		'id'          => $prefix . 'section_four_list',
		'type'        => 'group',
		'description' => esc_html__( '', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Entry', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Entry', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	$cmb_home->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Entry Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'textarea',
	) );

	$cmb_home->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Entry Image', 'cmb2' ),
		'id'   => 'image',
		'type' => 'file',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Five Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_five_heading',
		'type' => 'text',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Five Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_five_content',
		'type' => 'textarea',
	) );

	$group_field_id2 = $cmb_home->add_field( array(
		'id'          => $prefix . 'section_five_list',
		'type'        => 'group',
		'description' => esc_html__( '', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Entry', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Entry', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	$cmb_home->add_group_field( $group_field_id2, array(
		'name'       => esc_html__( 'Entry Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text',
	) );

	$cmb_home->add_group_field( $group_field_id2, array(
		'name'       => esc_html__( 'Entry Content', 'cmb2' ),
		'id'         => 'content',
		'type'       => 'textarea',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Five Button', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_five_btn',
		'type' => 'textarea',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Six Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_six_heading',
		'type' => 'text',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Six Featured Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_six_image',
		'type' => 'file',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Six Testimonials', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_six_testimonials',
		'type' => 'textarea',
		'repeatable' => true,
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Seven Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_seven_heading',
		'type' => 'text',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Seven Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_seven_content',
		'type' => 'textarea',
	) );

	$cmb_home->add_field( array(
		'name' => esc_html__( 'Section Seven Shortcode', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_seven_shortcode',
		'type' => 'text',
	) );
}

add_action( 'cmb2_admin_init', 'awesome_theme_research_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function awesome_theme_research_metabox() {
	$prefix = 'awt_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_research = new_cmb2_box( array(
		'id'            => $prefix . 'research_metabox',
		'title'         => esc_html__( 'Details', 'cmb2' ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 6 ) ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section One Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one_heading',
		'type' => 'text',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section One Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one_content',
		'type' => 'textarea',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section One Background Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one_bg_image',
		'type' => 'file',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Two Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_two_content',
		'type' => 'textarea',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Three Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_heading',
		'type' => 'text',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Three Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_content',
		'type' => 'textarea',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Four Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_four_heading',
		'type' => 'text',
	) );

	$group_field_id = $cmb_research->add_field( array(
		'id'          => $prefix . 'section_four_list',
		'type'        => 'group',
		'description' => esc_html__( '', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Entry', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Entry', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	$cmb_research->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Entry Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text',
	) );

	$cmb_research->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Entry Content', 'cmb2' ),
		'id'         => 'content',
		'type'       => 'textarea',
	) );

	$cmb_research->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Upload image', 'cmb2' ),
		'id'         => 'image',
		'type'       => 'file',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Four Button', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_four_btn',
		'type' => 'textarea_code',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Four Modal', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_four_modal',
		'type' => 'wysiwyg',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Five Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_five_heading',
		'type' => 'text',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Five Subheading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_five_subheading',
		'type' => 'text',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Five Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_five_content',
		'type' => 'wysiwyg',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Five Featured Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_five_image',
		'type' => 'file',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Six Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_six_heading',
		'type' => 'text',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Six Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_six_content',
		'type' => 'textarea',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Six File List', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_six_file_list',
		'type' => 'textarea',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );


		$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Seven Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_seven_heading',
		'type' => 'text',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Seven Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_seven_content',
		'type' => 'wysiwyg',
	) );


	$group_field_id2 = $cmb_research->add_field( array(
		'id'          => $prefix . 'section_seven_list',
		'type'        => 'group',
		'description' => esc_html__( '', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Entry', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Entry', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	$cmb_research->add_group_field( $group_field_id2, array(
		'name'       => esc_html__( 'Entry Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'textarea_code',
	) );

	$cmb_research->add_group_field( $group_field_id2, array(
		'name'       => esc_html__( 'Entry Content', 'cmb2' ),
		'id'         => 'content',
		'type'       => 'textarea',
	) );

	$cmb_research->add_group_field( $group_field_id2, array(
		'name'       => esc_html__( 'Upload image', 'cmb2' ),
		'id'         => 'image',
		'type'       => 'file',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Eight Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_eight_heading',
		'type' => 'text',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Eight Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_eight_content',
		'type' => 'wysiwyg',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Eight Featured Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_eight_image',
		'type' => 'file',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Nine Left Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_nine_left_content',
		'type' => 'wysiwyg',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Nine Right Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_nine_right_content',
		'type' => 'wysiwyg',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Ten Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_ten_heading',
		'type' => 'text',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Ten Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_ten_content',
		'type' => 'wysiwyg',
	) );

	$cmb_research->add_field( array(
		'name' => esc_html__( 'Section Ten Featured Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_ten_image',
		'type' => 'file',
	) );
}


add_action( 'cmb2_admin_init', 'awesome_theme_events_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function awesome_theme_events_metabox() {
	$prefix = 'awt_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_events = new_cmb2_box( array(
		'id'            => $prefix . 'events_metabox',
		'title'         => esc_html__( 'Details', 'cmb2' ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 8 ) ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Section One Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one_heading',
		'type' => 'text',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Section One Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one_content',
		'type' => 'textarea',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Section One Background Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one_bg_image',
		'type' => 'file',
	) );


	$cmb_events->add_field( array(
		'name' => esc_html__( 'Section Two Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_two_heading',
		'type' => 'text',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Section Three Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_heading',
		'type' => 'textarea',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Section Three Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_content',
		'type' => 'wysiwyg',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Section Three Featured Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_image',
		'type' => 'file',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Section Four Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_four_heading',
		'type' => 'text',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Section Four Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_four_content',
		'type' => 'wysiwyg',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Section Four Shortcode', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_four_shortcode',
		'type' => 'text',
	) );
}



add_action( 'cmb2_admin_init', 'awesome_theme_event_details_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function awesome_theme_event_details_metabox() {
	$prefix = 'awt_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_events = new_cmb2_box( array(
		'id'            => $prefix . 'event_details_metabox',
		'title'         => esc_html__( 'Details', 'cmb2' ),
		'object_types'  => array( 'event' ), // Post type
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	
	) );

	$cmb_events->add_field( array(
		'name'             => esc_html__( 'Event Status', 'cmb2' ),
		'desc'             => esc_html__( '', 'cmb2' ),
		'id'               => $prefix . 'event_status',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'current_event' => esc_html__( 'Current Event', 'cmb2' ),
			'past_event'   => esc_html__( 'Past Event', 'cmb2' ),
		),
	) );	

	$cmb_events->add_field( array(
		'name'             => esc_html__( 'Layout', 'cmb2' ),
		'desc'             => esc_html__( '', 'cmb2' ),
		'id'               => $prefix . 'layout',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'default' => esc_html__( 'Default', 'cmb2' ),
			'fullwidth'   => esc_html__( 'Fullwith with Builder', 'cmb2' ),
		),
	) );


	$cmb_events->add_field( array(
		'name' => esc_html__( 'Event Date', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'event_date',
		'type' => 'text',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Event Location', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'location',
		'type' => 'text',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Registration Link', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'reg_link',
		'type' => 'text_url',
	) );

	$cmb_events->add_field( array(
		'name' => esc_html__( 'Sidebar', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'other_details',
		'type' => 'wysiwyg',
	) );

}

add_action( 'cmb2_admin_init', 'awesome_theme_event_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function awesome_theme_event_taxonomy_metabox() {
	$prefix = 'awt_term_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$cmb_term = new_cmb2_box( array(
		'id'               => $prefix . 'event',
		'title'            => esc_html__( 'Category Metabox', 'cmb2' ), // Doesn't output for term boxes
		'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
		'taxonomies'       => array( 'event_cat' ), // Tells CMB2 which taxonomies should have these fields
		// 'new_term_section' => true, // Will display in the "Add New Category" section
	) );

	$cmb_term->add_field( array(
		'name' => esc_html__( 'Term Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'term_image',
		'type' => 'file',
	) );
}




add_action( 'cmb2_admin_init', 'awesome_theme_curriculum_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function awesome_theme_curriculum_metabox() {
	$prefix = 'awt_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_curriculum = new_cmb2_box( array(
		'id'            => $prefix . 'curriculum_metabox',
		'title'         => esc_html__( 'Details', 'cmb2' ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 10 ) ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
		'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names'   => true, // Show field names on the left
	
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section One Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one_heading',
		'type' => 'text',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section One Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one_content',
		'type' => 'textarea',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section One Background Image', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_one_bg_image',
		'type' => 'file',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Two Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_two_content',
		'type' => 'wysiwyg',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Three Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_heading',
		'type' => 'text',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Three Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_three_content',
		'type' => 'wysiwyg',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Four Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_four_heading',
		'type' => 'textarea',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Four Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_four_content',
		'type' => 'textarea',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Five Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_five_heading',
		'type' => 'text',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Five Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_five_content',
		'type' => 'textarea',
	) );


	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Six Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_six_heading',
		'type' => 'text',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Six Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_six_content',
		'type' => 'textarea',
	) );

	$group_field_id = $cmb_curriculum->add_field( array(
		'id'          => $prefix . 'section_six_list',
		'type'        => 'group',
		'description' => esc_html__( '', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Entry', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Entry', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	$cmb_curriculum->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Entry Content', 'cmb2' ),
		'id'         => 'content',
		'type'       => 'wysiwyg',
	) );


	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Seven Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_seven_heading',
		'type' => 'text',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Seven Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_seven_content',
		'type' => 'textarea',
	) );


	$group_field_id = $cmb_curriculum->add_field( array(
		'id'          => $prefix . 'section_seven_list',
		'type'        => 'group',
		'description' => esc_html__( '', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Entry', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Entry', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	$cmb_curriculum->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Entry Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text',
	) );

	$cmb_curriculum->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Entry Excerpt', 'cmb2' ),
		'id'         => 'excerpt',
		'type'       => 'textarea',
	) );

	$cmb_curriculum->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Entry Content', 'cmb2' ),
		'id'         => 'content',
		'type'       => 'wysiwyg',
	) );

	$cmb_curriculum->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Upload image', 'cmb2' ),
		'id'         => 'image',
		'type'       => 'file',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Eight Heading', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_eight_heading',
		'type' => 'text',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Eight Content', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_eight_content',
		'type' => 'textarea',
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Eight Columns', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_eight_columns',
		'type' => 'textarea_code',
		'repeatable' => true,
	) );

	$cmb_curriculum->add_field( array(
		'name' => esc_html__( 'Section Nine List', 'cmb2' ),
		'desc' => esc_html__( '', 'cmb2' ),
		'id'   => $prefix . 'section_nine_list',
		'type' => 'textarea_code',
		'repeatable' => true,
	) );
}


/**
 * Only show this box in the CMB2 REST API if the user is logged in.
 *
 * @param  bool                 $is_allowed     Whether this box and its fields are allowed to be viewed.
 * @param  CMB2_REST_Controller $cmb_controller The controller object.
 *                                              CMB2 object available via `$cmb_controller->rest_box->cmb`.
 *
 * @return bool                 Whether this box and its fields are allowed to be viewed.
 */
function awesome_theme_limit_rest_view_to_logged_in_users( $is_allowed, $cmb_controller ) {
	if ( ! is_user_logged_in() ) {
		$is_allowed = false;
	}

	return $is_allowed;
}
