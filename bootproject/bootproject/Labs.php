<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
}
include 'components/_db_connect.php';
if (isset($_POST['labInsertButton'])) {

    $labId = $_POST['labId'];
    $labName = $_POST['labName'];
    $deptId = $_POST['deptId'];
    $labDesc = $_POST['labDesc'];
    $name = $_FILES['labImage']['name'];
    $tmp = $_FILES['labImage']['tmp_name'];
    move_uploaded_file($tmp, "resorces/" . $name);
    $path = pathinfo($name);
    $target_dir = "resources/";
    $ext = $path['extension'];
    $path_filename_ext = $target_dir . $name;
    if(move_uploaded_file($tmp,$path_filename_ext)){
        $sql = "INSERT INTO `deptLab` (`labId`, `deptId`, `labName`, `labImage`, `labDesc`) VALUES ('$labId', '$deptId', '$labName', '$name', '$labDesc')";
        mysqli_query($conn, $sql);
        echo mysqli_error($conn);
    }
}

$sql = "SELECT * FROM deptLab";
$result = mysqli_query($conn, $sql);
$numofrow = mysqli_num_rows($result);
$deptname = $_GET['deptname'];
$deptidquery = "SELECT * FROM `tb_dept` WHERE `dept_name` LIKE '$deptname'";
$deptidResult = mysqli_query($conn, $deptidquery);
$deptiRow = mysqli_fetch_assoc($deptidResult);
$deptId = $deptiRow['dept_id'];
$deptName = $deptiRow['dept_name'];
?>
<?php


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
    ?>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        if ($i % 2 == 0) {    ?>

            <div class="container marketing my-2">
                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h4 id="scrollspyHeading1 featurette-heading"><?php echo $row['labName']; ?><span class="text-muted">id.<?php echo $row['labId']; ?></span></h4>
                        <!-- <p class="lead"><?php $str = get60Words($row['labDesc']);
                                                echo $str;
                                                ?>...</p> -->
                        <p class="lead"><?php $str = get60Words($row['labDesc']);
                                        echo substr($row['labDesc'], 0, 100);
                                        ?>...</p>
                        <p><a class="btn btn-secondary" href="departmentLabs.php?deptId=<?php echo $row['deptId']; ?>">Read more»</a></p>
                    </div>
                    <div class="col-md-5">
                        <?php
                        echo '<img width="225" height="225" alter="'.$row['labImage'].'" src="resources/' . $row['labImage'] . '" >';
                        ?>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container marketing my-2">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h4 id="scrollspyHeading1 featurette-heading"><?php echo $row['labName']; ?><span class="text-muted">id.<?php echo $row['labId']; ?></span></h4>
                        <p class="lead"><?php $str = get60Words($row['labDesc']);
                                        echo substr($row['labDesc'], 0, 100);
                                        ?>....</p>
                        <p><a class="btn btn-secondary" href="departmentLabs.php?deptId=<?php echo $row['deptId']; ?>">Read more»</a></p>
                    </div>
                    <div class="col-md-5">
                        <?php
                        echo '<img width="225" height="225" src="resources/' . $row['labImage'] . '" >';
                        ?>

                    </div>
                </div>
            </div>
    <?php  }
        $i++;
    } ?>
    </div>
    </div>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#labInsert">
            Insert lab in database
        </button>
    </div>

    <?php include 'components/_footer.php' ?>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="labInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <form action="index.php"  method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">enter the labId</label>
                            <input type="number" class="form-control" id="labid" name="labId" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">department id</label>
                            <input type="number" class="form-control" id="deptId" name="deptId">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Lab Namne</label>
                            <input type="text" class="form-control" id="labName" name="labName">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">lab description </label>
                            <input type="text" class="form-control" id="labDesc" name="labDesc">
                        </div>
                        <div class="mb-3">
                            <label for="Image" class="form-label">lab Image</label>
                            <input type="file" name="labImage">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="labInsertButton" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form> -->
                    <form action="Labs.php" method="POST" enctype="multipart/form-data">
                        <div class=" mb-3">
                            <label for="exampleInputEmail1" class="form-label">enter the labId</label>
                            <input type="number" class="form-control" id="labid" name="labId" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">department id</label>
                            <input type="number" class="form-control" id="deptId" name="deptId">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Lab Namne</label>
                            <input type="text" class="form-control" id="labName" name="labName">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">lab description </label>
                            <input type="text" class="form-control" id="labDesc" name="labDesc">
                        </div>
                        <div class="mb-3">
                            <label for="Image" class="form-label">Image</label>
                            <input type="file" name="labImage">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="labInsertButton" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
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

<?php
function get60Words(string $str)
{
    $words = str_word_count($str, 2);
    $cnt = 0;
    foreach ($words as $strPos => $v) {
        if ($cnt++ === 30) {
            return substr($str, 0, $strPos - 1);
        }
    }

    return $str;
}
?>