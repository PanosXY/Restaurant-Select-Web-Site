// JavaScript Document

function RestChooseStep1Check(){
	if(document.getElementById("UserChoose").value==""){
		document.getElementById("RestChooseJS").innerHTML="Δεν επιλέξατε χρήστη/ες";
	}else{
		document.getElementById("RestChooseJS").innerHTML="";
	}
}