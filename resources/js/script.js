// DOMの読み込みが完了したら実行
document.addEventListener('DOMContentLoaded', () => {
    const tabButtons = document.querySelectorAll('#menuTabs button');
    const menuItems = document.querySelectorAll('#menuItems > div');

    const filterItems = (category) => {
        menuItems.forEach(item => {
            item.style.display = (category === 'all' || item.dataset.category === category) ? '' : 'none';
        });
    };

    tabButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const category = button.getAttribute('data-category');

            // タブボタンのスタイル変更
            tabButtons.forEach(btn => {
                btn.classList.remove('bg-blue-500', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            button.classList.remove('bg-gray-200', 'text-gray-700');
            button.classList.add('bg-blue-500', 'text-white');

            // メニュー項目のフィルタリング
            filterItems(category);
        });
    });

    // 初期表示時は「すべて」を選択状態にする
    filterItems('all');

    // 商品ごとの価格計算機能
    const initializePriceCalculator = (productId) => {
        const quantityInput = document.getElementById(`quantity-${productId}`);
        const priceElement = document.getElementById(`price-${productId}`);
        const decreaseBtn = document.getElementById(`decrease-${productId}`);
        const increaseBtn = document.getElementById(`increase-${productId}`);
        const basePrice = parseInt(priceElement.dataset.basePrice);

        // 価格を更新する関数
        const updatePrice = () => {
            const quantity = parseInt(quantityInput.value);
            const totalPrice = basePrice * quantity;
            priceElement.textContent = `¥${totalPrice.toLocaleString()}`;
        };

        // 数量入力時に価格を更新
        quantityInput.addEventListener('input', updatePrice);

        // 減少ボタンクリック時の処理
        decreaseBtn.addEventListener('click', () => {
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                updatePrice();
            }
        });

        // 増加ボタンクリック時の処理
        increaseBtn.addEventListener('click', () => {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updatePrice();
        });

        // 初期表示時に価格を更新
        updatePrice();
    };

    // 全ての商品の価格計算機能を初期化
    document.querySelectorAll('[id^="price-"]').forEach(priceElement => {
        const productId = priceElement.id.split('-')[1];
        initializePriceCalculator(productId);
    });
});