$(document).ready(function(){
    $.toast.config.align = 'right';
    $.toast.config.width = 400;

    $('button').click(function(){
        createToast($(this).attr('class'));
    });
});