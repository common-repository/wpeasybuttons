<?php
	/*
	Plugin Name: WP EasyButtons
	Plugin URI: http://www.wpct.de/r/wpeasybuttons
	Description: Plugin generates CSS3 Buttons via shortcodes inspired by CSS3 Tutorial at <a href="http://www.webdesignerwall.com/tutorials/css3-gradient-buttons">webdesignerwall.com</a> HowTo Use Help: <a href="http://www.wpct.de/r/wpeasybuttons">Overview</a>
	Author: Birgit Olzem
	Author URI: http://www.birgitolzem.de
	Version: 1.0
	*/

add_action('wp_print_styles', 'wpeasy_styles');
function wpeasy_styles() {
        $myStyleUrl = WP_PLUGIN_URL . '/wpEasyButtons/wpeasybuttons.css';
        $myStyleFile = WP_PLUGIN_DIR . '/wpEasyButtons/wpeasybuttons.css';
        if ( file_exists($myStyleFile) ) {
            wp_register_style('wpeasybuttons', $myStyleUrl);
            wp_enqueue_style( 'wpeasybuttons');
        }
    }


function wpeasy_button_shortcode ( $atts, $content = null) {

extract( shortcode_atts( array(
      'color' => '', 
      'size' => '', 
      'type' => '', 
      'align' => '', 
	   ), $atts ) );
      return '<span class="easybutton ' . $size . ' ' . $color . ' ' . $align . ' ' . $type . '">' . $content . '</span>';

}
add_shortcode('button', 'wpeasy_button_shortcode');

function wpeasy_linkbutton_shortcode ( $atts, $content = null) {

extract( shortcode_atts( array(
      'color' => '', 
      'size' => '', 
      'type' => '', 
      'align' => '', 
	  'link' => '',
      ), $atts ) );
      return '<a href="' . $link . '" class="easybutton ' . $size . ' ' . $color . ' ' . $align . ' ' . $type . '">' . $content . '</a>';

}
add_shortcode('linkbutton', 'wpeasy_linkbutton_shortcode');

add_filter('the_content', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');

add_action( 'edit_form_advanced', 'wpeasybuttons_quicktags');
add_action( 'edit_page_form', 'wpeasybuttons_quicktags');

function wpeasybuttons_quicktags()
{
    ?>
    <script type="text/javascript" charset="utf-8">
    // <![CDATA[
        //edButton(id, display, tagStart, tagEnd, access, open)
        edbuttonlength = edButtons.length;
        edbuttonlength_t = edbuttonlength;
       
        edButtons[edbuttonlength++] = new edButton('ed_btn_red','rot','[button color="red"]','[/button]');
        edButtons[edbuttonlength++] = new edButton('ed_btn_blue','blau','[button color="blue"]','[/button]');
        edButtons[edbuttonlength++] = new edButton('ed_btn_green','gruen','[button color="green"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_black','schwarz','[button color="black"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_gray','grau','[button color="gray"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_white','weiss','[button color="white"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_orange','orange','[button color="orange"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_rosy','rosa','[button color="rosy"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_pink','pink','[button color="pink"]','[/button]');
		//farbig und Form
		edButtons[edbuttonlength++] = new edButton('ed_btn_redrnd','rot','[button color="red" type="bigrounded"]','[/button]');
        edButtons[edbuttonlength++] = new edButton('ed_btn_blue_rnd','blau','[button color="blue" type="bigrounded"]','[/button]');
        edButtons[edbuttonlength++] = new edButton('ed_btn_green_rnd','gruen','[button color="green" type="bigrounded"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_black_rnd','schwarz','[button color="black" type="bigrounded"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_gray_rnd','grau','[button color="gray" type="bigrounded"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_white_rnd','weiss','[button color="white" type="bigrounded"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_orange_rnd','orange','[button color="orange" type="bigrounded"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_rosy_rnd','rosa','[button color="rosy" type="bigrounded"]','[/button]');
		edButtons[edbuttonlength++] = new edButton('ed_btn_pink_rnd','pink','[button color="pink" type="bigrounded"]','[/button]');
            //alert(edButtons[edButtons.length]);
               (function(){
 
              if (typeof jQuery === 'undefined') {
                     return;
              }
              jQuery(document).ready(function(){
                     jQuery("#ed_toolbar").append('<br/>Farbige Buttons <input type="button" value="rot" id="ed_btn_red" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t);" title="roter Button" />');
                     jQuery("#ed_toolbar").append('<input type="button" value="blau" id="ed_btn_blue" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+1);" title="blauer Button" />');
                     jQuery("#ed_toolbar").append('<input type="button" value="gruen" id="ed_btn_green" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+2);" title="gruener Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="schwarz" id="ed_btn_black" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+3);" title="schwarzer Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="grau" id="ed_btn_gray" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+4);" title="grauer Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="weiss" id="ed_btn_white" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+5);" title="weisser Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="orange" id="ed_btn_orange" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+6);" title="oranger Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="rosa" id="ed_btn_rosy" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+7);" title="rosa Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="pink" id="ed_btn_pink" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+8);" title="pinker Button" />');
					 //farbig und Form
					   jQuery("#ed_toolbar").append('<br />Farbige runde Buttons <input type="button" value="rot rund" id="ed_btn_redrnd" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+9);" title="roter Button" />');
                     jQuery("#ed_toolbar").append('<input type="button" value="blau" id="ed_btn_blue_rnd" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+10);" title="blauer Button" />');
                     jQuery("#ed_toolbar").append('<input type="button" value="gruen" id="ed_btn_green_rnd" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+11);" title="gruener Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="schwarz" id="ed_btn_black_rnd" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+12);" title="schwarzer Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="grau" id="ed_btn_gray_rnd" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+13);" title="grauer Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="weiss" id="ed_btn_white_rnd" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+14);" title="weisser Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="orange" id="ed_btn_orange_rnd" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+15);" title="oranger Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="rosa" id="ed_btn_rosy_rnd" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+16);" title="rosa Button" />');
					 jQuery("#ed_toolbar").append('<input type="button" value="pink" id="ed_btn_pink_rnd" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+17);" title="pinker Button" />');
					 
              });
       }());
    // ]]>
    </script>
    <?php
 
}
		
		
?>
