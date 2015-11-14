document.getElementById('toggle').addEventListener('click', function () {
  [].map.call(document.querySelectorAll('.prof'), function(el) {
    el.classList.toggle('prof--open');
  });
});
