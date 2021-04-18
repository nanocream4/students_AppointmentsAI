<?php
//error_reporting(0);

$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);

if ($email == ''){
echo "<div class='alert alert-danger' id='alerts_login'><font color=red>Email is empty</font></div>";
exit();
}
if ($password == ''){
echo "<div class='alert alert-danger' id='alerts_login'><font color=red>password is empty</font></div>";
exit();
}


include('data6rst.php');
$result = $db->prepare('SELECT * FROM users where email = :email and password = :password');

		$result->execute(array(
			':email' => $email,
':password' => $password

    ));
$count = $result->rowCount();
$row = $result->fetch();


if( $count == 0 ) {

echo "<div style='background:red;color:white;padding:10px;'>Either Username or Password is Wrong<br><br></div>";
exit();

}



if( $count == 1 ) {
session_start();
session_regenerate_id();

// initialize session if things where ok.
$_SESSION['uid3x'] = $row['id'];
$_SESSION['fullname3x'] = $row['fullname'];
$_SESSION['username3x'] = $row['id'];
$_SESSION['email3x'] = $row['email'];
$_SESSION['photo3x'] = $row['image_url'];
$_SESSION['timerx'] = $row['timing'];


echo "<div style='background:green;color:white;padding:10px;'>Login sucessful...... <img src='ajax-loader.gif'><br><br></div>";


echo "<script>
window.setTimeout(function() {
    window.location.href = 'dashboard.php';
}, 1000);
</script>";

}






?>