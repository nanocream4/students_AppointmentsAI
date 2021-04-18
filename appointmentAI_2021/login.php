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
                $('#login_btn').click(function () {
                    var email = $('#email').val();
                    var password = $('#password').val();
                    //preparing Email for validations
                    var atemail = email.indexOf("@");
                    var dotemail = email.lastIndexOf(".");

if(email==""){
alert('please Enter Email Address');
}

else  if (atemail < 1 || ( dotemail - atemail < 2 )){
alert("Please enter valid email Address")
}




else if(password==""){
alert('please Enter Password');
}


else{

          var form_data = new FormData();
          form_data.append('email', email);
          form_data.append('password', password);

                    $('#loader').fadeIn(400).html('<br><span class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Please Wait, Your Data is being Processed for Logged In</span>');
                    $.ajax({
                        url: 'login_action.php',
                        data: form_data,
                        processData: false,
                        contentType: false,
                        ache: false,
                        type: 'POST',
                      
                        success: function (msg) {
				$('#loader').hide();
				$('#resulta').html(msg);
				
                             
//$('#email').val('');
//$('#password').val('');


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

<li class="navgate img-rounded"><a style="color:pink" class="img-rounded " href="index.php">Back to Home</a></li>



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


<center><p class="" style='font-size:26px;color:#800000;font-family:comic sans ms;'>Med Help</p></center>




<div class='row'>



<div class='col-sm-12' style='background:#ddd;'>

  <h2 class="text-center"><span class="contact_name_color" style='font-size:20px;color:#800000;font-family:comic sans ms;'>
Login System</span></h2>



<!--start form-->
<form id="" method="post">






 <div class="form-group">
              <label style="" for="email">
<span class="fa fa-envelope-o"></span>Email</label>
              <input type="text" class="col-sm-12 form-control" id="email" name="email" value="student1@gmail.com">
<div class="result1" id="email_check"></div>
            </div><br>


 <div class="form-group">
              <label style="" for="psw">
<span class="fa fa-eye"></span> Password</label>
              <input type="password" class="col-sm-12 form-control" id="password" name="password" value="123">
            </div><br>
           


                    <div class="form-group">
                        

                        <div id="loader"></div>
                        <div id="resulta"></div>
                    </div>

                    <input type="button" id="login_btn" class="pull-right register_btn" value="Login Now." />
                </form>

<!--end form-->





</div>




</div>





</div>









<div>
 

   
</body>
</html>



















