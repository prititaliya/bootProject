<?php
include 'components/_header.php';
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php include 'components/_db_connect.php';
    $sql = "SELECT * FROM tb_dept";
    $result = mysqli_query($conn, $sql);
    $numofrow = mysqli_num_rows($result);
    ?>
    <?php echo '<div class="row">
        <div id="list-example" class="list-group col-2">';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<a class="list-group-item list-group-item-action" href="#list-item-'.$row['dept_id']. '">' . $row['dept_name'].'.'.$row['dept_id'] . '</a>';
    }
    echo '</div>';
    $result = mysqli_query($conn, $sql);
    echo '<div data-bs-spy="scroll" style="height: 500px; overflow-y:scroll;" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example col" tabindex="0">';
    while($row=mysqli_fetch_assoc($result)){
        echo '<h4 id="list-item-'.$row['dept_id'].'">'.$row['dept_name'].$row['dept_id'].'</h4>
        <p>
        '.substr($row['dept_desc'],0,1000).'....
        </p>';?>
          <p><a class="btn btn-secondary" href="departmentdetail.php?deptname=<?php echo $row['dept_name']; ?>">Read more»</a></p>
         <?php 
    }
        ?>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>