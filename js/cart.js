// === СИСТЕМА КОРЗИНЫ ===
class MagicCart {
    constructor() {
        this.items = JSON.parse(localStorage.getItem('magicCart')) || [];
        this.updateCartCount();
    }

    // Добавить товар
    addItem(item) {
        const existingItem = this.items.find(i => i.id === item.id);
        
        if (existingItem) {
            existingItem.quantity++;
        } else {
            this.items.push({ ...item, quantity: 1 });
        }
        
        this.save();
        this.showNotification();
    }

    // Удалить товар
    removeItem(itemId) {
        this.items = this.items.filter(i => i.id !== itemId);
        this.save();
    }

    // Изменить количество
    updateQuantity(itemId, quantity) {
        const item = this.items.find(i => i.id === itemId);
        if (item) {
            if (quantity <= 0) {
                this.removeItem(itemId);
            } else {
                item.quantity = quantity;
                this.save();
            }
        }
    }

    // Получить все товары
    getItems() {
        return this.items;
    }

    // Подсчитать общую сумму
    getTotal() {
        return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    }

    // Подсчитать количество товаров
    getItemCount() {
        return this.items.reduce((count, item) => count + item.quantity, 0);
    }

    // Очистить корзину
    clear() {
        this.items = [];
        this.save();
    }

    // Сохранить в localStorage
    save() {
        localStorage.setItem('magicCart', JSON.stringify(this.items));
        this.updateCartCount();
    }

    // Обновить счётчик в header
    updateCartCount() {
        const count = this.getItemCount();
        const cartCount = document.getElementById('cartCount');
        if (cartCount) {
            cartCount.textContent = count;
            cartCount.style.display = count > 0 ? 'flex' : 'none';
        }
    }

    // Показать уведомление
    showNotification() {
        // Определяем текущий язык
        const currentLang = document.documentElement.lang || 'ru';
        
        // Безопасно получаем перевод
        let message = 'Украшение добавлено в шкатулку! ✨';
        if (typeof translations !== 'undefined' && translations[currentLang] && translations[currentLang].cart_notification) {
            message = translations[currentLang].cart_notification;
        }
        
        const notification = document.createElement('div');
        notification.className = 'cart-notification';
        notification.textContent = message;
        document.body.appendChild(notification);
        
        setTimeout(() => notification.classList.add('show'), 10);
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 500);
        }, 3000);
    }
}

// Глобальный объект корзины
const magicCart = new MagicCart();