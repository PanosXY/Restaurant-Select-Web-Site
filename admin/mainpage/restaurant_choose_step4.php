<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Επιλογή Εστιατορίου: Βήμα 4</title>
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
        <h1>Βήμα 4: Πατήστε το κουμπί "Τυχαίο" και το σύστημα θα επιλέξει τυχαία ένα από τα διαθέσιμα εστιατόρια για την έξοδό σας</h1>
        <br />
        <form action="restaurant_choose_final.php" method="post" enctype="multipart/form-data" name="FinalRestaurants">
        <p align="center"><select size="15" style="width:50%">
       	<?php
		
			$x=$_POST[LessRestaurants];
			$y=$_POST[AllAvailableRestaurants];
			foreach($x as $z){
				$rests[]=$z;
			}
			foreach($y as $w){
				$rests[]=$w;
			}
			$finalrests=array_diff($rests,$_POST[LessRestaurants]);
			
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
        </select></p>
        <select name="AllFinalRestaurants[]" multiple="multiple" style="width:0px; height:0px; visibility:hidden">
        <?php
		for($j=0;$j<=$lastkey;$j++){
				echo '<option selected="selected" value="';		echo $newFinal[$j];		echo '">';	echo $newFinal[$j];	echo '</option>';		
		}		
		?>
        </select>
        <p align="center"><input type="submit" name="final" value="Τυχαίο" /></p>
        </form>
        <p align="center"><a onclick="history.back()"><img src="../../images/back_arrow.png" /> Πίσω</a></p>
        </div>
        
	</div>
    <div id="InfoLayer">
        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
    </div>
</div>
</body>
</html>