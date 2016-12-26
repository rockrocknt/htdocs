// JavaScript Document
function loadRow(id) {
		alert("#loadtable-"+id);
	$("#loadtable-"+id).load('response.php?id='+id);
	$.ajaxSetup({ cache: false });
}
function popUp(URL, id) {	
	day = new Date();
	id = day.getTime();
	w = 640;
	h = 600;
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,location=0, scrollbars=1,statusbar=0,menubar=0,width='+w+', height='+h+', top='+top+', left='+left);");	

}
