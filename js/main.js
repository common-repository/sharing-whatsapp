/*
Plugin Name: Sharing WhatsApp 
Plugin URI: http://stores.dotsquares.com/
Version: 1.0
Author: Dotsquares
Author URI: http://dotsquares.com
Description: Display the whatsapp_sharing and answer   using short code  [whatsapp_sharing] in post and page. 
*/
(function ($) {
 	 $.fn.wsBtn = function(options) {
// Configuration   
var settings = $.extend({
			// These are the defaults.
			message			: "This button fires only in devices.",
			bgColor			: "#090",
			container		: ".post",
			target			: "h3"
		}, options );   
 this.each(function(){
			// Variables
			var el 			= $(this);
			var box			= el.find(settings.container);
			var targetTo	= box.find(settings.target);
			var aTag		= targetTo.find('a');
			var devices		= /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
			
			// Conditional Check
			if(aTag && devices){
				// appending WhatsApp Sharing button to container
				box.append("<a href='#' class='wa_btn wa_btn_s' data-text='more info' data-href=''><i class='fa fa-whatsapp'></i>WhatsApp Share</a>");
			}
	
			// Data Manipulation
			box.on('click','.wa_btn',function(){
				var url 	= $(this).parent(box).find(aTag).attr('href');
				var txt		= $(this).parent(box).find(targetTo).text();
				var wmsg	= encodeURIComponent(txt)+" - "+encodeURIComponent(url);
				var wurl	= 'whatsapp://send?text='+wmsg;
				
				$(this).attr('href',wurl);
				$(this).attr('data-href',url);
				$(this).attr('data-text',txt);				
			});
			
		});
    };
 
}( jQuery ));