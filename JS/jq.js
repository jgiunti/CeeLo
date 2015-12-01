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
            newGameRedir(1);
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
                    newGameRedir(response[1]);
                }
            }
            catch(error)
            {
                $('#dialog').html("There are no games in progress. Would you like to start a new game?").promise().done(function() {
                    $('#dialog').dialog("open");
                });
            }
            
        });       
    });
   
   $('#profile').click(function()
    {             
        window.location = "php/account.php";
   });
   
   $('#btnBack').click(function()
    {             
        window.location = "../main.php";
   });
   
   var dialog = $("#dialog");

    dialog.dialog({
        title: "Can't Continue",
        modal: true,
        draggable: false,
        resizable: false,
        autoOpen: false,
        width: 500,
        height: 400,
        buttons: [
        {
            text: "Ok",
            "class": 'btn',
            click: function() {
              newGameRedir(1);;
            }
 
      
        },
        {
            text: "Cancel",
            "class": 'btn',
            click: function() {
                $(this).dialog("close");
            }
        }
      ]
    }); 
});

function newGameRedir(turn) {
    $('.hiddenForm').html('<form action="php/game.php" name="frmTurn" method="post" style="display:none;"><input type="text" name="turn" value="'+ turn +'" /></form>');
    document.forms['frmTurn'].submit();
}

