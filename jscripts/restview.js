// JavaScript Document

function RestListCheck(){
	if(document.getElementById("RestaurantsList").value==""){
		document.getElementById("RestListJS").innerHTML="Δεν επιλέξατε εστιατόρια";
	}else{
		document.getElementById("RestListJS").innerHTML="";
	}
}