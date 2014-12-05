// JavaScript Document

function RestChooseStep3Check(){
	if(document.getElementById("LessRestaurants").value==""){
		document.getElementById("LessRestaurantsJS").innerHTML="Δεν επιλέξατε εστιατόριο/α";
	}else{
		document.getElementById("LessRestaurantsJS").innerHTML="";
	}
}