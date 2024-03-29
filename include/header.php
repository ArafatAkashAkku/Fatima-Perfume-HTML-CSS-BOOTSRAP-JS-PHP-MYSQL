<style>
    .navigation-header {
        width: 100%;
        z-index: 1000;
    }
</style>

<header>
        <nav class="navbar navbar-expand-lg bg-dark top-0 start-0 navigation-header">
            <div class="container-fluid">
                <a class="navbar-brand text-warning" href="index.php"><img src="images/logo.jpeg" class="border rounded-pill" style="width: 50px;" alt="Logo"></a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page">Welcome <span class="text-warning"><?php echo $_SESSION['fullname']; ?></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="account.php?email=<?php
                                                                                        echo $_SESSION['email'];
                                                                                        ?>&id=<?php echo $_SESSION['id']; ?>">My Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="cart.php">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="logout.php">Log Out</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page">Welcome</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="login.php">My Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="login.php">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="login.php">Log In</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pages
                            </a>
                            <ul class="dropdown-menu bg-dark">
                                <li> <a class="dropdown-item text-light bg-dark" href="index.php#view-all-brands">Top Brands</a></li>
                                <li> <a class="dropdown-item text-light bg-dark" href="index.php#best-sellers">Best Sellers</a></li>
                                <li> <a class="dropdown-item text-light bg-dark" href="index.php#new-arrivals">New Arrivals</a></li>
                                <li> <a class="dropdown-item text-light bg-dark" href="index.php#contact">Contact</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="search_result.php" method="GET" autocomplete="off">
                        <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                echo $_GET['search'];
                                                                            } ?>" class="form-control" placeholder="Search data">
                        <button class="btn btn-outline-warning" type="submit">Search</button>
                    </form>
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