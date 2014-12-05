// JavaScript Document

function UserNameNullCheck(){
	if(document.getElementById("LoginUserName").value==""){
		document.getElementById("UserNameJS").innerHTML="Παρακαλώ συμπληρώστε το πεδίο";
	}else{
		document.getElementById("UserNameJS").innerHTML="";
	}
}

function PasswordNullCheck(){
	if(document.getElementById("LoginPassword").value==""){
		document.getElementById("PasswordJS").innerHTML="Παρακαλώ συμπληρώστε το πεδίο";
	}else{
		document.getElementById("PasswordJS").innerHTML="";
	}
}