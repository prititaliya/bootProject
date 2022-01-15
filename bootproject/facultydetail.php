<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'components/_header.php';
    include 'components/_db_connect.php';
    $FacultyName=$_GET['facultyname'];
    $sql = "SELECT * FROM `Faculty_Details` WHERE Faculty_Name='$FacultyName' ";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

?>
    <div class="container">
        <img src="..." height="500dp" width="500dp" alt="images can not be loaded">
        <div class="card-body">
            <h5 class="card-title">Information About <?php echo $_GET['facultyname']; ?></h5>
            <p class="lead">Designation: <?php echo $row['designation'];?></p>
            <p class="lead">Experience: <?php echo $row['experience'];?> Years</p>
            <p class="lead">Intrest Of Fields: <?php echo $row['intrest'];?></p>
            <p class="lead">Qualification: <?php echo $row['qualification'];?></p>
            <a class="btn btn-outline-warning btn-lg mx-3" href="index.php" role="button">Go to Home Page</a>
        </div>

    </div>

<?php
    include 'components/_footer.php';
}
?>