var li = document.getElementsByTagName('li')
var cont = document.getElementById('content')

function changeHTML(content) {
    let request = new XMLHttpRequest;
    request.open('GET', content, true)
    request.send()
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
           cont.innerHTML = request.responseText
           localStorage.setItem('key', request.responseText)
        }
    }
}

li[1].onclick = () => {
    changeHTML('uk.html')
}

li[2].onclick = () => {
    changeHTML('1.html')
}

li[3].onclick = () => {
    changeHTML('2.html')
}

li[5].onclick = () => {
    changeHTML('3.html')
}

li[6].onclick = () => {
    changeHTML('4.html')
}

function onload() {
    cont.innerHTML=localStorage.getItem('key')
}
document.addEventListener('DOMContentLoaded', onload)