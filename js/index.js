// google translator 
// function loadGoogleTranslate() {
//     new google.translate.TranslateElement("google_element");

// }

// navigation bar on scroll effect and scroll progress bar
const container = document.querySelector("body");
const highlight = document.getElementById("bar-highlight");

//back to top button
const mybutton = document.getElementById("myBtn");
mybutton.onclick = () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// windows scroll function 
window.onscroll = () => {
    // scroll progress bar
    let cheight = container.offsetHeight - window.innerHeight;
    let cpos = container.getBoundingClientRect();
    let diff = cheight + cpos.top;
    let progress = diff / cheight * 100;
    let csswidth = Math.floor(100 - progress);
    highlight.style.width = csswidth + "%";
    //back to top button
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// Auto update year 
const yearUpdate = document.getElementById("update-year");
yearUpdate.innerHTML = new Date().getFullYear();

// right click disable 
document.oncontextmenu = (element) => {
    element.preventDefault();
}

// brand load button 
const loadButton = document.getElementById("load-more");
let currentItem = 3;
loadButton.onclick = () => {
    setTimeout(() => {
        let boxes = [...document.querySelectorAll("#all-brands .brand-list")];
        for (let i = currentItem; i < currentItem + 3; i++) {
            boxes[i].style.display = "flex";
        }
        currentItem += 3;
        if (currentItem >= boxes.length) {
            loadButton.style.display = "none";
        }
    }, 1000);
}

// weekly deals countdown
let countDownDate = new Date("Dec 31, 2025 00:00:00").getTime();
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
    }
}, 1000);