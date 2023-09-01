<?php
require_once '../config.php';
include '../dbConnect.php';
session_start();
$email = "";
$id = "";
if (isset($_GET["email"]) & isset($_GET["id"])) {
    $email = $_GET["email"];
    $id = $_GET["id"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- external css link  -->
    <link rel="stylesheet" href="css/index.css">
    <!-- swipper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- datatables net  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- website title  -->
    <title>Admin Account |
        <?php
        $ret = mysqli_query($con, "select * from website_info");
        while ($row = mysqli_fetch_array($ret)) {
            echo htmlentities($row["website_name"]);
        } ?></title>

</head>

<body class="overflow-x-hidden">
    <?php
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
    ?>
        <!-- header start  -->
        <?php include("include/header.php") ?>
        <!-- header end  -->

        <!-- main start  -->
        <main>
            <div class="d-flex flex-column align-items-center justify-content-center p-5 bg-warning">
                <div class="bg-light p-3 res-width">
                    <h2 class="text-muted text-center pt-2">Update Admin Info Details</h2>
                    <?php
                    $ret = mysqli_query($con, "select * from admin_info where email='$email' and id='$id'");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                        <form class="p-3" action="" method="POST" autocomplete="off">
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Email</h5>
                                    <input type="email" disabled name="email" class="form-control px-3 py-2" value="<?php
                                                                                                            echo htmlentities($row["email"]);
                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Password</h5>
                                    <input type="password" id="myInput" name="password" class="form-control px-3 py-2" value="<?php
                                                                                                                echo htmlentities($row["password"]);
                                                                                                                ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <label for="showpass">
                                    <div class="input-field">
                                        <input type="checkbox" id="showpass" onclick="myFunction()">&nbsp;Show Password
                                    </div>
                                </label>
                            </div>
                            <button class="btn btn-width btn-outline-warning bg-warning text-dark" name="submit" type="submit">Update</button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </main>
        <!-- main end  -->

        <!-- footer start  -->
        <?php include("include/footer.php") ?>
        <!-- footer end  -->
    <?php
    } else {
        echo "<script>
                alert('You need to log in first');
                window.location.href='index.php';
                </script>";
    }
    ?>

    <?php
    if (isset($_POST['submit'])) {
        $user_exist_query = "SELECT * from `admin_info` WHERE `email`='$email' and `id`='$id'";
        $result = mysqli_query($con, $user_exist_query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $query ="UPDATE `admin_info` SET `password`='$_POST[password]' WHERE `email`='$email' and `id`='$id'";
                if (mysqli_query($con, $query)) {
                    echo "
          <script>
          alert('Admin info updated.');
          window.location.href='admin_dashboard.php';
          </script>
          ";
                } else {
                    echo "
          <script>
          alert('Server Down');
          window.location.href='admin_dashboard.php';
          </script>
          ";
                }
            }
        } else {
            echo "
        <script>
        alert('Can not run query');
        window.location.href='admin_dashboard.php';
        </script>
        ";
        }
    }

    ?>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="js/index.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- jquery js  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- datatables net  -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        function myFunction() {
            let x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>