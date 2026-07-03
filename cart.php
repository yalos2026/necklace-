<?php 
// Определяем язык для заголовка страницы
$lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'ru';
$pageTitle = $lang === 'en' ? 'Treasure Chest — DARIA ROZENVASSER' : 'Шкатулка Сокровищ — DARIA ROZENVASSER';
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
}

/* === ФОН === */
.nature-hero-bg {
    position: fixed;
    inset: 0;
    z-index: 0;
    overflow: hidden;
}
.nature-hero-bg img {
    position: absolute;
    top: 50%; left: 50%;
    min-width: 100%; min-height: 100%;
    width: auto; height: auto;
    transform: translate(-50%, -50%);
    object-fit: cover;
    filter: saturate(1.1);
}

.background-effects {
    position: fixed;
    inset: 0;
    pointer-events: none;
    z-index: 1;
}
.magic-glow {
    position: absolute;
    width: 100%; height: 100%;
    background:
        radial-gradient(circle at 30% 20%, rgba(212, 175, 55, 0.25), transparent 50%),
        radial-gradient(circle at 70% 80%, rgba(212, 175, 55, 0.25), transparent 50%);
    mix-blend-mode: screen;
    opacity: 0.7;
}

.fireflies-container {
    position: fixed;
    inset: 0;
    pointer-events: none;
    z-index: 2;
    overflow: hidden;
}
.firefly {
    position: absolute;
    width: 4px; height: 4px;
    border-radius: 50%;
    background: #f4d03f;
    box-shadow: 0 0 10px #f4d03f, 0 0 20px #d4af37;
    opacity: 0;
    animation: fireflyFloat 15s linear infinite;
}
@keyframes fireflyFloat {
    0% { transform: translate(0, 0); opacity: 0; }
    10% { opacity: 1; }
    50% { opacity: 0.6; }
    90% { opacity: 1; }
    100% { transform: translate(100vw, -100vh); opacity: 0; }
}

/* === КОНТЕЙНЕР ШКАТУЛКИ === */
.cart-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 130px 5% 80px;
    position: relative;
    z-index: 10;
}

/* === ЗАГОЛОВОК В ПОЛУПРОЗРАЧНОЙ КАРТОЧКЕ === */
.cart-hero-content {
    position: relative;
    z-index: 2;
    max-width: 700px;
    margin: 0 auto 50px;
    padding: 45px 40px;
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.15) 0%, rgba(10, 20, 16, 0.6) 100%);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(212, 175, 55, 0.4);
    border-radius: 20px;
    box-shadow:
        0 20px 60px rgba(212, 175, 55, 0.2),
        inset 0 0 40px rgba(212, 175, 55, 0.08);
    text-align: center;
}

.cart-label {
    font-family: var(--font-serif);
    font-size: 12px;
    letter-spacing: 0.5em;
    text-transform: uppercase;
    color: var(--gold-light, #f4d47c);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

.cart-label::before,
.cart-label::after {
    content: '';
    width: 60px;
    height: 1px;
    background: var(--gold-light, #f4d47c);
}

.cart-title {
    font-family: var(--font-serif);
    font-size: clamp(2rem, 4vw, 3rem);
    color: var(--gold);
    margin-bottom: 15px;
    letter-spacing: 3px;
    text-shadow:
        0 0 30px rgba(212, 175, 55, 0.6),
        0 0 60px rgba(212, 175, 55, 0.3);
    animation: titleGlow 3s ease-in-out infinite;
}

@keyframes titleGlow {
    0%, 100% { text-shadow: 0 0 30px rgba(212, 175, 55, 0.6), 0 0 60px rgba(212, 175, 55, 0.3); }
    50% { text-shadow: 0 0 50px rgba(212, 175, 55, 0.9), 0 0 80px rgba(212, 175, 55, 0.5); }
}

.cart-divider {
    width: 50px;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
    margin: 20px auto;
    position: relative;
}

.cart-divider::before {
    content: '◆';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: var(--gold);
    font-size: 10px;
    background: rgba(10, 20, 16, 0.8);
    padding: 0 10px;
}

.cart-subtitle {
    font-family: var(--font-display);
    font-size: 18px;
    font-style: italic;
    color: var(--gold-light, #f4d47c);
    margin-top: 10px;
    letter-spacing: 1px;
}
/* === БАННЕР ШКАТУЛКИ === */
.cart-banner {
    width: 100%;
    max-width: 100%;
    margin: 0 auto 50px;
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    height: 400px; /* Было 200px */
    border: 2px solid rgba(212, 175, 55, 0.5);
    box-shadow: 
        0 15px 50px rgba(0, 0, 0, 0.6),
        0 0 40px rgba(212, 175, 55, 0.2),
        inset 0 0 40px rgba(212, 175, 55, 0.05);
    animation: bannerGlow 3s ease-in-out infinite;
}

.cart-banner::before {
    content: '';
    position: absolute;
    inset: 15px; /* Чуть больше отступ для большой рамки */
    border: 1px solid rgba(212, 175, 55, 0.4);
    border-radius: 6px;
    z-index: 2;
    pointer-events: none;
    transition: all 0.6s ease;
}

.cart-banner::after {
    content: '❖';
    position: absolute;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    color: var(--gold, #d4af37);
    font-size: 20px;
    z-index: 3;
    text-shadow: 0 0 15px var(--gold, #d4af37);
}

.cart-banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.8s ease;
    filter: saturate(0.9) contrast(1.05);
}

.cart-banner:hover::before {
    opacity: 0.9;
    inset: 18px;
}

.cart-banner:hover img {
    transform: scale(1.05);
    filter: saturate(1.1) contrast(1.1);
}

@keyframes bannerGlow {
    0%, 100% { 
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.6), 0 0 40px rgba(212, 175, 55, 0.2); 
    }
    50% { 
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.6), 0 0 60px rgba(212, 175, 55, 0.4), 0 0 100px rgba(212, 175, 55, 0.15); 
    }
}

@media (max-width: 768px) {
    .cart-banner {
        height: 300px; /* Было 150px */
    }
}

@media (max-width: 480px) {
    .cart-banner {
        height: 240px; /* Было 120px */
    }
}

/* === АДАПТИВ ЗАГОЛОВКА === */
@media (max-width: 768px) {
    .cart-hero-content {
        padding: 35px 25px;
        max-width: 90%;
    }
    
    .cart-title {
        font-size: clamp(1.8rem, 6vw, 2.5rem);
    }
    
    .cart-subtitle {
        font-size: 16px;
    }
}

/* === ШКАТУЛКА === */
.treasure-chest {
    background: linear-gradient(135deg, rgba(20, 30, 24, 0.85) 0%, rgba(10, 20, 16, 0.95) 100%);
    backdrop-filter: blur(35px);
    border: 2px solid rgba(212, 175, 55, 0.4);
    border-radius: 20px;
    padding: 50px;
    box-shadow:
        0 40px 80px rgba(0,0,0,0.7),
        0 0 60px rgba(212, 175, 55, 0.3),
        inset 0 0 80px rgba(212, 175, 55, 0.05);
    position: relative;
    overflow: hidden;
}

.treasure-chest::before {
    content: '';
    position: absolute;
    inset: 15px;
    border: 1px solid rgba(212, 175, 55, 0.3);
    border-radius: 12px;
    pointer-events: none;
}

/* === ПУСТАЯ КОРЗИНА === */
.empty-cart {
    text-align: center;
    padding: 80px 20px;
}

.empty-cart-icon {
    font-size: 5rem;
    margin-bottom: 30px;
    opacity: 0.5;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

.empty-cart h2 {
    font-family: var(--font-serif);
    font-size: 2rem;
    color: var(--gold);
    margin-bottom: 20px;
    letter-spacing: 2px;
}

.empty-cart p {
    font-size: 1.2rem;
    color: var(--text);
    margin-bottom: 40px;
    font-style: italic;
}

/* === СПИСОК ТОВАРОВ === */
.cart-items {
    display: flex;
    flex-direction: column;
    gap: 30px;
    margin-bottom: 40px;
}

.cart-item {
    display: grid;
    grid-template-columns: 120px 1fr auto;
    gap: 30px;
    align-items: center;
    padding: 25px;
    background: rgba(10, 20, 16, 0.6);
    border: 1px solid rgba(212, 175, 55, 0.2);
    border-radius: 12px;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.cart-item::before {
    content: '';
    position: absolute;
    inset: 8px;
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-radius: 8px;
    pointer-events: none;
}

.cart-item:hover {
    border-color: rgba(212, 175, 55, 0.5);
    box-shadow: 0 10px 40px rgba(212, 175, 55, 0.2);
    transform: translateY(-3px);
}

.cart-item-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    overflow: hidden;
    border: 2px solid var(--gold);
    box-shadow: 0 0 30px rgba(212, 175, 55, 0.4);
    position: relative;
}

.cart-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cart-item-info {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.cart-item-name {
    font-family: var(--font-serif);
    font-size: 1.4rem;
    color: var(--gold);
    letter-spacing: 1px;
}

.cart-item-price {
    font-size: 1.2rem;
    color: var(--text);
}

.cart-item-controls {
    display: flex;
    align-items: center;
    gap: 15px;
}

.quantity-control {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(212, 175, 55, 0.1);
    border: 1px solid rgba(212, 175, 55, 0.3);
    border-radius: 8px;
    padding: 8px 15px;
}

.quantity-btn {
    background: transparent;
    border: none;
    color: var(--gold);
    font-size: 1.2rem;
    cursor: pointer;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
}

.quantity-btn:hover {
    color: var(--gold-light);
    transform: scale(1.2);
}

.quantity-value {
    font-family: var(--font-serif);
    font-size: 1.2rem;
    color: var(--gold);
    min-width: 30px;
    text-align: center;
}

.remove-btn {
    background: transparent;
    border: 1px solid rgba(217, 74, 38, 0.4);
    color: #ff8845;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-family: var(--font-serif);
    font-size: 0.9rem;
    letter-spacing: 1px;
    transition: all 0.3s;
}

.remove-btn:hover {
    background: rgba(217, 74, 38, 0.2);
    border-color: #ff8845;
    box-shadow: 0 0 20px rgba(217, 74, 38, 0.3);
}

/* === ИТОГО === */
.cart-summary {
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.1) 0%, rgba(139, 105, 20, 0.05) 100%);
    border: 2px solid rgba(212, 175, 55, 0.4);
    border-radius: 12px;
    padding: 30px;
    text-align: center;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    font-size: 1.1rem;
}

.summary-row.total {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid rgba(212, 175, 55, 0.3);
    font-size: 1.5rem;
    font-family: var(--font-serif);
    color: var(--gold);
}

.checkout-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    width: 100%;
    max-width: 400px;
    margin-top: 30px;
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
    color: var(--forest-dark);
    border: none;
    padding: 18px 40px;
    font-size: 1.1rem;
    font-weight: 700;
    font-family: var(--font-serif);
    letter-spacing: 3px;
    text-transform: uppercase;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.4s;
    box-shadow: 0 10px 40px rgba(212, 175, 55, 0.4);
}

.checkout-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 60px rgba(212, 175, 55, 0.7);
    letter-spacing: 4px;
}

/* === АДАПТИВ === */
@media (max-width: 768px) {
    .cart-item {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .cart-item-image {
        margin: 0 auto;
    }
    
    .cart-item-controls {
        flex-direction: column;
    }
    
    .treasure-chest {
        padding: 30px 20px;
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

<!-- Элементы золотого курсора -->
<div class="cursor" id="cursor"></div>
<div class="cursor-trail" id="cursor-trail"></div>

<!-- Контейнер корзины -->
<div class="cart-container">
<div class="cart-hero-content">
    <div class="cart-label" data-i18n="cart_label">Сокровища</div>
    <h1 class="cart-title" data-i18n="cart_title">Шкатулка Сокровищ</h1>
    <div class="cart-divider"></div>
    <p class="cart-subtitle" data-i18n="cart_subtitle">Ваши избранные украшения</p>
</div>  

<!-- Фото-баннер шкатулки -->
<div class="cart-banner reveal">
    <img src="images/cart-banner.jpg" alt="Шкатулка сокровищ" 
         onerror="this.parentElement.style.display='none'">
</div>

    <div class="treasure-chest">
        <div id="cartContent">
            <!-- Контент загружается через JavaScript -->
        </div>
    </div>
</div>

<script>
// === ЗОЛОТОЙ КУРСОР ===
const cartCursor = document.getElementById('cursor');
const cartCursorTrail = document.getElementById('cursor-trail');

if (cartCursor && cartCursorTrail && window.matchMedia("(hover: hover)").matches) {
    let mouseX = 0, mouseY = 0;
    let trailX = 0, trailY = 0;
    
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        cartCursor.style.left = mouseX + 'px';
        cartCursor.style.top = mouseY + 'px';
    });
    
    function animateTrail() {
        trailX += (mouseX - trailX) * 0.15;
        trailY += (mouseY - trailY) * 0.15;
        cartCursorTrail.style.left = trailX + 'px';
        cartCursorTrail.style.top = trailY + 'px';
        requestAnimationFrame(animateTrail);
    }
    animateTrail();
}

// === СВЕТЛЯЧКИ ===
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

// === РЕНДЕР КОРЗИНЫ ===
function renderCart() {
    const cartContent = document.getElementById('cartContent');
    if (!cartContent) return;
    
    if (typeof magicCart === 'undefined') {
        console.error('magicCart не загружен!');
        cartContent.innerHTML = '<div class="empty-cart"><p>Загрузка корзины...</p></div>';
        return;
    }
    
    // ✅ ИСПРАВЛЕНО: используем глобальную переменную currentLang из translations.js
    const lang = (typeof currentLang !== 'undefined') ? currentLang : 'ru';
    const t = translations[lang] || translations.ru;
    
    const items = magicCart.getItems();
    
    if (items.length === 0) {
        cartContent.innerHTML = `
            <div class="empty-cart">
                <div class="empty-cart-icon">🗝️</div>
                <h2 data-i18n="cart_empty_title">${t.cart_empty_title}</h2>
                <p>${t.cart_empty_text}</p>
                <a href="index.php#elements" class="checkout-btn">${t.cart_empty_btn}</a>
            </div>
        `;
        return;
    }
    
    let itemsHTML = '<div class="cart-items">';
    
    items.forEach(item => {
    // ✅ Получаем перевод названия через nameKey
    const productName = (item.nameKey && t[item.nameKey]) ? t[item.nameKey] : item.name;
    
    itemsHTML += `
        <div class="cart-item">
            <div class="cart-item-image">
                <img src="${item.image}" alt="${productName}">
            </div>
            <div class="cart-item-info">
                <div class="cart-item-name">${productName}</div>
                <div class="cart-item-price">${item.price.toLocaleString()} ₽</div>
            </div>
            <div class="cart-item-controls">
                <div class="quantity-control">
                    <button class="quantity-btn" onclick="updateQuantity('${item.id}', ${item.quantity - 1})">−</button>
                    <span class="quantity-value">${item.quantity}</span>
                    <button class="quantity-btn" onclick="updateQuantity('${item.id}', ${item.quantity + 1})">+</button>
                </div>
                <button class="remove-btn" onclick="removeItem('${item.id}')">${t.cart_remove}</button>
            </div>
        </div>
    `;
});
    itemsHTML += '</div>';
    
    const total = magicCart.getTotal();
    const itemCount = magicCart.getItemCount();
    
    itemsHTML += `
        <div class="cart-summary">
            <div class="summary-row">
                <span>${t.cart_items_count}</span>
                <span>${itemCount}</span>
            </div>
            <div class="summary-row total">
                <span>${t.cart_total}</span>
                <span>${total.toLocaleString()} ₽</span>
            </div>
            <button class="checkout-btn" onclick="checkout()">
                <span>${t.cart_checkout}</span>
                <span class="arrow">→</span>
            </button>
        </div>
    `;
    
    cartContent.innerHTML = itemsHTML;
}
function updateQuantity(itemId, quantity) {
    if (typeof magicCart !== 'undefined') {
        magicCart.updateQuantity(itemId, quantity);
        renderCart();
    }
}

function removeItem(itemId) {
    if (typeof magicCart !== 'undefined') {
        magicCart.removeItem(itemId);
        renderCart();
    }
}

function checkout() {
    alert('✨ Благодарим за выбор! ✨\n\nМы свяжемся с вами для подтверждения заказа.');
}

// Инициализация при загрузке страницы
window.addEventListener('DOMContentLoaded', () => {
    renderCart();
});
</script>

<?php include 'includes/footer.php'; ?>