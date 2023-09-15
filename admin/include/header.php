<style>
    .navigation-header {
        width: 100%;
        z-index: 1000;
    }
</style>

<header>
        <nav class="navbar navbar-expand-lg bg-dark top-0 start-0 navigation-header">
            <div class="container-fluid">
                <?php
                if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
                ?>
                    <a class="navbar-brand text-warning" href="admin_dashboard.php"><img src="../images/logo.jpeg" class="border rounded-pill" style="width: 50px;" alt="Logo"></a>
                <?php
                } else {
                ?>
                    <a class="navbar-brand text-warning" href="../index.php"><img src="../images/logo.jpeg" class="border rounded-pill" style="width: 50px;" alt="Logo"></a>
                <?php
                }
                ?>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page">Welcome <span class="text-warning">Admin</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Order Details
                                </a>
                                <ul class="dropdown-menu bg-dark">
                                    <li> <a class="dropdown-item text-light bg-dark" href="pending_orders_info.php">Pending Orders</a></li>
                                    <li> <a class="dropdown-item text-light bg-dark" href="delivered_orders_info.php">Delivered Orders</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Product Details
                                </a>
                                <ul class="dropdown-menu bg-dark">
                                    <li> <a class="dropdown-item text-light bg-dark" href="designer_info.php">Designer Info</a></li>
                                    <li> <a class="dropdown-item text-light bg-dark" href="products_info.php">Products Info</a></li>
                                    <li> <a class="dropdown-item text-light bg-dark" href="designer_info_add.php">Add Designer Info</a></li>
                                    <li> <a class="dropdown-item text-light bg-dark" href="products_info_add.php">Add Products Info</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    User Details
                                </a>
                                <ul class="dropdown-menu bg-dark">
                                    <li> <a class="dropdown-item text-light bg-dark" href="verified_user_info.php">Verified User Info</a></li>
                                    <li> <a class="dropdown-item text-light bg-dark" href="not_verified_user_info.php">Not Verified User Info</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Review Details
                                </a>
                                <ul class="dropdown-menu bg-dark">
                                    <li> <a class="dropdown-item text-light bg-dark" href="review_info.php">Front Page Review Info</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Account
                                </a>
                                <ul class="dropdown-menu bg-dark">
                                    <li> <a class="dropdown-item text-light bg-dark" href="admin_account.php?email=<?php
                                                                                                                    echo $_SESSION['email'];
                                                                                                                    ?>&id=<?php echo $_SESSION['id'] ?>">Change Password</a></li>
                                    <li> <a class="dropdown-item text-light bg-dark" href="logout.php">Log Out</a></li>
                                </ul>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page">Welcome</a>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
</header>

<script>
    const navigationBar = document.querySelector(".navigation-header");

    // windows scroll function 
    window.onscroll = () => {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navigationBar.style.position = "fixed";
        } else {
            navigationBar.style.position = "relative";
        }
    };
</script>