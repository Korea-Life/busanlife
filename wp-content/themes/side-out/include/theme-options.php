<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
/*
 * social media hyper links custom option
 *
 * @sideout
 *
 * Admin Options for Sideout 
 * File Name: theme-options.php
 */
$sideout_theme_options = array(
    'phonenumber' => '',
    'facebookurl' => '',
    'twitterurl'  => '',
    'googleurl'   => '',
    'backgrnd'    => '',
    'sideout_onetwo'   => '',
    'sideout_confirm'  => '',
    'sideout_credits'  => '',
    'sideout_new_text' => ''

);
add_action( 'admin_menu', 'sideout_options_add_page' ); 
function sideout_options_add_page() {
    add_theme_page( __('Sideout Options', 'sideout'), __('Theme Options', 'sideout'), 'edit_theme_options', 'sideout-options', 'sideout_options_page' );
}
function sideout_register_settings() {
        register_setting( 'sideout-options', 'sideout_theme_options', 'sideout_validate_options');
    } 
    add_action( 'admin_init', 'sideout_register_settings' );
    // connect stylesheet to options page
function sideout_add_init() {
    wp_enqueue_style( 'sideout-admin-style', get_template_directory_uri() . '/include/admin-style.css', false, '1.1' );
    }
add_action( 'admin_enqueue_scripts', 'sideout_add_init' );
    // color picker add on
add_action( 'admin_enqueue_scripts', 'sideout_add_color_picker' );
function sideout_add_color_picker() {
    // Add the color picker css file       
    wp_enqueue_style( 'wp-color-picker' ); 
    // Include our custom jQuery file with WordPress Color Picker dependency
    wp_enqueue_script( 'wp-color-picker-script', get_template_directory_uri() . '/js/custom-script.js', array( 'wp-color-picker' ), false, true );
}
function sideout_options_page() {
   global $sideout_theme_options;
?>
<div class="wrap options-container">
    <figure> <h1><?php _e( 'Options Page', 'sideout' ); ?> </h1>  </figure>
	<h2><?php _e( 'Sideout Theme Settings', 'sideout' ); ?></h2>
	    <p class="donate"><?php _e( 'For expert customizations to this theme email: themes@tradesouthwest.com', 'sideout' ); ?></p>
	        <form action="options.php" method="POST">
            <?php settings_fields( 'sideout-options' ); ?>
            <?php //do_settings_sections( 'sideout-options' ); 
            $options = get_option( 'sideout_theme_options', $sideout_theme_options );
            ?>
            <hr>         
                <h3><?php _e( 'Add your social media links here', 'sideout' ); ?></h3>
                    <table class="options-table">
        <tr><td><label><?php _e( 'Phone Number', 'sideout' ); ?></label> </td><td> 
<input type="text" name="sideout_theme_options[phonenumber]" size="40" value="<?php echo esc_attr( $options['phonenumber'] ); ?>" /></td></tr>
        <tr><td><label><?php _e( 'Facebook', 'sideout' ); ?></label> </td><td>
        <input type="text" name="sideout_theme_options[facebookurl]" size="40" value="<?php echo esc_url( $options['facebookurl'] ); ?>" /></td</tr>
        <tr><td><label><?php _e( 'Twitter', 'sideout' ); ?></label> </td><td>
        <input type="text" name="sideout_theme_options[twitterurl]" size="40" value="<?php echo esc_url( $options['twitterurl'] ); ?>" /></td</tr>
        <tr><td><label><?php _e( 'Google', 'sideout' ); ?></label> </td><td>
        <input type="text" name="sideout_theme_options[googleurl]" size="40" value="<?php echo esc_url( $options['googleurl'] ); ?>" /></td</tr> </table>
<hr>
                     <h3><?php _e( 'Change Home Page Posts from 2 columns to 1 column.', 'sideout' ); ?></h3>
                         <?php $options_selected = get_option( 'sideout_theme_options', $sideout_theme_options ); ?>
                <table class="options-table"><tr>
                <td><?php _e( 'Select number of Posts columns to show on front page.', 'sideout' ); ?></td>
                <td><select name="sideout_theme_options[sideout_onetwo]" class="select-options-dropdown">

                <option value="c12" <?php if ( $options_selected['sideout_onetwo'] == 'c12' ) echo 'selected="selected"'; ?>><?php _e( 'ONE COLUMN', 'sideout' ); ?> </option> 
                <option value="onetwo"  <?php if ( $options_selected['sideout_onetwo'] == 'onetwo' )  echo 'selected="selected"'; ?>><?php _e( 'TWO COLUMN', 'sideout' ); ?> </option>
                
                </select></td></tr>
                </table>        
                <hr>
                <h3><?php _e( 'Background Color Options', 'sideout' ); ?></h3>
                <table class="options-table"><tr>
                <td><?php _e( 'Change Sidebar-Right and Footer Background Color', 'sideout' ); ?></td>
                <td><input type="text" name="sideout_theme_options[backgrnd]" size="20" value="<?php echo esc_attr( $options['backgrnd'] ); ?>" class="sideout-color-field" /></td></tr>
                </table>
                <hr>         
                    <h3><?php _e( 'Remove Title Date and Metadata from Home Page Article', 'sideout' ); ?></h3>
                    <table class="options-table"><tr>
                    <td><h4><?php _e( 'Type in <code>none</code> to confirm. OR delete <code>none</code> to display.', 'sideout' ); ?></h4></td></tr> 
                    <tr>
                    <td><input name="sideout_theme_options[sideout_confirm]" size="10" type="text" id="sideout_confirm" value="<?php echo $options['sideout_confirm']; ?>" /></td></tr>
                    <tr>
                    <td><?php _e( 'Once you remove this title text the alternative is to write title in manually at the beginning of the article post. Removing title and date gives you better control of header usage.', 'sideout' ); ?></td></tr>
                    </table>
                    <hr>
                        <h3><?php _e( 'Check box to remove credits from theme footer section.', 'sideout' ); ?></h3>
                        <?php  if ( !empty( $options['sideout_credits'] )) {
                               $checked = $options['sideout_credits'];
                               $current = "checked = checked"; } else { $current = ""; } ?>
                        <table class="options-table"><tr>
                        <td><input name="sideout_theme_options[sideout_credits]" id="sideout_credits" type="checkbox" value="1" <?php echo esc_attr( $current ); ?> /><small><?php _e( 'You do not have to leave footer credits but it would be nice.', 'sideout' ); ?></small></td></tr>
                        <tr>
                        <td><p><?php _e( 'Replace the footer credit with your own text here', 'sideout' ); ?></p>
                        <input id="sideout_new_text" name="sideout_theme_options[sideout_new_text]" size="40" type="text" 
value="<?php if (!empty( $options['sideout_new_text'] )) echo esc_attr( $options['sideout_new_text'] ); ?>" /></td></tr>
                        </table>
                        <hr>
                <?php submit_button(); ?>
                </form>
</div>
<?php 
}

function sideout_validate_options( $input ) {
        // Strip all tags from the text field, to avoid vulnerablilties like XSS
        $input['phonenumber']  = wp_filter_post_kses( $input['phonenumber'] );
        $input['facebookurl']  = wp_filter_post_kses( $input['facebookurl'] );
        $input['twitterurl']   = wp_filter_post_kses( $input['twitterurl'] );
        $input['googleurl']    = wp_filter_post_kses( $input['googleurl'] );
        $input['backgrnd']     = wp_filter_post_kses( $input['backgrnd'] );
        $input['sideout_onetwo']   = wp_filter_post_kses( $input['sideout_onetwo'] );
        $input['sideout_confirm']  = wp_filter_post_kses( $input['sideout_confirm'] );
        $input['sideout_credits']  = wp_filter_post_kses( $input['sideout_credits'] );
        $input['sideout_new_text'] = sanitize_text_field( $input['sideout_new_text'] );
           return $input;
}

function sideout_styles_method() {
    wp_enqueue_style(
    'custom-style',
    get_template_directory_uri() . '/include/custom.css'
    );        
$options = get_option( 'sideout_theme_options' );            
            $custom_css = "
                #right-side,.site-footer {
                    background: {$options['backgrnd']};
        }";
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'sideout_styles_method' );

function sideout_styles_method_two() {
    wp_enqueue_style(
    'custom-style-two',
    get_template_directory_uri() . '/include/custom.css'
    );        
$options = get_option( 'sideout_theme_options' );
             $custom_css_two = "
                 body.home #single-post-header .entry-date, body.home #single-post-header .entry-title {
                 display: {$options['sideout_confirm']};
        }";           
        wp_add_inline_style( 'custom-style-two', $custom_css_two );
}
add_action( 'wp_enqueue_scripts', 'sideout_styles_method_two' );
?>