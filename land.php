<?php 
$pageTitle = 'Земля — Коллекция | DARIA ROZENVASSER';
include 'includes/header.php'; 
?>

<style>
    :root {
        --earth: #6b8e23;
        --earth-glow: #9cbd54;
        --earth-deep: #2a3a15;
        --earth-brown: #8b6f47;
        --earth-gold: #b8963e;
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
        border-color: var(--earth-glow);
    }

    #earthCanvas {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        pointer-events: none;
        opacity: 1;
    }

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
        background-image: url('images/61f1ae16-b18e-44a1-9ad9-97ee31e643ea.jpg');
        background-size: 55% auto;
        background-position: center;
        background-repeat: no-repeat;
    }

    .collection-hero-content {
        position: relative;
        z-index: 2;
        max-width: 400px;
        padding: 40px 30px;
        background: linear-gradient(135deg, rgba(107, 142, 35, 0.25) 0%, rgba(42, 58, 21, 0.4) 100%);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(156, 189, 84, 0.4);
        border-radius: 20px;
        box-shadow:
            0 20px 60px rgba(107, 142, 35, 0.3),
            inset 0 0 30px rgba(156, 189, 84, 0.1);
    }

    .collection-label {
        font-size: 12px;
        letter-spacing: 0.5em;
        text-transform: uppercase;
        color: var(--earth-glow);
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
        background: var(--earth-glow);
    }

    .collection-title {
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 900;
        color: var(--cream);
        margin-bottom: 15px;
        line-height: 1;
        text-shadow:
            0 0 40px rgba(107, 142, 35, 0.6),
            0 0 80px rgba(156, 189, 84, 0.4);
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
        border: 1px solid rgba(107, 142, 35, 0.3);
        background: linear-gradient(135deg, #1a2810 0%, #0f1908 100%);
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
        border-color: var(--earth-glow);
        box-shadow: 0 25px 60px rgba(107, 142, 35, 0.5);
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
        border: 1px dashed rgba(156, 189, 84, 0.4);
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
        color: var(--earth-glow);
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

<canvas id="earthCanvas"></canvas>

<section class="collection-hero">
    <div class="collection-hero-content">
        <div class="collection-label" data-i18n="earth_collection_label">Коллекция</div>
        <h1 class="collection-title" data-i18n="earth_collection_title">Земля</h1>
        <p class="collection-description" data-i18n="earth_collection_description">
            Украшения, рождённые из почвы и корней древних деревьев. Агат, янтарь,
            виноградная лоза — каждый артефакт хранит в себе силу земли и дыхание леса.
        </p>
    </div>
</section>

<div class="collection-grid">
    <a href="product.php?id=tree-roots" class="jewelry-card reveal">
        <div class="orbit"></div>
        <div class="jewelry-photo">
            <img src="images/photo_2026-06-07_10-37-58.jpg" alt="Корни Древа">
        </div>
        <div class="jewelry-content">
            <div class="jewelry-type" data-i18n="earth_jewelry_type">Колье</div>
            <h3 class="jewelry-name" data-i18n="earth_product_1_name">Корни Древа</h3>
            <div class="jewelry-cta" data-i18n="earth_jewelry_cta">узнать больше</div>
        </div>
    </a>

    <a href="product.php?id=omni-sprouts" class="jewelry-card reveal">
        <div class="orbit"></div>
        <div class="jewelry-photo">
            <img src="images/photo_2026-06-08_15-47-21.jpg" alt="Побеги Омни">
        </div>
        <div class="jewelry-content">
            <div class="jewelry-type" data-i18n="earth_jewelry_type">Колье</div>
            <h3 class="jewelry-name" data-i18n="earth_product_2_name">Побеги Омни</h3>
            <div class="jewelry-cta" data-i18n="earth_jewelry_cta">узнать больше</div>
        </div>
    </a>

    <a href="product.php?id=lilac-rose" class="jewelry-card reveal">
        <div class="orbit"></div>
        <div class="jewelry-photo">
            <img src="images/photo_2026-06-07_10-38-51.jpg" alt="Сиреневая Роза">
        </div>
        <div class="jewelry-content">
            <div class="jewelry-type" data-i18n="earth_jewelry_type">Колье</div>
            <h3 class="jewelry-name" data-i18n="earth_product_3_name">Сиреневая Роза</h3>
            <div class="jewelry-cta" data-i18n="earth_jewelry_cta">узнать больше</div>
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

    const canvas = document.getElementById('earthCanvas');
    const ctx = canvas.getContext('2d');

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const leaves = [];
    const spores = [];
    const vines = [];
    const leafCount = 25;
    const sporeCount = 100;
    const vineCount = 8;

    class Leaf {
        constructor() { this.reset(); this.y = Math.random() * canvas.height; }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = -50;
            this.size = Math.random() * 15 + 10;
            this.speedX = (Math.random() - 0.5) * 1;
            this.speedY = Math.random() * 1.5 + 0.5;
            this.rotation = Math.random() * Math.PI * 2;
            this.rotationSpeed = (Math.random() - 0.5) * 0.03;
            this.wobble = Math.random() * Math.PI * 2;
            this.wobbleSpeed = Math.random() * 0.02 + 0.01;
            this.life = 1;
            this.decay = Math.random() * 0.001 + 0.0005;
            const colors = [
                { r: 107, g: 142, b: 35 },
                { r: 139, g: 111, b: 71 },
                { r: 184, g: 150, b: 62 },
                { r: 156, g: 189, b: 84 },
                { r: 160, g: 82, b: 45 }
            ];
            this.color = colors[Math.floor(Math.random() * colors.length)];
            this.type = Math.floor(Math.random() * 3);
        }
        update() {
            this.wobble += this.wobbleSpeed;
            this.x += this.speedX + Math.sin(this.wobble) * 0.8;
            this.y += this.speedY;
            this.rotation += this.rotationSpeed;
            this.life -= this.decay;
            if (this.life <= 0 || this.y > canvas.height + 50) this.reset();
        }
        draw() {
            ctx.save();
            ctx.translate(this.x, this.y);
            ctx.rotate(this.rotation);
            ctx.globalAlpha = this.life * 0.7;
            ctx.fillStyle = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.8)`;
            ctx.shadowBlur = 8;
            ctx.shadowColor = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.5)`;
            ctx.beginPath();
            if (this.type === 0) {
                ctx.ellipse(0, 0, this.size * 0.4, this.size, 0, 0, Math.PI * 2);
            } else if (this.type === 1) {
                ctx.moveTo(0, -this.size);
                ctx.lineTo(this.size * 0.5, -this.size * 0.3);
                ctx.lineTo(this.size * 0.7, 0);
                ctx.lineTo(this.size * 0.3, this.size * 0.5);
                ctx.lineTo(0, this.size);
                ctx.lineTo(-this.size * 0.3, this.size * 0.5);
                ctx.lineTo(-this.size * 0.7, 0);
                ctx.lineTo(-this.size * 0.5, -this.size * 0.3);
                ctx.closePath();
            } else {
                ctx.moveTo(0, this.size * 0.8);
                ctx.bezierCurveTo(-this.size * 0.8, this.size * 0.3, -this.size * 0.6, -this.size * 0.5, 0, -this.size * 0.3);
                ctx.bezierCurveTo(this.size * 0.6, -this.size * 0.5, this.size * 0.8, this.size * 0.3, 0, this.size * 0.8);
            }
            ctx.fill();
            ctx.strokeStyle = `rgba(255, 255, 255, 0.3)`;
            ctx.lineWidth = 0.5;
            ctx.beginPath();
            ctx.moveTo(0, -this.size * 0.8);
            ctx.lineTo(0, this.size * 0.8);
            ctx.stroke();
            ctx.restore();
        }
    }

    class Spore {
        constructor() { this.reset(); this.y = Math.random() * canvas.height; }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2 + 0.5;
            this.speedX = (Math.random() - 0.5) * 0.3;
            this.speedY = (Math.random() - 0.5) * 0.2;
            this.wobble = Math.random() * Math.PI * 2;
            this.wobbleSpeed = Math.random() * 0.02 + 0.008;
            this.life = 1;
            this.decay = Math.random() * 0.002 + 0.001;
            const colors = [
                { r: 156, g: 189, b: 84 },
                { r: 212, g: 175, b: 55 },
                { r: 184, g: 150, b: 62 }
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
            ctx.globalAlpha = this.life * 0.8;
            ctx.fillStyle = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.9)`;
            ctx.shadowBlur = 10;
            ctx.shadowColor = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.6)`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }
    }

    class Vine {
        constructor() { this.reset(); }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = canvas.height;
            this.length = 0;
            this.maxLength = Math.random() * 300 + 200;
            this.speed = Math.random() * 0.5 + 0.2;
            this.angle = -Math.PI / 2 + (Math.random() - 0.5) * 0.5;
            this.curve = (Math.random() - 0.5) * 0.02;
            this.life = 1;
            this.decay = 0.0005;
            this.points = [{ x: this.x, y: this.y }];
        }
        update() {
            if (this.length < this.maxLength) {
                this.length += this.speed;
                this.angle += this.curve + Math.sin(this.length * 0.01) * 0.01;
                const lastPoint = this.points[this.points.length - 1];
                this.points.push({
                    x: lastPoint.x + Math.cos(this.angle) * this.speed,
                    y: lastPoint.y + Math.sin(this.angle) * this.speed
                });
            }
            this.life -= this.decay;
            if (this.life <= 0) this.reset();
        }
        draw() {
            if (this.points.length < 2) return;
            ctx.save();
            ctx.globalAlpha = this.life * 0.4;
            ctx.strokeStyle = 'rgba(107, 142, 35, 0.6)';
            ctx.lineWidth = 2;
            ctx.shadowBlur = 5;
            ctx.shadowColor = 'rgba(107, 142, 35, 0.4)';
            ctx.beginPath();
            ctx.moveTo(this.points[0].x, this.points[0].y);
            for (let i = 1; i < this.points.length; i++) {
                ctx.lineTo(this.points[i].x, this.points[i].y);
            }
            ctx.stroke();
            ctx.fillStyle = 'rgba(156, 189, 84, 0.7)';
            for (let i = 0; i < this.points.length; i += 20) {
                const point = this.points[i];
                ctx.beginPath();
                ctx.arc(point.x, point.y, 3, 0, Math.PI * 2);
                ctx.fill();
            }
            ctx.restore();
        }
    }

    for (let i = 0; i < leafCount; i++) leaves.push(new Leaf());
    for (let i = 0; i < sporeCount; i++) spores.push(new Spore());
    for (let i = 0; i < vineCount; i++) vines.push(new Vine());

    function drawMist() {
        const gradient = ctx.createLinearGradient(0, canvas.height - 200, 0, canvas.height);
        gradient.addColorStop(0, 'rgba(107, 142, 35, 0)');
        gradient.addColorStop(0.5, 'rgba(107, 142, 35, 0.1)');
        gradient.addColorStop(1, 'rgba(42, 58, 21, 0.3)');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, canvas.height - 200, canvas.width, 200);
    }

    function animate() {
        ctx.fillStyle = 'rgba(15, 25, 18, 0.1)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        drawMist();
        vines.forEach(vine => { vine.update(); vine.draw(); });
        leaves.forEach(leaf => { leaf.update(); leaf.draw(); });
        spores.forEach(spore => { spore.update(); spore.draw(); });
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