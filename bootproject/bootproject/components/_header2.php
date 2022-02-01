<?php
$showerror = false;
if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['login'])) {
    include '_db_connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `userrole` where username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $numofrow = mysqli_num_rows($result);
    echo $sql;
    if ($numofrow == 1) {
        if ($row['role'] == 'admin' and $row['username'] == $username) {
            $haspass = password_hash($password, PASSWORD_DEFAULT);
            echo $haspass;
            echo '<br>' . $row['password'];
            if (password_verify($password, $row['password'])) {
                if (session_status() == 2) {
                    session_destroy();
                }
                if (session_status() == 1)
                    session_start();
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'admin';
                header('Location:/bootproject/index.php');
                exit();
            } else {
                $showerror = "password incorrect";
            }
        } else {
            $haspass = password_hash($password, PASSWORD_DEFAULT);
            if (password_verify($password, $row['password'])) {
                if (session_status() == 2) {
                    session_destroy();
                }
                if (session_status() == 1)
                    session_start();
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'user';
                header('Location:/bootproject/index.php');
                exit();
            } else {
                $showerror = "password incorrect";
            }
        }
    } else {
        $showerror = "user account doesn't found ";
    }
} ?>
<?php
$showerror = false;
if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['signup'])) {
    include '_db_connect.php';
    echo "come";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    $username = str_replace(">", "&gt;", $username);
    $username = str_replace("<", "&lt;", $username);
    $check = "SELECT username FROM `userrole` where username='$username'";
    $checkresult = mysqli_query($conn, $check);
    $numofrow = mysqli_num_rows($checkresult);
    echo $numofrow;
    if ($numofrow == 0) {
        if ($password == $cpassword) {
            $hashPass = password_hash($password, PASSWORD_DEFAULT);
            //            echo $hashPass;
            $sql = "INSERT INTO userrole (username,password,email)
	        VALUES ('$username','$hashPass','$email')";

            $result = mysqli_query($conn, $sql);
            echo var_dump($result);
            if (!$result) {
                echo mysqli_error($conn);
                $showerror = "something went wrong";
            } else {
                //                header("Location:/bootproject/department.php?justsignuo='true'");
                header("Location:/bootproject/index.php?justsignup='true'");
                $showerror = "success";
                exit();
            }
        } else {
            $showerror = "password doesn't match";
        }
    } else {
        $showerror = "username already exist";
    }
} ?>
<?php echo '<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please Login to procced further </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">' ?>

<?php
echo '<form action="components/_header.php" method="post">

    <div class="mb-3">
        <label for="username" class="form-label">usernname</label>
        <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
';
?>
<?php echo '</div>
      <div class="modal-footer">
            <button type="submit" name="login" class="btn btn-primary">login</button>
            <a class="btn btn-secondary" href="/bootproject/index.php">without login</a>
            <button type="button" name="login" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </form>
      </div>
    </div>
  </div>
</div>' ?>
<?php if ($showerror) {

    header("Location:/bootproject/index.php?showerror=$showerror");
}

?>
<?php echo '<div class="modal fade" id="SingUpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please sign up to procced further </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">'; ?>

<?php
echo '<form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">

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

        <u><a class="primary" data-bs-dismiss="modal">Already have an account</a></u>
  ';
?>
<?php echo '</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <button type="submit" name="signup" class="btn btn-primary">sign up </button>
           </form>
      </div>
    </div>
  </div>
</div>' ?>

<?php
// session_start();
if (session_status() == 1)
    session_start();
//$file=basename($_SERVER('PHP_SELF'));
$file = basename($_SERVER['PHP_SELF']);
if (isset($_SESSION['username'])) {
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand active" href="index.php">College</a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a href="index.php">  <img src="https://img.icons8.com/wired/40/ffffff/home.png"/>  </a><a class="nav-link ' ?><?php if ($file == 'index.php') {
                                                                                                                                    echo 'active';
                                                                                                                                } ?><?php echo '" aria-current="page"  href="/bootproject/index.php">Home</a>
                </li>&nbsp;
              <li class="nav-item dropdown">
            <a href="about.php">   <img src="https://img.icons8.com/wired/40/ffffff/about.png"/> </a> <a class="nav-link dropdown-toggle ' ?><?php if ($file == 'about.php') {
                                                                                                                                                    echo 'active';
                                                                                                                                                } ?><?php echo '" aria-current="page" href="about.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    About
                  </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
              </li>
              <li class="nav-item dropdown">
             <a href="department.php">   <img src="https://img.icons8.com/wired/40/ffffff/graduation-cap.png"/>  </a><a class="nav-link dropdown-toggle ' ?><?php if ($file == 'department.php') {
                                                                                                                                                                echo 'active';
                                                                                                                                                            } ?><?php echo '" href="department.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                    Academic
                  </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/bootproject/department.php">department</a></li>
                        <li><a class="dropdown-item" href="Labs.php">Labs</a></li>
                        <li><a class="dropdown-item" href="#">Workshops</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
              </li>
              
              
              
              <li class="nav-item dropdown">
         <a href="/bootproject/Faculty.php?category=faculty"><img src="https://img.icons8.com/wired/40/ffffff/user-male.png"/></a>     <a class="nav-link dropdown-toggle ' ?><?php if ($file == 'Faculty.php') {
                                                                                                                                                                                    echo 'active';
                                                                                                                                                                                } ?><?php echo '" href="people.php?category=faculty" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    People
                  </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/bootproject/Faculty.php?category=faculty">Faculties</a></li>
                        <li><a class="dropdown-item" href="/bootproject/Faculty.php?category=staff">staff</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
              </li>
              <li class="nav-item">
              <a href="gallary.php"><img src="https://img.icons8.com/wired/40/ffffff/google-photos.png"/></a>      <a class="nav-link ' ?><?php if ($file == 'gallary.php') {
                                                                                                                                                echo 'active';
                                                                                                                                            } ?><?php echo '" aria-current="page" href="/bootproject/gallary.php">Gallary</a>
              </li>
              <li class="nav-item">
                <a href="downloads.php"><img src="https://img.icons8.com/wired/40/ffffff/downloads.png"/></a>        <a class="nav-link ' ?><?php if ($file == 'downloads.php') {
                                                                                                                                                echo 'active';
                                                                                                                                            } ?><?php echo '" aria-current="page" href="/bootproject/downloads.php">Downloads</a>
              </li>
              <li class="nav-item">
              <a href="contact_us.php"><img src="https://img.icons8.com/wired/40/ffffff/communication.png"/></a>      <a class="nav-link ' ?><?php if ($file == 'contact_us.php') {
                                                                                                                                                    echo 'active';
                                                                                                                                                } ?><?php echo '" aria-current="page" href="/bootproject/contact_us.php">Contacts Officials </a>
              </li>
            </ul>
            <div class="row mx-2">
            <form class="d-flex">
            <button  type="button"  class="btn btn-warning row mx-2"  data-bs-toggle="modal"  data-bs-target="#profileModal">' ?><?php echo $_SESSION['username']; ?><?php echo '</button>
                </a>
                <a href="/bootproject/components/_logout.php">
                <button  type="button" class="btn btn-warning ">logout</button>
                </a>

                  
            </form>
        </div>
        </div>
    </div>
</nav>';
                                                                                                                                                                    } else {
                                                                                                                                                                        echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/bootproject/index.php">College</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a href="/bootproject/index.php">  <img src="https://img.icons8.com/wired/40/ffffff/home.png"/>  </a><a class="nav-link ' ?><?php if ($file == 'index.php') {
                                                                                                                                                                            echo 'active';
                                                                                                                                                                        } ?><?php echo '" aria-current="page"  href="/bootproject/index.php">Home</a>
                </li>&nbsp;
              <li class="nav-item dropdown">
            <a href="/bootproject/about.php">   <img src="https://img.icons8.com/wired/40/ffffff/about.png"/> </a> <a class="nav-link dropdown-toggle ' ?><?php if ($file == 'about.php') {
                                                                                                                                                                            echo 'active';
                                                                                                                                                                        } ?><?php echo '" aria-current="page" href="about.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    About
                  </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
              </li>
              <li class="nav-item dropdown">
              <a href="/bootproject/department.php">   <img src="https://img.icons8.com/wired/40/ffffff/graduation-cap.png"/>  </a><a class="nav-link dropdown-toggle ' ?><?php if ($file == 'department.php') {
                                                                                                                                                                                echo 'active';
                                                                                                                                                                            } ?><?php echo '" href="department.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                    Academic
                  </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/bootproject/department.php">department</a></li>
                        <li><a class="dropdown-item" href="Labs.php">Labs</a></li>
                        <li><a class="dropdown-item" href="#">Workshops</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
              </li>
              <li class="nav-item dropdown ">
         <a href="/bootproject/Faculty.php?category=faculty">      <img src="https://img.icons8.com/wired/40/ffffff/user-male.png"/></a>     <a class="nav-link dropdown-toggle ' ?><?php if ($file == 'Faculty.php') {
                                                                                                                                                                                        echo 'active';
                                                                                                                                                                                    } ?><?php echo '" href="/bootproject/people.php?category=faculty" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    People
                  </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/bootproject/Faculty.php?category=faculty">Faculties</a></li>
                        <li><a class="dropdown-item" href="/bootproject/Faculty.php?category=staff">staff</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
              </li>
              <li class="nav-item">
              <a href="/bootproject/gallary.php"><img src="https://img.icons8.com/wired/40/ffffff/google-photos.png"/></a>      <a class="nav-link ' ?><?php if ($file == 'gallary.php') {
                                                                                                                                                                            echo 'active';
                                                                                                                                                                        } ?><?php echo '" aria-current="page" href="/bootproject/gallary.php">Gallary</a>
              </li>
              <li class="nav-item">
                <a href="/bootproject/downloads.php"><img src="https://img.icons8.com/wired/40/ffffff/downloads.png"/></a>        <a class="nav-link ' ?><?php if ($file == 'downloads.php') {
                                                                                                                                                                            echo 'active';
                                                                                                                                                                        } ?><?php echo '" aria-current="page" href="/bootproject/downloads.php">Downloads</a>
              </li>
              <li class="nav-item">
              <a href="/bootproject/contact_us.php"><img src="https://img.icons8.com/wired/40/ffffff/communication.png"/></a>      <a class="nav-link ' ?><?php if ($file == 'contact_us.php') {
                                                                                                                                                                            echo 'active';
                                                                                                                                                                        } ?><?php echo '" aria-current="page" href="/bootproject/contact_us.php"> Contacts Officials </a>
              </li>
            </ul>
            
            <div class="row mx-2">
            <form class="d-flex">
                    <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal" data-bs-target="#LoginModal">
                      Login
                    </button>
                    <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal" data-bs-target="#SingUpModal">
                      SingUp
                    </button>

                  
            </form>
        </div>
        </div>
    </div>
</nav>';
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
    <link rel="stylesheet" href="/path/to/cdn/bootstrap.min.css" />
    <script src="/path/to/cdn/bootstrap.min.js"></script>
    <link href="bootstrap5-dropdown-ml-hack-hover.css" rel="stylesheet" />
    <script src="bootstrap5-dropdown-ml-hack.js"></script>
    <title>Hello, world!</title>

</head>

<body>
    <div class="modal fade modal-dialog modal-dialog-scrollable" id="profileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="username"><?php echo $_SESSION['username'] ?>'s profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- error in this code -->
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <?php
                            // this will generate table for userdetails 
                            try {
                                // include 'components/_db_connect.php';
                                $servername = 'localhost';
                                $username = 'root';
                                $database = 'db_college';
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
                            } catch (Exception $e) {
                                echo $e;
                            }
                            $user = $_SESSION['username'];
                            $tableQuery = "SELECT * FROM `userrole` where username='$user'";
                            $tbresult = mysqli_query($conn, $tableQuery);
                            $tbrow = mysqli_fetch_assoc($tbresult);
                            //  this is for First row of table 
                            echo ' <tr><th scope="col">#</th>
                <th scope="col">Details</th>
                </tr></thead><tbody>';
                            //  this is body content of table
                            foreach ($tbrow as $key => $value) {
                                if ($key == 'password')
                                    continue;
                                echo '<tr><td scope="col">' . $key . '</td>
                    <td scope="col">' . $value . '</td>';
                            }
                            ?>
                            </tbody>
                    </table>
                </div>
                <!-- to this  -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
if (!isset($_SESSION['role'])) {
    include 'components/_logout.php';
}
?>