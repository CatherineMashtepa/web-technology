const body = document.body
var darkMode = localStorage.getItem('darkmode') == 'true';

document.addEventListener("DOMContentLoaded", function(event) {
    changeMode(darkMode)
});

function darkmode () {
    changeMode(!darkMode)
}

function changeMode (dark) {
    darkMode = dark;
    localStorage.setItem('darkmode', dark)
    body.classList.toggle('dark-mode', dark)
    if (!dark) 
    { 
        document.getElementById("toggle-theme-image").src = "sun.png"; 
    }
    else { 
        document.getElementById("toggle-theme-image").src = "moon.png"; 
    }
}