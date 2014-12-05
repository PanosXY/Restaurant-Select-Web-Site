<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Προβολή Εστιατορίων</title>
<link href="../../stylesheets/main.css" rel="stylesheet" type="text/css" />

<script src="../../jscripts/logout.js" type="text/javascript"></script>
<script src="../../jscripts/restview.js" type="text/javascript"></script>

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
        			<td align="right" id="Cells" style="width:80%"><a id="InTableLink" href="data_process.php">Τροποποίηση προσωπικών δεδομένων<img src="../../images/05_icon_settings(cog).jpg" /></a></td>
                	<td align="right" id="Cells" style="width:20%"><a id="InTableLink" href="logout.php" onclick="Goodbye()">Αποσύνδεση<img src="../../images/logout.gif" /></a></td>
        		</tr>
        	</table>
        </div>
        
        <div id="MenuLayer">
        	<table class="BrowseTable">
            	<tr><td id="Cells"><a id="InTableLink" href="restaurant_add.php"><img src="../../images/add.gif" />Εισαγωγή Εστιατορίου</a></td></tr>
                <tr><td id="Cells"><a id="InTableLink" href="restaurant_show.php"><img src="../../images/view.png" />Προβολή Εστιατορίων</a></td></tr>
                <tr><td id="Cells"><a id="InTableLink" href="restaurant_process.php"><img src="../../images/05_icon_settings(cog).jpg" />Τροποποίηση Στοιχείων Εστιατορίου</a></td></td></tr>
                <tr><td id="Cells"><a id="InTableLink" href="restaurant_choose_step1.php"><img src="../../images/survey.jpg" />Επιλογή Εστιατορίου</a></td></tr>
            </table>
        </div>
        
        <div id="MainLayer">
			<p align="center"><img style="width:17%; height:17%" src="../../images/Search Magnifier.png" /></p>
            <h1>Παρακαλούμε επιλέξτε τα εστιατόρια που<br />σας αρέσουν ή δεν σας αρέσουν</h1>
            
			<form action="restaurant_show_check.php" method="post" enctype="multipart/form-data" name="RestautantsLike" id="RestaurantsLike">
			<?php
            	if(isset($_GET["Error"])){
					if($_GET["Error"]=="Null"){
						echo '<p align="center" style="color:#F00; font-size:15px;">Δεν κάνατε την επιλογή σας</p>';
					}								
				}
				if(isset($_GET["Sucess"])){
					if($_GET["Sucess"]=="True"){
						echo '<p align="center" style="color:#0F0; font-size:30px">Οι επιλογές σας καταχωρήθηκαν με επιτυχία</p>';
						echo '<script type="text/javascript">
							var x=confirm("Οι επιλογές σας καταχωρήθηκαν με επιτυχία! Θέλετε να δηλώσετε την αρεσκεία σας και σε άλλα εστιατόρια;");
							if(x==true){
								window.location = "/~www38031/admin/mainpage/restaurant_show.php"
							}else{
								window.location = "/~www38031/admin/mainpage/main.php"
							}
							</script>';
					}								
				}
            ?>
            <table align="center" style="width:100%">
            	<tr><td align="center" colspan="2">
            	<select name="RestaurantsList[]" id="RestaurantsList" size="30" multiple="multiple" style="width:80%" onchange="RestListCheck()" onblur="RestListCheck()">
                
                <?php
					require_once("../../includes/dbconnect.php");
				
					$query="SELECT * FROM Tags";
					$result=$db->MakeQuery($query);
					$tagsrowcount=$db->GetRecordCount($result);
					$tags=$db->GetResultAsArray($result);
					
					for($i=0;$i<$tagsrowcount;$i++){
						$tagid=$tags[$i][ID];
						$query="SELECT Restaurants.`Name`,Restaurants.Notes FROM Tags,Relation_RT,Restaurants WHERE Restaurants.ID=Relation_RT.RID AND Relation_RT.TID=Tags.ID AND Tags.ID=$tagid";
						$result=mysql_query($query);
						$restrowcount=$db->GetRecordCount($result);
						$rest=$db->GetResultAsArray($result);
						
						echo '<optgroup label="';
						echo $tags[$i][Name];
						echo '">';
						
						for($j=0;$j<$restrowcount;$j++){
							
							echo '<option style="color:#00F" value="';
							echo $rest[$j][Name];
							echo '">';
							echo $rest[$j][Name];
							echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Σχόλια: ';
							echo $rest[$j][Notes];
							echo '</option>';
							
						}
						
						echo '</optgroup>';
						
					}
					
					$db->Close();
				?>
                
                </select>
				</td></tr>
                <tr><td id="RestListJS" style="color:#F00; font-size:18px" align="center"></td>
                
                <tr><td align="center" colspan="2"><p><strong>Τα παραπάνω εστιατόρια:</strong></p></td></tr>
  				
                <tr>
                	<td align="right" style="width:48%"><input type="radio" name="LikeButton" id="LikeButton1"  value="True" /><label for="LikeButon1">Μου Αρέσουν</label></td>
                    <td align="left" style="width:52%"><input type="radio" name="LikeButton" id="LikeButton2"  value="False" /><label for="LikeButon2">Δεν Μου Αρέσουν</label></td>
                </tr>    
                
                <tr><td align="center" colspan="2"><p><br /><input type="submit" name="Register" id="Register" value="Καταχώρηση" /></p></td></tr>
                
				</table>
                <p align="right" style="font-size:10px">Σημείωση: Με το πλήκτρο "Ctrl" και το αριστερό κλικ μπορείται να επιλέξετε πολλά εστιατόρια</p>

            </form>
        	

        </div>
        
	</div>
    <div id="InfoLayer">
        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
    </div>
</div>
</body>
</html>