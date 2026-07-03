// 1. Словари переводов
const translations = {
    ru: {
		
		// Header (навигация)
        nav_elements: "Стихии",
        nav_fire: "Огонь",
        nav_water: "Вода",
        nav_earth: "Земля",
        nav_air: "Воздух",
        nav_game: "Игра",
        nav_contacts: "Контакты",
        
        // Footer
        footer_rights: "© 2026 Все права защищены",
		
        hero_title_1: "Авторские",
        hero_title_accent: "украшения",
        hero_title_2: "зачарованного леса",
        manifesto_label: " Философия ✦",
        manifesto_text: '<span class="dropcap gold-text-contrast">К</span>аждое украшение — это <span class="gold gold-text-contrast">заклинание в бисере</span>, произнесённое руками мастера. В тишине <span class="gold gold-text-contrast">первозданных лесов</span>, где свет луны переплетается с туманом, рождаются украшения, хранящие <span class="gold gold-text-contrast">древнюю магию</span> природы.',
        elements_label: "Четыре стихии",
        elements_title: "Выберите свою",
        elements_title_accent: "стихию",
        fire_name: "Огонь",
        fire_subtitle: "Страсть, сила, transformation",
        fire_description: "Украшения, рождённые в пламени. Хранит в себе искру вечного огня.",
        fire_cta: "Войти в пламя",
        water_name: "Вода",
        water_subtitle: "Тайна, глубина, течение",
        water_description: "Украшения, рождённые в глубинах океана. Хранит в себе шёпот морских волн.",
        water_cta: "Погрузиться",
        earth_name: "Земля",
        earth_subtitle: "Корни, природа, стабильность",
        earth_description: "Украшения, рождённые из почвы и корней древних деревьев. Хранит силу земли.",
        earth_cta: "Прикоснуться",
        air_name: "Воздух",
        air_subtitle: "Лёгкость, свобода, мечты",
        air_description: "Украшения, рождённые из ветра и звёздного света. Хранит дыхание небес.",
        air_cta: "Взлететь",  
        
        // Страница Воздуха
        air_collection_label: "Коллекция",
        air_collection_title: "Воздух",
        air_collection_subtitle: "Лёгкость, свобода, мечты",
        air_collection_description: "Украшения, рождённые из ветра и звёздного света. Жемчуг, горный хрусталь, перламутр — каждый артефакт хранит в себе дыхание небес и шёпот крыльев.",
        air_jewelry_type: "Колье",
        air_product_1_name: "Перо Феникса",
        air_product_2_name: "Звёздная Пыль",
        air_product_3_name: "Дыхание Весны",
        air_jewelry_cta: "узнать больше",
		
        
        // Страница Воды
        water_collection_label: "Коллекция",
        water_collection_title: "Вода",
        water_collection_description: "Украшения, рождённые в глубинах океана. Аквамарины, лунный камень, жемчуг — каждый артефакт хранит в себе шёпот морских волн и тайны подводного мира.",
        water_jewelry_type: "Колье",
        water_product_1_name: "Слёзы Русалки",
        water_product_2_name: "Лунный Прилив",
        water_product_3_name: "Жемчужина Глубин",
        water_jewelry_cta: "узнать больше",
		
		
		// Страница Огня:
fire_collection_label: "Коллекция",
fire_collection_title: "Огонь",
fire_collection_description: "Украшения, рождённые в пламени. Красные гранаты, янтарь, огненные опалы — каждый артефакт хранит в себе искру вечного огня.",
fire_jewelry_type: "Колье",
fire_product_1_name: "Танец Саламандры",
fire_product_2_name: "Пепел Феникса",
fire_product_3_name: "Сердце Солнца",
fire_jewelry_cta: "узнать больше",

// Страница земли:
earth_collection_label: "Коллекция",
earth_collection_title: "Земля",
earth_collection_description: "Украшения, рождённые из почвы и корней древних деревьев. Агат, янтарь, виноградная лоза — каждый артефакт хранит в себе силу земли и дыхание леса.",
earth_jewelry_type: "Колье",
earth_product_1_name: "Корни Древа",
earth_product_2_name: "Побеги Омни",
earth_product_3_name: "Сиреневая Роза",
earth_jewelry_cta: "узнать больше",

// Песнь Феникса:
product_fire_tag: "Святилище Огня",
product_fire_type: "Колье",
product_fire_name: "Песнь Феникса",
product_fire_price: "8 900 ₽",
product_fire_price_note: "• Ограниченная серия",
product_fire_story: '<span class="dropcap gold-text-contrast">Э</span>то ювелирное творение соткано из красных капель настоящего красного коралла. Каждая деталь ложится на круглый гематит сверкая серебряным бисером.',
product_fire_button: "Завладеть шедевром",

// Игра:
game_title: "✨ Котик-Ювелир ✨",
game_subtitle: "Помоги котику собрать магию стихий и создать волшебное украшение!",
game_score_label: "Собрано магии",
game_jewelry_label: "Украшений создано",
game_fire: "🔥 Огонь",
game_water: "💧 Вода",
game_earth: "🌿 Земля",
game_air: "💨 Воздух",
game_controls: "✦ Управление: стрелки или WASD ✦ На мобильном: касание экрана ✦",
game_modal_title: "✨ Украшение создано! ✨",
game_reward_text: "Котик создал волшебное украшение из стихий!",
game_btn_want: "Хочу такое же!",
game_btn_continue: "Продолжить игру",


// Корзина:
cart_label: "Сокровища",
cart_title: "Шкатулка Сокровищ",
cart_subtitle: "Ваши избранные украшения",
cart_empty_title: "Шкатулка пуста",
cart_empty_text: "Сокровища ждут вас в коллекциях стихий!",
cart_empty_btn: "Исследовать коллекции",
cart_items_count: "Количество украшений:",
cart_total: "Итого:",
cart_checkout: "Оформить заказ",
cart_remove: "Удалить",
cart_notification: "Украшение добавлено в шкатулку! ✨",

// все украшения:
product_water_tag: "Святилище Воды",
product_water_price_note: "• Ограниченная серия",
product_water_story: '<span class="dropcap gold-text-contrast">Э</span>то украшение рождено в глубинах океана. Каждая деталь хранит шёпот морских волн.',
product_water_button: "Завладеть шедевром",

product_earth_tag: "Святилище Земли",
product_earth_price_note: "• Ограниченная серия",
product_earth_story: '<span class="dropcap gold-text-contrast">Э</span>то украшение создано из силы земли. Каждая деталь хранит дыхание леса.',
product_earth_button: "Завладеть шедевром",

product_air_tag: "Святилище Воздуха",
product_air_price_note: "• Ограниченная серия",
product_air_story: '<span class="dropcap gold-text-contrast">Э</span>то украшение рождено из ветра и звёздного света. Каждая деталь хранит дыхание небес.',
product_air_button: "Завладеть шедевром",

// Описания товаров
story_salamander_dance: '<span class="dropcap gold-text-contrast">Э</span>то колье хранит в себе искру вечного огня и силу стихии.',
story_phoenix_ash: '<span class="dropcap gold-text-contrast">Т</span>ам, где пламя танцует, рождается магия. Это колье соткано из красных капель настоящего коралла и круглого гематита, сверкающего серебряным бисером.',
story_heart_of_sun: '<span class="dropcap gold-text-contrast">Я</span>нтарь, огненный бисер — это искра вечного солнца.',
story_mermaid_tears: '<span class="dropcap gold-text-contrast">К</span>апля, упавшая с ресниц морской девы. Стразы, настоящий лунный камень — шёпот морских волн.',
story_moon_tide: '<span class="dropcap gold-text-contrast">С</span>вет луны, застывший в колье. Это украшение хранит тайны подводного мира и дыхание океана.',
story_pearl_depths: '<span class="dropcap gold-text-contrast">Т</span>ам, где молчит океан, рождается жемчуг. А главное украшение — это краб, который его оберегает.',
story_tree_roots: '<span class="dropcap gold-text-contrast">Т</span>ам, где корни уходят в вечность. Это украшение хранит в себе силу земли и дыхание древнего леса.',
story_omni_sprouts: '<span class="dropcap gold-text-contrast">Л</span>иства, сплетённая из бисера. Каждый побег хранит в себе жизненную силу земли.',
story_lilac_rose: '<span class="dropcap gold-text-contrast">К</span>амень, в котором застыла душа цветка. Сиреневая роза хранит в себе нежность и магию весеннего леса.',
story_phoenix_feather: '<span class="dropcap gold-text-contrast">П</span>еро выпало и остыло. Перо Феникса хранит в себе дыхание небес и лёгкость ветра.',
story_stardust: '<span class="dropcap gold-text-contrast">О</span>сколки далёких миров, собранные в ожерелье. Звёздная пыль хранит в себе свет ночного неба.',
story_breath_of_spring: '<span class="dropcap gold-text-contrast">Д</span>ыхание весеннего ветра, застывшее в сиреневых цветах из полимерной глины. Хранит лёгкость и свободу лепестков.',


    },
    en: {
		
		// Header (navigation)
        nav_elements: "Elements",
        nav_fire: "Fire",
        nav_water: "Water",
        nav_earth: "Earth",
        nav_air: "Air",
        nav_game: "Game",
        nav_contacts: "Contacts",
        
        // Footer
        footer_rights: "© 2026 All rights reserved",
		
        hero_title_1: "Author's",
        hero_title_accent: "jewelry",
        hero_title_2: "of the enchanted forest",
        manifesto_label: " Philosophy ✦",
        manifesto_text: '<span class="dropcap gold-text-contrast">E</span>very piece of jewelry is a <span class="gold gold-text-contrast">spell in beads</span>, spoken by the hands of a master. In the silence of <span class="gold gold-text-contrast">pristine forests</span>, where moonlight intertwines with fog, jewelry is born, keeping the <span class="gold gold-text-contrast">ancient magic</span> of nature.',
        elements_label: "Four elements",
        elements_title: "Choose your",
        elements_title_accent: "element",
        fire_name: "Fire",
        fire_subtitle: "Passion, strength, transformation",
        fire_description: "Jewelry born in the flame. Keeps within itself the spark of the eternal fire.",
        fire_cta: "Enter the flame",
        water_name: "Water",
        water_subtitle: "Mystery, depth, flow",
        water_description: "Jewelry born in the depths of the ocean. Keeps the whisper of the sea waves.",
        water_cta: "Dive in",
        earth_name: "Earth",
        earth_subtitle: "Roots, nature, stability",
        earth_description: "Jewelry born from the soil and roots of ancient trees. Keeps the power of the earth.",
        earth_cta: "Touch",
        air_name: "Air",
        air_subtitle: "Lightness, freedom, dreams",
        air_description: "Jewelry born from the wind and starlight. Keeps the breath of the heavens.",
        air_cta: "Take flight",  

        // Air page
        air_collection_label: "Collection",
        air_collection_title: "Air",
        air_collection_subtitle: "Lightness, freedom, dreams",
        air_collection_description: "Jewelry born from the wind and starlight. Pearls, rock crystal, mother-of-pearl — each artifact keeps within itself the breath of the heavens and the whisper of wings.",
        air_jewelry_type: "Necklace",
        air_product_1_name: "Phoenix Feather",
        air_product_2_name: "Stardust",
        air_product_3_name: "Breath of Spring",
        air_jewelry_cta: "learn more",
		
		// Water page
        water_collection_label: "Collection",
        water_collection_title: "Water",
        water_collection_description: "Jewelry born in the depths of the ocean. Aquamarines, moonstone, pearls — each artifact keeps within itself the whisper of sea waves and the secrets of the underwater world.",
        water_jewelry_type: "Necklace",
        water_product_1_name: "Mermaid's Tears",
        water_product_2_name: "Moon Tide",
        water_product_3_name: "Pearl of the Depths",
        water_jewelry_cta: "learn more",
		
		
// Fire page:
fire_collection_label: "Collection",
fire_collection_title: "Fire",
fire_collection_description: "Jewelry born in the flame. Red garnets, amber, fire opals — each artifact keeps within itself the spark of the eternal fire.",
fire_jewelry_type: "Necklace",
fire_product_1_name: "Salamander's Dance",
fire_product_2_name: "Phoenix Ash",
fire_product_3_name: "Heart of the Sun",
fire_jewelry_cta: "learn more",

// Land page:
earth_collection_label: "Collection",
earth_collection_title: "Earth",
earth_collection_description: "Jewelry born from the soil and roots of ancient trees. Agate, amber, grapevine — each artifact keeps within itself the power of the earth and the breath of the forest.",
earth_jewelry_type: "Necklace",
earth_product_1_name: "Roots of the Tree",
earth_product_2_name: "Omni Sprouts",
earth_product_3_name: "Lilac Rose",
earth_jewelry_cta: "learn more",

// Song of the Phoenix:
product_fire_tag: "Sanctuary of Fire",
product_fire_type: "Necklace",
product_fire_name: "Song of the Phoenix",
product_fire_price: "8,900 ₽",
product_fire_price_note: "• Limited edition",
product_fire_story: '<span class="dropcap gold-text-contrast">T</span>his jewelry creation is woven from red drops of real red coral. Every detail rests on a round hematite, sparkling with silver beads.',
product_fire_button: "Own the masterpiece",

// Game:
game_title: "✨ Jeweler Cat ✨",
game_subtitle: "Help the cat collect elemental magic and create a magical jewelry!",
game_score_label: "Magic collected",
game_jewelry_label: "Jewelry created",
game_fire: "🔥 Fire",
game_water: "💧 Water",
game_earth: "🌿 Earth",
game_air: "💨 Air",
game_controls: "✦ Controls: arrows or WASD ✦ On mobile: touch the screen ✦",
game_modal_title: "✨ Jewelry created! ✨",
game_reward_text: "The cat created a magical jewelry from the elements!",
game_btn_want: "I want the same!",
game_btn_continue: "Continue game",


// Chest:
cart_label: "Treasures",
cart_title: "Treasure Chest",
cart_subtitle: "Your chosen jewelry",
cart_empty_title: "The chest is empty",
cart_empty_text: "Treasures await you in the elemental collections!",
cart_empty_btn: "Explore collections",
cart_items_count: "Number of items:",
cart_total: "Total:",
cart_checkout: "Place order",
cart_remove: "Remove",
cart_notification: "Jewelry added to the chest! ✨",
cart_notification_en: "Jewelry added to the chest! ✨",

// all necklaces:
product_water_tag: "Sanctuary of Water",
product_water_price_note: "• Limited edition",
product_water_story: '<span class="dropcap gold-text-contrast">T</span>his jewelry was born in the depths of the ocean. Every detail keeps the whisper of sea waves.',
product_water_button: "Own the masterpiece",

product_earth_tag: "Sanctuary of Earth",
product_earth_price_note: "• Limited edition",
product_earth_story: '<span class="dropcap gold-text-contrast">T</span>his jewelry is created from the power of the earth. Every detail keeps the breath of the forest.',
product_earth_button: "Own the masterpiece",

product_air_tag: "Sanctuary of Air",
product_air_price_note: "• Limited edition",
product_air_story: '<span class="dropcap gold-text-contrast">T</span>his jewelry was born from the wind and starlight. Every detail keeps the breath of the heavens.',
product_air_button: "Own the masterpiece",
		
// Product stories
story_salamander_dance: '<span class="dropcap gold-text-contrast">T</span>his necklace holds the spark of eternal fire and the power of the element.',
story_phoenix_ash: '<span class="dropcap gold-text-contrast">W</span>here the flame dances, magic is born. This necklace is woven from red drops of real coral and round hematite, sparkling with silver beads.',
story_heart_of_sun: '<span class="dropcap gold-text-contrast">A</span>mber and fiery beads — this is the spark of the eternal sun.',
story_mermaid_tears: '<span class="dropcap gold-text-contrast">A</span> drop that fell from the eyelashes of a mermaid. Rhinestones and real moonstone — the whisper of sea waves.',
story_moon_tide: '<span class="dropcap gold-text-contrast">M</span>oonlight frozen in a necklace. This jewelry keeps the secrets of the underwater world and the breath of the ocean.',
story_pearl_depths: '<span class="dropcap gold-text-contrast">W</span>here the ocean is silent, pearls are born. And the main decoration is the crab that guards it.',
story_tree_roots: '<span class="dropcap gold-text-contrast">W</span>here the roots go into eternity. This jewelry keeps the power of the earth and the breath of the ancient forest.',
story_omni_sprouts: '<span class="dropcap gold-text-contrast">F</span>oliage woven from beads. Each sprout keeps the vital force of the earth.',
story_lilac_rose: '<span class="dropcap gold-text-contrast">A</span> stone in which the soul of a flower has frozen. The lilac rose keeps the tenderness and magic of the spring forest.',
story_phoenix_feather: '<span class="dropcap gold-text-contrast">T</span>he feather fell and cooled. The Phoenix Feather keeps the breath of the heavens and the lightness of the wind.',
story_stardust: '<span class="dropcap gold-text-contrast">F</span>ragments of distant worlds collected in a necklace. Stardust keeps the light of the night sky.',
story_breath_of_spring: '<span class="dropcap gold-text-contrast">T</span>he breath of the spring wind, frozen in lilac flowers made of polymer clay. It keeps the lightness and freedom of petals.', 	
    }
};

// 2. Запоминаем текущий язык (по умолчанию русский)
let currentLang = 'ru';

// 3. Функция применения перевода
function applyTranslation(lang) {
    document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (translations[lang] && translations[lang][key]) {
            el.innerHTML = translations[lang][key];
        }
    });
    
    // Меняем текст на кнопке языка
    const langCurrent = document.querySelector('.lang-current');
    const langOther = document.querySelector('.lang-other');
    if (langCurrent && langOther) {
        if (lang === 'en') {
            langCurrent.textContent = 'EN';
            langOther.textContent = 'RU';
        } else {
            langCurrent.textContent = 'RU';
            langOther.textContent = 'EN';
        }
    }
    
    currentLang = lang;
    
    // ✅ ВАЖНО: обновляем корзину при смене языка
    if (typeof renderCart === 'function') {
        renderCart();
    }
}

// 4. Обработчик клика по кнопке
document.addEventListener('DOMContentLoaded', () => {
    const langBtn = document.querySelector('#langSwitch');    
    if (langBtn) {
        langBtn.addEventListener('click', () => {
            const newLang = currentLang === 'ru' ? 'en' : 'ru';
            applyTranslation(newLang);
        });
    }
});