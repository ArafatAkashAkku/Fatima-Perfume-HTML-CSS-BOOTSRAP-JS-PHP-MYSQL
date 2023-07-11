<?php $sql = mysqli_query($con, "select website_name,email,phone_no,facebook_link,instagram_link,twitter_link,youtube_link from website_info");
while ($row = mysqli_fetch_array($sql)) {
?>
   <div class="support-links">
        <div class="links-info">
            <h1><a href="index.html"><?php echo $row['website_name']; ?></a></h1>
            <ul>
                <li><a href="">Phone: <?php echo $row['phone_no']; ?></a></li>
                <li><a href="">Email: <?php echo $row['email']; ?></a></li>
                <li>
                    <ul id="support-social-links">
                        <li><a href="<?php echo $row['facebook_link']; ?>"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="<?php echo $row['instagram_link']; ?>"><i class="fa-brands fa-square-instagram"></i></a></li>
                        <li><a href="<?php echo $row['twitter_link']; ?>"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="<?php echo $row['youtube_link']; ?>"><i class="fa-brands fa-youtube"></i></a></li><?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="links-info">
            <h1><a href="">Navbar</a></h1>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Shop</a></li>
                <li><a href="">Collection </a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Pages</a></li>
            </ul>
        </div>
        <div class="links-info">
            <h1><a href="">Account</a></h1>
            <ul>
                <li><a href="">My Account</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Shopping Cart </a></li>
            </ul>
        </div>
        <div class="links-info">
            <h1><a href="">Subscription</a></h1>
            <p>Get E-mail updates about our latest shop and special offers.</p>
            <form action="">
                <input type="email" name="" id="" placeholder="Example: abc@gmail.com" pattern="^([a-zA-Z0-9]|[a-z\.A-Z\.0-9]|[a-zA-Z\.a-zA-Z0-9])+@(gmail|yahoo)\.com$" title="Example: abc@gmail.com" maxlength="50" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
    <div class="rights">
        <p> Copyright &copy 2023 - <span id="update-year"></span><a href="" target="_blank"> Website</a> All Rights
            Reserved.</p>
    </div>