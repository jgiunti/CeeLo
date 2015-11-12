$(document).ready(function()
{                
    $('#leaderBoard').css({'visibility':'visible'});   
    $.ajax({
        url: "../php/leaderBoard.php",
        dataType: 'json',
        success: function(jsonData) 
        {	
            $.each(jsonData, function()
            {
                $('#leaderBoard').append("<tr><td>" + jsonData[0][0] + "</td><td>" + jsonData[0][1] +"</td></tr>"); 
            });  
            alert('error');
        },
        error: function(json_Data)
        {
            alert('Connection Error');
        }
    });   
});



