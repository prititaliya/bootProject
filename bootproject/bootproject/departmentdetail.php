<?php
// session_start();
if (session_status() == 1)
    session_start();
include 'components/_db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $deptname = $_GET['deptname'];
    $query = "SELECT * FROM `tb_dept` WHERE dept_name='$deptname' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
    } else {
        echo "" . mysqli_error($conn);
    }
} else {
    $name = 'INFORMATION TECHNOLOGY';
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
    <style>
        .container {
            min-height: 50vh;
        }
    </style>
</head>

<body>
    <?php include 'components/_header.php'; ?>
    <?php
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <!-- MultiPage Layout For department info and faculty details -->
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <!-- if you click here you will be redirected on same page with dept info in url -->

                        <a class="nav-link active" aria-current="true" href="<?php echo $_SERVER['PHP_SELF'] . '?deptname=' . $row["dept_name"]; ?>">About <?php echo $row['dept_name']; ?></a>
                    </li>
                    <li class="nav-item">
                        <!-- if you click here you will be redirected on people page with dept info in url and will show only dept related faculty-->
                        <a class="nav-link" href="<?php echo "people.php" . '?deptname=' . $row["dept_name"] . "&category=faculty"; ?>">Faculties of <?php echo $row['dept_name']; ?></a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo "people.php" . '?deptname=' . $row["dept_name"] . "&category=staff"; ?>">staff of <?php echo $row['dept_name']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo "departmentLabs.php" . '?deptId=' . $row['dept_id']; ?>">Labs </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h1 class="card-title"><?php echo $row['dept_name']; ?></h1>
                <?php
                if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) { ?>
                    <p class="lead">
                        <a class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editdeptname" role="button"><button type="button" class="btn btn-outline-primary">edit <?php echo $row['dept_name']; ?></button></a>
                    </p>
                <?php
                }
                ?>


                <?php slider(); ?>
            </div>
            <p class="lead mx-3" style="text-align: left;"><?php echo $row['dept_desc']; ?></p>



            <?php
            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) { ?>
                <p class="lead">
                    <a class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editdeptdesc" role="button"><button type="button" class="btn btn-outline-primary">Edit the description of <?php echo $row['dept_name']; ?> </button>
                    </a>
                </p>
            <?php
            }
            ?>
        </div>
        <hr class="my-4">
        <a class="btn btn-outline-warning btn-lg mx-3" href="index.php" role="button">Go to Home Page</a>
        <hr class="my-4">
    </div>
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
<div class="modal" id="editdeptname" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Department name </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="department.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $row['dept_id']; ?>" name="deptid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">change name of <?php echo $row['dept_name'] ?></label>
                        <input type="text" name="editeddeptname" value="<?php echo $row['dept_name']; ?>" class="form-control" id="editeddeptname" aria-describedby="emailHelp">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>



</div>
<div class="modal" id="editdeptdesc" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">change the description of <?php echo $row['dept_name'] ?> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="department.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $row['dept_id']; ?>" name="deptid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <textarea rows="40" cols="50" name="editeddeptdesc" class="form-control" id="editeddeptname" aria-describedby="emailHelp"> <?php echo $row['dept_desc']; ?>" </textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php
function slider()
{
    include 'components/_db_connect.php';
    $deptname = $_GET['deptname'];
    $query = "SELECT * FROM `tb_dept` WHERE dept_name='$deptname' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $deptname = $row['dept_name'];


    // echo "vfeio";
    echo '<div id="slider" class="carousel slide carousel-fade my-1" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://source.unsplash.com/1800x700/?education,' . $deptname . '
" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/1800x700/?india,' . $deptname . '
" class="d-block w-100" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/1800x700/?' . $deptname . '
" class="d-block w-100" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>';
} ?>