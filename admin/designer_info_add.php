<?php
require_once '../config.php';
include '../dbConnect.php';
session_start();
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
    <title>Designer Info Add |
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
                    <h2 class="text-muted text-center pt-2">Add Designer Info details</h2>
                    <form class="p-3" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Designer Name</h5>
                                <input type="text" name="designer" class="form-control px-3 py-2" required>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Photo</h5>
                                <input type="file" name="photo" class="form-control px-3 py-2" required>
                            </div>
                        </div>
                        <button class="btn btn-width btn-outline-warning bg-warning text-dark" name="submit" type="submit">Add</button>
                    </form>
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
        $user_exist_query = "SELECT * from `product_designer_info` WHERE `designer`='$_POST[designer]'";
        $result = mysqli_query($con, $user_exist_query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $result_fetch = mysqli_fetch_assoc($result);
                if ($result_fetch['designer'] == $_POST['designer']) {
                    echo "
           <script>
           alert('$result_fetch[designer] - designer already added');
           window.location.href='admin_dashboard.php';
           </script>
           ";
                } else {
                    echo "
          <script>
          alert('$result_fetch[designer] - Designer available for adding');
          window.location.href='admin_dashboard.php';
          </script>
      ";
                }
            } else {
                $productimage=$_FILES["photo"]["name"];
                $imagefield = mysqli_query($con, "select max(id) as pid from `product_designer_info`");
                $imgsuccess = mysqli_fetch_array($imagefield);
                $fileid = $imgsuccess['pid'] + 1;
                $dir = "../images/designers/$fileid";
                if (!is_dir($dir)) {
                    mkdir("../images/designers/" . $fileid);
                }
                move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/designers/$fileid/".$_FILES["photo"]["name"]);
                $query = "INSERT INTO `product_designer_info`(`designer`, `designer_image`) VALUES ('$_POST[designer]','$productimage')";
                if (mysqli_query($con, $query)) {
                    echo "
          <script>
          alert('Designer added.');
          window.location.href='designer_info.php';
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
</body>

</html>