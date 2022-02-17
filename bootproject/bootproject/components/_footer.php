<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

</html>
<?php
if ($_SERVER['PHP_SELF'] == "/bootproject/index.php") {
    include 'components/_db_connect.php';
    $query = "SELECT * FROM `visitorCountTable`";
    $visitResult = mysqli_query($conn, $query);
    $visitRow = mysqli_fetch_assoc($visitResult);
    $totalVisitor = $visitRow['visitorCount'];
    $newVisit = $totalVisitor + 1;
    $newQuery = "UPDATE `visitorCountTable` SET `visitorCount` = '$newVisit'";
    $newVisitResult = mysqli_query($conn, $newQuery);
}

// session_start();
if (session_status() == 1 && !headers_sent()) {
    session_start();
}
include "components/online_users.php";;
// if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'user')) { 
?>

<div class="container">
    <hr size="4px">
    <footer class="row row-cols-5 py-5 mb-5">
        <div class="col">
            <!-- Image Div  -->
            <div class="row" style="margin: 5px;">
                <img height="150px" width="200px" src="resources/SSGC_logo_name.png" class="img-thumbnail" alt="Ghandhy College Image">
            </div>
            <div class="row fs-6">
                <!-- Text Div  -->
                <p style="font-family:'Times New Roman', Times, serif; font-size:small;text-align:center;">DR. S. & S. S. GHANDHY COLLEGE OF ENGINEERING & TECHNOLOGY,SURAT</p>
            </div>
        </div>

        <!-- Extra Div added for Space -->
        <div class="col"></div>

        <div class="col-2">
            <!-- Div for Site Links-->
            <h5>Site Links</h5>
            <h6>
                <ul class="nav flex-column">
                    <li class="nav-item mb-4"><a href="index.php" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-4"><a href="about.php" class="nav-link p-0 text-muted">About</a></li>
                    <li class="nav-item mb-4"><a href="gallary.php" class="nav-link p-0 text-muted">Gallery</a></li>
                    <li class="nav-item mb-4"><a href="contact_us.php" class="nav-link p-0 text-muted">Contact Us
                        </a></li>
                </ul>
            </h6>
        </div>

        <!-- Div for Contact Info -->
        <div class="col-2">
            <h5>Contact Info</h5>
            <h6>
                <ul class="nav flex-column">
                    <li class="nav-item mb-4"><a href="https://www.google.com/maps?q=Majura+Gate,+Surat,+Gujarat,+India" target="new" class="nav-link p-0 text-muted">
                            <i class="fa fa-map-marker"></i> Majura Gate,Surat</a></li>

                    <li class="nav-item mb-4"><a href="mailto:gecsrt612@gmail.com" class="nav-link p-0 text-muted">
                            <i class="fa fa-envelope"></i> gecsrt612@gmail.com </a></li>

                    <li class="nav-item mb-4"><a href="tel:2655799" class="nav-link p-0 text-muted">
                            <i class="fa fa-phone"></i> 2655799</a></li>
                </ul>
            </h6>
        </div>

        <!-- Div for Site Info -->
        <?php
        if ($_SESSION['role'] = 'admin') {
            include "components/_db_connect.php";
            $query = "SELECT * FROM `visitorCountTable`";
            $visitResult = mysqli_query($conn, $query);
            $visitRow = mysqli_fetch_assoc($visitResult);
            $totalVisitor = $visitRow["visitorCount"];
            echo ' <div class="col-2">
                    <h5>Site Info</h5>
                    <h6>
                        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">
                    <p><?php echo "<b>Users Online : </b>'. $count_user_online .' 
                </a></li>

            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">
<b>Visitor Count : </b>'.$totalVisitor.'</p></a></li>
                        </ul>
                    </h6>
                </div>
            ';
        }
        ?>

    </footer>
</div>