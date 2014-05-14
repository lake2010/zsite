$(document).ready(function()
{
    $.setAjaxForm('#sortForm');

    $('.icon-arrow-up').click(function()
    {
        $(this).parents('tr').prev().before($(this).parents('tr'));
        sort();
    });

    $('.icon-arrow-down').click(function()
    {
        $(this).parents('tr').next().after($(this).parents('tr'));
        sort();
    });

    $('.carousel-inner .item .btn-resize').click(function()
    {
        var $this = $(this);
        $this.find('i').toggleClass('icon-resize-full').toggleClass('icon-resize-small');
        $this.closest('.item').toggleClass('show');
    });
    
});

function sort()
{
    $('input[name*=order]').each(function(index, obj) { $(this).val(index + 1); });
    messager.warning(v.sortTip);
}
