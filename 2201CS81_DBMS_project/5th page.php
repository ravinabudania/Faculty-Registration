<?php
if (isset($_POST['submit'])) {
    $name_of_society = $_POST['name_of_society'];
    $membership_status = $_POST['membership_status'];

    $type_of_training = $_POST['type_of_training'];
    $organisation = $_POST['organisation'];
    $year = $_POST['year'];
    $duration = $_POST['duration'];

    $name_of_award = $_POST['name_of_award'];
    $awarded_by = $_POST['awarded_by'];
    $award_year = $_POST['award_year'];
    
    $sponsoring_agency_sp = $_POST['sponsoring_agency_sp'];
    $title_of_project_sp = $_POST['title_of_project_sp'];
    $sanctioned_amount_sp = $_POST['sanctioned_amount_sp'];
    $period_sp = $_POST['period_sp'];
    $role_sp = $_POST['role_sp'];
    $status_sp = $_POST['status_sp'];
    
    
    $organization_cp = $_POST['organization_cp'];
    $title_of_project_cp = $_POST['title_of_project_cp'];
    $amount_of_grant_cp = $_POST['amount_of_grant_cp'];
    $period_cp = $_POST['period_cp'];
    $role_cp = $_POST['role_cp'];
    $status_cp = $_POST['status_cp'];
    
    try {
        // Establish database connection
        $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Start a transaction
        $conn->beginTransaction();

        $stmt_professional_societies = $conn->prepare("INSERT INTO Professional_Societies (Name_of_Society, Membership_Status) VALUES (?, ?)");
        $stmt_professional_societies->bindParam(1, $name_of_society);
        $stmt_professional_societies->bindParam(2, $membership_status);
        $stmt_professional_societies->execute();

        $stmt_professional_training = $conn->prepare("INSERT INTO Professional_Training (Type_of_Training, Organisation, Year, Duration) VALUES (?, ?, ?, ?)");
        $stmt_professional_training->bindParam(1, $type_of_training);
        $stmt_professional_training->bindParam(2, $organisation);
        $stmt_professional_training->bindParam(3, $year);
        $stmt_professional_training->bindParam(4, $duration);
        $stmt_professional_training->execute();

        $stmt_awards_recognition = $conn->prepare("INSERT INTO Awards_Recognition (Name_of_Award, Awarded_By, Year) VALUES (?, ?, ?)");
        $stmt_awards_recognition->bindParam(1, $name_of_award);
        $stmt_awards_recognition->bindParam(2, $awarded_by);
        $stmt_awards_recognition->bindParam(3, $award_year);
        $stmt_awards_recognition->execute();

        $stmt_sponsored_projects = $conn->prepare("INSERT INTO Sponsored_Projects (Sponsoring_Agency, Title_of_Project, Sanctioned_Amount, Period, Role, Status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_sponsored_projects->bindParam(1, $sponsoring_agency_sp);
        $stmt_sponsored_projects->bindParam(2, $title_of_project_sp);
        $stmt_sponsored_projects->bindParam(3, $sanctioned_amount_sp);
        $stmt_sponsored_projects->bindParam(4, $period_sp);
        $stmt_sponsored_projects->bindParam(5, $role_sp);
        $stmt_sponsored_projects->bindParam(6, $status_sp);
        $stmt_sponsored_projects->execute();

        $stmt_consultancy_projects = $conn->prepare("INSERT INTO Consultancy_Projects (Organization, Title_of_Project, Amount_of_Grant, Period, Role, Status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_consultancy_projects->bindParam(1, $organization_cp);
        $stmt_consultancy_projects->bindParam(2, $title_of_project_cp);
        $stmt_consultancy_projects->bindParam(3, $amount_of_grant_cp);
        $stmt_consultancy_projects->bindParam(4, $period_cp);
        $stmt_consultancy_projects->bindParam(5, $role_cp);
        $stmt_consultancy_projects->bindParam(6, $status_cp);
        $stmt_consultancy_projects->execute();

        $conn->commit();

        // Close the connection
        $conn = null;

        // Redirect after successful insertion
        header("Location: http://localhost/tuter/6th%20page.php");
        exit(); // Ensure script stops execution after redirection
    } catch (PDOException $e) {
        // Rollback the transaction on error
        if (isset($conn)) {
            $conn->rollback();
        }
        // Provide a user-friendly error message
        echo "An error occurred: " . $e->getMessage();
    }

}
    
?> 



<html>
<head>
	<title>Academic Industrial Experience</title>
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap-datepicker.css">
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/jquery.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap-datepicker.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Sintony" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">


	
</head>
<style type="text/css">
    body { background-color: rgb(172, 229, 246); padding-top:0px!important;}

    @keyframes moveText {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    .moving-text {
        animation: moveText 10s linear infinite; /* Adjust duration as needed */
    }
</style>
<style type="text/css">
	body { background-color: rgb(172, 229, 246); padding-top:0px!important;}

</style>
<body>
<div class="container-fluid" style="background-color: rgb(172, 229, 246); margin-bottom: 10px;">
	<div class="container">
        <div class="row" style="margin-bottom:10px; ">
        	<div class="col-md-8 col-md-offset-2">

        		<!--  <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/IITIndorelogo.png" alt="logo1" class="img-responsive" style="padding-top: 5px; height: 120px; float: left;"> -->

        		<h3 style="text-align:center;color:#414002!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>
    			<h3 style="text-align:center;color: #414002!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>
    			

        	</div>
        	

    	   
        </div>
		    <!-- <h3 style="text-align:center; color: #414002; font-weight: bold;  font-family: 'Fjalla One', sans-serif!important; font-size: 2em;">Application for Academic Appointment</h3> -->
    </div>
   </div> 
   <h3 style="color: #ff0026; margin-bottom: 1px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="moving-text">Application for Faculty Position</h3>

<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
.floating-box {
    display: inline-block;
    width: 150px;
    height: 75px;
    margin: 10px;
    border: 3px solid #73AD21;  
}
</style>
<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
label{
  padding: 0 !important;
}

span{
  font-size: 1.2em;
  font-family: 'Oswald', sans-serif!important;
  text-align: left!important;
  padding: 0px 10px 0px 0px!important;
  /margin-bottom: 20px!important;/

}
hr{
  border-top: 1px solid #025198 !important;
  border-style: dashed!important;
  border-width: 1.2px;
}
.panel-heading{
  font-size: 1.3em;
  font-family: 'Oswald', sans-serif!important;
  letter-spacing: .5px;
}
.btn-primary {
  padding: 9px;
}
</style>
<script type="text/javascript">
             
            $(function () {
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
            });
</script>

<script type="text/javascript">
var tr="";
var counter_s_proj=1;
var counter_award=1;
var counter_prof_trg=1;
var counter_membership=1;
var counter_consultancy=1;

  $(document).ready(function(){
  

$("#add_more_s_proj").click(function(){
        create_tr();
        create_serial('s_proj');
        create_input('agency[]', 'Sponsoring Agency','agency'+counter_s_proj, 's_proj',counter_s_proj, 's_proj');
        create_input('stitle[]', 'Title of Project', 'stitle'+counter_s_proj,'s_proj',counter_s_proj, 's_proj');
        create_input('samount[]', 'Amount of grant', 'samount'+counter_s_proj,'s_proj',counter_s_proj, 's_proj');
        create_input('speriod[]', 'Period', 'speriod'+counter_s_proj,'s_proj',counter_s_proj, 's_proj');
        create_input('s_role[]', 'Role', 's_role'+counter_s_proj,'s_proj',counter_s_proj, 's_proj',false,true);
        create_input('s_status[]', 'Status', 's_status'+counter_s_proj,'s_proj',counter_s_proj, 's_proj',true);
        counter_s_proj++;
        return false;
  });
  
  $("#add_more_award").click(function(){
          create_tr();
          create_serial('award');
          create_input('award_nature[]', 'Name of Award','award_nature'+counter_award, 'award',counter_award, 'award');
          create_input('award_org[]', 'Granting body/Organization', 'award_org'+counter_award,'award',counter_award, 'award');
          create_input('award_year[]', 'Year', 'award_year'+counter_award,'award',counter_award, 'award',true);
          counter_award++;
          return false;
    });

  $("#add_more_prog_trg").click(function(){
          create_tr();
          create_serial('prof_trg');
          create_input('trg[]', 'Taining Received','trg'+counter_prof_trg, 'prof_trg',counter_prof_trg, 'prof_trg');
          create_input('porg[]', 'Organization', 'porg'+counter_prof_trg,'prof_trg',counter_prof_trg, 'prof_trg');
          create_input('pyear[]', 'Year', 'pyear'+counter_prof_trg,'prof_trg',counter_prof_trg, 'prof_trg');
          create_input('pduration[]', 'Duration', 'pduration'+counter_prof_trg,'prof_trg',counter_prof_trg, 'prof_trg',true);
          counter_prof_trg++;
          return false;
    });

  $("#add_membership").click(function(){
          create_tr();
          create_serial('membership');
          create_input('mname[]', 'Name of the Professional Society','mname'+counter_membership, 'membership',counter_membership, 'membership');
          create_input('mstatus[]', 'Membership Status (Lifetime/Annual)', 'mstatus'+counter_membership,'membership',counter_membership, 'membership',true);
          counter_membership++;
          return false;
    });

  $("#add_consultancy").click(function(){
          create_tr();
          create_serial('consultancy');
          create_input('c_org[]', 'Organization','c_org'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');
          create_input('ctitle[]', 'Title of Project','ctitle'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');
          create_input('camount[]', 'Amount of grant','camount'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');
          create_input('cperiod[]', 'Period','cperiod'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');

          create_input('c_role[]', 'Role', 'c_role'+counter_consultancy,'consultancy',counter_consultancy, 'consultancy',false,true);
          create_input('c_status[]', 'Status', 'c_status'+counter_consultancy,'consultancy',counter_consultancy, 'consultancy',true);
          counter_consultancy++;
          return false;
    });


});
  function create_select()
  {
    
  }
  function create_tr()
  {
    tr=document.createElement("tr");
  }
  function create_serial(tbody_id)
  {
    //console.log(tbody_id);
    var td=document.createElement("td");
    // var x=0;
     var x = document.getElementById(tbody_id).rows.length;
    // if(document.getElementById(tbody_id).rows)
    // {
    // }
    td.innerHTML=x;
     tr.appendChild(td);
  }
   function for_date_picker(obj)
  {
    obj.setAttribute("data-provide", "datepicker");
    obj.className += " datepicker";
    return obj;

  }
  function deleterow(e){
    var rowid=$(e).attr("data-id");
    var textbox=$("#id"+rowid).val();
    $.ajax({
            type: "POST",
            url  : "https://ofa.iiti.ac.in/facrec_che_2023_july_02/Acd_ind/deleterow/",
            data: {id: textbox},
                success: function(result) { 
                if(result.status=="OK"){
                $('.row_'+rowid).remove();
                            //remove_row('award',rowid, 'award');
                }
                   
                }});

   
    }
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, select=false, datepicker_set=false)
  {
    //console.log(counter);
    if(select==false)
    {

      var input=document.createElement("input");
      input.setAttribute("type", "text");
      input.setAttribute("name", t_name);
      input.setAttribute("id", id);
      input.setAttribute("placeholder", place_value);
      input.setAttribute("class", "form-control input-md");
      input.setAttribute("required", "");
      var td=document.createElement("td");
      td.appendChild(input);
    }
    if(select==true)
    {

      var sel=document.createElement("select");
      sel.setAttribute("name", t_name);
      sel.setAttribute("id", id);
      sel.setAttribute("class", "form-control input-md");
      sel.innerHTML+="<option>Select</option>";
      sel.innerHTML+="<option value='Principal Investigator'>Principal Investigator</option>";
      sel.innerHTML+="<option value='Co-investigator'>Co-investigator</option>";
      // sel.innerHTML+="<option value='in_preparation'>In-Preparation</option>";
      var td=document.createElement("td");
      td.appendChild(sel);
    }
    if(datepicker_set==true)
    {
      input=for_date_picker(input);
    }
    if(btn==true)
    {
      // alert();
      var but=document.createElement("button");
      but.setAttribute("class", "close");
      but.setAttribute("onclick", "remove_row('"+remove_name+"','"+counter+"', '"+tbody_id+"')");
      but.innerHTML="x";
      td.appendChild(but);
    }
    tr.setAttribute("id", "row"+counter);
    tr.appendChild(td);
    document.getElementById(tbody_id).appendChild(tr);
     $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
    
  }
  function remove_row(remove_name, n, tbody_id)
  {
    var tab=document.getElementById(remove_name);
    var tr=document.getElementById("row"+n);
    tab.removeChild(tr);
    var x = document.getElementById(tbody_id).rows.length;
    for(var i=0; i<=x; i++)
    {
      $("#"+tbody_id).find("tr:eq("+i+") td:first").text(i);
      
    }
    
  }
</script>




<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container">
  
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <fieldset>
              <input type="hidden" name="ci_csrf_token" value="" />
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                        <h4>Welcome : <font color="#025198"><strong>Ravina&nbsp;Budania</strong></font></h4>
                    </div>
                    <div class="col-md-2">
                      <a href="https://localhost/tuter/Login%20Page.php/" class="btn btn-sm btn-success  pull-right">Logout</a>
                    </div>
                  </div>
                
                
        </legend>



<!-- Membership of Professional Societies -->

<h4 style="text-align:center; font-weight: bold; color: #6739bb;">9. Membership of Professional Societies </h4>

<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<div class="panel-heading">Fill the Details  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_membership">Add Details</button></div>
  <div class="panel-body">

        <table class="table table-bordered">
            <tbody id="membership">
            
            <tr height="30px">
              <th class="col-md-1"> S. No.</th>
              <th class="col-md-3"> Name of the Professional Society </th>
              <th class="col-md-3"> Membership Status (Lifetime/Annual)</th>
              
            </tr>


            <tr height="60px" class="row_1">
    <td class="col-md-1">1</td>
    <td class="col-md-2">
        <input id="id1" name="id" type="hidden" value="" class="form-control input-md" required="">
        <input id="mname1" name="name_of_society" type="text" value="" placeholder="Name of the Professional Society" class="form-control input-md" required="">
    </td>
    <td class="col-md-2">
        <input id="mstatus1" name="membership_status" type="text" value="" placeholder="Membership Status (Lifetime/Annual)" class="form-control input-md" required="">
    </td>
</tr>
 
                      </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Professional Training -->

<h4 style="text-align:center; font-weight: bold; color: #6739bb;">10. Professional Training </h4>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
    <div class="panel-heading">Fill the Details  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_prog_trg">Add Details</button></div>
      <div class="panel-body">

            <table class="table table-bordered">
                <tbody id="prof_trg">
                
                <tr height="30px">
                  <th class="col-md-1"> S. No.</th>
                  <th class="col-md-3"> Type of Training Received </th>
                  <th class="col-md-3"> Organisation</th>
                  <th class="col-md-2"> Year</th>
                  <th class="col-md-2"> Duration (in years & months)</th>
                  
                </tr>


                                
                <tr height="60px" class="row_1">
    <td class="col-md-1">1</td>
    <td class="col-md-2">
        <input id="id1" name="id" type="hidden" value="" class="form-control input-md" required="">
        <input id="trg1" name="type_of_training" type="text" value="" placeholder="Sponsoring Agency" class="form-control input-md" required="">
    </td>
    <td class="col-md-2">
        <input id="porg1" name="organisation" type="text" value="" placeholder="Title of Project" class="form-control input-md" required="">
    </td>
    <td class="col-md-2">
        <input id="pyear1" name="year" type="text" value="" placeholder="Amount of grant" class="form-control input-md" required="">
    </td>
    <td class="col-md-2">
        <input id="pduration1" name="duration" type="text" value="" placeholder="Amount of grant" class="form-control input-md" required="">
    </td>
</tr>

                              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<!-- Award(s) and Recognition(s) -->

<h4 style="text-align:center; font-weight: bold; color: #6739bb;">11. Award(s) and Recognition(s)</h4>
<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<div class="panel-heading">Fill the Details  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_award">Add Details</button></div>
  <div class="panel-body">

        <table class="table table-bordered">
            <tbody id="award">
            
            <tr height="30px">
              <th class="col-md-1"> S. No.</th>
              <th class="col-md-3"> Name of Award </th>
              <th class="col-md-3"> Awarded By</th>
              <th class="col-md-2"> Year</th>
              
            </tr>
            <tr height="60px">
                            <td class="col-md-1">1</td>
                            <td class="col-md-3">
                                <input id="award_name1" name="name_of_award" type="text" value="" placeholder="Name of Award" class="form-control input-md" required="">
                            </td>
                            <td class="col-md-3">
                                <input id="awarded_by1" name="awarded_by" type="text" value="" placeholder="Awarded By" class="form-control input-md" required="">
                            </td>
                            <td class="col-md-2">
                                <input id="award_year1" name="award_year" type="text" value="" placeholder="Year" class="form-control input-md" required="">
                            </td>
                        </tr>


                      </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<h4 style="text-align:center; font-weight: bold; color: #6739bb;">12. Sponsored Projects/ Consultancy Details</h4>
<!-- sponsored projects  -->
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading">(A) Sponsored Projects &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_s_proj">Add Details</button></div>
        <div class="panel-body">

              <table class="table table-bordered">
                  <tbody id="s_proj">
                  
                  <tr height="30px">
                    <th class="col-md-1"> S. No.</th>
                    <th class="col-md-2"> Sponsoring Agency </th>
                    <th class="col-md-2"> Title of Project</th>
                    <th class="col-md-2"> Sanctioned Amount (&#8377) </th>
                    <th class="col-md-1"> Period</th>
                    <th class="col-md-2"> Role </th>
                    <th class="col-md-2"> Status (Completed/On-going)</th>
                    
                  </tr>


                                    
                  <tr height="60px">
    <td class="col-md-1">1</td>
    <td class="col-md-2">
        <input id="agency1" name="sponsoring_agency_sp" type="text" value="" placeholder="Sponsoring Agency" class="form-control input-md" required="">
    </td>
    <td class="col-md-2">
        <input id="stitle1" name="title_of_project_sp" type="text" value="" placeholder="Title of Project" class="form-control input-md" required="">
    </td>
    <td class="col-md-2">
        <input id="samount1" name="sanctioned_amount_sp" type="text" value="" placeholder="Amount of grant" class="form-control input-md" required="">
    </td>
    <td class="col-md-1">
        <input id="speriod1" name="period_sp" type="text" value="" placeholder="Period" class="form-control input-md" required="">
    </td>
    <td class="col-md-2">
        <select id="s_role1" name="role_sp" class="form-control input-md" required="">
            <option value="">Select</option>
            <option value="Principal Investigator">Principal Investigator</option>
            <option value="Co-investigator">Co-investigator</option>
        </select>
    </td>
    <td class="col-md-2">
        <input id="s_status1" name="status_sp" type="text" value="" placeholder="Status" class="form-control input-md" required="">
    </td>
</tr>

                                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

     <!-- Consultancy Details -->
             <div class="row">
                 <div class="col-md-12">
                   <div class="panel panel-success">
                   <div class="panel-heading">(B) Consultancy Projects  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_consultancy">Add Details</button></div>
                     <div class="panel-body">

                           <table class="table table-bordered">
                               <tbody id="consultancy">
                               
                               <tr height="30px">
                                 <th class="col-md-1"> S. No.</th>
                                 <th class="col-md-3"> Organization </th>
                                 <th class="col-md-2"> Title of Project</th>
                                 <th class="col-md-2"> Amount of Grant</th>
                                 <th class="col-md-1"> Period</th>
                                 <th class="col-md-2"> Role</th>
                                 <th class="col-md-2"> Status</th>
                                 
                               </tr>


                                                              
                               <tr height="60px" class="row_1">
                              <td class="col-md-1">1</td>
                              <td class="col-md-2">
                                  <input id="id1" name="id" type="hidden" value="" class="form-control input-md" required="">
                                  <input id="c_org1" name="organization_cp" type="text" value="" placeholder="Sponsoring Agency" class="form-control input-md" required="">
                              </td>
                              <td class="col-md-2">
                                  <input id="ctitle1" name="title_of_project_cp" type="text" value="" placeholder="Title of Project" class="form-control input-md" required="">
                              </td>
                              <td class="col-md-2">
                                  <input id="camount1" name="amount_of_grant_cp" type="text" value="" placeholder="Amount of Grant" class="form-control input-md" required="">
                              </td>
                              <td class="col-md-1">
                                  <input id="cperiod1" name="period_cp" type="text" value="" placeholder="Period" class="form-control input-md" required="">
                              </td>
                              <td class="col-md-2">
                                  <select id="c_role1" name="role_cp" class="form-control input-md" required="">
                                      <option value="">Select</option>
                                      <option value="Principal Investigator">Principal Investigator</option>
                                      <option value="Co-investigator">Co-investigator</option>
                                  </select>
                              </td>
                          
                            <td class="col-md-2"> 
                                   <input id="c_status1" name="status_cp" type="text" value=""  placeholder="Status" class="form-control input-md" required=""> 
                                 </td>
                               </tr>
                                                            </tbody>
                           </table>
                         </div>
                       </div>
                     </div>

                   </div>
            <!-- Button -->

            <div class="form-group">
              
              <div class="col-md-1">
                <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/publish" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-fast-backward"></i></a>
              </div>

              <div class="col-md-11">
                <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">SAVE & NEXT</button>
                
              </div>
              
            </div>
            </fieldset>
            </form>
        </div>
    </div>
</div>

<div id="footer"></div>
</body>
</html>

<script type="text/javascript">
	
	function blinker() {
	    $('.blink_me').fadeOut(500);
	    $('.blink_me').fadeIn(500);
	}

	setInterval(blinker, 1000);
</script>