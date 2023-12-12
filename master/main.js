let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const buttons = document.querySelectorAll('.button-container button');

function showSlide(index) {
    slides.forEach((slide, i) => {
        if (i === index) {
            slide.style.display = 'block';
        } else {
            slide.style.display = 'none';
        }
    });

    // Підсвічуємо активну кнопку
    buttons.forEach((button, i) => {
        button.classList.toggle('active', i === index);
    });
}

function changeSlide(index) {
    currentSlide = index;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

// Показуємо перший слайд при завантаженні сторінки
showSlide(currentSlide);

// Автоматично перемикаємо слайди кожні 5 секунд
setInterval(() => {
    nextSlide();
}, 5000);

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}




