function darkmode () {
    const body = document.body
    const wasDarkMode = localStorage.getItem('darkmode') === 'true'
    // Выбираем настройки темы из localStorage
    if (!wasDarkMode) { document.getElementById("toggle-theme-image").src = "sun.png"; }
    // Если текущая тема в localStorage равна "dark" 
    else { document.getElementById("toggle-theme-image").src = "moon.png"; }
     // …тогда мы используем класс .darkmode
    localStorage.setItem('darkmode',!wasDarkMode)
    // После чего сохраняем выбор в localStorage
    body.classList.toggle('dark-mode',!wasDarkMode)
}