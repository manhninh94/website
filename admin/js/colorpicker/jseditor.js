/*======================================================================*\
|| #################################################################### ||
|| # Copyright ©2000–2004 Jelsoft Enterprises Ltd. All Rights Reserved. ||
|| #################################################################### ||
\*======================================================================*/

// #############################################################################
// lets define the browser we have instead of multiple calls throughout the file
var userAgent = navigator.userAgent.toLowerCase();
var is_opera  = (userAgent.indexOf('opera') != -1);
var is_saf    = ((userAgent.indexOf('safari') != -1) || (navigator.vendor == "Apple Computer, Inc."));
var is_webtv  = (userAgent.indexOf('webtv') != -1);
var is_ie     = ((userAgent.indexOf('msie') != -1) && (!is_opera) && (!is_saf) && (!is_webtv));
var is_ie4    = ((is_ie) && (userAgent.indexOf("msie 4.") != -1));
var is_moz    = ((navigator.product == 'Gecko') && (!is_saf));
var is_kon    = (userAgent.indexOf('konqueror') != -1);
var is_ns     = ((userAgent.indexOf('compatible') == -1) && (userAgent.indexOf('mozilla') != -1) && (!is_opera) && (!is_webtv) && (!is_saf));
var is_ns4    = ((is_ns) && (parseInt(navigator.appVersion) == 4));
// #############################################################################
// let's find out what DOM functions we can use
var vbDOMtype = '';
if (document.getElementById)
{
	vbDOMtype = "std";
}
else if (document.all)
{
	vbDOMtype = "ie4";
}
else if (document.layers)
{
	vbDOMtype = "ns4";
}

// make an array to store cached locations of objects called by fetch_object
var vBobjects = new Array();

// #############################################################################
// function to emulate document.getElementById
function fetch_object(idname, forcefetch)
{
	if (forcefetch || typeof(vBobjects[idname]) == "undefined")
	{
		switch (vbDOMtype)
		{
			case "std":
			{
				vBobjects[idname] = document.getElementById(idname);
			}
			break;

			case "ie4":
			{
				vBobjects[idname] = document.all[idname];
			}
			break;

			case "ns4":
			{
				vBobjects[idname] = document.layers[idname];
			}
			break;
		}
	}
	return vBobjects[idname];
}

