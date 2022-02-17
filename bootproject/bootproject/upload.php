<?php
$servername = 'localhost';
$username = 'root';
$database = 'fileUpload';
$password = '';
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    die("unsuccess!" . mysqli_connect_error());
} else {
}
?>
<?php 

// $sql="SELECT * FROM `Images`";
// $result=mysqli_query($conn,$sql);
// $row=mysqli_fetch_assoc($result);
// echo "<img src='files/".$row['imageName']."'>";
// echo "<div>".$row['imgDir']."";
// echo "</div>";
// ?>
<?php
   if($_SERVER['REQUEST_METHOD']=='POST'){
    //    echo "thio";
    echo $_FILES['inputedImage']['name'];
       print_r($_FILES);
   }
if (isset($_FILES['file']['inputedImage'])) {
        $name=$_FILES['file']['name'];
        $tmp=$_FILES['file']['tmp_name'];
        echo "this si";
        move_uploaded_file($tmp,"files/".$name);
        $path= pathinfo($name);
        $target_dir = "files/";
        $ext=$path['extension'];
        $path_filename_ext = $target_dir.$name;
        $text=$_POST['text'];
        if(move_uploaded_file($tmp,$path_filename_ext)){
            echo "this is ";
        }else{
            $sql="INSERT INTO `Images` (`imageId`, `imageName`, `imgDir`) VALUES (NULL, '$name', '$text')";
            mysqli_query($conn,$sql);
        }
}
?>