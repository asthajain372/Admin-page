<?php
require './class/atclass.php';
?>
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Responsive_table :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!-- header start -->
<?php
        include './themepart/header.php';
        ?>
<!-- header ends -->
<!--sidebar start-->
<?php
        include './themepart/sidebar.php';
        ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Product table
    </div>
    <a href="add-product.php"><h3>Add Product</h3></a>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">ID</th>
            <th> Name</th>
            <th>Price</th>
            <th data-breakpoints="xs">Action</th>
           
            <!-- <th data-breakpoints="xs sm md" data-title="DOB">Date of Birth</th> -->
          </tr>
        </thead>
 <tbody>
<?php

if(isset($_GET['did']))
{
    $did = $_GET['did'];
    $deleteq = mysqli_query($connection, "delete from tb_product where pro_id ={$did}") or die(mysqli_error($connection));
    if($deleteq)
    {
        echo"<script>alert('Record deleted');</script> ";
    }
}

$selectq = mysqli_query($connection, "select * from tb_product") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectq);
echo $count . " Record Found";

while($productrow =mysqli_fetch_array($selectq))
{
    echo"<tr>";
    echo"<td>{$productrow['pro_id']}</td>";
    echo"<td>{$productrow['pro_name']}</td>";
    echo"<td>{$productrow['pro_price']}</td>";
    echo"<td><a href='edit-product.php?eid={$productrow['pro_id']}'>Edit</a>|<a href = 'display-product.php?did={$productrow['pro_id']}'> Delete </a> </td>";
    echo"</tr>";
}
        ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>
 <!-- footer -->
		<?php
        include './themepart/footer.php';
        ?>
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
