$(document).ready(function()
{                     
    $('#btnViewHist').click(function()
    {             
        $('#gameHist').css({'visibility':'visible'});
   });  
   
   $('#new').click(function()
    {   
        $.post("php/mainController.php", { new: 1 }, function(rText, status)
        {   
            window.location = "php/game.php?turn=1";
        });  
        
   });
   
    $('#continue').click(function()
    {   
        $.post("php/mainController.php", { new: 0 }, function(rText, status)
        {
            var response = jQuery.parseJSON(rText);           
            if(response[0] == 'continue') {
                window.location = "php/game.php?turn=" + response[1];
            }
            else {
                alert('no game in progress');
            }
        });       
    });
   
   $('#profile').click(function()
    {             
        window.location = "php/account.php";
   });
});

