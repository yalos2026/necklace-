// === КАСТОМНЫЙ КУРСОР ===
const cursor = document.getElementById('cursor');
const cursorTrail = document.getElementById('cursor-trail');

let mouseX = 0, mouseY = 0;
let trailX = 0, trailY = 0;

// Проверяем, что элементы курсора существуют
if (cursor && cursorTrail && window.matchMedia("(hover: hover)").matches) {
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        cursor.style.left = mouseX + 'px';
        cursor.style.top = mouseY + 'px';
    });

    function animateTrail() {
        trailX += (mouseX - trailX) * 0.15;
        trailY += (mouseY - trailY) * 0.15;
        cursorTrail.style.left = trailX + 'px';
        cursorTrail.style.top = trailY + 'px';
        requestAnimationFrame(animateTrail);
    }
    animateTrail();

    document.querySelectorAll('a, button, .element-medallion').forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.style.width = '40px';
            cursor.style.height = '40px';
            cursorTrail.style.width = '60px';
            cursorTrail.style.height = '60px';
        });
        el.addEventListener('mouseleave', () => {
            cursor.style.width = '20px';
            cursor.style.height = '20px';
            cursorTrail.style.width = '40px';
            cursorTrail.style.height = '40px';
        });
    });
}

// === СВЕТЛЯЧКИ ===
const firefliesContainer = document.getElementById('fireflies');

// Проверяем, что контейнер для светлячков существует
if (firefliesContainer) {
    function createFirefly() {
        const firefly = document.createElement('div');
        firefly.classList.add('firefly');
        firefly.style.left = Math.random() * 100 + 'vw';
        firefly.style.top = (Math.random() * 50 + 50) + 'vh';
        const size = Math.random() * 3 + 2;
        firefly.style.width = size + 'px';
        firefly.style.height = size + 'px';
        const duration = Math.random() * 10 + 10;
        firefly.style.animationDuration = duration + 's';
        firefliesContainer.appendChild(firefly);
        setTimeout(() => firefly.remove(), duration * 1000);
    }
    
    setInterval(createFirefly, 800);
    for (let i = 0; i < 8; i++) {
        setTimeout(createFirefly, i * 300);
    }
}

// === REVEAL ON SCROLL ===
const revealElements = document.querySelectorAll('.reveal');

// Проверяем, что есть элементы для анимации
if (revealElements.length > 0) {
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.1 });

    revealElements.forEach(el => revealObserver.observe(el));
}

