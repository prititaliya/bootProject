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
    ?>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        if ($i % 2 == 0) {    ?>

            <div class="container marketing my-2">
                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <!-- <h2 class="featurette-heading"><?php echo $row['dept_name']; ?> <span class="text-muted">id.<?php echo $row['dept_id']; ?></span></h2> -->
                        <h4 id="scrollspyHeading1 featurette-heading"><?php echo $row['dept_name']; ?><span class="text-muted">id.<?php echo $row['dept_id']; ?></span></h4>
                        <!-- <p class="lead"><?php $str = get60Words($row['dept_desc']);
                                                echo $str;
                                                ?>...</p> -->
                        <p class="lead"><?php $str = get60Words($row['dept_desc']);
                                        echo $str;
                                        ?>...</p>
                        <p><a class="btn btn-secondary" href="departmentdetail.php?deptname=<?php echo $row['dept_name']; ?>">Read more»</a></p>
                    </div>
                    <div class="col-md-5">
                        <img src="https://source.unsplash.com/250x250/?<?php echo $row['dept_name'] ?>">

                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container marketing my-2">
                <div class="row featurette">
                    <div class="col-md-7">
                        <!-- <h2 class="featurette-heading"><?php echo $row['dept_name']; ?> <span class="text-muted">id.<?php echo $row['dept_id']; ?></span></h2> -->
                        <h4 id="scrollspyHeading1 featurette-heading"><?php echo $row['dept_name']; ?><span class="text-muted">id.<?php echo $row['dept_id']; ?></span></h4>
                        <p class="lead"><?php $str = get60Words($row['dept_desc']);
                                        echo $str;
                                        ?>....</p>
                        <p><a class="btn btn-secondary" href="departmentdetail.php?deptname=<?php echo $row['dept_name']; ?>">Read more»</a></p>
                    </div>
                    <div class="col-md-5">
                        <img src="https://source.unsplash.com/250x250/?<?php echo $row['dept_name'] ?>">

                    </div>
                </div>
            </div>
    <?php  }
        $i++;
    } ?>
    </div>
    </div>



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

<?php
function get60Words(string $str)
{
    $words = str_word_count($str, 2);
    $cnt = 0;
    foreach ($words as $strPos => $v) {
        if ($cnt++ === 60) {
            return substr($str, 0, $strPos - 1);
        }
    }

    return $str;
}
?>