<?php
$showerror = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_db_connect.php';
    $snom = $_POST['snom'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    // echo $cpassword.'d';
    $sql = "SELECT * FROM `userrole` where username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $numofrow = mysqli_num_rows($result);
    if ($numofrow = 1) {
        if ($row['role'] == 'admin' and $row['username'] == $username) {
            $haspass = password_hash($password, PASSWORD_DEFAULT);
            echo $haspass;
            echo '<br>' . $row['password'];
            if (password_verify($password, $row['password'])) {
                // session_start();

                if (session_status() == 1 && !headers_sent())
                   session_start(); 

                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'admin';
                header('Location:/bootproject/index.php');
                die();
            } else {
                $showerror = "password incorrect";
            }
        } else {
            $haspass = password_hash($password, PASSWORD_DEFAULT);
            if (password_verify($password, $row['password'])) {
                // session_start();
                if (session_status() == 1 && !headers_sent())
                 session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'user';
                header('Location:/bootproject/index.php');
            } else {
                $showerror = "password incorrect";
            }
        }
    } else {
        $showerror = "user account doesn't found ";
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
    if ($showerror) {
        header("Location:/bootproject/index.php?showerror=$showerror");
    }

    ?>
    <!-- <form action="_login.php" method="post">

        <div class="mb-3">
            <label for="username" class="form-label">usernname</label>
            <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">login in</button>
        <a href="/bootproject/index.php">without login</a>
    </form> -->



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