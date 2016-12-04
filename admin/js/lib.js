// ======================================================= //
// onMouseOver - Row style - changing
// ======================================================= //
function RowOn(Row)
{
  Row.style.backgroundColor = "#F9F9F9";
  Row.style.cursor = "hand";
}
function RowOff(Row)
{
  Row.style.backgroundColor = "#FFFFFF";
}

// ======================================================= //
// Toggle Text Area
// ======================================================= //
function toggleTA(ID,ObjID,i) {
	Obj = document.getElementById(ObjID).innerHTML;
	//<TEXTAREA name="gcat_comment[]" rows="4" cols="50">
	if (i==1) {
		var ReplaceString = "<TEXTAREA name=\"gcat_comment_"+ID+"\" rows=\"4\" cols=\"50\">"+Obj+"</TEXTAREA>";
		document.getElementById(ID+"_editi_1").style.display="none";
		document.getElementById(ID+"_editi_0").style.display="";
	} else if (i==0) {
		Obj = Obj.replace("<TEXTAREA name=gcat_comment_"+ID+" rows=4 cols=50>","");
		Obj = Obj.replace("</TEXTAREA>","");
		var ReplaceString = Obj;
		document.getElementById(ID+"_editi_1").style.display="";
		document.getElementById(ID+"_editi_0").style.display="none";
	}
	document.getElementById(ObjID).innerHTML = ReplaceString;
}
		
// ======================================================= //
// checkbox all
// ======================================================= //
function checkbox_all(form_name,ck_object,ck_button)
{
	var object_array      = document.forms[form_name].elements[ck_object];
	var object_array_len  = object_array.length;
	var cked = document.forms[form_name].elements[ck_button].checked;
	
	if(typeof(object_array_len)=='undefined')
	{
		object_array.checked = cked;
	}
	else
	{
		
		for (var i = 0; i < object_array_len; i++) 
		{
			object_array[i].checked = cked;
		}
	}
}

// ======================================================= //
// window close / open
// ======================================================= //
function window_size(details) {
  var IMG = event.srcElement;
  if (document.getElementById(details).style.display == "") {
    document.getElementById(details).style.display = "none";
	IMG.src = "temp/images/icons/open.gif";
  } else {
    document.getElementById(details).style.display = "";
    IMG.src = "temp/images/icons/close.gif";
  }
}

// ======================================================= //
// collapse all
// ======================================================= //
function collapse_all() {
	var array = new Array();
	var array = document.getElementsByTagName("tbody");
	
	for(var i=1;i<=array.length;i++) {
		try {
		document.getElementById("menu[m"+i+"]").style.display = "none";
		document.getElementById("img[m"+i+"]").src = "temp/images/icons/open.gif";
		} catch(err) { return false; }
	}
	
}
// ======================================================= //
// expand all
// ======================================================= //
function expand_all() {
	var array = document.getElementsByTagName("tbody");
	for(var i=1;i<=array.length;i++) {
		try {
		document.getElementById("menu[m"+i+"]").style.display = "";
		document.getElementById("img[m"+i+"]").src = "temp/images/icons/close.gif";
		} catch (err) { return false; }
	}
}

// ======================================================= //
// option input addition
// ======================================================= //
var numInputs = 1;
function add_more_opt(container)
{
	var inp = document.createElement("input");
	numInputs++;
	inp.setAttribute("id", "opt" + numInputs);
	inp.setAttribute("name", "opt_value[]");
	inp.setAttribute("size", "80");
	container.appendChild(inp);
	
	var inph = document.createElement("input");
	inph.setAttribute("id", "opt" + numInputs);
	inph.setAttribute("name", "opt_hit[]");
	inph.setAttribute("size", "5");
	inph.setAttribute("value", "0");
	container.appendChild(inph);
	
	var a = document.createElement("a");
	a.setAttribute("href", "#");
	a.setAttribute("id", "opt"+numInputs);
	a.onclick = function() { removeInput("opt" + numInputs); return false; }
	a.appendChild(document.createTextNode(" Xóa"));
	a.appendChild(document.createElement("br"));					
	container.appendChild(a);
	
}
function removeInput(id)
{
	var  inp = document.getElementById(id);
	inp.parentNode.removeChild(inp);
	var  inph = document.getElementById(id);
	inph.parentNode.removeChild(inph);
	var  a = document.getElementById(id);
	a.parentNode.removeChild(a);
	--numInputs;
}

function removeInputx(id)
{
	var  inp = document.getElementById(id);
	inp.parentNode.removeChild(inp);
	var  inph = document.getElementById(id);
	inph.parentNode.removeChild(inph);
	var  a = document.getElementById(id);
	a.parentNode.removeChild(a);
	var  inpx = document.getElementById(id);
	inpx.parentNode.removeChild(inpx);
	--numInputs;
}
// ======================================================= //
// menu jump
// ======================================================= //
function menu_jump(url)
{
	if (url.substring(0,5) != "")
	{
		window.location=url;
	}
	else return false;
}

// ======================================================= //
// open new image
// ======================================================= //
function openImageNews(vLink, vWidth,vHeight)
{
	var sLink = (typeof(vLink.href) == 'undefined') ? vLink : vLink.href;

	if (sLink == '')
	{
		return false;
	}

	winDef = 'status=no,resizable=no,scrollbars=no,toolbar=no,location=no,fullscreen=no,titlebar=yes,height='.concat(vHeight).concat(',').concat('width=').concat(vWidth).concat(',');
	winDef = winDef.concat('top=').concat((screen.height - vHeight)/2).concat(',');
	winDef = winDef.concat('left=').concat((screen.width - vWidth)/2);
	newwin = open('', '_blank', winDef);

	newwin.document.writeln('<title>Image Detail</title><body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">');
	newwin.document.writeln('<a href="" onClick="window.close(); return false;"><img src="', sLink, '" alt="', 'Dong lai', '" border=0></a>');
	newwin.document.writeln('</body>');

	if (typeof(vLink.href) != 'undefined')
	{
		return false;
	}
}
// ======================================================= //
// open new window
// ======================================================= //
function showWindow(vLink, vStatus, vResizeable, vScrollbars, vToolbar, vLocation, vFullscreen, vTitlebar, vCentered, vWidth, vHeight, vTop, vLeft)
{
	var sLink = (typeof(vLink.href) == 'undefined') ? vLink : vLink.href;
	
	winDef = '';
	winDef = winDef.concat('status=').concat((vStatus) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('resizable=').concat((vResizeable) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('scrollbars=').concat((vScrollbars) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('toolbar=').concat((vToolbar) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('location=').concat((vLocation) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('fullscreen=').concat((vFullscreen) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('titlebar=').concat((vTitlebar) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('height=').concat(vHeight).concat(',');
	winDef = winDef.concat('width=').concat(vWidth).concat(',');
	
	if (vCentered)
	{
		winDef = winDef.concat('top=').concat((screen.height - vHeight)/2).concat(',');
		winDef = winDef.concat('left=').concat((screen.width - vWidth)/2);
	}
	else
	{
		winDef = winDef.concat('top=').concat(vTop).concat(',');
		winDef = winDef.concat('left=').concat(vLeft);
	}
	
	open(sLink, '_blank', winDef);
	
	if (typeof(vLink.href) != 'undefined')
	{
		return false;
	}
}

function trimAll(sString)
{
	while (sString.substring(0,1) == ' ')
	{
	sString = sString.substring(1, sString.length);
	}
	while (sString.substring(sString.length-1, sString.length) == ' ')
	{
	sString = sString.substring(0,sString.length-1);
	}
	return sString;
}
// ======================================================= //
// AJAX
// USING GET DATA
// ======================================================= //
var rootdomain="http://"+window.location.hostname;
var LoadStr = "<center> Loading ...</center>";

//--------------------------------
// Drag drop
//--------------------------------
var Drag = {

	loadi : null,
	gobj : null, 
	gobjx : 0, gobjy : 0, cx : 0, cy : 0,
	
	init : function(Obj1,Obj2)
	{
		Drag.gobj = Obj2;
		Obj1.onmousedown = Drag.start;
		document.onmousemove = Drag.move;
		document.onmouseup = Drag.end;
	},
	
	start : function(e)
	{
		Drag.loadi = true;
		if(Drag.loadi==true)
		{
			e = Drag.fixE(e);
			
			Drag.gobjx = Drag.gobj.offsetLeft;
			Drag.gobjy = Drag.gobj.offsetTop;
			Drag.cx = e.clientX;
			Drag.cy = e.clientY;
			
			// effect with object
			Drag.gobj.style.MozOpacity = '.75';
			Drag.gobj.style.filter = "Alpha(opacity=75)";
			Drag.gobj.style.opacity = ".75)";
		}
	},
	
	move : function(e)
	{
		if(Drag.loadi==true)
		{
			e = Drag.fixE(e);
			if(Drag.gobj)
			{
				var cx1 = e.clientX;
				var cy1 = e.clientY;
				
				Drag.gobj.style.left = Drag.gobjx + cx1 - Drag.cx;
				Drag.gobj.style.top = Drag.gobjy + cy1 - Drag.cy;
			}
		}
	},
	
	end : function()
	{
		// unefect object
		Drag.gobj.style.MozOpacity = '100';
		Drag.gobj.style.filter = "Alpha(opacity=100)";
		Drag.gobj.style.opacity = "100)";
		
		Drag.loadi = false;
		//Drag.gobj = null;
	},
	
	fixE : function(e)
	{
		if (typeof e == 'undefined') e = window.event;
		if (typeof e.layerX == 'undefined') e.layerX = e.offsetX;
		if (typeof e.layerY == 'undefined') e.layerY = e.offsetY;
		return e;
	}
};

//--------------------------------
// resize windows
//--------------------------------
var Resize = {
	gobj : null,
	
	init : function(obj)
	{
		obj.onmousedown = Resize.start;
	},
	
	start : function(e)
	{
		Resize.gobj = this;
		
		document.onmousemove = Resize.doresize;
		document.onmouseup = Resize.freeobj;
	},
	
	doresize : function(e)
	{
		e = Resize.fixE(e);
		if(Resize.gobj)
		{
			Resize.gobj.style.width = e.clientX;
			Resize.gobj.style.height = e.clientY;
		}
	},
	
	freeobj : function()
	{
		Resize.gobj = null;
	},
	
	fixE : function(e)
	{
		if (typeof e == 'undefined') e = window.event;
		if (typeof e.layerX == 'undefined') e.layerX = e.offsetX;
		if (typeof e.layerY == 'undefined') e.layerY = e.offsetY;
		return e;
	}
};	