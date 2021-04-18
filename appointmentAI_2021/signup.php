<!DOCTYPE html>
<html lang="en">

<head>
 <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




<style>


.register_btn{
padding:10px;
color:white;
background:#800000;
border:none;
cursor;pointer;

}


.register_btn:hover{
background:black;
color:orange;
}



.section_padding {
padding: 60px 40px;
}

.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}



  .navbar {
    letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
   background-color:#800000;

    z-index: 9999;
    border: 0;
    font-family: comic sans ms;
//color:white;
  }



  
.navbar-toggle {
background-color:orange;
  }

.navgate {
padding:16px;color:white;

}



.navgate:hover{
 color: black;
 background-color: orange;

}


.navbar-header{
height:60px;
}

.navbar-header-collapse-color {
background:white;
}

.navgate101:hover{
background:#800000;
color:black;

}






.category_post{
background-color: #800000;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post:hover {
background: black;
color:white;
}	


.access{
border-style: solid; border-width:4px; border-color:white;color:white;font-size:14px;
}

.access:hover{
color:black;

}


</style>










        <script>


            $(function () {
                $('#save_btn').click(function () {
                    var email = $('#email').val();
                    var password = $('#password').val();
                    var confirm_password =$('#confirm-password').val();
                    var fullname = $('#fullname').val();
                    //preparing Email for validations
                    var atemail = email.indexOf("@");
                    var dotemail = email.lastIndexOf(".");



if(password != confirm_password){
alert('Password Does not Match');
return false;
}

 if(email==""){
alert('please Enter Email Address');
}

else  if (atemail < 1 || ( dotemail - atemail < 2 )){
alert("Please enter valid email Address")
}




else if(password==""){
alert('please Enter Password');
}

else if(fullname==""){
alert('please Enter Your Fullname');
}

else{

          var form_data = new FormData();
          form_data.append('email', email);
          form_data.append('fullname', fullname);
          form_data.append('password', password);
          form_data.append('emailaddress_pot', emailaddress_pot);

                    $('#loader').fadeIn(400).html('<br><span class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Please Wait, Your Data is being Submitted</span>');
                    $.ajax({
                        url: 'signup_action.php',
                        data: form_data,
                        processData: false,
                        contentType: false,
                        ache: false,
                        type: 'POST',
                      
                        success: function (msg) {
				$('#loader').hide();
				$('.result_data').fadeIn('slow').prepend(msg);
				$('#alertdata_uploadfiles').delay(5000).fadeOut('slow');
                                $('#alerts_reg').delay(5000).fadeOut('slow');
                                $('#alertdata_uploadfiles2').delay(20000).fadeOut('slow');
                             

//strip all html elemnts using jquery
var html_stripped = jQuery(msg).text();
//alert(html_stripped);

//check occurrence of word (successfully) from backend output already html stripped.
var Frombackend = html_stripped;
var bcount = (Frombackend.match(/successfully/g) || []).length;
//alert(bcount);

if(bcount > 0){
$('#email').val('');
$('#fullname').val('');
$('#password').val('');
$('#confirm-password').val('');
}




                        }
                    });
} // end if validate
                });
            });


        </script>



 
</head>
<body>


<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="logo.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">

      <ul class="nav navbar-nav navbar-right">

<li class="navgate img-rounded"><a style="color:pink" class="img-rounded " href="index.php">Home</a></li>



      </ul>

    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->





    <div class="">


<!-- about Section start-->
<div  class="about section_padding aboutus_bgcolor" style=''>

<br>


<center><p class="" style='font-size:26px;color:#800000;font-family:comic sans ms;'> Signup Form<br></p></center>






<div class='row'>




<div class='col-sm-12' style='background:#ddd;'>>



<!--start form-->
<form id="" method="post">



 <div class="form-group">
              <label style="" for="email">
<span class="fa fa-envelope-o"></span>Email</label>
              <input type="text" class="col-sm-12 form-control" id="email" name="email" placeholder="Enter email">
<div class="result1" id="email_check"></div>
            </div><br>


 <div class="form-group">
              <label style="" for="psw">
<span class="fa fa-eye"></span> Password</label>
              <input type="password" class="col-sm-12 form-control" id="password" name="password" placeholder="Enter password">
            </div><br>

 <div class="form-group">
              <label style="" for="psw">
<span class="fa fa-eye"></span> Confirm Password</label>
              <input type="password" class="col-sm-12 form-control" id="confirm-password" name="confirm-password" placeholder=" Confirm Password">
            </div><br>


<style>
.secured_pot{ display:none; } /* hide because is spam protection */
</style>
<input class="secured_pot" type="text" name="emailaddress_pot" id="emailaddress_pot" />




<div class="form-group">
              <label style="" for="fullname">
<span class="fa fa-male"></span> FullName</label>
              <input type="text" class="col-sm-12 form-control" id="fullname" name="fullname" placeholder="Enter Full Name">
            </div>


<div class="form-group">
              <label style="" for="country">
            
           


                    <div class="form-group">
                          

                        <div id="loader"></div>
                        <div class="result_data"></div>
                    </div>

                    <input type="button" id="save_btn" class="pull-right register_btn" value="Register" />
                </form>

<!--end form-->





</div>




</div>





</div>







	




<div>
 

   
</body>
</html>



















