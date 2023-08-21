<footer class="bg-dark pt-3" id="contact">
    <?php
    $ret = mysqli_query($con, "select * from website_info");
    while ($row = mysqli_fetch_array($ret)) {
    ?>
        <div class="mx-4">
            <div class="row">
                <div class="col-12 col-md-2 mb-3">
                    <h5 class="text-light"><?php
                                            echo htmlentities($row["website_name"]);
                                            ?></h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="mailto:<?php
                                                                    echo htmlentities($row["email"]);
                                                                    ?>" class="nav-link p-0 text-light"><i class="fa-solid fa-envelope text-warning pe-2"></i><?php
                                                                                                                                                                echo htmlentities($row["email"]);
                                                                                                                                                                ?></a></li>
                        <li class="nav-item mb-2"><a href="tel:<?php
                                                                echo htmlentities($row["phone_no"]);
                                                                ?>" class="nav-link p-0 text-light"><i class="fa-solid fa-phone text-warning pe-2"></i><?php
                                                                                                                                                        echo htmlentities($row["phone_no"]);
                                                                                                                                                        ?></a></li>
                    </ul>
                </div>

                <div class="col-12 col-md-2 mb-3">
                    <h5 class="text-light">Navbar</h5>
                    <ul class="nav flex-column">
                        <?php
                        if (isset($_SESSION['owner_logged_in']) && $_SESSION['owner_logged_in'] == true) {
                        ?>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-light">Top Fraggrance</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-light">Best Seller</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-light">New Arrivals</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-light">Reviews</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-light">Top Picks For You</a></li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item mb-2"><a href="../index.php#view-all-brands" class="nav-link p-0 text-light">Top Fraggrance</a></li>
                            <li class="nav-item mb-2"><a href="../index.php#best-sellers" class="nav-link p-0 text-light">Best Seller</a></li>
                            <li class="nav-item mb-2"><a href="../index.php#new-arrivals" class="nav-link p-0 text-light">New Arrivals</a></li>
                            <li class="nav-item mb-2"><a href="../index.php#reviews" class="nav-link p-0 text-light">Reviews</a></li>
                            <li class="nav-item mb-2"><a href="../index.php#top-picks-for-you" class="nav-link p-0 text-light">Top Picks For You</a></li>

                        <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="col-12 col-md-2 mb-3">
                    <h5 class="text-light">Portals</h5>
                    <ul class="nav flex-column">
                        <?php
                        if (isset($_SESSION['owner_logged_in']) && $_SESSION['owner_logged_in'] == true) {
                        ?>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-light">User</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-light">Admin</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-light">Owner</a></li>

                        <?php
                        } else {
                        ?>
                            <li class="nav-item mb-2"><a href="../login.php" class="nav-link p-0 text-light">User</a></li>
                            <li class="nav-item mb-2"><a href="../admin/index.php" class="nav-link p-0 text-light">Admin</a></li>
                            <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-light">Owner</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5 class="text-light">Subscribe to our newsletter</h5>
                        <p class="text-light">Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-warning" type="button" disabled>Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between pt-4 border-top align-items-center">
                <p class="text-light">© <span class="update-year"></span> <?php
                                                                            echo htmlentities($row["website_name"]);
                                                                            ?>, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="text-warning fs-4" href="<?php
                                                                        echo htmlentities($row["facebook_link"]);
                                                                        ?>" target="_blank" title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                    <li class="ms-3"><a class="text-warning fs-4" href="<?php
                                                                        echo htmlentities($row["instagram_link"]);
                                                                        ?>" target="_blank" title="Instagram"><i class="fa-brands fa-square-instagram"></i></a></li>
                    <li class="ms-3"><a class="text-warning fs-4" href="<?php
                                                                        echo htmlentities($row["twitter_link"]);
                                                                        ?>" target="_blank" title="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                    <li class="ms-3"><a class="text-warning fs-4" href="<?php
                                                                        echo htmlentities($row["youtube_link"]);
                                                                        ?>" target="_blank" title="Youtube"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    <?php
    }
    ?>
</footer>

<script>
    // Auto update year 
    const yearUpdate = document.querySelectorAll(".update-year");

    yearUpdate.forEach((element) => {
        element.innerHTML = new Date().getFullYear();
    });
</script>