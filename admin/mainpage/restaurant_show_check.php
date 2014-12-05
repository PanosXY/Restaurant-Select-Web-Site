<?php

	require_once("../../includes/dbconnect.php");
	
	$x=$_POST[RestaurantsList];
	
	if($x==NULL || $_POST[LikeButton]==NULL){
		header("Location: /~www38031/admin/mainpage/restaurant_show.php?Error=Null");
		die();
	}
	
	foreach($x as $y){
		$query="SELECT ID FROM Restaurants WHERE Name='$y'";
		$result=$db->MakeQuery($query);
		$rid=mysql_result($result,0);
	
		$query="SELECT RID,UID FROM Relation_RU WHERE RID=$rid AND UID=$_SESSION[ID]";
		$result=$db->MakeQuery($query);
		$existrowcount=$db->GetRecordCount($result);
	
		if($existrowcount==1){
			$query="UPDATE Relation_RU SET IsLiked='$_POST[LikeButton]' WHERE RID=$rid AND UID=$_SESSION[ID]";
			$db->MakeQuery($query);
		}
		else{
			$query="INSERT INTO Relation_RU(RID,UID,IsLiked) VALUES($rid,$_SESSION[ID],'$_POST[LikeButton]')";
			$db->MakeQuery($query);
		}
	}
	
	header("Location: /~www38031/admin/mainpage/restaurant_show.php?Sucess=True");
	
	$db->Close();
	
?>