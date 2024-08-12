document.addEventListener('DOMContentLoaded', function() {
  var form = document.getElementById('registerForm');
  form.addEventListener('submit', function(event) {
      event.preventDefault();
      window.location.href = 'upload-download.html';
  });
});