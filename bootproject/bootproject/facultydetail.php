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
            <?php
                if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) { ?>
                    <p class="lead">
                        <a class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editFacultyInfo" role="button"><button type="button" class="btn btn-outline-primary">edit Information of  <?php echo  $_GET['facultyname']; ?></button></a>
                    </p>
                <?php
                }
                ?>
        </div>
        <hr class="my-4">
        <a class="btn btn-outline-warning btn-lg mx-3" href="index.php" role="button">Go to Home Page</a>
        <hr class="my-4">
    </div>
<?php
    include 'components/_footer.php';
}
?>

<div class="modal" id="editFacultyInfo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Faculty Information </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Faculty.php?category=faculty" method="POST">
                    <div class="mb-3">
                        
                        <input type="hidden" value="<?php echo $row['Faculty_Id']; ?>" name="facultyid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                        <label for="just"><?php echo $row['Faculty_Id']; ?></label>
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change name <?php echo $row['Faculty_Name']; ?></label>
                        <input type="text" name="editfacultyname" value="<?php echo $row['Faculty_Name']; ?>" class="form-control" id="editfacultyname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change <?php echo $row['designation']; ?></label>
                        <input type="text" name="editfacultydesignation" value="<?php echo $row['designation']; ?>" class="form-control" id="editfacultydesignation" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change <?php echo $row['experience']; ?></label>
                        <input type="text" name="editfacultyexperience" value="<?php echo $row['experience']; ?>" class="form-control" id="editfacultyexperience" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change <?php echo $row['intrest']; ?></label>
                        <input type="text" name="editfacultyintrest" value="<?php echo $row['intrest']; ?>" class="form-control" id="editfacultyintrest" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change <?php echo $row['qualification']; ?></label>
                        <input type="text" name="editfacultyqualification" value="<?php echo $row['qualification']; ?>" class="form-control" id="editfacultyqualification" aria-describedby="emailHelp">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>