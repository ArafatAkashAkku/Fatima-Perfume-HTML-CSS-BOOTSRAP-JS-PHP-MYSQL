// function loadGoogleTranslate() {
//     new google.translate.TranslateElement("google_element");

// }

// navigation bar on scroll effect and scroll progress bar
const container = document.querySelector("body");
const highlight = document.getElementById("bar-highlight");

// windows scroll function 
window.onscroll = () => {

    // scroll progress bar
    let cheight = container.offsetHeight - window.innerHeight;
    let cpos = container.getBoundingClientRect();
    let diff = cheight + cpos.top;
    let progress = diff / cheight * 100;
    let csswidth = Math.floor(100 - progress);
    highlight.style.width = csswidth + "%";
    
}

// Auto update year 
const yearUpdate = document.getElementById("update-year");
yearUpdate.innerHTML = new Date().getFullYear();
// right click disable 
document.oncontextmenu = (element) => {
    element.preventDefault();
}