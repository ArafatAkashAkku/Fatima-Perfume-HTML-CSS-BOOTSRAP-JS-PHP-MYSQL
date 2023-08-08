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

const navigationBar = document.querySelector(".navigation-header");

// windows scroll function 
window.onscroll = () => {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navigationBar.style.position = "fixed";
        } else {
            navigationBar.style.position = "relative";
        }
    };


    const filterClick = document.querySelector(".filter-click");
    const filterShow = document.querySelector(".filter-show");


    filterClick.onclick =()=>{
        filterShow.classList.toggle("active");
        if(filterShow.classList.contains("active")){
            filterClick.innerHTML="Filter Search Remove";
        }else{
            filterClick.innerHTML="Filter Search Click";
        }
    }