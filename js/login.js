// Auto update year 
const yearUpdate = document.getElementById("update-year");
yearUpdate.innerHTML = new Date().getFullYear();

// right click disable 
document.oncontextmenu = (element) => {
    element.preventDefault();
}
// show password eye button 
let toggleEye = document.getElementById("password-eye");
let passwordType = document.getElementById("password-pass");
toggleEye.onclick = () => {
    if (passwordType.type == "password") {
        passwordType.type="text";
        toggleEye.classList.replace("fa-eye-slash","fa-eye");
    }else{
        passwordType.type="password";
        toggleEye.classList.replace("fa-eye","fa-eye-slash");
    }
}