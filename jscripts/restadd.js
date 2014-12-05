// JavaScript Document

function RestNameCheck(){
	if(document.getElementById("RName").value==""){
		document.getElementById("RNameJS").innerHTML="Παρακαλώ συμπληρώστε το πεδίο";
	}else{
		document.getElementById("RNameJS").innerHTML="";
	}
}

function SMessageDisplay(){
	document.getElementById("RSiteJS").innerHTML="Αυτό το πεδίο δεν είναι απαραίτητο";
}

function PMessageDisplay(){
	document.getElementById("RPhoneJS").innerHTML="Αυτό το πεδίο δεν είναι απαραίτητο";
}

function RestAddressCheck(){
	if(document.getElementById("RAddress").value==""){
		document.getElementById("RAddressJS").innerHTML="Παρακαλώ συμπληρώστε το πεδίο";
	}else{
		document.getElementById("RAddressJS").innerHTML="";
	}
}

function NMessageDisplay(){
	document.getElementById("RNotesJS").innerHTML="Αυτό το πεδίο δεν είναι απαραίτητο";
}

function CategoryCheck(){
	if(document.getElementById("TagList").value=="Default"){
		document.getElementById("CategoriesJS").innerHTML="Δεν επιλέξατε κατηγορία";
	}else{
		document.getElementById("CategoriesJS").innerHTML="";
	}
}