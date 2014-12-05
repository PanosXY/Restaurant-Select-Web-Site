<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Τροποποίηση Στοιχείων Εστιατορίου</title>
<link href="../../stylesheets/main.css" rel="stylesheet" type="text/css" />

<script src="../../jscripts/logout.js" type="text/javascript"></script>
<script src="../../jscripts/restprocess.js" type="text/javascript"></script>

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
        <p align="center"><img style="width:17%; height:17%" src="../../images/BlackAddress.jpg" /></p>
        	<h1>Αλλάξτε τα στοιχεία του επιλεγμένου εστιατορίου</h1>
            <br />
            <?php 
					if(isset($_GET["Sucess"])){
						if($_GET["Sucess"]=="True"){
							echo '<p align="center" style="color:#0F0; font-size:30px">Τα στοιχεία του εστιατορίου καταχωρήθηκαν επιτυχώς</p>';
							echo '<script type="text/javascript">
							var x=confirm("Τα στοιχεία του εστιατορίου καταχωρήθηκαν επιτυχώς! Θέλετε να τροποποιήσετε τα στοιχεία και άλλου εστιατορίου;");
							if(x==true){
								window.location = "/~www38031/admin/mainpage/restaurant_process.php"
							}else{
								window.location = "/~www38031/admin/mainpage/main.php"
							}
							</script>';
							
						}								
					}
			?>
			<form action="restaurant_process_check.php" method="post" enctype="multipart/form-data" name="RestautantsProcess" id="RestaurantsProcess">
            	<table align="center" style="width:100%">
                <tr><td align="center">
                <select name="RestaurantsProcessList" id="RestaurantsProcessList" size="30" style="width:100%" onblur="RestListCheck()" onchange="RestListCheck()">
                
                <?php
					require_once("../../includes/dbconnect.php");
				
					$query="SELECT * FROM Tags";
					$result=$db->MakeQuery($query);
					$tagsrowcount=$db->GetRecordCount($result);
					$tags=$db->GetResultAsArray($result);
					
					for($i=0;$i<$tagsrowcount;$i++){
						$tagid=$tags[$i][ID];
						$query="SELECT Restaurants.`Name`,Restaurants.URL,Restaurants.Phone,Restaurants.Address FROM Tags,Relation_RT,Restaurants WHERE Restaurants.ID=Relation_RT.RID AND Relation_RT.TID=Tags.ID AND Tags.ID=$tagid";
						$result=mysql_query($query);
						$restrowcount=$db->GetRecordCount($result);
						$rest=$db->GetResultAsArray($result);
						
						echo '<optgroup label="';
						echo $tags[$i][Name];
						echo '">';
						
						for($j=0;$j<$restrowcount;$j++){
							
							echo '<option style="color:#00F" value="';	echo $rest[$j][Name];	echo '">';	echo $rest[$j][Name];
							echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Τηλέφωνο: ';	echo $rest[$j][Phone];
							echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Διεύθυνση: ';	echo $rest[$j][Address];
							echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ιστοσελίδα: ';	echo $rest[$j][URL];
							echo '</option>';
							
						}
						
						echo '</optgroup>';
						
					}
										
				?>
                
                </select>
            </td></tr>
            <tr><td id="RListJS" style="color:#F00; font-size:18px; padding-left:5%"></td></tr>
            </table>
            <?php
         	   if(isset($_GET["Error"])){
					if($_GET["Error"]=="FormNull"){
						echo '<p align="center" style="color:#F00; font-size:15px; padding-right:6%">Δεν συμπληρώσατε κανένα στοιχείο</p>';
					}								
				}
				if(isset($_GET["Error"])){
					if($_GET["Error"]=="RestaurantNull"){
						echo '<p align="center" style="color:#F00; font-size:15px; padding-right:6%">Δεν επιλέξατε εστιατόριο</p>';
					}								
				}
			?>
            <table align="center">
			<tr>
            	<td align="left"><p><strong>Ιστοσελίδα:</strong></p></td>
                <td align="right"><p><input type="text" name="RPURL" id="RPURL" maxlength="100" value="http://" style="width:97%" /></p></td>
                <td align="left">
                <?php 
					if(isset($_GET["ProcessError"])){
						if($_GET["ProcessError"]=="URLFail"){
							echo '<p align="left" style="color:#F00">Η ιστοσελίδα που εισαγάγατε χρησιμοποιείται ήδη από άλλο εστιατόριο</p>';
						}								
					}
				?> 
                </td>
            </tr>            
            <tr>
                 <td align="left"><p><strong>Τηλέφωνο:</strong></p></td>
                 <td align="right"><p><input type="text" name="RPPhone" id="RPPhone" maxlength="20" value="210-" style="width:97%" /></p></td>
                 <td align="left">
                	<?php 
						if(isset($_GET["ProcessError"])){
							if($_GET["ProcessError"]=="PhoneFail"){
								echo '<p align="left" style="color:#F00">Το τηλέφωνο που εισαγάγατε χρησιμοποιείται ήδη από άλλο εστιατόριο</p>';
							}								
						}
					?> 
                 </td>
            </tr>    
            <tr>
                 <td align="left"><p><strong>Διεύθυνση:</strong></p></td>
                 <td align="right"><p><input type="text" name="RPAddress" id="RPAddress" maxlength="50" style="width:97%" /></p></td>
                 <td align="left">
                	<?php 
						if(isset($_GET["ProcessError"])){
							if($_GET["ProcessError"]=="AddressFail"){
								echo '<p align="left" style="color:#F00">Η διεύθυνση που εισαγάγατε χρησιμοποιείται ήδη από άλλο εστιατόριο</p>';
							}								
						}
					?> 
                 </td>
            </tr>
            <tr>
                 <td align="left"><p><strong>Ετικέτα/Κατηγορία:</strong></p></td>
                 <td align="right"><p><select name="RTagsList" id="RTagsList" >
                 	<option value="DefaultTag" disabled="disabled">Επιλέξτε κατηγορία</option>
                    
                    	<?php
						
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
            </table>
            <table align="center">
            <tr>
               	<td align="right" style="width:100px"><p><input type="submit" name="Register" id="Register" value="Καταχώρηση" onfocus="SubmitCheck()" /></p></td>
                <td align="left" style="width:100px"><p><input type="reset" name="Reset" id="Reset" value="Καθαρισμός" /></p></td>
            </tr>
            </table>
                	<p id="TListJS" align="center" style="color:#F00"></p>
                  <p align="right" style="font-size:10px">Σημείωση: Μπορείτε να τροποποιήσετε μόνο ένα πεδίο εάν το θέλετε</p>      
            </form>
            
        </div>
        
	</div>
    <div id="InfoLayer">
        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
    </div>
</div>
</body>
</html>