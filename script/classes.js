$('.actbutton').click(function() {
    $('.schoolfilter').removeClass('show');
    $('.stadfilter').removeClass('show');
    $('.maandfilter').removeClass('show');
    $('.actfilter').toggleClass('show');

    $('.schoolarrow').removeClass('turn');
    $('.stadarrow').removeClass('turn');
    $('.maandarrow').removeClass('turn');
    $('.actarrow').toggleClass('turn');
});
$('.schoolbutton').click(function() {
    $('.actfilter').removeClass('show');
    $('.stadfilter').removeClass('show');
    $('.maandfilter').removeClass('show');
    $('.schoolfilter').toggleClass('show');

    $('.actarrow').removeClass('turn');
    $('.stadarrow').removeClass('turn');
    $('.maandarrow').removeClass('turn');
    $('.schoolarrow').toggleClass('turn');
});
$('.stadbutton').click(function() {
    $('.actfilter').removeClass('show');
    $('.schoolfilter').removeClass('show');
    $('.maandfilter').removeClass('show');
    $('.stadfilter').toggleClass('show');

    $('.schoolarrow').removeClass('turn');
    $('.actarrow').removeClass('turn');
    $('.maandarrow').removeClass('turn');
    $('.stadarrow').toggleClass('turn');
});
$('.maandbutton').click(function() {
    $('.actfilter').removeClass('show');
    $('.stadfilter').removeClass('show');
    $('.schoolfilter').removeClass('show');
    $('.maandfilter').toggleClass('show');

    $('.schoolarrow').removeClass('turn');
    $('.stadarrow').removeClass('turn');
    $('.actarrow').removeClass('turn');
    $('.maandarrow').toggleClass('turn');
});
