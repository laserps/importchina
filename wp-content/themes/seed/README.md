Seed
===

WordPress starter theme, based on Underscore. Please see <a href="https://th.seedthemes.com/seed-kit/">Seed Kit</a> for more information in Thai language.

## Change Log

### 1.4.3
* Fix: Now "_desktop" CSS class support SiteOrigin Page Builder 2.5.2 (Flexbox).
* Fix: Maledpan font path in wp-editor-style.css.
* Tweak: wp-editor-style.css now support child theme.


### 1.4.2
* New: Support WooCommerce 3 Product Gallery
* Tweak: Support One Page site (Close mobile menu after selected).
*	Fix: Wrong fonts path.

### 1.4.1
* New: Settings: Font Awesome (Enable / Disable).
* New: Settings: Framework (Bootstrap 3 Minimal / Bootstrap 3 / Bootstrap 4).
* New: CSS for mobile (.seed-grid-mobile-2 / .seed-grid-mobile-3).
* Fix: Error on license page when using wrong license.
* Fix: Slidebars not show on desktop.

### 1.4.0
* New: Theme Settings.
* New: Mobile menu option (Dropdown and Off-canvas).
* New: Off-Canvas menu option (Small and Large size).
* New: Animated menu icon for mobile.
* New: Header option now support both mobile and desktop.
* Tweak: Move Seed License to Theme Settings page.

### 1.3.2
* New: Loop Template - Content Caption (Pagination).
* New: Loop Template - Content Card with Excerpt (Pagination).
* New: Loop Template - Content Card (Pagination).

### 1.3.1
* New: Loop Template - List (Pagination).
* New: Loop Template - List with Excerpt (Pagination).
* New: Jetpack infinite scroll support.
* Fix: Table with in News Table Content Template.
* Fix: Min-height for very small header.

### 1.3.0
* New: Content Template - Content Caption.
* New: Content Template - Product Card with Excerpt.
* New: Loop Content Template - News Table.
* Fix: Space below site-header.
* Fix: CSS for bottom admin bar.

### 1.2.9
* New: Front-Page now support Blog layouts.
* New: for WooCommerce, Thai province order when using Thai. (เรียงชื่อจังหวัด ก.-ฮ.)
* Tweak: Move Maledpan font to /vendor/fonts/ to support Seed Fonts plugin.
* Tweak: Adjust margin-bottom of heading tags (h1,h2,h3,..).


### 1.2.8
* New: SEED_ADMIN_BAR in functions.php - we can choose to show on top/bottom or hide admin bar.
* Fix: PHP short tag bug for some servers. (Now all code is '<?php')

### 1.2.7
* Fix: Small size in Text Widget.

### 1.2.6
* New: SEED_BLOG_LAYOUT in functions.php - now can choose blog layout (full-width, leftbar, rightbar)
* New: SEED_BLOG_COLUMNS in fuctions.php - now can display more columns (2,3,4,5,6) with Content Card layout.
* New: SEED_SHOP_LAYOUT in fuctions.php - now can choose WooCommerce Shop layout (full-width, leftbar, rightbar)
* New: SEED_SHOP_MAINPAGE in fuctions.php - now can choose WooCommerce default setting (default) or page content / page builder (page-builder) for main page.
* Fix: Use WooCommerce shop_catalog size instead of shop_thumbnail size.
* Fix: Dropdown not show if choose SEED_HEADER = standard.


### 1.2.5
* Fix: Change code to support PHP < 5.5
* New: CSS for WordPress Comment

### 1.2.4
* New: Auto Theme Updater (using license from SeedThemes.com)
* New: Seed Configurations in functions.php (for SEED_LAYOUT, SEED_HEADER and SEED_MENU).
* New: WooCommerce Breadcrumb.
* New: Landing Page Template, blank page template, no header/footer.
* Tweak: Change default layout to fixed-header.

### 1.2.3
* Fix: Sidebar layout on search.php
* Maledpan font: Final version.
* Change CSS to match Maledpan font.
* Add more content template: content-product-card, content-product-list to display WooCommerce Products with SiteOrigin Post Loop.

### 1.2.2
* Add Maledpan font (beta).
* Change archive content class (content.php), from .content-item.-list to .content-item.-archive and make it easier to read on mobile.
* Adjust WooCommerce CSS to match Maledpan font.

### 1.2.1
* Fix: added -rightbar class to index.php.

### 1.2.0
* Better support WooCommerce.
* Add Shopbar widget area.

### 1.1.0
* Add more content template in /template-parts/ .
* Support SiteOrigin Page Builder's Post Loop.
* Introducting Seed Grid to use with Post Loop. (CSS Class such as Seed-Grid-1, Seed-Grid-6)
* Add Headbar and Footbar widget area.

### 1.0.0
* First public version.