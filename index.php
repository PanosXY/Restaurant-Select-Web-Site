<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Το στέκι των φίλων</title>
<link href="stylesheets/index.css" rel="stylesheet" type="text/css" />

<script src="jscripts/index.js" type="text/javascript"></script>

</head>

<body>
	<div class="BodyLayer">
    	<div id="LogoLayer">
        	<table class="LogoTable">
        		<tr>
            		<td align="left" width="700px"><img id="ImgLogo1" src="images/snapshot2.png" /></td>
                	<td align="right" width="250px"><img id="ImgLogo2" src="images/WS140_Home_On_Range_magic_eraser.jpg" /></td>
            	</tr>
        	</table>
    	</div>
    	<div id="MenuLayer">
    		<table class="MenuTable">
        		<tr>
            		<td>
                		<form name="LoginBox" id="LoginBox" method="post" action="admin/login_check.php" enctype="multipart/form-data">
                        	
							<table>
								<tr><td colspan="2"><p style="text-decoration:underline" align="left" >Σύνδεση χρήστη:</p>
                                <img style="width:60%" src="images/img_login.JPG" />
                                <?php
									if (isset($_GET["LoginError"])) {
										switch($_GET["LoginError"]) {
										case "Failed":
										echo '<p style="color:#F00">Δώσατε λανθασμένα στοιχεία.</p>';
										break;
										case "Unauthorized":
										echo '<p style="color:#F00">Αποσυνδεθήκατε γιατί δεν έχετε τα απαραίτητα
										δικαιώματα για πρόσβαση στις αιτείμενες σελίδες.</p>';
										break;
										case "NULLFailed":
										echo '<p style="color:#F00">Συμπληρώστε τα πεδία.</p>';
										break;
										default:
										echo '<p style="color:#F00">Άγνωστη εντολή.</p>';
										break;
										}
									}
								?></td></tr>
								<tr>
									<td align="left"><p><strong>Username:</strong></p></td>
									<td align="right"><input type="text" name="LoginUserName" id="LoginUserName" maxlength="10" onchange="UserNameNullCheck()"/></td>
								</tr>
                                <tr><td id="UserNameJS" style="color:#F00" colspan="2"></td></tr>
								<tr>
									<td align="left"><p><strong>Password:</strong></p></td>
									<td align="right"><input type="password" name="LoginPassword" id="LoginPassword" size="20" maxlength="10" onchange="PasswordNullCheck()" /></td>
								</tr>
                                <tr><td id="PasswordJS" style="color:#F00" colspan="2"></td></tr>
								<tr>
									<td colspan="2">
                                    <p align="left"><input type="submit" name="LoginSubmit" id="LoginSubmit" value="Είσοδος" /></p>
									</td>
								</tr>
							</table>
						</form>
                	</td>
            	</tr>
            	<tr>
            		<td><a href="admin/register.php">Εγγραφή χρήστη<p><img style="width:60%" src="images/RegisterNow_0.jpg" /></p></a></td>
                    
            	</tr>
        	</table>
    	</div>
        <div id="MainLayer">
        	<p><h1>Καλώς ήλθατε στο διαδικτυακό τόπο<br />"Το στέκι των φίλων"</h1></p>           
            <br />
            <p style="text-align:justify">Καλώς ήλθατε στο διαδικτυακό τόπο "Το στέκι των φίλων". Είναι μια σελίδα στην οποία ο εγγεγραμμένος χρήστης μπορεί να επιλέγει μεταξύ μιας μεγάλης βάσης δεδομένων από εστιατόρια, το εστιατόριο της προτίμησής του. Επίσης υπάρχει μια εφαρμογή η οποία επιλέγει τυχαία το μέρος για την έξοδό του χρήστη, σύμφωνα με τις προτιμήσεις του.</p>
            <p>Ακόμη ο χρήστης έχει τις δυνατότητες:</p>
            <ul>
            	<li>Προσθήκη εστιατορίου στη βάση δεδομένων μας</li>
                <li>Χαρακτηρισμός των εστιατορίων με χρήση ετικετών (tags)</li>
            </ul>
            <p><a href="admin/register.php">Εγγραφείτε</a> τώρα και θα έχετε πλήρη είσοδο στον ιστότοπό μας. Σας ευχόμαστε όμορφες εξόδους!</p>
            <p align="center"><img style="width:30%" style="height:30%" src="images/mainpageimg.jpg" /></p>
        </div>
        <div id="InfoLayer">
        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
        </div>

    </div>
</body>
</html>