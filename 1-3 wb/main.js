function darkmode () {
    const body = document.body
    const wasDarkMode = localStorage.getItem('darkmode') === 'true'
    if (!wasDarkMode) { document.getElementById("toggle-theme-image").src = "sun.png"; }
    else { document.getElementById("toggle-theme-image").src = "moon.png"; }
    localStorage.setItem('darkmode',!wasDarkMode)
    body.classList.toggle('dark-mode',!wasDarkMode)
}