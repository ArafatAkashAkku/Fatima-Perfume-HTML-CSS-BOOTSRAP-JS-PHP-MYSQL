<style>
    .navigation-header {
        width: 100%;
        z-index: 1000;
    }
</style>

<header>
    <?php
    $ret = mysqli_query($con, "select * from website_info");
    while ($row = mysqli_fetch_array($ret)) {
    ?>
        <nav class="navbar navbar-expand-lg bg-dark top-0 start-0 navigation-header">
            <div class="container-fluid">
                <a class="navbar-brand text-warning" href="../index.php"> <?php
                                                                            echo htmlentities($row["website_name"]);
                                                                            ?></a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page">Welcome</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="">My Account</a>
                        </li>
                        <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page">Welcome <span class="text-warning"><?php echo $_SESSION['admin_email']; ?></span></a>
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
                        <li class="nav-item">
                            <a class="nav-link text-light" href="logout.php">Log Out</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="login.php">Log In</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="cart.php">Cart</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pages
                            </a>
                            <ul class="dropdown-menu bg-dark">
                                <li> <a class="dropdown-item text-light bg-dark" href="../index.php#view-all-brands">Top Brands</a></li>
                                <li> <a class="dropdown-item text-light bg-dark" href="../index.php#best-sellers">Best Sellers</a></li>
                                <li> <a class="dropdown-item text-light bg-dark" href="../index.php#new-arrivals">New Arrivals</a></li>
                                <li> <a class="dropdown-item text-light bg-dark" href="../index.php#contact">Contact</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php
    }
    ?>
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