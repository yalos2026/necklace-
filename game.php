<?php 
$pageTitle = 'Котик-Ювелир — Зачарованный Лес | DARIA ROZENVASSER';
include 'includes/header.php'; 
?>

<style>
    .game-container {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        padding: 130px 20px 80px;
        position: relative;
        z-index: 10;
    }

    h1 {
        font-family: var(--font-serif);
        font-size: 3em;
        color: var(--gold);
        margin-bottom: 10px;
        letter-spacing: 3px;
        text-shadow: 
            0 0 20px rgba(212, 175, 55, 0.5),
            0 0 40px rgba(212, 175, 55, 0.3);
        animation: titleGlow 3s ease-in-out infinite;
    }

    @keyframes titleGlow {
        0%, 100% { text-shadow: 0 0 20px rgba(212, 175, 55, 0.5), 0 0 40px rgba(212, 175, 55, 0.3); }
        50% { text-shadow: 0 0 30px rgba(212, 175, 55, 0.8), 0 0 60px rgba(212, 175, 55, 0.5); }
    }

    .subtitle {
        font-size: 1.3em;
        color: var(--gold-light);
        margin-bottom: 30px;
        font-style: italic;
        letter-spacing: 1px;
    }

    .canvas-wrapper {
        position: relative;
        display: inline-block;
        margin: 20px 0;
    }

    #gameCanvas {
        border: 2px solid rgba(212, 175, 55, 0.4);
        border-radius: 20px;
        box-shadow: 
            0 0 40px rgba(212, 175, 55, 0.2),
            0 0 80px rgba(212, 175, 55, 0.1),
            inset 0 0 40px rgba(0, 0, 0, 0.5);
        background: #050a08;
        max-width: 100%;
        touch-action: none;
        display: block;
    }

    .stats {
        display: flex;
        justify-content: space-around;
        margin-top: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .stat-box {
        background: linear-gradient(135deg, rgba(212, 175, 55, 0.08) 0%, rgba(212, 175, 55, 0.02) 100%);
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: 15px;
        padding: 18px 30px;
        min-width: 180px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        transition: all 0.3s;
    }

    .stat-box:hover {
        border-color: rgba(212, 175, 55, 0.6);
        box-shadow: 0 4px 30px rgba(212, 175, 55, 0.2);
        transform: translateY(-3px);
    }

    .stat-label {
        font-size: 0.95em;
        color: var(--gold-light);
        margin-bottom: 8px;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-family: var(--font-serif);
        font-size: 0.75em;
    }

    .stat-value {
        font-size: 2.2em;
        font-weight: 900;
        color: var(--gold);
        font-family: var(--font-serif);
        text-shadow: 0 0 20px rgba(212, 175, 55, 0.5);
    }

    .controls {
        margin-top: 20px;
        font-size: 1em;
        color: #888;
        font-style: italic;
        letter-spacing: 1px;
    }

    /* === МОДАЛЬНОЕ ОКНО === */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(10px);
        animation: fadeIn 0.5s;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .modal.active {
        display: flex;
    }

    .modal-content {
        background: linear-gradient(135deg, #1a2820 0%, #0a1410 100%);
        border: 2px solid rgba(212, 175, 55, 0.5);
        border-radius: 25px;
        padding: 45px;
        max-width: 550px;
        width: 90%;
        text-align: center;
        box-shadow: 
            0 0 80px rgba(212, 175, 55, 0.4),
            0 0 120px rgba(212, 175, 55, 0.2),
            inset 0 0 60px rgba(212, 175, 55, 0.05);
        animation: modalAppear 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
    }

    @keyframes modalAppear {
        from { transform: scale(0.5); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .modal-content::before {
        content: '';
        position: absolute;
        inset: -50%;
        background: conic-gradient(from 0deg, transparent, rgba(212, 175, 55, 0.1), transparent, rgba(212, 175, 55, 0.1), transparent);
        animation: rotate 8s linear infinite;
        z-index: 0;
    }

    @keyframes rotate {
        to { transform: rotate(360deg); }
    }

    .modal-content > * {
        position: relative;
        z-index: 1;
    }

    .modal-content h2 {
        font-family: var(--font-serif);
        color: var(--gold);
        font-size: 2.2em;
        margin-bottom: 25px;
        letter-spacing: 3px;
        text-shadow: 0 0 30px rgba(212, 175, 55, 0.6);
    }

    .jewelry-photo {
        width: 320px;
        height: 320px;
        border-radius: 50%;
        border: 3px solid var(--gold);
        margin: 25px auto;
        background: #0a1410;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: 
            0 0 40px rgba(212, 175, 55, 0.5),
            0 0 80px rgba(212, 175, 55, 0.3),
            inset 0 0 30px rgba(0, 0, 0, 0.5);
        position: relative;
        animation: photoGlow 3s ease-in-out infinite;
    }

    @keyframes photoGlow {
        0%, 100% { box-shadow: 0 0 40px rgba(212, 175, 55, 0.5), 0 0 80px rgba(212, 175, 55, 0.3); }
        50% { box-shadow: 0 0 60px rgba(212, 175, 55, 0.8), 0 0 120px rgba(212, 175, 55, 0.5); }
    }

    .jewelry-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .jewelry-photo img:hover {
        transform: scale(1.1);
    }

    .jewelry-name {
        font-family: var(--font-serif);
        font-size: 1.6em;
        color: var(--gold);
        margin: 20px 0 10px;
        font-weight: 600;
        letter-spacing: 2px;
        text-shadow: 0 0 15px rgba(212, 175, 55, 0.4);
    }

    .reward-text {
        font-size: 1.2em;
        color: var(--gold-light);
        margin: 15px 0 25px;
        font-style: italic;
        line-height: 1.6;
    }

    .btn {
        background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
        color: var(--forest-dark);
        border: none;
        padding: 16px 45px;
        font-size: 1.1em;
        font-weight: 700;
        font-family: var(--font-serif);
        letter-spacing: 3px;
        text-transform: uppercase;
        border-radius: 50px;
        cursor: pointer;
        margin: 10px;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 20px rgba(212, 175, 55, 0.3);
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 40px rgba(212, 175, 55, 0.6);
        letter-spacing: 4px;
    }

    .btn-secondary {
        background: transparent;
        color: var(--gold);
        border: 2px solid var(--gold);
        box-shadow: none;
    }

    .btn-secondary:hover {
        background: rgba(212, 175, 55, 0.1);
        box-shadow: 0 0 30px rgba(212, 175, 55, 0.3);
    }

    /* === ПРОГРЕСС-БАРЫ === */
    .element-progress {
        display: flex;
        justify-content: space-around;
        margin-top: 25px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .element-bar {
        flex: 1;
        min-width: 130px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
        padding: 12px;
        border: 1px solid;
        backdrop-filter: blur(10px);
        transition: all 0.3s;
    }

    .element-bar:hover {
        transform: translateY(-2px);
    }

    .element-bar.fire { border-color: rgba(217, 74, 38, 0.4); box-shadow: 0 0 20px rgba(217, 74, 38, 0.1); }
    .element-bar.water { border-color: rgba(42, 110, 168, 0.4); box-shadow: 0 0 20px rgba(42, 110, 168, 0.1); }
    .element-bar.earth { border-color: rgba(107, 142, 35, 0.4); box-shadow: 0 0 20px rgba(107, 142, 35, 0.1); }
    .element-bar.air { border-color: rgba(201, 214, 227, 0.4); box-shadow: 0 0 20px rgba(201, 214, 227, 0.1); }

    .element-name {
        font-family: var(--font-serif);
        font-size: 0.9em;
        margin-bottom: 8px;
        letter-spacing: 2px;
    }

    .progress-container {
        height: 10px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 10px;
        overflow: hidden;
        position: relative;
    }

    .progress-fill {
        height: 100%;
        border-radius: 10px;
        transition: width 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        box-shadow: 0 0 10px currentColor;
    }

    .progress-fill::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    @media (max-width: 600px) {
        h1 { font-size: 2em; }
        .stat-box { min-width: 130px; padding: 12px 18px; }
        .stat-value { font-size: 1.6em; }
        .jewelry-photo { width: 250px; height: 250px; }
        .modal-content { padding: 30px 20px; }
        .modal-content h2 { font-size: 1.6em; }
        .jewelry-name { font-size: 1.2em; }
        .btn { padding: 12px 25px; font-size: 0.9em; }
    }
</style>

<div class="game-container">
    <h1 data-i18n="game_title">✨ Котик-Ювелир ✨</h1>
    <p class="subtitle" data-i18n="game_subtitle">Помоги котику собрать магию стихий и создать волшебное украшение!</p>
    
    <div class="canvas-wrapper">
        <canvas id="gameCanvas" width="800" height="600"></canvas>
    </div>
    
    <div class="stats">
        <div class="stat-box">
            <div class="stat-label" data-i18n="game_score_label">Собрано магии</div>
            <div class="stat-value" id="score">0</div>
        </div>
        <div class="stat-box">
            <div class="stat-label" data-i18n="game_jewelry_label">Украшений создано</div>
            <div class="stat-value" id="jewelry">0</div>
        </div>
    </div>

    <div class="element-progress">
        <div class="element-bar fire">
            <div class="element-name" style="color: #ff8845;" data-i18n="game_fire">🔥 Огонь</div>
            <div class="progress-container">
                <div class="progress-fill" id="fireProgress" style="width: 0%; background: linear-gradient(90deg, #d94a26, #ff8845); color: #ff8845;"></div>
            </div>
        </div>
        <div class="element-bar water">
            <div class="element-name" style="color: #5fb3e8;" data-i18n="game_water">💧 Вода</div>
            <div class="progress-container">
                <div class="progress-fill" id="waterProgress" style="width: 0%; background: linear-gradient(90deg, #2a6ea8, #5fb3e8); color: #5fb3e8;"></div>
            </div>
        </div>
        <div class="element-bar earth">
            <div class="element-name" style="color: #9cbd54;" data-i18n="game_earth">🌿 Земля</div>
            <div class="progress-container">
                <div class="progress-fill" id="earthProgress" style="width: 0%; background: linear-gradient(90deg, #6b8e23, #9cbd54); color: #9cbd54;"></div>
            </div>
        </div>
        <div class="element-bar air">
            <div class="element-name" style="color: #e8edf5;" data-i18n="game_air">💨 Воздух</div>
            <div class="progress-container">
                <div class="progress-fill" id="airProgress" style="width: 0%; background: linear-gradient(90deg, #b8c5d6, #e8edf5); color: #e8edf5;"></div>
            </div>
        </div>
    </div>

    <div class="controls" data-i18n="game_controls">
        ✦ Управление: стрелки или WASD ✦ На мобильном: касание экрана ✦
    </div>
</div>

<!-- Модальное окно с наградой -->
<div class="modal" id="rewardModal">
    <div class="modal-content">
        <h2 data-i18n="game_modal_title">✨ Украшение создано! ✨</h2>
        <div class="jewelry-photo" id="jewelryPhoto">✨</div>
        <div class="jewelry-name" id="jewelryName">Колье "Сиреневая Роза"</div>
        <p class="reward-text" id="rewardText" data-i18n="game_reward_text">
            Котик создал волшебное украшение из стихий!
        </p>
        <a href="#" class="btn" id="viewJewelryBtn" data-i18n="game_btn_want">Хочу такое же!</a>
        <button class="btn btn-secondary" onclick="closeModal()" data-i18n="game_btn_continue">Продолжить игру</button>
    </div>
</div>

<script>
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');

    // === ИГРОВЫЕ ПЕРЕМЕННЫЕ ===
    let score = 0;
    let jewelryCount = 0;
    let elements = { fire: 0, water: 0, earth: 0, air: 0 };
    let time = 0;

    // === КОЛЛЕКЦИЯ УКРАШЕНИЙ (с переводами) ===
    const jewelryCollection = {
        ru: [
            { name: 'Колье "Сиреневая Роза"', image: 'images/photo_2026-06-07_10-38-51.jpg', page: 'land.php', description: 'Камень, в котором застыла душа цветка' },
            { name: 'Колье "Побеги Омни"', image: 'images/photo_2026-06-07_10-38-35.jpg', page: 'land.php', description: 'Виноградная лоза, сплетённая из бисера' },
            { name: 'Подвеска "Корни Древа"', image: 'images/photo_2026-06-07_10-38-49.jpg', page: 'land.php', description: 'Там, где корни уходят в вечность' },
            { name: 'Колье "Танец Саламандры"', image: 'images/photo_2026-06-08_15-47-34.jpg', page: 'fire.php', description: 'Там, где пламя танцует, рождается магия' },
            { name: 'Колье "Пепел Феникса"', image: 'images/photo_2026-06-08_15-47-34.jpg', page: 'fire.php', description: 'Возрождение из пепла — высшая форма силы' },
            { name: 'Колье "Слёзы Русалки"', image: 'images/photo_2026-06-08_15-47-14.jpg', page: 'aqua.php', description: 'Капля, упавшая с ресниц морской девы' },
            { name: 'Колье "Лунный Прилив"', image: 'images/photo_2026-06-07_10-39-02.jpg', page: 'aqua.php', description: 'Свет луны, застывший в лунном камне' },
            { name: 'Колье "Жемчужина Глубин"', image: 'images/photo_2026-06-07_10-38-58.jpg', page: 'aqua.php', description: 'Там, где молчит океан, рождается жемчуг' },
            { name: 'Серьги "Перо Феникса"', image: 'images/photo_2026-06-08_15-47-34.jpg', page: 'air.php', description: 'То, что коснулось пламени и стало светом' },
            { name: 'Колье "Звёздная Пыль"', image: 'images/photo_2026-06-08_15-47-34.jpg', page: 'air.php', description: 'Осколки далёких миров, собранные в ожерелье' }
        ],
        en: [
            { name: 'Necklace "Lilac Rose"', image: 'images/photo_2026-06-07_10-38-51.jpg', page: 'land.php', description: 'A stone in which the soul of a flower has frozen' },
            { name: 'Necklace "Omni Sprouts"', image: 'images/photo_2026-06-07_10-38-35.jpg', page: 'land.php', description: 'A grapevine woven from beads' },
            { name: 'Pendant "Roots of the Tree"', image: 'images/photo_2026-06-07_10-38-49.jpg', page: 'land.php', description: 'Where the roots go into eternity' },
            { name: 'Necklace "Salamander\'s Dance"', image: 'images/photo_2026-06-08_15-47-34.jpg', page: 'fire.php', description: 'Where the flame dances, magic is born' },
            { name: 'Necklace "Phoenix Ash"', image: 'images/photo_2026-06-08_15-47-34.jpg', page: 'fire.php', description: 'Rebirth from ashes is the highest form of power' },
            { name: 'Necklace "Mermaid\'s Tears"', image: 'images/photo_2026-06-08_15-47-14.jpg', page: 'aqua.php', description: 'A drop that fell from the eyelashes of a mermaid' },
            { name: 'Necklace "Moon Tide"', image: 'images/photo_2026-06-07_10-39-02.jpg', page: 'aqua.php', description: 'Moonlight frozen in moonstone' },
            { name: 'Necklace "Pearl of the Depths"', image: 'images/photo_2026-06-07_10-38-58.jpg', page: 'aqua.php', description: 'Where the ocean is silent, pearls are born' },
            { name: 'Earrings "Phoenix Feather"', image: 'images/photo_2026-06-08_15-47-34.jpg', page: 'air.php', description: 'What touched the flame and became light' },
            { name: 'Necklace "Stardust"', image: 'images/photo_2026-06-08_15-47-34.jpg', page: 'air.php', description: 'Fragments of distant worlds collected in a necklace' }
        ]
    };

    // === КОТИК (нарисованный) ===
    const cat = {
        x: canvas.width / 2,
        y: canvas.height / 2,
        size: 35,
        speed: 5,
        dx: 0,
        dy: 0,
        tailAngle: 0,
        blinkTimer: 0,
        isBlinking: false
    };

    // === ЭФФЕКТЫ ===
    let particles = [];
    let sparkles = [];
    let fireflies = [];
    let stars = [];
    let trails = [];

    // Звёзды на фоне
    for (let i = 0; i < 80; i++) {
        stars.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            size: Math.random() * 1.5 + 0.3,
            twinkle: Math.random() * Math.PI * 2,
            speed: Math.random() * 0.02 + 0.01
        });
    }

    // Светлячки
    for (let i = 0; i < 15; i++) {
        fireflies.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            vx: (Math.random() - 0.5) * 0.5,
            vy: (Math.random() - 0.5) * 0.5,
            phase: Math.random() * Math.PI * 2,
            size: Math.random() * 2 + 1.5
        });
    }

    // Частицы стихий
    const particleTypes = [
        { type: 'fire', color: '#ff8845', glow: '#d94a26', symbol: '🔥' },
        { type: 'water', color: '#5fb3e8', glow: '#2a6ea8', symbol: '💧' },
        { type: 'earth', color: '#9cbd54', glow: '#6b8e23', symbol: '🌿' },
        { type: 'air', color: '#e8edf5', glow: '#b8c5d6', symbol: '💨' }
    ];

    // === УПРАВЛЕНИЕ ===
    const keys = {};
    let touchStartX = 0, touchStartY = 0;

    document.addEventListener('keydown', (e) => keys[e.key] = true);
    document.addEventListener('keyup', (e) => keys[e.key] = false);

    canvas.addEventListener('touchstart', (e) => {
        e.preventDefault();
        touchStartX = e.touches[0].clientX;
        touchStartY = e.touches[0].clientY;
    });

    canvas.addEventListener('touchmove', (e) => {
        e.preventDefault();
        const rect = canvas.getBoundingClientRect();
        const scaleX = canvas.width / rect.width;
        const scaleY = canvas.height / rect.height;
        const touchX = (e.touches[0].clientX - rect.left) * scaleX;
        const touchY = (e.touches[0].clientY - rect.top) * scaleY;
        
        const diffX = touchX - cat.x;
        const diffY = touchY - cat.y;
        const dist = Math.sqrt(diffX * diffX + diffY * diffY);
        
        if (dist > 5) {
            cat.dx = (diffX / dist) * cat.speed;
            cat.dy = (diffY / dist) * cat.speed;
        }
    });

    canvas.addEventListener('touchend', () => {
        cat.dx = 0;
        cat.dy = 0;
    });

    // === СОЗДАНИЕ ЧАСТИЦЫ ===
    function createParticle() {
        const type = particleTypes[Math.floor(Math.random() * particleTypes.length)];
        particles.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            size: 22 + Math.random() * 12,
            type: type,
            speedX: (Math.random() - 0.5) * 1.5,
            speedY: (Math.random() - 0.5) * 1.5,
            rotation: Math.random() * Math.PI * 2,
            rotSpeed: (Math.random() - 0.5) * 0.03,
            pulse: Math.random() * Math.PI * 2
        });
    }

    // === ВЗРЫВ ИСКР ПРИ СБОРЕ ===
    function createSparkles(x, y, color) {
        for (let i = 0; i < 15; i++) {
            const angle = (Math.PI * 2 * i) / 15 + Math.random() * 0.3;
            const speed = Math.random() * 4 + 2;
            sparkles.push({
                x: x,
                y: y,
                vx: Math.cos(angle) * speed,
                vy: Math.sin(angle) * speed,
                life: 1,
                decay: Math.random() * 0.02 + 0.02,
                color: color,
                size: Math.random() * 3 + 2
            });
        }
    }

    // === ФЕЙЕРВЕРК ПРИ СОЗДАНИИ УКРАШЕНИЯ ===
    function createFirework() {
        const colors = ['#d4af37', '#f4d47c', '#ff8845', '#5fb3e8', '#9cbd54', '#e8edf5'];
        for (let i = 0; i < 100; i++) {
            const angle = Math.random() * Math.PI * 2;
            const speed = Math.random() * 8 + 3;
            sparkles.push({
                x: canvas.width / 2,
                y: canvas.height / 2,
                vx: Math.cos(angle) * speed,
                vy: Math.sin(angle) * speed,
                life: 1,
                decay: Math.random() * 0.01 + 0.008,
                color: colors[Math.floor(Math.random() * colors.length)],
                size: Math.random() * 4 + 2
            });
        }
    }

    // === РИСОВАНИЕ КОТИКА ===
    function drawCat(x, y, size) {
        ctx.save();
        ctx.translate(x, y);
        
        // Магический круг вокруг котика
        const circleRadius = size * 2.5 + Math.sin(time * 0.05) * 5;
        ctx.save();
        ctx.rotate(time * 0.01);
        ctx.strokeStyle = 'rgba(212, 175, 55, 0.3)';
        ctx.lineWidth = 1.5;
        ctx.setLineDash([5, 5]);
        ctx.beginPath();
        ctx.arc(0, 0, circleRadius, 0, Math.PI * 2);
        ctx.stroke();
        ctx.setLineDash([]);
        
        // Руны на круге
        for (let i = 0; i < 8; i++) {
            const angle = (Math.PI * 2 * i) / 8;
            const rx = Math.cos(angle) * circleRadius;
            const ry = Math.sin(angle) * circleRadius;
            ctx.fillStyle = 'rgba(212, 175, 55, 0.6)';
            ctx.font = '12px serif';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText('✦', rx, ry);
        }
        ctx.restore();

        // Свечение под котиком
        const gradient = ctx.createRadialGradient(0, 0, 0, 0, 0, size * 2);
        gradient.addColorStop(0, 'rgba(212, 175, 55, 0.3)');
        gradient.addColorStop(1, 'rgba(212, 175, 55, 0)');
        ctx.fillStyle = gradient;
        ctx.beginPath();
        ctx.arc(0, 0, size * 2, 0, Math.PI * 2);
        ctx.fill();

        // Хвост (анимированный)
        cat.tailAngle += 0.1;
        const tailWave = Math.sin(cat.tailAngle) * 15;
        ctx.strokeStyle = '#2a2a2a';
        ctx.lineWidth = size * 0.25;
        ctx.lineCap = 'round';
        ctx.beginPath();
        ctx.moveTo(-size * 0.3, size * 0.3);
        ctx.quadraticCurveTo(-size * 0.8, size * 0.5 + tailWave, -size * 1.2, size * 0.2 + tailWave * 0.5);
        ctx.stroke();
        
        ctx.strokeStyle = '#3a3a3a';
        ctx.lineWidth = size * 0.15;
        ctx.beginPath();
        ctx.moveTo(-size * 0.3, size * 0.3);
        ctx.quadraticCurveTo(-size * 0.8, size * 0.5 + tailWave, -size * 1.2, size * 0.2 + tailWave * 0.5);
        ctx.stroke();

        // Тело
        ctx.fillStyle = '#2a2a2a';
        ctx.beginPath();
        ctx.ellipse(0, size * 0.2, size * 0.8, size * 0.7, 0, 0, Math.PI * 2);
        ctx.fill();
        
        // Голова
        ctx.fillStyle = '#2a2a2a';
        ctx.beginPath();
        ctx.arc(0, -size * 0.3, size * 0.7, 0, Math.PI * 2);
        ctx.fill();

        // Уши
        ctx.beginPath();
        ctx.moveTo(-size * 0.5, -size * 0.7);
        ctx.lineTo(-size * 0.3, -size * 1.1);
        ctx.lineTo(-size * 0.1, -size * 0.7);
        ctx.closePath();
        ctx.fill();
        
        ctx.beginPath();
        ctx.moveTo(size * 0.5, -size * 0.7);
        ctx.lineTo(size * 0.3, -size * 1.1);
        ctx.lineTo(size * 0.1, -size * 0.7);
        ctx.closePath();
        ctx.fill();

        // Внутренняя часть ушей
        ctx.fillStyle = '#ff9eb5';
        ctx.beginPath();
        ctx.moveTo(-size * 0.4, -size * 0.75);
        ctx.lineTo(-size * 0.3, -size * 1);
        ctx.lineTo(-size * 0.2, -size * 0.75);
        ctx.closePath();
        ctx.fill();
        
        ctx.beginPath();
        ctx.moveTo(size * 0.4, -size * 0.75);
        ctx.lineTo(size * 0.3, -size * 1);
        ctx.lineTo(size * 0.2, -size * 0.75);
        ctx.closePath();
        ctx.fill();

        // Глаза (моргание)
        cat.blinkTimer++;
        if (cat.blinkTimer > 180) {
            cat.isBlinking = true;
            if (cat.blinkTimer > 190) {
                cat.isBlinking = false;
                cat.blinkTimer = 0;
            }
        }

        const eyeY = -size * 0.35;
        const eyeX = size * 0.25;
        
        if (cat.isBlinking) {
            ctx.strokeStyle = '#00ff88';
            ctx.lineWidth = 2;
            ctx.beginPath();
            ctx.moveTo(-eyeX - 6, eyeY);
            ctx.lineTo(-eyeX + 6, eyeY);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(eyeX - 6, eyeY);
            ctx.lineTo(eyeX + 6, eyeY);
            ctx.stroke();
        } else {
            // Белок глаз
            ctx.fillStyle = '#fff';
            ctx.beginPath();
            ctx.ellipse(-eyeX, eyeY, 7, 9, 0, 0, Math.PI * 2);
            ctx.fill();
            ctx.beginPath();
            ctx.ellipse(eyeX, eyeY, 7, 9, 0, 0, Math.PI * 2);
            ctx.fill();
            
            // Зелёные зрачки (магические!)
            ctx.fillStyle = '#00ff88';
            ctx.shadowBlur = 15;
            ctx.shadowColor = '#00ff88';
            ctx.beginPath();
            ctx.ellipse(-eyeX, eyeY, 4, 7, 0, 0, Math.PI * 2);
            ctx.fill();
            ctx.beginPath();
            ctx.ellipse(eyeX, eyeY, 4, 7, 0, 0, Math.PI * 2);
            ctx.fill();
            ctx.shadowBlur = 0;
            
            // Чёрные вертикальные зрачки
            ctx.fillStyle = '#000';
            ctx.beginPath();
            ctx.ellipse(-eyeX, eyeY, 1.5, 6, 0, 0, Math.PI * 2);
            ctx.fill();
            ctx.beginPath();
            ctx.ellipse(eyeX, eyeY, 1.5, 6, 0, 0, Math.PI * 2);
            ctx.fill();
            
            // Блик
            ctx.fillStyle = '#fff';
            ctx.beginPath();
            ctx.arc(-eyeX + 2, eyeY - 2, 1.5, 0, Math.PI * 2);
            ctx.fill();
            ctx.beginPath();
            ctx.arc(eyeX + 2, eyeY - 2, 1.5, 0, Math.PI * 2);
            ctx.fill();
        }

        // Нос
        ctx.fillStyle = '#ff9eb5';
        ctx.beginPath();
        ctx.moveTo(0, -size * 0.15);
        ctx.lineTo(-4, -size * 0.08);
        ctx.lineTo(4, -size * 0.08);
        ctx.closePath();
        ctx.fill();

        // Рот
        ctx.strokeStyle = '#1a1a1a';
        ctx.lineWidth = 1.5;
        ctx.beginPath();
        ctx.moveTo(0, -size * 0.08);
        ctx.lineTo(0, -size * 0.02);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(0, -size * 0.02);
        ctx.quadraticCurveTo(-6, 4, -10, -size * 0.05);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(0, -size * 0.02);
        ctx.quadraticCurveTo(6, 4, 10, -size * 0.05);
        ctx.stroke();

        // Усы
        ctx.strokeStyle = 'rgba(255, 255, 255, 0.5)';
        ctx.lineWidth = 1;
        for (let i = -1; i <= 1; i++) {
            ctx.beginPath();
            ctx.moveTo(-size * 0.15, -size * 0.1 + i * 4);
            ctx.lineTo(-size * 0.6, -size * 0.15 + i * 6);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(size * 0.15, -size * 0.1 + i * 4);
            ctx.lineTo(size * 0.6, -size * 0.15 + i * 6);
            ctx.stroke();
        }

        // Магический ошейник с подвеской
        ctx.strokeStyle = '#d4af37';
        ctx.lineWidth = 3;
        ctx.shadowBlur = 10;
        ctx.shadowColor = '#d4af37';
        ctx.beginPath();
        ctx.arc(0, size * 0.05, size * 0.5, 0.3, Math.PI - 0.3);
        ctx.stroke();
        ctx.shadowBlur = 0;
        
        // Подвеска-звёздочка
        ctx.fillStyle = '#d4af37';
        ctx.shadowBlur = 15;
        ctx.shadowColor = '#d4af37';
        ctx.font = `${size * 0.4}px serif`;
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText('✦', 0, size * 0.55);
        ctx.shadowBlur = 0;

        ctx.restore();
    }

    // === ОБНОВЛЕНИЕ КОТИКА ===
    function updateCat() {
        if (keys['ArrowLeft'] || keys['a'] || keys['A']) cat.dx = -cat.speed;
        else if (keys['ArrowRight'] || keys['d'] || keys['D']) cat.dx = cat.speed;
        else if (!touchStartX) cat.dx *= 0.85;

        if (keys['ArrowUp'] || keys['w'] || keys['W']) cat.dy = -cat.speed;
        else if (keys['ArrowDown'] || keys['s'] || keys['S']) cat.dy = cat.speed;
        else if (!touchStartY) cat.dy *= 0.85;

        cat.x += cat.dx;
        cat.y += cat.dy;

        cat.x = Math.max(cat.size, Math.min(canvas.width - cat.size, cat.x));
        cat.y = Math.max(cat.size, Math.min(canvas.height - cat.size, cat.y));

        // Следы за котиком
        if (Math.abs(cat.dx) > 0.5 || Math.abs(cat.dy) > 0.5) {
            if (time % 3 === 0) {
                trails.push({
                    x: cat.x,
                    y: cat.y + cat.size * 0.5,
                    life: 1,
                    size: Math.random() * 3 + 2
                });
            }
        }
    }

    // === ОБНОВЛЕНИЕ ЧАСТИЦ ===
    function updateParticles() {
        for (let i = particles.length - 1; i >= 0; i--) {
            const p = particles[i];
            p.x += p.speedX;
            p.y += p.speedY;
            p.rotation += p.rotSpeed;
            p.pulse += 0.05;

            const dx = cat.x - p.x;
            const dy = cat.y - p.y;
            const distance = Math.sqrt(dx * dx + dy * dy);

            if (distance < cat.size * 1.5 + p.size * 0.5) {
                score++;
                elements[p.type.type]++;
                document.getElementById('score').textContent = score;
                
                createSparkles(p.x, p.y, p.type.color);
                
                const maxPerElement = 10;
                const progress = Math.min((elements[p.type.type] / maxPerElement) * 100, 100);
                document.getElementById(p.type.type + 'Progress').style.width = progress + '%';

                if (elements.fire >= 10 && elements.water >= 10 && elements.earth >= 10 && elements.air >= 10) {
                    createJewelry();
                    elements = { fire: 0, water: 0, earth: 0, air: 0 };
                    updateProgressBars();
                }

                particles.splice(i, 1);
                continue;
            }

            if (p.x < 0 || p.x > canvas.width) p.speedX *= -1;
            if (p.y < 0 || p.y > canvas.height) p.speedY *= -1;
        }
    }

    function updateProgressBars() {
        const maxPerElement = 10;
        ['fire', 'water', 'earth', 'air'].forEach(type => {
            const progress = Math.min((elements[type] / maxPerElement) * 100, 100);
            document.getElementById(type + 'Progress').style.width = progress + '%';
        });
    }

    function createJewelry() {
        jewelryCount++;
        document.getElementById('jewelry').textContent = jewelryCount;
        createFirework();
        setTimeout(() => showReward(), 800);
    }

    function showReward() {
        const modal = document.getElementById('rewardModal');
        modal.classList.add('active');
        
        // Определяем текущий язык
        const currentLang = document.documentElement.lang || 'ru';
        const collection = jewelryCollection[currentLang] || jewelryCollection.ru;
        
        const randomJewelry = collection[Math.floor(Math.random() * collection.length)];
        
        const photoDiv = document.getElementById('jewelryPhoto');
        photoDiv.innerHTML = `<img src="${randomJewelry.image}" alt="${randomJewelry.name}">`;
        
        document.getElementById('jewelryName').textContent = randomJewelry.name;
        
        // Переводим текст награды
        const rewardTexts = {
            ru: `Котик создал ${randomJewelry.name}! ${randomJewelry.description}`,
            en: `The cat created ${randomJewelry.name}! ${randomJewelry.description}`
        };
        document.getElementById('rewardText').textContent = rewardTexts[currentLang] || rewardTexts.ru;
        document.getElementById('viewJewelryBtn').href = randomJewelry.page;
    }

    function closeModal() {
        document.getElementById('rewardModal').classList.remove('active');
    }

    // === РИСОВАНИЕ ===
    function draw() {
        time++;
        
        // Градиентный фон
        const bgGradient = ctx.createRadialGradient(
            canvas.width / 2, canvas.height / 2, 0,
            canvas.width / 2, canvas.height / 2, canvas.width / 1.5
        );
        bgGradient.addColorStop(0, '#0a1410');
        bgGradient.addColorStop(1, '#050a08');
        ctx.fillStyle = bgGradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Мерцающие звёзды
        stars.forEach(star => {
            star.twinkle += star.speed;
            const alpha = 0.3 + Math.sin(star.twinkle) * 0.3 + 0.3;
            ctx.fillStyle = `rgba(255, 255, 255, ${alpha})`;
            ctx.beginPath();
            ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
            ctx.fill();
        });

        // Светлячки
        fireflies.forEach(ff => {
            ff.x += ff.vx;
            ff.y += ff.vy;
            ff.phase += 0.05;
            
            if (ff.x < 0 || ff.x > canvas.width) ff.vx *= -1;
            if (ff.y < 0 || ff.y > canvas.height) ff.vy *= -1;
            
            const glow = 0.5 + Math.sin(ff.phase) * 0.5;
            
            ctx.save();
            ctx.shadowBlur = 15;
            ctx.shadowColor = '#d4af37';
            ctx.fillStyle = `rgba(244, 208, 63, ${glow})`;
            ctx.beginPath();
            ctx.arc(ff.x, ff.y, ff.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        });

        // Следы за котиком
        for (let i = trails.length - 1; i >= 0; i--) {
            const t = trails[i];
            t.life -= 0.03;
            if (t.life <= 0) {
                trails.splice(i, 1);
                continue;
            }
            ctx.fillStyle = `rgba(212, 175, 55, ${t.life * 0.3})`;
            ctx.beginPath();
            ctx.arc(t.x, t.y, t.size * t.life, 0, Math.PI * 2);
            ctx.fill();
        }

        // Частицы стихий
        particles.forEach(p => {
            ctx.save();
            ctx.translate(p.x, p.y);
            ctx.rotate(p.rotation);
            
            const pulse = 1 + Math.sin(p.pulse) * 0.15;
            
            // Свечение
            const glowGradient = ctx.createRadialGradient(0, 0, 0, 0, 0, p.size * 1.5);
            glowGradient.addColorStop(0, p.type.color + 'cc');
            glowGradient.addColorStop(0.5, p.type.glow + '44');
            glowGradient.addColorStop(1, 'transparent');
            ctx.fillStyle = glowGradient;
            ctx.beginPath();
            ctx.arc(0, 0, p.size * 1.5 * pulse, 0, Math.PI * 2);
            ctx.fill();
            
            // Эмодзи
            ctx.shadowBlur = 20;
            ctx.shadowColor = p.type.glow;
            ctx.font = `${p.size * pulse}px Arial`;
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(p.type.symbol, 0, 0);
            ctx.restore();
        });

        // Искры
        for (let i = sparkles.length - 1; i >= 0; i--) {
            const s = sparkles[i];
            s.x += s.vx;
            s.y += s.vy;
            s.vy += 0.1; // гравитация
            s.vx *= 0.98;
            s.life -= s.decay;
            
            if (s.life <= 0) {
                sparkles.splice(i, 1);
                continue;
            }
            
            ctx.save();
            ctx.globalAlpha = s.life;
            ctx.shadowBlur = 15;
            ctx.shadowColor = s.color;
            ctx.fillStyle = s.color;
            ctx.beginPath();
            ctx.arc(s.x, s.y, s.size * s.life, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }

        // Котик
        drawCat(cat.x, cat.y, cat.size);
    }

    // === ИГРОВОЙ ЦИКЛ ===
    function gameLoop() {
        updateCat();
        updateParticles();
        draw();

        if (particles.length < 12 && Math.random() < 0.04) {
            createParticle();
        }

        requestAnimationFrame(gameLoop);
    }

    // Запуск
    for (let i = 0; i < 8; i++) {
        createParticle();
    }
    gameLoop();
</script>

<?php include 'includes/footer.php'; ?>