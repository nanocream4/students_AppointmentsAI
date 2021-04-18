
<?php

include('data6rst.php');

$result = $db->prepare('SELECT * FROM appointment order by age desc');
$result->execute(array());
$nosofrows = $result->rowCount();



if ($nosofrows > 0) {
    echo "<table class='table table-striped table-bordered table-hover table-responsive'>
<tr>
<th>image</th>
<th>Name</th>

<th style='color:red'>Age Detected by Azure AI</th>
<th style='color:blue'>Gender Detected by Azure AI</th>
<th>How are You Feeling Today(Any Symptoms)</th>
<th>Send Mail <b style='color:red'>(Doctors use Only)</b></th>
</tr>";

    while($row = $result->fetch()) {
$id = $row['id'];
$photo = $row['photo'];
$fullname = $row['fullname'];
$userid = $row['userid'];
//$status = $row['status'];
$priority = $row['priority'];
$timing = $row['timing'];
$remarks = $row['remarks'];
$age = $row['age'];
$gender = $row['gender'];
$image_url = $row['image_url'];
$status = $row['personality'];




if($age != ''){
$age = "<b style='color:green'>$age</b>";
}


        echo "<tr>
<td> <img src='$image_url' width='100px' height='100px'></td>
<td> $fullname</td>

<td>$age </td>
<td>$gender </td>
<td>$remarks </td>
<td><div style='color:purple;cursor:pointer;color:white;background:purple;padding:6px;' data-toggle='modal' data-target='#myModal_email' title='Email Prescription'  data-id='$id'data-photo='$photo' data-fullname='$fullname' class='btn_action'>Email Medical Prescription to Students</div> </td>  

</tr>";
    }
    echo "</table>";

} else {
  echo "<br><div>No Patients has booked Appointments Yet</div>";
}




?>

<script>
// clear Modal div content on modal closef closed
$(document).ready(function(){
$('#myModal_action_email').on('hidden.bs.modal', function() {
//alert('Modal Closed');
   $('.myform_email').empty(); 
  
 console.log("modal closed and content cleared");
 });
});


// start updates

$(document).ready(function(){
$('.btn_action').click(function(){
//$(document).on( 'click', '.btn_action', function(){ 

var id = $(this).data('id');
var photo = $(this).data('photo');
var fullname = $(this).data('fullname');

$('#fullname1').html(fullname);
$('#studentid1').val(id).value;

		
	})


});
//end updates

</script>







<!--  Recommendation Modal starts here --->


<div class="container_action">

  <div class="modal fade " id="myModal_email" role="dialog">
    <div class="modal-dialog modal-lg modal-appear-center1 modal_mobile_resize modaling_sizing">
      <div class="modal-content">
        <div class="modal-header" style='color:black; background:#ddd'>
 <button type="button" class="pull-right btn btn-default" data-dismiss="modal">Close</button>

          <h4 class="modal-title">Students Drugs Prescription Email System</b></h4>
        </div>
        <div class="modal-body">
          



<!-- form START -->





<!-- start pForm  -->


<div style='background:#f1f1f1; padding:16px; color:black'>


<br>
<!--start form1-->

<script>

$(document).ready(function(){
$('#post_btn1').click(function(){
		
var remarks = $("#remarks").val();
var studentid = $(".studentid1").val();




if(remarks==""){
alert('Doctors Recommendations Cannot be Empty..');
//return false;
}


else{

$('#loader_l3').fadeIn(400).html('<br><div style="color:white;background:#3b5998;padding:10px;"><img src="ajax-loader.gif">&nbsp;Please Wait, Data is being Processed...</div>');
var datasend = { studentid:studentid,remarks:remarks};	
		$.ajax({
			
			type:'POST',
			url:'email_prescription.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){			
$('#loader_l3').hide();
$('#result_l3').html(msg);
setTimeout(function(){ $('#result_l3').html(''); }, 5000);				
				
			}
			
		});
		
		}
		
	})
					
});




</script>


<b>Student Name</b>: <span id="fullname1"></span><br>
<input type="hidden" name="studentid1" id="studentid1" class="studentid1" value="">


<div class="col-sm-12 form-group">
<label>Doctors Recommendation & Drugs Prescription</label>
<textarea  class="form-control contact_input_color" rows="10" id="remarks"  name="remarks" placeholder="Doctors Recommendation & Drugs Prescription"  required></textarea>
</div>




<br>





<div class="col-sm-12 form-group">
                        <div id="loader_l3"></div>
                        <div id="result_l3" clas="myform_email"></div>
</div>


<button type="button" id="post_btn1" class="post_btn1 category_post"> Email Recommendation Now</button>
</div>







<!--end form1-->


<br><br>
</div>




</div>



<!--   end pForm  -->








<br /><br />
<br /><br />
<br /><br />
</div>

<!--   form ENDS   -->



        </div>
        <div class="modal-footer modal_footer_color" style={{color:'black',background:'#ddd'}}>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



<!--  recommendation Modal ends here  -->
