// JavaScript Document

function RestListCheck(){
	if(document.getElementById("RestaurantsProcessList").value==""){
		document.getElementById("RListJS").innerHTML="Δεν επιλέξατε εστιατόριο";
	}else{
		document.getElementById("RListJS").innerHTML="";
	}
}

function SubmitCheck(){
	if(document.getElementById("RPURL").value=="http://" && document.getElementById("RPPhone").value=="210-" && document.getElementById("RPAddress").value=="" && document.getElementById("RTagsList").value=="DefaultTag"){
		document.getElementById("TListJS").innerHTML="Δεν συμπληρώσατε κανένα πεδίο";
	}else{
		document.getElementById("TListJS").innerHTML="";
	}
}