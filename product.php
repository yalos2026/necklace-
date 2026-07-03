<?php 
require_once 'products-data.php';

// Получаем ID товара из URL
$productId = isset($_GET['id']) ? $_GET['id'] : null;

// Проверяем, существует ли товар
if (!$productId || !isset($products[$productId])) {
    header('Location: index.php');
    exit;
}

$product = $products[$productId];
$pageTitle = 'Украшение — DARIA ROZENVASSER';
include 'includes/header.php'; 
?>

<style>
/* === ЗОЛОТОЙ КУРСОР === */
.cursor {
    position: fixed !important;
    width: 20px !important;
    height: 20px !important;
    border-radius: 50% !important;
    background: radial-gradient(circle, rgba(244, 208, 63, 0.9) 0%, rgba(212, 175, 55, 0.4) 50%, transparent 70%) !important;
    border: none !important;
    pointer-events: none !important;
    z-index: 99999 !important;
    transform: translate(-50%, -50%) !important;
    transition: width 0.3s ease, height 0.3s ease !important;
    mix-blend-mode: screen !important;
}
.cursor-trail {
    position: fixed !important;
    width: 40px !important;
    height: 40px !important;
    border: 1px solid rgba(212, 175, 55, 0.3) !important;
    border-radius: 50% !important;
    pointer-events: none !important;
    z-index: 99998 !important;
    transform: translate(-50%, -50%) !important;
    transition: transform 0.4s cubic-bezier(0.19, 1, 0.22, 1), width 0.3s ease, height 0.3s ease !important;
    background: transparent !important;
}

.gold-text-contrast {
    text-shadow: 0 1px 0 rgba(0,0,0,0.95), 0 2px 4px rgba(0,0,0,0.9), 0 0 15px rgba(0,0,0,0.6);
}

.nature-hero-bg { position: fixed; inset: 0; z-index: 0; overflow: hidden; }
.nature-hero-bg img {
    position: absolute; top: 50%; left: 50%;
    min-width: 100%; min-height: 100%;
    transform: translate(-50%, -50%);
    object-fit: cover; filter: saturate(1.1);
}

.background-effects { position: fixed; inset: 0; pointer-events: none; z-index: 1; }
.magic-glow {
    position: absolute; width: 100%; height: 100%;
    background: radial-gradient(circle at 30% 20%, rgba(212,175,55,0.25), transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(212,175,55,0.25), transparent 50%);
    mix-blend-mode: screen; opacity: 0.7;
}

.fireflies-container { position: fixed; inset: 0; pointer-events: none; z-index: 2; overflow: hidden; }
.firefly {
    position: absolute; width: 4px; height: 4px;
    border-radius: 50%; background: #f4d03f;
    box-shadow: 0 0 10px #f4d03f, 0 0 20px #d4af37;
    opacity: 0; animation: fireflyFloat 15s linear infinite;
}
@keyframes fireflyFloat {
    0% { transform: translate(0, 0); opacity: 0; }
    10% { opacity: 1; }
    50% { opacity: 0.6; }
    90% { opacity: 1; }
    100% { transform: translate(100vw, -100vh); opacity: 0; }
}

.showroom-container {
    max-width: 1500px; margin: 0 auto;
    padding: 130px 5% 80px; z-index: 10; position: relative; width: 100%;
}
.showroom-grid {
    display: grid; grid-template-columns: 1fr 1.4fr;
    grid-template-rows: auto auto; gap: 40px; width: 100%;
}

.panorama-cell {
    grid-column: 1; grid-row: 1;
    aspect-ratio: 3/4;
    min-height: 500px;
    max-height: 600px;
    overflow: hidden; border-radius: 8px; position: relative; z-index: 2;
    animation: imgGlow 3s ease-in-out infinite;
}

.panorama-cell::before {
    content: ''; position: absolute; inset: 15px;
    border: 1px solid var(--gold, #d4af37); border-radius: 4px;
    z-index: 2; pointer-events: none; opacity: 0.5;
    transition: all 0.6s ease;
}

.panorama-cell::after {
    content: '❖'; position: absolute; top: 25px; left: 50%;
    transform: translateX(-50%); color: var(--gold, #d4af37);
    font-size: 20px; z-index: 3; text-shadow: 0 0 15px var(--gold, #d4af37);
}

.panorama-cell img {
    width: 100%; height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 1.2s, filter 1s;
    filter: saturate(0.9) contrast(1.05);
}

.panorama-cell:hover::before { opacity: 0.9; inset: 18px; }
.panorama-cell:hover img { transform: scale(1.03); filter: saturate(1.1) contrast(1.1); }

.product-circle-cell {
    grid-column: 2; grid-row: 1;
    display: flex; align-items: center; justify-content: center;
    position: relative; min-height: 450px;
}
.product-medallion { position: relative; width: 380px; height: 380px; }
.product-medallion::before {
    content: ''; position: absolute; inset: -30%;
    background: radial-gradient(circle, rgba(244,208,63,0.9) 0%, rgba(255,223,100,0.7) 15%, rgba(244,208,63,0.5) 30%, rgba(212,175,55,0.3) 50%, transparent 75%);
    filter: blur(35px); animation: neonPulse 3s ease-in-out infinite; z-index: 0; pointer-events: none;
}
.product-medallion::after {
    content: ''; position: absolute; inset: -20%;
    background: radial-gradient(circle, rgba(255,240,150,0.8) 0%, rgba(244,208,63,0.6) 20%, rgba(212,175,55,0.4) 40%, transparent 65%);
    filter: blur(25px); animation: neonPulse 2.5s ease-in-out infinite 0.5s; z-index: 0; pointer-events: none;
}
@keyframes neonPulse {
    0%, 100% { opacity: 0.8; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.1); }
}
.product-medallion-image {
    position: relative; width: 100%; height: 100%;
    border-radius: 50%; overflow: hidden; z-index: 2;
    box-shadow: 0 0 0 4px rgba(244,208,63,0.9), 0 0 0 10px rgba(10,20,16,0.9), 0 0 0 11px rgba(244,208,63,0.5), 0 0 50px rgba(244,208,63,0.8), 0 0 100px rgba(212,175,55,0.5), 0 40px 100px rgba(0,0,0,0.8), inset 0 0 60px rgba(0,0,0,0.3);
    transition: transform 1.2s cubic-bezier(0.19,1,0.22,1), box-shadow 1s, border-radius 1s;
}
.product-medallion-image img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 1.4s, filter 1s; filter: saturate(1.05) contrast(1.08) brightness(1.02);
}
.product-medallion:hover .product-medallion-image {
    border-radius: 0; transform: scale(1.08);
    box-shadow: 0 0 0 4px rgba(255,223,100,1), 0 0 0 10px rgba(10,20,16,0.9), 0 0 0 11px rgba(255,223,100,0.7), 0 0 80px rgba(244,208,63,1), 0 0 150px rgba(212,175,55,0.8), 0 40px 100px rgba(0,0,0,0.8), inset 0 0 60px rgba(0,0,0,0.3);
}
.product-medallion:hover .product-medallion-image img { transform: scale(1); filter: saturate(1.2) contrast(1.15) brightness(1.08); }

.info-cell {
    grid-column: 1; grid-row: 2; position: relative;
    background: linear-gradient(180deg, rgba(20,30,24,0.75) 0%, rgba(10,20,16,0.92) 100%);
    backdrop-filter: blur(35px); -webkit-backdrop-filter: blur(35px);
    border: 1px solid rgba(212,175,55,0.15); border-radius: 8px;
    padding: 40px 30px; box-shadow: 0 40px 80px rgba(0,0,0,0.6), inset 0 0 80px rgba(10,20,16,0.3);
    max-width: 360px; width: 100%;
}
.info-cell::before {
    content: ''; position: absolute; inset: 10px;
    border: 1px solid var(--gold, #d4af37); border-radius: 4px;
    opacity: 0.25; pointer-events: none; transition: opacity 0.6s;
}
.info-cell:hover::before { opacity: 0.5; }

.corner-ornament {
    position: absolute; width: 25px; height: 25px;
    border: 1px solid var(--gold, #d4af37); opacity: 0.6;
}
.corner-ornament.top-left { top: 18px; left: 18px; border-right: none; border-bottom: none; }
.corner-ornament.top-right { top: 18px; right: 18px; border-left: none; border-bottom: none; }
.corner-ornament.bottom-left { bottom: 18px; left: 18px; border-right: none; border-top: none; }
.corner-ornament.bottom-right { bottom: 18px; right: 18px; border-left: none; border-top: none; }

.tag-element {
    font-family: var(--font-serif); font-size: 10px;
    text-transform: uppercase; letter-spacing: 4px;
    color: var(--gold, #d4af37); margin-bottom: 20px;
    display: flex; align-items: center; gap: 12px;
}
.tag-element::before { content: ''; width: 30px; height: 1px; background: var(--gold, #d4af37); }
.tag-element::after { content: '✦'; font-size: 11px; opacity: 0.7; }

.info-cell h1 {
    font-family: var(--font-serif); font-size: clamp(1.4rem, 2.2vw, 1.8rem);
    font-weight: 400; letter-spacing: 1.5px; margin-bottom: 12px;
    line-height: 1.2; color: var(--text-light, #f4f0e3);
    text-shadow: 0 2px 15px rgba(0,0,0,0.8);
}
.title-accent {
    font-family: var(--font-display); font-style: italic;
    color: var(--gold, #d4af37); display: block;
    margin-top: 5px; font-size: 1.05em;
}
.title-divider {
    width: 50px; height: 1px;
    background: linear-gradient(90deg, var(--gold, #d4af37), transparent);
    margin: 20px 0; position: relative;
}
.title-divider::before {
    content: '◆'; position: absolute; top: 50%; left: 0;
    transform: translateY(-50%); color: var(--gold, #d4af37);
    font-size: 8px; background: rgba(10,20,16,0.9); padding: 0 8px;
}
/* === ЦЕНА === */
.price-display {
    font-family: var(--font-serif);
    margin-bottom: 25px;
    text-align: center;
}

.price-label {
    font-size: 0.9rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--gold-light, #f4d47c);
    margin-bottom: 10px;
    font-weight: 300;
}

.price-value {
    font-size: 2.4rem;
    font-weight: 700;
    color: var(--gold, #d4af37);
    letter-spacing: 2px;
    text-shadow: 0 0 20px rgba(212, 175, 55, 0.6);
    margin-bottom: 8px;
}

.price-note {
    display: block;
    font-family: var(--font-sans);
    font-size: 0.7rem;
    color: #b8b09a;
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-top: 8px;
    font-weight: 300;
}

/* === НАЗВАНИЕ УКРАШЕНИЯ === */
.product-hero-name {
    text-align: center;
    margin-bottom: 20px;
}

.product-hero-name-text {
    font-family: var(--font-serif);
    font-size: clamp(1.6rem, 2.5vw, 2rem);
    font-weight: 700;
    color: var(--gold, #d4af37);
    letter-spacing: 2px;
    text-shadow: 
        0 0 20px rgba(212, 175, 55, 0.6),
        0 0 40px rgba(212, 175, 55, 0.3);
    line-height: 1.2;
}


.story-paragraph {
    font-family: var(--font-display); font-size: 16px;
    line-height: 1.7; color: var(--text-light, #f4f0e3);
    margin-bottom: 30px; font-style: italic; font-weight: 300;
    padding: 18px 20px; background: rgba(10,20,16,0.5);
    backdrop-filter: blur(10px); border: 1px solid rgba(212,175,55,0.15);
    border-radius: 6px;
}
.story-paragraph .dropcap {
    font-family: var(--font-serif); font-size: 2.8em;
    float: left; line-height: 0.9; margin: 6px 10px 0 0;
    color: var(--gold, #d4af37); font-style: normal;
    text-shadow: 0 0 15px rgba(212,175,55,0.25);
}
.luxury-button {
    display: inline-flex; align-items: center; justify-content: center;
    gap: 12px; width: 100%;
    background: linear-gradient(135deg, rgba(212,175,55,0.15) 0%, rgba(139,105,20,0.1) 100%);
    border: 1px solid var(--gold, #d4af37); color: var(--text-light, #f4f0e3);
    padding: 16px 30px; font-family: var(--font-serif);
    font-size: 0.8rem; text-transform: uppercase; letter-spacing: 4px;
    border-radius: 4px; cursor: none; text-decoration: none;
    transition: all 0.5s; position: relative; overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
}
.luxury-button::before {
    content: ''; position: absolute; top: 0; left: -100%;
    width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(212,175,55,0.25), transparent);
    transition: left 0.7s;
}
.luxury-button:hover {
    background: var(--gold, #d4af37); color: #0a1410; font-weight: 500;
    box-shadow: 0 0 40px rgba(212,175,55,0.25), 0 15px 40px rgba(0,0,0,0.6), inset 0 0 20px rgba(255,255,255,0.2);
    transform: translateY(-3px); letter-spacing: 5px;
}
.luxury-button:hover::before { left: 100%; }
.luxury-button .arrow { transition: transform 0.4s; }
.luxury-button:hover .arrow { transform: translateX(6px); }

.secondary-photo-cell {
    grid-column: 2; grid-row: 2; overflow: hidden;
    border-radius: 8px; position: relative; z-index: 2;
    aspect-ratio: 4/3;
    min-height: 400px;
    max-height: 500px;
    animation: imgGlow 3s ease-in-out infinite;
}

.secondary-photo-cell::before {
    content: ''; position: absolute; inset: 15px;
    border: 1px solid var(--gold, #d4af37); border-radius: 4px;
    z-index: 2; pointer-events: none; opacity: 0.5;
    transition: all 0.6s ease;
}

.secondary-photo-cell::after {
    content: '✦'; position: absolute; bottom: 25px; right: 25px;
    color: var(--gold, #d4af37); font-size: 18px; z-index: 3;
    opacity: 0.8; text-shadow: 0 0 10px var(--gold, #d4af37);
}

.secondary-photo-cell img {
    width: 100%; height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 1.2s, filter 1s;
    filter: saturate(0.9) contrast(1.05);
}

.secondary-photo-cell:hover::before { opacity: 0.9; inset: 18px; }
.secondary-photo-cell:hover img { transform: scale(1.04); filter: saturate(1.1) contrast(1.1); }

@keyframes imgGlow {
    0%, 100% { box-shadow: 0 25px 60px rgba(0,0,0,0.7), 0 0 40px rgba(244,208,63,0.3), 0 0 80px rgba(212,175,55,0.15); }
    50% { box-shadow: 0 25px 60px rgba(0,0,0,0.7), 0 0 60px rgba(244,208,63,0.55), 0 0 120px rgba(212,175,55,0.3), 0 0 180px rgba(244,208,63,0.15); }
}

@media (max-width: 1100px) {
    .showroom-grid { grid-template-columns: 1fr; gap: 30px; }
    .panorama-cell, .product-circle-cell, .info-cell, .secondary-photo-cell { grid-column: 1; grid-row: auto; }
    .panorama-cell { aspect-ratio: 3/4; min-height: 400px; max-height: 500px; }
    .product-medallion { width: 320px; height: 320px; }
    .product-circle-cell { min-height: 360px; }
    .info-cell { max-width: 100%; padding: 35px 25px; }
    .secondary-photo-cell { aspect-ratio: 4/3; min-height: 350px; max-height: 450px; }
}

@media (max-width: 768px) {
    .luxury-button { cursor: pointer; }
    .showroom-container { padding: 100px 4% 60px; }
    .panorama-cell { aspect-ratio: 3/4; min-height: 300px; max-height: 400px; }
    .product-medallion { width: 260px; height: 260px; }
    .product-circle-cell { min-height: 300px; }
    .info-cell { padding: 30px 20px; }
    .info-cell h1 { font-size: 1.5rem; }
    .price-value { font-size: 2rem; }
    .story-paragraph { padding: 15px; font-size: 15px; }
    .luxury-button { padding: 14px 20px; font-size: 0.75rem; }
    .secondary-photo-cell { aspect-ratio: 4/3; min-height: 280px; max-height: 380px; }
}
@media (max-width: 480px) {
    .panorama-cell { height: 220px; }
    .product-medallion { width: 220px; height: 220px; }
    .corner-ornament { display: none; }
    .info-cell h1 { font-size: 1.3rem; }
}
/* === МОДАЛЬНОЕ ОКНО ДЛЯ ФОТО === */
.photo-modal {
    position: fixed;
    inset: 0;
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.5s ease, visibility 0.5s ease;
}

.photo-modal.active {
    opacity: 1;
    visibility: visible;
}

.photo-modal-overlay {
    position: absolute;
    inset: 0;
    background: rgba(5, 10, 8, 0.92);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
}

.photo-modal-content {
    position: relative;
    z-index: 2;
    max-width: 50vw;
    max-height: 85vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    transform: scale(0.9);
    transition: transform 0.5s cubic-bezier(0.19, 1, 0.22, 1);
}

.photo-modal.active .photo-modal-content {
    transform: scale(1);
}

.photo-modal-content img {
    max-width: 100%;
    max-height: 75vh;
    border-radius: 8px;
    border: 2px solid rgba(212, 175, 55, 0.5);
    box-shadow: 
        0 0 60px rgba(212, 175, 55, 0.4),
        0 0 120px rgba(212, 175, 55, 0.2),
        0 30px 80px rgba(0, 0, 0, 0.8);
    object-fit: contain;
    animation: modalImgGlow 3s ease-in-out infinite;
}

@keyframes modalImgGlow {
    0%, 100% { box-shadow: 0 0 60px rgba(212, 175, 55, 0.4), 0 0 120px rgba(212, 175, 55, 0.2), 0 30px 80px rgba(0, 0, 0, 0.8); }
    50% { box-shadow: 0 0 80px rgba(212, 175, 55, 0.6), 0 0 160px rgba(212, 175, 55, 0.3), 0 30px 80px rgba(0, 0, 0, 0.8); }
}

.photo-modal-caption {
    margin-top: 20px;
    font-family: var(--font-display);
    font-size: 1.1rem;
    font-style: italic;
    color: var(--gold-light, #f4d47c);
    letter-spacing: 1px;
    text-align: center;
    text-shadow: 0 0 15px rgba(212, 175, 55, 0.5);
}

.photo-modal-close {
    position: absolute;
    top: -50px;
    right: -10px;
    width: 45px;
    height: 45px;
    background: rgba(10, 20, 16, 0.8);
    border: 1px solid var(--gold, #d4af37);
    border-radius: 50%;
    color: var(--gold, #d4af37);
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    z-index: 3;
}

.photo-modal-close:hover {
    background: var(--gold, #d4af37);
    color: var(--forest-dark, #0a1410);
    transform: rotate(90deg) scale(1.1);
    box-shadow: 0 0 30px rgba(212, 175, 55, 0.6);
}

@media (max-width: 1100px) {
    .photo-modal-content {
        max-width: 70vw;
    }
}

@media (max-width: 768px) {
    .photo-modal-content {
        max-width: 90vw;
    }
    .photo-modal-close {
        top: -45px;
        right: 0;
    }
}
</style>

<!-- Фоновое изображение -->
<div class="nature-hero-bg">
    <img src="images/logos.png" alt="">
</div>

<!-- Фоновые эффекты -->
<div class="background-effects">
    <div class="magic-glow"></div>
</div>

<!-- Светлячки -->
<div class="fireflies-container" id="fireflies"></div>

<!-- Главный подиум -->
<main class="showroom-container">
    <div class="showroom-grid">

        <!-- ЯЧЕЙКА 1: ПАНОРАМА -->
        <div class="panorama-cell">
            <img src="<?php echo $product['panorama']; ?>" alt="Атмосферное фото">
        </div>

        <!-- ЯЧЕЙКА 2: ПРОДУКТ В КРУГЕ -->
        <div class="product-circle-cell">
            <div class="product-medallion">
                <div class="product-medallion-image">
                    <img src="<?php echo $product['image']; ?>" alt="Украшение">
                </div>
            </div>
        </div>

            <!-- НОВОЕ: Название украшения -->
    <div class="info-cell">
    <div class="corner-ornament top-left"></div>
    <div class="corner-ornament top-right"></div>
    <div class="corner-ornament bottom-left"></div>
    <div class="corner-ornament bottom-right"></div>

    <!-- Название украшения -->
    <div class="product-hero-name">
        <div class="product-hero-name-text" data-i18n="<?php echo $product['name_key']; ?>"><?php echo $product['name']; ?></div>
    </div>

    <!-- Тип украшения (Колье/Серьги) -->
    <div class="tag-element gold-text-contrast" data-i18n="<?php echo $product['tag_key']; ?>"></div>

    <!-- Цена -->
    <div class="price-display gold-text-contrast">
        <div class="price-label" data-i18n="product_price_label">Цена</div>
        <div class="price-value"><?php echo number_format($product['price'], 0, ',', ' '); ?> ₽</div>
        <span class="price-note" data-i18n="<?php echo $product['price_note_key']; ?>"></span>
    </div>

    <!-- Описание -->
<p class="story-paragraph" data-i18n="<?php echo $product['story_key']; ?>"><?php echo $product['story']; ?></p>

    <!-- Кнопка -->
    <button class="luxury-button" id="addToCartBtn">
        <span data-i18n="<?php echo $product['button_key']; ?>">Завладеть шедевром</span>
        <span class="arrow">→</span>
    </button>
</div>
        <!-- ЯЧЕЙКА 4: ВТОРОЕ ФОТО -->
        <div class="secondary-photo-cell">
            <img src="<?php echo $product['secondary']; ?>" alt="Второе фото">
        </div>

    </div>
</main>

<!-- Элементы золотого курсора -->
<div class="cursor" id="cursor"></div>
<div class="cursor-trail" id="cursor-trail"></div>

<!-- Модальное окно для фото -->
<div class="photo-modal" id="photoModal">
    <div class="photo-modal-overlay"></div>
    <div class="photo-modal-content">
        <button class="photo-modal-close" id="photoModalClose">✕</button>
        <img src="" alt="" id="photoModalImage">
        <div class="photo-modal-caption" id="photoModalCaption"></div>
    </div>
</div>

<!-- Локальный JS для золотого курсора -->
<script>
    const cursor = document.getElementById('cursor');
    const cursorTrail = document.getElementById('cursor-trail');
    
    if (cursor && cursorTrail && window.matchMedia("(hover: hover)").matches) {
        let mouseX = 0, mouseY = 0;
        let trailX = 0, trailY = 0;
        
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
        
        document.querySelectorAll('a, button, .product-medallion, .panorama-cell, .secondary-photo-cell, .luxury-button').forEach(el => {
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
</script>

<!-- Светлячки -->
<script>
    function createFirefly() {
        const container = document.getElementById('fireflies');
        if (!container) return;
        const firefly = document.createElement('div');
        firefly.classList.add('firefly');
        firefly.style.left = Math.random() * 100 + 'vw';
        firefly.style.top = (Math.random() * 50 + 50) + 'vh';
        const size = Math.random() * 3 + 2;
        firefly.style.width = size + 'px';
        firefly.style.height = size + 'px';
        const duration = Math.random() * 10 + 10;
        firefly.style.animationDuration = duration + 's';
        container.appendChild(firefly);
        setTimeout(() => firefly.remove(), duration * 1000);
    }
    setInterval(createFirefly, 800);
    for (let i = 0; i < 10; i++) {
        setTimeout(createFirefly, i * 300);
    }
</script>

<!-- Кнопка корзины -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const addToCartBtn = document.getElementById('addToCartBtn');
        if (addToCartBtn && typeof magicCart !== 'undefined') {
            addToCartBtn.addEventListener('click', () => {
                magicCart.addItem({
                    id: '<?php echo $productId; ?>',
                    name: '<?php echo $product["name_key"]; ?>',
                    nameKey: '<?php echo $product["name_key"]; ?>',
                    price: <?php echo $product['price']; ?>,
                    image: '<?php echo $product['image']; ?>',
                    page: 'product.php?id=<?php echo $productId; ?>'
                });
            });
        }
    });
</script>

<script>
// === МОДАЛЬНОЕ ОКНО ДЛЯ ФОТО ===
const photoModal = document.getElementById('photoModal');
const photoModalImage = document.getElementById('photoModalImage');
const photoModalCaption = document.getElementById('photoModalCaption');
const photoModalClose = document.getElementById('photoModalClose');
const photoModalOverlay = document.querySelector('.photo-modal-overlay');

// Открываем модальное окно при клике на фото
document.querySelectorAll('.panorama-cell img, .secondary-photo-cell img').forEach(img => {
    img.style.cursor = 'pointer';
    
    img.addEventListener('click', (e) => {
        e.stopPropagation();
        const src = img.src;
        const alt = img.alt;
        
        // Определяем подпись
        let caption = '';
        if (img.closest('.panorama-cell')) {
            caption = '';
        } else if (img.closest('.secondary-photo-cell')) {
            caption = '';
        }
        
        photoModalImage.src = src;
        photoModalImage.alt = alt;
        photoModalCaption.textContent = caption;
        photoModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
});

// Закрываем модальное окно
function closePhotoModal() {
    photoModal.classList.remove('active');
    document.body.style.overflow = '';
}

photoModalClose.addEventListener('click', closePhotoModal);
photoModalOverlay.addEventListener('click', closePhotoModal);

// Закрытие по Escape
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && photoModal.classList.contains('active')) {
        closePhotoModal();
    }
});
</script>

<?php include 'includes/footer.php'; ?>