<?php

	require_once("../includes/dbconnect.php");
	
	if($_POST[Name]==NULL || $_POST[SurName]==NULL || $_POST[UserName]==NULL || $_POST[Password]==NULL || $_POST[RePassword]==NULL || $_POST[Mail]==NULL){
		header("Location: /~www38031/admin/register.php?Register=Null");
		die();
	}	
	if((preg_match('/[^αβγδεζηθικλμνξοπρστυφχψωάέήίόύώςΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΜΡΣΤΥΦΧΨΩΆΈΉΊΌΎΏA-Za-z.#\\-$]/', $_POST[Name]))){
		header("Location: /~www38031/admin/register.php?Register=Numeric");
		die();
	}
	if((preg_match('/[^αβγδεζηθικλμνξοπρστυφχψωάέήίόύώςΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΜΡΣΤΥΦΧΨΩΆΈΉΊΌΎΏA-Za-z.#\\-$]/', $_POST[SurName]))){
		header("Location: /~www38031/admin/register.php?Register=Numeric");
		die();
	}
	if(strlen($_POST[Password])<6){
		header("Location: /~www38031/admin/register.php?Register=SmallPassword");
		die();
	}	
	
	$query="SELECT UserName FROM Users WHERE UserName='$_POST[UserName]'";
	$result=$db->MakeQuery($query);
	$rowcount=$db->GetRecordCount($result);
	if($rowcount==1){
		header("Location: /~www38031/admin/register.php?Register=UserNameFail");
		die();
	}
	$query="SELECT Password FROM Users WHERE Password=md5('$_POST[Password]')";
	$result=$db->MakeQuery($query);
	$rowcount=$db->GetRecordCount($result);
	if($rowcount==1){
		header("Location: /~www38031/admin/register.php?Register=PasswordFail");
		die();
	}
	$query="SELECT Mail FROM Users WHERE Mail='$_POST[Mail]'";
	$result=$db->MakeQuery($query);
	$rowcount=$db->GetRecordCount($result);
	if($rowcount==1){
		header("Location: /~www38031/admin/register.php?Register=MailFail");
		die();
	}
	if($_POST[Password]!=$_POST[RePassword]){
		header("Location: /~www38031/admin/register.php?Register=RePasswordFail");
		die();
	}	
	
	include_once("../includes/functions.php");
	if(isValidEmail($_POST[Mail])==false){	   
		header("Location: /~www38031/admin/register.php?Register=MailTrueFail");
		die();
	}
	
	$query="INSERT INTO Users (Name, Surname, UserName, Password, Mail) VALUES ('$_POST[Name]','$_POST[SurName]','$_POST[UserName]',md5('$_POST[Password]'),'$_POST[Mail]')";
	$db->MakeQuery($query);
	
	$db->Close();
	
	header("Location: /~www38031/admin/register.php?Sucess=True");

?>