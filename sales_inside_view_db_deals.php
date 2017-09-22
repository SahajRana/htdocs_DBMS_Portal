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
  <title>View D.B Entries | Sales Department System</title>
  
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

html { width: 100%; height:100%;  }

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
	margin: 0;
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
input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
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
	<?php
		
		include 'db_handler.php';
		$iddb=$_SESSION['iddb'];
		echo "$iddb";

		$sqlCheck = "SELECT * FROM sales_db_entry_table WHERE iddb=$iddb";
		$result = mysqli_query($conn,$sqlCheck);

	?>
	
  <div class="login">	
	<h1 style="margin-bottom: 40px;">Sales D.B Deals</h1>
	<div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" style="width: 30px;" class="form-control" placeholder="#id" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Date" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Services" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Feedback" disabled></th>
                        <th style="width: 60px; background:#fff;"><input type="text" class="form-control" placeholder="Edit" disabled></th>                      
                        <th style="width: 60px; background:#fff;"><input type="text" class="form-control" placeholder="Delete" disabled></th>
                    </tr>
                </thead>
                <tbody>
                 	<?php
			          while( $row = mysqli_fetch_assoc( $result ) ){
			            echo
			            "<tr>
			              <td style=\"width: 30px; background:#fff;\">{$row['id']}</td>

			              <td id=\"tddatedb{$row['id']}\" style=\"width: 60px;\">{$row['datedb']}</td>

			              <td id=\"tdservicesdb{$row['id']}\" style=\" max-width: 100px; width:150px;\">{$row['servicesdb']}</td>
			              <td id=\"tdfeedbackdb{$row['id']}\" style=\" max-width: 100px; width:50px;\">{$row['feedbackdb']}</td>

			              <td style=\"width: 60px; background:#fff;\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\"><button class=\"btn btn-primary btn-xs\" data-title=\"Edit\" data-toggle=\"modal\" data-target=\"#edit\" data-book-id=\"{$row['id']}\"><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td>

	                    <td style=\"width: 60px; background:#fff;\"><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><button class=\"btn btn-danger btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"#delete\" data-book-id=\"{$row['id']}\" ><span class=\"glyphicon glyphicon-trash\"></span></button></p></td>
			            </tr>\n";
			          }
			        ?>
                </tbody>
            </table>
        </div>
    </div>
	  
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	    <div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	            <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
	        </div>
	        <div class="modal-body">
	        	<div class="form-group">
	                <input class="form-control " name="dxdatedb" id="dxdatedb" type="date" >
	            </div>
	            <div class="form-group">
	                <input class="form-control " name="dxservicesdb" id="dxservicesdb" type="text" >
	            </div>
	            <div class="form-group">
	                <input class="form-control " name="dxfeedbackdb" id="dxfeedbackdb" type="text" >
	            </div>
	        </div>
	        <div class="modal-footer ">
	            <button type="button" data-dismiss="modal" id="update"  class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
	        </div>
	    </div>
	    <!-- /.modal-content --> 
	    </div>
	      <!-- /.modal-dialog --> 
	</div>
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
	                </div>
	                <div class="modal-body">
	                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>. Are you sure you want to delete this Record?
	                    </div>
	                       
	                </div>
	                <div class="modal-footer ">
	                        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
	                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
	                </div>
	            </div>
	            <!-- /.modal-content --> 
	        </div>
	        <!-- /.modal-dialog --> 
	</div>

    <form action="sales_inside_view_db.php" method="post">
    	<button type="submitLogout" style="margin-top: 30px; width: 100px;" class="btn btn-primary btn-block btn-large">Go back</button>
    </form>
    <form action="logout.php" method="post">
    	<button type="submitLogout" style="margin-top: 10px; margin-bottom: 40px; width: 100px;" class="btn btn-primary btn-block btn-large">Logout</button>
    </form>
    
  </div>
  <div>
		<a class="circle" href="https://stackoverflow.com/users/5131039/sahaj-rana">SR</a>
  </div>
    <script src="js/index.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/sales_view_entry_db_table_js.js"></script>
</body>
</html>