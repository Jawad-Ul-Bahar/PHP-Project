
<?php
$con = mysqli_connect("localhost", "root", "", "jawad_db");

if (mysqli_connect_errno()) {
    echo "Connection failed";
} else {
    echo "Connected successfully";
}
?>

