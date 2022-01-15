<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'components/_header.php';
    include 'components/_db_connect.php';
    $FacultyName = $_GET['facultyname'];
    $sql = "SELECT * FROM `Faculty_Details` WHERE Faculty_Name='$FacultyName' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

?>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="<?php echo $_SERVER['PHP_SELF'] . '?facultyname=' .$_GET['facultyname']; ?>">About <?php echo $_GET['facultyname']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="container" align="left">
                    <img src="..." height="500dp" width="500dp" alt="images can not be loaded">
                    <div class="card-body">
                        <h5 class="card-title">Information About <?php echo $_GET['facultyname']; ?></h5>
                        <p class="lead">Designation: <?php echo $row['designation']; ?></p>
                        <p class="lead">Experience: <?php echo $row['experience']; ?> Years</p>
                        <p class="lead">Intrest Of Fields: <?php echo $row['intrest']; ?></p>
                        <p class="lead">Qualification: <?php echo $row['qualification']; ?></p>

                    </div>

                </div>
            </div>
        </div>
        <hr class="my-4">
        <a class="btn btn-outline-warning btn-lg mx-3" href="index.php" role="button">Go to Home Page</a>
        <hr class="my-4">
    </div>
<?php
    include 'components/_footer.php';
}
?>