const random = (min, max) => { //Псевдослучайное число с плавающей запятой от 0 (включительно) до 1 (не считая)
    const rand = min + Math.random() * (max - min + 1); //+1 включает значение max в диапазон, а не исключает его. 
    return Math.floor(rand); //Округление в меньшую сторону
}

const btn = document.querySelector('#btn'); //возвращает первый элемент, который соответствует одному или более CSS селекторам. Если совпадения не будет, то он вернет null
btn.addEventListener('mouseenter', () => { //События отображают то, что случается с HTML элементом, например клик, фокусировка или загрузка — то на что можно реагировать с JavaScript.
    btn.style.left = `${random(0, 90)}%`;
    btn.style.top = `${random(0, 90)}%`;
});

btn.addEventListener('click', () => {
    alert('Привет! поймаешь меня?)');
});