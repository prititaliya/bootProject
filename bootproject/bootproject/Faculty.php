<?php
include 'components/_db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $facutlyname = $_POST['editfacultyname'];
    $designation = $_POST['editfacultydesignation'];
    $experience = $_POST['editfacultyexperience'];
    $intrest = $_POST['editfacultyintrest'];
    $qualification = $_POST['editfacultyqualification'];
    $facutlyid = $_POST['facultyid'];
    // $sql = "UPDATE `tb_dept` SET `dept_name` ='$deptname' WHERE `tb_dept`.`dept_id` = '$deptid'";
    $sql = "UPDATE `Faculty_Details` SET `Faculty_Name` = '$facutlyname', `designation` = '$designation', `experience` = '$experience', `intrest` = '$intrest', `qualification` = ' $qualification' WHERE `Faculty_Details`.`Faculty_Id` = $facutlyid";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        $haschanged = $facutlyname;
    } else {
        $haschanged = $facutlyname;
    }
}
?>

<?php
if ($haschanged) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>information about ' . $haschanged . '!</strong> has changed successfully 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}
?>
<?php
if (session_status() == 1)
    session_start();
$haschanged = false;
include 'components/_db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['editeddeptname'])) {
        $deptname = $_POST['editeddeptname'];
        $deptid = $_POST['deptid'];
        $sql = "UPDATE `tb_dept` SET `dept_name` ='$deptname' WHERE `tb_dept`.`dept_id` = '$deptid'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $haschanged = $deptname;
        } else {
            $haschanged = $deptname;
        }
    } else if (isset($_POST['editeddeptdesc'])) {
        $deptdesc = $_POST['editeddeptdesc'];
        $deptid = $_POST['deptid'];
        $sql = "UPDATE `tb_dept` SET `dept_desc` ='$deptdesc' WHERE `tb_dept`.`dept_id` = '$deptid'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            $haschanged = 'description';
        } else {
            $haschanged = 'description';
        }
    }
}
?>
<?php
include 'components/_db_connect.php';
$sql = "SELECT * FROM tb_dept";
$result = mysqli_query($conn, $sql);
$numofrow = mysqli_num_rows($result);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php include 'components/_header.php' ?>
    <?php
    if ($haschanged) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $haschanged . '!</strong> has changed successfully 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    ?>
    <?php
    $i = 2;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($i % 2 == 0) {    ?>
            <div class="container marketing my-2">
                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading"><?php echo $row['dept_name']; ?> <span class="text-muted">id.<?php echo $row['dept_id']; ?></span></h2>
                        <p class="lead">Read About Faculties of <?php echo $row['dept_name'] ?></p>
                        <p><a class="btn btn-secondary" href="/bootproject/people.php?deptname=<?php echo $row['dept_name']; ?>&category=<?php echo  $_GET['category']; ?>">See more»</a></p>
                    </div>
                    <div class="col-md-5">
                        
                    <img src="resources/<?php echo $row['dept_id'] ?>.jpeg" alt="<?php echo $row['dept_name']; ?>" height="250dp" width="250dp">

                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container marketing my-2">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading"><?php echo $row['dept_name']; ?> <span class="text-muted">id.<?php echo $row['dept_id']; ?></span></h2>
                        <p class="lead">Read About Faculties of <?php echo $row['dept_name'] ?></p>
                        <p><a class="btn btn-secondary" href="/bootproject/people.php?deptname=<?php echo $row['dept_name']; ?>&category=<?php echo  $_GET['category']; ?>"">See more»</a></p>
                    </div>
                    <div class=" col-md-5">
                                <img src="resources/<?php echo $row['dept_id'] ?>.jpeg" alt="<?php echo $row['dept_name']; ?>" height="250dp" width="250dp">

                    </div>
                </div>
            </div>
    <?php  }
        $i++;
    } ?>



    <?php include 'components/_footer.php' ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>