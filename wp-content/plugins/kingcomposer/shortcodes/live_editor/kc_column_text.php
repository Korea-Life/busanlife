<#

var atts = ( data.atts !== undefined ) ? data.atts : {}, el_class = [];

el_class = kc.front.el_class( atts );
el_class.push( 'kc_text_block' );

if( atts['class'] !== undefined && atts['class'] !== '' )
	el_class.push( atts['class'] );

#>

<div class="{{el_class.join(' ')}}">{{{top.switchEditors.wpautop(data._content)}}}</div>