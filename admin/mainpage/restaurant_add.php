<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Εισαγωγή Εστιατορίου</title>
<link href="../../stylesheets/main.css" rel="stylesheet" type="text/css" />

<script src="../../jscripts/logout.js" type="text/javascript"></script>
<script src="../../jscripts/restadd.js" type="text/javascript"></script>

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
        	<?php					
						if(isset($_GET["Sucess"])){
							if($_GET["Sucess"]=="True"){
								echo '<p align="center" style="color:#0F0; font-size:30px">Τo εστιατόριο καταχωρήθηκε με επιτυχία</p>';
								echo '<script type="text/javascript">
							var x=confirm("Το εστιατόριο προστέθηκε με επιτυχία! Θέλετε να προσθέσετε και άλλο εστιατόριο;");
							if(x==true){
								window.location = "/~www38031/admin/mainpage/restaurant_add.php"
							}else{
								window.location = "/~www38031/admin/mainpage/main.php"
							}
							</script>';
							}								
						}
			?>
           	<p align="center"><img style="width:17%; height:17%" src="../../images/Button-Add-icon.png" /></p>
			<form action="restaurant_add_check.php" method="post" enctype="multipart/form-data" name="RestaurantAddForm" id="RestaurantAddForm" >
            	<fieldset>
            	<legend align="left">Εισάγεται το εστιατόριο σύμφωνα με τα στοιχεία της φόρμας</legend>
                	<?php 
								if(isset($_GET["Error"])){
									if($_GET["Error"]=="Null"){
										echo '<p align="center" style="color:#F00; font-size:15px;">Δε συμπληρώσατε τα απαραίτητα στοιχεία της φόρμας</p>';
									}								
								}
								if(isset($_GET["Error"])){
									if($_GET["Error"]=="Exist"){
										echo '<p align="center" style="color:#F00; font-size:15px;">Το εστιατόριο που προσθέσατε υπάρχει ήδη</p>';
									}								
								}
					?>
            	<table align="center">
                	<tr>
                    	<td align="left"><p><strong>Όνομα:</strong></p></td>
                        <td align="right"><p><input type="text" name="RName" id="RName" maxlength="50" style="width:200px" onblur="RestNameCheck()" /></p></td>
                        <td id="RNameJS" style="color:#F00"></td>
                    </tr>
                   	<tr>
                    	<td align="left"><p><sup style="font-size:8px">*</sup><strong>Ιστοσελίδα:&nbsp;</strong></p></td>
                        <td align="right"><p><input type="text" name="RSite" id="RSite" maxlength="100" value="http://" style="width:200px" onfocus="SMessageDisplay()" /></p></td>
                    </tr>
                    <tr><td id="RSiteJS" style="color:#00F" colspan="2"></td></tr>
                   	<tr>
                    	<td align="left"><p><sup style="font-size:8px">*</sup><strong>Τηλέφωνο:&nbsp;</strong></p></td>
                        <td align="right"><p><input type="text" name="RPhone" id="RPhone" maxlength="20" value="210-" style="width:200px" onfocus="PMessageDisplay()" /></p></td>
                    </tr>
                    <tr><td id="RPhoneJS" style="color:#00F" colspan="2"></td></tr>
                   	<tr>
                    	<td align="left"><p><strong>Διεύθυνση:</strong></p></td>
                        <td align="right"><p><input type="text" name="RAddress" id="RAddress" maxlength="50" style="width:200px" onblur="RestAddressCheck()" /></p></td>
                        <td id="RAddressJS" style="color:#F00"></td>
                    </tr>
                   	<tr>
                    	<td align="left" colspan="2">
                        <p><sup style="font-size:8px">*</sup><strong>Σημειώσεις:</strong>
                        <br />
                     	<input type="text" name="RNotes" id="RNotes" maxlength="100" style="width:320px" onfocus="NMessageDisplay()" /></p>
                        </td>
                    </tr>       
                    <tr><td id="RNotesJS" style="color:#00F" colspan="2"></td></tr>             
                </table>
                <br />
                <br />
                <table align="center">
                	<tr>
                    	<td align="left"><p><strong>Ετικέτα/Κατηγορία:</strong></p></td>
                        <td align="right"><p><select name="TagList" id="TagList" style="width:200px" onblur="CategoryCheck()">
                        	<option value="Default" disabled="disabled">Επιλέξτε κατηγορία</option>
                        <?php
								require_once("../../includes/dbconnect.php");
								
								$query="SELECT Name FROM Tags";
								$result=$db->MakeQuery($query);
								$tags=$db->GetResultAsArray($result);
								
								for($i=0;$i<26;$i++){
									echo '<option';
									echo ' value="';
									echo $tags[$i][Name];
									echo '">';
									echo $tags[$i][Name];
									echo '</option>';
								}
								$db->Close();
							?>	
                        </select>
                        </p></td>
                    </tr>
                    <tr><td id="CategoriesJS" style="color:#00F" colspan="2"></td></tr>
                </table>
                <br />
                <br />
                <table align="center">
					<tr>
                    	<td align="center"><p><strong>Αυτό το εστιατόριο:</strong></p></td> 
                    </tr>                   
				    <tr>
                      	<td align="center"><input type="radio" name="LikeButton" id="LikeButton1"  value="True"/><label for="LikeButon1">Μου Αρέσει</label>
                        				   <input type="radio" name="LikeButton" id="LikeButton2"  value="False"/><label for="LikeButon2">Δεν Μου Αρέσει</label>
										   <input type="radio" name="LikeButton" id="LikeButton3"  value="Neutral" checked="checked"/><label for="LikeButon3">Δεν έχω γνώμη ακόμη</label>
                        </td>
                    </tr>
                </table>
                <br  />
                <br  />
                <table align="center">
                	<tr>
                    	<td align="left" style="width:100px"><p><input type="submit" name="Add" id="Add" value="Προσθήκη" /></p></td>
                        <td align="right" style="width:100px"><p><input type="reset" name="Reset" id="Reset" value="Καθαρισμός" /></p></td>
                	</tr>
                </table>
                <p align="right" style="font-size:10px">Σημείωση: Τα πεδία με * δεν είναι απαραίτητα</p>
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