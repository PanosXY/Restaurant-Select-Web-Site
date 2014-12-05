<?php

	require_once("../../includes/dbconnect.php");
		
	if($_POST[Name]==NULL || $_POST[SurName]==NULL || $_POST[UserName]==NULL || $_POST[Password]==NULL || $_POST[RePassword]==NULL || $_POST[Mail]==NULL){
		header("Location: /~www38031/admin/mainpage/data_process.php?ProcessError=NullFailed");
		die();
	}	
	if((preg_match('/[^αβγδεζηθικλμνξοπρστυφχψωάέήίόύώςΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΜΡΣΤΥΦΧΨΩΆΈΉΊΌΎΏA-Za-z.#\\-$]/', $_POST[Name]))){
		header("Location: /~www38031/admin/mainpage/data_process.php?ProcessError=Numeric");
		die();
	}
	if((preg_match('/[^αβγδεζηθικλμνξοπρστυφχψωάέήίόύώςΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΜΡΣΤΥΦΧΨΩΆΈΉΊΌΎΏA-Za-z.#\\-$]/', $_POST[SurName]))){
		header("Location: /~www38031/admin/mainpage/data_process.php?ProcessError=Numeric");
		die();
	}
	if(strlen($_POST[Password])<6){
		header("Location: /~www38031/admin/mainpage/data_process.php?ProcessError=SmallPassword");
		die();
	}
	
	$query="SELECT UserName FROM Users WHERE UserName NOT LIKE '$_SESSION[UserName]' AND UserName='$_POST[UserName]'";
	$result=$db->MakeQuery($query);
	$rowcount=$db->GetRecordCount($result);
	if($rowcount==1){
		header("Location: /~www38031/admin/mainpage/data_process.php?ProcessError=UserNameFailed");
		die();
	}
	$query="SELECT Password FROM Users WHERE Password NOT LIKE '$_SESSION[Password]' AND Password=md5('$_POST[Password]')";
	$result=$db->MakeQuery($query);
	$rowcount=$db->GetRecordCount($result);
	if($rowcount==1){
		header("Location: /~www38031/admin/mainpage/data_process.php?ProcessError=PasswordFailed");
		die();
	}
	$query="SELECT Mail FROM Users WHERE Mail NOT LIKE '$_SESSION[Mail]' AND Mail='$_POST[Mail]'";
	$result=$db->MakeQuery($query);
	$rowcount=$db->GetRecordCount($result);
	if($rowcount==1){
		header("Location: /~www38031/admin/mainpage/data_process.php?ProcessError=MailFailed");
		die();
	}
	if($_POST[Password]!=$_POST[RePassword]){
		header("Location: /~www38031/admin/mainpage/data_process.php?ProcessError=RePasswordFailed");
		die();
	}	
	
	include_once("../../includes/functions.php");
	if(isValidEmail($_POST[Mail])==false){	   
		header("Location: /~www38031/admin/mainpage/data_process.php?ProcessError=MailTrueFailed");
		die();
	}	
	
	$query="UPDATE Users SET Name='$_POST[Name]', UserName='$_POST[UserName]', Surname='$_POST[SurName]',Password=md5('$_POST[Password]'), Mail='$_POST[Mail]' WHERE UserName='$_SESSION[UserName]'";
	$result=$db->MakeQuery($query);
	
	$db->Close();
	
	header("Location: /~www38031/admin/mainpage/data_process.php?Sucess=True");
		
?>