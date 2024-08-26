// JavaScript to handle dropdown menu toggle
document.addEventListener('DOMContentLoaded', function () {
  const userInfo = document.getElementById('user-info');
  const userModal = document.getElementById('user-modal');

  userInfo.addEventListener('click', function () {
    const rect = userInfo.getBoundingClientRect();
    userModal.style.top = `${rect.bottom}px`;
    userModal.style.left = `${rect.left - userModal.offsetWidth}px`;
    userModal.classList.toggle('hidden');
  });

  document.addEventListener('click', function (event) {
    if (!userInfo.contains(event.target) && !userModal.contains(event.target)) {
      userModal.classList.toggle('hidden');
    }
  });
});
