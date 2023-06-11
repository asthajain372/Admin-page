<?php
require './class/atclass.php';
$editid = $_GET['eid'];

if(!isset($_GET['eid'])|| empty($_GET['eid']))
{
    header("location:display-product.php");
}
$selectq = mysqli_query($connection,"select * from tb_product where pro_id='{$editid}'") or die(mysqli_error($connection));
$selectrow = mysqli_fetch_array($selectq);
// print_r($selectrow);
$msg = "";
if($_POST)
{
    $id =$_POST['id'];
    $pname=mysqli_real_escape_string($connection ,$_POST['pname'] );
    $pprice=mysqli_real_escape_string($connection ,$_POST['pprice'] );
    $pdetails =mysqli_real_escape_string($connection , $_POST['pdetails']);
  

    // $query = mysqli_query($connection,"update tb_product set pro_name='{$pname}', pro_price='{$pprice}' pro_details='{$pdetails}' where pro_id='{$id}'") or die(mysqli_error($connection));
    $query = mysqli_query($connection,"update tb_product set pro_name = '{$pname}' , pro_price = '{$pprice}', pro_details = '{$pdetails}' where pro_id= '{$id}' ") or die(mysqli_error($connection));
    if($query)
    {
        echo"<script>alert('Record Updated');window.location='display-product.php';</script>";

    }
}
?>
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Form_component :: w3layouts</title>
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
<!--header start-->
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
	<div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php
                    echo $msg;
                    ?>
                    <header class="panel-heading">
                        Product Forms
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data ">
                                <input type="hidden" name="id" value="<?php echo $selectrow['pro_id'] ?>">
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Product_name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputEmail1" value="<?php echo $selectrow['pro_name'] ?>" placeholder = "Enter Product Name" name="pname" required >
                                </div>
                            </div>
                      
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Product_price</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputEmail1" value="<?php echo $selectrow['pro_price'] ?>" placeholder=" Enter Product Name " name="pprice" required >
                                </div>
                            </div>
                      
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Product_detais</label>
                                <div class="col-lg-10">
                                    <textarea  class="form-control" required name="pdetails" ><?php echo $selectrow['pro_details'] ?></textarea>
                                </div>
                            </div>
                      
                            <!-- <div class="form-group"> -->
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">update Product</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="button" class="btn btn-info" onclick="window.location='display-product.php';" >View</button>
                                </div>
                            <!-- </div> -->
                        </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
</div>
</section>
<!-- </section> -->
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
