<?php 

// Include custom navwalker
require_once('inc/bs4navwalker.php');

add_action('get_header', 'my_filter_head');

function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

function bootstrapstarter_wp_setup() {
    add_theme_support( 'title-tag' );
    // This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
}
add_action( 'init', 'bootstrapstarter_wp_setup' );

function bootstrapstarter_register_menu() {
    register_nav_menu('header-menu', __( 'Header Menu' ));
}
add_action( 'init', 'bootstrapstarter_register_menu' );

function bootstrapstarter_register_footer_menu() {
    register_nav_menu('footer-menu', __( 'Footer Menu' ));
}
add_action( 'init', 'bootstrapstarter_register_footer_menu' );

function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<nav class="d-flex justify-content-center my-4 wow fadeIn"><ul class="pagination pagination-circle pg-info mb-0">' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="page-item page-prev">%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="page-item active"' : ' class="page-item"';
 
        printf( '<li%s><a href="%s" class="page-link">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li class="page-item">…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="page-item active"' : ' class="page-item"';
        printf( '<li%s><a href="%s" class="page-link">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li class="page-item">…</li>' . "\n";
 
        $class = $paged == $max ? ' class="page-item active"' : ' class="page-item"';
        printf( '<li%s><a href="%s" class="page-link">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="page-item page-next">%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></nav>' . "\n";
 
}


// wp theme setting
function build_options_page() { ?>
<div id="theme-options-wrap">
    <div class="icon32" id="icon-tools"> <br /> </div>
    <h2>Theme Settings</h2>
    <p>Update various settings throughout your website.</p>
    <form method="post" action="options.php" enctype="multipart/form-data">
        <?php settings_fields('theme_options'); ?>
        <?php do_settings_sections(__FILE__); ?>
        <p class="submit">
            <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
        </p>
    </form>
</div>
<?php }
add_action('admin_init', 'register_and_build_fields');
function register_and_build_fields() {
    register_setting('theme_options', 'theme_options', 'validate_setting');
    add_settings_section('homepage_settings', 'Homepage Settings', 'section_homepage', __FILE__);
    function section_homepage() {}
    add_settings_field('logooption', 'Logo Option', 'logo_option', __FILE__, 'homepage_settings');
    add_settings_field('logotext', 'Logo Text', 'logo_text', __FILE__, 'homepage_settings');
    add_settings_field('logoimage', 'Logo Image URL (300px x 60px)', 'logo_image', __FILE__, 'homepage_settings');
}

function validate_setting($theme_options) {
    return $theme_options;
}

function logo_option()
{
    $options = get_option('theme_options');  
    echo "<select name='theme_options[logo_type]'><option value='text' ".($options['logo_type']=='text' ? 'selected' : '').">Text</option><option value='image' ".($options['logo_type']=='image' ? 'selected' : '').">Image</option></select>";
}

function logo_text()
{
    $options = get_option('theme_options');  
    echo "<input name='theme_options[logo_text]' type='text' value='{$options['logo_text']}' />";
}

function logo_image()
{
    $options = get_option('theme_options');  
    echo "<input name='theme_options[logo_image]' type='text' value='{$options['logo_image']}' />";
}

add_action('admin_menu', 'theme_options_page');
function theme_options_page() {  
    add_options_page('Theme Settings', 'Theme Settings', 'administrator', __FILE__, 'build_options_page');
}