<!doctype html>
<html>

<head>
    
<?php include_once('config.php');?>
    
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<title>Pay Slip</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">
        


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>

	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- imagesLoaded -->
	<script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
	<!-- slimScroll -->
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Bootbox -->
	<script src="js/plugins/form/jquery.form.min.js"></script>
	<!-- Validation -->
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
<script src="http://cdn.webrupee.com/js" type="text/javascript"></script>
	<!-- Theme framework -->
	<script src="js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="js/demonstration.min.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

<!--MAIN PHP CODE STARTS HERE-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script type="text/javascript">
$(function(){
$(".process").click(function()
    {
//        //alert("asd");
        $("#container").empty();
        function loading_show()
        {
            $('#loading').html("<img src='http://www.accusys.org/new-employee/ajax-loader.gif>").fadeIn('fast');
        }
        function loading_hide()
        {
            $('#loading').fadeOut('fast');
        }   
        var employee = $("#employee").val();
        var month = $("#month").val();
        var year = $("#year").val();
//        alert(employee);
//        alert(month);
        if(employee === "")
        {
          alert("Please Select An Employee!!");
          return false;
        }

        var dataString = {'employee' : employee , 'month': month, 'year':year};  
        //alert(dataString);
            loading_show();                    
            $.ajax
            ({
                type: "POST",
                url: "pay-slip-new-ajax.php",
                cache: false,
                data: dataString,
                success: function(msg)
                {
                    $("#container").ajaxComplete(function(event, request, settings)
                    {
                        //alert(msg);
                        loading_hide();
                        $("#container").html(msg);
                    });
                }
            });

        
    });
});
</script>
</head>
<body>
	<?php include 'ztopmenu.php';?>
    
	<div class="container-fluid" id="content">
		
            <div id="main">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box box-color box-bordered">
                                    <div class="box-title">
                                            <h3>
                                                    <i class="fa fa-table"></i>
                                                    Employee's Salary Slip
                                            </h3>
                                    </div>
                                    <div class="box-content nopadding">
                                    <table class="table table-hover table-nomargin dataTable table-bordered">

                                    <tr>
                                    <td align=center>
                                        <Select NAME=employee id='employee'  class="chosen-select form-control" >
                                        <?php 

                                                        $sql = "SELECT * FROM users WHERE user_type = 'empl' order by fname asc";
                                                        $result = mysql_query($sql);

                                        while($row = mysql_fetch_assoc( $result )){        
                                        ?>
                                                                <option value="<?php echo $row['empcode']; ?>" ><?php echo $row['fname'].' '.$row['lname'] ?></option>
                                        <?php
                                        }mysql_close($dbLink);                                   
                                        ?>
                                        </select>
                                    </td>
                                    <td  align=center>
                                        <select name="month" id='month' class="chosen-select form-control">
                                            <option value="01" >January</option>
                                            <option value="02" >February</option>
                                            <option value="03" >March</option>
                                            <option value="04" >April</option>
                                            <option value="05" >May</option>
                                            <option value="06" >June</option>
                                            <option value="07" >July</option>
                                            <option value="08" >August</option>
                                            <option value="09" >September </option>
                                            <option value="10" >October</option>
                                            <option value="11" >November</option>
                                            <option value="12" >December</option>
                                        </select>
                                    </td>
                                    <td  align=center>
                                        <select name="year" id='year' class="chosen-select form-control">
                                            <option value="2015" >2015</option>
                                            <option value="2014" >2014</option>
                                        </select>
                                    </td>
                                    <td align=center>
                                            <input type="hidden" name="searching" value="yes" />
                                            <input type="submit" name="process" value="Calculate Salary" class="process btn btn-primary" id="process" />
                                    </td>
                                    </tr>
                                    
                            </table>
                                    </div>
                            </div>
                            <div id="loading"></div>
                            <div id="container"  align="center">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	</div>
</body>
</html>
