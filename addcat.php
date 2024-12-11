<?php
$con = mysqli_connect("localhost", "root", "", "jawad_db");

if (mysqli_connect_errno()) {
    echo "Connection failed";
} else {
    echo "Connected successfully";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jawad Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <?php
        include("asside.php");
        ?>
      
                <!-- End of Topbar -->

                <form action="" class="w-100 p-4" method="post" enctype="multipart/form-data" style="max-width: 600px;">
        <h2 class="text-center mb-4 text-primary">Add New Category</h2>

        <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" name="name" id="categoryName" class="form-control form-control-lg" placeholder="Enter category name" required>
        </div>

        <div class="form-group">
            <label for="categoryDescription">Category Description</label>
            <input type="text" name="des" id="categoryDescription" class="form-control form-control-lg" placeholder="Enter category description" required>
        </div>

        <div class="form-group">
            <label for="categoryImage">Category Image</label>
            <input type="file" name="image" id="categoryImage" class="form-control-file">
        </div>

        <div class="text-center">
            <input style="background-color: #4e73df; color: white; float: left;" type="submit" value="Submit" class="btn btn-lg " name="btn_cat">
        </div>
    </form>

    <?php
    if(isset($_POST['btn_cat'])){
        $cname=$_POST['name'];
        $cdes=$_POST['des'];
        $catimg=$_FILES['image']['name'];
        $cattmpname=$_FILES['image']['tmp_name'];
        $destination="img/".$catimg;
        $extension=pathinfo($catimg, PATHINFO_EXTENSION);
        if($extension=="jpeg" || $extension=="png" || $extension=="jpg" || $extension=="webp"){
        if(move_uploaded_file($cattmpname, $destination))
        $query=mysqli_query($con, "INSERT INTO `category`(`name`, `description`, `image`) VALUES ('$cname','$cdes','$catimg')");
        echo "<script>alert('Category added')</script>";
        }
        else{
            echo "<script>alert('Error')</script>";
        }
        }
        else{
            echo "<script>alert('Category added')</script>";
        }
    
    ?>

                <!-- Begin Page Content -->
                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <?php
            include("footer.php");
            ?>
          
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>