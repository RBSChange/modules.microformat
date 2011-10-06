//class name that can be parsed by xmf_parser :
var xmfMicroformat = new Array('.vcard', '.hproduct', '.vevent', '.hreview', '.hresume', '.hlisting');

var isMicroformatPresent = false;
for (var xmf in xmfMicroformat)
{
    microformat = jQuery(xmfMicroformat[xmf]);
    if (microformat.length > 0)
    {
	microformat.each(function(index){
	    var mfElement = jQuery(this);
	    var imgId = mfElement.attr('class') + '_' + index;
	    
	    mfElement.prepend( 
		'<div class="mf-validator" style="background: #BFCFFE;">' +
		    '<img id="' + imgId + '" src="/changeicons/small/help.png">'+
		    '<span>Microformat Validator: '+ mfElement.attr('class') + '</span>' +
	       '</div>'
	    );
	    jMicroformatValidator(mfElement, imgId);
	});
	isMicroformatPresent = true;
    }
}

if(isMicroformatPresent)
{
    jQuery('body').append('<input type="button" value="click here to hide Microformat validator" class="mf-validator" id="mf_hidden_button"/>');
    
    jQuery('#mf_hidden_button').click(function(){
	jQuery('.mf-validator').slideUp();
    });
}
function jMicroformatValidator(microformat, imageId)
{ 
    var html = {html: microformat.parent().html()}
    jQuery.post("/index.php?module=microformat&action=MicroformatValidator", html, 
	function(data) {
	    var microformats = jQuery.parseJSON(data);
	    var report = 'MF validator report:\n';
	    var isOnError = false;
	    var isMicroFormat = false;

	    for (var i in microformats)
	    {
		if (i == 'errors')
		{
		    for (var err in microformats[i])
		    {
			report += microformats[i][err].description + ' line: ' + microformats[i][err].line + '\n';
		    }
		    jQuery('#' + imageId).attr('src', '/changeicons/small/error.png');
		    isOnError = true;
		}
		else
		{
		    for (var format in microformats[i])
		    {
			report += 'Format: ' + format + '\n';
			isMicroFormat = true;
		    }
		}
	    }
	    if (isMicroFormat)
	    {
		 if (!isOnError)
		{
		    report += 'OK\n';
		    jQuery('#' + imageId).attr('src', '/changeicons/small/check.png');
		}
	    }
	    else
	    {
		jQuery('#' + imageId).attr('src', '/changeicons/small/help.png');
		report += 'No microformat found!\n';   
	    }
	    report += '\nClick OK for details\n';

	    jQuery('.mf-validator:has(' + '#' + imageId +')').click(function (){
		if (confirm(report))
		{
		    alert('XMF Complete JSON report:\n' + data);
		}
	    });
	}
    );
};