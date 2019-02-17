<?php
/**
 * Seed Theme Settings 
 */

// Check overriding variables
$GLOBALS['overrides'] = array(
	'SEED_LAYOUT' => (defined('SEED_LAYOUT'))? true : false ,
	'SEED_HEADER_MOBILE' => (defined('SEED_HEADER_MOBILE'))? true : false ,
	'SEED_HEADER_DESKTOP' => (defined('SEED_HEADER_DESKTOP'))? true : false ,
	'SEED_MENU' => (defined('SEED_MENU'))? true : false ,
	'SEED_MENU_ICON' => (defined('SEED_MENU_ICON'))? true : false ,
	'SEED_BLOG_LAYOUT' => (defined('SEED_BLOG_LAYOUT'))? true : false ,
	'SEED_BLOG_COLUMNS' => (defined('SEED_BLOG_COLUMNS'))? true : false ,
	'SEED_SHOP_LAYOUT' => (defined('SEED_SHOP_LAYOUT'))? true : false ,
	'SEED_SHOP_MAINPAGE' => (defined('SEED_SHOP_MAINPAGE'))? true : false ,
	'SEED_ADMIN_BAR' => (defined('SEED_ADMIN_BAR'))? true : false ,
	'SEED_FRAMEWORK' => (defined('SEED_FRAMEWORK'))? true : false ,
	'SEED_FONTAWESOME' => (defined('SEED_FONTAWESOME'))? true : false,
);
$GLOBALS['overrides_value'] = array(
	'SEED_LAYOUT' => (defined('SEED_LAYOUT'))? SEED_LAYOUT : '' ,
	'SEED_HEADER_MOBILE' => (defined('SEED_HEADER_MOBILE'))? SEED_HEADER_MOBILE : '' ,
	'SEED_HEADER_DESKTOP' => (defined('SEED_HEADER_DESKTOP'))? SEED_HEADER_DESKTOP : '' ,
	'SEED_MENU' => (defined('SEED_MENU'))? SEED_MENU : '' ,
	'SEED_MENU_ICON' => (defined('SEED_MENU_ICON'))? SEED_MENU_ICON : '' ,
	'SEED_BLOG_LAYOUT' => (defined('SEED_BLOG_LAYOUT'))? SEED_BLOG_LAYOUT : '' ,
	'SEED_BLOG_COLUMNS' => (defined('SEED_BLOG_COLUMNS'))? SEED_BLOG_COLUMNS : '' ,
	'SEED_SHOP_LAYOUT' => (defined('SEED_SHOP_LAYOUT'))? SEED_SHOP_LAYOUT : '' ,
	'SEED_SHOP_MAINPAGE' => (defined('SEED_SHOP_MAINPAGE'))? SEED_SHOP_MAINPAGE : '' ,
	'SEED_ADMIN_BAR' => (defined('SEED_ADMIN_BAR'))? SEED_ADMIN_BAR : '' ,
	'SEED_FRAMEWORK' => (defined('SEED_FRAMEWORK'))? SEED_FRAMEWORK : '' ,
	'SEED_FONTAWESOME' => (defined('SEED_FONTAWESOME'))? SEED_FONTAWESOME : '',
);
$GLOBALS['countOfOverrides'] = count($GLOBALS['overrides']);
$GLOBALS['countOfOverridesOnlyTrue'] = array_sum($GLOBALS['overrides']);

add_action( 'after_setup_theme', 'seed_theme_updater' );

function seed_theme_updater() {
	include( dirname( __FILE__ ) . '/updater/theme-updater.php' );
}

add_action( 'admin_menu', 'seed_settings_menu' );

function seed_settings_menu() {
	$seed_settings_page = add_submenu_page ( 'themes.php', __( 'Theme Settings', 'seed' ), __( 'Theme Settings', 'seed' ), 'manage_options', 'seed-settings', 'seed_settings_init' );

	add_action( 'load-' . $seed_settings_page, 'seed_settings_admin_styles' );
}

function seed_settings_admin_styles() {
	wp_enqueue_style( 'seed-settings', get_bloginfo( 'template_directory' ) . '/vendor/seedthemes/seed-settings.css' , array(), '2016-1' );
	wp_enqueue_script( 'seed-settings', get_bloginfo( 'template_directory' ) . '/vendor/seedthemes/seed-settings.js' , array( 'jquery', 'jquery-ui-tabs' ), '2016-1', true );
}

function seed_settings_page_tabs( $current = 'settings' ) {
	$tabs = array(
		'settings' => __("Settings", 'seed'), 
		'license' => __("License", 'seed')
	);

	$html = '<div class="icon32" id="icon-options-general"></div>';
	$html .= '<h2>' . esc_html( 'Theme Settings', 'seed' ) . '</h2>';
	$html .= '<h2 class="nav-tab-wrapper">';

	foreach( $tabs as $tab => $name ){
		$class = ($tab == $current) ? 'nav-tab-active' : '';
		$html .=  '<a class="nav-tab ' . $class . '" href="?page=seed-settings&tab=' . $tab . '">' . $name . '</a>';
	}
	$html .= '</h2>';

	echo $html;
}

function seed_settings_init() {
	// Code displayed before the tabs (outside)
	// Tabs

	$seed_settings_tab = ( !empty( $_GET['tab'] ) ) ? esc_attr( $_GET['tab'] ) : 'settings';

	if( $seed_settings_tab == 'settings' ) :
?>
	<div class="wrap">
		<?php seed_settings_page_tabs( $seed_settings_tab );

		if( isset( $_GET['settings-updated'] ) ) {
			?><div class="updated"><p><strong><?php esc_html_e( 'Settings updated successfully.', 'seed' ); ?></strong></div><?php
		}
		?>
		<p>
			<?php printf( wp_kses( __( 'Please see online documentation at <a href="%1$s" target="_blank">Seed Configuration</a>.', 'seed' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://th.seedthemes.com/seed-kit/themes/seed-configuration/' ) ); ?>
		</p>
		<?php if($GLOBALS['countOfOverridesOnlyTrue'] > 0 && $GLOBALS['countOfOverridesOnlyTrue'] == $GLOBALS['countOfOverrides'] ):?>
		<p>
			<?php _e('All theme settings are disable as defined in functions.php', 'seed'); ?>
		</p>
		<?php endif;?>
		<?php if($GLOBALS['countOfOverridesOnlyTrue'] > 0 && $GLOBALS['countOfOverridesOnlyTrue'] < $GLOBALS['countOfOverrides'] ):?>
		<p>
			<?php _e('Some theme settings are disable as defined in functions.php', 'seed'); ?>
		</p>
		<?php endif;?>
		<form action="<?php echo admin_url( 'options.php' ); ?>" method="post" id="seed-settings-form">
			<?php
				settings_fields( 'seed-settings' );
				do_settings_sections( 'seed-settings' );
				submit_button();
			?>

		</form>
	</div>

<?php
	endif;

	}

/**
 * Quick helper function that prefixes an option ID
 *
 * This makes it easier to maintain and makes it super easy to change the options prefix without breaking the options
 * registered with the Settings API.
 *
 * @since 0.10.0
 *
 * @param string $name Unprefixed name of the option
 *
 * @return string
 */
function seed_settings_get_option_id( $name ) {
	return 'seed_settings_' . $name;
}

/**
 * Get the plugin settings in header tab
 *
 * @since 0.10.0
 * @return array
 */
function seed_settings_get_settings() {
	$layout_options = array(
		'full-width' => esc_html__( 'Full Width', 'seed' ),
		'boxed' => esc_html__( 'Boxed', 'seed' )
	);
	$header_mobile_options = array(
		'fixed' => esc_html__( 'Fixed', 'seed' ),
		'standard' => esc_html__( 'Standard', 'seed' )
	);
	$header_desktop_options = array(
		'fixed' => esc_html__( 'Fixed', 'seed' ),
		'standard' => esc_html__( 'Standard', 'seed' )
	);
	$menu_options = array(
		'off-canvas' => esc_html__( 'Off Canvas', 'seed' ),
		'dropdown' => esc_html__( 'Dropdown', 'seed' )
	);
	$menu_icon_options = array(
		'small' => esc_html__( 'Small', 'seed' ),
		'large' => esc_html__( 'Large (show only icon)', 'seed' )
	);
	$blog_layout_options = array(
		'full-width' => esc_html__( 'Full Width', 'seed' ),
		'leftbar' => esc_html__( 'Leftbar', 'seed' ),
		'rightbar' => esc_html__( 'Rightbar', 'seed' )
	);
	$blog_column_options = array(
			'1' => esc_html__( '1', 'seed' ),
			'2' => esc_html__( '2', 'seed' ),
			'3' => esc_html__( '3', 'seed' ),
			'4' => esc_html__( '4', 'seed' ),
			'5' => esc_html__( '5', 'seed' ),
			'6' => esc_html__( '6', 'seed' )
	);
	$shop_layout_options = array(
			'full-width' => esc_html__( 'Full Width', 'seed' ),
			'leftbar' => esc_html__( 'Leftbar', 'seed' ),
			'rightbar' => esc_html__( 'Rightbar', 'seed' )
	);
	$shop_mainpage_options = array(
			'default' => esc_html__( 'Default', 'seed' ),
			'page-builder' => esc_html__( 'Page Builder', 'seed' )
	);
	$admin_bar_options = array(
			'hidden' => esc_html__( 'Hidden', 'seed' ),
			'bottom' => esc_html__( 'Bottom', 'seed' ),
			'top' => esc_html__( 'Top', 'seed' )
	);
	$framework_options = array(
			'bootstrap-3-minimal' => esc_html__( 'Boostrap 3 Minimal', 'seed' ),
			'bootstrap-3' => esc_html__( 'Boostrap 3', 'seed' ),
			'bootstrap-4' => esc_html__( 'Boostrap 4', 'seed' )
	);
	$fontawesome_options = array(
			'enable' => esc_html__( 'Enable', 'seed' ),
			'disable' => esc_html__( 'Disable', 'seed' ),
	);
						
	$settings = array(
		array(
			'id'      => 'seed-settings',
			'title'   => '',
			'options' => array(
				array(
					'id'      => seed_settings_get_option_id( 'is_enabled' ),
					'title'   => esc_html__( 'Enable?', 'seed' ),
					'type'    => 'checkbox',
					'options' => array( 'on' => esc_html__( 'Yes', 'seed' ) )
				),
				array(
					'id'      => seed_settings_get_option_id( 'layout' ),
					'title'   => esc_html__( 'Layout', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_LAYOUT'])? 'html':'dropdown',
					'options' => $layout_options,
					'html' 	  => !empty($layout_options[$GLOBALS['overrides_value']['SEED_LAYOUT']])? $layout_options[$GLOBALS['overrides_value']['SEED_LAYOUT']]: $GLOBALS['overrides_value']['SEED_LAYOUT'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'header_mobile' ),
					'title'   => esc_html__( 'Header (Mobile)', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_HEADER_MOBILE'])? 'html':'dropdown',
					'options' => $header_mobile_options,
					'html' 	  => !empty($header_mobile_options[$GLOBALS['overrides_value']['SEED_HEADER_MOBILE']]) ? $header_mobile_options[$GLOBALS['overrides_value']['SEED_HEADER_MOBILE']]:$GLOBALS['overrides_value']['SEED_HEADER_MOBILE'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'header_desktop' ),
					'title'   => esc_html__( 'Header (Desktop)', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_HEADER_DESKTOP'])? 'html':'dropdown',
					'options' => $header_desktop_options,
					'html' 	  => !empty($header_desktop_options[$GLOBALS['overrides_value']['SEED_HEADER_DESKTOP']])? $header_desktop_options[$GLOBALS['overrides_value']['SEED_HEADER_DESKTOP']]:$GLOBALS['overrides_value']['SEED_HEADER_DESKTOP'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'menu' ),
					'title'   => esc_html__( 'Mobile Menu', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_MENU'])? 'html':'dropdown',
					'options' => $menu_options,
					'html' 	  => !empty($menu_options[$GLOBALS['overrides_value']['SEED_MENU']])? $menu_options[$GLOBALS['overrides_value']['SEED_MENU']]:$GLOBALS['overrides_value']['SEED_MENU'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'menu_icon' ),
					'title'   => esc_html__( 'Mobile Menu Icon', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_MENU_ICON'])? 'html':'dropdown',
					'options' => $menu_icon_options,
					'html' 	  => !empty($menu_icon_options[$GLOBALS['overrides_value']['SEED_MENU_ICON']])? $menu_icon_options[$GLOBALS['overrides_value']['SEED_MENU_ICON']]:$GLOBALS['overrides_value']['SEED_MENU_ICON'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'blog_layout' ),
					'title'   => esc_html__( 'Blog Layout', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_BLOG_LAYOUT'])? 'html':'dropdown',
					'options' => $blog_layout_options,
					'html' 	  => !empty($blog_layout_options[$GLOBALS['overrides_value']['SEED_BLOG_LAYOUT']])? $blog_layout_options[$GLOBALS['overrides_value']['SEED_BLOG_LAYOUT']]:$GLOBALS['overrides_value']['SEED_BLOG_LAYOUT'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'blog_columns' ),
					'title'   => esc_html__( 'Blog Columns', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_BLOG_COLUMNS'])? 'html':'dropdown',
					'options' => $blog_column_options,
					'html' 	  => !empty($blog_column_options[$GLOBALS['overrides_value']['SEED_BLOG_COLUMNS']])? $blog_column_options[$GLOBALS['overrides_value']['SEED_BLOG_COLUMNS']]:$GLOBALS['overrides_value']['SEED_BLOG_COLUMNS'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'shop_layout' ),
					'title'   => esc_html__( 'Shop Layout', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_SHOP_LAYOUT'])? 'html':'dropdown',
					'options' => $shop_layout_options,
					'html' 	  => !empty($shop_layout_options[$GLOBALS['overrides_value']['SEED_SHOP_LAYOUT']])? $shop_layout_options[$GLOBALS['overrides_value']['SEED_SHOP_LAYOUT']]:$GLOBALS['overrides_value']['SEED_SHOP_LAYOUT'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'shop_mainpage' ),
					'title'   => esc_html__( 'Shop Mainpage', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_SHOP_MAINPAGE'])? 'html':'dropdown',
					'options' => $shop_mainpage_options,
					'html' 	  => !empty($shop_mainpage_options[$GLOBALS['overrides_value']['SEED_SHOP_MAINPAGE']])? $shop_mainpage_options[$GLOBALS['overrides_value']['SEED_SHOP_MAINPAGE']]:$GLOBALS['overrides_value']['SEED_SHOP_MAINPAGE'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'admin_bar' ),
					'title'   => esc_html__( 'Admin Bar', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_ADMIN_BAR'])? 'html':'dropdown',
					'options' => $admin_bar_options,
					'html' 	  => !empty($admin_bar_options[$GLOBALS['overrides_value']['SEED_ADMIN_BAR']])? $admin_bar_options[$GLOBALS['overrides_value']['SEED_ADMIN_BAR']]:$GLOBALS['overrides_value']['SEED_ADMIN_BAR'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'framework' ),
					'title'   => esc_html__( 'Framework', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_FRAMEWORK'])? 'html':'dropdown',
					'options' => $framework_options,
					'default' => array('bootstrap-3-minimal'),
					'html' 	  => !empty($framework_options[$GLOBALS['overrides_value']['SEED_FRAMEWORK']])? $framework_options[$GLOBALS['overrides_value']['SEED_FRAMEWORK']]:$GLOBALS['overrides_value']['SEED_FRAMEWORK'],
				),
				array(
					'id'      => seed_settings_get_option_id( 'fontawesome' ),
					'title'   => esc_html__( 'Font Awesome', 'seed' ),
					'type'    => ($GLOBALS['overrides']['SEED_FONTAWESOME'])? 'html':'dropdown',
					'options' => $fontawesome_options,
					'default' => array('disable'),
					'html' 	  => !empty($fontawesome_options[$GLOBALS['overrides_value']['SEED_FONTAWESOME']])? $fontawesome_options[$GLOBALS['overrides_value']['SEED_FONTAWESOME']]:$GLOBALS['overrides_value']['SEED_FONTAWESOME'],
				)
			),
		),
	);

	return $settings;

}

add_action( 'admin_init', 'seed_settings_register_settings' );

/**
 * Register plugin settings
 *
 * This function dynamically registers plugin settings.
 *
 * @since 0.10.0
 * @see   seed_settings_get_settings
 * @return void
 */
function seed_settings_register_settings() {

	$settings = seed_settings_get_settings();

	foreach ( $settings as $key => $section ) {

		/* We add the sections and then loop through the corresponding options */
		add_settings_section( $section['id'], $section['title'], 'seed_settings_section', 'seed-settings' );

		/* Get the options now */
		foreach ( $section['options'] as $k => $option ) {

			$field_args = array(
				'name'    => $option['id'],
				'title'   => $option['title'],
				'type'    => $option['type'],
				'desc'    => isset( $option['desc'] ) ? $option['desc'] : '',
				'default' => isset( $option['default'] ) ? $option['default'] : '',
				'options' => isset( $option['options'] ) ? $option['options'] : array(),
				'group'   => 'seed-settings',
				'disabled'=> (isset( $option['override'] ) && $option['override']==true) ? ' disabled="disabled" ': '',
				'override'=> (isset( $option['override'] ) && $option['override']==true) ? ' override="true" ': '',
				'html'    => (isset( $option['html'] )) ? $option['html']:'',
			);

			register_setting( 'seed-settings', $option['id'] );
			add_settings_field( $option['id'], $option['title'], 'seed_settings_output_settings_field', 'seed-settings', $section['id'], $field_args );

		}
	}

}

/**
 * Generate new section
 *
 * This callback function set div for a new section
 *
 * @since 0.10.0
 * @see   seed_settings_register_plugin_settings
 * @return void
 */
function seed_settings_section( $section ) {
?>
</div><div id="<?php echo $section['id'] ?>">
<?php
}

/**
 * Generate the option field output
 *
 * @since 0.10.0
 *
 * @param array $option The current option array
 *
 * @return void
 */
function seed_settings_output_settings_field( $option ) {

	$current    = get_option( $option['name'], $option['default'] );
	$field_type = $option['type'];
	$id         = str_replace( '_', '-', $option['name'] );

	// Because disabling the options when "Enable" is unchecked saved empty values we need to make sure the default is taken into account
	if ( empty( $current ) && ! empty( $option['default'] ) ) {
		$current = $option['default'];
	}

	switch( $field_type ):

		case 'text': ?>
			<input type="text" name="<?php echo $option['name']; ?>" id="<?php echo $id; ?>" value="<?php echo $current; ?>" class="regular-text" <?php echo $option['disabled'].$option['override'] ?> />
			<?php break;

		case 'checkbox': ?>
			<?php foreach( $option['options'] as $val => $choice ):

				if ( count( $option['options'] ) > 1 ) {
					$id = "{$id}_{$val}";
				}

				$selected = is_array( $current ) && in_array( $val, $current ) ? 'checked="checked"' : '';  ?>
				<label for="<?php echo $id; ?>">
					<input <?php echo $option['disabled'].$option['override'] ?> type="checkbox" name="<?php echo $option['name']; ?>[]" value="<?php echo $val; ?>" id="<?php echo $id; ?>" <?php echo $selected; ?> />
					<?php echo $choice; ?>
				</label>
			<?php endforeach;
			break;

		case 'dropdown': ?>
			<label for="<?php echo $option['name']; ?>">
				<select name="<?php echo $option['name']; ?>" id="<?php echo $id; ?>" <?php echo $option['disabled'].$option['override'] ?>>

					<?php foreach( $option['options'] as $val => $choice ):
						if( $val == $current )
							$selected = 'selected="selected"';
						else
							$selected = ''; ?>
						<option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $choice; ?></option>

					<?php endforeach; ?>

				</select>
			</label>
			<?php break;

		case 'textarea':
			if( !$current && isset($option['std']) ) { $current = $option['std']; } ?>
			<textarea <?php echo $option['disabled'].$option['override'] ?> name="<?php echo $option['name']; ?>" id="<?php echo $id; ?>" rows="8" cols="70"><?php echo $current; ?></textarea>
			<?php break;

		case 'textarea_code':
			if( !$current && isset($option['std']) ) { $current = $option['std']; } ?>
			<textarea name="<?php echo $option['name']; ?>" id="<?php echo $id; ?>" rows="4" cols="60" class="code" readonly><?php echo $current; ?></textarea>
			<?php break;

		case 'html': ?>
			<p><?php echo $option['html']; ?></p>
			<?php break;

	endswitch;

	// Add the field description
	if ( isset( $option['desc'] ) && $option['desc'] != '' ) {
		echo wp_kses_post( sprintf( '<p class="description">%1$s</p>', $option['desc'] ) );
	};

}