
const radio1 = document.querySelector('#radio1');
const radio2 = document.querySelector('#radio2');
const radio3 = document.querySelector('#radio3');
const payment2 = document.querySelector('.payment2');
const payment3 = document.querySelector('.payment3');

radio1.addEventListener('click', () => {
    payment2.classList.remove("active");
    payment3.style.display = 'none';
})
radio2.addEventListener('click', () => {
    payment2.classList.add("active");
    payment3.style.display = 'none';
})
radio3.addEventListener('click', () => {
    payment2.classList.remove("active");
    payment3.style.display = 'block';
})
