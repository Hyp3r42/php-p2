const acceptButton = document.getElementById('accept-button');
const cookieOverlay = document.getElementById('cookie-overlay');
const content = document.getElementById('content');

acceptButton.addEventListener('click', function() {
  cookieOverlay.style.display = 'none';
  content.style.display = 'block';
});