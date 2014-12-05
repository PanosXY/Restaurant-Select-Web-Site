<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Το εστιατόριο για την έξοδό σας είναι...</title>
<link href="../../stylesheets/main.css" rel="stylesheet" type="text/css" />

<script src="../../jscripts/logout.js" type="text/javascript"></script>

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
        <h1>Το εστιατόριο που επιλέχθηκε τυχαία από το σύστημα είναι:</h1>
   		<?php
			
			$array=$_POST[AllFinalRestaurants];
			$key=array_rand($array);
			$FinalRestaurant=$array[$key];
			echo '<p align="center" style="font-size:50px; color:#00F">';
			echo $FinalRestaurant;
			echo '</p>';
			
			require_once("../../includes/dbconnect.php");
			
			$query="SELECT * FROM Restaurants WHERE Name='$FinalRestaurant'";
			$result=$db->MakeQuery($query);
			$info=$db->GetResultAsArray($result);
			
			echo '<p style="font-size:15px; text-decoration:underline"><strong>Στοιχεία εστιατορίου:</strong></p>';
			echo '<ul>';
			echo '<li>'; echo 'Ιστοσελίδα: ';	echo $info[0][URL];  
			echo '<li>'; echo 'Τηλέφωνο: ';	echo $info[0][Phone];  
			echo '<li>'; echo 'Διεύθυνση: ';	echo $info[0][Address];  
			echo '<li>'; echo 'Σχόλιο Χρήστη: ';	echo $info[0][Notes];  
			echo '</ul>';
		?>
        <br />
        <p style="font-size:15px; text-decoration:underline"><strong>Τα εστιατόρια από το βήμα 3 είναι:</strong></p>
        <br />
        <p align="center"><select size="22" style="width:100%">
        <?php
		
			foreach($array as $y){
				$query="SELECT * FROM Restaurants WHERE Name='$y'";
				$result=$db->MakeQuery($query);
				$info[]=$db->GetResultAsArray($result);
			}
			
			$db->Close();
			
			end($info);
			$lastkey=key($info);
					
			for($j=1;$j<=$lastkey;$j++){
						
				echo '<option style="color:#00F" value="';	echo $info[$j][0][Name];	echo '">';	
				echo $info[$j][0][Name];	
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ιστοσελίδα: ';
				echo $info[$j][0][URL];	
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Τηλέφωνο: ';
				echo $info[$j][0][Phone];
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Διεύθυνση: ';
				echo $info[$j][0][Address];
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Σχόλιο Χρήστη: ';
				echo $info[$j][0][Notes];
				echo '</option>';
					
			}
			
		?>
        </select></p>
        <br  />
        <p align="center"><a href="main.php"><img src="../../images/back_arrow.png" />Επιστροφή στη αρχική</a></p>
        </div>
        
	</div>
    <div id="InfoLayer">
        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
    </div>
</div>
</body>
</html>