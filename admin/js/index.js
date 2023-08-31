// error images trigger
const errorImages = document.querySelectorAll(".error-img");
errorImages.forEach((element) => {
    element.onerror = () => {
        element.alt = "No Image Available";
    }
})



