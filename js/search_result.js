// error images trigger
const errorImages = document.querySelectorAll(".error-img");
errorImages.forEach((element) => {
    element.onerror = () => {
        element.alt = "No Image Available";
    }
})

// Auto update year 
const yearUpdate = document.querySelectorAll(".update-year");

yearUpdate.forEach((element) => {
    element.innerHTML = new Date().getFullYear();
});

// right click disable 
document.oncontextmenu = (element) => {
    element.preventDefault();
}

const navigationBar = document.querySelector(".navigation-header");

// windows scroll function 
window.onscroll = () => {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navigationBar.style.position = "fixed";
        } else {
            navigationBar.style.position = "relative";
        }
    };

