<?php
//  session_start(); 
if (session_status() == 1)
    session_start();
?>
<?php
if (isset($_POST['submitForm']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $useremail = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    include 'components/_db_connect.php';


    $sql = "INSERT INTO `contactUsForm` ( `userName`, `userEmail`, `subject`, `message`) VALUES ('$username', '$useremail', '$subject', '$message')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo mysqli_error($conn);
        echo $sql;
        $showerror = "something went wrong";
    } else {
        //                header("Location:/bootproject/department.php?justsignuo='true'");
        header("Location:/bootproject/index.php?justsignup='true'");
        exit();
    }
} else {
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


    <div class="container">
        <h3>Location</h3>
        <iframe src="https://maps.google.com/maps?q=Majura+Gate,+Surat,+Gujarat,+India&output=embed" width="100%" height="450" frameborder="0" style="border:0;margin: bottom 15px;" allowfullscreen></iframe>
    </div>

    <div class="container my-3">
        <div class="row">
            <div class="col">
                <div class="container">
                    <form action="contact_us.php" method="POST">
                        <h5 for="formHeader">Fill the form if you have any query</h5>
                        <div class="mb-3">
                            <input type="username" class="form-control" placeholder="Your Name" id="username" name="username" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <input type="email" placeholder="Your email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <input type="text" placeholder="Subject" class="form-control" id="subject" name="subject">
                        </div>
                        <div class="mb-3">
                            <textarea name="message" id="message" placeholder="Write down the message" cols="68" rows="5"></textarea>

                        </div>
                        <button type="submit" name="submitForm" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
            <div class="col">
                <div class="container">
                    <div class="col-2">
                        <h5>Contact</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-4"><a href="https://www.google.com/maps?q=Majura+Gate,+Surat,+Gujarat,+India" target="new" class="nav-link p-0 text-muted">
                                        <label for="email">institute Location</label>
                                        <i class="fa fa-map-marker"></i> Majura Gate,Surat</a></li>

                                <li class="nav-item mb-4"><a href="mailto:gecsrt612@gmail.com" class="nav-link p-0 text-muted">
                                        <label for="email">institute Email</label>
                                        <i class="fa fa-envelope"></i> gecsrt612@gmail.com </a></li>


                                <li class="nav-item mb-4"><a href="tel:2655799" class="nav-link p-0 text-muted">
                                        <label for="phone number">institute Telepohone</label>
                                        <i class="fa fa-phone"></i> 2655799</a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr class="my-4">

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