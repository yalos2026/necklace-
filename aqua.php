<?php 
$pageTitle = 'Вода — Коллекция | DARIA ROZENVASSER';
include 'includes/header.php'; 
?>

<style>
    :root {
        --water: #2a6ea8;
        --water-glow: #5fb3e8;
        --water-deep: #0a1f3d;
        --water-light: #a8d8f0;
        --gold: #d4af37;
        --gold-light: #f4d47c;
        --forest-dark: #0a1410;
        --forest-deep: #0f1912;
        --cream: #f5e6d3;
        --text: #e8dcc4;
        --text-light: #f4f0e3;
        --font-serif: 'Cinzel', serif;
        --font-display: 'Cormorant Garamond', serif;
        --font-sans: 'Plus Jakarta Sans', sans-serif;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        cursor: none !important;
    }

    body {
        font-family: var(--font-sans);
        background: var(--forest-deep);
        color: var(--text);
        line-height: 1.7;
        overflow-x: hidden;
    }

    h1, h2, h3 {
        font-family: var(--font-serif);
        letter-spacing: 0.08em;
    }

    .italic {
        font-family: var(--font-display);
        font-style: italic;
        color: var(--gold);
    }

    /* === КАСТОМНЫЙ КУРСОР === */
    .cursor {
        position: fixed;
        width: 20px;
        height: 20px;
        border: 2px solid var(--gold);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        transition: transform 0.15s ease;
        mix-blend-mode: difference;
    }

    .cursor-dot {
        position: fixed;
        width: 6px;
        height: 6px;
        background: var(--gold-light);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        box-shadow: 0 0 15px var(--gold), 0 0 30px var(--gold-light);
    }

    .cursor.hover {
        transform: scale(2);
        border-color: var(--water-glow);
    }

    /* === CANVAS АНИМАЦИЯ ВОДЫ === */
    #waterCanvas {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        pointer-events: none;
        opacity: 0.9;
    }

    /* === HERO С ФОТО И КАРТОЧКОЙ === */
    .collection-hero {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 140px 6% 80px;
        position: relative;
        overflow: hidden;
        z-index: 2;
        background-image: url('images/02805b94-3afc-4fcf-96d1-ed9d8d69e023.jpg');
        background-size: 55% auto;
        background-position: center;
        background-repeat: no-repeat;
    }

    .collection-hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        padding: 40px 30px;
        background: linear-gradient(135deg, rgba(42, 110, 168, 0.25) 0%, rgba(10, 31, 61, 0.4) 100%);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(95, 179, 232, 0.4);
        border-radius: 20px;
        box-shadow:
            0 20px 60px rgba(42, 110, 168, 0.3),
            inset 0 0 30px rgba(95, 179, 232, 0.1);
    }

    .collection-label {
        font-size: 12px;
        letter-spacing: 0.5em;
        text-transform: uppercase;
        color: var(--water-glow);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
    }

    .collection-label::before,
    .collection-label::after {
        content: '';
        width: 60px;
        height: 1px;
        background: var(--water-glow);
    }

    .collection-title {
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 900;
        color: var(--cream);
        margin-bottom: 15px;
        line-height: 1;
        text-shadow:
            0 0 40px rgba(42, 110, 168, 0.6),
            0 0 80px rgba(95, 179, 232, 0.4);
    }

    .collection-description {
        font-size: 14px;
        color: var(--cream);
        opacity: 0.95;
        max-width: 380px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* === СЕТКА УКРАШЕНИЙ === */
    .collection-grid {
        max-width: 1600px;
        margin: 0 auto;
        padding: 80px 4% 120px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 40px;
        position: relative;
        z-index: 2;
    }

    .jewelry-card {
        position: relative;
        aspect-ratio: 3/4;
        border-radius: 16px;
        overflow: hidden;
        cursor: none;
        text-decoration: none;
        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid rgba(42, 110, 168, 0.3);
        background: linear-gradient(135deg, #0a1f3d 0%, #050f1f 100%);
    }

    .jewelry-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 50%, rgba(0, 0, 0, 0.5) 100%);
        z-index: 1;
        pointer-events: none;
    }

    .jewelry-card:hover {
        transform: translateY(-10px);
        border-color: var(--water-glow);
        box-shadow: 0 25px 60px rgba(42, 110, 168, 0.5);
    }

    .jewelry-photo {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .jewelry-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .jewelry-card:hover .jewelry-photo img {
        transform: scale(1.08);
    }

    .orbit {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 70%;
        height: 70%;
        border: 1px dashed rgba(95, 179, 232, 0.4);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.6s;
        z-index: 1;
        pointer-events: none;
    }

    .jewelry-card:hover .orbit {
        opacity: 1;
        animation: rotate 15s linear infinite;
    }

    @keyframes rotate {
        from { transform: translate(-50%, -50%) rotate(0deg); }
        to { transform: translate(-50%, -50%) rotate(360deg); }
    }

    .jewelry-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 30px 25px;
        z-index: 2;
        color: #fff;
    }

    .jewelry-type {
        font-size: 10px;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--water-glow);
        margin-bottom: 8px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.8);
    }

    .jewelry-name {
        font-family: var(--font-serif);
        font-size: 22px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 10px;
        line-height: 1.2;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.9);
    }

    .jewelry-cta {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 11px;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        font-weight: 600;
        color: #fff;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.5s;
        text-shadow: 0 1px 6px rgba(0, 0, 0, 0.8);
    }

    .jewelry-cta::after {
        content: '→';
        font-size: 16px;
        transition: transform 0.3s;
    }

    .jewelry-card:hover .jewelry-cta {
        opacity: 1;
        transform: translateY(0);
    }

    .jewelry-card:hover .jewelry-cta::after {
        transform: translateX(5px);
    }

    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    /* === АДАПТИВ === */
    @media (max-width: 768px) {
        .collection-hero-content {
            padding: 35px 25px;
            max-width: 90%;
        }

        .collection-title {
            font-size: clamp(32px, 8vw, 48px);
        }

        .collection-description {
            font-size: 14px;
        }

        .collection-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 60px 4% 80px;
        }

        .jewelry-name { font-size: 18px; }

        .cursor, .cursor-dot {
            display: none;
        }

        * {
            cursor: auto !important;
        }
    }

    @media (max-width: 480px) {
        .collection-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="cursor"></div>
<div class="cursor-dot"></div>

<canvas id="waterCanvas"></canvas>

<section class="collection-hero">
    <div class="collection-hero-content">
        <div class="collection-label" data-i18n="water_collection_label">Коллекция</div>
        <h1 class="collection-title" data-i18n="water_collection_title">Вода</h1>
        <p class="collection-description" data-i18n="water_collection_description">
            Украшения, рождённые в глубинах океана. Аквамарины, лунный камень, жемчуг —
            каждый артефакт хранит в себе шёпот морских волн и тайны подводного мира.
        </p>
    </div>
</section>

<div class="collection-grid">
    <a href="product.php?id=mermaid-tears" class="jewelry-card reveal">
        <div class="orbit"></div>
        <div class="jewelry-photo">
            <img src="images/photo_2026-06-08_15-47-14.jpg" alt="Слёзы Русалки">
        </div>
        <div class="jewelry-content">
            <div class="jewelry-type" data-i18n="water_jewelry_type">Колье</div>
            <h3 class="jewelry-name" data-i18n="water_product_1_name">Слёзы Русалки</h3>
            <div class="jewelry-cta" data-i18n="water_jewelry_cta">узнать больше</div>
        </div>
    </a>

    <a href="product.php?id=moon-tide" class="jewelry-card reveal">
        <div class="orbit"></div>
        <div class="jewelry-photo">
            <img src="images/photo_2026-06-07_10-39-02.jpg" alt="Лунный Прилив">
        </div>
        <div class="jewelry-content">
            <div class="jewelry-type" data-i18n="water_jewelry_type">Колье</div>
            <h3 class="jewelry-name" data-i18n="water_product_2_name">Лунный Прилив</h3>
            <div class="jewelry-cta" data-i18n="water_jewelry_cta">узнать больше</div>
        </div>
    </a>

    <a href="product.php?id=pearl-depths" class="jewelry-card reveal">
        <div class="orbit"></div>
        <div class="jewelry-photo">
            <img src="images/photo_2026-06-07_10-38-26.jpg" alt="Жемчужина Глубин">
        </div>
        <div class="jewelry-content">
            <div class="jewelry-type" data-i18n="water_jewelry_type">Колье</div>
            <h3 class="jewelry-name" data-i18n="water_product_3_name">Жемчужина Глубин</h3>
            <div class="jewelry-cta" data-i18n="water_jewelry_cta">узнать больше</div>
        </div>
    </a>
</div>

<script>
    const cursor = document.querySelector('.cursor');
    const cursorDot = document.querySelector('.cursor-dot');

    document.addEventListener('mousemove', (e) => {
        cursor.style.left = e.clientX - 10 + 'px';
        cursor.style.top = e.clientY - 10 + 'px';
        cursorDot.style.left = e.clientX - 3 + 'px';
        cursorDot.style.top = e.clientY - 3 + 'px';
    });

    document.querySelectorAll('a, .jewelry-card').forEach(el => {
        el.addEventListener('mouseenter', () => cursor.classList.add('hover'));
        el.addEventListener('mouseleave', () => cursor.classList.remove('hover'));
    });

    const canvas = document.getElementById('waterCanvas');
    const ctx = canvas.getContext('2d');

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const bubbles = [];
    const drops = [];
    const bubbleCount = 120;
    const dropCount = 40;

    class Bubble {
        constructor() { this.reset(); }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = canvas.height + Math.random() * 100;
            this.size = Math.random() * 8 + 3;
            this.speedY = Math.random() * 1.5 + 0.5;
            this.speedX = (Math.random() - 0.5) * 0.5;
            this.wobble = Math.random() * Math.PI * 2;
            this.wobbleSpeed = Math.random() * 0.03 + 0.01;
            this.life = 1;
            this.decay = Math.random() * 0.003 + 0.001;
            const colors = [
                { r: 95, g: 179, b: 232 },
                { r: 168, g: 216, b: 240 },
                { r: 200, g: 230, b: 255 },
                { r: 255, g: 255, b: 255 }
            ];
            this.color = colors[Math.floor(Math.random() * colors.length)];
        }
        update() {
            this.y -= this.speedY;
            this.wobble += this.wobbleSpeed;
            this.x += this.speedX + Math.sin(this.wobble) * 0.5;
            this.life -= this.decay;
            if (this.life <= 0 || this.y < -10) this.reset();
        }
        draw() {
            ctx.save();
            ctx.globalAlpha = this.life * 0.6;
            ctx.shadowBlur = 15;
            ctx.shadowColor = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.5)`;
            ctx.strokeStyle = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.8)`;
            ctx.lineWidth = 1.5;
            ctx.fillStyle = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.1)`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.stroke();
            ctx.globalAlpha = this.life * 0.8;
            ctx.fillStyle = 'rgba(255, 255, 255, 0.9)';
            ctx.beginPath();
            ctx.arc(this.x - this.size * 0.3, this.y - this.size * 0.3, this.size * 0.25, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }
    }

    class Drop {
        constructor() { this.reset(); }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = -Math.random() * 100;
            this.size = Math.random() * 3 + 2;
            this.speedY = Math.random() * 4 + 3;
            this.speedX = (Math.random() - 0.5) * 1;
            this.life = 1;
            this.decay = Math.random() * 0.01 + 0.005;
        }
        update() {
            this.y += this.speedY;
            this.x += this.speedX;
            this.life -= this.decay;
            if (this.life <= 0 || this.y > canvas.height + 10) this.reset();
        }
        draw() {
            ctx.save();
            ctx.globalAlpha = this.life * 0.7;
            ctx.fillStyle = 'rgba(168, 216, 240, 0.8)';
            ctx.shadowBlur = 10;
            ctx.shadowColor = 'rgba(95, 179, 232, 0.6)';
            ctx.beginPath();
            ctx.ellipse(this.x, this.y, this.size * 0.6, this.size * 1.5, 0, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }
    }

    for (let i = 0; i < bubbleCount; i++) bubbles.push(new Bubble());
    for (let i = 0; i < dropCount; i++) drops.push(new Drop());

    let waveOffset = 0;
    function drawWaves() {
        waveOffset += 0.02;
        for (let i = 0; i < 3; i++) {
            ctx.save();
            ctx.globalAlpha = 0.15 - i * 0.04;
            ctx.strokeStyle = `rgba(95, 179, 232, ${0.5 - i * 0.1})`;
            ctx.lineWidth = 2;
            ctx.beginPath();
            const yOffset = canvas.height * 0.7 + i * 50;
            for (let x = 0; x <= canvas.width; x += 10) {
                const y = yOffset + Math.sin(x * 0.01 + waveOffset + i) * 20 + Math.sin(x * 0.02 + waveOffset * 1.5) * 10;
                if (x === 0) ctx.moveTo(x, y);
                else ctx.lineTo(x, y);
            }
            ctx.stroke();
            ctx.restore();
        }
    }

    function drawWaterBase() {
        const gradient = ctx.createLinearGradient(0, canvas.height - 150, 0, canvas.height);
        gradient.addColorStop(0, 'rgba(42, 110, 168, 0)');
        gradient.addColorStop(0.5, 'rgba(42, 110, 168, 0.2)');
        gradient.addColorStop(1, 'rgba(95, 179, 232, 0.3)');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, canvas.height - 150, canvas.width, 150);
    }

    function animate() {
        ctx.fillStyle = 'rgba(15, 25, 18, 0.1)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        drawWaves();
        drawWaterBase();
        drops.forEach(drop => { drop.update(); drop.draw(); });
        bubbles.forEach(bubble => { bubble.update(); bubble.draw(); });
        requestAnimationFrame(animate);
    }

    animate();

    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('active');
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>

<?php include 'includes/footer.php'; ?>