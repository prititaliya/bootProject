<?php session_start(); ?>
<?php
include 'components/_db_connect.php';
if ($_SERVER['REQUEST_METHOD']=='GET'){
    $deptname= $_GET['deptname'];
    $deptid=null;
        $query="SELECT dept_id FROM `tb_dept` where dept_name='$deptname'";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $deptid=$row['dept_id'];
    }
}else{
    echo "buidop";
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
<?php include "components/_header.php"; ?>

<h3 align="center"><?php echo $deptname ?></h3>
<?php
$i=2;
$sql="SELECT * FROM `Faculty_Details` WHERE Department_Id='$deptid' ";
$result=mysqli_query($conn,$sql);
$numofrow=mysqli_num_rows($result);
while ($row=mysqli_fetch_assoc($result)){
    if ($i%2==0){    ?>
        <div class="container marketing my-3">
            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading"><?php echo $row['Faculty_Name']; ?>
                    <p class="lead">Designation: <?php echo $row['designation'];?></p>
                    <p class="lead">Experience: <?php echo $row['experience'];?> Years</p>
                    <p class="lead">Intrest Of Fields: <?php echo $row['intrest'];?></p>
                    <p class="lead">Qualification: <?php echo $row['qualification'];?></p>
<!--                    <p><a class="btn btn-secondary" href="people.php?deptname=--><?php //echo $deptname; ?><!--">See more»</a></p>-->
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="250" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 250x250" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">250x250</text></svg>

                </div>
            </div>
        </div>
    <?php }else{?>
        <div class="container marketing my-3">
        <div class="row featurette">
            <div class="col-md-7 ">
                <h2 class="featurette-heading"><?php echo $row['Faculty_Name']; ?>
                    <p class="lead">Designation: <?php echo $row['designation'];?></p>
                    <p class="lead">Experience: <?php echo $row['experience'];?> Years</p>
                    <p class="lead">Intrest Of Fields: <?php echo $row['intrest'];?></p>
                    <p class="lead">Qualification: <?php echo $row['qualification'];?></p>
<!--                    <p><a class="btn btn-secondary" href="people.php?deptname=--><?php //echo $deptname; ?><!--">See more»</a></p>-->
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="250" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 250x250" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">250x250</text></svg>

            </div>
        </div>
    </div>
    <?php  }
    $i++;
} ?>





<?php include "components/_footer.php";?>


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
