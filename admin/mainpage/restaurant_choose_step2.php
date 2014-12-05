<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Επιλογή Εστιατορίου: Βήμα 2</title>
<link href="../../stylesheets/main.css" rel="stylesheet" type="text/css" />

<script src="../../jscripts/logout.js" type="text/javascript"></script>
<script src="../../jscripts/restchoose2.js" type="text/javascript"></script>

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
				 
        	<h1>Βήμα 2: Επιλέξτε κατηγορίες των εστιατορίων που ΔΕΝ προτιμάτε για την έξοδό σας</h1>
            <br />
            <form action="restaurant_choose_step3.php" method="post" enctype="multipart/form-data" name="UnlikedTags" >
            <p align="center">
            <select name="NotLikedTags[]" id="NotLikedTags" size="20" multiple="multiple" style="width:50%" onblur="RestChooseStep2Check()" >
            
            	<?php
				
					require_once("../../includes/dbconnect.php");
					
					$x=$_POST[CommonRests];
					
					foreach($x as $y){
						
						$query="SELECT Tags.Name FROM Tags,Restaurants,Relation_RT WHERE Restaurants.`Name`='$y' AND Restaurants.ID=Relation_RT.RID AND Relation_RT.TID=Tags.ID;";
						$result=$db->MakeQuery($query);
						$tags[]=mysql_result($result,0);
												
					}
					
					$db->Close();
					
					$Tags2=array_unique($tags);
					
					$newTags = array(); 
					$l = 0; 
					foreach ($Tags2 as $key => $value) { 
			  			if (!is_null($value)) { 
		    				$newTags[$l] = $value; 
				    		$l++; 
						} 
					}
					
					end($newTags);
					$lastkey=key($newTags);
					
					for($i=0;$i<=$lastkey;$i++){
						
						echo '<option value="';		echo $newTags[$i];		echo '">';	echo $newTags[$i];	echo '</option>';
					
					}
				
				?>
            
            </select>
        	</p>
            <p id="NotLikedTagsJS" align="center" style="color:#F00"></p>
            <select name="ChoosenRests[]" multiple="multiple" style="width:0px; height:0px; visibility:hidden">
            <?php
				$z=$_POST[CommonRests];
				foreach($z as $w){
					echo '<option selected="selected" value="';	echo $w;	echo '">';	echo $w;	echo '</option>';	
				}			
			?>            
            </select>
            
            <select name="AllTags[]" multiple="multiple" style="width:0px; height:0px; visibility:hidden">
            <?php
				for($i=0;$i<=$lastkey;$i++){
					echo '<option selected="selected" value="';		echo $newTags[$i];		echo '">';	echo $newTags[$i];	echo '</option>';
				}
			?>	
            </select>
            
			<p align="center"><input type="submit" name="OK" value="Επιλογή" /></p>
			
            <p align="center"><a onclick="history.back()"><img src="../../images/back_arrow.png" /> Πίσω</a></p>
            <br />
          	<p align="right" style="font-size:10px">Σημείωση: Με το πλήκτρο "Ctrl" και το αριστερό κλικ μπορείται να επιλέξετε πολλές κατηγορίες</p>
            
            </form>
                        
        </div>
        
	</div>
    <div id="InfoLayer">
        	<p align="center">Ανάπτυξη - Σχεδίαση: <a href="mailto:panos_dafni@hotmail.com">Παναγιώτης Σκιαδάς</a></p>
    </div>
</div>
</body>
</html>