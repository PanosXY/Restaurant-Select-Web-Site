<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Επιλογή Εστιατορίου: Βήμα 1</title>
<link href="../../stylesheets/main.css" rel="stylesheet" type="text/css" />

<script src="../../jscripts/logout.js" type="text/javascript"></script>
<script src="../../jscripts/restchoose1.js" type="text/javascript"></script>

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
                <tr><td id="Cells"><a id="InTableLink" href="restaurant_process.php"><img src="../../images/05_icon_settings(cog).jpg" /> Τροποποίηση Στοιχείων Εστιατορίου</a></td></td></tr>
                <tr><td id="Cells"><a id="InTableLink" href="restaurant_choose_step1.php"><img src="../../images/survey.jpg" /> Επιλογή Εστιατορίου</a></td></tr>
            </table>
        </div>
        
        <div id="MainLayer">
        <p align="center"><img style="width:17%; height:17%" src="../../images/choose1.jpg" /></p>
        	<h1>Βήμα 1: Επιλέξτε τους χρήστες που θα συμμετέχουν στην έξοδο</h1>
            
            <form action="restaurant_choose_step1_check.php" method="post" enctype="multipart/form-data" name="Step1" id="Step1" >
            <?php
            	if(isset($_GET["Error"])){
					if($_GET["Error"]=="Null"){
						echo '<p align="center" style="color:#F00; font-size:15px;">Δεν κάνατε τις επιλογές σας</p>';
					}								
				}
            ?>
            <table align="center" width="100%">
            	<tr><td align="center">
            	<select name="UserChoose[]" id="UserChoose" size="20" multiple="multiple" style="width:70%" onblur="RestChooseStep1Check()">
                <?php
				
					require_once("../../includes/dbconnect.php");
						
					$query="SELECT ID, Name, Surname, Mail FROM Users WHERE NOT ID=$_SESSION[ID]";
					$result=$db->MakeQuery($query);
					$usersrowcount=$db->GetRecordCount($result);
					$users=$db->GetResultAsArray($result);
					
					for($i=0;$i<$usersrowcount;$i++){
						
						echo '<option value="';	echo $users[$i][ID];	echo '">';
						echo 'Όνοματεπώνυμο Χρήστη: ';	echo $users[$i][Name];	echo ' ';	echo $users[$i][Surname];
						echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-Mail Επικοινωνίας: ';
						echo $users[$i][Mail];
						echo '</option>';
						
					}
					
					$db->Close();
					
				?>
                
                </select>
                </td></tr>
                <tr><td id="RestChooseJS" style="color:#F00" align="center"></td></tr>
                <tr><td align="center"><p><input type="submit" name="ShowUsers" value="Δείτε τις κοινές σας προτιμήσεις" /></p></td></tr>
            </table>
            	<p align="right" style="font-size:10px">Σημείωση: Με το πλήκτρο "Ctrl" και το αριστερό κλικ μπορείται να επιλέξετε πολλούς χρήστες</p>
            </form>
        
        </div>
        
	</div>
    <div id="InfoLayer">
        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
    </div>
</div>
</body>
</html>