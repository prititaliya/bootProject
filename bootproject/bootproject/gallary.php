<?php
// session_start(); 
if (session_status() == 1)
    session_start();
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
    <?php include "components/_header.php"; ?>
    <div class="container">
        <?php if ($_SESSION['username'] == 'admin' && isset($_SESSION['username'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey! ' . $_SESSION['username'] . '</strong> Whats in your mind?
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        } ?>


    </div>

    <?php
    include 'components/_db_connect.php';
    $sql = 'SELECT * FROM `gallaryTable`';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $numOfRow = mysqli_num_rows($result);
    $iteration = ceil($numOfRow / 3);
    $innerIteration = round($numOfRow / 3);
    for ($i = 0; $i < $iteration; $i++) {

        echo ' <div class="container album py-5 bg-light">
                    <div class="rx-2 row">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';

        for ($j = 0; $j < 3; $j++) {
            echo ' <div class="card shadow-sm"> 
            <img width="100%" height="225" src="resources/' . $row['imageName'] . '" >
            <div class="card-body">
                <p class="card-text">' . $row["imageDesc"] . '</p>
                <div class="d-flex justify-content-between align-items-center">'; ?>
            <?php if ($_SESSION['username'] == 'admin' && isset($_SESSION['username'])) {
                $EditId = $row['imageId'];
                echo '<a href="editGallaryData.php?imageId='.$EditId.'"><button type="button" href="editGallaryData.php?imageId='.$row['imageId'].'  id="' . $row['imageId'] . '"  class="btn btn-sm btn-outline-secondary">Edit</button></a>';
            } ?>
    <?php echo '<small class="text-muted">' . $row["time"] . '</small>
                </div>
            </div>
        </div>';

            if (!$row = mysqli_fetch_assoc($result)) {
                break;
            }
        }
        echo ' </div>
                </div>
                </div>';
    }

    // echo var_dump(mysqli_fetch_assoc($result));
    ?>
    <div class="container">
        <?php if ($_SESSION['username'] == 'admin' && isset($_SESSION['username'])) {
            echo '<p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#enterImageInDatabase" aria-expanded="false" aria-controls="collapseExample">
                        upload The Images in DataBase
                        </button>
                </p>
                <div class="collapse" id="enterImageInDatabase">
                    <div class="card card-body">
                    <div class="container">
                    <form action="gallary.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="Image" class="form-label">Image</label>
                           <input type="file" name="inputedImage">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputImageDesc" class="form-label">Image description <sub>reccommanded 150 words only*</sub> </label>
                            <textarea type="text" class="form-control" name="inputedImageDesc" id="exampleInputImageDesc"> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="alterText" class="form-label">Enter the text for image incase for any reasons image is not visible we can show that text <sub>reccommanded 18 words only*</sub></label>
                            <input type="text" class="form-control" id="imageAlterText" name="inputedImageAlterText" aria-describedby="alterText">
                        </div>
                        <div class="mb-3">
                            <label for="Image" class="form-label">If this image is related to any department then please enter the department id </label>
                            <input type="number" class="form-control" id="deptId" name="inputedImageDeptId" aria-describedby="emailDeptId">
                        </div>
                        <button type="submit" name="submitImage" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                    </div>
                </div>';
        } ?>

    </div>


    <?php
    if (isset($_FILES['inputedImage']['name']) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitImage'])) {
        $name = $_FILES['inputedImage']['name'];
        $tmp = $_FILES['inputedImage']['tmp_name'];
        move_uploaded_file($tmp, "resorces/" . $name);
        $path = pathinfo($name);
        $target_dir = "resources/";
        $ext = $path['extension'];
        $path_filename_ext = $target_dir . $name;
        $imageDesc = $_POST['inputedImageDesc'];
        $alterText = $_POST['inputedImageAlterText'];
        $deptId = $_POST['deptId'];
        include "components/_db_connect.php";
        if (move_uploaded_file($tmp, $path_filename_ext)) {
            if (isset($_POST['deptId'])) {
                $sql = "INSERT INTO `gallaryTable` (`imageName`, `imageDesc`, `alterText`, `deptId`) VALUES ( '$name', '$imageDesc', '$alterText', '$deptId')";
                echo "dshj";
                mysqli_query($conn, $sql);
                mysqli_error($conn);
                header('Location:/bootproject/index.php');
            } else {
                $sql = "INSERT INTO `gallaryTable` (`imageName`, `imageDesc`, `alterText`) VALUES ( '$name', '$imageDesc', '$alterText')";
                mysqli_query($conn, $sql);
                mysqli_error($conn);
                echo $sql;
                header('Location:/bootproject/index.php');
            }
        } else {
            move_uploaded_file($tmp, $path_filename_ext);
            echo "Something went Wrong";
        }
    }elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitEditImage'])){
        $imageId=$_POST['imageid'];
        $imageDesc = $_POST['inputedImageDesc'];
        $alterText = $_POST['inputedImageAlterText'];
        $deptId = $_POST['deptId'];
        if (isset($_POST['deptId'])) {
            $sql = "UPDATE `gallaryTable` SET `imageDesc` = $imageDesc WHERE `gallaryTable`.`imageId` = $imageId";
            echo $sql;
            header('Location:/bootproject/index.php');
        } else {
            $sql = "UPDATE `gallaryTable` SET `imageDesc` = '$imageDesc' WHERE `gallaryTable`.`imageId` = $imageId";
            mysqli_query($conn, $sql);
            mysqli_error($conn);
            header('Location:/bootproject/index.php');
        }
    } ?>
    <hr class="my-4">

    <?php  include "components/_footer.php"; ?>
    <div class="collapse" id="editData">
        <div class="card card-body">
            <div class="container">
                <?php
                include 'components/_db_connect.php';
                $sql = 'SELECT * FROM `gallaryTable`';
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $numOfRow = mysqli_num_rows($result);

                echo '<div class="container album py-5 bg-light">
                    <div class="rx-2 row">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card row" style="width: 18rem;">
                  <img src="..." class="card-img-top" alt="...">
                  <div class="card-body ">
                    <h5 class="card-title">Edit the ' . $row['imageName'] . '</h5>
                    <p class="card-text">' . $row['imageDesc'] . '</p>
                    <a href="editGallaryData.php?imageId='.$row['imageId'].'" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>';
                }
                ?>
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

<!-- <input type="file" class="form-control" id="image" name="inputedImage" aria-describedby="Image">

<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
            </svg> -->

<!-- <img  class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" src="resources/"' . $row['imageName'] . ' >     -->

<!-- <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div> -->

                    