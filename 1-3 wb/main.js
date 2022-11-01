function darkmode () {
    const body = document.body
    const wasDarkMode = localStorage.getItem('darkmode') === 'true'

    localStorage.setItem('darkmode',!wasDarkMode)
    body.classList.toggle('dark-mode',!wasDarkMode)
}

document.querySelector('.btn').addEventListener('click',darkmode)

function onload() {
    document.body.classList.toggle('dark-mode',localStorage.getItem('darkmode') === 'true')
}
document.addEventListener('DOMContentLoaded', onload)