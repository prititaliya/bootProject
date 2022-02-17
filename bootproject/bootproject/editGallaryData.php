<?php
session_start();
$imageId= $_GET['imageId'];
    include 'components/_db_connect.php';
    include 'components/_header.php';
    // $sql = 'SELECT * FROM `gallaryTable` where imageId=$_GET["imageId"]';
    $sql = "SELECT * FROM `gallaryTable` WHERE imageId='$imageId' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $numOfRow = mysqli_num_rows($result);
    echo ' <div class="container">
    <div class="container">
    <form action="gallary.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="Image" class="form-label">If you want to change image then go resources folder and delete old image with '.$row['imageName'].' and add new image with '.$row['imageName'].'</label>
            <input type="hidden" name="imageid" value="'.$row['imageId'].' ">

        </div>
        <div class="mb-3">
            <label for="exampleInputImageDesc" class="form-label">Image description <sub>reccommanded 150 words only*</sub> </label>
            <input type="text" value="'.$row['imageDesc'].'" id="test" class="form-control" name="inputedImageDesc" id="exampleInputImageDesc">
        </div>
        <div class="mb-3">
            <label for="alterText" class="form-label">Enter the text for image incase for any reasons image is not visible we can show that text <sub>reccommanded 18 words only*</sub></label>
            <input type="text" value="'.$row['alterText'].'" class="form-control" id="imageAlterText" name="inputedImageAlterText" aria-describedby="alterText">
        </div>
        <div class="mb-3">
            <label for="Image" class="form-label">If this image is related to any department then please enter the department id </label>
            <input type="number" value="'.$row['deptId'].'" class="form-control" id="deptId" name="inputedImageDeptId" aria-describedby="emailDeptId">
        </div>
        <button type="submit" name="submitEditImage" class="btn btn-primary">Submit</button>
    </form>
</div>';
include 'components/_footer.php';
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
    
</body>
<script>
function add() {
//We first get the current value of the textarea
var x = document.getElementById("test").value;
//Then we concatenate the string "content" onto it
document.getElementById("test").value = x+" content";
}
</script>
</html>