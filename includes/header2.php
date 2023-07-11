<?php $sql = mysqli_query($con, "select email,phone_no  from website_info");
while ($row = mysqli_fetch_array($sql)) {
?>
    <div class="email-phone-brand-user">
        <div class="email-box">
            <a href="mailto:"><i class="fa-solid fa-envelope"></i><?php echo $row['email']; ?></a>
        </div>
        <div class="phone-brand-box">
            <div class="phone-box">
                <i class="fa-solid fa-phone"></i>
                <p><?php echo $row['phone_no']; ?></p><?php } ?>
            </div>
            <div class="brand-box">
                <ul>
                    <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-square-instagram"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="user-box">
            <a href=""><i class="fa-solid fa-user"></i>Login</a>
        </div>
    </div>