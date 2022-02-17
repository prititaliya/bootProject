<?php
session_start();
include 'components/_header.php';
?>
<?php
if (isset($_POST['labEditButton']) ) {
    include "components/_db_connect.php";
    $labId = $_POST['labId'];
    $labName = $_POST['labName'];
    $deptId = $_POST['deptId'];
    $labDesc = $_POST['labDesc'];
    $path_filename_ext = $target_dir . $name;
        $sql = "UPDATE `deptLab` SET `labId` = $labId, `deptId` = $deptId, `labName` = '$labName', `labDesc` ='$labDesc' WHERE `deptLab`.`labId` = $labId";
        mysqli_query($conn, $sql);
        // mysqli_error($conn);
        header('Location:/bootproject/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h3 class="mx-2 my-2" style="text-align: center;">Changing Data about Lab</h3>
        <?php

        $LabId = $_GET['labId'];
        include "components/_db_connect.php";
        $sql = "SELECT * FROM `deptLab` WHERE `labId` = $LabId";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<form  action="labDetails.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">enter the labId</label>
            <input type="number" class="form-control" value="'.$row['labId'].'" id="labid" name="labId" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">department id</label>
            <input type="number" class="form-control" value="'.$row['deptId'].'" id="deptId" name="deptId">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Lab Name</label>
            <input type="text" class="form-control" value="'.$row['labName'].'" id="labName" name="labName">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">lab description </label>
            <input type="text" class="form-control" value="'.$row['labDesc'].'" id="labDesc" name="labDesc">
        </div>
        <div class="mb-3">
            <label for="Image" class="form-label">If you want to change image then go resources folder and delete old image with ' . $row['labImage'] . ' and add new image with ' . $row['labImage'] . '</label>
            <input type="hidden" name="imageid" value="' . $row['imageId'] . ' ">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="labEditButton" class="btn btn-primary">Save Changes</button>
        </div>
    </form>';

        ?>
    </div>
</body>

</html>
<?php
include 'components/_footer.php';
?>