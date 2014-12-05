<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Επιλογή Εστιατορίου: Βήμα 1</title>
<link href="../../stylesheets/main.css" rel="stylesheet" type="text/css" />

<script src="../../jscripts/logout.js" type="text/javascript"></script>

</head>

<body onload="timedRefresh(0)">
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
        <h1>Η λίστα των κοινών προτιμήσεών σας είναι:</h1>

        <form action="restaurant_choose_step2.php" method="post" enctype="multipart/form-data" name="CommonRestaurants" >

        <p align="center"><select name="CommonRests[]" multiple="multiple" style="width:0px; height:0px; visibility:hidden">
<?php
	
	$x=$_POST[UserChoose];
	
	if($x==NULL){
		header("Location: /~www38031/admin/mainpage/restaurant_choose_step1.php?Error=Null");
		die();
	}
	
	$query="SELECT Restaurants.`Name` FROM Restaurants, Relation_RU WHERE Relation_RU.UID=$_SESSION[ID] AND Relation_RU.IsLiked NOT LIKE 'False' AND Relation_RU.RID=Restaurants.ID";
	$result=$db->MakeQuery($query);
	$count=$db->GetRecordCount($result);
	for($i=0;$i<$count;$i++){
		$myrest[]=mysql_result($result,$i);	
	}
	
	foreach($x as $y){
		
		$query="SELECT Restaurants.`Name` FROM Restaurants, Relation_RU WHERE Relation_RU.UID=$y AND Relation_RU.IsLiked NOT LIKE 'False' AND Relation_RU.RID=Restaurants.ID";
		$result=$db->MakeQuery($query);
		$count=$db->GetRecordCount($result);
		for($j=0;$j<$count;$j++){
			$othersrest[]=mysql_result($result,$j);	
		}
		
	}
	
	$db->Close();
	$others=array_unique($othersrest);
	$allrests=array_intersect($myrest,$others);
	
	$newRests = array(); 
	$l = 0; 
	foreach ($allrests as $key => $value) { 
  		if (!is_null($value)) { 
    		$newRests[$l] = $value; 
		    $l++; 
		} 
	}
	
	end($newRests);
	$lastkey = key($newRests);
	
	
	for($k=0;$k<=$lastkey;$k++){
		
		echo '<option style="color:#FFF" selected="selected" value="';	echo $newRests[$k];	echo '">';	echo $newRests[$k];		echo '</option>';
	
	}
	
?>
	</select></p>
    <p align="center"><select size="20" style="width:65%">
     <?php
	 
	 for($k=0;$k<=$lastkey;$k++){
		
	 	echo '<option value="';	echo $newRests[$k];	echo '">';	echo $newRests[$k];		echo '</option>';
	
     }
	 
	 ?>
     </select></p>
        <p align="center"><input type="submit" name="OK" value="&gt;&gt; Βήμα 2" /></p>
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