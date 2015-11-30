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
            $('.hiddenForm').html('<form action="php/game.php" name="frmTurn" method="post" style="display:none;"><input type="text" name="turn" value="1" /></form>');
            document.forms['frmTurn'].submit();
        });  
        
   });
   
    $('#continue').click(function()
    {   
        $.post("php/mainController.php", { new: 0 }, function(rText, status)
        {              
            try
            {
                var response = jQuery.parseJSON(rText);             
                if(response[0] == 'continue') {
                    $('.hiddenForm').html('<form action="php/game.php" name="frmTurn" method="post" style="display:none;"><input type="text" name="turn" value="' + response[1] + '" /></form>');
                    document.forms['frmTurn'].submit();
                }
                else {
                    alert('no game in progress');
                }
            }
            catch(error)
            {
                alert('no game in progress');
            }
            
        });       
    });
   
   $('#profile').click(function()
    {             
        window.location = "php/account.php";
   });
   
   $('#btnBack').click(function()
    {             
        window.location = "../main.html";
   });
});

