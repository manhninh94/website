function OnPageLoad(){
	// loading message
	if (document.getElementById)
	{  // DOM3 = IE5, NS6
		document.getElementById('loadingcon').style.display = 'none';
	}
	else 
	{
		if (document.layers)
		{  // Netscape 4
			document.loadingcon.display = 'none';
		}
		else 
		{  // IE 4
			document.all.loadingcon.style.display = 'none';
		}
	}
}
//siteconfig
function fillinp(a,b){
	if(document.getElementById(a).type=="radio"){
		if(b=="true") { eval("document.forms[0]."+a+"[0].checked=true"); }
		else { eval("document.forms[0]."+a+"[1].checked=true"); }
	}else{
	   document.getElementById(a).value=b;
	}
}
function DisplayAccessGroup(a)
{
	var x1 = document.getElementById('g_'+a);
	if(x1.style.display == "none") 
	{	
		var img_r_p = document.getElementById('img_'+a).x-220;
		var img_t_p = document.getElementById('img_'+a).y+30;
	
		x1.style.display = 'block';
		x1.style.top = img_t_p+'px';
		x1.style.left = img_r_p+'px';
	}
	else x1.style.display = 'none';
	
}