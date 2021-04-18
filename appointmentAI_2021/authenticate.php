

<?php
	
//set session
if(!isset($_SESSION['uid3x']) || (trim($_SESSION['uid3x']) == '')) {
//$username=strip_tags($_GET['username']);
		header("location: index.php");
		exit();
	}


?>