$(document).ready(function()
{              
    $('#leaderBoard').css({'visibility':'visible'});   
    
    $.getJSON( '../php/leaderboard.php', function( data ) 
    {
        $.each( data, function( data ) {
          $('#leaderBoard').append("<tr><td>" + data[0][0] + "</td><td>" + data[0][1] +"</td></tr>"); 
        });       
     });         
});



