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



<!doctype html>
<html lang="en">

<head>
  <!-- THESE ARE THE META TAGS YOU MUST INCLUDE -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- NEXT IS THE BOOTSTRAP CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="component/css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">

  <style>
    .megamenu {
      position: absolute;
    }

    .col {
      background: none;
      border: none;
      width: 100%;
    }

    .megamenu .dropdown-menu {
      background: none;
      width: 100%;
      border: none;
    }

    .row {
      display: flex;
    }

    body {
      background: #eaafc8;
      background: -webkit-linear-gradient(to right, #eaafc8, #654ea3);
      background: linear-gradient(to right, #eaafc8);
      min-height: 100vh;
    }

    code {
      color: #745eb1;
      background: #fff;
      padding: 0.1rem 0.2rem;
      border-radius: 0.2rem;
    }

    .text-uppercase {
      letter-spacing: 0.08em;
    }

    .vl {
      border-left: 6px solid green;
      height: 500px;
      position: absolute;
      left: 50%;
      margin-left: -3px;
      top: 0;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">

    <a class="navbar-brand" href="index.php">
      <img style="margin: 5px;" src="resources/SSGC_logo_name.png" width="200px" height="50px" alt="Ghandhy College Image" class="d-inline-block align-text-top">
    </a>

    <!-- <a class="navbar-brand" href="index.php">
      <p style="font-family:'Times New Roman', Times, serif; font-size:14px; text-align:center;margin-top:8px;" class="d-inline-block align-text-top">
        DR. S. & S. S. GHANDHY COLLEGE OF ENGINEERING <br> & TECHNOLOGY,SURAT</p>
    </a> -->

    <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php $file = basename($_SERVER['PHP_SELF']); ?>
    <div id="navbarContent" class="collapse navbar-collapse">

      <ul class="navbar-nav mx-auto">
        <!-- Header List -->

        <!-- Home -->
        <li class="nav-item px-1"><a href="index.php" class="nav-link font-weight-bold text-uppercase <?php if ($file == 'index.php') {
                                                                                                        echo 'active';
                                                                                                      } ?>">Home </a></li>


        <!-- About  -->
        <li class="nav-item px-1 dropdown <?php if ($file == 'about.php') {
                                            echo 'active';
                                          } ?>">
          <a class="nav-link dropdown-toggle font-weight-bold text-uppercase" href="about.php" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
          <div class="dropdown-menu dropdown-menu-center" aria-labelledby="servicesDropdown" style="border: solid #eaafc8 3px;">
            <!-- About Title -->
            <div class="dropdown-header font-weight-bold text-uppercase" href="#" style="display: flex; justify-content: center; align-items: center;">About</div>
            <div class="dropdown-divider"></div>
            <div class="d-md-flex align-items-start justify-content-start">

              <div style="width: 250px;">

                <a class="dropdown-item" href="about.php">About College</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">College Campus</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">Placement Cell</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">Women Cell</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">Greivance Cell</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">Anti Ragging</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">Student Startup and Innovation</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">RTI</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">News Letter</a>
              </div>

            </div>
          </div>
        </li>


        <!-- Academic-->
        <li class="nav-item px-1 dropdown">
          <a class="nav-link dropdown-toggle font-weight-bold text-uppercase <?php if ($file == 'department.php') {
                                                                                echo 'active';
                                                                              } ?>" href="department.php" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Academic</a>
          <div class="dropdown-menu dropdown-menu-center" aria-labelledby="servicesDropdown" style="border: solid #eaafc8 3px;" style="width: 300px;">
            <!-- Academic Title -->
            <div class="dropdown-header font-weight-bold text-uppercase" href="department.php" style="display: flex; justify-content: center; align-items: center;">Academic</div>
            <div class="dropdown-divider"></div>
            <div class="d-md-flex align-items-start justify-content-start">

              <div>
                <a class="dropdown-item" href="department.php">Departments</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Academic Calendar</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="Labs.php">Labs</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">Workshops</a>
                <div class="dropdown-divider"></div>
              </div>
            </div>
          </div>
        </li>


        <!-- People -->
        <li class="nav-item px-1 dropdown <?php if ($file == 'Faculty.php') {
                                            echo 'active';
                                          } ?>"><a class="nav-link dropdown-toggle font-weight-bold text-uppercase" href="/bootproject/Faculty.php?category=faculty" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">People</a>
          <div class="dropdown-menu dropdown-menu-center" aria-labelledby="servicesDropdown" style="border: solid #eaafc8 3px;">
            <!-- People Title -->
            <div class="dropdown-header font-weight-bold text-uppercase" href="#" style="display: flex; justify-content: center; align-items: center;">People</div>

            <div class="dropdown-divider"></div>
            <div class="d-md-flex align-items-start justify-content-start">

              <div style="width: 200px;">

                <a class="dropdown-item" href="/bootproject/Faculty.php?category=faculty">Faculty</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="/bootproject/Faculty.php?category=staff">Staff</a>

              </div>

            </div>
          </div>
        </li>


        <!-- Gallary -->
        <li class="nav-item px-1"><a href="/bootproject/gallary.php" class="nav-link font-weight-bold text-uppercase <?php if ($file == 'gallary.php') {
                                                                                                                        echo 'active';
                                                                                                                      } ?>">Gallery</a></li>


        <!-- Downloads  -->
        <li class="nav-item px-1"><a href="/bootproject/downloads.php" class="nav-link font-weight-bold text-uppercase <?php if ($file == 'downloads.php') {
                                                                                                                          echo 'active';
                                                                                                                        } ?><">Downloads</a></li>
        <!-- Contacts us -->
        <li class="nav-item px-1"><a href="/bootproject/contact_us.php" class="nav-link font-weight-bold text-uppercase <?php if ($file == 'contact_us.php') {
                                                                                                                          echo 'active';
                                                                                                                        } ?><">contact us</a></li>


        <!-- Login  -->
        <?php
        // session_start();
        if (session_status() == 1)
          session_start();
        //$file=basename($_SERVER('PHP_SELF'));
        $file = basename($_SERVER['PHP_SELF']);
        if (isset($_SESSION['username'])) {
          echo ' <li class="nav-item px"><a class="nav-link btn btn-outline-primary font-weight-bold text-uppercase" href="about.php" id="servicesDropdown" role="button" data-toggle="dropdown" data-bs-toggle="modal" data-bs-target="#profileModal" aria-haspopup="true" aria-expanded="false">' . $_SESSION['username'] . '</a>
          <li class="nav-item px-1"><a href="/bootproject/components/_logout.php" class="nav-link font-weight-bold text-uppercase">Logout </a></li>
          ';
        } else {
          echo ' <li class="nav-item px"><a class="nav-link  font-weight-bold text-uppercase" href="about.php" id="servicesDropdown" role="button" data-toggle="dropdown" data-bs-toggle="modal" data-bs-target="#LoginModal" aria-haspopup="true" aria-expanded="false">Login</a>
        </li>';
        }
        ?>
      </ul>
    </div>
  </nav>
  <!-- Login Modal This will be poped up when user clicks Login button -->
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



  <!-- This Modal Will be poped Up when user clicks On Profile name  -->
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
          <a href="editDetails.php?sno=<?php echo $tbrow['sno'] ?>"> <button type="button" class="btn btn-warning" >Edit <?php echo $tbrow['username']; ?></button> </a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- YOUR CONTENT GOES HERE -->
  <!-- NEXT IS THE JAVASCRIPT: JQUERY FIRST, POPPER.JS SECOND, BOOTSTRAP JS THIRD -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>

<?php
if (!isset($_SESSION['role'])) {
  include 'components/_logout.php';
}
?>