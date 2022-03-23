const popup = document.querySelector('#popup');
const gallery = document.querySelectorAll('.galleryImage');
const selectedImage = document.querySelector('#selectedImage');
const arrowUp = document.querySelector('.show-link');
const selectedIndex = null;
for (const button of gallery) {
    button.addEventListener('click', () => {
        selectedImage.src = button.src;
        popup.style.transform = `translateY(0%)`;
        arrowUp.style.zIndex = "0";
    })
    popup.addEventListener('click', () => {
        popup.style.transform = `translateY(-100%)`;
        popup.src = '';
        arrowUp.style.zIndex = "100";
    })
}



