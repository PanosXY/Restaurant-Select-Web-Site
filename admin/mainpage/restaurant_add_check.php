<?php
	require_once("../../includes/dbconnect.php");
	
	if($_POST[RName]==NULL || $_POST[RAddress]==NULL || $_POST[TagList]==NULL || $_POST[LikeButton]==NULL){
		header("Location: /~www38031/admin/mainpage/restaurant_add.php?Error=Null");
		die();
	}
	
	$query="SELECT Name FROM Restaurants WHERE Name='$_POST[RName]'";	
	$result=$db->MakeQuery($query);
	$rnamerowcount=$db->GetRecordCount($result);
	$query="SELECT URL FROM Restaurants WHERE URL='$_POST[RSite]'";	
	$result=$db->MakeQuery($query);
	$rsiterowcount=$db->GetRecordCount($result);
	$query="SELECT Phone FROM Restaurants WHERE Phone='$_POST[RPhone]'";	
	$result=$db->MakeQuery($query);
	$rphonerowcount=$db->GetRecordCount($result);
	$query="SELECT Address FROM Restaurants WHERE Address='$_POST[RAddress]'";
	$result=$db->MakeQuery($query);
	$raddrrowcount=$db->GetRecordCount($result);
	if($rnamerowcount==1 || $raddrrowcount==1 || $rsiterowcount==1 || $rphonerowcount==1){
		header("Location: /~www38031/admin/mainpage/restaurant_add.php?Error=Exist");
		die();
	}
	
	if($_POST[RSite]=="http://"){ 
		$_POST[RSite]="";
	}
	if($_POST[RPhone]=="210-"){
		$_POST[RPhone]="";
	}
	
	$query="INSERT INTO Restaurants(Name, URL, Phone, Address, Notes) VALUES('$_POST[RName]','$_POST[RSite]','$_POST[RPhone]','$_POST[RAddress]','$_POST[RNotes]')";
	$result=$db->MakeQuery($query);
	
	$query="SELECT ID FROM Restaurants WHERE Name='$_POST[RName]'";
	$result=$db->MakeQuery($query);
	$rid=mysql_result($result,0);
	
	$query="SELECT ID FROM Tags WHERE Name='$_POST[TagList]'";
	$result=$db->MakeQuery($query);
	$tid=mysql_result($result,0);
	
	$query="INSERT INTO Relation_RT(RID, TID) VALUES($rid,$tid)";
	$result=$db->MakeQuery($query);
	
	$query="INSERT INTO Relation_RU(RID, UID, IsLiked) VALUES($rid, $_SESSION[ID], '$_POST[LikeButton]')";
	$result=$db->MakeQuery($query);
	
	$db->Close();
	
	header("Location: /~www38031/admin/mainpage/restaurant_add.php?Sucess=True");
	
?>