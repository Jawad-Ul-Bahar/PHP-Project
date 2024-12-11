 <?php
include('connection.php');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<?php
if(isset($_GET['up'])){
    $up=$_GET['up'];
    $query=mysqli_query($con,"SELECT * FROM `category` WHERE id=$up");
    $col=mysqli_fetch_array($query);

}
?>

<body class="bg-light">
<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="container mt-5">
        <h2 style="color: #4e73df;" class="text-center">Update Record</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
            <div class="mb-3">
                <label for="c_name" class="form-label">Cat_Name</label>
                <input type="text" name="name" id="uname" value="<?php echo $col [1] ?>" class="form-control" placeholder="Category Name" required>
            </div>

            <div class="mb-3">
                <label for="des" class="form-label">Description</label>
                <input type="text" name="description" id="uemail" value="<?php echo $col [2] ?>" class="form-control" placeholder="Description" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" value="<?php echo $col [3] ?>" class="form-control" placeholder="" required>
            </div>

            <!-- <a href=""  name="update" class="btn btn-info">Update</a> -->
             <input class="btn btn-success" type="submit" value="update"  name="update">
            <a style="background-color: #4e73df; color: white;" class="btn" href="fetching.php">View Record</a>            
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $cname = $_POST['name'];
    $des = isset($_POST['description']) ? $_POST['description'] : ''; 
    $up = $_GET['up']; 
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $destination = "img/" . $imageName;
    $extension = pathinfo($imageName, PATHINFO_EXTENSION);
    if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'jfif') {
        if (move_uploaded_file($imageTmpName, $destination)) {
            $query = "UPDATE `category` SET `name`='$cname', `description`='$des', `image`='$imageName' WHERE `id`='$up'";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<script>alert('Category updated successfully.');</script>";
            } else {
                echo "<script>alert('Error updating category: " . mysqli_error($con) . "');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    } else {
        echo "<script>alert('Invalid file type. Only images are allowed.');</script>";
    }
}
?>
   
 
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $del = mysqli_query($con, "DELETE FROM `category` WHERE id=$id");
        if ($del) {
            echo "<script>alert('Data deleted');
            location.assign('fetching.php');
            </script>";
        }
    }
    ?>

                </div>
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


