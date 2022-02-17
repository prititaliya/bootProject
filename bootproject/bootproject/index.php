<?php
// session_start();
if (session_status() == 1)
    session_start();
include "components/online_users.php";
$GLOBALS['$a'];
$GLOBALS['a'] = 10;
include 'components/_db_connect.php';
if (isset($_POST['labInsertButton']) ) {
    echo "this";
    $labId = $_POST['labid'];
    $labName = $_POST['labName'];
    $deptId = $_POST['deptId'];
    $labDesc = $_POST['labDesc'];
    $name = $_FILES['labImage']['name'];
    $tmp = $_FILES['labImage']['tmp_name'];
    echo $_POST['lanName'];
    // move_uploaded_file($tmp, "resorces/" . $name);
    $path = pathinfo($name);
    $target_dir = "resources/";
    $ext = $path['extension'];
    $path_filename_ext = $target_dir . $name;
    if (move_uploaded_file($tmp, $path_filename_ext)) {
        $sql = "INSERT INTO `deptLab` (`labId`, `deptId`, `labName`, `labImage`, `labDesc`) VALUES ($labId, $deptId, $labName, $name, $labDesc)";
        echo "come";
        mysqli_query($conn, $sql);
        mysqli_error($conn);
        header('Location:/bootproject/Labs.php');
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Home Page</title>
    <style>
        .cardBody {
            text-align: center;
        }

        .cardEffect {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .cardEffect:hover {
            box-shadow: 5px 6px 6px 2px #e9ecef;
            transform: scale(1.1)
        }

        .textanim {
            color: black;
            position: relative;
            animation: text 3s 1;
        }

        @keyframes text {
            0% {
                color: black;
                margin-bottom: -40px;
            }

            30% {
                letter-spacing: 25px;
                margin-bottom: -40px;
            }

            85% {
                margin-bottom: -40px;
            }
        }
    </style>
</head>

<body>
    <?php include "components/_header.php"; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET'  && isset($_GET['showerror'])) {
        $showerror = $_GET['showerror'];;
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>' . $showerror . '</strong> please try again
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    } else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['justsignup'])) {

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Now You Can Login </strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <?php include "components/_slider.php" ?>

    <hr class="my-4">
    <div class="container my-2">

<div class="row text-center">
    <div class="col-md-4 cardEffect">
        <div class="cardBody mx-2">
            <img src="resources/16.jpeg" width="140px" height="140px">

            <h2 class="textanim my-2">Heading</h2>

            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
        </div><!-- /.col-lg-4 -->
    </div>
    <div class="col-md-4 cardEffect">
        <div class="cardBody mx-2">
            <img src="https://source.unsplash.com/140x140/?code,php">


            <h2 class="textanim my-2">Heading</h2>

            <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
        </div><!-- /.col-lg-4 -->

    </div><!-- /.col-lg-4 -->
    <div class="col-md-4 cardEffect">
        <div class="cardBody mx-2">
            <img src="https://source.unsplash.com/140x140/?code,php">
            <h2 class="textanim my-2">Heading</h2>
            <p>And lastly this, the third column of representative placeholder content.we've moved on to the second column.</p>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
        </div><!-- /.col-lg-4 -->

    </div><!-- /.col-lg-4 -->
</div>

</div>


    <div class="container">
        <hr class="my-4">
    </div>
    <?php include "components/_footer.php"; ?>


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