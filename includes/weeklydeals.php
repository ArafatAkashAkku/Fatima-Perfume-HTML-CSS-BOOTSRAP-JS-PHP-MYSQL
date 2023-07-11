<section id="weekly-deals">
    <div class="time">
        <h1>Deal Of The Week</h1>
        <h3>Product Name</h3>
        <p>Price: 400 / Perfume</p>
        <div class="timer-countdown">
            <div>
                <p id="days">00</p>
                <span>&nbsp;&nbsp;&nbsp;Days&nbsp;&nbsp;&nbsp;</span>
            </div>
            <div>
                <p id="hours">00</p>
                <span>&nbsp;&nbsp;Hours&nbsp;&nbsp;</span>
            </div>
            <div>
                <p id="minutes">00</p>
                <span>Minutes</span>
            </div>
            <div>
                <p id="seconds">00</p>
                <span>Seconds</span>
            </div>
        </div>
        <a href="" id="deal-shop">Shop Now</a>
    </div>
    <div class="product-img">
        <img src="images/perfume.png" alt="">
    </div>
</section>
<script>
    let countDownDate = new Date("Jul 11, 2023 14:13:00").getTime();
    let x = setInterval(function() {
        let now = new Date().getTime();
        let d = countDownDate - now;
        let days = Math.floor(d / (1000 * 60 * 60 * 24));
        let hours = Math.floor((d % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((d % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((d % (1000 * 60)) / 1000);
        document.getElementById("days").innerHTML = days;
        document.getElementById("hours").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;
        if (d < 0) {
            clearInterval(x);
            document.getElementById("days").innerHTML = "00";
            document.getElementById("hours").innerHTML = "00";
            document.getElementById("minutes").innerHTML = "00";
            document.getElementById("seconds").innerHTML = "00";
            document.getElementById("deal-shop").style.pointerEvents = "none";
        }
    }, 1000);
</script>