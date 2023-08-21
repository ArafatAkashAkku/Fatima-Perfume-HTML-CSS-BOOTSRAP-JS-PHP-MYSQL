<?php
include("config.php");
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
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>404 Page Not Found |
        <?php
        $ret = mysqli_query($con, "select * from website_info");
        while ($row = mysqli_fetch_array($ret)) {
            echo htmlentities($row["website_name"]);
        } ?></title>
</head>
<style>
    .error-pages{
    display: flex!important;
    flex-direction: column!important;
    gap: 20px;
    align-items: center!important;
    justify-content: center!important;
    height: 100vh!important;
    width: 100%!important;
}
.fa-face-sad-tear{
    font-size: 300px;
}
</style>
<body class="overflow-x-hidden">

    <!-- main start  -->
    <main>
        <div class="error-pages text-center">
            <i class="fa-regular fa-face-sad-tear"></i>
            <h1>404</h1>
            <h3>Page Not Found</h3>
            <p>The page you are looking for doesn't exist. <br> So go back and choose a new direction.</p>
            <a href="index.php" class="py-2 px-4 bg-warning border rounded-4 text-decoration-none text-dark">Go to home</a>
        </div>
    </main>
    <!-- main end  -->

    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="js/index.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</body>

</html>