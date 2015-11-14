<<<<<<< HEAD
document.getElementById('toggle').addEventListener('click', function () {
=======
document.getElementById('toggleProfile').addEventListener('click', function () {
>>>>>>> master
  [].map.call(document.querySelectorAll('.prof'), function(el) {
    el.classList.toggle('prof--open');
  });
});
