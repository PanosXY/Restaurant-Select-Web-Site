// JavaScript Document

function Goodbye(){
	var date=new Date();
	var hours=date.getHours();
	if(hours>0 && hours<=12){
		alert("Καλή σας ημέρα!");
	}
	if(hours>12 && hours<=19){
		alert("Καλό σας απόγευμα!");
	}
	if(hours>19 && hours<=23){
		alert("Καλό σας βράδυ!");
	}
}