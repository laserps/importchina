jQuery(document).ready(function ($) {
	/**
	 * Cache selectors
	 */
	var inputEnable = $('#seed-settings-is-enabled');
		inputHeaderMobile = $('#seed-settings-header-mobile');
		inputHeaderDesktop = $('#seed-settings-header-desktop');
		inputLayout = $('#seed-settings-layout');
		inputMenu = $('#seed-settings-menu');
		inputMenuIcon = $('#seed-settings-menu-icon');
		inputBlogLayout = $('#seed-settings-blog-layout');
		inputBlogColumns = $('#seed-settings-blog-columns');
		inputShopLayout = $('#seed-settings-shop-layout');
		inputShopMainpage = $('#seed-settings-shop-mainpage');
		inputAdminBar = $('#seed-settings-admin-bar');
		inputFramework = $('#seed-settings-framework');
		inputFontawesome = $('#seed-settings-fontawesome');

		formSeedSettings = $('#seed-settings-form');

	/**
	 * Conditional Logic
	 */
	function seed_settings_is_enabled() {
		var is_enabled = inputEnable.prop('checked');

		// Check form control is overrided.
		inputHeaderMobile.prop('disabled', !is_enabled);
		inputHeaderDesktop.prop('disabled', !is_enabled);
		inputLayout.prop('disabled', !is_enabled);
		inputMenu.prop('disabled', !is_enabled);
		inputMenuIcon.prop('disabled', !is_enabled);
		inputBlogLayout.prop('disabled', !is_enabled);
		inputBlogColumns.prop('disabled', !is_enabled);
		inputShopLayout.prop('disabled', !is_enabled);
		inputShopMainpage.prop('disabled', !is_enabled);
		inputAdminBar.prop('disabled', !is_enabled);
		inputFramework.prop('disabled', !is_enabled);
		inputFontawesome.prop('disabled', !is_enabled);
	}

	/**
	 * Trigger functions when DOM is ready
	 */
	seed_settings_is_enabled();

	/**
	 * Output CSS live
	 */
	inputEnable.on('change', function () {
		seed_settings_is_enabled();
	});

	formSeedSettings.on( 'submit', function ( event ) {
		inputHeaderMobile.prop('disabled', false);
		inputHeaderDesktop.prop('disabled', false);
		inputLayout.prop('disabled', false);
		inputMenu.prop('disabled', false);
		inputMenuIcon.prop('disabled', false);
		inputBlogLayout.prop('disabled', false);
		inputBlogColumns.prop('disabled', false);
		inputShopLayout.prop('disabled', false);
		inputShopMainpage.prop('disabled', false);
		inputAdminBar.prop('disabled', false);
		inputFramework.prop('disabled', false);
		inputFontawesome.prop('disabled', false);
	});

});