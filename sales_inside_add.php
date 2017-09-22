<?php
	session_start();
	if(!isset($_SESSION['dep'])){
		//echo('You are not logged in!');
		header("Location: index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Add New Entry</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  
  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(https://fonts.googleapis.com/css?family=Open+Sans);
.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 100%; display:block; }

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

html { width: 100%; height:100%; overflow-x: hidden; }

body { 
	width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: #092756;
	background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
	background-repeat: no-repeat;
    background-attachment: fixed;
}
.login { 
	position: absolute;
	
	margin: 0 auto;
	margin-top: 40px;
	margin-left: 40px;
	width:94.65%;
}
.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

input { 
	width: 100%; 
	margin-bottom: 10px; 
	background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}

textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    margin-bottom: 10px;
   background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
    resize: none;
}

input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
textarea:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
.circle {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  color: #fff;
  line-height: 47px;
  text-decoration: none;
  display:inline-block;
  text-align: center;
  background: #a5a5a5;
  position:fixed; bottom:0; right:0; margin-right: 20px; margin-bottom: 20px; font-size: 20px;
}
.filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-ms-input-placeholder {
    color: #333;
}
table {
	border-collapse:collapse;
}
table td {
	border:solid 1px #fab; word-wrap:break-word;
}

    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
	
  <div class="login">
	<h1 style="margin-bottom: 4px;">New Sales ( Job Ordered ) Entry</h1>
    <form action="sales_entry_php.php" method="post">
    	<div style="margin-top: 100px;" class="panel panel-primary filterable ">
	            <div class="panel-heading">
	                <h3 class="panel-title">Details</h3>
	                <div class="pull-left">
	                	<button class="btn btn-default btn-xs btn-plus" id="btnAddd" onClick="Add()"><span class="glyphicon glyphicon-plus"></span> New</button>
	                	<button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
	                </div>
	            </div>
	            <table class="table" id="tblData">
	                <thead>
	                    <tr class="filters">
	                        <th style="width: 60px;"><input type="text" style="width: 60px;" class="form-control"  placeholder="#id*" disabled></th>
	                        <th ><input type="text"  class="form-control" placeholder="Reservation details" disabled></th>
	                        <th style="width: 140px;"><input type="text" style="width: 140px;" class="form-control" placeholder="Number*" disabled></th>
	                        <th style="width: 100px;"><input type="text" style="width: 100px;" class="form-control" placeholder="Cost*" disabled></th>
	                        <th style="width: 100px;"><input type="text" style="width: 100px;" class="form-control" placeholder="Total*" disabled></th>
	                        <th style=" background:#fff;"><input type="text"  class="form-control" placeholder="Reservation Person*" disabled></th>
	                        <th style="width: 100px; background:#fff;"><input type="text" style="width: 100px;" class="form-control" placeholder="Rest*" disabled></th>
	                        <th style="width: 85px; background:#fff;"><input type="text" class="form-control" placeholder="Save/Edit" disabled></th>
	                        <th style="width: 85px; background:#fff;"><input type="text" class="form-control" placeholder="Delete" disabled></th>
	                    </tr>
	                </thead>
		           	<tbody>
	                    
	                </tbody>
	            </table>
	    </div>
    	<div class="col-xs-12" >	
	      <br> <p style="color: #efefef; margin-bottom: -5px; margin-top: 0px;">Job ordered date*:</p>
	      <br>
	       <input type="date" name="date" placeholder="Date" required="required" />
	    </div>
	    <input type="text" name="cliname" placeholder="Client Name*" required="required" />
    	<input type="text" name="saleres" placeholder="Sales Responsible*" required="required" />
    	<input type="number" name="mobno" placeholder="Mobile Number*" required="required" />
    	
        <input type="text" name="email" placeholder="Email*" required="required" />
        
        <input type="text" name="meetpnt" placeholder="Meeting Point*" required="required" />
        <div class="col-xs-12" >
	      <br> <p style="color: #efefef; margin-bottom: -5px; margin-top: 0px;">Meeting Time*:</p>
	      <br>
	       <input type="time" name="meettime" placeholder="Meeting Time" required="required" />
	    </div>
	    <div class="col-xs-12" >
	      <br> <p style="color: #efefef; margin-bottom: -5px; margin-top: 0px;">Return time*:</p>
	      <br>
	        <input type="time" name="retntime" placeholder="Return Time" required="required" />
	    </div>
        <div class="col-xs-12" >
	      <br> <p style="color: #efefef; margin-bottom: 0px; margin-top: 0px;">Select Event*:</p>
	      <br>
	      <div class="btn-group btn-group-horizontal" data-toggle="buttons" style="margin-bottom: 25px;">
	       	<label class="btn active">
	          <input type="radio" name="radio" value='Select' checked><span>Select</span>
	        </label>
	        <label class="btn">
	          <input type="radio" name="radio" value='Public'><span>Public</span>
	        </label>
	        <label class="btn">
	          <input type="radio" name="radio" value='Private'><span>Private</span>
	        </label>
	        <label class="btn">
	          <input type="radio" name="radio" value='Organising'><span>Organising</span>
	        </label>
	        <label class="btn">
	          <input type="radio" name="radio" value='Others'><span>Others</span>
	        </label>

	      </div>
	    </div>

		<textarea type="text" name="othrinfo" placeholder="Event Details" ></textarea>

        <input type="text" name="trpname" placeholder="Trip Name*" required="required" />
        <div class="col-xs-12" >
	      <br> <p style="color: #efefef; margin-bottom: -5px; margin-top: 0px;">Date*:</p>
	      <br>
	        <input type="date" name="trpdate" placeholder="date" required="required" />
	    </div>
        <input type="day" name="trpday" placeholder="Day*" required="required" />    
        
		
	   

	    <textarea type="text" name="addinfo" placeholder="Any Additional Information on the program" ></textarea>
	    <div style="margin-bottom: 5px;" class="col-xs-12" >
	      <br> <p style="color: #efefef; margin-bottom: -5px; margin-top: 0px;">Payment Date & Method*:</p>
	      <br>
	        <input type="date" name="datepay" placeholder="date" required="required" />
	        <input type="text" name="paymeth" placeholder="Payment Method*" required="required"></input>
	    </div>
	    
	    <textarea type="text" name="orgrec" placeholder="Organiser recomendation" ></textarea>
	


        <button type="submit" class="btn btn-primary btn-block btn-large">+ Add New Entry</button>    
    </form>

 	<form action="sales_inside.php" method="post">
    	<button type="submitBack" style="margin-top: 20px;" class="btn btn-primary btn-block btn-large">Go Back</button>
    </form>
    <form action="logout.php" method="post">
    	<button type="submitLogout" style="margin-top: 8px; margin-bottom: 100px;" class="btn btn-primary btn-block btn-large">Logout</button>
    </form>
   

</div>
  <div  >
	<a class="circle" href="https://stackoverflow.com/users/5131039/sahaj-rana">SR</a></div>
    <script src="js/index.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/sales_table.js"></script>
    
</body>
</html>
