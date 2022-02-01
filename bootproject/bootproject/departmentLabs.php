<?php
include 'components/_header.php';
?>
<?php
    $deptname=$_GET['deptname'];
    $deptidquery="SELECT * FROM `tb_dept` WHERE `dept_name` LIKE '$deptname'";
    $deptidResult=mysqli_query($conn,$deptidquery);
    $deptiRow=mysqli_fetch_assoc($deptidResult);
    $deptId=$deptiRow['dept_id'];
    $i = 2;
    $sql = "SELECT * FROM `Faculty_Details` WHERE Department_Id='$deptId' ";
    $result = mysqli_query($conn, $sql);
    $numofrow = mysqli_num_rows($result);
    ?>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo 'departmentdetail.php?deptname=' . $_GET['deptname']; ?>">About <?php echo $_GET['deptname']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="true" href="<?php echo 'people.php' . '?deptname=' . $_GET['deptname']."&category=faculty"; ?>">FACULTY of <?php echo $_GET['deptname']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="true" href="<?php echo 'people.php' . '?deptname=' . $_GET['deptname']."&category=staff"; ?>">STAFF of <?php echo $_GET['deptname']; ?></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link
                    <?php 
                        if($_SERVER['PHP_SELF']== "/bootproject/departmentLabs.php"){
                            echo "active";
                        }?>
                    " href="<?php echo "departmentLabs.php" . '?deptname=' . $_GET["deptname"]; ?>">Labs for <?php echo $_GET['deptname']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h1 class="card-title"><?php echo $deptname; ?></h1>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($i % 2 == 0) {    ?>
                        <div class="container">
                            <div class="container marketing my-3">
                                <div class="row featurette">
                                    <div class="col-md-7 order-md-2">
                                        <h2 align='left' class="featurette-heading"><?php echo $row['Faculty_Name']; ?>
                                            <p align='left' class="lead">Designation: <?php echo $row['designation']; ?></p>
                                            <p align='left' class="lead">Experience: <?php echo $row['experience']; ?> Years</p>
                                            <p align='left' class="lead">Intrest Of Fields: <?php echo $row['intrest']; ?></p>
                                            <p align='left' class="lead">Qualification: <?php echo $row['qualification']; ?></p>
                                            <p align='left'><a class="btn btn-secondary" href="/bootproject/facultydetail.php?facultyname=<?php echo $row['Faculty_Name']; ?>">See more»</a></p>
                                            
                                    </div>
                                    <div class="col-md-5">
                                        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="250" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 250x250" preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">250x250</text>
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="container marketing my-3">
                            <div class="row featurette">
                                <div class=" col-md-7">
                                    <h2 align='center' class="featurette-heading"><?php echo $row['Faculty_Name']; ?>
                                        <p align='center' class="lead">Designation: <?php echo $row['designation']; ?></p>
                                        <p align='center' class="lead">Experience: <?php echo $row['experience']; ?> Years</p>
                                        <p align='' class="lead">Intrest Of Fields: <?php echo $row['intrest']; ?></p>
                                        <p align='center' class="lead">Qualification: <?php echo $row['qualification']; ?></p>
                                        <p align='center'><a class="btn btn-secondary" href="/bootproject/facultydetail.php?facultyname=<?php echo $row['Faculty_Name']; ?>">See more»</a></p>
                                </div>
                                <div class="col-md-5">
                                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="250" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 250x250" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">250x250</text>
                                    </svg>

                                </div>
                            </div>
                        </div>
                <?php  }
                    $i++;
                } ?>
            </div>
        </div>

        <hr class="my-4">
        <a class="btn btn-outline-warning btn-lg mx-3" href="index.php" role="button">Go to Home Page</a>
        <hr class="my-4">
    </div>

<?php
include 'components/_footer.php';
?>