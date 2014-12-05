<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Εγγραφή χρήστη</title>
<link href="../stylesheets/register.css" rel="stylesheet" type="text/css" />

<script src="../jscripts/register.js" type="text/javascript"></script>

</head>

<body>
	<div class="BodyLayer">
    	<div id="LogoLayer">
        	<p><img id="ImgLogo1" src="../images/snapshot2.png" /></p>
    	</div>
		<div id="FormLayer">
            <?php	
                        if(isset($_GET["Sucess"])){
							if($_GET["Sucess"]=="True"){
								echo '<p align="center" style="color:#0F0; font-size:30px">Έχετε εγγραφεί στο σύστημα με επιτυχία</p>';
								echo '<meta http-equiv="Refresh" content="3; url=/~www38031/index.php">';
							}								
						}
						else{
							echo '<p align="center"><img style="width:20%; height:15%" src="../images/register_1.png" /></p><h1>Παρακαλούμε εισάγεται τα δεδομένα της φόρμας</h1>';
						}
			?>
        	<form action="register_check.php" method="post" name="Register" id="Register" enctype="multipart/form-data">
            	<fieldset>
    			<legend align="left">Φόρμα Εισαγωγής Προσωπικών Δεδομένων</legend>
                <table align="center">
                	<tr>
                    	<td align="left"><p><strong>Όνομα:</strong></p></td>
                        <td align="right"><p><input type="text" name="Name" id="Name" maxlength="20" onblur="NameCheck()" /></p></td>
                        <td>
                        	<p id="NameJS" style="color:#F00"></p>
                        	<?php 
								if(isset($_GET["Register"])){
									if($_GET["Register"]=="Null"){
										echo '<p align="right" style="color:#F00">Δε συμπληρώσατε όλα τα στοιχεία της φόρμας</p>';
									}								
								}
								if(isset($_GET["Register"])){
									if($_GET["Register"]=="Numeric"){
										echo '<p align="right" style="color:#F00">Παρακαλούμε όχι αριθμούς στα πεδία "Όνομα" και "Επώνυμο"</p>';
									}								
								}
							?>
                        </td>
                    </tr>
                    <tr>
                    	<td align="left"><p><strong>Επώνυμο:</strong></p></td>
                        <td align="right"><p><input type="text" name="SurName" id="SurName" maxlength="25" onblur="SurNameCheck()" /></p></td>
                        <td id="SurnameJS" style="color:#F00"></td>
                    </tr>
                    <tr>
                    	<td align="left"><p><strong>Username:</strong></p></td>
                        <td align="right"><p><input type="text" name="UserName" id="UserName" maxlength="15" onblur="UserNameCheck()" onclick="UserNameAlert()" /></p></td>
                        <td>
                        <p id="UsernameJS" style="color:#F00"></p>
                        <?php
                        	if(isset($_GET["Register"])){
								if($_GET["Register"]=="UserNameFail"){
									echo '<p align="right" style="color:#F00">To UserName που εισαγάγατε χρησιμοποιείται ήδη</p>';
								}								
							}
						?>
                        </td>
                    </tr>
                    <tr><td colspan="2" id="UsernameJS2" style="color:#00F"; align="justify"></td></tr>
                    <tr>
                    	<td align="left"><p><strong>Password:</strong></p></td>
                        <td align="right"><p><input type="password" name="Password" id="Password" maxlength="12" onblur="PasswordCheck();PasswordLength()" onfocus="PasswordAlert()" /></p></td>
                        <td>
                        <p id="PasswordJS" style="color:#F00"></p>
                        <?php
                        	if(isset($_GET["Register"])){
								if($_GET["Register"]=="PasswordFail"){
									echo '<p align="right" style="color:#F00">To Password που εισαγάγατε χρησιμοποιείται ήδη</p>';
								}								
							}
							if(isset($_GET["Register"])){
								if($_GET["Register"]=="SmallPassword"){
									echo '<p align="right" style="color:#F00">To Password που εισαγάγατε είναι μικρότερο από 6 χαρακτήρες</p>';
								}								
							}
						?>
                        </td>
                    </tr>
                    <tr><td colspan="2" id="PasswordJS2" style="color:#00F"; align="justify"></td></tr>
                     <tr>
                    	<td align="left"><p><strong>Re-Password:</strong></p></td>
                        <td align="right"><p><input type="password" name="RePassword" id="RePassword" maxlength="12" onchange="RePasswordCheck2()" onfocus="RePasswordCheck()" /></p></td>
                        <td>
                        <p id="RePasswordJS" style="color:#F00"></p>
                        <?php
                        	if(isset($_GET["Register"])){
								if($_GET["Register"]=="RePasswordFail"){
									echo '<p align="right" style="color:#F00">To Password που εισαγάγατε δεν είναι έγκυρο</p>';
								}								
							}
						?>
                        </td>
                    </tr>
                    <tr>
                    	<td align="left"><p><strong>E-Mail:</strong></p></td>
                        <td align="right"><p><input type="text" name="Mail" id="Mail" maxlength="50" onblur="MailCheck()" /></p></td>
                        <td>
                        <p id="MailJS" style="color:#F00"></p>
                        <?php
                        	if(isset($_GET["Register"])){
								if($_GET["Register"]=="MailFail"){
									echo '<p align="right" style="color:#F00">To Mail που εισαγάγατε χρησιμοποιείται ήδη</p>';
								}								
							}
							if(isset($_GET["Register"])){
								if($_GET["Register"]=="MailTrueFail"){
									echo '<p align="right" style="color:#F00">To Mail που εισαγάγατε δεν είναι έγκυρο</p>';
								}								
							}		
						?>
                        </td>
                    </tr>
                    <tr>
                    	<td align="center" ><p><input type="submit" name="Register" id="Register" value="Εγγραφή"/></p></td>
                        <td align="center" ><p><input type="reset" name="Reset" id="Reset" value="Καθαρισμός" /></p></td>
                    </tr>
                </table>
	           	</fieldset>
            </form>            
            <p><a href="../index.php"><img src="../images/back_arrow.png" />Επιστροφή στην Αρχική</a></p>
        </div>       
        <div id="InfoLayer">
        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
        </div>
    </div>

</body>
</html>