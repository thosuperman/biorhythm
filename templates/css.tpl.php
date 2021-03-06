<script>
/*!
loadCSS: load a CSS file asynchronously.
[c]2014 @scottjehl, Filament Group, Inc.
Licensed MIT
*/
function loadCSS( href, before, media, callback ){
	"use strict";
	// Arguments explained:
	// `href` is the URL for your CSS file.
	// `before` optionally defines the element we'll use as a reference for injecting our <link>
	// By default, `before` uses the first <script> element in the page.
	// However, since the order in which stylesheets are referenced matters, you might need a more specific location in your document.
	// If so, pass a different reference element to the `before` argument and it'll insert before that instead
	// note: `insertBefore` is used instead of `appendChild`, for safety re: http://www.paulirish.com/2011/surefire-dom-element-insertion/
	var ss = window.document.createElement( "link" );
	var ref = before || window.document.getElementsByTagName( "script" )[ 0 ];
	var sheets = window.document.styleSheets;
	ss.rel = "stylesheet";
	ss.href = href;
	// temporarily, set media to something non-matching to ensure it'll fetch without blocking render
	ss.media = "only x";
	ss.onload = callback || function() {};
	// inject link
	ref.parentNode.insertBefore( ss, ref );
	// This function sets the link's media back to `all` so that the stylesheet applies once it loads
	// It is designed to poll until document.styleSheets includes the new sheet.
	function toggleMedia(){
		var defined;
		for( var i = 0; i < sheets.length; i++ ){
			if( sheets[ i ].href && sheets[ i ].href.indexOf( href ) > -1 ){
				defined = true;
			}
		}
		if( defined ){
			ss.media = media || "all";
		}
		else {
			setTimeout( toggleMedia );
		}
	}
	toggleMedia();
	return ss;
}
loadCSS('<?php echo base_url(); ?>/min/b=css&f=fonts.css,normalize.css,install-button.css,jquery.listnav.css,jquery.contextMenu.css,bootstrap.css,m-styles.css,default.css,ui-blue/jquery-ui.css,nprogress.css&449');
</script>
<noscript><link rel="stylesheet" href="/min/b=css&amp;f=fonts.css,normalize.css,install-button.css,jquery.listnav.css,jquery.contextMenu.css,bootstrap.css,m-styles.css,default.css,ui-blue/jquery-ui.css,nprogress.css&amp;449" /></noscript>
<link rel="stylesheet" href="/min/f=css/print.css" media="print" />