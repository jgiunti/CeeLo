$(document).ready(function()
{                     
    $('#btnRoll').click(function()
    {             
        dice1 = Math.floor((Math.random() * 6) + 1);
        dice2 = Math.floor((Math.random() * 6) + 1);
        dice3 = Math.floor((Math.random() * 6) + 1);
        alert(dice1);
        alert(dice2);
        alert(dice3);  
        
        $.post("../php/gameController.php", { d1: dice1, d2: dice2, d3 : dice3 }, function(rText, status)
        {                           
            alert(rText);
        });
   });  
});





