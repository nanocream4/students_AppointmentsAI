<?php
error_reporting(0);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$appointment_date = strip_tags($_POST['appointment_date']);
$image_url = strip_tags($_POST['image_url']);
$status = "Open";
$remarks = strip_tags($_POST['remarks']);



session_start();
$userid_sess_data = htmlentities(htmlentities($_SESSION['uid3x'], ENT_QUOTES, "UTF-8"));
$fullname_sess_data = htmlentities(htmlentities($_SESSION['fullname3x'], ENT_QUOTES, "UTF-8"));
$photo_sess_data = $_SESSION['photo3x'];
$email_sess =  htmlentities(htmlentities($_SESSION['email3x'], ENT_QUOTES, "UTF-8"));




$appointment_date = $appointment_date;
//$appointment_month= date('m');

//$str_date = '2021-01-14';

$str_date =$appointment_date;
$ff1 = explode('-', $str_date);
$yearing1 =$ff1[0];
$monthing1= $ff1[1];
$daying1= $ff1[2];


$string = $monthing1;
 
//Get the first character.
$firstCharacter = $string[0];

//Get the second character.
$secondCharacter = $string[1];

if($firstCharacter ==0){
$appointment_month = $secondCharacter;
}

if($firstCharacter !=0){
$appointment_month = $monthing1;
}


$data_param = "{\"url\":\"$image_url\"}";

//UPDATE Your Azure Facial Recognition url endpoints
$url ='Your-Azure-Url-endpoints-goes-here//face/v1.0/detect?detectionModel=detection_01&returnFaceId=true&returnFaceLandmarks=false&returnFaceAttributes=age,gender,headPose,smile,facialHair,glasses,emotion,hair,makeup,occlusion,accessories,blur,exposure,noise';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Ocp-Apim-Subscription-Key: Your-Azure-Facial-Recognition-Key-goes-here"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 


$json = json_decode($output, true);
$gender = $json[0]['faceAttributes']['gender'];
$age = $json[0]['faceAttributes']['age'];

include('data6rst.php');

$timer  = time();
$statement = $db->prepare('INSERT INTO appointment
(photo,userid,fullname,appointment_date,appointment_month,priority,status,remarks,timing,age,gender,image_url,personality)
 
                          values
(:photo,:userid,:fullname,:appointment_date,:appointment_month,:priority,:status,:remarks,:timing,:age,:gender,:image_url,:personality)');

$statement->execute(array( 
':photo' => $photo_sess_data,
':userid' => $userid_sess_data,
':fullname' => $fullname_sess_data,
':appointment_date' => $appointment_date,
':appointment_month' => $appointment_month,
':priority' => '',
':status' => $status,
':remarks' => $remarks,		
':timing' =>$timer,
':age' =>$age,
':gender' =>$gender,
':image_url' =>$image_url,
':personality' =>''

));



if($statement){

echo "<div class='well'>
<div style='color:white;background:green;padding:10px;'>Appointment Successfully Created.</div><br>

</div>";

echo "<script>
window.setTimeout(function() {
    window.location.href = 'dashboard.php';
}, 1000);
</script><br><br>";


}
else {
echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>Appointment Cannot be Created.<br></div>";
                }

}


?>



