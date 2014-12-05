<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Επιλογή Εστιατορίου: Βήμα 3</title>
<link href="../../stylesheets/main.css" rel="stylesheet" type="text/css" />

<script src="../../jscripts/logout.js" type="text/javascript"></script>
<script src="../../jscripts/restchoose3.js" type="text/javascript"></script>

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
        <h1>Βήμα 3: Επιλέξτε εστιατόρια από τα διαθέσιμα που πήγατε πρόσφατα και ΔΕΝ θα θέλετε να ξαναπάτε</h1>
		<br />
        
		<form action="restaurant_choose_step4.php" method="post" enctype="multipart/form-data" name="UnlikedRestaurants" >

        <p align="center">
        <select name="LessRestaurants[]" id="LessRestaurants" size="20" multiple="multiple" style="width:60%" onblur="RestChooseStep3Check()" >
        
       	<?php
				
			$x=$_POST[NotLikedTags];			
			$y=$_POST[AllTags];
			foreach($x as $z){
				$tags[]=$z;
			}
			foreach($y as $w){
				$tags[]=$w;
			}
			$finaltags=array_diff($tags,$_POST[NotLikedTags]);
					
			require_once("../../includes/dbconnect.php");
	
			foreach($finaltags as $tags){
				$query="SELECT Restaurants.`Name` FROM Relation_RT, Restaurants, Tags WHERE Tags.`Name`='$tags' AND Tags.ID=Relation_RT.TID AND Relation_RT.RID=Restaurants.ID";
				$result=$db->MakeQuery($query);
				$rowcount=$db->GetRecordCount($result);
				for($i=0;$i<$rowcount;$i++){
					$rests[]=mysql_result($result,$i);
				}
			}
			
			$db->Close();

			$finalrests=array_intersect($rests,$_POST[ChoosenRests]);
			
			$newFinal = array(); 
			$l = 0; 
			foreach ($finalrests as $key => $value) { 
				if (!is_null($value)) { 
		    		$newFinal[$l] = $value; 
			    	$l++; 
				} 
			}
					
			end($newFinal);
			$lastkey=key($newFinal);
					
			for($j=0;$j<=$lastkey;$j++){
						
				echo '<option value="';		echo $newFinal[$j];		echo '">';	echo $newFinal[$j];	echo '</option>';
					
			}
				
		?>
        
        </select>
        </p>
        <p id="LessRestaurantsJS" align="center" style="color:#F00"></p>
        <select name="AllAvailableRestaurants[]" multiple="multiple" style="width:0px; height:0px; visibility:hidden">
        	<?php
			for($j=0;$j<=$lastkey;$j++){		
				echo '<option selected="selected" value="';		echo $newFinal[$j];		echo '">';	echo $newFinal[$j];	echo '</option>';
			}
			?>
        </select>
		
        <p align="center"><input type="submit" name="choose" value="Επιλογή" /></p>
        </form>
        <p align="center"><a onclick="history.back()"><img src="../../images/back_arrow.png" /> Πίσω</a></p>
        <br />
        <p align="right" style="font-size:10px">Σημείωση: Με το πλήκτρο "Ctrl" και το αριστερό κλικ μπορείται να επιλέξετε πολλές κατηγορίες</p>
        </div>
        
	</div>
    <div id="InfoLayer">
        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
    </div>
</div>
</body>
</html>