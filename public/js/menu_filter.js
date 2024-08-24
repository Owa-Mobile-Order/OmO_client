// DOMの読み込みが完了したら実行
document.addEventListener('DOMContentLoaded', () => {
  const tabButtons = document.querySelectorAll('#menuTabs button');
  const menuItems = document.querySelectorAll('#menuItems > div');

  const filterItems = (category) => {
    menuItems.forEach((item) => {
      item.style.display =
        category === 'all' || item.dataset.category === category ? '' : 'none';
    });
  };

  tabButtons.forEach((button) => {
    button.addEventListener('click', (event) => {
      event.preventDefault();
      const category = button.getAttribute('data-category');

      // タブボタンのスタイル変更
      tabButtons.forEach((btn) => {
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
});
