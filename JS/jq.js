$(document).ready(function()
{
    $('.btnViewHist').hover(function() 
    { 
        $('.btnViewHist').css({'background-color':'lightcyan'});
    },function()
    {
        $('.btnViewHist').css({'background-color':'grey'});
    });                 
    
    $('.btnViewHist').click(function()
    {   
        $('#gameHist').css({'visibility':'visible'});   
        $.ajax({
            type: 'POST',
            url: "../php/gameHist.php",
            dataType: 'json',
            data: 'userID=id', //will use session var in future to pass userID
            success: function(jsonData) 
            {	
                $.each(jsonData, function()
                {
                    $('#gameHist').append("<tr><td>" + jsonData[0][0] + "</td><td>" + jsonData[0][1] +"</td>><td>" + jsonData[0][2] +"</td></tr>"); 
                });                                            
            },
            error: function(json_Data)
            {
                alert('Connection Error');
            }
        });
    });  
});

