<?php
error_reporting(0);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$password = strip_tags($_POST['password']);
$fullname = strip_tags($_POST['fullname']);
$email = strip_tags($_POST['email']);
$image_url = 'user.png';


if ($password == ''){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>password is empty</font></div>";
exit();
}

if ($fullname == ''){
echo "<dikv class='alert alert-danger' id='alerts_reg'><font color=red>fullname Name is empty</font></div>";
exit();
}

if ($email == ''){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>Email Address is empty</font></div>";
exit();
}

$em= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$em){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>Email Address is Invalid</font></div>";
exit();
}




include('data6rst.php');

// check if email already exist.
$result1 = $db->prepare('SELECT * FROM users where email = :email');
$result1->execute(array(':email' => $email));
$nosofrows1 = $result1->rowCount();
//if ($nosofrows1 == 1)
//if ($nosofrows1 != 0)
if ($nosofrows1 > 0)
{
echo "<br><div class='alert alert-danger'  id='alertdata_uploadfiles'><b><font color=red><b></b>This Email is already taken</font></b><br>";
exit();
}


$timer  = time();
$statement = $db->prepare('INSERT INTO users
(image_url,password,fullname,email,timing)
 
                          values
(:image_url,:password,:fullname,:email,:timing)');

$statement->execute(array( 

':image_url' => $image_url,
':password' => $password,
':fullname' => $fullname,
':email' => $email,		
':timing' =>$timer
));



if($statement){

echo "<div class='well'>
<div style='color:white;background:green;padding:10px;'>Data Successfully Created.</div><br>

</div>";

echo "<script>
window.setTimeout(function() {
    window.location.href = 'login.php';
}, 1000);
</script><br><br>";


}
else {
echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>Your Data cannot be submitted to database.<br></div>";
                }

}


?>



