<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Τροποποίηση προσωπικών δεδομένων</title>
<link href="../../stylesheets/main.css" rel="stylesheet" type="text/css" />

<script src="../../jscripts/logout.js" type="text/javascript"></script>
<script src="../../jscripts/dataprocess.js" type="text/javascript"></script>

</head>

<body>
<div class="BodyLayer">
	<div id="LogoLayer">
        	<p><img id="ImgLogo1" src="../../images/snapshot2.png" /></p>
    </div>
    <div>
<?php
	include_once("../../includes/functions.php");
	if (!isAuthenticatedUser()){
		echo '<p><h1>Δεν έχετε δικαίωμα πρόσβασης σε αυτή τη σελίδα</h1></p><meta http-equiv="Refresh" content="4; url=../../index.php" /><p style="font-size:10px" align="center">We redirect you automatically</p>';
		echo '<div id="InfoLayer">
	        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
    		</div>';
			die();
	}
?>
		<div id="TopMenu">
			<table class="UserOptionsTable">
        		<tr>
        			<td align="right" id="Cells" style="width:80%"><a id="InTableLink" href="data_process.php">Τροποποίηση προσωπικών δεδομένων <img src="../../images/05_icon_settings(cog).jpg" /></a></td>
                	<td align="right" id="Cells" style="width:20%"><a id="InTableLink" href="logout.php" onclick="Goodbye()">Αποσύνδεση <img src="../../images/logout.gif" /></a></td>
        		</tr>
        	</table>
        </div>
        
        <div id="MenuLayer">
        	<table class="BrowseTable">
            	<tr><td id="Cells"><a id="InTableLink" href="restaurant_add.php"><img src="../../images/add.gif" /> Εισαγωγή Εστιατορίου</a></td></tr>
                <tr><td id="Cells"><a id="InTableLink" href="restaurant_show.php"><img src="../../images/view.png" /> Προβολή Εστιατορίων</a></td></tr>
                <tr><td id="Cells"><a id="InTableLink" href="restaurant_process.php"><img src="../../images/05_icon_settings(cog).jpg" /> Τροποποίηση Στοιχείων Εστιατορίου</a></td></tr>
                <tr><td id="Cells"><a id="InTableLink" href="restaurant_choose_step1.php"><img src="../../images/survey.jpg" /> Επιλογή Εστιατορίου</a></td></tr>
            </table>
        </div>
        
        <div id="MainLayer">
        	<p align="center"><img style="width:17%; height:17%" src="../../images/personalData-2.jpg" /></p>
			<?php					
						if(isset($_GET["Sucess"])){
							if($_GET["Sucess"]=="True"){
								echo '<p align="center" style="color:#0F0; font-size:30px">Τα στοιχεία σας καταχωρήθηκαν με επιτυχία</p>';
								echo '<meta http-equiv="Refresh" content="3; url=/~www38031/admin/mainpage/main.php">';
							}								
						}
			?>
			<form action="data_process_check.php" method="post" name="DataProcessForm" id="DataProcessForm" enctype="multipart/form-data">
            	<fieldset>
    			<legend align="left">Φόρμα Τροποποίησης Προσωπικών Δεδομένων</legend>
                <table align="center">
                	<tr>
                    	<td align="left"><p><strong>Όνομα:</strong></p></td>
                        <td align="right"><p><input type="text" name="Name" id="Name" maxlength="20" value="<?php echo $_SESSION[Name] ?>" onblur="NameCheck()" /></p></td>
                        <td>
                        <p id="NameJS" style="color:#F00"></p>
						    <?php 
								if(isset($_GET["ProcessError"])){
									if($_GET["ProcessError"]=="NullFailed"){
										echo '<p align="right" style="color:#F00">Δε συμπληρώσατε όλα τα στοιχεία της φόρμας</p>';
									}								
								}
								if(isset($_GET["ProcessError"])){
									if($_GET["ProcessError"]=="Numeric"){
										echo '<p align="right" style="color:#F00">Παρακαλούμε όχι αριθμούς στα πεδία "Όνομα" και "Επώνυμο"</p>';
									}								
								}
							?>                      
                        </td>
                    </tr>
                    <tr>
                    	<td align="left"><p><strong>Επώνυμο:</strong></p></td>
                        <td align="right"><p><input type="text" name="SurName" id="SurName" maxlength="25" value="<?php echo $_SESSION[Surname] ?>" onblur="SurNameCheck()" /></p></td>
                        <td id="SurnameJS" style="color:#F00"></td>
                    </tr>
                    <tr>
                    	<td align="left"><p><strong>Username:</strong></p></td>
                        <td align="right"><p><input type="text" name="UserName" id="UserName" maxlength="15" value="<?php echo $_SESSION[UserName] ?>" onblur="UserNameCheck()" onfocus="UserNameAlert()" /></p></td>
                        <td>
                        <p id="UsernameJS" style="color:#F00"></p>
                        <?php 
								if(isset($_GET["ProcessError"])){
									if($_GET["ProcessError"]=="UserNameFailed"){
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
								if(isset($_GET["ProcessError"])){
									if($_GET["ProcessError"]=="PasswordFailed"){
										echo '<p align="right" style="color:#F00">To Password που εισαγάγατε χρησιμοποιείται ήδη</p>';
									}								
								}
								if(isset($_GET["ProcessError"])){
									if($_GET["ProcessError"]=="SmallPassword"){
										echo '<p align="right" style="color:#F00">To Password που εισαγάγατε είναι μικρότερο από 6 χαρακτήρες</p>';
									}								
								}
						?>
                        </td>
                    </tr>
                    <tr><td colspan="2" id="PasswordJS2" style="color:#00F"; align="justify"></td></tr>
                     <tr>
                    	<td align="left"><p><strong>Re-Password:</strong></p></td>
                        <td align="right"><p><input type="password" name="RePassword" id="RePassword" maxlength="12" onchange="RePasswordCheck2()" onblur="RePasswordCheck()" /></p></td>
                        <td>
                        <p id="RePasswordJS" style="color:#F00"></p>
                        <?php 
								if(isset($_GET["ProcessError"])){
									if($_GET["ProcessError"]=="RePasswordFailed"){
										echo '<p align="right" style="color:#F00">To Password που εισαγάγατε δεν είναι έγκυρο</p>';
									}								
								}
						?>
                        </td>
                    </tr>
                    <tr>
                    	<td align="left"><p><strong>E-Mail:</strong></p></td>
                        <td align="right"><p><input type="text" name="Mail" id="Mail" maxlength="50" value="<?php echo $_SESSION[Mail] ?>" onblur="MailCheck()" /></p></td>
                        <td>
                        <p id="MailJS" style="color:#F00"></p>
                        <?php 
								if(isset($_GET["ProcessError"])){
									if($_GET["ProcessError"]=="MailFailed"){
										echo '<p align="right" style="color:#F00">To Mail που εισαγάγατε χρησιμοποιείται ήδη</p>';
									}								
								}
								if(isset($_GET["ProcessError"])){
									if($_GET["ProcessError"]=="MailTrueFailed"){
										echo '<p align="right" style="color:#F00">To Mail που εισαγάγατε δεν είναι έγκυρο</p>';
									}								
								}
						?>
                        </td>
                    </tr>
                    <tr>
                    	<td align="center" colspan="2"><p><input type="submit" name="Save" id="Save" value="Αποθήκευση" /></p></td>
                    </tr>
                </table>
	           	</fieldset>
            </form>
	
	
        </div>
        
	</div>
    <div id="InfoLayer">
        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
    </div>
</div>
</body>
</html>