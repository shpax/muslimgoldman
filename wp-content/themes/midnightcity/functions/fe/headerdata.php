<?php
/**
 * Headerdata of Theme options.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/  

// additional js and css
if(	!is_admin()){
function midnightcity_fonts_include () {
global $midnightcity_options_db;
// Google Fonts
$bodyfont = $midnightcity_options_db['midnightcity_body_google_fonts'];
$headingfont = $midnightcity_options_db['midnightcity_headings_google_fonts'];
$descriptionfont = $midnightcity_options_db['midnightcity_description_google_fonts'];
$headlinefont = $midnightcity_options_db['midnightcity_headline_google_fonts'];
$headlineboxfont = $midnightcity_options_db['midnightcity_headline_box_google_fonts'];
$postentryfont = $midnightcity_options_db['midnightcity_postentry_google_fonts'];
$sidebarfont = $midnightcity_options_db['midnightcity_sidebar_google_fonts'];
$menufont = $midnightcity_options_db['midnightcity_menu_google_fonts'];
$topmenufont = $midnightcity_options_db['midnightcity_top_menu_google_fonts'];

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$headlineboxfonturl = $fonturl.$headlineboxfont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
$topmenufonturl = $fonturl.$topmenufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('midnightcity-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('midnightcity-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('midnightcity-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('midnightcity-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('midnightcity-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('midnightcity-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('midnightcity-google-font8', $menufonturl);
		 }
     if ($topmenufont != 'default' && $topmenufont != ''){
      wp_enqueue_style('midnightcity-google-font9', $topmenufonturl);
		 }
     if ($headlineboxfont != 'default' && $headlineboxfont != ''){
      wp_enqueue_style('midnightcity-google-font10', $headlineboxfonturl); 
		 }
}
add_action( 'wp_enqueue_scripts', 'midnightcity_fonts_include' );
}

// additional js and css
function midnightcity_css_include () {
global $midnightcity_options_db;    
    if ($midnightcity_options_db['midnightcity_css'] == 'Blue-Green' ){
			wp_enqueue_style('midnightcity-style-blue-green', get_template_directory_uri().'/css/blue-green.css');
		}
    
    if ($midnightcity_options_db['midnightcity_css'] == 'Orange-Green' ){
			wp_enqueue_style('midnightcity-style-orange-green', get_template_directory_uri().'/css/orange-green.css');
		}
    
    if ($midnightcity_options_db['midnightcity_css'] == 'Red-Blue' ){
			wp_enqueue_style('midnightcity-style-red-blue', get_template_directory_uri().'/css/red-blue.css');
		}
    
    if ($midnightcity_options_db['midnightcity_css'] == 'Turquoise-Violet' ){
			wp_enqueue_style('midnightcity-style-turquoise-violet', get_template_directory_uri().'/css/turquoise-violet.css');
		}
}
add_action( 'wp_enqueue_scripts', 'midnightcity_css_include' );

// Display sidebar
function midnightcity_display_sidebar() {
global $midnightcity_options_db;
    $display_sidebar = $midnightcity_options_db['midnightcity_display_sidebar']; 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('#wrapper #container #content { width: 100%; } #wrapper #main-content .cycloneslider, #wrapper #main-content .header-image { max-width: 100%;                     
}', 'midnightcity'); ?>
<?php } 
}

// Display header Search Form - header content width
function midnightcity_display_search_form() {
global $midnightcity_options_db;
    $display_search_form = $midnightcity_options_db['midnightcity_display_search_form']; 
		if ($display_search_form == 'Hide') { ?>
		<?php _e('#wrapper #header .header-content .site-title, #wrapper #header .header-content .site-description, #wrapper #header .header-content .header-logo { max-width: 100%; }', 'midnightcity'); ?>
<?php } 
}

// TEXT COLORS AND FONTS
// Body font
function midnightcity_get_body_font() {
global $midnightcity_options_db;
    $bodyfont = $midnightcity_options_db['midnightcity_body_google_fonts'];
    if ($bodyfont != 'default' && $bodyfont != '') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper #container #comments .comment, #wrapper #container #comments .comment time, #wrapper #container #commentform .form-allowed-tags, #wrapper #container #commentform p, #wrapper input, #wrapper select { font-family: "', 'midnightcity'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'midnightcity'); ?>
<?php } 
}

// Site title font
function midnightcity_get_headings_google_fonts() {
global $midnightcity_options_db;
    $headingfont = $midnightcity_options_db['midnightcity_headings_google_fonts']; 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #header .site-title { font-family: "', 'midnightcity'); ?><?php echo $headingfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'midnightcity'); ?>
<?php } 
}

// Site description font
function midnightcity_get_description_font() {
global $midnightcity_options_db;
    $descriptionfont = $midnightcity_options_db['midnightcity_description_google_fonts']; 
    if ($descriptionfont != 'default' && $descriptionfont != '') { ?>
    <?php _e('#wrapper #header .site-description {font-family: "', 'midnightcity'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'midnightcity'); ?>
<?php } 
}

// Page/post headlines font
function midnightcity_get_headlines_font() {
global $midnightcity_options_db;
    $headlinefont = $midnightcity_options_db['midnightcity_headline_google_fonts'];
    if ($headlinefont != 'default' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #container .navigation .section-heading, #wrapper #container .panel-row-style-midnightcity .widget-title, #wrapper #container .panel-row-style-midnightcity .entry-headline, #wrapper #comments .entry-headline { font-family: "', 'midnightcity'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'midnightcity'); ?>
<?php } 
}

// MidnightCity Posts Widgets headlines font
function midnightcity_get_headline_box_google_fonts() {
global $midnightcity_options_db;
    $headline_box_google_fonts = $midnightcity_options_db['midnightcity_headline_box_google_fonts']; 
		if ($headline_box_google_fonts != 'default' && $headline_box_google_fonts != '') { ?>
		<?php _e('#wrapper #container #main-content section .entry-headline { font-family: "', 'midnightcity'); ?><?php echo $headline_box_google_fonts ?><?php _e('", Arial, Helvetica, sans-serif; }', 'midnightcity'); ?>
<?php } 
}

// Post entry font
function midnightcity_get_postentry_font() {
global $midnightcity_options_db;
    $postentryfont = $midnightcity_options_db['midnightcity_postentry_google_fonts']; 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline, #wrapper #main-content .slides li, #wrapper #main-content .home-list-posts ul li, #wrapper #main-content .home-thumbnail-posts .thumbnail-hover { font-family: "', 'midnightcity'); ?><?php echo $postentryfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'midnightcity'); ?>
<?php } 
}

// Sidebar and Footer widget headlines font
function midnightcity_get_sidebar_widget_font() {
global $midnightcity_options_db;
    $sidebarfont = $midnightcity_options_db['midnightcity_sidebar_google_fonts'];
    if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget .sidebar-headline, #wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "', 'midnightcity'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'midnightcity'); ?>
<?php } 
}

// Main Header menu font
function midnightcity_get_menu_font() {
global $midnightcity_options_db;
    $menufont = $midnightcity_options_db['midnightcity_menu_google_fonts']; 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper #header .menu-box ul li { font-family: "', 'midnightcity'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'midnightcity'); ?>
<?php } 
}

// Top Header menu font
function midnightcity_get_top_menu_font() {
global $midnightcity_options_db;
    $topmenufont = $midnightcity_options_db['midnightcity_top_menu_google_fonts']; 
		if ($topmenufont != 'default' && $topmenufont != '') { ?>
		<?php _e('#wrapper #top-navigation-wrapper .top-navigation ul li { font-family: "', 'midnightcity'); ?><?php echo $topmenufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'midnightcity'); ?>
<?php } 
}

// User defined CSS.
function midnightcity_get_own_css() {
global $midnightcity_options_db;
    $own_css = $midnightcity_options_db['midnightcity_own_css']; 
		if ($own_css != '') { ?>
		<?php echo esc_attr($own_css); ?>
<?php } 
}

// Display custom CSS.
function midnightcity_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php midnightcity_get_own_css(); ?>
<?php midnightcity_display_sidebar(); ?>
<?php midnightcity_display_search_form(); ?>
<?php midnightcity_get_body_font(); ?>
<?php midnightcity_get_headings_google_fonts(); ?>
<?php midnightcity_get_description_font(); ?>
<?php midnightcity_get_headlines_font(); ?>
<?php midnightcity_get_headline_box_google_fonts(); ?>
<?php midnightcity_get_postentry_font(); ?>
<?php midnightcity_get_sidebar_widget_font(); ?>
<?php midnightcity_get_menu_font(); ?>
<?php midnightcity_get_top_menu_font(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'midnightcity_custom_styles');	?>