<?php
	
	require_once("../../includes/functions.php");
	
	if($_POST[RestaurantsProcessList]==NULL){
		header("Location: /~www38031/admin/mainpage/restaurant_process.php?Error=RestaurantNull");
		die();
	}	
	if($_POST[RPURL]=="http://" && $_POST[RTagsList]==NULL && $_POST[RPPhone]=="210-" && $_POST[RPAddress]==NULL){
		header("Location: /~www38031/admin/mainpage/restaurant_process.php?Error=FormNull");
		die();
	}	
		
	$query="SELECT URL FROM Restaurants WHERE Name NOT LIKE '$_POST[RestaurantsProcessList]' AND URL='$_POST[RPURL]'";
	$result=$db->MakeQuery($query);
	$rowcount=$db->GetRecordCount($result);
	if($rowcount==1){
		header("Location: /~www38031/admin/mainpage/restaurant_process.php?ProcessError=URLFail");
		die();
	}
	
	$query="SELECT Phone FROM Restaurants WHERE Name NOT LIKE '$_POST[RestaurantsProcessList]' AND Phone='$_POST[RPPhone]'";
	$result=$db->MakeQuery($query);
	$rowcount=$db->GetRecordCount($result);
	if($rowcount==1){
		header("Location: /~www38031/admin/mainpage/restaurant_process.php?ProcessError=PhoneFail");
		die();
	}
	
	$query="SELECT Address FROM Restaurants WHERE Name NOT LIKE '$_POST[RestaurantsProcessList]' AND Address='$_POST[RPAddress]'";
	$result=$db->MakeQuery($query);
	$rowcount=$db->GetRecordCount($result);
	if($rowcount==1){
		header("Location: /~www38031/admin/mainpage/restaurant_process.php?ProcessError=AddressFail");
		die();
	}
		
	if($_POST[RPURL]!="http://" && $_POST[RPPhone]=="210-" && $_POST[RPAddress]==NULL && $_POST[RTagsList]==NULL){
				
		$query="UPDATE Restaurants SET URL='$_POST[RPURL]' WHERE Name='$_POST[RestaurantsProcessList]'";
		$db->MakeQuery($query);			
	
	}
	elseif($_POST[RPURL]=="http://" && $_POST[RPPhone]!="210-" && $_POST[RPAddress]==NULL && $_POST[RTagsList]==NULL){
		
		$query="UPDATE Restaurants SET Phone='$_POST[RPPhone]' WHERE Name='$_POST[RestaurantsProcessList]'";
		$db->MakeQuery($query);
		
	}
	elseif($_POST[RPURL]=="http://" && $_POST[RPPhone]=="210-" && $_POST[RPAddress]!=NULL && $_POST[RTagsList]==NULL){
		
		$query="UPDATE Restaurants SET Address='$_POST[RPAddress]' WHERE Name='$_POST[RestaurantsProcessList]'";
		$db->MakeQuery($query);
		
	}
	elseif($_POST[RPURL]=="http://" && $_POST[RPPhone]=="210-" && $_POST[RPAddress]==NULL && $_POST[RTagsList]!=NULL){
		
		updateTableRelationRT();
		
	}
	elseif($_POST[RPURL]!="http://" && $_POST[RPPhone]!="210-" && $_POST[RPAddress]==NULL && $_POST[RTagsList]==NULL){
		
		$query="UPDATE Restaurants SET URL='$_POST[RPURL]', Phone='$_POST[RPPhone]' WHERE Name='$_POST[RestaurantsProcessList]'";
		$db->MakeQuery($query);
		
	}
	elseif($_POST[RPURL]!="http://" && $_POST[RPPhone]=="210-" && $_POST[RPAddress]!=NULL && $_POST[RTagsList]==NULL){
		
		$query="UPDATE Restaurants SET URL='$_POST[RPURL]', Address='$_POST[RPAddress]' WHERE Name='$_POST[RestaurantsProcessList]'";
		$db->MakeQuery($query);
		
	}
	elseif($_POST[RPURL]!="http://" && $_POST[RPPhone]=="210-" && $_POST[RPAddress]==NULL && $_POST[RTagsList]!=NULL){
		
		$query="UPDATE Restaurants SET URL='$_POST[RPURL]' WHERE Name='$_POST[RestaurantsProcessList]'";
		$db->MakeQuery($query);
		updateTableRelationRT();
		
	}
	elseif($_POST[RPURL]=="http://" && $_POST[RPPhone]!="210-" && $_POST[RPAddress]!=NULL && $_POST[RTagsList]==NULL){
		
		$query="UPDATE Restaurants SET Phone='$_POST[RPPhone]', Address='$_POST[RPAddress]' WHERE Name='$_POST[RestaurantsProcessList]'";
		$db->MakeQuery($query);
		
	}
	elseif($_POST[RPURL]=="http://" && $_POST[RPPhone]!="210-" && $_POST[RPAddress]==NULL && $_POST[RTagsList]!=NULL){
		
		$query="UPDATE Restaurants SET Phone='$_POST[RPPhone]' WHERE Name='$_POST[RestaurantsProcessList]'";
		$db->MakeQuery($query);
		updateTableRelationRT();
		
	}
	elseif($_POST[RPURL]=="http://" && $_POST[RPPhone]=="210-" && $_POST[RPAddress]!=NULL && $_POST[RTagsList]!=NULL){
		
		$query="UPDATE Restaurants SET Address='$_POST[RPAddress]' WHERE Name='$_POST[RestaurantsProcessList]'";
		$db->MakeQuery($query);
		updateTableRelationRT();
		
	}
	elseif($_POST[RPURL]!="http://" && $_POST[RPPhone]!="210-" && $_POST[RPAddress]!=NULL && $_POST[RTagsList]!=NULL){
		
		$query="UPDATE Restaurants SET Address='$_POST[RPAddress]', URL='$_POST[RPURL]', Phone='$_POST[RPPhone]' WHERE Name='$_POST[RestaurantsProcessList]'";
		$db->MakeQuery($query);
		updateTableRelationRT();
		
	}
	
	header("Location: /~www38031/admin/mainpage/restaurant_process.php?Sucess=True");
	
	$db->Close();
	
?>