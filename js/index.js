// view all brand list load button 
const loadButton = document.getElementById("load-more");
let currentItem = 3;
loadButton.onclick = () => {
    setTimeout(() => {
        let boxes = [...document.querySelectorAll(".brand-item")];
        for (let i = currentItem; i < currentItem + 3; i++) {
            boxes[i].classList.add("active");
        }
        currentItem += 3;
        if (currentItem >= boxes.length) {
            loadButton.classList.add("hide");
        }
    }, 1000);
}

// error images trigger
const errorImages = document.querySelectorAll(".error-img");
errorImages.forEach((element) => {
    element.onerror = () => {
        const defaultImage = "../images/No-Image.jpg";
        element.src = defaultImage;
        element.alt = "default";
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