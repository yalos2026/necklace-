<?php 
$pageTitle = 'Воздух — Коллекция | DARIA ROZENVASSER';
include 'includes/header.php'; 
?>

<style>
    :root {
        --air: #c9d6e3;
        --air-glow: #e8edf5;
        --air-deep: #1a2535;
        --air-light: #f0f4fa;
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
        border-color: var(--air-glow);
    }

    /* === CANVAS АНИМАЦИЯ ВОЗДУХА === */
    #airCanvas {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        pointer-events: none;
        opacity: 0.95;
    }

    /* === НАВИГАЦИЯ === */
    header {
        position: fixed;
        top: 0;
        width: 100%;
        padding: 20px 5%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 100;
        background: linear-gradient(to bottom, rgba(10, 20, 16, 0.8), transparent);
        backdrop-filter: blur(12px);
    }

    .logo {
        font-family: var(--font-serif);
        font-size: 16px;
        letter-spacing: 3px;
        text-transform: uppercase;
        text-decoration: none;
        color: var(--text-light);
    }

    nav {
        display: flex;
        gap: 15px;
    }

    nav a {
        font-family: var(--font-serif);
        font-size: 15px;
        letter-spacing: 2px;
        text-transform: uppercase;
        text-decoration: none;
        color: var(--text-light);
        opacity: 0.8;
        transition: opacity 0.3s, color 0.3s;
    }

    nav a:hover {
        opacity: 1;
        color: var(--gold);
    }

    /* === HERO С ФОТО И ПОЛУПРОЗРАЧНОЙ КАРТОЧКОЙ === */
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
        background-image: url('images/3177a542-b5de-46c4-876b-cca8700c1ba2.jpg');
        background-size: 55% auto;
        background-position: center;
        background-repeat: no-repeat;
    }

    .collection-hero-content {
        position: relative;
        z-index: 2;
        max-width: 400px;
        padding: 40px 30px;
        background: linear-gradient(135deg, rgba(201, 214, 227, 0.25) 0%, rgba(26, 37, 53, 0.4) 100%);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(232, 237, 245, 0.4);
        border-radius: 20px;
        box-shadow:
            0 20px 60px rgba(184, 197, 214, 0.25),
            inset 0 0 30px rgba(232, 237, 245, 0.1);
    }

    .collection-label {
        font-size: 12px;
        letter-spacing: 0.5em;
        text-transform: uppercase;
        color: var(--air-glow);
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
        background: var(--air-glow);
    }

    .collection-title {
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 900;
        color: var(--cream);
        margin-bottom: 15px;
        line-height: 1;
        text-shadow:
            0 0 40px rgba(184, 197, 214, 0.5),
            0 0 80px rgba(232, 237, 245, 0.3);
    }

    .collection-subtitle {
        font-family: var(--font-display);
        font-size: 18px;
        font-style: italic;
        color: var(--air-glow);
        margin-bottom: 20px;
    }

    .collection-description {
        font-size: 14px;
        color: var(--cream);
        opacity: 0.95;
        max-width: 380px;
        margin: 0 auto;
        line-height: 1.7;
    }

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
        border: 1px solid rgba(201, 214, 227, 0.25);
        background: linear-gradient(135deg, #1a2535 0%, #0f1820 100%);
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
        border-color: var(--air-glow);
        box-shadow: 0 25px 60px rgba(184, 197, 214, 0.3);
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
        border: 1px dashed rgba(232, 237, 245, 0.3);
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
        color: var(--air-glow);
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

    footer {
        padding: 60px 6% 40px;
        text-align: center;
        border-top: 1px solid rgba(212, 175, 55, 0.15);
        background: var(--forest-deep);
        position: relative;
        z-index: 2;
    }

    .footer-logo {
        font-family: var(--font-serif);
        font-size: 20px;
        letter-spacing: 0.3em;
        color: var(--gold);
        margin-bottom: 15px;
    }

    .footer-text {
        color: var(--text);
        opacity: 0.5;
        font-size: 11px;
        letter-spacing: 0.2em;
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

    @media (max-width: 768px) {
        .collection-hero-content {
            padding: 35px 25px;
            max-width: 90%;
        }

        .collection-title {
            font-size: clamp(32px, 8vw, 48px);
        }

        .collection-subtitle {
            font-size: 17px;
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

        header {
            padding: 15px 4%;
        }

        .logo {
            font-size: 13px;
            letter-spacing: 2px;
        }

        nav {
            gap: 10px;
        }

        nav a {
            font-size: 9px;
            letter-spacing: 1px;
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

<canvas id="airCanvas"></canvas>

<section class="collection-hero">
    <div class="collection-hero-content">
        <div class="collection-label" data-i18n="air_collection_label">Коллекция</div>
        <h1 class="collection-title" data-i18n="air_collection_title">Воздух</h1>
        <p class="collection-subtitle" data-i18n="air_collection_subtitle">Лёгкость, свобода, мечты</p>
        <p class="collection-description" data-i18n="air_collection_description">
            Украшения, рождённые из ветра и звёздного света. Жемчуг, горный хрусталь,
            перламутр — каждый артефакт хранит в себе дыхание небес и шёпот крыльев.
        </p>
    </div>
</section>

<div class="collection-grid">
    <a href="product.php?id=phoenix-feather" class="jewelry-card reveal">
        <div class="orbit"></div>
        <div class="jewelry-photo">
            <img src="images/photo_2026-06-07_10-39-00.jpg" alt="Перо Феникса">
        </div>
        <div class="jewelry-content">
            <div class="jewelry-type" data-i18n="air_jewelry_type">Колье</div>
            <h3 class="jewelry-name" data-i18n="air_product_1_name">Перо Феникса</h3>
            <div class="jewelry-cta" data-i18n="air_jewelry_cta">узнать больше</div>
        </div>
    </a>

    <a href="product.php?id=stardust" class="jewelry-card reveal">
        <div class="orbit"></div>
        <div class="jewelry-photo">
            <img src="images/photo_2026-06-07_10-38-41.jpg" alt="Звёздная Пыль">
        </div>
        <div class="jewelry-content">
            <div class="jewelry-type" data-i18n="air_jewelry_type">Колье</div>
            <h3 class="jewelry-name" data-i18n="air_product_2_name">Звёздная Пыль</h3>
            <div class="jewelry-cta" data-i18n="air_jewelry_cta">узнать больше</div>
        </div>
    </a>

<a href="product.php?id=breath-of-spring" class="jewelry-card reveal">
        <div class="orbit"></div>
        <div class="jewelry-photo">
            <img src="images/photo_2026-06-07_10-38-31.jpg" alt="Дыхание Весны">
        </div>
        <div class="jewelry-content">
            <div class="jewelry-type" data-i18n="air_jewelry_type">Колье</div>
            <h3 class="jewelry-name" data-i18n="air_product_3_name">Дыхание Весны</h3>
            <div class="jewelry-cta" data-i18n="air_jewelry_cta">узнать больше</div>
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

    const canvas = document.getElementById('airCanvas');
    const ctx = canvas.getContext('2d');

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const particles = [];
    const feathers = [];
    const particleCount = 150;
    const featherCount = 25;

    class Particle {
        constructor() { this.reset(); this.y = Math.random() * canvas.height; }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2.5 + 0.5;
            this.speedX = (Math.random() - 0.5) * 0.4;
            this.speedY = (Math.random() - 0.5) * 0.3;
            this.wobble = Math.random() * Math.PI * 2;
            this.wobbleSpeed = Math.random() * 0.02 + 0.005;
            this.life = 1;
            this.decay = Math.random() * 0.001 + 0.0005;
            const colors = [
                { r: 232, g: 237, b: 245 },
                { r: 240, g: 244, b: 250 },
                { r: 255, g: 255, b: 255 },
                { r: 201, g: 214, b: 227 }
            ];
            this.color = colors[Math.floor(Math.random() * colors.length)];
        }
        update() {
            this.wobble += this.wobbleSpeed;
            this.x += this.speedX + Math.sin(this.wobble) * 0.3;
            this.y += this.speedY + Math.cos(this.wobble * 0.7) * 0.2;
            this.life -= this.decay;
            if (this.x < -10) this.x = canvas.width + 10;
            if (this.x > canvas.width + 10) this.x = -10;
            if (this.y < -10) this.y = canvas.height + 10;
            if (this.y > canvas.height + 10) this.y = -10;
            if (this.life <= 0) { this.reset(); this.life = 1; }
        }
        draw() {
            ctx.save();
            ctx.globalAlpha = this.life * 0.7;
            ctx.shadowBlur = 12;
            ctx.shadowColor = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.6)`;
            ctx.fillStyle = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.9)`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.globalAlpha = this.life * 0.9;
            ctx.fillStyle = 'rgba(255, 255, 255, 0.95)';
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size * 0.4, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }
    }

    class Feather {
        constructor() { this.reset(); this.y = Math.random() * canvas.height; }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = -50;
            this.size = Math.random() * 15 + 10;
            this.speedX = Math.random() * 0.8 + 0.3;
            this.speedY = Math.random() * 0.5 + 0.2;
            this.rotation = Math.random() * Math.PI * 2;
            this.rotationSpeed = (Math.random() - 0.5) * 0.02;
            this.wobble = Math.random() * Math.PI * 2;
            this.wobbleSpeed = Math.random() * 0.015 + 0.008;
            this.life = 1;
            this.decay = Math.random() * 0.001 + 0.0008;
            const colors = [
                { r: 240, g: 244, b: 250 },
                { r: 232, g: 237, b: 245 },
                { r: 220, g: 230, b: 240 }
            ];
            this.color = colors[Math.floor(Math.random() * colors.length)];
        }
        update() {
            this.wobble += this.wobbleSpeed;
            this.x += this.speedX + Math.sin(this.wobble) * 0.8;
            this.y += this.speedY + Math.cos(this.wobble * 0.5) * 0.3;
            this.rotation += this.rotationSpeed;
            this.life -= this.decay;
            if (this.life <= 0 || this.x > canvas.width + 50 || this.y > canvas.height + 50) this.reset();
        }
        draw() {
            ctx.save();
            ctx.translate(this.x, this.y);
            ctx.rotate(this.rotation);
            ctx.globalAlpha = this.life * 0.5;
            ctx.fillStyle = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.7)`;
            ctx.shadowBlur = 8;
            ctx.shadowColor = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.4)`;
            ctx.beginPath();
            ctx.ellipse(0, 0, this.size * 0.3, this.size, 0, 0, Math.PI * 2);
            ctx.fill();
            ctx.strokeStyle = `rgba(255, 255, 255, 0.6)`;
            ctx.lineWidth = 0.5;
            ctx.beginPath();
            ctx.moveTo(0, -this.size);
            ctx.lineTo(0, this.size);
            ctx.stroke();
            ctx.restore();
        }
    }

    for (let i = 0; i < particleCount; i++) particles.push(new Particle());
    for (let i = 0; i < featherCount; i++) feathers.push(new Feather());

    function drawAmbientGlow() {
        const gradient = ctx.createRadialGradient(
            canvas.width * 0.3, canvas.height * 0.4, 0,
            canvas.width * 0.3, canvas.height * 0.4, canvas.width * 0.6
        );
        gradient.addColorStop(0, 'rgba(232, 237, 245, 0.08)');
        gradient.addColorStop(1, 'rgba(232, 237, 245, 0)');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        const gradient2 = ctx.createRadialGradient(
            canvas.width * 0.7, canvas.height * 0.7, 0,
            canvas.width * 0.7, canvas.height * 0.7, canvas.width * 0.5
        );
        gradient2.addColorStop(0, 'rgba(201, 214, 227, 0.06)');
        gradient2.addColorStop(1, 'rgba(201, 214, 227, 0)');
        ctx.fillStyle = gradient2;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }

    function animate() {
        ctx.fillStyle = 'rgba(15, 25, 18, 0.08)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        drawAmbientGlow();
        feathers.forEach(feather => { feather.update(); feather.draw(); });
        particles.forEach(particle => { particle.update(); particle.draw(); });
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