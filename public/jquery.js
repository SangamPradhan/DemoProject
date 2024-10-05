$(function(){

    $('.navbar').on('click', 'a', function(){
        $('.navbar a.active').removeClass('active');
        $(this).addClass('active');
    })
    $('.nav').on('click', 'a', function(){
        $('.nav a.active').removeClass('active');
        $(this).addClass('active');
    })
})
