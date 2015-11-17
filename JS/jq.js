$(document).ready(function()
{                     
    $('#btnViewHist').click(function()
    {             
        $('#gameHist').css({'visibility':'visible'});
   });  
   
   $('#new').click(function()
    {             
        window.location = "php/game.php?turn=1";
   });
   
   $('#profile').click(function()
    {             
        window.location = "php/account.php";
   });
});

