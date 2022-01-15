<?php
$showerror=false;
if ($_SERVER['REQUEST_METHOD']=='POST'){
    include '_db_connect.php';
//    $snom=$_POST['snom'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $email=$_POST['email'];

    $check="SELECT username FROM `userrole` where username='$username'";
    $checkresult=mysqli_query($conn,$check);
    $username=str_replace_json(">", "&gt;", $username);
    $username=str_replace_json("<", "&lt;", $username);
    $numofrow=mysqli_num_rows($checkresult);
    if ($numofrow==0){
        if ($password==$cpassword){
            $hashPass=password_hash($password,PASSWORD_DEFAULT);
            echo $hashPass;
            $sql = "INSERT INTO userrole (username,password,email)
	        VALUES ('$username','$hashPass','$email')";

//            $sql="INSERT INTO `userrole` (`username`, `password`,`email`) VALUES ('$username','$hashPass','$email')";
            $result=mysqli_query($conn,$sql);
            if (!$result){
                echo mysqli_error($conn);
                $showerror="something went wrong";
            }else{
                header('Location:_login.php');
                $showerror= "success";
            }
        }else{
            $showerror="password doesn't match";
        }
    }else{
        $showerror="username already exist";
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

    <title>Hello, world!</title>
</head>
<body>

<?php include "_header.php"; ?>
<?php
if ($showerror){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.$showerror.'</strong> please try again
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>
<form action="/components/_signup.php" method="post">

    <div class="mb-3">
        <label for="username" class="form-label">usernname</label>
        <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" name="cpassword" class="form-control" id="cpassword">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">sign up </button>
    <a href="/bootproject/index.php">without login</a>
</form>



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