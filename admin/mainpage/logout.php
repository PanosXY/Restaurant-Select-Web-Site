<?php

	session_start();
	session_unset();
	session_destroy();
	setcookie(session_name(),'',time()-42000,'/');
	header("Location: /~www38031/index.php");

?>