<?php 
include 'components/_db_connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['editchanges'])){
    $sno=$_POST['sno'];
    $username=$_POST['username'];
    $email=$_POST['email'];

    $sql="UPDATE `userrole` SET  `username` = '$username', `email` = '$email' WHERE `userrole`.`sno` = $sno";
    $result=mysqli_query($conn,$sql);
    echo mysqli_error($conn);
    if($result){
        echo "thi";
        $showerror = "changed successfully";
        header('Location:/bootproject/index.php?$showerror');
    }
}
?>
<?php 

$sno=$_GET['sno'];
$sql="SELECT * FROM `userrole` WHERE `sno`=$sno";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$sno=$row['sno'];
$username=$row['username'];
$sno=$row['sno'];
$email=$row['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>changes</title>
</head>

<body class="container">
    <form action="editDetails.php" method="POST">

    
        <div class="mb-3">
            <input type="hidden" name="sno" value="<?php echo $sno?>" class="form-control" id="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">usernname</label>
            <input type="username" name="username" value="<?php echo $username?>" class="form-control" id="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>" aria-describedby="emailHelp">
        </div>
        <button type="submit" name="editchanges" class="btn btn-primary">edit changes </button>
    </form>

</body>

</html>