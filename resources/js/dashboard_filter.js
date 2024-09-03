document.addEventListener('DOMContentLoaded', () => {
  const tabButtons = document.querySelectorAll('#dashTabs button');
  const menuItems = document.querySelectorAll('#dashTabs > div');

  const filterItems = (status) => {
    menuItems.forEach((item) => {
      item.style.display =
        status === 'all' || item.dataset.status === status ? '' : 'none';
    });
  };

  tabButtons.forEach((button) => {
    button.addEventListener('click', (event) => {
      event.preventDefault();
      const status = button.getAttribute('data-status');

      // タブボタンのスタイル変更
      tabButtons.forEach((btn) => {
        btn.classList.remove('bg-blue-500', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
      });
      button.classList.remove('bg-gray-200', 'text-gray-700');
      button.classList.add('bg-blue-500', 'text-white');

      // メニュー項目のフィルタリング
      filterItems(status);
    });
  });

  // 初期表示時は「すべて」を選択状態にする
  filterItems('all');
});
