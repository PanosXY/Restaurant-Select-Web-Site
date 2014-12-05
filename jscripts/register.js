// JavaScript Document

function NameCheck(){
	if(!(document.getElementById("Name").value.match(/^[a-zA-ZαβγδεζηθικλμνξοπρστυφχψωάέήίόύώςΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΜΡΣΤΥΦΧΨΩΆΈΉΊΌΎΏ]+$/))){
		document.getElementById("NameJS").innerHTML="Όχι αριθμούς, σύμβολα και κενά";
	}else{
		document.getElementById("NameJS").innerHTML="";
	}
}

function SurNameCheck(){
	if(!(document.getElementById("SurName").value.match(/^[a-zA-ZαβγδεζηθικλμνξοπρστυφχψωάέήίόύώςΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΜΡΣΤΥΦΧΨΩΆΈΉΊΌΎΏ]+$/))){
		document.getElementById("SurnameJS").innerHTML="Όχι αριθμούς, σύμβολα και κενά";
	}else{
		document.getElementById("SurnameJS").innerHTML="";
	}
}

function UserNameCheck(){
	if(document.getElementById("UserName").value==""){
		document.getElementById("UsernameJS").innerHTML="Παρακαλώ συμπληρώστε το πεδίο";
	}else{
		document.getElementById("UsernameJS").innerHTML="";
	}
}

function UserNameAlert(){
	document.getElementById("UsernameJS2").innerHTML="Προσοχή:<br />Yπάρχει διάκριση μεταξύ<br />κεφαλαίων-πεζών,<br />Αγγλικών-Ελληνικών χαρακτήρων<br />και αριθμών-συμβόλων";
}

function PasswordCheck(){
	if(document.getElementById("Password").value==""){
		document.getElementById("PasswordJS").innerHTML="Παρακαλώ συμπληρώστε το πεδίο";
	}else{
		document.getElementById("PasswordJS").innerHTML="";
	}
}

function PasswordLength(){
	if(document.getElementById("Password").value.length<6){
		document.getElementById("PasswordJS").innerHTML="Όχι λιγότερο από 6 χαρακτήρες";
	}else{
		document.getElementById("PasswordJS").innerHTML="";
	}
}		

function PasswordAlert(){
	document.getElementById("PasswordJS2").innerHTML="Προσοχή:<br />Yπάρχει διάκριση μεταξύ<br />κεφαλαίων-πεζών,<br />Αγγλικών-Ελληνικών χαρακτήρων<br />και αριθμών-συμβόλων";
}

function RePasswordCheck(){
	if(document.getElementById("RePassword").value==""){
		document.getElementById("RePasswordJS").innerHTML="Παρακαλώ συμπληρώστε το πεδίο";
	}
}

function RePasswordCheck2(){
	if(document.getElementById("RePassword").value!=document.getElementById("Password").value){
		document.getElementById("RePasswordJS").innerHTML="Ο κωδικός που εισαγάγατε δεν αντιστοιχεί με τον προεισαχθέντα";
	}else{
		document.getElementById("RePasswordJS").innerHTML="";
	}
}

function MailCheck(){
	if(document.getElementById("Mail").value==""){
		document.getElementById("MailJS").innerHTML="Παρακαλώ συμπληρώστε το πεδίο";
	}else{
		document.getElementById("MailJS").innerHTML="";
	}
}