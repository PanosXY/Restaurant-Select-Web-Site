// JavaScript Document

function RestChooseStep2Check(){
	if(document.getElementById("NotLikedTags").value==""){
		document.getElementById("NotLikedTagsJS").innerHTML="Δεν επιλέξατε κατηγορία/ες";
	}else{
		document.getElementById("NotLikedTagsJS").innerHTML="";
	}
}