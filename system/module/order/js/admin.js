$(document).ready(function()
{
    $( document ).on( 'click', '.finisher', function()
    {
        confirmLink = $(this).data('rel');
        bootbox.confirm(v.finishWarning, function(result)
        {
            if(!result) return true;
            $.getJSON(confirmLink, function (response)
            {
                if(response.result == 'success')
                {
                    bootbox.alert(response.message, function(){ location.reload(); });
                }
            })
        });
        return true;
    });
})
