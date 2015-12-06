document.getElementById('toggle').addEventListener('click', function ()
{
    [].map.call(document.querySelectorAll('.login'), function(el)
    {
        el.classList.toggle('login--open');
    });
});
