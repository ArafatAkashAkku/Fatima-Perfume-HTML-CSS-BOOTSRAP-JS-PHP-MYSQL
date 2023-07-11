<?php $sql = mysqli_query($con, "select website_name from website_info");
while ($row = mysqli_fetch_array($sql)) {
?>
<div class="website-search-wishlist-shop">
    <div class="website-box">
        <h1><a href="index.html"><?php echo $row['website_name']; ?></a></h1>
    </div>
    <div class="search-box">
        <form action="">
            <input type="text" name="" id="" placeholder="Search here">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="wishlist-shop-box">
        <a href=""><i class="fa-solid fa-heart"></i></a>
        <a href=""><i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
    </div>
</div>
<?php } ?>